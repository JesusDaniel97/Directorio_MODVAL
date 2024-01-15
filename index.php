<?php 
include("../Admin/conexion.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" >
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" ></script>

<script src="../Alert/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="../Alert/sweetalert.css">

<!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">

 <!-- ESTILO CURSOS DE PROGRAMACION -->
 <link rel="stylesheet" href="../css/style_cp.css">


<title>Consulta basica</title>
</head>
<body>






<!-- NAVBAR -->
<?php include("../Admin/navbar.php"); ?>
<!-- END NAVBAR -->


<style>
  th, td{
    text-align: left;
  }
  .h2g{
    color: blue;
    font-size: 26px;
  }
  .pg{
    line-height: 2px;
  }
</style>








<!-- buscador basico -->
<div class="center mt-5">
    <div class="card pt-3" >
            <p style="font-weight: bold; color: #0F6BB7; font-size: 22px;">Filtro de buscador</p>
        <div class="container-fluid mt-2 p-4">


        
 
      

       
     

            <div class="card col-12 mt-2">
                <div class="card-body">

                    <div class="table-responsive">
                

<?php 
if (!isset($_POST['buscar'])){$_POST['buscar'] = '';}
if (!isset($_POST['buscacategoria'])){$_POST['buscacategoria'] = '';}
if (!isset($_POST['color'])){$_POST['color'] = '';}
if (!isset($_POST['buscafechadesde'])){$_POST['buscafechadesde'] = '';}
if (!isset($_POST['buscafechahasta'])){$_POST['buscafechahasta'] = '';}
if (!isset($_POST['buscapreciodesde'])){$_POST['buscapreciodesde'] = '';}
if (!isset($_POST['buscapreciohasta'])){$_POST['buscapreciohasta'] = '';}
if (!isset($_POST["orden"])){$_POST["orden"] = '';} 
?>



     


    <form id="form2" name="form2" method="POST" action="index.php">
            <div class="col-12 row m-0 p-0">

                <div class="mb-3">
                        <label  class="form-label">Palabra a buscar</label>
                        <input type="text" class="form-control" id="buscar" name="buscar" value="<?php echo $_POST["buscar"] ?>" >
                </div>

                <h4 class="card-title">Filtro de búsqueda</h4>  
                
                <div class="col-12">

                            <table class="table">
                                    <thead>
                                            <tr class="filters">
                                                    <th>
                                                            Categoría
                                                            <select id="assigned-tutor-filter" id="buscacategoria" name="buscacategoria" class="form-control mt-2" style="border: #bababa 1px solid; color:#000000;" >
                                                                    <?php if ($_POST["buscacategoria"] != ''){ ?>
                                                                    <option value="<?php echo $_POST["buscacategoria"]; ?>"><?php echo $_POST["buscacategoria"]; ?></option>
                                                                    <?php } ?>
                                                                    <option value="">Todos</option>
                                                                    <option value="Moto">Moto</option>
                                                                    <option value="Barco">Barco</option>
                                                                    <option value="Coche">Coche</option>
                                                            </select>
                                                    </th>
                                                    <th>
                                                            Precio desde:
                                                            <input type="number" id="buscapreciodesde" name="buscapreciodesde" class="form-control mt-2" value="<?php echo $_POST["buscapreciodesde"]; ?>" style="border: #bababa 1px solid; color:#000000;" >
                                                    </th>
                                                    <th>
                                                            Precio hasta:
                                                            <input type="number" id="buscapreciohasta" name="buscapreciohasta" class="form-control mt-2" value="<?php echo $_POST["buscapreciohasta"]; ?>" style="border: #bababa 1px solid; color:#000000;" >
                                                    </th>
                                            
                                                    <th>
                                                            Fecha desde:
                                                            <input type="date" id="buscafechadesde" name="buscafechadesde" class="form-control mt-2" value="<?php echo $_POST["buscafechadesde"]; ?>" style="border: #bababa 1px solid; color:#000000;" >
                                                    </th>
                                                    <th>
                                                            Fecha hasta:
                                                            <input type="date" id="buscafechahasta" name="buscafechahasta" class="form-control mt-2" value="<?php echo $_POST["buscafechahasta"]; ?>" style="border: #bababa 1px solid; color:#000000;" >
                                                    </th>
                                                    <th>
                                                            Color
                                                            <select id="subject-filter" id="color" name="color" class="form-control mt-2" style="border: #bababa 1px solid; color:#000000;" >
                                                                    <?php if ($_POST["color"] != ''){ ?>
                                                                    <option value="<?php echo $_POST["color"]; ?>"><?php echo $_POST["color"]; ?></option>
                                                                    <?php } ?>
                                                                    <option value="">Todos</option>
                                                                    <option style="color: blue;" value="Azul">Azul</option>
                                                                    <option style="color: red;" value="Rojo">Rojo</option>
                                                                    <option style="color: orange;" value="Amarillo">Amarillo</option>
                                                            </select>
                                                    </th>
                                            </tr>
                                    </thead>
                            </table>
                    </div>


                    <h4 class="card-title">Ordenar por</h4>  
                
                <div class="col-11">

                            <table class="table">
                                    <thead>
                                            <tr class="filters">
                                                    <th>
                                                            Selecciona el orden
                                                            <select id="assigned-tutor-filter" id="orden" name="orden" class="form-control mt-2" style="border: #bababa 1px solid; color:#000000;" >
                                                                    <?php if ($_POST["orden"] != ''){ ?>
                                                                    <option value="<?php echo $_POST["orden"]; ?>">
                                                                    <?php 
                                                                    if ($_POST["orden"] == '1'){echo 'Ordenar por titulo';} 
                                                                    if ($_POST["orden"] == '2'){echo 'Ordenar por categoria';} 
                                                                    if ($_POST["orden"] == '3'){echo 'Ordenar por color';} 
                                                                    if ($_POST["orden"] == '4'){echo 'Ordenar por precio de menor a mayor';} 
                                                                    if ($_POST["orden"] == '5'){echo 'Ordenar por precio de mayor a menor';} 
                                                                    if ($_POST["orden"] == '6'){echo 'Ordenar por fecha de reciente';} 
                                                                    if ($_POST["orden"] == '7'){echo 'Ordenar por fecha de antigua';} 
                                                                    ?>
                                                                    </option>
                                                                    <?php } ?>
                                                                    <option value=""></option>
                                                                    <option value="1">Ordenar por titulo</option>
                                                                    <option value="2">Ordenar por categoria</option>
                                                                    <option value="3">Ordenar por color</option>
                                                                    <option value="4">Ordenar por precio de menor a mayor</option>
                                                                    <option value="5">Ordenar por precio de mayor a menor</option>
                                                                    <option value="6">Ordenar por fecha de reciente</option>
                                                                    <option value="7">Ordenar por fecha de antigua</option>
                                                            </select>
                                                    </th>
                                              
                                                  
                                          
                                            </tr>
                                    </thead>
                            </table>
                    </div>


                    <div class="col-1">
                            <input type="submit" class="btn " value="Ver" style="margin-top: 38px; background-color:midnightblue; color: white;">
                    </div>
            </div>


            <?php 
            /*FILTRO de busqueda////////////////////////////////////////////*/
            if ($_POST['buscar'] == ''){ $_POST['buscar'] = ' ';}
            $aKeyword = explode(" ", $_POST['buscar']);
            
          
            if ($_POST["buscar"] == '' AND $_POST['buscacategoria'] == '' AND $_POST['color'] == '' AND $_POST['buscafechadesde'] == '' AND $_POST['buscafechahasta'] == ''AND $_POST['buscapreciodesde'] == '' AND $_POST['buscapreciohasta'] == ''){ 
                    $query ="SELECT * FROM articulos_cp ";
            }else{


                    $query ="SELECT * FROM articulos_cp ";

            if ($_POST["buscar"] != '' ){ 
                    $query .= "WHERE (titulo LIKE LOWER('%".$aKeyword[0]."%') OR descripcion LIKE LOWER('%".$aKeyword[0]."%')) ";
            
            for($i = 1; $i < count($aKeyword); $i++) {
              if(!empty($aKeyword[$i])) {
                  $query .= " OR titulo LIKE '%" . $aKeyword[$i] . "%' OR descripcion LIKE '%" . $aKeyword[$i] . "%'";
              }
            }

            }

            if ($_POST["buscacategoria"] != '' ){
                    $query .= " AND categoria = '".$_POST['buscacategoria']."' ";
            }

            if ($_POST["buscafechadesde"] != '' ){
                    $query .= " AND fecha BETWEEN '".$_POST["buscafechadesde"]."' AND '".$_POST["buscafechahasta"]."' ";
            }

            if ( $_POST['buscapreciodesde'] != '' ){
                    $query .= " AND precio >= '".$_POST['buscapreciodesde']."' ";
            }

            if ( $_POST['buscapreciohasta'] != '' ){
                    $query .= " AND precio <= '".$_POST['buscapreciohasta']."' ";
            }
                  
            if ($_POST["color"] != '' ){
                    $query .= " AND color = '".$_POST["color"]."' ";
            }

            if ($_POST["orden"] == '1' ){
                    $query .= " ORDER BY titulo ASC ";
            }

            if ($_POST["orden"] == '2' ){
                    $query .= " ORDER BY categoria ASC ";
            }

            if ($_POST["orden"] == '3' ){
                    $query .= " ORDER BY color ASC ";
            }

            if ($_POST["orden"] == '4' ){
                    $query .= " ORDER BY precio ASC ";
            }

            if ($_POST["orden"] == '5' ){
                    $query .= " ORDER BY precio DESC ";
            }

            if ($_POST["orden"] == '6' ){
                    $query .= " ORDER BY fecha ASC ";
            }

            if ($_POST["orden"] == '7' ){
                    $query .= " ORDER BY fecha DESC ";
            }
            
          
        }


            $sql = $conexion->query($query);

            $numeroSql = mysqli_num_rows($sql);

            ?>
            <p style="font-weight: bold; color:midnightblue;"><i class="mdi mdi-file-document"></i> <?php echo $numeroSql; ?> Resultados encontrados</p>
    </form>


    <div class="table-responsive">
            <table class="table">
                    <thead>
                            <tr style="background-color:midnightblue; color:#FFFFFF;">
                                    <th style=" text-align: center;"> Titulo </th>
                                    <th style=" text-align: center;"> Categoría </th>
                                    <th style=" text-align: center;"> Color </th>
                                    <th style=" text-align: center;"> Precio </th>
                                    <th style=" text-align: center;"> Fecha </th>
                            </tr>
                    </thead>
                    <tbody>
                    <?php While($rowSql = $sql->fetch_assoc()) {   ?>
                  
                            <tr>
                            <td style="text-align: center;"><?php echo $rowSql["titulo"]; ?></td>
                            <td style="text-align: center;"><?php echo $rowSql["categoria"]; ?></td>
                            <td style="text-align: center;"><?php echo $rowSql["color"]; ?></td>
                            <td style="text-align: center;"><?php echo $rowSql["precio"]; ?> €</td>
                            <td style=" text-align: center;"><?php echo $rowSql["fecha"]; ?></td>
                            </tr>
                  
                  <?php } ?>
                    </tbody>
            </table>
    </div>




















                    </div>

                </div>
            </div>

        </div>



      </div>
</div>
<!-- END buscador basico -->







</body>
</html>
//https://skillsforall.com/course/introduction-to-cybersecurity?courseLang=en-US
