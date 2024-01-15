<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <input type="search" name="nombre" id="nombre">
        <input type="search" name="apellido" id="apellido">
        <input type="search" name="registro" id="registro">
        <input type="search" name="municipio" id="municipio">
        <select name="estados" id="estados">
          <option value="AGUACALIENTES">AGUACALIENTES</option>
          <option value="BAJA CALIFORNIA">BAJA CALIFORNIA</option>
          <option value="BAJA CALIFORNIA SUR">BAJA CALIFORNIA SUR</option>
          <option value="CAMPECHE">CAMPECHE</option>
          <option value="CHIAPAS">CHIAPAS</option>
          <option value="CHIHUAHUA">CHIHAHUA</option>
          <option value="CIUDAD DE MEXICO">CIUDAD DE MEXICO</option>
          <option value="COAHUILA">COAHUILA</option>
          <option value="COLIMA">COLIMA</option>
          <option value="DURANGO">DURANGO</option>
          <option value="ESTADO DE MEXICO">ESTADO DE MEXICO</option>
          <option value="GUANAJUATO">GUANAJUATO</option>
          <option value="GUERRERO">GUERRERO</option>
          <option value="HIDALGO">HIDALGO</option>
          <option value="JALISCO">JALISCO</option>
          <option value="MICHOACAN">MICHOACAN</option>
          <option value="MORELOS">MORELOS</option>
          <option value="NARAYIT">NAYARIT</option>
          <option value="NUEVO LEON">NUEVO LEON</option>
          <option value="OAXACA">OAXACA</option>
          <option value="PUEBLA">PUEBLA</option>
          <option value="QUERETARO">QUERETARO</option>
          <option value="QUINTANA ROO">QUINTANA ROO</option>
          <option value="SAN LUIS POTOSI">SAN LUIS POTOSI</option>
          <option value="SINALOA">SINALOA</option>
          <option value="SONORA">SONORA</option>
          <option value="TABASCO">TABASCO</option>
          <option value="TAMAULIPAS">TAMAULIPAS</option>
          <option value="TLAXCALA">TLAXCALA</option>
          <option value="VERACRUZ">VERACRUZ</option>
          <option value="YUCATAN">YUCATAN</option>
          <option value="ZACATECAS">ZACATECAS</option>
        </select>
        <input type="submit" value="buscar" name="buscar">
    </form>

    <div id = "table">
      <table>
           <thead>    
                        <tr>
                            <th>Nombre</th>
                            <th>Apellidos</th>
                            <th>Correo</th>
                            <th>Telefono Movil</th>
                            <th>Residencia</th>
                            <th>Registros</th>
                            <th>Estado Provincia</th>
                            <th>Notas</th>
                            <th>Mostrar info</th>
                            </tr>
                        </thead>
                        <tbody>

                                <?php
                                    
                                    require("conexion.php");
                                        

                                    $conexion = new mysqli($servername, $username, $password,$database);
                                    $salida="";
                                    $query = "SELECT * FROM contactos";

                                    if(isset($_POST['buscar'])){
                                        $nombre=$conexion->real_escape_string($_POST['nombre']);
                                        $apellido=$conexion->real_escape_string($_POST['apellido']);
                                        $registro=$_POST['registro'];
                                       
                                        
                                        
                                        $query = "SELECT * FROM contactos WHERE Nombre LIKE \"%$nombre%\" AND Apellidos LIKE \"%$apellido%\" AND Registros LIKE \"%$registro%\"";
                                        //$query = "SELECT * FROM contactos WHERE Apellidos LIKE \"%$apellido%\"";    
                                        
                                        $resultado = $conexion->query($query);
                                        if($resultado -> num_rows > 0){
                                            while($fila = $resultado->fetch_assoc()){
                                        ?>  
                                        <tr>
                                                <td><?php echo $fila['Nombre']; ?></td>
                                                <td><?php echo $fila['Apellidos']; ?></td>
                                                <td><?php echo $fila['Correoelectronico']; ?></td>
                                                <td><?php echo $fila['Telefonomovil']; ?></td>
                                                <td><?php echo $fila['Residencia']; ?></td>
                                                <td><?php echo $fila['Registros']; ?></td>
                                                <td><?php echo $fila['Estado_provincia']; ?></td>
                                                <td><?php echo $fila['Ciudad']; ?></td>
                                                <td><?php echo $fila['Notas']; ?></td> 
                                                <td><a class="btn btn-info" href="info.php?nombre=<?php echo $fila['Nombre']?>">info</a></td>
                                                        
                                        <?php 
                                            }
                                                                            
                                        }


                                            }else{
                                            echo "no hay resultados :(";
                                    }
                                        
                                            
                                            
                                            $conexion->close();
                                     
                                ?>
    

                            </tbody> 

      </table>

    </div>
</body>
</html>