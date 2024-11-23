<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'mistterqr';

// Crear conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Comprobar si la conexión fue exitosa
if ($conn->connect_error) {
    die('Error al conectarse a la base de datos: ' . $conn->connect_error);
}

// Obtener los datos enviados desde el formulario
$nombres = $_POST['nombre'];
$apellidos = $_POST['apellidos'];

// Crear una consulta para insertar los datos en la base de datos
$sql = "INSERT INTO tus_tablas (nombre, apellidos) VALUES ('$nombres', '$apellidos')";

// Ejecutar la consulta
if ($conn->query($sql) === TRUE) {
    echo 'Datos insertados con éxito';
} else {
    echo 'Error al insertar datos: ' . $conn->error;
}

// Cerrar la conexión a la base de datos
$conn->close();
?>