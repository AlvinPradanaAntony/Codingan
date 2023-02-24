fun main(){
    // Dari struktur seperti ini
    /*    val colorRed = 0xFF0000
    val colorGreen = 0x00FF00
    val colorBlue = 0x0000FF
    */

    // Menjadi
    val colorRed = Color2.RED
    val colorGreen = Color2.GREEN
    val colorBlue = Color2.BLUE

    val color : Color = Color.RED
    println(color)

    val colors: Array<Color2> = Color2.values()
    colors.forEach { color ->
        print("$color ")
    }

    /*
      Untuk mendapatkan daftar objek Enum kita bisa menggunakan fungsi values().
      Sedangkan untuk mendapatkan nama dari objek Enum kita bisa menggunakan fungsi valueOf()
    */
    val color2: Color2 = Color2.valueOf("RED")
    println("Color is $color2")
    println("Color value is ${color2.value.toString(16)}")

    /*
     Mendapatkan daftar objek Enum dan nama dari objek Enum dengan cara yang lebih umum dengan
     fungsi enumValues() dan fungsi enumValueOf()
    */
    val colors2: Array<Color2> = enumValues()
    colors2.forEach {color ->
        println(color)
    }

    val color3: Color2 = enumValueOf("RED")
    println("Color is $color3")

    /*
    Mendapatkan posisi tiap objek menggunakan properti ordinal
    */
    val color4: Color2 = Color2.GREEN
    println("Position GREEN is ${color4.ordinal}")

    // mengecek instance dari Enum itu sendiri menggunakan gunakan When Expression

    val color5: Color2 = Color2.GREEN

    when(color5){
        Color2.RED -> println("Color is Red")
        Color2.BLUE -> println("Color is Blue")
        Color2.GREEN -> println("Color is Green")
    }
}

// Hal dasar enum
enum class Color{
    RED, GREEN, BLUE
}

enum class Color2(val value: Int) {
    RED(0xFF0000),
    GREEN(0x00FF00),
    BLUE(0x0000FF)
}

// menambahkan abstract function dan mendeklarasikan anonymous class untuk setiap objek Enum
enum class Color3(val value: Int) {
    RED(0xFF0000){
        override fun printValue() {
            println("value of RED is $value")
        }
    },
    GREEN(0x00FF00){
        override fun printValue() {
            println("value of GREEN is $value")
        }
    },
    BLUE(0x0000FF){
        override fun printValue() {
            println("value of BLUE is $value")
        }
    };

    abstract fun printValue()
}