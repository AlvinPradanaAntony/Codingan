clc; clear; close all; warning off all;

%menetapkan nama folder
nama_folder = 'data_train';
%membaca file berekstensi .jpg
nama_file = dir(fullfile(nama_folder,'*.jpg'));
%membaca jumlah file berekstensi .jpg
jumlah_file = numel(nama_file);

%melakukan inisialisasi variabel data latih
data_latih = zeros(jumlah_file,7);

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

end

% Menyusun variabel data_latih
data_latih = [Hue;Saturation;Value;hue_hist;Hue_std;Saturation_std;Value_std];

%menetapkan target latih
target_latih = zeros(jumlah_file, 1);
target_latih(1:16) = 1; % Bougainvillea
target_latih(17:32) = 2; % Geranium



% Membangun arsitektur jaringan saraf tiruan
rng('default');
net = newff(data_latih,target_latih,[10 5],{'logsig','logsig'},'trainlm');
% Melakukan pelatihan jaringan
net = train(net, data_latih, target_latih);
output = round(sim(net,data_latih));

% Menghitung akurasi pelatihan
jumlah_benar = 0;
for k = 1:jumlah_file
    if (output(k) == target_latih(k))
        jumlah_benar = jumlah_benar +1;
    end
end

akurasi_pelatihan = jumlah_benar/jumlah_file*100;

%menghitung nilai akurasi
disp(['Jumlah Benar = ', num2str(jumlah_benar)])
disp(['Akurasi Pelatihan = ', num2str(akurasi_pelatihan), '%'])

% Menyimpan variabel Mdl hasil pelatihan
save train_withJST net
