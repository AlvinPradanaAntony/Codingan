clc; clear; close all; warning off all;

%menetapkan nama folder
nama_folder = 'data_training2/Diameter';
%membaca file berekstensi .jpg
nama_file = dir(fullfile(nama_folder,'*.jpg'));
%membaca jumlah file berekstensi .jpg
jumlah_file = numel(nama_file);

%melakukan inisialisasi variabel data latih
data_latih = zeros(jumlah_file,2);
%menetapkan target latih
target_latih = cell(jumlah_file, 1);

%melakukan pengolahan citra terhadap seluruh file
for n = 1:jumlah_file
    %     membaca file citra rgb
    Img = imread(fullfile(nama_folder,nama_file(n).name));
    % figure,imshow(Img);

    %konversi citra RGB menjadi citra Grayscale
    Img_gray = rgb2gray(Img);
    %figure, imshow(Img_gray)

    %Deteksi Tepi
    [output] = edge_canny(Img_gray);
    edge_final = output;


    % Tentukan nilai tengah baris dan kolom
    center_row = (480 + 1) / 2;
    center_col = (640 + 1) / 2;

    figure, imshow(edge_final)
    h = drawellipse('Center',[center_col,center_row],'SemiAxes',[220,220], ...
        'RotationAngle',0,'StripeColor','m');
    mask = createMask(h);
    image = imresize(edge_final,.5);  %-- make image smaller
    m = imresize(mask,.5);  %     for fast computation
    bw = region_seg(image, m, 1500); %-- Run segmentation
    bw = imfill(bw,'holes');
    bw = bwareaopen(bw,1000);
    bw = imclearborder(bw);

    [tinggi, lebar] = size(bw);
    hasil = 0;
    for p = 1 : tinggi
        for q = 1 : lebar
            if bw(p, q) == 1
                hasil = hasil + 1;
            end
        end
    end
    area_bw = hasil;
    diameter_bw = sqrt(4 * area_bw / pi);
    res = 1.362;
    area = area_bw/(res^2)/100;
    diameterr = diameter_bw/res/10;

    data_latih(n,1) = area;
    data_latih(n,2) = diameterr;
    title({['Nama File: ',nama_file(n).name],['Diameter : ',num2str(diameterr), ' cm']}, "Color","m")
end

for n = 1:16
    target_latih{n} = 'Diameter +10cm';
end

for n = 17:31
    target_latih{n} = 'Diameter +5cm';
end

for n = 32:47
    target_latih{n} = 'Diameter <5cm';
end

%melakukan pelatihan menggunakan algoritma SVM
Mdl = fitcecoc(data_latih,target_latih) %mdl, model

%membaca kelas keluaran
kelas_keluaran = predict(Mdl,data_latih);

%menghitung akurasi pelatihan
jumlah_benar = 0;
for n = 1:jumlah_file
    if isequal(kelas_keluaran{n},target_latih{n})
        jumlah_benar = jumlah_benar+1;
    end
end

akurasi_pelatihan = jumlah_benar/jumlah_file*100

% %menyimpan variabel Mdl hasil pelatihan
% save Mdl Mdl