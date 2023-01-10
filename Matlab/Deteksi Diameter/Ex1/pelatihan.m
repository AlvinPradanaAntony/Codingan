clc; clear; close all; warning off all;

%Grade A
%menetapkan nama folder
nama_folder = 'data_training/DiameterA';
%membaca file berekstensi .jpg
nama_file = dir(fullfile(nama_folder,'*.jpg'));
%membaca jumlah file berekstensi .jpg
jumlah_file = numel(nama_file);

%melakukan inisialisasi variabel ciri buruk dan target buruk
ciri_diameterA = zeros(jumlah_file,2);
target_diameterA = zeros(jumlah_file,1);

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
    title(nama_file(n).name, "Color","m")
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

    ciri_diameterA(n,1) = area;
    ciri_diameterA(n,2) = diameterr;

    target_diameterA(n,1) = 1;
end


%Grade B
%menetapkan nama folder
nama_folder = 'data_training/DiameterB';
%membaca file berekstensi .jpg
nama_file = dir(fullfile(nama_folder,'*.jpg'));
%membaca jumlah file berekstensi .jpg
jumlah_file = numel(nama_file);

%melakukan inisialisasi variabel ciri buruk dan target buruk
ciri_diameterB = zeros(jumlah_file,2);
target_diameterB = zeros(jumlah_file,1);

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
    title(nama_file(n).name, "Color","m")
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

    ciri_diameterB(n,1) = area;
    ciri_diameterB(n,2) = diameterr;

    target_diameterB(n,1) = 2;
end

%Grade C
%menetapkan nama folder
nama_folder = 'data_training/DiameterC';
%membaca file berekstensi .jpg
nama_file = dir(fullfile(nama_folder,'*.jpg'));
%membaca jumlah file berekstensi .jpg
jumlah_file = numel(nama_file);

%melakukan inisialisasi variabel ciri buruk dan target buruk
ciri_diameterC = zeros(jumlah_file,2);
target_diameterC = zeros(jumlah_file,1);

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
    title(nama_file(n).name, "Color","m")
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

    ciri_diameterC(n,1) = area;
    ciri_diameterC(n,2) = diameterr;

    target_diameterC(n,1) = 3;
end

%menyusun variabel target_latih
target_latih = [target_diameterA;target_diameterB;target_diameterC];
data_latih = [ciri_diameterA;ciri_diameterB;ciri_diameterC];

%melakukan pelatihan menggunakan algoritma SVM
Mdl = fitcecoc(data_latih,target_latih) %mdl, model

%membaca kelas keluaran
kelas_keluaran = predict(Mdl,data_latih);

%menghitung nilai akurasi
akurasi = (sum(target_latih==kelas_keluaran)/numel(target_latih))*100;
disp(['Akurasi Pelatihan = ', num2str(akurasi), '%'])

%menyimpan variabel Mdl hasil pelatihan
save ciriA ciri_diameterA
save ciriB ciri_diameterB
save ciriC ciri_diameterC
save targetC target_diameterA
save targetB target_diameterB
save targetC target_diameterC
save targetLatih target_latih
save dataLatih data_latih
save Mdl Mdl