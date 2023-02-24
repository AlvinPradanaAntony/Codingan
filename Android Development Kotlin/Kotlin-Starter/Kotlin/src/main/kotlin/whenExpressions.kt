import kotlin.random.Random

fun main(){
    val value = 7

    when(value){
        6 -> println("value is 6")
        7 -> println("value is 7")
        8 -> println("value is 8")
        else -> println("value cannot be reached")
    }

    // when expression dapat mengembalikan nilai dan dapat disimpan di dalam sebuah variabel
    val value2 = 7
    val stringOfValue = when (value2) {
        6 -> "value is 6"
        7 -> "value is 7"
        8 -> "value is 8"
        else -> "value cannot be reached"
    }

    println(stringOfValue)

    /*
     Jika kita memiliki dua atau lebih baris kode yang akan kita jalankan di setiap branch,
     kita bisa memindahkannya ke dalam curly braces
    **/
    val value3 = 8
    val stringOfValue2 = when (value3) {
        6 -> {
            println("Six")
            "value is 6"
        }
        7 -> {
            println("Seven")
            "value is 7"
        }
        8 -> {
            println("Eight")
            "value is 8"
        }
        else -> {
            println("undefined")
            "value cannot be reached"
        }
    }

    println(stringOfValue2)


    /*
     Memeriksa instance dengan tipe tertentu dari sebuah objek menggunakan is atau !is
    * */
    val anyType : Any = 100L
    when(anyType){
        is Long -> println("the value has a Long type")
        is String -> println("the value has a String type")
        else -> println("undefined")
    }

    /*
     when expression juga bisa kita gunakan untuk memeriksa nilai yang terdapat pada sebuah Range atau Collection
     Berikut adalah contoh saat kita hendak mengecek apakah sebuah nilai ada di dalam sebuah Range atau tidak
    * */
    val value4 =  27
    val ranges = 10..50

    when(value4){
        in ranges -> println("value is in the range")
        !in ranges -> println("value is outside the range")
        else -> println("value undefined")
    }

    /*
     menangkap subjek dari when expression di dalam sebuah variabel
    * */
    val registerNumber = when(val regis = getRegisterNumber()){
        in 1..50 -> 50 * regis
        in 51..100 -> 100 * regis
        else -> regis
    }
    println(registerNumber)
}

fun getRegisterNumber() = Random.nextInt(100)