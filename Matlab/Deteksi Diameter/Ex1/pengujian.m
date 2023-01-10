clc; clear; close all; warning off all;


load dataLatih.mat
load targetLatih.mat

%melakukan pelatihan menggunakan algoritma SVM
Mdl = fitcecoc(data_latih,target_latih) %mdl, model

% Melakukan cross validation pada kelasifier yang sudah dilatih
cv = crossval(Mdl);
% Menghitung error klasifikasi cross validation
classError = kfoldLoss(cv);
fprintf('Kesalahan klasifikasi = %f\n', classError);

%membaca kelas keluaran
kelas_keluaran = predict(Mdl,data_latih);

%menghitung nilai akurasi
akurasi = (sum(target_latih==kelas_keluaran)/numel(target_latih))*100;
disp(['Akurasi Pelatihan = ', num2str(akurasi), '%'])

%menyimpan variabel Mdl hasil pelatihan
save Mdl Mdl