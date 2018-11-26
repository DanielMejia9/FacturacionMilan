 <?php
include("start.php");
require("conexion.php");




$f = fopen("info.txt","w");
$sep = ";";


$result = mysql_query('SELECT nomb_clie, rif_clie , dire_clie from tb_regi_cli');
while($reg = mysql_fetch_array($result) ) {
$linea = $reg['nomb_clie'] . $sep . $reg['rif_clie'] . $sep . $reg['tele_clie']."\r\n"; //pones cada campo separado con $sep.
fwrite($f,$linea);
}
fclose($f);




$fichero = "./info.txt";
header("Content-Description: File Transfer");
header( "Content-Disposition: filename=".basename($fichero) );
header("Content-Length: ".filesize($fichero));
header("Content-Type: application/force-download");
@readfile($fichero); 
?>


?>
