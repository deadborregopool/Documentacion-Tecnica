<?php
// Conexión a la base de datos
$conn = new mysqli("localhost", "root", "", "db_demo");

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Capturar datos del formulario
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$sueldo = $_POST['sueldo'];

// Validar datos (básico)
if (empty($nombre) || empty($apellido) || empty($sueldo) || !is_numeric($sueldo)) {
    echo "Datos inválidos. Por favor, inténtalo de nuevo.";
    exit;
}

// Insertar datos en la tabla
$sql = "INSERT INTO empleados (Nombre, Apellido, Sueldo) VALUES ('$nombre', '$apellido', '$sueldo')";

if ($conn->query($sql) === TRUE) {
    echo "Datos guardados correctamente.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
