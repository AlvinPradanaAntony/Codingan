fun main(){
    /*
      Tipe bawaan yang merepresentasikan Numbers adalah Double, Long, Int, Short dan Byte.
      Int(32bit) = -2147483648 hingga 2147483647:
      Long(64 Bit) = -9223372036854775808 hingga 9223372036854775807.
        Perbedaan Antara Int dan Long
          - Bilangan bulat adalah Int selama sampai dengan 2147483647. Jika melebihi itu, dapat didefinisikan
            sebagai Long:
       Float(32bit) = memiliki ukuran yang lebih kecil, yakni hanya sampai 6-7 angka di belakang koma.
       Double(64bit) = menyimpan nilai numerik pecahan sampai dengan maksimal 15-16 angka di belakang koma
       Short(16bit) = -32,768 hingga 32,767
       Byte = -128 hingga 127. Byte biasa digunakan untuk keperluan proses membaca dan menulis data
              dari sebuah stream file atau jaringan.
    */

    // Mengetahui nilai maksimal yang dapat disimpan oleh suatu tipe Number
    val maxInt = Int.MAX_VALUE
    val minInt = Int.MIN_VALUE

    val maxLong = Long.MAX_VALUE
    val minLong = Long.MIN_VALUE

    val maxDouble = Double.MAX_VALUE
    val minDouble = Double.MIN_VALUE

    val maxFloat = Float.MAX_VALUE
    val minFloat = Float.MIN_VALUE

    val maxShort = Short.MAX_VALUE
    val minShort = Short.MIN_VALUE

    val maxByte = Byte.MAX_VALUE
    val minByte = Byte.MIN_VALUE

    println("==================================")
    println("==== Integer =====")
    println("==================================")
    println("$minInt sampai $maxInt")
    println()

    println("==================================")
    println("==== Long =====")
    println("==================================")
    println("$minLong sampai $maxLong")
    println()

    println("==================================")
    println("==== Double =====")
    println("==================================")
    println("$minDouble sampai $maxDouble")
    println()

    println("==================================")
    println("==== Float =====")
    println("==================================")
    println("$minFloat sampai $maxFloat")
    println()

    println("==================================")
    println("==== Short =====")
    println("==================================")
    println("$minShort sampai $maxShort")
    println()

    println("==================================")
    println("==== Byte =====")
    println("==================================")
    println("$minByte sampai $maxByte")
    println()

    val num = 2147483649
    println(num::class.simpleName)


    println("==================================")
    println("==== Koversi =====")
    println("==================================")
    val byteNumber: Byte = 10
    val intNumber: Int = byteNumber.toInt() // ready to go
    println(intNumber::class.simpleName)

    /*
     Adapun beberapa fungsi konversi yang dapat kita gunakan antara lain:

    toByte(): Byte
    toShort(): Short
    toInt(): Int
    toLong(): Long
    toFloat(): Float
    toDouble(): Double
    toChar(): Char
    */

    println("==========================================")
    println("==== Contoh lain penggunaan konversi =====")
    println("==========================================")
    /*
      val stringNumber = "23" (String to int)
      val intNumber2 = 3
      Output: 26
    */
    val stringNumber = "23"
    val intNumber2 = 3

    println(intNumber2 + stringNumber.toInt())
    println()


    println("=============================================================================")
    println("menuliskan nilai numerik yang “readable” dengan menggunakan tanda underscores")
    println("=============================================================================")
    val readableNumber = 1_000_000
    println(readableNumber)
}