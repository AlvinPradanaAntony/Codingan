def countingSort(array):
    # Inisialisasi variabel
    maxValue = 0
    size = len(array)
    output = [0] * size

    # Mencari nilai maximum pada array
    for i in range(size):
        if array[i] > maxValue:
            maxValue = array[i]

    # Membuat array jumlah dengan panjang nilai maxValue + 1
    countLength = maxValue + 1
    count = [0] * (maxValue + 1)

    # Membuat sebuah perulangan untuk mencari jumlah nilai yang sering muncul
    # pada suatu elemen
    for i in array:
        count[i] += 1

    # Membuat sebuah perulangan hingga nilai maximum untuk menjumlahkan elemen secara 
    # kumulatif setiap iterasi kemudian disimpan pada array count
    for i in range(1, countLength):
        count[i] += count[i-1]     

    # Mencari indeks setiap elemen dan menempatkan posisi elemen ke indeks array asli dengan 
    # didasari array pada count sebelumnya dan dilakukannya pengurangan jumlah kumulatif setiap iterasi
    i = size - 1
    while i >= 0:
      currentEl = array[i]
      count[currentEl] -= 1
      newPosition = count[currentEl]
      output[newPosition] = currentEl
      i -= 1
    return output

inputArray = [4, 2, 2, 8, 3, 3, 1, 0, 9, 5, 0]
print("Input array = ", inputArray)

sortedList = countingSort(inputArray)
print("Hasil Sorting = ", sortedList)