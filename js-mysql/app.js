const mysql = require('mysql');
const con = mysql.createConnection({
  host: 'localhost',
  user: 'root',
  password: '',
  database: "shop"
});

// con.connect((error) => {
//   if(error){
//     console.log('Error connecting to the MySQL Database');
//     return;
//   }
//   console.log('con established sucessfully');
// });
// con.end((error) => {
// });


console.log("hey")

con.connect(function(err) {
  if (err) throw err;
  con.query("SELECT * FROM users WHERE id = 1", function (err, result, fields) {
    if (err) throw err;
    console.log(result);
  });
});


// function upnbr(){
//   con.connect(function(err) {
//     if (err) throw err;
//     con.query("SELECT * FROM users WHERE id = 1", function (err, result, fields) {
//       if (err) throw err;
//       console.log(result);
//     });
//   });
// }