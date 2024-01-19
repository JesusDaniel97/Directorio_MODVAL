<?php
    require("conexion.php");

    $conexion = new mysqli($servername, $username, $password, $database);

    // Verificar la conexión
    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }

    $usuario = $_POST["usuario"];
    $contraseña = $_POST["contrasenia"];

    // Utilizar consultas preparadas para evitar la inyección SQL
    $sql = "SELECT u.id, r.permisos AS role, Contrasenia FROM registro u INNER JOIN permiso r ON r.id = u.id_permiso WHERE Usuario = ? AND Contrasenia = ?";
    
    // Preparar la consulta
    $stmt = $conexion->prepare($sql);

    // Vincular los parámetros
    $stmt->bind_param("ss", $usuario, $contraseña);

    // Ejecutar la consulta
    $stmt->execute();

    // Obtener el resultado
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        while ($fila = $resultado->fetch_assoc()) {
            session_start();
            $_SESSION["usuario"] = $usuario;

            // Utilizar un switch para manejar diferentes roles
            switch ($fila['role']) {
                case "Lector":
                    header('Location: Sesion.php');
                    break;
                case "Administrador":
                    header('Location: Administrador.php');
                    break;
                case "Archivos":
                    header('Location: Lector_archivos.php');
                    break;
                // Puedes añadir más roles según sea necesario
            }
        }
    } else {
        header("Location: index.html");
    }

    // Cerrar la consulta y la conexión
    $stmt->close();
    $conexion->close();
?>
