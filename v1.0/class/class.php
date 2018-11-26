<?php

class Conectar
{
	public static function conecta()
	{
		/*//Hacemos la conexion a la BD e ingresamos el nombre de servidor
		//el usuario  y su clave
		$con = mysql_connect("localhost","root","webmastersixaguer");
		//Le deciamos que tipo de cotejamiento será utilizado
		mysql_query("SET NAMES 'utf8'");
		//nos conectamos a la BD
		mysql_select_db('admin_empre');
		
		return $con;*/
		
		
		
		//Hacemos la conexion a la BD e ingresamos el nombre de servidor
		//el usuario  y su clave
		$con = mysql_connect("localhost","caracasw_usersaj","WO}EI3MZz@Xy");
		//Le deciamos que tipo de cotejamiento será utilizado
		mysql_query("SET NAMES 'utf8'");
		//nos conectamos a la BD
		mysql_select_db('caracasw_saj');
		
		return $con;
				
		}
	
	}

class Cliente
{
	
	private $datos;
	
	public function __construct()
	{
		$this->datos=array();
		
		}
		
		
	//Llama a los cliente por el codi_clie para consultalos
	public function ListarCliente($codiClie)
	{
		
		$sql = "select * FROM tb_regi_cli where	codi_clie = $codiClie";
		$res = mysql_query($sql,Conectar::conecta());
		while($reg = mysql_fetch_assoc($res))
		{
			$this->datos[] = $reg;
			
			}
			return $this->datos;
		}
	
	
	//Editamos el Cliente que deseamos actualizar	
	public function EditarCliente($codigo,$nom,$rif,$nit,$fecha,$dire,$pais,$cuidad,$estado,$tele,$telepc,$cont)
	{
		//echo $codigo,$nom,$rif,$nit,$fecha,$dire,$pais,$cuidad,$estado,$tele,$telepc,$cont;
	$sql= "UPDATE tb_regi_cli set nomb_clie = '$nom', rif_clie = '$rif', nit_clie = '$nit', fech_clie ='$fecha', dire_clie = '$dire', pais_clie = '$pais', ciud_clie = '$cuidad', esta_clie = '$estado', tele_clie = '$tele', tele_clie_opci = '$telepc', cont_espe_clie = '$cont' WHERE codi_clie = '$codigo'" ;
		
		$reg = mysql_query($sql,Conectar::conecta());
		echo "<script type='text/javascript'>
			alert('El registro ha sido modificado satisfactoriamente');
			window.location='modificar_cliente.php?codi_clie=$codigo';
			</script>";
		
		}
		
		
	//Registramos los Clientes	
	public function AnadirCliente($nom,$rif,$nit,$fecha,$dire,$pais,$cuidad,$estado,$tele,$telepc,$cont)
	{
		
		$sql="insert into tb_regi_cli values (null,'$nom','$rif','$nit','$fecha','$dire','$pais','$cuidad','$estado','$tele','$telepc','$cont',null)";
		//en este caso  como el codi_clie de la BD es PRIMARY
		$reg = mysql_query($sql, Conectar::conecta());
		echo "<script type='text/javascript'>
			alert('El registro ha sido añadido satisfactoriamente');
			window.location='add_cliente.php';
			</script>";
		
		
		}
		
		
	//Paginado Utilizado primeramente para los CLiente
	public function PaginadoCliente($inicio)
	{
		$sql = "select * from tb_regi_cli order by codi_clie desc limit $inicio, 20";
		//$sql = "select * from tb_regi_cli";
		//echo $sql;
		$res = mysql_query($sql, Conectar::conecta());
		while($reg = mysql_fetch_assoc($res))
		{
			$this->datos[] = $reg;
			
			}
			return $this->datos;
		}
	
		
	//Muestra la tabla con todos los clientes registrados
	public function MostrarClienteTabla()
	{
		$sql = "select * from tb_regi_cli";
		$res = mysql_query($sql,Conectar::conecta());
		
		while($reg = mysql_fetch_assoc($res))
		{
			$this->datos[] = $reg;
			}
		
			return $this->datos;
		}
		

			
		
	}

class Facturacion
{
   protected $codi_factu; 
   private $datos;
	
	public function __construct()
	{
		$this->datos=array();
		
		}
   
   //Guarda los datos de la factura generada
   public function registraFactura($numero_factura,$num_control,$fech_emis,$codi_clie,$monto_neto,$monto_iva,$monto_total,$status_factura,$cantidad,$descripcion,$precio)
   {
 	$sql ="insert into tb_factura values ($numero_factura,'$num_control','$fech_emis','$codi_clie','$monto_neto','$monto_iva','$monto_total','$status_factura')";
    $res = mysql_query($sql,Conectar::conecta());
	
	$sql2 = "insert into tb_detalle_ventas values(null,'$codi_clie','$numero_factura','$cantidad','$descripcion','$precio')";
    $res2 = mysql_query($sql2,Conectar::conecta());	
		
		
        echo "<script type='text/javascript'>
			alert('Factura Guardada');
			window.location='facturacion.php?valor=0';
			</script>";
   } 
    
	//Valida que el nombre de la factura no este repetido
	public function validarNumeroFactura($codi_factu)
	{
		
		$sql ="select codi_factu from tb_factura where codi_factu = '$codi_factu'";
		$res = mysql_query($sql, Conectar::conecta());
		
			if($reg = mysql_num_rows($res)>=1)
			{
				echo "<script type='text/javascript'>
         			alert('Numero de factura ya existente');
         			window.location='facturacion.php?valor=0';
        			 </script>";
			}
			
			
		

		}
		
	public function consultaFacturaGeneral()
	{	
	$sql = "select * from tb_regi_cli as p 
	join tb_factura as s on s.codi_clie=p.codi_clie
	join tb_detalle_ventas as t
	on s.codi_factu = t.codi_factu and t.codi_clie=p.codi_clie";
	
	$res = mysql_query($sql, Conectar::conecta());
	
		while($reg = mysql_fetch_assoc($res))
		{
			$this->datos[] = $reg;
			}
			return $this->datos;
			
	}
    
	
		public function PaginadoFactura($inicio)
	{
		
		$sql = "select * from tb_regi_cli as p 
		join tb_factura as s on s.codi_clie=p.codi_clie
		join tb_detalle_ventas as t
		on s.codi_factu = t.codi_factu and t.codi_clie=p.codi_clie
		order by s.codi_factu desc limit $inicio, 10";

		$res = mysql_query($sql, Conectar::conecta());
		while($reg = mysql_fetch_assoc($res))
		{
			$this->datos[] = $reg;
			}
			return $this->datos;
		}
	


	


}


















?>