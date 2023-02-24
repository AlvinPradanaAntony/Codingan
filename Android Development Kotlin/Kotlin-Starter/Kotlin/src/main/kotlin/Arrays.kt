fun main(){
    println("==========================================")
    println("==== General array =====")
    println("==========================================")
    val array = arrayOf(1, 3, 5, 7)
    val result = array.map { it }
    println(result)
    println()

    // Kita juga dapat memasukkan nilai dengan berbagai jenis tipe data ke dalam arrayOf() misalnya:
    println("==========================================")
    println("==== MixArray =====")
    println("==========================================")
    val mixArray = arrayOf(1, 3, 5, 7 , "Dicoding" , true)
    val result2 = mixArray.map { it }
    println(result2)
    println()

    /*
     Membuat Array dengan tipe data primitif dengan memanfaatkan beberapa fungsi spesifik berikut:
     intArrayOf() : IntArray
     booleanArrayOf() : BooleanArray
     charArrayOf() : CharArray
     longArrayOf() : LongArray
     shortArrayOf() : ShortArray
     byteArrayOf() : ByteArray
    * */

    println("==========================================")
    println("==== Penggunaan intArrayOf() =====")
    println("==========================================")
    val intArray = intArrayOf(1, 3, 5, 7)
    val result3 = intArray.map { it }
    println(result3)
    println()

    println("=================================================================================")
    println("Mendapatkan nilai tunggal dari sekumpulan nilai yang berada di dalam sebuah Array")
    println("=================================================================================")
    val intArray2 = intArrayOf(1, 3, 5, 7)
    val result4= intArray2.map { it }
    println(result4)
    println("Nilai array index ke 2: " + intArray2[2])

    println("=================================================================================")
    println("Mendapatkan nilai tunggal, dengan indexing kita juga bisa mengubah nilai tunggal tersebut")
    println("=================================================================================")
    val intArray3 = intArrayOf(1, 3, 5, 7)
    val result5= intArray3.map { it }
    intArray3[2] = 11
    val results= intArray3.map { it }
    println(result5)
    println(results)
    println("Nilai array index ke 2: " + intArray2[2])
    println("Hasil nilai baru index ke 2: " + results[2])

}