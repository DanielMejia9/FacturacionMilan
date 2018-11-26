<?php
echo ('
<div id="menu"'); echo $style;  echo('>
<ul id="nav">
	<li><a href="modulo.php">Inicio</a></li>
    <li><a href="#">Registro</a>
    	<ul class="submenu">
        	<li><a href="#">Cliente</a>
            	<ul class="subsubmenu">
					<li><a href="registro_cliente.php" title="Consultar cliente">Consultar Cliente</a></li>
                	<li><a href="add_cliente.php" title="Ingresar nuevo cliente">Ingresar Cliente</a></li>
					<li><a href="add_contacto_cliente.php" title="Ingresar nuevo cliente">Contacto Cliente</a></li>
                </ul
            </li>
            
            <li><a href="registro_usuario.php">Usuario</a>
            	<!--<ul class="subsubmenu">
                	<li><a href="registro_usuario.php" title="Ingresar nuevo cliente">Ingresar/Usuario</a></li>
                </ul>-->
            </li>
        </ul>
    </li>
	<li><a href="facturacion.php?valor=0">Facturacion</a></li>
	<li><a href="presupuesto.php?valor=0">Presupuesto</a></li>
    <li><a href="registro_contacto.php">Contactanos</a></li>
    <li>
            	 <a href="logout.php">Salir</a>
   </li>
</ul>
 
</div>');

?>