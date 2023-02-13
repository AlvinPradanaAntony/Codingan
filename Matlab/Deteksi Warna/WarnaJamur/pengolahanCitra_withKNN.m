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
    RGB = cat(3,R,G,B);
    figure, imshow(RGB)
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
    Value= sum(sum(V))/sum(sum(bw));

    Hue_std = std(H(:));
    Saturation_std = std(S(:));
    Value_std = std(V(:));

    hue_hist = imhist(H);
    hue_hist = mean(hue_hist(:));

    %mengisi variabel ciri uji dengan ciri hasil ekstraksi
    ciri_uji(1,1) = Hue;
    ciri_uji(1,2) = Saturation;
    ciri_uji(1,3) = Value;
    ciri_uji(1,4) = hue_hist;
    ciri_uji(1,5) = Hue_std;
    ciri_uji(1,6) = Saturation_std;
    ciri_uji(1,7) = Value_std;

    load train_withKNN.mat

    % Membaca kelas keluaran hasil pengujian
    hasil_latih = predict(Mdl, ciri_uji);

    %menampilkan citra asli dan kelas keluaran hasil pengujian
    figure, imshow(Img)
    title({['Nama File: ',nama_file],['Kelas Keluaran : ',hasil_latih{1}]})

else
    %jika tidak ada nama file yg dipilih maka akan kembali
    return
end