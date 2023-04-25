fun main(){
    val listOfInt = listOf(1, 2, 3, null, 5, null, 7)
    for (i in listOfInt) {
        print("$i ")
    }
    println()

    // melewatkannya jika nilai yang dihasilkan adalah null.
    val listOfInt2 = listOf(1, 2, 3, null, 5, null, 7)

    for (i in listOfInt2) {
        if (i == null) continue
        print(i)
    }
    println()

    //menghentikan proses iterasi ketika nilai yang dihasilkan bernilai null.
    val listOfInt3 = listOf(1, 2, 3, null, 5, null, 7)

    for (i in listOfInt3) {
        if (i == null) break
        print(i)
    }
    println()

    //Break dan Continue Labels
    loop@ for (i in 1..10) {
        println("Outside Loop")

        for (j in 1..10) {
            println("Inside Loop")
            if ( j > 5) break@loop
        }
    }
}