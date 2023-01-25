clc; clear; close all; warning off all;

%% Grade A
%menetapkan nama folder
nama_folder = 'data_training/DiameterA';
%membaca file berekstensi .jpg
nama_file = dir(fullfile(nama_folder,'*.jpg'));
%membaca jumlah file berekstensi .jpg
jumlah_file = numel(nama_file);

%melakukan inisialisasi variabel ciri buruk dan target buruk
ciri_diameterA = zeros(jumlah_file,10);
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


%% Grade B
%menetapkan nama folder
nama_folder = 'data_training/DiameterB';
%membaca file berekstensi .jpg
nama_file = dir(fullfile(nama_folder,'*.jpg'));
%membaca jumlah file berekstensi .jpg
jumlah_file = numel(nama_file);

%melakukan inisialisasi variabel ciri buruk dan target buruk
ciri_diameterB = zeros(jumlah_file,10);
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

%% Grade C
%menetapkan nama folder
nama_folder = 'data_training/DiameterC';
%membaca file berekstensi .jpg
nama_file = dir(fullfile(nama_folder,'*.jpg'));
%membaca jumlah file berekstensi .jpg
jumlah_file = numel(nama_file);

%melakukan inisialisasi variabel ciri buruk dan target buruk
ciri_diameterC = zeros(jumlah_file,10);
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

%% Putih Kekuningan
%menetapkan nama folder
nama_folder = 'data_training/PutihKekuningan';
%membaca file berekstensi .jpg
nama_file = dir(fullfile(nama_folder,'*.jpg'));
%membaca jumlah file berekstensi .jpg
jumlah_file = numel(nama_file);

%melakukan inisialisasi variabel ciri buruk dan target buruk
ciri_warnaPutihKekuningan = zeros(jumlah_file,10);
target_warnaPutihKekuningan = zeros(jumlah_file,1);

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
    ciri_warnaPutihKekuningan(n,1) = Red;
    ciri_warnaPutihKekuningan(n,2) = Green;
    ciri_warnaPutihKekuningan(n,3) = Blue;
    ciri_warnaPutihKekuningan(n,4) = Hue;
    ciri_warnaPutihKekuningan(n,5) = Saturation;
    ciri_warnaPutihKekuningan(n,6) = Value;
    ciri_warnaPutihKekuningan(n,7) = Contrast;
    ciri_warnaPutihKekuningan(n,8) = Correlation;
    ciri_warnaPutihKekuningan(n,9) = Energy;
    ciri_warnaPutihKekuningan(n,10) = Homogeneity;

    %mengisi variabel target_warnaPutihKekuningan
    target_warnaPutihKekuningan(n,1) = 4;
end

%% Putih
%menetapkan nama folder
nama_folder = 'data_training/Putih';
%membaca file berekstensi .jpg
nama_file = dir(fullfile(nama_folder,'*.jpg'));
%membaca jumlah file berekstensi .jpg
jumlah_file = numel(nama_file);

%melakukan inisialisasi variabel ciri baik dan target baik
ciri_warnaPutih= zeros(jumlah_file,10);
target_warnaPutih= zeros(jumlah_file,1);

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
    ciri_warnaPutih(n,1) = Red;
    ciri_warnaPutih(n,2) = Green;
    ciri_warnaPutih(n,3) = Blue;
    ciri_warnaPutih(n,4) = Hue;
    ciri_warnaPutih(n,5) = Saturation;
    ciri_warnaPutih(n,6) = Value;
    ciri_warnaPutih(n,7) = Contrast;
    ciri_warnaPutih(n,8) = Correlation;
    ciri_warnaPutih(n,9) = Energy;
    ciri_warnaPutih(n,10) = Homogeneity;

    %mengisi variabel target_warnaPutih
    target_warnaPutih(n,1) = 5;
end

%menyusun variabel target_latih
target_latih = [target_diameterA;target_diameterB;target_diameterC;target_warnaPutihKekuningan;target_warnaPutih];
data_latih = [ciri_diameterA;ciri_diameterB;ciri_diameterC;ciri_warnaPutihKekuningan;ciri_warnaPutih];

%melakukan pelatihan menggunakan algoritma SVM
Mdl = fitcecoc(data_latih,target_latih) %mdl, model

%membaca kelas keluaran
kelas_keluaran = predict(Mdl,data_latih);

%menghitung nilai akurasi
akurasi = (sum(target_latih==kelas_keluaran)/numel(target_latih))*100;
disp(['Akurasi Pelatihan = ', num2str(akurasi), '%'])

%menyimpan variabel Mdl hasil pelatihan
save targetLatih target_latih
save dataLatih data_latih
save Mdl Mdl