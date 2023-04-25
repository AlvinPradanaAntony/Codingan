fun main(){
    // Konidisi IF
    println("=========================")
    println("====== Kondisi IF =======")
    println("=========================")
    val openHours = 7
    val now = 20
    if (now > openHours){
        println("office already open")
    }
    println()

    // Kondisi IF-ELSE
    println("=========================")
    println("==== Kondisi IF-Else ====")
    println("=========================")
    val openHours2 = 7
    val now2 = 20
    val office: String
    if (now2 > openHours2) {
        office = "Office already open"
    } else {
        office = "Office is closed"
    }
    println(office)
    println()

    // Menyimpan hasil dari pengkodisian IF ke variabel
    println("==================================")
    println("==== Result save to Variable =====")
    println("==================================")
    val openHours3 = 7
    val now3 = 20
    val office3: String
    office3 = if (now3 > openHours3) {
        "Office already open"
    } else {
        "Office is closed"
    }
    println(office3)
    println()


    // Menguji lebih dari 2 kondisi
    println("==================================")
    println("==== More then 2 condition =====")
    println("==================================")
    val openHours4 = 7
    val now4 = 7
    val office4: String
    office4 = if (now4 > 7) {
        "Office already open"
    } else if (now4 == openHours4){
        "Wait a minute, office will be open"
    } else {
        "Office is closed"
    }
    println(office4)


    val hour = 7
    print("Office ${if (hour > 7) "already close" else "is open"}")
}