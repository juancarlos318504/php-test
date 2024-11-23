import * as mysql from 'mysql';

// Configurar la conexión a la base de datos
const connection = mysql.createConnection({
  host: 'localhost',
  user: 'root',
  password: '',
  database: 'mistterqr'
});

// Conectar a la base de datos
connection.connect((error: any) => {
  if (error) {
    console.error('Error al conectar a la base de datos:', error);
  } else {
    console.log('Conectado a la base de datos');
  }
});

// Ejemplo de consulta a la base de datos
connection.query('SELECT * FROM clientes', (error: any, results: any) => {
  if (error) {
    console.error('Error al ejecutar la consulta:', error);
  } else {
    console.log('Resultado de la consulta:', results);
  }
});

// Cerrar la conexión a la base de datos
connection.end((error: any) => {
  if (error) {
    console.error('Error al cerrar la conexión:', error);
  } else {
    console.log('Conexión cerrada');
  }
});