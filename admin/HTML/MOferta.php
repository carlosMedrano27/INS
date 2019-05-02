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
                    <li class="active">Mostrar Ofertas</li>
                </ol>
            </div>
        </div>
      <div class="row">
        <div class="col-md-2">
        <?php
        include("Lateral.php")
        ?>
        </div>

            <div class="col-md-8">

                <div class="block">
                    <div class="header">
                        <h2>Categorias</h2>
                    </div>
                    <div class="tab-pane profile active content">
						<div class="row">
							<div class="col-md-12">
								<table class="table table-sorting table-striped table-hover datatable" id="resultados">  <thead>
                              <tr>
                                  <th width="20%">Codigo</th>
                                  <th width="20%">Codigo de Producto</th>
                                  <th width="20%">Oferta</th>
                                  <th width="20%">Modificar</th>
                                  <th width="20%">Eliminar</th>
                              </tr>
                          </thead>
                          <tbody>
                            <?php
                            include("conexion.php");
                            $result = mysqli_query($conexion,"SELECT * FROM ofertas order by CodOferta");
  						              while($fila = mysqli_fetch_array($result))
  						                {
  						                  ?>
                              <tr>
                                  <td><?php echo $fila['CodOferta']; ?></td>
                                  <td><?php echo $fila['CodigoBarra']; ?></td>
                                  <td><?php echo $fila['Oferta']; ?></td>
                                  <td><center><a href="OModificar.php?Cod=<?php echo $fila['CodOferta']; ?>"><button type="button" class="btn btn-info btn-xs">
                    								<span class="glyphicon icon-pencil icon-2x"></span></button></a></center></td>
      						              <td><center><a href="ElOferta.php?Cod=<?php echo $fila['CodOferta']; ?>" type="button" class="button" onclick="return confirm('¿Estás seguro de que quieres eliminar esta oferta?');"><button type="button" class="btn btn-danger btn-xs">
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
