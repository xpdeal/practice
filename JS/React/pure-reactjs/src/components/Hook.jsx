import { useState } from "react";

export default () => {
    const [valor, setValor] = useState(100)
    
    function aumentar(){
        setValor(old => old +1)
    }
    
    return(
    <>
        <h1>Valor {valor}</h1>
        <button onClick={aumentar}>Aumentar Valor</button>
    </>
    )

}