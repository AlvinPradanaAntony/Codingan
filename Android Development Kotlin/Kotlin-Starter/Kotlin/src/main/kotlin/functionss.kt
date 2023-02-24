fun main() {
    val user = setUser("Tony", 19)
    println(user)

    setUser("Tony",20)
    printUser2("Tony")
}


fun setUser(name: String, age: Int): String {
    return "Your name is $name, and you $age years old"
}
/*
    Jika di dalam suatu fungsi hanya memiliki satu expression untuk menentukan nilai kembalian,
*/
fun setUser2(name: String, age: Int): String = "Your name is $name, and you $age years old"
// Atau secara implisit
fun setUser3(name: String, age: Int) = "Your name is $name, and you $age years old"



/*
 Jika kita tidak ingin fungsi yang dibuat mengembalikan nilai,
 kita bisa menggunakan Unit sebagai tipe nilai kembaliannya
*/
fun printUser(name: String): Unit {
    print("Your name is $name")
}
// Atau tipe kembalian yang redundant:
fun printUser2(name: String) {
    print("Your name is $name")
}