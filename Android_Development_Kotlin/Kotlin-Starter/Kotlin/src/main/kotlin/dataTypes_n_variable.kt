fun main() {
    /*
        Penggunaan val dan var:
            var adalah sebuah kata kunci untuk membuat sebuah variabel yang nilainya dapat diubah
            val adalah sebuah kata kunci untuk membuat sebuah variabel yang nilainya tidak dapat diubah
    */

    // Penggunaan var
    var name = "Bayu"
    name = "Alvin"
    print(name)
    println(" (" + name::class.simpleName + ")")

    // Penggunaan val (Error)
    /*  val name2 = "Bayu"
        name2 = "Alvin"
        print(name2)
        println(" (" + name2::class.simpleName + ")")
    */

    // Penggabungan 2 variabel dengan tipe data yang sama
    // String
    val firstWord = "Bangkit "
    val secondWord = "Academy"
    println(firstWord + secondWord)

    // Number
    val num1 = 6
    val num2 = 4
    print(num1 + num2)
}