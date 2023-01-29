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

    %melakukan ekstraksi ciri warna RGB
    R = Img(:,:,1); %red
    G = Img(:,:,2); %green
    B = Img(:,:,3); %blue
    R(~bw) = 0;
    G(~bw) = 0;
    B(~bw) = 0;
    RGB = cat(3,R,G,B);
    %   figure, imshow(RGB)
    
    % Konversi citra dari RGB ke HSV
    hsv_img = rgb2hsv(RGB);

    % Ambil kanal value dari citra HSV
    H = hsv_img(:,:,1); %hue
    S = hsv_img(:,:,2); %saturation
    V = hsv_img(:,:,3); %value

    % Memisahkan hue untuk warna putih dan putih kekuningan
    threshold = 0.9; % Batasan threshold untuk hue putih
    

    % Klasifikasikan jamur tiram berdasarkan persentase warna
    if  V < threshold
        disp('Putih')
    else
       disp('Putih Kekuningan')
    end


    % Visualisasi citra hasil
    figure, imshow(RGB);

else
    %jika tidak ada nama file maka akan kembali
    return
end