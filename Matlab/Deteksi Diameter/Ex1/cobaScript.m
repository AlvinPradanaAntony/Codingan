% Membuat citra berukuran 480x640
m = imread("A1_12.4442 cm.jpg");

% Tentukan nilai tengah baris dan kolom
center_row = (480 + 1) / 2;
center_col = (640 + 1) / 2;


% Menentukan posisi elips di tengah citra
center = [center_col,center_row];

% Menentukan panjang sumbu x dan y dari elips
semi_axes = [220,220];

% Menentukan derajat putaran dari elips (dalam contoh ini tidak ada putaran)
rotation_angle = 0;

% Menentukan warna garis yang digunakan untuk menggambar elips
stripe_color = 'r';

% Menampilkan citra yang telah diberi elips
imshow(m);
hold on;
h = drawellipse('Center',center,'SemiAxes',semi_axes, ...
                'RotationAngle',rotation_angle,'StripeColor',stripe_color);
axis equal;


