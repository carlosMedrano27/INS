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
                    <li class="active">Bit&aacute;cota</li>
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
                        <h2>HISTORIAL DE USUARIOS</h2>
                        <form method="POST" action="PHPBitacora.php">
                            <div class="col-md-3">
                                
                                <select class="form-control" name="select">
                                    <option>Seleccionar Historial</option>
                                    <option>Usuarios</option>
                                    <option>Productos</option>
                                    <option>Clientes</option>
                                    <option>Carrusel</option>
                                    <option>Onepage</option>
                                </select>
                            </div>
                            
                          <button class="btn btn-default btn-clean" >Ir</button>
                        </form>
                    </div>
                    <div class="tab-pane profile active content">
						<div class="row">
							<div class="col-md-12">
								<table class="table table-sorting table-striped table-hover datatable" id="resultados">  <thead>
                              <tr>
                                  <th width="8%">ID</th>
                                  <th width="15%">Fecha y Hora</th>
                                  <th width="8%">Codigo</th>
                                  <th width="10%">Apellido</th>
                                  <th width="10%">Correo</th>
                                  <th width="10%">Usuario</th>
                                  <th width="10%">Imagen</th>
                                  <th width="10%">Actividad</th>
                              </tr>
                          </thead>
                          <tbody>
                            <?php
                            include("conexion.php");
                            $result = mysqli_query($conexion,"SELECT * FROM historial_usuarios");
  						              while($fila = mysqli_fetch_array($result))
  						                {
  						                  ?>
                              <tr>
                                  <td><?php echo $fila['cod_usu']; ?></td>
                                  <td><?php echo $fila['Fecha_Hora']; ?></td>
                                  <td><?php echo $fila['Codigo']; ?></td>
                                  <td><?php echo $fila['Apellido']; ?></td>
                                  <td><?php echo $fila['Correo']; ?></td>
                                  <td><?php echo $fila['Usuario']; ?></td>
                                  <?php
                                $img= $fila['Img'];;
                                if ($img=="") {
                                  ?>
                                  <td><center><img height="40px" width="40px" src="img/Sinimagen.jpg"></center></td>
                                  <?php
                                }
                                else {
                                  ?>
                                  <td><center><img height="40px" width="40px" src="data:image/jpg;base64,<?php echo base64_encode($fila['Img']); ?> "/></center></td>
                                   <?php
                                }
                                 ?> 
                                  <td><?php echo $fila['Actividad']; ?></td>
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
