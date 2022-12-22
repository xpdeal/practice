const express = require('express');
const mysql = require('mysql');
const PORT = 9001;
const HOST = '0.0.0.0';
const app = express();
const connection = mysql.createConnection({
  host: '172.19.0.2',
  user: 'root',
  password: 'programadorabordo',
  database: 'programadorabordo'
});
connection.connect();

// const query = (sql, callBack) => {
//   return connection.query(sql, callBack);
// };

// app.get('/', (req, res) => {
//   res.send('Hellow Mundo');
// });

  app.get('/products', function(req, res) {
     connection.query('SELECT * FROM products', function (error, results) {

       if (error) { 
         throw error
       };
       res.send(results.map(item => ({ name: item.name, price: item.price })));
     });
 });


app.listen(9001, '0.0.0.0', function() {
  console.log('Listening on port 9001');
});