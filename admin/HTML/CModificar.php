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
                    <li class="active">Modificar Categorias</li>
                </ol>
            </div>
        </div>
      <div class="row">
        <div class="col-md-2">
        <?php
        include("Lateral.php")
        ?>
        </div>
        <?php
        include("conexion.php");

        $cod=$_REQUEST['Codigo'];
        $query = "SELECT * FROM categorias WHERE Codigo ='$cod'";
        $resultado= $conexion->query($query);
        $row = $resultado->fetch_assoc();
        ?>

          <form method="POST" action="MoCategoria.php?Codigo=<?php echo $row['Codigo']; ?>" enctype="multipart/form-data">


            <div class="col-md-4">

                <div class="block block-drop-shadow">

                    <div class="header">
                        <h2>Modifcar Categoria</h2>
                    </div>

                      <div class="content controls">
                        <div class="form-row">
                            <div class="col-md-3">Categoria:</div>
                            <div class="col-md-9">
                                <input type="text" name="categoria" disabled placeholder="Ingresar Categoria" value="<?php echo $row['Nombre']; ?>">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-3">Genero:</div>
                            <div class="col-md-9">
                              <select class="form-control" disabled id="genero" name="genero" onchange="CargarCategoria(this.value);">
			                        <option value="<?php echo $row['Genero']; ?>"><?php echo $row['Genero']; ?></option>
			                           <?php
			                              include('conexion.php');
                                    $gen=$row['Genero'];
			                                 $query = "SELECT * FROM genero Where Genero!='$gen'";
			                                    $result = mysqli_query($conexion, $query);
			                                       while($fila= mysqli_fetch_array($result, MYSQL_ASSOC))
			                                          {
				                                              echo '<option value="' .$fila["Genero"]. '">' .$fila["Genero"]. '</option>';
			                                                 }
			                                                    mysqli_close($conexion);
			                                                       ?>
		                                                         </select>
                            </div>
                        </div>

                </div>


                    </div>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-4">
                	<div class="block">
                         <div class="header">
                             <h2>Imagen</h2>
                         </div>
                         <div class="content controls">
                             <div class="form-row">
                               <div class="col-md-2"></div>
                                 <div class="col-md-8">
                                     <div class="input-group file">
                                         <input type="text" class="form-control" placeholder="img/categoria.jpg"/>
                                         <input type="file" name="img" onchange='Mostrar1(event)'/>
                                         <span class="input-group-btn">
                                             <button class="btn btn-primary" type="button">Buscar</button>
                                         </span>
                                     </div>
                                 </div>
                             </div>
                             <div class="form-row">
                               <center>
                                <div class="col-md-2"></div>
                                 <div class="col-md-8">
                                  <?php
                                  $img=$row['Imagen'];
                                  if ($img=="") {
                                  ?>
                                    <img src="img/Sinimagen.jpg" value="img/Sinimagen.jpg" id="Abrir1" class="img-rounded" height="250px" width="250px"/>
                                    <?php
                                    }
                                    else {
                                    ?>
                                    <img src="data:image/jpg;base64,<?php echo base64_encode($row['Imagen']); ?>" value="data:image/jpg;base64,<?php echo base64_encode($row['Imagen']); ?>" id="Abrir1" class="img-rounded" height="250px" width="250px"/>

                                  <?php
                                  }

                                   ?>
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
                                 </div>


                               </center>
                             </div>

                             <div class="form-row">
                               <div class="col-md-4"> </div>
                                 <div class="col-md-4">
                                     <button type="submit" class="btn btn-default btn-block btn-clean">Guardar</button>
                                 </div>
                             <div class="col-md-4"> </div>
                         </div>
                     </div>

                </div>
               </div>
               </form>
           </div>
       </div>
   </div>
</body>
</html>
<?php
  }
?>
