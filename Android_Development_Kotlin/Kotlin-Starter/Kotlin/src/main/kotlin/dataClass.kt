class User(val name : String, val age : Int)

/* Dataclass sudah secara otomatis menghasilkan fungsi toString()
tetapi pada class perlu membuat fungsi toString() secara manual untuk mendapatkan informasi seperti
yang diberikan oleh objek dataUser
*/
class User2(val name : String, val age : Int){

    override fun toString(): String {
        return "User(name=$name, age=$age)"
    }
}



/*
 jika Anda menginginkan hasil yang akurat seperti pada data class,
 maka Anda perlu membuat fungsi equals() secara manual
*/
class User3(val name : String, val age : Int){

    override fun equals(other: Any?): Boolean {
        if (this === other) return true
        if (javaClass != other?.javaClass) return false

        other as User3

        if (name != other.name) return false
        if (age != other.age) return false

        return true
    }

    override fun hashCode(): Int {
        var result = name.hashCode()
        result = 31 * result + age
        return result
    }
}




data class DataUser(val name : String, val age : Int)



// menerapkan sebuah behaviour di dalam data class.
data class DataUser2(val name : String, val age : Int){
    fun intro(){
        println("My name is $name, I am $age years old")
    }
}




fun main(){
    // Perbedaan class dan data class
    val user = User("nrohmen", 17)
    val user2 = User2("nrohmen", 17)
    val user3 = User3("Dimas", 17)
    val user4 = User3("Dimas", 17)
    val user5 = User3("Tony", 18)
    val dataUser = DataUser("nrohmen", 17)

    println(user)
    println(user2)
    println(dataUser)
    println()

    // Dataclass dapat melakukan komparasi konten antara 2 buah objek
    /*
    jika kita melakukan komparasi pada 2 buah objek yang bukan dari data class. Kita tidak bisa mendapatkan hasil
    yang akurat karena konsol akan selalu menghasilkan nilai false.
    * */
    val dataUsers = DataUser("nrohmen", 17)
    val dataUsers2 = DataUser2("dimas", 24)
    val dataUser2 = DataUser("nrohmen", 17)
    val dataUser3 = DataUser("dimas", 24)


    println(dataUsers.equals(dataUser2))
    println(dataUser.equals(dataUser3))

    // class
    println(user3.equals(user4))
    println(user3.equals(user5))

    // Menyalin dan Memodifikasi Data Class
    val dataUser4 = dataUser.copy()
    println(dataUser4)

    //memodifikasi objek tersebut dengan nilai yang baru.
    val dataUser5 = dataUser.copy(age = 18)
    println(dataUser5)

    // Destructuring Declarations (menguraikan sebuah objek menjadi beberapa properti yang dimilikinya)
    val name = dataUser.component1()
    val age = dataUser.component2()

    println("My name is $name, I am $age years old")

    dataUsers2.intro()


}