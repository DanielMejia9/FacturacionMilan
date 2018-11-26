<section id="navegacion">
            <nav class="navbar navbar-default navbar-fixed-top">
                  <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                      </button>
                      <a class="navbar-brand" href="../modulo.php"><?php echo "Bienvenido"."<img src='".$_SESSION['logo']."' width='150' height='45'/>";?></a>
                    </div>
                
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                      <ul class="nav navbar-nav navbar-right">
                      <li class=""><a href="/modulo.php">Inicio<span class="sr-only">(current)</span></a></li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Expediente<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                               <li><a href="/expediente/h_expediente.php">Ver Expediente</a></li>
                               <li><a href="/expediente/h_expediente.php">Agregar Expediente</a></li>
                            </ul>
                        </li>
                        <li class=""><a href="/recibo/recibo.php?valor=0">Emisi&oacute;n de Recibo <span class="sr-only">(current)</span></a></li>
                        <li class=""><a href="/facturacion/facturacion.php?valor=0">Facturaci&oacute;n <span class="sr-only">(current)</span></a></li>
                        <li class=""><a href="/presupuesto/presupuesto.php?valor=0">Presupuesto <span class="sr-only">(current)</span></a></li>
                        <li class=""><a href="/logout.php">Cerrar sesión <span class="sr-only">(current)</span></a></li>
                        
                      </ul>
                    </div><!-- /.navbar-collapse -->
                  </div><!-- /.container-fluid -->
                </nav>
</section>