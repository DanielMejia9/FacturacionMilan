<?php 
include("../class/class.php");

$con = new Conectar();
$conectar = $con->conecta();
//print_r($_POST);


if($_GET['action'] == 'listar')
{
	    // valores recibidos por POST
		 if(isset($_POST['categoria']) && $_POST['categoria'] !='')
		{
		$categoria = $_POST['categoria'];

		$sql = "select * from tb_productos AS A inner join tb_categorias_productos AS B on A.id_categoria = B.id_categoria inner join tb_marcas AS C on A.id_marca = C.id_marca where A.id_categoria = $categoria order by id_producto";
		}
        else if(isset($_POST['marca']) && $_POST['marca'] !='')
        {
          $marca = $_POST["marca"];
          $sql = "select * from tb_productos AS A inner join tb_categorias_productos AS B on A.id_categoria = B.id_categoria inner join tb_marcas AS C on A.id_marca = C.id_marca where A.id_marca = $marca order by id_producto";   
        }
        else if(isset($_POST['categoria']) &&  isset($_POST['marca']) && $_POST['marca'] !='' && $_POST['categoria'] !='')
        {
          $marca = $_POST["marca"];
          $categoria = $_POST['categoria'];

          $sql = "select * from tb_productos AS A inner join tb_categorias_productos AS B on A.id_categoria = B.id_categoria inner join tb_marcas AS C on A.id_marca = C.id_marca where A.id_marca = $marca and A.id_categoria = $categoria  order by id_producto ";   
        }
         else if(isset($_POST['buscar']) && $_POST['buscar'] !='')
        {
          $buscar = $_POST["buscar"];
          $sql = "select * from tb_productos AS A inner join tb_categorias_productos AS B on A.id_categoria = B.id_categoria inner join tb_marcas AS C on A.id_marca = C.id_marca where A.descripcion_producto LIKE  '%$buscar%' order by id_producto";   
        }
         else if(isset($_POST['cantidad']) && $_POST['cantidad'] !='')
        {
          $cantidad = $_POST["cantidad"];
          $sql = "select * from tb_productos AS A inner join tb_categorias_productos AS B on A.id_categoria = B.id_categoria inner join tb_marcas AS C on A.id_marca = C.id_marca where A.cantidad_producto =  $cantidad order by categoria";   
        }
        else if(isset($_POST['precio']) && $_POST['precio'] !='')
        {
          $precio = $_POST["precio"];
          $sql = "select * from tb_productos AS A inner join tb_categorias_productos AS B on A.id_categoria = B.id_categoria inner join tb_marcas AS C on A.id_marca = C.id_marca where A.precio_producto =  $precio order by id_producto";   
        }
        else
        {
          $sql = "select * from tb_productos AS A inner join tb_categorias_productos AS B on A.id_categoria = B.id_categoria inner join tb_marcas AS C on A.id_marca = C.id_marca  order by id_producto";  
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
			'id_producto'     	  	=> $row['id_producto'],
            'descripcion_producto'  => $row['descripcion_producto'],
            'categoria'     	  	=> $row['categoria'],
            'cantidad_producto'     => $row['cantidad_producto'],
            'precio_producto'     	=> number_format($row['precio_producto'],2,',','.'),
            'descripcion_marca'     => $row['descripcion_marca']
		);
	}
	// convertimos el array de datos a formato json
	echo json_encode($datos);
}


		