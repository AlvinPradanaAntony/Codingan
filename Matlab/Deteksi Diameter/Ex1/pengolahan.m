clc; clear; close all; warning off all;

%memanggil menu "browse file"
[nama_file, nama_folder] = uigetfile('*.jpg');

%jika ada nama file yang dipilih maka akan mengeksekusi perintah dibawah
%ini
if ~isequal(nama_file,0)
      %     membaca file citra rgb
    Img = imread(fullfile(nama_folder,nama_file));
    % figure,imshow(Img);

    %konversi citra RGB menjadi citra Grayscale
    Img_gray = rgb2gray(Img);
    %figure, imshow(Img_gray)

    %Deteksi Tepi
    [output] = edge_canny(Img_gray);
    edge_final = output;

    %     % Buat inisial masking
    %     m = zeros(480, 640);
    %
    % Tentukan nilai tengah baris dan kolom
    center_row = (480 + 1) / 2;
    center_col = (640 + 1) / 2;
    %
    %     % Tentukan ukuran masking
    %     mask_size = 420;
    %
    %     % Tentukan koordinat baris dan kolom untuk masking
    %     row1 = center_row - mask_size / 2;
    %     row2 = center_row + mask_size / 2;
    %     col1 = center_col - mask_size / 2;
    %     col2 = center_col + mask_size / 2;
    %
    %     % Isi masking dengan nilai 1
    %     m(row1:row2, col1:col2) = 1;

    figure, imshow(edge_final)
    h = drawellipse('Center',[center_col,center_row],'SemiAxes',[220,220], ...
        'RotationAngle',0,'StripeColor','m');
    mask = createMask(h);
    image = imresize(edge_final,.5);  %-- make image smaller
    m = imresize(mask,.5);  %     for fast computation
    bw = region_seg(image, m, 1500); %-- Run segmentation
    bw = imresize(bw, [size(Img,1) size(Img,2)]);
    bw = imfill(bw,'holes');
    bw = bwareaopen(bw,1000);
    bw = imclearborder(bw);

     %melakukan ekstraksi ciri warna RGB
    R = Img(:,:,1); %red
    G = Img(:,:,2); %green
    B = Img(:,:,3); %blue
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
    res = 1.362;
    area = area_bw/(res^2)/100;
    diameterr = diameter_bw/res/10;

    ciri_uji(1,1) = area;
    ciri_uji(1,2) = diameterr;

    %memanggil nilai bobot jaringan
    load('Mdl.mat')

    %membaca kelas keluaran
    kelas_keluaran = predict(Mdl,ciri_uji);

    %mengubah nilai keluaran menjadi kelas keluaran
    switch kelas_keluaran
        case 1
            kelas_keluaran = 'Grade A';
        case 2
            kelas_keluaran = 'Grade B';
        case 3
            kelas_keluaran = 'Grade C';
    end

    %tampilkan citra asli dan kelas keluaran hasil pengujian
    figure, imshow(RGB)
    title({['Nama File: ',nama_file],['Kelas Keluaran : ',kelas_keluaran]})
else
    %jika tidak ada nama file maka akan kembali
    return
end

