import { useState } from "react"
export default () => {
    const [value, setValue] = useState(0);

    function sum() {
        setValue(value => value + 1)
    }
    return (
        <>
            <button onClick={() => sum()}>
                Sum is {value}
            </button>
        </>
    )

}