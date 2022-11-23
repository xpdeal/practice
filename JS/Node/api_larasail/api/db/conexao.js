const mysql = require('mysql2')

const conexao = mysql.createConnection({
    host: 'mysql',
    port: 3306,
    password: 'password',
    user: 'sail', 
    database: 'api_larasail'
})

module.exports = conexao