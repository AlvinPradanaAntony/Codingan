% Baca gambar dan ubah ke skala abu-abu
I = imread('A2_10.4912 cm.jpg');
I = rgb2gray(I);

% Hilangkan noise dengan median filter dan tingkatkan kontras dengan imadjust
I = medfilt2(I);
I = imadjust(I);

% Deteksi tepi dengan Canny
BW = edge(I, 'canny');
BW = im2double(BW);

% Terapkan thresholding dengan graythresh
level = graythresh(BW);
BW = imbinarize(BW, level);

% Gambar contour dengan bwboundaries
[B, L] = bwboundaries(BW, 'noholes');

% Menyeleksi otomatis objek dengan regionprops
stats = regionprops(L, 'Centroid', 'EquivDiameter');

% Loop through each region and display diameter value
for idx = 1:numel(stats)
    diameter = stats(idx).EquivDiameter;
    centroid = stats(idx).Centroid;
    fprintf('Region %d: Diameter = %.2f, Centroid = (%.2f, %.2f)\n', idx, diameter, centroid(1), centroid(2));
end

% Tampilkan gambar dengan contour dan centroid dari setiap regio
figure, imshow(I);
hold on;
for idx = 1:numel(B)
    % Tampilkan contour dari setiap regio
    plot(B{idx}(:,2), B{idx}(:,1), 'r', 'LineWidth', 2);
    % Tampilkan centroid dari setiap regio
    plot(stats(idx).Centroid(1), stats(idx).Centroid(2), 'r*');
end
hold off;
