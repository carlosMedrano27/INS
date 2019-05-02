<?php
session_start();
if(@$_SESSION['Usuario'] != ""){
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
<div class="col-md-2">
<?php
include("Lateral.php")
?>
</div>

          <div class="col-md-5">
            <form method="POST" action="InComentario.php" enctype="multipart/form-data">

            <div class="block block-drop-shadow">

                <div class="header">
                    <h2>Comentario</h2>
                </div>

                  <div class="content controls">
                    <div class="form-row">
                        <div class="col-md-3">Codigo de Usuario:</div>
                        <div class="col-md-9">
                            <input type="text" name="codigo" placeholder="Codigo Usuario">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-3">Comentario:</div>
                        <div class="col-md-9">
                            <textarea input type="text" name="comentario"  placeholder="Ingrese Comentario"></textarea>
                        </div>
                    </div>

                    <div class="tar">
                    <button class="btn btn-default btn-clean">Guardar</button>
                </div>
            </div>
                </form>
                </div>
          </div>

          <div class="col-md-5">

              <div class="block block-drop-shadow">
                  <div class="head bg-default bg-light-rtl">
                      <h2>Comentarios</h2>
                      <div class="side pull-right">
                          
                      </div>
                      <div class="head-panel nm">
                          <a href="#" class="hp-info pull-left">
                              <div class="hp-icon">
                                  <span class="icon-download-alt"></span>
                              </div>
                              <?php
                              $consu = mysqli_query($conexion, "SELECT * FROM comentarios");
                            $registros=mysqli_num_rows($consu);
                              ?>
                              <span class="hp-main"><?php echo $registros;?></span>
                              <span class="hp-sm">Comentarios</span>
                          </a>
                          <a href="#" class="hp-info hp-one pull-right tip" title="Refresh">
                              <div class="hp-icon">
                                  <span class=""></span>
                              </div>
                              <span class="hp-main">    </span>
                          </a>
                      </div>
                  </div>

                    <?php
                    include("conexion.php");
                    $query="SELECT clientes.Usuario, comentarios.Comentario, comentarios.Codigo_coment, clientes.Img, comentarios.Hora, comentarios.Fecha, comentarios.Aprobado  FROM comentarios,clientes where comentarios.Codigo=clientes.Codigo";
                    $resultado= $conexion->query($query);
                    while ($row = $resultado->fetch_assoc()){
                    ?>
                    <div class="content list">
                        <div class="list-item">
                            <div class="list-datetime">
                                <div class="time"><?php echo $row['Fecha']; ?></div>
                                <div class="time"><?php echo $row['Hora']; ?></div>
                            </div>
                            <div class="list-info">
                              <?php
                        $img=$row['Img'];
                        if ($img=="") {
                        ?>
                          <img src="usuario.jpg" value="Sinimagen.jpg" id="imagen" class="img-circle img-thumbnail" width="50px" height="50px"/>
                          <?php
                          }
                          else {
                          ?>
                          <img id="imagen" src="data:image/jpg;base64,<?php echo base64_encode($row['Img']); ?>" value="data:image/jpg;base64,<?php echo base64_encode($row['Img']); ?>"  class="img-circle img-thumbnail" width="50px" height="50px"/>

                        <?php
                        }

                         ?>
                              
                            </div>
                            <div class="list-text">
                                <h5><class="list-text-name"><?php echo $row['Usuario']; ?></h5>
                                <p><?php echo $row['Comentario']; ?></p>
                                <p align="right">Aprobado: <?php echo $row['Aprobado']; ?></p>
                            </div>
                            <div class="list-controls">
                                <a href="MoComentarios.php?Codigo_coment=<?php echo $row['Codigo_coment']; ?>" class="widget-icon widget-icon-circle"><span class="icon-edit"></span></a>
                                <a href="ElComentario.php?Codigo_coment=<?php echo $row['Codigo_coment']; ?>"class="widget-icon widget-icon-circle" onclick="return confirm('¿Estás seguro de que quieres eliminar el comentario?');"><span class="icon-remove"></span></a>
                            </div>
                        </div>
                    </div>
                    <?php
                    }
                    ?>

                </div>

              
          </div>
        </div>
    </div>
</body>
</html>
<?php
  }
?>
