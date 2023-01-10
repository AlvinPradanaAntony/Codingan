clc; clear; close all;

%memanggil menu "browse file"
[nama_file, nama_folder] = uigetfile('*.jpg');

%jika ada nama file yang dipilih maka akan mengeksekusi perintah dibawah
%ini
if ~isequal(nama_file,0)
    % membaca citra rgb
   I = imread(fullfile(nama_folder,nama_file));

    % mengkonversi citra rgb menjadi grayscale
    J = rgb2gray(I);

    [output] = edge_canny(J);
    edge_final = output;

    % Tentukan nilai tengah baris dan kolom
    center_row = (480 + 1) / 2;
    center_col = (640 + 1) / 2;

    Img = edge_final;
    figure, imshow(Img)
    h = drawellipse('Center',[center_col,center_row],'SemiAxes',[220,220], ...
        'RotationAngle',0,'StripeColor','m');
    mask = createMask(h);
    image = imresize(Img,.4);  %-- make image smaller
    m = imresize(mask,.4);  %     for fast computation
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
    res = 2.712;
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

else
    %jika tidak ada nama file maka akan kembali
    return
end


