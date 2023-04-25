fun main(){
    /*
      Operator AND (&&) akan mengembalikan nilai true
      jika semua hasil evaluasi expression yang diberikan bernilai true.
    */
    val officeOpen = 7
    val officeClosed = 16
    val now = 20

    val isOpen = now >= officeOpen && now <= officeClosed
    println("Office is open : $isOpen")

    // Versi clean code
    val officeOpen2 = 7
    val officeClosed2 = 16
    val now2 = 20

    val isOpen2 = now2 >= officeOpen2 && now2 <= officeClosed2
    println("Office is open : $isOpen2")



    /*
      Operator OR (||) akan mengembalikan nilai true
      jika hasil evaluasi dari salah satu expressions yang diberikan bernilai true.
    */
    val officeOpen3 = 7
    val officeClosed3 = 16
    val now3 = 20

    val isClose3 = now3 < officeOpen3 || now3 > officeClosed3

    println("Office is closed : $isClose3")



    /*
      operator NOT(!) digunakan untuk melakukan negasi pada hasil evaluasi expression yang diberikan.
      Contoh, Jika hasil expressions setelah dievaluasi bernilai true, maka operator NOT akan
      mengembalikan nilai false.
    */
    val officeOpen4 = 7
    val now4 = 10
    val isOpen4 = now > officeOpen

    if (!isOpen4) {
        print("Office is closed")
    } else {
        print("Office is open")
    }
}