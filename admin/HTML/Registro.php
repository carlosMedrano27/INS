<?php
session_start();
if(@$_SESSION['Usuario'] == ""){
  header ("Location: ../");
}else{

  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>TADESA</title>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <link rel="icon" type="image/ico" href="img/talleres.ico"/>

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
                    <li class="active">Registrar Usuarios</li>
                </ol>
            </div>
        </div>
      <div class="row">
        <div class="col-md-2">
        <?php
        include("Lateral.php")
        ?>
        </div>


          <form method="POST" action="guardar.php" enctype="multipart/form-data">

            <div class="col-md-1">
            </div>

            <div class="col-md-8">

                <div class="block block-drop-shadow">

                    <div class="header">
                        <h2>Registrar Usuario</h2>
                    </div>

                      <div class="content controls">
                        <div class="form-row">
                            <div class="col-md-3">Nombre</div>
                            <div class="col-md-9">
                                <input type="text" name="nombre" placeholder="Ingresar Nombre">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-3">Apellido</div>
                            <div class="col-md-9">
                                <input type="text" name="apellido" placeholder="Ingresar Apellido">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-3">Correo:</div>
                            <div class="col-md-9">
                                <input type="text" name="correo" placeholder="Ingresar correo">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-3">Nit:</div>
                            <div class="col-md-9">
                                <input type="text" name="nit" placeholder="Ingresar Nit">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-3">Telefono:</div>
                            <div class="col-md-9">
                                <input type="text" name="telefono" placeholder="Ingresar Telefono">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-3">Pais:
                            </div>
                            <div class="col-md-9">
                                <select class="form-control" id="Pais" name="Pais">
			                        <option>-Selecciona Pais-</option>
			                        <?php
                                    include('conexion.php');
                                    $query = "SELECT * FROM Paises";
                                    $result = mysqli_query($conexion, $query);

                                    while($row = mysqli_fetch_array($result))
                                    {
                                        echo '<option value="' .$row["CodPais"]. '">' .$row["Pais"]. '</option>';
                                    }
                                    mysqli_close($conexion);
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-3">Usuario:</div>
                            <div class="col-md-9">
                                <input type="text" name="usuario" placeholder="Ingresar Usuario">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-3">Contraseña</div>
                            <div class="col-md-9">
                                <input type="password" name="clave"  placeholder="Ingresar contraseña">
                            </div>
                        </div>
                        <div class="tar">
                        <button class="btn btn-default btn-clean">Guardar</button>
                    </div>
                </div>
                    </form>

                    </div>
                </div>
           </div>
       </div>
   </div>
</body>
</html>
<?php
}
?>
