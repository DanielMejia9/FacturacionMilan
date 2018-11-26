<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>

</head>
<body>
<?php 

/* VARIABLES
$nf = número de filas 
$nc = número de columnas 
$ct= total de columna 
$ft= total de fila 
$cf = total de columna sumatoria de fila 
*/
$nf=5; 
$nc=5;
echo '<table>'; 
for ($i = 0; $i <= $nf; $i++) { 
echo '<tr>'; 
for ($c = 1; $c <= $nc; $c++) { 
echo '<td>'.$c.' </td>'; 
$ft+=$c; 
$ct[$c]+=$c; 
} 

echo '<td style="background:yellow">'.$ft.' </td>'; 
$cf+=$ft; 
$ft=0; 
echo '</tr>'; 

}
echo '<tr>'; 
for ($c = 1; $c <= $nc; $c++) { 
echo '<td style="background:lime">'.$ct[$c].'</td>'; 
}
echo '<td style="background:lime">'.$cf.'</td>'; 
echo '</tr></table>';
?>
</body>
</html>
