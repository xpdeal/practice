<html>
<head>
</head>
<body>
<script language=javascript type="text/javascript">
const data = new Date();
const dias = 5;
function addDays(date, days) {
  date.setDate(date.getDate() + days);
  return date;
}
const now = addDays(data, dias);
// alert(JSON.stringify(exampleObj))

 

exampleObj = { cliente: "chicão", pet: "Doginho", servico: "tosa", status: "agendado", observacoes: "Muito ziquinha", data: now.toLocaleDateString() }
document.write (JSON.stringify(exampleObj) )
  
// now = new Date();
// document.write ("Hoje é " + now.toLocaleDateString() )
// document.write ("Hoje é " + now.getDay() + ", " + now.getDate() + " de " + now.getMonth() + " de " + now.getFullYear() )
</script>
</body>
</html>
