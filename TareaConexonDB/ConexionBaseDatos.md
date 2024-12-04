# Conexión a Base de Datos y Procesamiento de Datos

## Descripción General
Este código conecta una aplicación web a una base de datos MySQL. Su propósito es capturar información enviada desde un formulario, validar los datos y almacenarlos de forma segura en una tabla.

---

## Código PHP

```php
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

// Validar datos 
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

```

## Explicación del Código

### 1. Conexión a la Base de Datos
El código utiliza la clase `mysqli` para establecer una conexión con la base de datos:
- Se define el servidor (`localhost`), el usuario (`root`), la contraseña (vacía) y el nombre de la base de datos (`db_demo`).
- Si ocurre un error durante la conexión, se detiene la ejecución con `die()` y se muestra un mensaje de error.

### 2. Captura de Datos
Los datos enviados desde un formulario HTML mediante el método `POST` se asignan a las variables PHP:
- `$nombre`: Almacena el valor ingresado en el campo `name="nombre"`.
- `$apellido`: Almacena el valor ingresado en el campo `name="apellido"`.
- `$sueldo`: Almacena el valor ingresado en el campo `name="sueldo"`.

### 3. Validación de Datos
Antes de insertar los datos, se verifica que:
- Ninguno de los campos esté vacío utilizando `empty()`.
- El valor de `$sueldo` sea un número válido con `is_numeric()`.

Si los datos no son válidos:
- Se muestra un mensaje de error al usuario.
- El script se detiene con `exit`.

### 4. Inserción de Datos
Se prepara una consulta SQL para insertar los datos en la tabla `empleados`:
- `INSERT INTO empleados (Nombre, Apellido, Sueldo)`: Especifica las columnas donde se insertarán los datos.
- `VALUES ('$nombre', '$apellido', '$sueldo')`: Proporciona los valores capturados.

La consulta se ejecuta con `$conn->query($sql)`:
- Si tiene éxito, se muestra un mensaje indicando que los datos se guardaron correctamente.
- Si falla, se muestra un mensaje de error con los detalles del problema.

### 5. Cierre de Conexión
Finalmente, la conexión con la base de datos se cierra usando `$conn->close()` para liberar los recursos utilizados.
