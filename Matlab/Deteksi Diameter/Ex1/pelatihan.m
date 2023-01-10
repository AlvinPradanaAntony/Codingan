clc; clear; close all; warning off all;

%buruk
%menetapkan nama folder
nama_folder = 'Data Latih/Buruk';
%membaca file berekstensi .jpg
nama_file = dir(fullfile(nama_folder,'*.jpg'));
%membaca jumlah file berekstensi .jpg
jumlah_file = numel(nama_file);

%melakukan inisialisasi variabel ciri buruk dan target buruk
ciri_buruk = zeros(jumlah_file,5);
target_buruk = zeros(jumlah_file,1);

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
    % figure, imshow(bw);

    %melakukan operasi morfologi untuk menyempurnakan hasil segmentasi
    %1. filling holes
    bw = imfill(bw,'holes');
    %figure, imshow(bw)
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
    %RGB = cat(3,R,G,B);
    %figure, imshow(RGB)

    Red = sum(sum(R))/sum(sum(bw));
    Green = sum(sum(G))/sum(sum(bw));
    Blue = sum(sum(B))/sum(sum(bw));

    %melakukan ekstraksi ciri warna HSV
    HSV = rgb2hsv(Img);
    %figure, imshow(HSV)

    H = HSV(:,:,1); %hue
    S = HSV(:,:,2); %saturation
    V = HSV(:,:,3); %value
    H(~bw) = 0;
    S(~bw) = 0;
    V(~bw) = 0;

    Hue = sum(sum(H))/sum(sum(bw));
    Saturation = sum(sum(S))/sum(sum(bw));
    Value= sum(sum(V))/sum(sum(bw));

    %melakukan ekstraksi ciri tekstur GLCM
    Img_gray(~bw) = 0;
    %membentuk matriks kookurensi
    GLCM = graycomatrix(Img_gray,'Offset',[0 1; -1 1; -1 0; -1 -1]);
    stats = graycoprops(GLCM,{'Contrast','Correlation','Energy','Homogeneity'});
    Contrast = mean(stats.Contrast);
    Correlation = mean(stats.Correlation);
    Energy = mean(stats.Energy);
    Homogeneity= mean(stats.Homogeneity);

    %mengisi variabel ciri buruk dengan ciri hasil ekstraksi
    ciri_buruk(n,1) = Red;
    ciri_buruk(n,2) = Green;
    ciri_buruk(n,3) = Blue;
    ciri_buruk(n,4) = Hue;
    ciri_buruk(n,5) = Saturation;
    ciri_buruk(n,6) = Value;
    ciri_buruk(n,7) = Contrast;
    ciri_buruk(n,8) = Correlation;
    ciri_buruk(n,9) = Energy;
    ciri_buruk(n,10) = Homogeneity;

    %mengisi variabel target_buruk
    target_buruk(n,1) = 1;
end

%Baik
%menetapkan nama folder
nama_folder = 'Data Latih/Baik';
%membaca file berekstensi .jpg
nama_file = dir(fullfile(nama_folder,'*.jpg'));
%membaca jumlah file berekstensi .jpg
jumlah_file = numel(nama_file);

%melakukan inisialisasi variabel ciri baik dan target baik
ciri_baik= zeros(jumlah_file,5);
target_baik= zeros(jumlah_file,1);

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
    %figure, imshow(bw)
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
    %RGB = cat(3,R,G,B);
    %figure, imshow(RGB)

    Red = sum(sum(R))/sum(sum(bw));
    Green = sum(sum(G))/sum(sum(bw));
    Blue = sum(sum(B))/sum(sum(bw));

    %melakukan ekstraksi ciri warna HSV
    HSV = rgb2hsv(Img);
    %figure, imshow(HSV);

    H = HSV(:,:,1); %hue
    S = HSV(:,:,2); %saturation
    V = HSV(:,:,3); %value
    H(~bw) = 0;
    S(~bw) = 0;
    V(~bw) = 0;

    Hue = sum(sum(H))/sum(sum(bw));
    Saturation = sum(sum(S))/sum(sum(bw));
    Value= sum(sum(V))/sum(sum(bw));

    %melakukan ekstraksi ciri tekstur GLCM
    Img_gray(~bw) = 0;
    %membentuk matriks kookurensi
    GLCM = graycomatrix(Img_gray,'Offset',[0 1; -1 1; -1 0; -1 -1]);
    stats = graycoprops(GLCM,{'Contrast','Correlation','Energy','Homogeneity'});
    Contrast = mean(stats.Contrast);
    Correlation = mean(stats.Correlation);
    Energy = mean(stats.Energy);
    Homogeneity= mean(stats.Homogeneity);

    %mengisi variabel ciri baik dengan ciri hasil ekstraksi
    ciri_baik(n,1) = Red;
    ciri_baik(n,2) = Green;
    ciri_baik(n,3) = Blue;
    ciri_baik(n,4) = Hue;
    ciri_baik(n,5) = Saturation;
    ciri_baik(n,6) = Value;
    ciri_baik(n,7) = Contrast;
    ciri_baik(n,8) = Correlation;
    ciri_baik(n,9) = Energy;
    ciri_baik(n,10) = Homogeneity;

    %mengisi variabel target_baik
    target_baik(n,1) = 2;
end

%menyusun variabel target_latih
target_latih = [target_buruk;target_baik];
data_latih = [ciri_buruk;ciri_baik];

%melakukan pelatihan menggunakan algoritma SVM
Mdl = fitcsvm(data_latih,target_latih) %mdl, model

%membaca kelas keluaran
kelas_keluaran = predict(Mdl,data_latih);

%menghitung nilai akurasi
akurasi = (sum(target_latih==kelas_keluaran)/numel(target_latih))*100;
disp(['Akurasi Pelatihan = ', num2str(akurasi), '%'])

%menyimpan variabel Mdl hasil pelatihan
save Mdl Mdl

