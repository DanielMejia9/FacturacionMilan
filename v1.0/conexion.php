<?php
//datos para establecer la conexion con la base de mysql.
mysql_connect('localhost','root','webmastersixaguer')or die ('Ha fallado la conexión: '.mysql_error());
mysql_select_db('admin_empre')or die ('Error al seleccionar la Base de Datos: '.mysql_error());
?>
