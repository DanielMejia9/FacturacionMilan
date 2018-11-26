<?php
	include('conexion.php');
	
	$año = $_POST['año'];

	
	$enero = mysql_fetch_array(mysql_query("SELECT SUM(monto_total) AS r FROM tb_factura WHERE MONTH(fech_emis)=1 AND YEAR(fech_emis)='$año'"));
	$febrero = mysql_fetch_array(mysql_query("SELECT SUM(monto_total) AS r FROM tb_factura WHERE MONTH(fech_emis)=2 AND YEAR(fech_emis)='$año'"));
	$marzo = mysql_fetch_array(mysql_query("SELECT SUM(monto_total) AS r FROM tb_factura WHERE MONTH(fech_emis)=3 AND YEAR(fech_emis)='$año'"));
	$abril = mysql_fetch_array(mysql_query("SELECT SUM(monto_total) AS r FROM tb_factura WHERE MONTH(fech_emis)=4 AND YEAR(fech_emis)='$año'"));
	$mayo = mysql_fetch_array(mysql_query("SELECT SUM(monto_total) AS r FROM tb_factura WHERE MONTH(fech_emis)=5 AND YEAR(fech_emis)='$año'"));
	$junio = mysql_fetch_array(mysql_query("SELECT SUM(monto_total) AS r FROM tb_factura WHERE MONTH(fech_emis)=6 AND YEAR(fech_emis)='$año'"));
	$julio = mysql_fetch_array(mysql_query("SELECT SUM(monto_total) AS r FROM tb_factura WHERE MONTH(fech_emis)=7 AND YEAR(fech_emis)='$año'"));
	$agosto = mysql_fetch_array(mysql_query("SELECT SUM(monto_total) AS r FROM tb_factura WHERE MONTH(fech_emis)=8 AND YEAR(fech_emis)='$año'"));
	$septiembre = mysql_fetch_array(mysql_query("SELECT SUM(monto_total) AS r FROM tb_factura WHERE MONTH(fech_emis)=9 AND YEAR(fech_emis)='$año'"));
	$octubre = mysql_fetch_array(mysql_query("SELECT SUM(monto_total) AS r FROM tb_factura WHERE MONTH(fech_emis)=10 AND YEAR(fech_emis)='$año'"));
	$noviembre = mysql_fetch_array(mysql_query("SELECT SUM(monto_total) AS r FROM tb_factura WHERE MONTH(fech_emis)=11 AND YEAR(fech_emis)='$año'"));
	$diciembre = mysql_fetch_array(mysql_query("SELECT SUM(monto_total) AS r FROM tb_factura WHERE MONTH(fech_emis)=12 AND YEAR(fech_emis)='$año'"));
	
	
	
	$enerog = mysql_fetch_array(mysql_query("SELECT SUM(monto_total) AS S FROM tb_gastos WHERE MONTH(fech_emis)=1 AND YEAR(fech_emis)='$año'"));
	$febrerog = mysql_fetch_array(mysql_query("SELECT SUM(monto_total) AS S FROM tb_gastos WHERE MONTH(fech_emis)=2 AND YEAR(fech_emis)='$año'"));
	$marzog = mysql_fetch_array(mysql_query("SELECT SUM(monto_total) AS S FROM tb_gastos WHERE MONTH(fech_emis)=3 AND YEAR(fech_emis)='$año'"));
	$abrilg = mysql_fetch_array(mysql_query("SELECT SUM(monto_total) AS S FROM tb_gastos WHERE MONTH(fech_emis)=4 AND YEAR(fech_emis)='$año'"));
	$mayog = mysql_fetch_array(mysql_query("SELECT SUM(monto_total) AS S FROM tb_gastos WHERE MONTH(fech_emis)=5 AND YEAR(fech_emis)='$año'"));
	$juniog = mysql_fetch_array(mysql_query("SELECT SUM(monto_total) AS S FROM tb_gastos WHERE MONTH(fech_emis)=6 AND YEAR(fech_emis)='$año'"));
	$juliog = mysql_fetch_array(mysql_query("SELECT SUM(monto_total) AS S FROM tb_gastos WHERE MONTH(fech_emis)=7 AND YEAR(fech_emis)='$año'"));
	$agostog = mysql_fetch_array(mysql_query("SELECT SUM(monto_total) AS S FROM tb_gastos WHERE MONTH(fech_emis)=8 AND YEAR(fech_emis)='$año'"));
	$septiembreg = mysql_fetch_array(mysql_query("SELECT SUM(monto_total) AS S FROM tb_gastos WHERE MONTH(fech_emis)=9 AND YEAR(fech_emis)='$año'"));
	$octubreg = mysql_fetch_array(mysql_query("SELECT SUM(monto_total) AS S FROM tb_gastos WHERE MONTH(fech_emis)=10 AND YEAR(fech_emis)='$año'"));
	$noviembreg = mysql_fetch_array(mysql_query("SELECT SUM(monto_total) AS S FROM tb_gastos WHERE MONTH(fech_emis)=11 AND YEAR(fech_emis)='$año'"));
	$diciembreg = mysql_fetch_array(mysql_query("SELECT SUM(monto_total) AS S FROM tb_gastos WHERE MONTH(fech_emis)=12 AND YEAR(fech_emis)='$año'"));
	
	
	$data = array(0 => round($enero['r'],1),
				  1 => round($febrero['r'],1),
				  2 => round($marzo['r'],1),
				  3 => round($abril['r'],1),
				  4 => round($mayo['r'],1),
				  5 => round($junio['r'],1),
				  6 => round($julio['r'],1),
				  7 => round($agosto['r'],1),
				  8 => round($septiembre['r'],1),
				  9 => round($octubre['r'],1),
				  10 => round($noviembre['r'],1),
				  11 => round($diciembre['r'],1),
				  12 => round($enerog['S'],1),
				  13 => round($febrerog['S'],1),
				  14 => round($marzog['S'],1),
				  15 => round($abrilg['S'],1),
				  16 => round($mayog['S'],1),
				  17 => round($juniog['S'],1),
				  18 => round($juliog['S'],1),
				  19 => round($agostog['S'],1),
				  20 => round($septiembreg['S'],1),
				  21 => round($octubreg['S'],1),
				  22 => round($noviembreg['S'],1),
				  23 => round($diciembreg['S'],1)
				  );			 
	echo json_encode($data);
?>