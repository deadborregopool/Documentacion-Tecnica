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
