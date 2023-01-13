% Baca gambar dan ubah ke skala abu-abu
I = imread('data_learning\A3_12.0644 cm.jpg');
I = rgb2gray(I);

% Hilangkan noise dengan median filter dan tingkatkan kontras dengan imadjust
I = medfilt2(I);
I = imadjust(I);

% Deteksi tepi dengan Canny
BW = edge(I, 'canny');
BW = im2double(BW);
% figure, imshow(BW);


% Terapkan thresholding dengan graythresh
level = graythresh(BW);
BW = imbinarize(BW, level);
% figure, imshow(BW);

    %melakukan operasi morfologi untuk menyempurnakan hasil segmentasi
    %1. filling holes
    bw = imfill(BW,'holes');
    figure, imshow(bw)
    %2. area opening
%     bw = bwareaopen(bw,1000);
%     figure, imshow(bw)

% Label setiap regio dengan bwlabel
[L, num] = bwlabel(BW);

% Ekstrak fitur objek dengan regionprops
stats = regionprops(L, 'Centroid', 'EquivDiameter');

% Loop through each region and display diameter value
for idx = 1:1
    diameter = stats(idx).EquivDiameter;
    centroid = stats(idx).Centroid;
    fprintf('Region %d: Diameter = %.2f, Centroid = (%.2f, %.2f)\n', idx, diameter, centroid(1), centroid(2));
end

% Tampilkan gambar hasil segmentasi
figure, imshow(I);
hold on;
for idx = 1:1
    % Tampilkan centroid dari setiap regio
    plot(stats(idx).Centroid(1), stats(idx).Centroid(2), 'r*');
end
hold off;

