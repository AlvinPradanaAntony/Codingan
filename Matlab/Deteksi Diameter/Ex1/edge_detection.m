clc
clear all
close all
warning off
x=imread('flower.PNG');

gray_image = rgb2gray(x);
edge_image = edge(gray_image, 'canny');
struct_elem = strel('line', 3, 0);
closed_image = imclose(edge_image, struct_elem);
filled_image = imfill(closed_image, 'holes');
opened_image = imopen(filled_image, strel(ones(3,3)));
mask_image = bwareaopen(opened_image, 1500);

red_processed=x(:,:,1).*uint8(mask_image);
green_processed=x(:,:,2).*uint8(mask_image);
blue_processed=x(:,:,3).*uint8(mask_image);
op=cat(3,red_processed,green_processed,blue_processed);

figure(1), 
subplot(1,3,1), imshow(x), title("Original Image"),
subplot(1,3,2), imshow(gray_image), title("Gray Image"),
subplot(1,3,3), imshow(edge_image), title("Edge Image");
figure(2),
subplot(2,3,1), imshow(closed_image), title("Close Image"),
subplot(2,3,2), imshow(filled_image), title("Filled Image");
subplot(2,3,3), imshow(opened_image), title("Opened Image"),
subplot(2,3,4), imshow(mask_image), title("Mask Image"),
subplot(2,3,5), imshow(op), title("Output Image");
