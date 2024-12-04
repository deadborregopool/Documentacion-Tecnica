# Conexión a Base de Datos y Procesamiento de Datos

## Descripción General
Este código conecta una aplicación web a una base de datos MySQL. Su propósito es capturar información enviada desde un formulario, validar los datos y almacenarlos de forma segura en una tabla.

---

## Código PHP

```php
<?php
// Establecer conexión con la base de datos
$servidor = "localhost";
$usuario = "root";
$contrasena = "";
$baseDeDatos = "db_demo";

$conn = new mysqli($servidor, $usuario, $contrasena, $baseDeDatos);

// Verificar si la conexión fue exitosa
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Capturar datos enviados desde el formulario
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$sueldo = $_POST['sueldo'];

// Validar que los datos sean correctos
if (empty($nombre) || empty($apellido) || empty($sueldo) || !is_numeric($sueldo)) {
    echo "Por favor, revisa los datos ingresados. Asegúrate de llenar todos los campos y que el sueldo sea un número válido.";
    exit;
}

// Preparar la consulta SQL para insertar los datos en la tabla
$sql = "INSERT INTO empleados (Nombre, Apellido, Sueldo) VALUES ('$nombre', '$apellido', '$sueldo')";

// Ejecutar la consulta e informar al usuario si fue exitosa o no
if ($conn->query($sql) === TRUE) {
    echo "Los datos se han guardado correctamente.";
} else {
    echo "Hubo un problema al guardar los datos: " . $conn->error;
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
