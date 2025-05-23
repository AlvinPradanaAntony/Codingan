clc; clear; close all; warning off all;

%menetapkan nama folder
nama_folder = 'data_tests';
%membaca file berekstensi .jpg
nama_file = dir(fullfile(nama_folder,'*.jpg'));
%membaca jumlah file berekstensi .jpg
jumlah_file = numel(nama_file);

%melakukan inisialisasi variabel data latih
data_uji = zeros(jumlah_file,7);

%melakukan pengolahan citra terhadap seluruh file
for n = 1:jumlah_file
    %membaca file citra RGB
    Img = im2double(imread(fullfile(nama_folder,nama_file(n).name)));
    %figure, imshow(Img)

    %konversi citra RGB menjadi citra Grayscale
    Img_gray = rgb2gray(Img);
    %figure, imshow(Img_gray)

    %konversi citra Grayscale menjadi citra biner
    bw = imbinarize(Img_gray);
    %figure, imshow(bw)

    %melakukan operasi morfologi untuk menyempurnakan hasil segmentasi
    %1. filling holes
    bw = imfill(bw,'holes');
    %2. area opening
    bw = bwareaopen(bw,1000);
    %figure, imshow(bw)

    %melakukan ekstraksi ciri warna RGB
    R = Img(:,:,1); %red
    G = Img(:,:,2); %green
    B = Img(:,:,3); %blue
    R(~bw) = 0;
    G(~bw) = 0;
    B(~bw) = 0;
    %     RGB = cat(3,R,G,B);
    %     figure, imshow(RGB)
    %     title({['Nama File: ',nama_file(n).name]})

    % Mengubah citra dari RGB ke HSV
    HSV = rgb2hsv(Img);
    
    %melakukan ekstraksi ciri warna HSV
    H = HSV(:,:,1); %hue
    S = HSV(:,:,2); %saturation
    V = HSV(:,:,3); %value
    H(~bw) = 0;
    S(~bw) = 0;
    V(~bw) = 0;

    Hue = sum(sum(H))/sum(sum(bw));
    Saturation = sum(sum(S))/sum(sum(bw));
    Value = sum(sum(V))/sum(sum(bw));

    Hue_std = std(H(:));
    Saturation_std = std(S(:));
    Value_std = std(V(:));

    hue_hist = imhist(H);
    hue_hist = mean(hue_hist(:));

    %mengisi variabel ciri baik dengan ciri hasil ekstraksi
    data_uji(n,1) = Hue;
    data_uji(n,2) = Saturation;
    data_uji(n,3) = Value;
    data_uji(n,4) = hue_hist;
    data_uji(n,5) = Hue_std;
    data_uji(n,6) = Saturation_std;
    data_uji(n,7) = Value_std;
end

%menetapkan target latih
target_uji = cell(jumlah_file, 1);
for n = 1:16
    target_uji{n} = 'Putih Kekuningan';
end

for n = 17:32
    target_uji{n} = 'Putih';
end

load train_withSVM.mat

%membaca kelas keluaran
kelas_keluaran = predict(Mdl,data_uji);

%menghitung akurasi pelatihan
jumlah_benar = 0;
for n = 1:jumlah_file
    if isequal(kelas_keluaran{n},target_uji{n})
        jumlah_benar = jumlah_benar+1;
    end
end

akurasi_pelatihan = jumlah_benar/jumlah_file*100;

%menghitung nilai akurasi
% akurasi = (sum(target_uji==Groupmin)/numel(target_uji))*100;
disp(['Jumlah Benar = ', num2str(jumlah_benar)])
disp(['Akurasi Pelatihan = ', num2str(akurasi_pelatihan), '%'])
