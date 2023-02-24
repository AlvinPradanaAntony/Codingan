fun main() {/*
      Penggunaan tipe data char padaa variabel hanya dapat mebynoab karakter tunggal.
      Sebaliknya jika kita memasukkan lebih dari 1 (satu) karakter, akan terjadi eror: ncorrect character literal
    * */

    var vocal = 'A'

    //  Dapat melakukan operasi increment dan decrement pada sebuah variabel yang bertipe data char
    /*
        Mengapa bisa?
        Characters merupakan representasi dari Unicode. Contoh Unicode A adalah 0041.
        Ketika kita melakukan increment maka hasilnya adalah 0042 yang mana merupakan Unicode dari B.
    */
    println("Vocal " + vocal++)
    println("Vocal " + vocal++)
    println("Vocal " + vocal++)
    println("Vocal " + vocal--)
    println("Vocal " + vocal--)
    println("Vocal " + vocal--)
    println("Vocal " + vocal--)
}