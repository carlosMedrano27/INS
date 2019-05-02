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
                        <h2>Inbox messages</h2>
                        <div class="side pull-right">
                            <ul class="buttons">
                                <li><a href="#"><span class="icon-plus"></span></a></li>
                                <li><a href="#"><span class="icon-cogs"></span></a></li>
                            </ul>
                        </div>
                        <div class="head-panel nm">
                            <a href="#" class="hp-info pull-left">
                                <div class="hp-icon">
                                    <span class="icon-download-alt"></span>
                                </div>
                                <span class="hp-main">25</span>
                                <span class="hp-sm">recived</span>
                            </a>
                            <a href="#" class="hp-info pull-left">
                                <div class="hp-icon">
                                    <span class="icon-upload-alt"></span>
                                </div>
                                <span class="hp-main">10</span>
                                <span class="hp-sm">sent</span>
                            </a>
                            <a href="#" class="hp-info hp-one pull-right tip" title="Refresh">
                                <div class="hp-icon">
                                    <span class="icon-refresh"></span>
                                </div>
                                <span class="hp-main">    </span>
                            </a>
                        </div>
                    </div>
                      <?php
                      include("conexion.php");
                      $query="SELECT clientes.Usuario, comentarios.Comentario, clientes.Img, comentarios.Hora  FROM comentarios,clientes where comentarios.Codigo=clientes.Codigo";
                      $resultado= $conexion->query($query);
                      while ($row = $resultado->fetch_assoc()){
                      ?>
                      <div class="content list">
                          <div class="list-item">
                              <div class="list-datetime">
                                  <div class="date"><?php echo $row['Fecha']; ?></div>
                                  <div class="time"><?php echo $row['Hora']; ?></div>
                              </div>
                              <div class="list-info">
                                <img class="img-circle img-thumbnail" width="50px" height="50px"src="data:image/jpg;base64,<?php echo base64_encode($row['Img']); ?> "/>
                              </div>
                              <div class="list-text">
                                  <a href="#" class="list-text-name"><?php echo $row['Usuario']; ?></a>
                                  <p><?php echo $row['Comentario']; ?></p>
                              </div>
                              <div class="list-controls">
                                  <a href="#" class="widget-icon widget-icon-circle"><span class="icon-rotate-right"></span></a>
                                  <a href="#" class="widget-icon widget-icon-circle"><span class="icon-pushpin"></span></a>
                                  <a href="#" class="widget-icon widget-icon-circle"><span class="icon-remove"></span></a>
                              </div>
                          </div>
                      </div>
                      <?php
                      }
                      ?>
                      <div class="footer tac">
                          <a href="#">Load more messages...</a>
                      </div>
                  </div>

                  <div class="block block-drop-shadow">
                      <div class="header">
                          <h2>Messaging</h2>
                          <div class="side pull-right">
                              <ul class="buttons">
                                  <li><a href="#"><span class="icon-user"></span></a></li>
                                  <li><a href="#"><span class="icon-cogs"></span></a></li>
                              </ul>
                          </div>
                      </div>

                      <div class="footer">
                          <div class="input-group">
                              <span class="input-group-addon"><i class="icon-comment"></i></span>
                              <input type="text" class="form-control" placeholder="message..">
                              <span class="input-group-btn">
                                  <button class="btn"><span class="icon-chevron-up"></span></button>
                              </span>
                          </div>
                      </div>
                  </div>
            </div>
          </div>
      </div>
  </body>
  </html>
