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
                    <li class="active">Mostrar Subcategorias</li>
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
                    <div class="content">
                      <table class="table table-sorting table-striped table-hover datatable" id="resultados">
                          <thead>
                              <tr>

                                  <th width="10%"><center>Codigo</center></th>
                                  <th width="25%"><center>Sub Categoria</center></th>
                                  <th width="25%"><center>Categoria</center></th>
                                  <th width="30%"><center>Genero</center></th>
                                  <th width="5%"><center>Modificar</center></th>
                                  <th width="5%"><center>Eliminar</center></th>

                              </tr>
                          </thead>
                          <tbody>
                            <?php
                            include("conexion.php");
                            $query="SELECT*FROM subcategorias";
                            $resultado= $conexion->query($query);
                            while ($row = $resultado->fetch_assoc()){
                            ?>
                              <tr>
                                  <td><center><?php echo $row['Id']; ?></center></td>
                                  <td><center><?php echo $row['Nombre']; ?></center></td>
                                  <td><center><?php echo $row['Categoria']; ?></center></td>
                                  <td><center><?php echo $row['Genero']; ?></center></td>
                                  <td><center><a href="SModificar.php?Codigo=<?php echo $row['Id']; ?>"><button type="button" class="btn btn-info btn-xs">
                      								<span class="glyphicon icon-pencil icon-2x"></span></button></a></center></td>
        						              <td><center><a href="ElSubCategoria.php?Codigo=<?php echo $row['Id']; ?>" type="button" class="button" onclick="return confirm('¿Estás seguro de que quieres eliminar la subcategoria?');"><button type="button" class="btn btn-danger btn-xs">
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
