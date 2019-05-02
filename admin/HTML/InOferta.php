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

    <link rel="icon" type="image/ico" href="favicon.ico"/>

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
                    <li class="active">Ingresar Oferta</li>
                </ol>
            </div>
        </div>
      <div class="row">
        <div class="col-md-2">
        <?php
        include("Lateral.php")
        ?>
        </div>


          <form method="post" action="OGuardar.php" enctype="multipart/form-data">
            <div class="col-md-8">

                <div class="block">
                    <div class="header">
                        <h2>Ingresar Oferta</h2>
                    </div>
                    <div class="content controls">

                        <div class="form-row">
                            <div class="col-md-3">Monto Oferta:</div>
                            <div class="col-md-9">
                                <input id="spinner3" class="form-control" name="precio" required value="0"/>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-3">Codigo de Producto:</div>
                            <div class="col-md-9"><input type="text" required name="codigo" class="form-control" Placeholder="Codigo de Barra del Producto"/></div>
                        </div>
                        <div class="col-md-8"> </div>
                        <div class="col-md-2">
                            <button class="btn btn-default btn-block btn-clean" type="submit">Guardar</button>
                            </div>
                        <div class="col-md-2">
                          <button class="btn btn-default btn-block btn-clean" type="reset">Borrar</button>
                        </div>
                    </div>
                </div>

            </div>



                    </div>
                </div>

           </div>
          </div>
          </form>
    </div>

</body>
</html>
<?php
  }
?>
