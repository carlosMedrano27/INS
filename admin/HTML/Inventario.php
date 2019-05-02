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
    <script>

      function CargarSub(genero, cat)
      {
        var parametros = {
                 "Genero" : genero,
                 "Categoria" : cat
         };

        $.ajax({
          data:  parametros,
          url: 'subcat.php',
          type: 'post',
          success: function(response){
            $('#sub').html(response);
          }
          });

      }
      </script>
</head>
<body class="bg-img-num1">
<?php
include 'Nav.php';
?>

        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><a href="Inicio.php">Inicio</a></li>
                    <li class="active">Ingresar Producto</li>
                </ol>
            </div>
        </div>
      <div class="row">
        <div class="col-md-2">
        <?php
        include("Lateral.php")
        ?>
        </div>


          <form method="post" action="PGuardar.php" enctype="multipart/form-data">
            <div class="col-md-4">

                <div class="block">
                    <div class="header">
                        <h2>Ingresar Producto</h2>
                    </div>
                    <div class="content controls">
                        <div class="form-row">
                            <div class="col-md-3">Nombre:</div>
                            <div class="col-md-9"><input type="text" required name="nombre" class="form-control" Placeholder="Nombre del Producto"/></div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-3">Descripcion:</div>
                            <div class="col-md-9"><textarea class="form-control" id="descripcion" input type="text" required name="descripcion" placeholder="Descripcion del Producto"></textarea></div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-3">Genero:</div>
                            <div class="col-md-9">
                              <select class="form-control" id="genero" name="genero" onchange="CargarCategoria(this.value);">
			                        <option>-Selecciona un Genero-</option>
			                           <?php
			                              include('conexion.php');
			                                 $query = 'SELECT * FROM genero';
			                                    $result = mysqli_query($conexion, $query);
			                                       while($row = mysqli_fetch_array($result, MYSQL_ASSOC))
			                                          {
				                                              echo '<option value="' .$row["Genero"]. '">' .$row["Genero"]. '</option>';
			                                                 }
			                                                    mysqli_close($conexion);
			                                                       ?>
		                                                         </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-3">Categorias:</div>
                            <div class="col-md-9">
                                <select class="form-control" id="cat" required name="categoria" onchange="CargarSub($('#genero option:selected').val(), $('#cat option:selected').val());return false;">
                                <option>-Selecciona una Categoria-</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-3">Sub Categoria:</div>
                            <div class="col-md-9">
                                <select class="form-control" id="sub" required name="subcat">
                                <option>-Selecciona una Subcategoria-</option>

                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-3">Costo:</div>
                            <div class="col-md-9">
                                <input id="spinner" class="form-control" name="precio" required value="0"/>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
           <div class="col-md-6">
           	<div class="block">
                    <div class="header">
                        <h2>Imagenes</h2>
                    </div>
                    <div class="content controls">

                        <div class="form-row">
                            <div class="col-md-4">Imagen Principal

                                <div class="input-group file">
                                    <input type="text" class="form-control" placeholder="img/Sinimagen.jpg"/>
                                    <input type="file" required name="img1" onchange='Mostrar1(event)'/>
                                    <span class="input-group-btn">
                                        <button class="btn btn-primary" type="button">Buscar</button>
                                    </span>
                                </div>
                            </div>

                            <div class="col-md-4">Imagen Secundaria

                                <div class="input-group file">
                                    <input type="text" class="form-control" placeholder="img/Sinimagen.jpg"/>
                                    <input type="file" name="img2" onchange='Mostrar2(event)'/>
                                    <span class="input-group-btn">
                                        <button class="btn btn-primary" type="button">Buscar</button>
                                    </span>
                                </div>
                              </div>

                            <div class="col-md-4">Imagen Terciaria
                            <div class="input-group file">
                                    <input type="text" class="form-control" placeholder="img/Sinimagen.jpg"/>
                                    <input type="file" name="img3" onchange='Mostrar3(event)'/>
                                    <span class="input-group-btn">
                                        <button class="btn btn-primary" type="button">Buscar</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                          <center>
                            <div class="col-md-4">
                              <img src="img/usuario.jpg" id="Abrir1" class="img-rounded" height="150px" width="150px"/>
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
                            <div class="col-md-4">
                              <img src="img/usuario.jpg" id="Abrir2" class="img-rounded" height="150px" width="150px"/>
                              <script>
                              var Mostrar2 = function(event) {
                                var input = event.target;

                                var reader = new FileReader();
                                reader.onload = function(){
                                  var dataURL = reader.result;
                                  var output = document.getElementById('Abrir2');
                                  output.src = dataURL;
                                };
                                reader.readAsDataURL(input.files[0]);
                              };
                              </script>
                            </div>
                            <div class="col-md-4">
                              <img src="img/usuario.jpg" id="Abrir3" class="img-rounded" height="150px" width="150px"/>
                              <script>
                              var Mostrar3 = function(event) {
                                var input = event.target;

                                var reader = new FileReader();
                                reader.onload = function(){
                                  var dataURL = reader.result;
                                  var output = document.getElementById('Abrir3');
                                  output.src = dataURL;
                                };
                                reader.readAsDataURL(input.files[0]);
                              };
                              </script>
                            </div>
                          </center>
                        </div>
                        <div class="form-row">
                            <div class="col-md-1">Codigo</div>
                            <div class="col-md-3"><input type="text" placeholder="codigo" required name="codigo" class="form-control" /></div>

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
