fun main(){
    val rangeInt = 1..10
    println(rangeInt.step)

    /*
    mengubah nilai dari step bisa dilakukan ketika kita menginisialisasi nilai yang dicakup Range itu sendiri
    * */
    val rangeInt2 = 1..10 step 2
    rangeInt2.forEach {
        print("$it ")
    }
    println(rangeInt2.step)

    // RangeTo
    val rangeInt3 = 1.rangeTo(10)
    println(rangeInt3)

    // menentukan nilai yang dicakup pada Range dengan urutan terbalik
    val downInt = 10.downTo(1)
    println(downInt)

    //memeriksa apakah suatu nilai ada pada cakupan nilai Range
    val tenToOne = 10.downTo(1)
    // penggunaan in pada kondisi if
    if (7 in tenToOne) {
        println("Value 7 available")
    }
    // sama halnya penggunaan if seperti berikut
    if (1 <= 7 && 7 <= 10){
        println("Value 7 available")
    }


    // Sebaliknya, kita juga bisa memeriksa apakah suatu nilai tidak ada pada nilai cakupan Range tersebut
    val tenToOne2 = 10.downTo(1)
    if (11 !in tenToOne2) {
        println("No value 11 in Range ")
    }

    //selain nilai numerik, kita juga bisa menentukan tipe Character sebagai nilai yang dicakup oleh Range:
    val rangeChar = 'A'.rangeTo('F')
    println(rangeChar)


}