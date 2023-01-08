clc; clear; close all; warning off all;

%menetapkan nama folder
nama_folder = 'Data Latih';
%membaca file berekstensi .jpg
nama_file = dir(fullfile(nama_folder,'*.jpg'));
%membaca jumlah file berekstensi .jpg
jumlah_file = numel(nama_file);

%melakukan inisialisasi variabel data latih
data_latih = zeros(jumlah_file,2);

%melakukan pengolahan citra terhadap seluruh file
for n = 1:jumlah_file
    %membaca file citra RGB
    Img = imread(fullfile(nama_folder,nama_file(n).name));
    %figure, imshow(Img)

    %konversi citra RGB menjadi citra Grayscale
    Img_gray = rgb2gray(Img);
    %figure, imshow(Img_gray)

    %melakukan ekstraksi ciri tekstur menggunakan metode GLCM
    pixel_dist = 1;
    %membentuk matriks kookurensi
    GLCM = graycomatrix(Img_gray,'Offset',[0 pixel_dist; -pixel_dist pixel_dist; pixel_dist 0; -pixel_dist -pixel_dist]);
    stats = graycoprops(GLCM,'Correlation','Energy');
   
    Correlation = mean(stats.Correlation);
    Energy = mean(stats.Energy);

    %menyusun variabel data latih
    data_latih(n,1) = Correlation;
    data_latih(n,2) = Energy;
end

%menetapkan target latih
target_latih = cell(jumlah_file, 1);
for n = 1:5
    target_latih{n} = 'baik';
end

for n = 6:10
    target_latih{n} = 'buruk';
end

%melakukan pelatihan menggunakan algoritma SVM
Mdl = fitcsvm(data_latih,target_latih); %mdl, model

%membaca kelas keluaran
kelas_keluaran = predict(Mdl,data_latih);

%menghitung akurasi pelatihan
jumlah_benar = 0;
for n = 1:jumlah_file
    if isequal(kelas_keluaran{n},target_latih{n})
        jumlah_benar = jumlah_benar+1;
    end
end

akurasi_pelatihan = jumlah_benar/jumlah_file*100

%menyimpan variabel Mdl hasil pelatihan
save Mdl Mdl

    