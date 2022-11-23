fun main() {
    println("Escolha uma das opções para a operação desejada") 
    println("Opção [1] - Soma")
    println("Opção [2] - Subtração")
    println("Opção [3] - Multiplicação")
    println("Opção [4] - Divisão")
    println("Digite a opçãp aqui")
    val opcao = readLine()!!.toInt()
    println("Digite o valor 1") 
    val numero1 = readLine()!!.toInt()
    println("Digite o valor 2") 
    val numero2 = readLine()!!.toInt()
    
    when (opcao){
        1 -> println("O resultado da Soma é :  ${numero1 + numero2} ")
        2 -> println("O resultado da subtração  é :  ${numero1 - numero2} ")
        3 -> println("O resultado da Multiplicação é :  ${numero1 * numero2} ")
        4 -> println("O resultado da Divisão é :  ${numero1 / numero2} ")
        else -> println("Digite uma opção valida")
    }
}