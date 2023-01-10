clc; clear; close all;

% membaca citra rgb
I = imread('C1_3.8182 cm.jpg');

% mengkonversi citra rgb menjadi grayscale
J = rgb2gray(I);

% Deteksi Tepi Canny
img = J;

%Value for Thresholding
T_Low = 0.075;
T_High = 0.175;

%Gaussian Filter Coefficient
B = [2, 4, 5, 4, 2; 4, 9, 12, 9, 4;5, 12, 15, 12, 5;4, 9, 12, 9, 4;2, 4, 5, 4, 2 ];
B = 1/159.* B;

%Convolution of image by Gaussian Coefficient
A=conv2(img, B, 'same');

%Filter for horizontal and vertical direction
KGx = [-1, 0, 1; -2, 0, 2; -1, 0, 1];
KGy = [1, 2, 1; 0, 0, 0; -1, -2, -1];

%Convolution by image by horizontal and vertical filter
Filtered_X = conv2(A, KGx, 'same');
Filtered_Y = conv2(A, KGy, 'same');

%Calculate directions/orientations
arah = atan2 (Filtered_Y, Filtered_X);
arah = arah*180/pi;

pan=size(A,1);
leb=size(A,2);

%Adjustment for negative directions, making all directions positive
for i=1:pan
    for j=1:leb
        if (arah(i,j)<0)
            arah(i,j)=360+arah(i,j);
        end
    end
end

arah2=zeros(pan, leb);

%Adjusting directions to nearest 0, 45, 90, or 135 degree
for i = 1  : pan
    for j = 1 : leb
        if ((arah(i, j) >= 0 ) && (arah(i, j) < 22.5) || (arah(i, j) >= 157.5) && (arah(i, j) < 202.5) || (arah(i, j) >= 337.5) && (arah(i, j) <= 360))
            arah2(i, j) = 0;
        elseif ((arah(i, j) >= 22.5) && (arah(i, j) < 67.5) || (arah(i, j) >= 202.5) && (arah(i, j) < 247.5))
            arah2(i, j) = 45;
        elseif ((arah(i, j) >= 67.5 && arah(i, j) < 112.5) || (arah(i, j) >= 247.5 && arah(i, j) < 292.5))
            arah2(i, j) = 90;
        elseif ((arah(i, j) >= 112.5 && arah(i, j) < 157.5) || (arah(i, j) >= 292.5 && arah(i, j) < 337.5))
            arah2(i, j) = 135;
        end
    end
end

%figure, imagesc(arah2); colorbar;

%Calculate magnitude
magnitude = (Filtered_X.^2) + (Filtered_Y.^2);
magnitude2 = sqrt(magnitude);

BW = zeros (pan, leb);

%Non-Maximum Supression
for i=2:pan-1
    for j=2:leb-1
        if (arah2(i,j)==0)
            BW(i,j) = (magnitude2(i,j) == max([magnitude2(i,j), magnitude2(i,j+1), magnitude2(i,j-1)]));
        elseif (arah2(i,j)==45)
            BW(i,j) = (magnitude2(i,j) == max([magnitude2(i,j), magnitude2(i+1,j-1), magnitude2(i-1,j+1)]));
        elseif (arah2(i,j)==90)
            BW(i,j) = (magnitude2(i,j) == max([magnitude2(i,j), magnitude2(i+1,j), magnitude2(i-1,j)]));
        elseif (arah2(i,j)==135)
            BW(i,j) = (magnitude2(i,j) == max([magnitude2(i,j), magnitude2(i+1,j+1), magnitude2(i-1,j-1)]));
        end
    end
end

BW = BW.*magnitude2;
%figure, imshow(BW);

%Hysteresis Thresholding
T_Low = T_Low * max(max(BW));
T_High = T_High * max(max(BW));

T_res = zeros (pan, leb);

for i = 1  : pan
    for j = 1 : leb
        if (BW(i, j) < T_Low)
            T_res(i, j) = 0;
        elseif (BW(i, j) > T_High)
            T_res(i, j) = 1;
            %Using 8-connected components
        elseif ( BW(i+1,j)>T_High || BW(i-1,j)>T_High || BW(i,j+1)>T_High || BW(i,j-1)>T_High || BW(i-1, j-1)>T_High || BW(i-1, j+1)>T_High || BW(i+1, j+1)>T_High || BW(i+1, j-1)>T_High)
            T_res(i,j) = 1;
        end
    end
end

edge_final = uint8(T_res.*255);
% figure, imshow(edge_final);


% Tentukan nilai tengah baris dan kolom
center_row = (480 + 1) / 2;
center_col = (640 + 1) / 2;

Img = edge_final;
figure, imshow(Img)
h = drawellipse('Center',[center_col,center_row],'SemiAxes',[220,220], ...
    'RotationAngle',0,'StripeColor','m');
mask = createMask(h);
image = imresize(Img,.5);  %-- make image smaller
m = imresize(mask,.5);  %     for fast computation
bw = region_seg(image, m, 1200); %-- Run segmentation
bw = imresize(bw, [size(I,1) size(I,2)]);
bw = imfill(bw,'holes');
bw = bwareaopen(bw,1000);
bw = imclearborder(bw);

%melakukan ekstraksi ciri warna RGB
R = I(:,:,1); %red
G = I(:,:,2); %green
B = I(:,:,3); %blue
R(~bw) = 0;
G(~bw) = 0;
B(~bw) = 0;
RGB = cat(3,R,G,B);

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
res = 2.682;
area = area_bw/(res^2)/100;
diameterr = diameter_bw/res/10;

disp(['Luas objek: ', num2str(area), ' cm2']);
disp(['Diameter objek: ', num2str(diameterr), ' cm']);

figure,
subplot(2,2,1);imshow(I);title('Citra rgb asli');
subplot(2,2,2);imshow(Img);title('Canny Detection');
subplot(2,2,3);imshow(bw);title('Citra biner hasil segmentasi');
hold on
contour(bw, 'y','LineWidth',2);
hold off
subplot(2,2,4);imshow(RGB);title('Citra rgb hasil segmentasi');
