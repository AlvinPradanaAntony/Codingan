fun main() {
    val text  = "Kotlin"
    val firstChar = text[2]

    /*
      text[i] digunakan untuk mengambil karakter dari sebuah kata berdasarkan index
    */
    println("First character of $text is $firstChar")




    /*
     Selain itu, kita juga dapat melakukan iterasi terhadap objek String dengan menggunakan for-loop
    */
    val text2  = "Kotlin"
    for (char in text2){
        print("$char ")
    }
    println()



    /*
    Escaped String (mengurangi ambiguitas nilai yang berada di dalam sebuah String.)
    */
    // val statement = "Kotlin is "Awesome!"" // error
    // Solusi
    val statement = "Kotlin is \"Awesome!\""
    println(statement)




    /*
     Menambahkan sebuah Unicode ke dalam sebuah String
    */
    val name3 = "Unicode test: \u00A9"
    println(name3)


    /*
     Raw String
    */
    // Mengubah Escaped
    println("=========================")
    println("==== Excaped String =====")
    println("=========================")
    val line = "Line 1\n" +
            "Line 2\n" +
            "Line 3\n" +
            "Line 4\n"
    println(line)
    println("=========================")
    println("====== Raw String =======")
    println("=========================")
    val line2 = """
        Line 1
        Line 2
        Line 3
        Line 4
    """.trimIndent()

    print(line2)
}