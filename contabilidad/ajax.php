<?php 
include("../class/class.php");

$con = new Conectar();
$conectar = $con->conecta();
//print_r($_POST);


if($_GET['action'] == 'listar')
{
	    // valores recibidos por POST
		if(isset($_POST['desde']) && $_POST['desde'] !='' && $_POST["hasta"] !='')
		{
		$desde = date('Y-m-d', strtotime($_POST["desde"]));
        $hasta = date('Y-m-d', strtotime($_POST["hasta"]));
		$sql = "select * from tb_factura AS A inner join tb_regi_cli AS B  on A.codi_clie = B.codi_clie where fech_emis between  '$desde' and '$hasta'";
		}
        else if(isset($_POST['factura']) && $_POST['factura'] !='')
        {
          $factura = $_POST["factura"];
          $sql = "select * from tb_factura AS A inner join tb_regi_cli AS B  on A.codi_clie = B.codi_clie where A.codi_factu = '$factura'";   
        }
        else if(isset($_POST['cliente']) && $_POST['cliente'] !='')
        {
          $cliente = $_POST["cliente"];
          $sql = "select * from tb_factura AS A inner join tb_regi_cli AS B  on A.codi_clie = B.codi_clie where A.codi_clie = '$cliente'";   
        }
        else
        {
          $sql = "select * from tb_factura AS A inner join tb_regi_cli AS B  on A.codi_clie = B.codi_clie ORDER BY codi_factu DESC LIMIT 15";  
       }
        


	
	// Ordenar por
	/*$vorder = 0;//$_POST['orderby'];
	
	if($vorder != ''){
		$sql .= " ORDER BY ".$vorder;
	}	*/
    
	$query = mysql_query($sql,$conectar);
	$datos = array();
	
	/*echo '<pre>';
	print_r($query);
	echo '</pre>';
	echo '<pre>';
	print_r($sql);
	echo '</pre>';*/
	
	while($row = mysql_fetch_assoc($query))
	{
		$datos[] = array(
			'codi_factu'     	  	=> $row['codi_factu'],
            'nomb_clie'     	  	=> $row['nomb_clie'],
            'fech_emis'     	  	=> date('d-m-Y', strtotime($row['fech_emis'])),
            'codi_clie'     	  	=> $row['codi_clie'],
            'monto_neto'     	  	=> number_format($row['monto_neto'],2,',','.'),
            'monto_iva'     	  	=> number_format($row['monto_iva'],2,',','.'),
            'monto_total'     	  	=> number_format($row['monto_total'],2,',','.')
		);
	}
	// convertimos el array de datos a formato json
	echo json_encode($datos);
}


		