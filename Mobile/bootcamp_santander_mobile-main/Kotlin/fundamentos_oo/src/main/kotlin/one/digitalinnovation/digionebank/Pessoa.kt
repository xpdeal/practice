package one.digitalinnovation.digionebank
abstract class Pessoa(
    val nome: String = "Elvis",
    val cpf: String = "123"
)

fun main() {
    val elvis = Pessoa()
    println(elvis.nome)
    println(elvis.cpf)
}