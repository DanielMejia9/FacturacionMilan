
<?php if ($tipo==1) 
{
	?>
		<ul class="nav nav-sidebar">
			<?php if ($atras ==1) 
			{
				echo '<li class=""><a href="javascript:history.go(-1);">Atras</a><span class="sr-only">(current)</span></a></li>';
			}
			?>
		    <li><a href="../contabilidad/gastos.php">Gastos <span class="sr-only">(current)</span></a></li>
		    <li><a href="../contabilidad/libro_de_ventas.php">Libro de Ventas</a></li>
		    <li><a href="../contabilidad/libro_de_gastos.php">Reporte de Gastos</a></li>
		    <li><a href="../contabilidad/estadisticas.php">Estadística de Ventas</a></li>
		    <li><a href="../productos/index.php">Productos</a></li>
		</ul>
	<?php
}
?>

<?php if ($tipo==2) 
{
	?>
		<ul class="nav nav-sidebar">
			<?php if ($atras ==1) 
			{
				echo '<li class=""><a href="javascript:history.go(-1);">Atras</a><span class="sr-only">(current)</span></a></li>';
			}
			?>
		    <li><a href="../contabilidad/gastos.php">Gastos <span class="sr-only">(current)</span></a></li>
		    <li><a href="../contabilidad/libro_de_ventas.php">Libro de Ventas</a></li>
		    <li><a href="../contabilidad/libro_de_gastos.php">Reporte de Gastos</a></li>
		    <li><a href="">Estadística de Ventas</a></li>
		    <li><a href="../productos/index.php">Productos</a></li>
		</ul>
	<?php
}
?>