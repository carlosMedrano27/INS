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
                    <li class="active">Modificar SubCategoria</li>
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
        $query = "SELECT * FROM subcategorias WHERE Id ='$cod'";
        $resultado= $conexion->query($query);
        $row = $resultado->fetch_assoc();
        ?>

          <form method="post" action="MoSubcategoria.php?Codigo=<?php echo $row['Id']; ?>" enctype="multipart/form-data">
            <div class="col-md-4">

                <div class="block">
                    <div class="header">
                        <h2>Modificar SubCategoria</h2>
                    </div>
                    <div class="content controls">
                        <div class="form-row">
                          <div class="form-row">
                              <div class="col-md-3">SubCategoria:</div>
                              <div class="col-md-9"><input type="text" required name="subcat" class="form-control" Placeholder="Ingresar Subcategoria" value="<?php echo $row['Nombre']; ?>"/></div>
                          </div>
                            <div class="col-md-3">Genero:</div>
                            <div class="col-md-9">
                              <select class="form-control" id="genero" name="genero" onchange="CargarCategoria(this.value);">
			                        <option value="<?php echo $row['Genero']; ?>"><?php echo $row['Genero']; ?></option>
			                           <?php
			                              include('conexion.php');
			                                 $query = 'SELECT * FROM genero';
			                                    $result = mysqli_query($conexion, $query);
			                                       while($fila = mysqli_fetch_array($result, MYSQL_ASSOC))
			                                          {
				                                              echo '<option value="' .$fila["Genero"]. '">' .$fila["Genero"]. '</option>';
			                                                 }
			                                                    mysqli_close($conexion);
			                                                       ?>
		                                                         </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-3">Categorias:</div>
                            <div class="col-md-9">
                                <select class="form-control" id="cat" required name="categoria">
                                <option value="<?php echo $row['Categoria']; ?>"><?php echo $row['Categoria']; ?></option>
                                </select>
                            </div>
                        </div>


                        <div class="form-row">
                          <div class="col-md-4"> </div>
                            <div class="col-md-4">
                                <button class="btn btn-default btn-block btn-clean">Guardar</button>
                            </div>
                        <div class="col-md-4"> </div>
                    </div>
                </div>
              </div>
          </div>
      </div>
           </div>
          </div>
          </form>
    </div>
    <script>
    function CargarCategoria(val)
    {

    	$.ajax({
    		type: "POST",
    		url: 'consulta.php',
    		data: 'Genero='+val,
    		success: function(resp){
    			$('#cat').html(resp);

    		}
    	});
    }
  </script>

</body>
</html>
<?php
  }
?>
