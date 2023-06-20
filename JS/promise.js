async function pegaDados(){
    const resultadoConvertido = await 
    fetch('https://api.github.com/users/elvis7t').then((res) => res.json())
    console.log(resultadoConvertido);
  }
  
  const promise = new Promise((res, rej)=> {
    setTimeout(()=>{
      rej(new Err('Erro'));
    }, 200);
  });    
      
    promise.catch((err)=> {
      console.log(Error.messge); 
  })