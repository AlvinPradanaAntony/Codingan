clc; clear; close all; warning off all;

%menetapkan nama folder
nama_folder = 'data_train';
%membaca file berekstensi .jpg
nama_file = dir(fullfile(nama_folder,'*.jpg'));
%membaca jumlah file berekstensi .jpg
jumlah_file = numel(nama_file);

%melakukan inisialisasi variabel data latih
data_latih = zeros(jumlah_file,10);

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
    RGB = cat(3,R,G,B);
    figure, imshow(RGB)
    title({['Nama File: ',nama_file(n).name]})

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
    data_latih(n,1) = Red;
    data_latih(n,2) = Green;
    data_latih(n,3) = Blue;
    data_latih(n,4) = Hue;
    data_latih(n,5) = Saturation;
    data_latih(n,6) = Value;
    data_latih(n,7) = Contrast;
    data_latih(n,8) = Correlation;
    data_latih(n,9) = Energy;
    data_latih(n,10) = Homogeneity;
end

%menetapkan target latih
target_latih = cell(jumlah_file, 1);
for n = 1:16
    target_latih{n} = 'Putih Kekuningan';
end

for n = 17:32
    target_latih{n} = 'Putih';
end

%melakukan pelatihan menggunakan algoritma SVM
Mdl = fitcsvm(data_latih,target_latih); %mdl, model

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

%menyimpan variabel Mdl hasil pelatihan
save Mdl Mdl

    