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

## Descripción del HTML

### 1. Estructura del Documento
El HTML sigue la estructura estándar de un documento web:
- Declara el estándar HTML5 con `<!DOCTYPE html>`.
- Define el idioma del contenido como inglés utilizando el atributo `lang="en"` en la etiqueta `<html>`.

### 2. Cabecera del Documento (`<head>`)
La cabecera incluye:
- **Codificación de caracteres**: Se establece como UTF-8 para soportar caracteres internacionales.
- **Vista responsiva**: La metaetiqueta `viewport` asegura que el diseño se adapte a diferentes dispositivos, como móviles y tablets.
- **Título de la página**: Se define como "Demo: Ingreso de Datos", que será visible en la pestaña del navegador.

### 3. Encabezado de la Página
Dentro del cuerpo (`<body>`), el encabezado principal es un elemento `<h1>` con el texto "Ingreso de Datos". Esto actúa como el título principal de la página y describe su propósito.

### 4. Formulario
El formulario es el elemento central del HTML y permite capturar datos del usuario. Sus características principales son:
- **Acción (`action`)**: Envía los datos al archivo `guardar_datos.php` para su procesamiento en el servidor.
- **Método (`method`)**: Utiliza el método `POST` para enviar los datos de forma segura.
- **Validación (`onsubmit`)**: Llama a la función de JavaScript `validarFormulario` antes de enviar el formulario. Si la función devuelve `false`, el envío se detiene.

### 5. Campos del Formulario
El formulario incluye tres campos de entrada, cada uno con una etiqueta asociada:
1. **Nombre**:
   - Etiqueta: "Nombre".
   - Campo de texto donde el usuario ingresa su nombre.
   - Identificado por el atributo `id="nombre"` y enviado con el nombre `name="nombre"`.
2. **Apellido**:
   - Etiqueta: "Apellido".
   - Campo de texto donde el usuario ingresa su apellido.
   - Identificado por el atributo `id="apellido"` y enviado con el nombre `name="apellido"`.
3. **Sueldo**:
   - Etiqueta: "Sueldo".
   - Campo de texto donde el usuario ingresa un valor numérico para el sueldo.
   - Identificado por el atributo `id="sueldo"` y enviado con el nombre `name="sueldo"`.

### 6. Botón de Envío
El botón "Guardar" envía los datos al servidor al ser clicado, siempre y cuando las validaciones sean exitosas.

