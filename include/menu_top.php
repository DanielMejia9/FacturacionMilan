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
                      <a class="navbar-brand" href="../modulo.php"><?php echo "<img src='../".$_SESSION['logo']."' width='150' height='45'/>";?></a>
                    </div>
                
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                      <ul class="nav navbar-nav navbar-right">
                      <li class=""><a href="/modulo.php">Inicio<span class="sr-only">(current)</span></a></li>
                      <li class=""><a href="/cliente/registro_cliente.php">Clientes <span class="sr-only">(current)</span></a></li>
                      <li class=""><a href="/empleados/registro_empleados.php">Empleados <span class="sr-only">(current)</span></a></li>
                      <li>
                        <a href="../contabilidad/index.php">Contabilidad</a>
                            <ul class="dropdown-menu">
                               <li><a href="/contabilidad/libro_de_ventas.php">Libro de Ventas</a></li>
                               <li><a href="#">Libro de Compras</a></li>
                               <li>
                               <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Cuenta de Gastos<span class="caret"></span></a>
                                  <ul class="dropdown-item">
                                      <li><a href="/contabilidad/gastos.php">Gastos</a></li>
                                  </ul>
                               </li>
                            </ul>
                        </li>
                        
                        <li class=""><a href="/facturacion/facturacion.php?valor=0">Facturaci&oacute;n <span class="sr-only">current)</span></a></li>
                        

                        <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Producto<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                              <li class=""><a href="/productos/registro_producto.php">Producto<span class="sr-only">(current)</span></a></li>
                              <li class=""><a href="/productos/registro_categoria.php">Categoria<span class="sr-only">current)</span></a></li>
                              <li class=""><a href="/productos/registro_marca.php">Marcas<span class="sr-only">current)</span></a></li>
                              <li class=""><a href="/productos/index.php">Todos<span class="sr-only">(current)</span></a></li>
                            </ul> 
                        </li> 

                        <li class=""><a href="/logout.php">Cerrar sesión <span class="sr-only">(current)</span></a></li>
                        </li>
                      </ul>
                    </div><!-- /.navbar-collapse -->
                  </div><!-- /.container-fluid -->
                </nav>
</section>