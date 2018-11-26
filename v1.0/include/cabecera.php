<nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-right" id="cbp-spmenu-s2">
			<h3><?php echo ("Bienvenido! "). ucwords ($nomUser);?></h3>
            <ul class="menu-1">
            	<li><a href="modulo.php">Inicio</a></li>
                <li><a href="registro_contacto.php">Contactos</a></li>
                <li><a href="cliente/registro_cliente.php">Clientes</a></li>
                <li><a href="facturacion.php?valor=0">Facturacion</a>
                	 <ul class="menu-2">
                        <li><a href="presupuesto.php?valor=0">Presupuestos</a></li>
                        <li><a href="recibo.php?valor=0">Recibos</a></li>
                    </ul>
                </li>
                <li><a href="logout.php">Salir</a></li>
            </ul>
            
            
            
            
			<!--<a href="modulo.php">Inicio</a>
			<a href="#">Empleados</a>
			<a href="cliente/registro_cliente.php">Clientes</a>
			<a href="#">Cuentas</a>
			<a href="#">Reportes</a>
            <a href="facturacion.php?valor=0">Facturacion</a>
            <a href="presupuesto.php?valor=0">Presupuestos</a>
            <a href="recibo.php?valor=0">Recibos</a>
            <a href="#">Contactanos</a>
            <a href="#">Emision de Reporte</a>
			<a href="logout.php">Salir</a>-->
</nav>



<div class="container">
    <div class="main">
         <section>
            <button class="btn" id="showRight">Menu</button>
        </section>
    </div>
</div>