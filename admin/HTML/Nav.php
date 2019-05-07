<?php
  $Codigo=$_SESSION['Codigo'];
  include("conexion.php");
?>

  <div class="container">
    <div class="row">
        <div class="col-md-12">

             <nav class="navbar brb" role="navigation">
               <div class="navbar-header">
                   <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                       <span class="sr-only">Toggle navigation</span>
                       <span class="icon-reorder"></span>
                   </button>
                   <a class="navbar-brand" href="Inicio.php"><img src="img/talleres.png" width="35px" height="35px" /></a>
               </div>
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                  <ul class="nav navbar-nav">
                      <li class="active">
                          <a href="Inicio.php">
                              <span class="icon-home"></span> Inicio
                          </a>
                      </li>
                      <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span style="font-family:'Segoe UI Symbol';color:white;font-size:15px;">&#x1f455;</span>Administración</a>
                          <ul class="dropdown-menu">
                            <li>
                                <a href="#">Productos<i class="icon-angle-right pull-right"></i></a>
                                <ul class="dropdown-submenu">
                                  <li><a href="InProducto.php">Insertar Productos</a></li>
                                  <li><a href="MProducto.php">Mostrar Productos</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Categorias<i class="icon-angle-right pull-right"></i></a>
                                <ul class="dropdown-submenu">
                                  <li><a href="MCategoria.php">Mostrar Categorias</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Subcategorias<i class="icon-angle-right pull-right"></i></a>
                                <ul class="dropdown-submenu">
                                  <li><a href="InSubcategoria.php">Insertar Subategoria</a></li>
                                  <li><a href="MSubcategoria.php">Mostrar Subcategorias</a></li>
                                </ul>
                            </li>
						        <li>
                      <a href="#">Ofertas<i class="icon-angle-right pull-right"></i></a>
                      <ul class="dropdown-submenu">
                        <li><a href="InOferta.php">Insertar Ofertas</a></li>
                        <li><a href="MOferta.php">Mostrar Ofertas</a></li>
                      </ul>
                  </li>
                  <li>
                      <a href="#">One&Only<i class="icon-angle-right pull-right"></i></a>
                      <ul class="dropdown-submenu">
                        <li><a href="MCarrusel.php">Carrusel</a></li>
                        <li><a href="Bitacora.php">Bit&aacute;cora</a></li>
                       
                      </ul>
                  </li>
                          </ul>
                      </li>
                      <?php
                        if ($_SESSION["Nivel"]==1){
                      ?>
                      <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="fas fa-users"></span>Ajustes</a>
                          <ul class="dropdown-menu">
                            <li>
                                <a href="#">Usuarios<i class="icon-angle-right pull-right"></i></a>
                                <ul class="dropdown-submenu">
                                  <li><a href="Registro.php">Registrar </a></li>
                                  <li><a href="UMostrar.php">Mostrar</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Clientes<i class="icon-angle-right pull-right"></i></a>
                                <ul class="dropdown-submenu">
                                <li><a href="ReClientes.php">Registrar Cliente</a></li>
                                <li><a href="CMostrar.php">Mostrar Cliente</a></li>
                                </ul>
                            </li>
                          </ul>
                      </li>
                      <?php
      									}
      								?>

                    </ul>
                    <form class="navbar-form navbar-right" role="search">
                      <a href="#" class="hidden-md hidden-lg main-nav-toggle"><i class="fa fa-bars"></i></a>

                      <div class="logged-user">
                        <div class="btn-group">
                          <a href="#" class="btn btn-link dropdown-toggle" data-toggle="dropdown">
                            <!--<img src="assets/img/avatar.png" />-->
                           <?php
                             $Codigo=@$_SESSION['Codigo'];
                              include("conexion.php");
                             $query="SELECT Usuarios.Usuario  FROM Usuarios where CodUsuario=$Codigo ";
                              $resultado= $conexion->query($query);
                            while ($row = $resultado->fetch_assoc()){
                            ?>
                           <span class="name"><?php echo $row['Usuario']; ?></span> <span class="caret"></span>
                           <?php
                            }
                          ?>
                          </a>
                          <ul class="dropdown-menu" role="menu">
                            <li>
                              <a href="Perfil.php">
                                <i class="fa fa-user"></i>
                                <span class="text">Perfil</span>
                              </a>
                            </li>
                            <li>

                            </li>
                            <li>
                              <a href="CerrarSesion.php">
                                <i class="fa fa-power-off"></i>
                                <span class="text">Cerrar Sesion</span>
                              </a>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </form>
                </div>
            </nav>

        </div>
    </div>
