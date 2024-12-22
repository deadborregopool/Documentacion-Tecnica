<?php
// Nombre del archivo donde se guardarán los contactos
define("ARCHIVO_CONTACTOS", "contactos.txt");

// Función para obtener todos los contactos como un array
function obtenerContactos() {
    $contactos = [];
    if (file_exists(ARCHIVO_CONTACTOS)) {
        $archivo = fopen(ARCHIVO_CONTACTOS, "r");
        while (($linea = fgets($archivo)) !== false) {
            $contactos[] = explode(",", trim($linea)); // Dividir cada línea en un array
        }
        fclose($archivo);
    }
    return $contactos;
}

// Función para guardar todos los contactos en el archivo
function guardarContactos($contactos) {
    $archivo = fopen(ARCHIVO_CONTACTOS, "w");
    foreach ($contactos as $contacto) {
        fputcsv($archivo, $contacto); // Guardar el array como línea de texto
    }
    fclose($archivo);
}

// Función para agregar un nuevo contacto
function agregarContacto($nombre, $apellido, $telefono, $email) {
    $contactos = obtenerContactos();
    $contactos[] = [$nombre, $apellido, $telefono, $email]; // Añadir el nuevo contacto
    guardarContactos($contactos); // Guardar en el archivo
    echo "Contacto agregado exitosamente.<br>";
}

// Función para modificar un contacto existente
function modificarContacto($index, $nombre, $apellido, $telefono, $email) {
    $contactos = obtenerContactos();
    if (isset($contactos[$index])) {
        $contactos[$index] = [$nombre, $apellido, $telefono, $email]; // Actualizar los datos
        guardarContactos($contactos);
        echo "Contacto modificado exitosamente.<br>";
    } else {
        echo "El contacto no existe.<br>";
    }
}

// Función para eliminar un contacto
function eliminarContacto($index) {
    $contactos = obtenerContactos();
    if (isset($contactos[$index])) {
        unset($contactos[$index]); // Eliminar contacto del array
        guardarContactos($contactos);
        echo "Contacto eliminado exitosamente.<br>";
    } else {
        echo "El contacto no existe.<br>";
    }
}

// Función para listar todos los contactos
function listarContactos() {
    $contactos = obtenerContactos();
    if (count($contactos) > 0) {
        echo "<table border='1'>
                <tr><th>#</th><th>Nombre</th><th>Apellido</th><th>Teléfono</th><th>Email</th><th>Acciones</th></tr>";
        foreach ($contactos as $index => $contacto) {
            echo "<tr>
                    <td>$index</td>
                    <td>{$contacto[0]}</td>
                    <td>{$contacto[1]}</td>
                    <td>{$contacto[2]}</td>
                    <td>{$contacto[3]}</td>
                    <td>
                        <a href='?accion=editar&index=$index'>Editar</a> | 
                        <a href='?accion=eliminar&index=$index'>Eliminar</a>
                    </td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "No hay contactos guardados.<br>";
    }
}

// Controller : Procesar acciones del CRUD
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $accion = $_POST['accion'];
    if ($accion === 'agregar') {
        agregarContacto($_POST['nombre'], $_POST['apellido'], $_POST['telefono'], $_POST['email']);
    } elseif ($accion === 'modificar') {
        modificarContacto($_POST['index'], $_POST['nombre'], $_POST['apellido'], $_POST['telefono'], $_POST['email']);
    }
} elseif (isset($_GET['accion'])) {
    $accion = $_GET['accion'];
    if ($accion === 'eliminar' && isset($_GET['index'])) {
        eliminarContacto($_GET['index']);
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>CRUD de Contactos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f9f9f9;
            color: #333;
        }
        h1, h2 {
            color: #4CAF50;
        }
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            margin-bottom: 20px;
        }
        form label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }
        form input[type="text"],
        form input[type="email"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        form button {
            background-color: #4CAF50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        form button:hover {
            background-color: #45a049;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            text-align: left;
            padding: 12px;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        a {
            color: #4CAF50;
            text-decoration: none;
            font-weight: bold;
        }
        a:hover {
            text-decoration: underline;
        }
        .cancel-button {
            display: inline-block;
            margin-top: 20px;
            background-color: #f44336;
            color: #fff;
            padding: 10px 15px;
            border-radius: 4px;
            text-decoration: none;
            font-weight: bold;
        }
        .cancel-button:hover {
            background-color: #d32f2f;
        }
    </style>
</head>
<body>
    <h1>Agenda de Contactos Local con archivo de texto</h1>

    <!-- Formulario para añadir o modificar un contacto -->
    <h2><?php echo isset($_GET['accion']) && $_GET['accion'] === 'editar' ? "Editar Contacto" : "Añadir Contacto"; ?></h2>
    <form method="POST" action="">
        <?php
        if (isset($_GET['accion']) && $_GET['accion'] === 'editar' && isset($_GET['index'])) {
            $index = $_GET['index'];
            $contactos = obtenerContactos();
            if (isset($contactos[$index])) {
                $contacto = $contactos[$index];
                echo "<input type='hidden' name='accion' value='modificar'>
                      <input type='hidden' name='index' value='$index'>
                      <label>Nombre: <input type='text' name='nombre' value='{$contacto[0]}' required></label><br>
                      <label>Apellido: <input type='text' name='apellido' value='{$contacto[1]}' required></label><br>
                      <label>Teléfono: <input type='text' name='telefono' value='{$contacto[2]}' required></label><br>
                      <label>Email: <input type='email' name='email' value='{$contacto[3]}' required></label><br>
                      <button type='submit'>Modificar</button>";
            }
        } else {
            echo "<input type='hidden' name='accion' value='agregar'>
                  <label>Nombre: <input type='text' name='nombre' required></label><br>
                  <label>Apellido: <input type='text' name='apellido' required></label><br>
                  <label>Teléfono: <input type='text' name='telefono' required></label><br>
                  <label>Email: <input type='email' name='email' required></label><br>
                  <button type='submit'>Añadir</button>";
        }
        ?>
    </form>

    <?php
    // Mostrar botón "Cancelar edición" si estás en modo editar
    if (isset($_GET['accion']) && $_GET['accion'] === 'editar') {
        echo "<a href='contactos.php'>Cancelar edición</a>";
    }
    ?>

    <!-- Listar contactos -->
    <h2>Lista de Contactos</h2>
    <?php listarContactos(); ?>
</body>
</html>
