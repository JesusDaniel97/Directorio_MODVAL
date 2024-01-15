<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "directorio";
           
           
    $conexion = new mysqli($servername, $username, $password,$database);
        if ($conexion->connect_error) {
            die("Connection failed: " . $conexion->connect_error);
        }
            
    ?>
