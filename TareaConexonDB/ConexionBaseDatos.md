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

```

# Explicación del Código

## 1. Conexión a la Base de Datos
El código utiliza la clase `mysqli` para establecer una conexión con la base de datos:
- Se especifican los detalles del servidor, el usuario, la contraseña y el nombre de la base de datos.
- Si ocurre un error en la conexión, el script se detiene y se muestra un mensaje de error.

## 2. Captura de Datos
Los datos se obtienen desde un formulario HTML mediante el método `POST`. Los valores ingresados en los campos del formulario se asignan a variables PHP (`$nombre`, `$apellido`, `$sueldo`).

## 3. Validación de Datos
Antes de insertar los datos, se verifica que:
- Ninguno de los campos esté vacío.
- El sueldo sea un número válido.

Si no se cumplen estas condiciones, se muestra un mensaje de error y el script se detiene.

## 4. Inserción de Datos
Se prepara una consulta SQL para agregar los datos capturados a la tabla `empleados`. Luego, se ejecuta esta consulta:
- Si la operación es exitosa, se informa al usuario.
- En caso contrario, se muestra el error específico.

## 5. Cierre de Conexión
Finalmente, se cierra la conexión con la base de datos usando `$conn->close()`. Esto es importa
