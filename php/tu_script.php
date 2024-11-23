<?php
// Incluir el archivo de conexión a la base de datos
include 'conectar.php';

// Verificar si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger los datos del formulario principal
    $nombre = $_POST['nombre'] ?? '';
    $apellido = $_POST['apellido'] ?? '';
    $numero_celular = $_POST['numero_celular'] ?? '';
    $correo_electronico = $_POST['correo_electronico'] ?? '';
    $numero_documento = $_POST['numero_documento'] ?? '';
    $fecha_nacimiento = $_POST['fecha_nacimiento'] ?? '';
    $nombre_negocio = $_POST['nombre_negocio'] ?? '';
    $descripcion_negocio = $_POST['descripcion_negocio'] ?? '';

    // Preparar la consulta para insertar los datos en la base de datos
    $sql = "INSERT INTO clientes (nombre, apellido, numero_celular, correo_electronico, numero_documento, fecha_nacimiento, nombre_negocio, descripcion_negocio) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    if ($stmt = $conexion->prepare($sql)) {
        // Enlazar los parámetros con los valores
        $stmt->bind_param("ssssssss", $nombre, $apellido, $numero_celular, $correo_electronico, $numero_documento, $fecha_nacimiento, $nombre_negocio, $descripcion_negocio);
        
        // Ejecutar la consulta
        if ($stmt->execute()) {
            echo "Datos insertados correctamente.";
        } else {
            echo "Error al insertar los datos: " . $stmt->error;
        }

        // Cerrar la declaración
        $stmt->close();
    } else {
        echo "Error al preparar la consulta: " . $conexion->error;
    }

    // Cerrar la conexión
    $conexion->close();
} else {
    echo "Método de solicitud no válido.";
}
?>
