import { useState } from "react"

export default () => {
    const [valor, setValor] = useState(0);
    
    function diminuir(){
     setValor(valor => valor -1)
        
    }
    
    function aumentar(){
     setValor(valor => valor + 1)
        
    }

    return (
       <>
            <h4>useState</h4>
            <p>Valor: {valor}</p>
            <button onClick={diminuir}>-</button>
            <button onClick={aumentar}>+</button>
       </>
    )


}