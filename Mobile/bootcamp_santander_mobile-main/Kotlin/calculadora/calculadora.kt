package calculadora

fun main(){

    showOptions()
    var oper:Int = readLine()!!.toInt()
    if(oper === 8){
        println("Calculadora encerrada!")
    }else{
        while(oper != 8) {
            var num1:Int
            var num2:Int
            if(oper in 1..6){
                println("Digite o primeiro número")
                num1 = readLine()!!.toInt()
                println("Digite o segundo número")
                num2 = readLine()!!.toInt()

                operator(oper, num1, num2)
            }else{
                println("Informe o número que deseja calcular a fatorial: ")
                val num1 = readLine()!!.toFloat()
                println("Resultado: " + fat(num1))

            }
            showOptions()

            oper = readLine()!!.toInt()
            if(oper === 8){
                println("Calculadora encerrada!")
            }
        }
    }
}

fun add(num1:Int, num2:Int):Int{
    return num1 + num2
}

fun sub(num1:Int, num2:Int):Int{
    return num1 - num2
}

fun multi(num1:Int, num2:Int):Int{
    return num1 * num2
}

fun divi(num1:Int, num2:Int):Int{
    return num1 / num2
}
fun module(num1:Int, num2:Int):Int {
    return num1 % num2
}

fun pow(num1:Int, num2:Int):Int{
    var result:Int = 1
    var i:Int = 1
    while(i <= num2){
        result *=num1
        i++
    }
    return(result)
}

fun fat(num1: Float):Int {
    var i = 2
    var fat = 1
    while(i <= num1){
        fat *= i
        i += 1
    }

    return fat
}

fun showOptions(){
    println("---------------")
    println("Calculadora  Kotlin")
    println("Selecione a operação que deseja realizar:")
    println("1 - Adição")
    println("2 - Subtração")
    println("3 - Multiplicação")
    println("4 - Divisão")
    println("5 - Módulo")
    println("6 - Potencia")
    println("7 - Fatorial")
    println("8 - Sair")
}

fun operator(oper:Int, num1:Int, num2:Int){
    when{
        oper === 1 -> println("Resultado: " + add(num1,num2))
        oper === 2 -> println("Resultado: " + sub(num1,num2))
        oper === 3 -> println("Resultado: " + multi(num1,num2))
        oper === 4 -> println("Resultado: " + divi(num1,num2))
        oper === 5 -> println("Resultado: " + module(num1,num2))
        oper === 6 -> println("Resultado: " + pow(num1, num2))
    }
}