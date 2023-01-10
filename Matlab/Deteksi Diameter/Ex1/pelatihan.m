clc; clear; close all; warning off all;

%Grade A
%menetapkan nama folder
nama_folder = 'data_training/Grade A';
%membaca file berekstensi .jpg
nama_file = dir(fullfile(nama_folder,'*.jpg'));
%membaca jumlah file berekstensi .jpg
jumlah_file = numel(nama_file);

%melakukan inisialisasi variabel ciri buruk dan target buruk
ciri_gradeA = zeros(jumlah_file,2);
target_gradeA = zeros(jumlah_file,1);

%melakukan pengolahan citra terhadap seluruh file
for n = 1:jumlah_file
    %     membaca file citra rgb
    Img = imread(fullfile(nama_folder,nama_file(n).name));
    % figure,imshow(Img);

    %konversi citra RGB menjadi citra Grayscale
    Img_gray = rgb2gray(Img);
    %figure, imshow(Img_gray)

    
end


