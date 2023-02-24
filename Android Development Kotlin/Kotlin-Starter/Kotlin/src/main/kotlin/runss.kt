fun main() {
    val message: String? = null
    message?.run {
        val length = it.length
        val text = "text length $length"
        println(text)
    }
}