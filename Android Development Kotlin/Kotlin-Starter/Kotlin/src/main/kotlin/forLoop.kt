fun main(){
    // Penggunaan for pada Range
    val ranges = 1..5
    for (i in ranges){
        println("value is $i!")
    }

    // menuliskan For loop menggunakan range expression
    val ranges2 = 1.rangeTo(10) step 3
    for (i in ranges2 ){
        println("value is $i!")
    }

    // dapat mengakses indeks untuk setiap elemen yang ada pada Ranges dengan memanfaatkan fungsi withIndex()
    val ranges3 = 1.rangeTo(10) step 3
    for ((index, value) in ranges3.withIndex()) {
        println("value $value with index $index")
    }

    // Penggunaan forEach
    val ranges4 = 1.rangeTo(10) step 3
    ranges4.forEach { value ->
        println("value is $value!")
    }

    // Jika kita mendapatkan indeks dari tiap nilai yang dicakup kita bisa menggunakan ekstensi forEachIndexed
    val ranges5 = 1.rangeTo(10) step 3
    ranges5.forEachIndexed { index, value ->
        println("value $value with index $index")
    }

    // Jika kita hanya ingin menggunakan argumen index, maka kita bisa mengubah argumen value menjadi _
    val ranges6 = 1.rangeTo(10) step 3
    ranges6.forEachIndexed { index, _ ->
        println("index $index")
    }
}