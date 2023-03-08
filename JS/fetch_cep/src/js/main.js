const cep = document.querySelector("#cep")

const showData = (result) => {
    for (const campo in result) {
        if (document.querySelector("#" + campo)) {
            document.querySelector("#" + campo).value = result[campo]

        }
    }
}

cep.addEventListener("blur", (e) => {
    let search = cep.value.replace("-", "")
    const options = {
        headers: {
            "Access-Control-Allow-Headers": "Content-Type",
            "Access-Control-Allow-Origin": 'https://viacep.com',
            "Access-Control-Allow-Methods": 'GET'
        },
        method: 'GET',
        mode: 'cors',
        cache: 'default'
    }

    fetch(`https://viacep.com/ws/${search}/json/`, options)
        .then(response => {
            response.json()
                .then(data => console.log(data))
        })

        .catch(e => console.log('Deu Erro:' + e.message))
})