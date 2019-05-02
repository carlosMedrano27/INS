<?php
session_start();
if(@$_SESSION['Usuario'] == ""){
  header ("Location: ../");
}else{
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>One&Only</title>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <link rel="icon" type="image/ico" href="img/icono.ico"/>

    <link href="css/stylesheets.css" rel="stylesheet" type="text/css" />

    <script type='text/javascript' src='js/plugins/jquery/jquery.min.js'></script>
    <script type='text/javascript' src='js/plugins/jquery/jquery-ui.min.js'></script>
    <script type='text/javascript' src='js/plugins/jquery/jquery-migrate.min.js'></script>
    <script type='text/javascript' src='js/plugins/jquery/globalize.js'></script>
    <script type='text/javascript' src='js/plugins/bootstrap/bootstrap.min.js'></script>

    <script type='text/javascript' src='js/plugins/uniform/jquery.uniform.min.js'></script>
    <script type='text/javascript' src='js/plugins/datatables/jquery.dataTables.min.js'></script>

    <script type='text/javascript' src='js/plugins.js'></script>
    <script type='text/javascript' src='js/actions.js'></script>
    <script type='text/javascript' src='js/settings.js'></script>
</head>
<body class="bg-img-num1">
<?php
include 'Nav.php';
?>

        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><a href="Inicio.php">Inicio</a></li>
                    <li class="active">Mostrar Productos</li>
                </ol>
            </div>
        </div>
      <div class="row">
        <div class="col-md-2">
        <?php
        include("Lateral.php")
        ?>
        </div>

            <div class="col-md-10">

                <div class="block">
                    <div class="header">
                        <h2>Productos</h2>
                    </div>
                    <div class="tab-pane profile active content">
						<div class="row">
							<div class="col-md-12">
								<table class="table table-sorting table-striped table-hover datatable" id="resultados">  <thead>
                              <tr>
                                  <th width="10%">Codigo</th>
                                  <th width="8%">Nombre</th>
                                  <th width="15%">Descripción</th>
                                  <th width="8%">Genero</th>
                                  <th width="8%">Categoria</th>
                                  <th width="8%">Subcategoria</th>
                                  <th width="10%">Imagen Principal</th>
                                  <th width="10%">Imagen Secundaria</th>
                                  <th width="10%">Imagen Terciaria</th>
                                  <th width="5%">Modificar</th>
                                  <th width="5%">Eliminar</th>
                              </tr>
                          </thead>
                          <tbody>
                            <?php
                            include("conexion.php");
                            $result = mysqli_query($conexion,"SELECT * FROM productos order by CodigoBarra");
  						              while($fila = mysqli_fetch_array($result))
  						                {
  						                  ?>
                              <tr>
                                  <td><?php echo $fila['CodigoBarra']; ?></td>
                                  <td><?php echo $fila['Nombre']; ?></td>
                                  <td><?php echo $fila['Descripcion']; ?></td>
                                  <td><?php echo $fila['Genero']; ?></td>
                                  <td><?php echo $fila['Categoria']; ?></td>
                                  <td><?php echo $fila['Subcategoria']; ?></td>
                                <td><center><img height="40px" width="40px" src="data:image/jpg;base64,<?php echo base64_encode($fila['Img1']); ?> "/></center></td>
                                <?php
                                $img= $fila['Img2'];;
                                if ($img=="") {
                                  ?>
                                  <td><center><img height="40px" width="40px" src="img/Sinimagen.jpg"></center></td>
                                  <?php
                                }
                                else {
                                  ?>
                                  <td><center><img height="40px" width="40px" src="data:image/jpg;base64,<?php echo base64_encode($fila['Img2']); ?> "/></center></td>
                                <?php
                                }

                                 $img1= $fila['Img3'];;
                                 if ($img1=="") {
                                   ?>
                                   <td><center><img height="40px" width="40px" src="img/Sinimagen.jpg"></center></td>
                                   <?php
                                 }
                                 else {
                                   ?>
                                   <td><center><img height="40px" width="40px" src="data:image/jpg;base64,<?php echo base64_encode($fila['Img3']); ?> "/></center></td>
                                 <?php
                                 }
                                  ?>
                                    <td><center><a href="PModificar.php?CodigoBarra=<?php echo $fila['CodigoBarra']; ?>"><button type="button" class="btn btn-info btn-xs">
                    								<span class="glyphicon icon-pencil icon-2x"></span></button></a></center></td>
      						              <td><center><a href="ElProducto.php?CodigoBarra=<?php echo $fila['CodigoBarra']; ?>" type="button" class="button" onclick="return confirm('¿Estás seguro de que quieres eliminar este producto?');"><button type="button" class="btn btn-danger btn-xs">
                    								<span class="glyphicon icon-remove icon-2x"></span></button></a></center></td>
                              </tr>
                              <?php
                              }
                              ?>
                          </tbody>
                      </table>

                    </div>
                </div>

            </div>

        </div>

        <script src="js/jquery.dataTables.bootstrap.js"></script>
          <script src="js/doSearch.js"></script>
          <script src="js/king-table.js"></script>
</body>
</html>
<?php
  }
?>
