<?php

//datos para establecer la conexion con la base de mysql.
//mysql_connect("localhost", "factura_user", "Tsa5h34?")or die ('Ha fallado la conexión: '.mysql_error());
mysql_connect("localhost", "root", "")or die ('Ha fallado la conexión: '.mysql_error());
mysql_select_db('facturacion_milan')or die ('Error al seleccionar la Base de Datos: '.mysql_error());


/*
//datos para establecer la conexion con la base de mysql.
mysql_connect('localhost','caracasw_usersaj','WO}EI3MZz@Xy')or die ('Ha fallado la conexión: '.mysql_error());
mysql_select_db('caracasw_saj')or die ('Error al seleccionar la Base de Datos: '.mysql_error());

*/
?>
