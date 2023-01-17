clc; clear; close all; warning off all;

%memanggil menu "browse file"
[nama_file, nama_folder] = uigetfile('*.jpg');

%jika ada nama file yang dipilih maka akan mengeksekusi perintah dibawah
%ini
if ~isequal(nama_file,0)
    %membaca file citra RGB
    Img = im2double(imread(fullfile(nama_folder,nama_file)));
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

    %mengisi variabel ciri uji dengan ciri hasil ekstraksi
    ciri_uji(1,1) = Red;
    ciri_uji(1,2) = Green;
    ciri_uji(1,3) = Blue;
    ciri_uji(1,4) = Hue;
    ciri_uji(1,5) = Saturation;
    ciri_uji(1,6) = Value;
    ciri_uji(1,7) = Contrast;
    ciri_uji(1,8) = Correlation;
    ciri_uji(1,9) = Energy;
    ciri_uji(1,10) = Homogeneity;


    %memanggil nilai bobot jaringan
    load('Mdl.mat')

    %membaca kelas keluaran
    kelas_keluaran = predict(Mdl,ciri_uji);

    %menampilkan citra asli dan kelas keluaran hasil pengujian
    figure, imshow(Img)
    title({['Nama File: ',nama_file],['Kelas Keluaran : ',kelas_keluaran{1}]})
else
    %jika tidak ada nama file yg dipilih maka akan kembali
    return
end