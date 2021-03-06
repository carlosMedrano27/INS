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
                    <li class="active">Carrusel</li>
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
                              <th width="5%">Codigo</th>
                              <th width="15%">Texto 1</th>
                              <th width="15%">Texto 2</th>
                              <th width="15%">Texto 3</th>
                              <th width="15%">Texto 4</th>
                              <th width="25%">Imagen</th>
                              <th width="10%">Modificar</th>
                                </tr>
                      </thead>
                      <tbody>
                        <?php
                        include("conexion.php");
                        $result = mysqli_query($conexion,"SELECT * FROM carrusel order by Codigo");
                        while($fila = mysqli_fetch_array($result))
                          {
                            ?>
                          <tr>
                              <td><?php echo $fila['Codigo']; ?></td>
                              <td><?php echo $fila['Texto1']; ?></td>
                              <td><?php echo $fila['Texto2']; ?></td>
                              <td><?php echo $fila['Texto3']; ?></td>
                              <td><?php echo $fila['Texto4']; ?></td>
                              <td><center><img height="40px" width="80px" src="data:image/jpg;base64,<?php echo base64_encode($fila['Imagen']); ?> "/></center></td>
                              <td><center><a href="Carrusel.php?Cod=<?php echo $fila['Codigo']; ?>"><button type="button" class="btn btn-info btn-xs">
                                <span class="glyphicon icon-pencil icon-2x"></span></button></a></center></td>

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
