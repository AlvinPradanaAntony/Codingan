clc; clear; close all;

% membaca citra rgb
I = imread('data_uji\A1_12.4442 cm.jpg');

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
seg = activecontour(J,m,800);
% menampilkan citra hasil pengolahan

% Filling holes
N = imfill(seg,"holes");
%     figure, imshow(N);

% Opening
seg = bwareaopen(N,1000);
%     figure, imshow(N);

%melakukan ekstraksi ciri warna RGB
R = I(:,:,1); %red
G = I(:,:,2); %green
B = I(:,:,3); %blue
R(~seg) = 0;
G(~seg) = 0;
B(~seg) = 0;
RGB = cat(3,R,G,B);


% Tentukan faktor skala piksel ke cm
scale_factor = 0.038;

% Ekstrak fitur objek dari hasil segmentasi
stats = regionprops(seg,'EquivDiameter');

% Dapatkan ukuran diameter objek yang setara dengan luas objek
diameter = stats.EquivDiameter;

% Konversi diameter ke cm
diameter_cm = diameter * scale_factor;

% Tampilkan ukuran diameter objek dengan satuan cm
disp(['Diameter objek: ', num2str(diameter_cm), ' cm']);

figure, imshow(RGB)
figure,
subplot(2,2,1);imshow(I);title('Citra rgb asli');
subplot(2,2,2);imshow(m);title('Inisial masking');
subplot(2,2,3);imshow(seg);title('Citra biner hasil segmentasi');
hold on
contour(seg, 'y','LineWidth',2);
hold off
subplot(2,2,4);imshow(I);title('Citra rgb hasil segmentasi');