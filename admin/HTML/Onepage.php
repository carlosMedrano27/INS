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
                    <li class="active">Onepage</li>
                </ol>
            </div>
        </div>
      <div class="row">
        <div class="col-md-2">
        <?php
        include("Lateral.php")
        ?>
        </div>

          <div class="col-md-5">

            <?php
            include("conexion.php");
            $cod=$_REQUEST['Cod'];
            $result = mysqli_query($conexion,"SELECT * FROM onepage Where Codigo='$cod'");
            while($fila = mysqli_fetch_array($result))
              {
                ?>
             <form method="post" action="GOnepage.php?Cod=<?php echo $fila['Codigo']; ?>" enctype="multipart/form-data">

                <div class="block">
                    <div class="header">
                        <h2>Agregar Textos</h2>

                    </div>

                    <div class="content controls">


                        <div class="form-row">
                            <div class="col-md-2">Texto 1:</div>
                            <div class="col-md-10"><input type="text" class="form-control" value="<?php echo $fila['Texto1']; ?>" name="texto1" placeholder="Introducir Texto" rows="3"></div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-2">Texto 2:</div>
                            <div class="col-md-10"><input type="text" class="form-control" input type="text" name="texto2" value="<?php echo $fila['Texto2']; ?>" placeholder="Introducir Texto" rows="3"></div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-2">Texto 3:</div>
                            <div class="col-md-10"><input type="text" class="form-control" input type="text" name="texto3" value="<?php echo $fila['Texto3']; ?>" placeholder="Introducir Texto" rows="3"></div>
                        </div>
                        
                        <div class="col-md-8"> </div>
                        <div class="col-md-4">

                        <button class="btn btn-default btn-block btn-clean" type="submit">Guardar</button>
                    </div>

            </div>

            </form>

          </div>
          </div>
          <div class="col-md-5">

            <form method="post" action="GIOnepage.php?Cod=<?php echo $fila['Codigo']; ?>" enctype="multipart/form-data">
                <div class="block">
                    <div class="header">
                        <h2>Agregar Imagen</h2>
                    </div>
                    <div class="content controls">
                    <div class="col-md-2"> </div>
                              <div class="col-md-8">
                        <div class="input-group file">
                <input type="text" class="form-control" placeholder="img/Carrusel.png"/>
                <input type="file" name="img" onchange='Mostrar1(event)'/>
                <span class="input-group-btn">
                 <button class="btn btn-primary" type="button">Buscar</button>
                 </span>
                </div>
                </div>

                    <center>
                    <br>
                    <br>
                    <br>
                          <img src="data:image/jpg;base64,<?php echo base64_encode($fila['Imagen']); ?>" id="Abrir1" class="img-rounded" height="200px" width="475px"/></center>
                              <script>
                              var Mostrar1 = function(event) {
                                var input = event.target;

                                var reader = new FileReader();
                                reader.onload = function(){
                                  var dataURL = reader.result;
                                  var output = document.getElementById('Abrir1');
                                  output.src = dataURL;
                                };
                                reader.readAsDataURL(input.files[0]);
                              };
                              </script>
                              <br>
                              <?php
                                }
                              ?>

<div class="col-md-8"> </div>
<div class="col-md-4">

<button class="btn btn-default btn-block btn-clean" type="submit">Guardar</button>
</div>
</div>



          </div>
          </form>
        </div>
    </div>
</body>
</html>
<?php
  }
?>
