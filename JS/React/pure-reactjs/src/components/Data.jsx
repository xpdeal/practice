export default function Data() {
  let a = 100;
  let b = 200;
  let cliente = {
    nome: "Elvis",
    email: "elvis@gmail"  
  }

  function add(a, b) {
    return a + b;
  }

  return (
    <>
      <p>Nome : {cliente.nome}</p>
      <p>Email : {cliente.email}</p>
      <p>a soma de {a} + {b} é :{add(a,b)}</p>
    </>
  );
}
