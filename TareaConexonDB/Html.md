# Documentación del Código HTML: Formulario de Ingreso de Datos

## Descripción General
Este archivo HTML crea un formulario para capturar datos del usuario (nombre, apellido y sueldo). Incluye validación en el cliente mediante JavaScript para asegurarse de que los datos sean válidos antes de enviarlos al servidor.

---

## Código HTML

```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demo: Ingreso de Datos</title>
    <script>
        function validarFormulario() {
            const nombre = document.getElementById('nombre').value;
            const apellido = document.getElementById('apellido').value;
            const sueldo = document.getElementById('sueldo').value;

            if (!nombre || !apellido || !sueldo) {
                alert("Todos los campos son obligatorios.");
                return false;
            }

            if (isNaN(sueldo) || sueldo <= 0) {
                alert("El sueldo debe ser un número mayor a 0.");
                return false;
            }

            return true;
        }
    </script>
</head>
<body>
    <h1>Ingreso de Datos</h1>
    <form action="guardar_datos.php" method="POST" onsubmit="return validarFormulario();">
        <label for="nombre">Nombre:</label><br>
        <input type="text" id="nombre" name="nombre"><br><br>
        
        <label for="apellido">Apellido:</label><br>
        <input type="text" id="apellido" name="apellido"><br><br>
        
        <label for="sueldo">Sueldo:</label><br>
        <input type="text" id="sueldo" name="sueldo"><br><br>
        
        <button type="submit">Guardar</button>
    </form>
</body>
</html>
```
## Descripción del Script

### 1. Declaración de la Función
La función `validarFormulario` se utiliza para realizar validaciones en el cliente antes de enviar los datos al servidor. Se encuentra vinculada al formulario mediante el atributo `onsubmit`, lo que asegura que se ejecute automáticamente al intentar enviar el formulario.

### 2. Obtención de Valores
El script utiliza el método `document.getElementById` para capturar los valores ingresados en los campos del formulario:
- **Nombre**: Corresponde al campo de entrada identificado como `nombre`.
- **Apellido**: Corresponde al campo de entrada identificado como `apellido`.
- **Sueldo**: Corresponde al campo de entrada identificado como `sueldo`.

Estos valores se almacenan en variables locales dentro de la función.

### 3. Validación de Campos Vacíos
El script verifica si alguno de los campos está vacío:
- Si alguno de los valores capturados es vacío, muestra un mensaje de alerta al usuario indicando que todos los campos son obligatorios.
- En caso de falla, la función retorna `false`, deteniendo el envío del formulario.

### 4. Validación del Campo Sueldo
La función verifica que el valor ingresado en el campo sueldo sea un número válido mayor a 0:
- Utiliza `isNaN` para comprobar si el valor no es un número.
- Asegura que el valor sea mayor que 0.
- Si el valor no cumple con estas condiciones, muestra un mensaje de alerta al usuario y detiene el envío del formulario retornando `false`.

### 5. Retorno de Validación Exitosa
Si todas las validaciones son exitosas:
- La función retorna `true`.
- Esto permite que el formulario se envíe al servidor para su procesamiento.
