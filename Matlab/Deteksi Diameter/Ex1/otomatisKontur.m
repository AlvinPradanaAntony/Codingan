clc; clear; close all;
 
% membaca citra rgb
I = imread('A1_12.4442 cm.jpg');
% mengkonversi citra rgb menjadi grayscale
J = rgb2gray(I);

% Buat inisial masking
m = zeros(480, 640);

% Tentukan nilai tengah baris dan kolom
center_row = (480 + 1) / 2;
center_col = (640 + 1) / 2;

% Tentukan ukuran masking
mask_size = 250;

% Tentukan koordinat baris dan kolom untuk masking
row1 = center_row - mask_size / 2;
row2 = center_row + mask_size / 2;
col1 = center_col - mask_size / 2;
col2 = center_col + mask_size / 2;

% Isi masking dengan nilai 1
m(row1:row2, col1:col2) = 1;

% segmentasi citra menggunakan active contour
seg = activecontour(J,m,1200);
% menampilkan citra hasil pengolahan

figure,
subplot(2,2,1);imshow(I);title('Citra rgb asli');
subplot(2,2,2);imshow(m);title('Inisial masking');
subplot(2,2,3);imshow(seg);title('Citra biner hasil segmentasi');
subplot(2,2,4);imshow(I);title('Citra rgb hasil segmentasi');
hold on
contour(seg, 'y','LineWidth',2);
hold off