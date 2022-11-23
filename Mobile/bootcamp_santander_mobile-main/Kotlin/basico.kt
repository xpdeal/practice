//Exemplo de declarar variaveis e constant
const val MAX_AGE = 16
fun main() {
	var currentAge:Int
    currentAge = 90
    
    print(MAX_AGE); 
    println(currentAge)   
    
}
//exemplo de declaração inferencia
fun main() {
	var currentAge = 90
    
    print(currentAge)
    
}
// Exemplo de declaração explicita
fun main() {
	var currentAge:int = 90
    
    print(currentAge)
    
}
// Exemplo de conversão de tipo de dados
fun main() {
	var currentYear = "Que ano"
    currentYear = 2021.toString() + "Ta foda"
    
    print(currentYear)     
    
}
//Exemplo de operações Aritimeticos
fun main() {
	var a:Int = 1
    var b = 2       
    var result = a.plus(b)
	/**
    Função |Expressão|Comando  |atribuição    
    soma   | a + b   |a.plus(b)| a+=b
             a - b    a.minus(b)
             a * b    a.times(b)
             a / b    a.div(b)
             a % b    a.mod(b)
    var result = a.minus(b)    
    **/
    print(result) 
        
}
//Exemplo de operações Aritimeticos 2
fun main() {
	val count = 10
    var times = 9
    times += count
    
	println(times) 
    print(count.plus(times))
        
}
//Exemplo de operações Logicos in e Range
fun main() {
	val bingo = listOf(8,6,34,2,13,24)
    var number = (1..34).random()
   
   	println(number) 
    print(number in bingo)
        
}
//Exemplo de operações Logicos in e Range 2
const val MIN_AGE = 16
const val MAX_AGE = 68
fun main() {
	val age = (10 ..100).random()
    println(age) 
    println(age in MIN_AGE..MAX_AGE)
    println(age >= MIN_AGE && age <= MAX_AGE)
    
        
}
//Exemplo de manipulação de string
fun main() {
	val welcome = "Ben vindo"
    var nome = "luiza"
    println("$welcome, ${nome.capitalize()}")
        
} 
//Exemplo de Empty x Blanck
fun main() {
	val empty =""
    println(empty.length)
    
    val blanck = "     "
    println(blanck.length)
    
    println(blanck.isEmpty())
        
}
//Exemplo defunção de ordem maior

//função soma
fun sum(a1:Int,a2:Int) = a1.plus(a2)        
//função calculate recebe 2 parans inteiros, retorna tipo int
fun calculate(n1:Int,n2:Int,operation:(Int,Int)->Int):Int{
    val result = operation(n1,n2)
    return result
}

//execução das funções calculate e soma  
fun main() {	
    val z: Int
    z = calculate(34, 90,::sum)
     println(z)

}

//Exemplo 2 de função porem sem a fun soma, passando parans por {}
fun calculate(n1:Int,n2:Int,operation:(Int,Int)->Int):Int{
    val result = operation(n1,n2)
    return result
}

fun main() {	
    val z: Int
    z = calculate(34, 90){a,b -> a*b}
     println(z)

//Exemplo de funções com retorno de string e single-line
fun calculate(n1:Int,n2:Int,operation:(Int,Int)->Int)= operation(n1,n2)
 

fun main() {	
    val z: Int
   z = calculate(34, 90){a,b -> 
    println("Vou calcular! $a + b * 2")
    (a + b) * 2
	}
   println(z)
}     
//Exemplo de codigo randomico e When
fun Int.getStudentStatus():String{
    println("Nota $this")
    
    return when(this){
        in 0..4 -> "Reprovado"
        in 5..7 -> "Mediano"
        in 8..9 -> "Bom"
        10 -> "Exelente"
        else -> "Indefinido"
    }
}


fun main() {	
    val grade = (0..10).random()
    println(grade.getStudentStatus())
    
}
//Exemplo de Elvis operator
fun main() {	
    
    var t:Int
    var x:Int? = null
    var w:Int? = 10
    t = x?:w ?: -1
    
    println(t)
       
}
//Exemplo 2 de operator Elvis
fun Int.getStudentStatus():String{
    println("Nota $this")
    
    return when(this){
        in 0..4 -> "Reprovado"
        in 5..7 -> "Mediano"
        in 8..9 -> "Bom"
        10 -> "Exelente"
        else -> "Indefinido"
    }
}


fun main() {	
    
    var x:Int? = null
    // var x:Int? = 30
    var w:Int? = null
    var t:String? = w?.getStudentStatus()
    
    
    println(t)
    
    
}
//Exemplo de FOR
fun downTo(){
    for(i in 20 downTo 0){
        print("$i ")
    }
}

fun until(){
    for(i in 1 until 20){
        print("$i ")
    }
}

fun step(num:Int){
    for(i in 0.. 20 step num){
        print("$i ")
    }
}

fun letters(){
    val sArray = "Olha essa string"
    //pega  o tamanho do array
    //pega cada posisão
    for(l in sArray){
        //l{index}
        println(l.toUpperCase())
        //println(l.toUpperCase()+ "") com espaço
    }
}

fun foreach(){
    val sArray = "Olha essa string"
    sArray.forEach{ l ->
        println(l + "")
        
    }
}

fun main() {	
    
    for(i in 1..20){
        print("$i ")
    }
    
    //downTo()
    //until()
    //step(2)
    //letters()
    //foreach()

}

//Exemplo de For
fun main(){
    val values = IntArray(5)

    values[0] = 1
    values[1] = 7
    values[2] = 6
    values[3] = 3
    values[4] = 2

    for(valor in values){
        println(valor)
    }

    values.forEach{
        println(it)
    }

    values.forEach{ valor ->
        println(valor)
    }

    for(index in values.indices){
        println(values[index])
    }

    for(valor in values){
        println(valor)
    }
    
     values.forEach{ valor ->
        println(valor)
    }
     
     for(index in values.indices){
         println(values[index])
     }
}

//Exemplo de ArrayOfIntArray
fun main() {
    val values = intArrayOf(2, 3, 4, 1, 10, 7)

    values.forEach {
        println(it)
    }

    println("---------------------")
    values.sort()
    values.forEach {
        println(it)
    }
}

//Exemplo de arrayOfIntArray
fun main() {
  
    val nomes2 = arrayOf("Maria", "Zazá", "Pedro")
    nomes2.sort()
    nomes2.forEach { println(it) }
}