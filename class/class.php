<?php

class Conectar
{
    public static function conecta()
    {
        //Hacemos la conexion a la BD e ingresamos el nombre de servidor
        //el usuario  y su clave
        //$con = mysql_connect("localhost", "factura_user", "Tsa5h34?");
        $con = mysql_connect("localhost", "root", "");
        //Le deciamos que tipo de cotejamiento será utilizado
        mysql_query("SET NAMES 'utf8'");
        //nos conectamos a la BD
        mysql_select_db('facturacion_milan');

        return $con;


        /*//Hacemos la conexion a la BD e ingresamos el nombre de servidor
        //el usuario  y su clave
        $con = mysql_connect("localhost","caracasw_usersaj","WO}EI3MZz@Xy");
        //Le deciamos que tipo de cotejamiento será utilizado
        mysql_query("SET NAMES 'utf8'");
        //nos conectamos a la BD
        mysql_select_db('caracasw_saj');


        return $con;
        */
    }

}

class Cliente
{

    private $datos;

    public function __construct()
    {
        $this->datos = array();

    }

    public function AddCategoriaClientes($nombre, $puntos, $nombre_img)
    {
        $id = com_create_guid();
        $sql = "insert into tb_categorias_clientes values($id,'$nombre','$puntos','$nombre_img')";
        $reg = mysql_query($sql, Conectar::conecta());
        /*echo "<script type='text/javascript'>
            alert('El registro ha sido añadido satisfactoriamente');
            window.location='registro_categoria.php';
            </script>";*/
    }

    //Llama a los cliente por el codi_clie
    public function ListarCliente($codiClie)
    {
        $sql = "select * FROM tb_regi_cli where	codi_clie = $codiClie";
        $res = mysql_query($sql, Conectar::conecta());
        while ($reg = mysql_fetch_assoc($res))
        {
            $this->datos[] = $reg;
        }
        return $this->datos;
    }

    //Llama a los cliente por el codi_clie
    public function ListarEmpleados($id)
    {
        $sql = "SELECT * FROM tb_empleados WHERE id = $id";
        $res = mysql_query($sql, Conectar::conecta());
        while ($reg = mysql_fetch_assoc($res))
        {
            $this->datos[] = $reg;
        }
        return $this->datos;
    }

    //Consultamos los puntos acumulados del cliente
    public function ConsultaPuntos($codiClie)
    {
        $query = "select * FROM tb_puntaje_cliente WHERE codi_cliente = $codiClie";
        $result = mysql_query($query, Conectar::conecta());
        while ($res = mysql_fetch_assoc($result))
        {
            $this->row[] = $res;
        }
        return $this->row;
    }

    //
    public function listarExpediente($codiClie)
    {

        $sql = "select * FROM tb_regi_cli AS A inner join tb_expediente AS B on A.codi_clie = B.codi_clie where	A.codi_clie = $codiClie";
        $res = mysql_query($sql, Conectar::conecta());
        while ($reg = mysql_fetch_assoc($res))
        {
            $this->datos[] = $reg;

        }
        return $this->datos;
    }

    public function detalleExpediente($codiClie)
    {

        $sql = "select * FROM tb_expediente where codi_exp = $codiClie";
        $res = mysql_query($sql, Conectar::conecta());
        while ($reg = mysql_fetch_assoc($res))
        {
            $this->datos[] = $reg;

        }
        return $this->datos;
    }


    public function guardarExpediente($codi_clie, $titulo, $descripcion)
    {

        $sql = "insert into tb_expediente values (null,'$titulo','$descripcion','$codi_clie')";
        //en este caso  como el codi_clie de la BD es PRIMARY
        $reg = mysql_query($sql, Conectar::conecta());

        $id = mysql_insert_id();
        $this->codi_clie = $codi_clie;
        echo "<script type='text/javascript'>
			alert('El registro ha sido añadido satisfactoriamente');
			window.location='expediente.php?id=$id&codi_clie=$codi_clie';
			</script>";
    }

    public function updateExpediente($id, $titulo, $descripcion,$codi_clie)
    {
        $sql = "UPDATE tb_expediente set titulo = '$titulo', descripcion = '$descripcion' WHERE codi_exp = '$id'";
        //en este caso  como el codi_clie de la BD es PRIMARY
        $reg = mysql_query($sql, Conectar::conecta());

        echo "<script type='text/javascript'>
			alert('El registro ha sido añadido satisfactoriamente');
            //document.getElementById('mensaje').innerHTML += '<br>El registro ha sido añadido satisfactoriamente';
			window.location='expediente.php?id=$id&codi_clie=$codi_clie';
			</script>";
    }

    //Editamos el Cliente que deseamos actualizar
    public function EditarCliente($codigo, $cedula, $nom, $apellido, $fecha, $dire, $tele, $telepc, $email, $password, $puntos)
    {
        if ($puntos != NULL) {
            $udPuntos = "UPDATE tb_puntaje_cliente SET puntaje_cliente = '$puntos' WHERE codi_cliente = '$codigo'";
            mysql_query($udPuntos, Conectar::conecta());
        }

        if ($password != NULL) {
            $clave = md5($password);
            $udPass = "UPDATE tb_regi_cli SET password = '$clave' WHERE codi_cliente = '$codigo'";
            mysql_query($udPass, Conectar::conecta());
        }

        $sql = "UPDATE tb_regi_cli set cedula = '$cedula', nomb_clie = '$nom', ape_clie = '$apellido', fech_clie ='$fecha', dire_clie = '$dire', tele_clie = '$tele', tele_clie_opci = '$telepc', email = '$email' WHERE codi_clie = '$codigo'";

        $reg = mysql_query($sql, Conectar::conecta());
        echo "<script type='text/javascript'>
			alert('El registro ha sido modificado satisfactoriamente');
			window.location='modificar_cliente.php?codi_clie=$codigo';
			</script>";

    }

    //Editamos el Empleados
    public function EditarEmpleado($id, $cedula, $nombre, $apellido, $fecha, $direccion, $telefono_p, $telefono_s, $email, $cargo)
    {
        $fecha_nacimiento = date("Y-m-d", strtotime($fecha));

        $sql = "UPDATE tb_empleados SET cedula = '$cedula', nombre = '$nombre', apellido = '$apellido', fecha_nacimiento ='$fecha_nacimiento', direccion = '$direccion', telefono_principal = '$telefono_p', telefono_secundario = '$telefono_s', email = '$email', cargo_ocupacion = '$cargo' WHERE id = '$id'";

        $reg = mysql_query($sql, Conectar::conecta());
        echo "<script type='text/javascript'>
            alert('El registro ha sido modificado satisfactoriamente');
            window.location='modificar_empleado.php?id=$id';
            </script>";

    }

    //Registramos los Clientes
    public function AnadirCliente($cedula, $nom_cliente, $ape_cliente, $fecha, $dire, $tele, $telepc, $email, $clave)
    {

        $sql = "insert into tb_regi_cli values (null,'$cedula','$nom_cliente','$ape_cliente',null,null,'$fecha','$dire',null,null,null,'$tele','$telepc','$email',null,null,'$clave')";
        //en este caso  como el codi_clie de la BD es PRIMARY
        $reg = mysql_query($sql, Conectar::conecta());
        echo "<script type='text/javascript'>
			alert('El registro ha sido añadido satisfactoriamente');
			window.location='add_cliente.php';
			</script>";
    }

    //Registramos los Clientes
    public function AnadirEmpleado($cedula, $nombre, $apellido, $fecha, $direccion, $telep, $teles, $email, $cargo)
    {
        $con = mysqli_connect("localhost", "factura_user", "Tsa5h34?","facturacion_milan");
        //$con = mysqli_connect("localhost", "root", "","facturacion_milan");

        $fecha_nacimiento = date("Y-m-d", strtotime($fecha));
        $sql = mysqli_query($con, "INSERT INTO tb_empleados (cedula, nombre, apellido, fecha_nacimiento, direccion, telefono_principal, telefono_secundario, email, cargo_ocupacion) VALUES ('$cedula','$nombre','$apellido','$fecha_nacimiento','$direccion','$telep','$teles','$email','$cargo')");
        
        echo "<script type='text/javascript'>
            alert('El registro ha sido añadido satisfactoriamente');
            window.location='add_empleado.php';
            </script>";
    }

    //Paginado Utilizado primeramente para los empleados
    public function PaginadoEmpleado($inicio)
    {
        $sql = "select * from tb_empleados order by id desc limit $inicio, 10";
        //$sql = "select * from tb_regi_cli";
        //echo $sql;
        $res = mysql_query($sql, Conectar::conecta());
        while ($reg = mysql_fetch_assoc($res))
        {
            $this->datos[] = $reg;

        }
        return $this->datos;
    }

    //Paginado Utilizado primeramente para los CLiente
    public function PaginadoCliente($inicio)
    {
        $sql = "select * from tb_regi_cli order by codi_clie desc limit $inicio, 10";
        //$sql = "select * from tb_regi_cli";
        //echo $sql;
        $res = mysql_query($sql, Conectar::conecta());
        while ($reg = mysql_fetch_assoc($res))
        {
            $this->datos[] = $reg;

        }
        return $this->datos;
    }


    //Muestra la tabla con todos los clientes registrados
    public function MostrarClienteTabla()
    {
        $sql = "select * from tb_regi_cli";
        $res = mysql_query($sql, Conectar::conecta());

        while ($reg = mysql_fetch_assoc($res))
        {
            $this->datos[] = $reg;
        }

        return $this->datos;
    }

    //Muestra la tabla con todos los empleados registrados
    public function MostrarEmpleadoTabla()
    {
        $sql = "select * from tb_empleados";
        $res = mysql_query($sql, Conectar::conecta());

        while ($reg = mysql_fetch_assoc($res))
        {
            $this->datos[] = $reg;
        }

        return $this->datos;
    }


    //Registramos los Clientes
    public function AnadirCategoria($nom, $status, $fecha)
    {
        $sql = "insert into tb_categorias_productos values (null,'$nom','$status','$fecha')";
        //en este caso  como el codi_clie de la BD es PRIMARY
        $reg = mysql_query($sql, Conectar::conecta());
        echo "<script type='text/javascript'>
            alert('El registro satisfactorio');
            window.location='add_categoria.php';
            </script>";
    }

     //Registramos las marcas
    public function AnadirMarca($descripcion)
    {
        //$con = mysqli_connect("localhost", "root", "","facturacion_milan");
        $con = mysqli_connect("localhost", "factura_user", "Tsa5h34?","facturacion_milan");
        $sql = mysqli_query($con, "INSERT INTO tb_marcas (descripcion_marca) VALUES ('$descripcion')");
        //en este caso  como el codi_clie de la BD es PRIMARY
        echo "<script type='text/javascript'>
            alert('El registro satisfactorio');
            window.location='add_marca.php';
            </script>";
    }

    //Paginado Utilizado primeramente para los Categoria
    public function PaginadoCategoria($inicio)
    {
        $sql = "select * from tb_categorias_productos order by id_categoria desc limit $inicio, 10";
        //$sql = "select * from tb_regi_cli";
        //echo $sql;
        $res = mysql_query($sql, Conectar::conecta());
        while ($reg = mysql_fetch_assoc($res))
        {
            $this->datos[] = $reg;

        }
        return $this->datos;
    }

    //Paginado Utilizado primeramente para los Categoria
    public function PaginadoMarca($inicio)
    {
        $sql = "select * from tb_marcas order by id_marca desc limit $inicio, 10";
        //$sql = "select * from tb_regi_cli";
        //echo $sql;
        $res = mysql_query($sql, Conectar::conecta());
        while ($reg = mysql_fetch_assoc($res))
        {
            $this->datos[] = $reg;

        }
        return $this->datos;
    }


    //Muestra la tabla con todos los clientes registrados
    public function MostrarCategoriaTabla()
    {
        $sql = "select * from tb_categorias_productos";
        $res = mysql_query($sql, Conectar::conecta());

        while ($reg = mysql_fetch_assoc($res))
        {
            $this->datos[] = $reg;
        }

        return $this->datos;
    }

    //Muestra la tabla con todos los clientes registrados
    public function MostrarMarcaTabla()
    {
        $sql = "select * from tb_marcas";
        $res = mysql_query($sql, Conectar::conecta());

        while ($reg = mysql_fetch_assoc($res))
        {
            $this->datos[] = $reg;
        }

        return $this->datos;
    }

    /////
    //Registramos los Producto
    public function AnadirProducto($producto, $categoria, $marca, $cantidad, $costo, $precio, $minimo, $puntaje, $fecha)
    {
        $sql = "insert into tb_productos values (null,'$producto','$categoria','$marca','$cantidad','$costo','$precio','$minimo','$puntaje','$fecha')";
        //en este caso  como el codi_clie de la BD es PRIMARY
        $reg = mysql_query($sql, Conectar::conecta());
        echo "<script type='text/javascript'>
            alert('El registro ha sido añadido satisfactoriamente');
            window.location='add_producto.php';
            </script>";


    }


    //Paginado Utilizado primeramente para los CLiente
    public function PaginadoProducto($inicio)
    {
        $sql = "select * from tb_productos  AS A inner join tb_categorias_productos AS B on A.id_categoria = B.id_categoria order by categoria desc limit $inicio, 20";
        //$sql = "select * from tb_regi_cli";
        //echo $sql;
        $res = mysql_query($sql, Conectar::conecta());
        while ($reg = mysql_fetch_assoc($res))
        {
            $this->datos[] = $reg;

        }
        return $this->datos;
    }


    //Muestra la tabla con todos los clientes registrados
    public function MostrarProductoTabla()
    {
        $sql = "select * from tb_productos AS A inner join tb_categorias_productos AS B on A.id_categoria = B.id_categoria";
        $res = mysql_query($sql, Conectar::conecta());

        while ($reg = mysql_fetch_assoc($res))
        {
            $this->datos[] = $reg;
        }

        return $this->datos;
    }
    /////
    //Muestra la tabla libro de Ventas
    public function libroVentas()
    {
        $sql = "select * from tb_factura AS A inner join tb_regi_cli AS B  on A.codi_clie = B.codi_clie";
        $res = mysql_query($sql, Conectar::conecta());

        while ($reg = mysql_fetch_assoc($res))
        {
            $this->datos[] = $reg;
        }

        return $this->datos;
    }


    //Paginado Utilizado primeramente para los CLiente
    public function PaginadolibroVentas($inicio)
    {
        $sql = "select * from tb_factura AS A inner join tb_regi_cli AS B  on A.codi_clie = B.codi_clie order by A.codi_clie desc limit $inicio, 10";
        //$sql = "select * from tb_regi_cli";
        //echo $sql;
        $res = mysql_query($sql, Conectar::conecta());
        while ($reg = mysql_fetch_assoc($res))
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
        $this->datos = array();

    }

    //Guarda los datos de la factura generada
    public function registraFactura($numero_control,$datepicker,$codi_clie,$monto_neto,$monto_iva,$monto_total)
    {
        $sql = "insert into tb_factura values (null,'$numero_control','$datepicker','$codi_clie','$monto_neto','$monto_iva','$monto_total')";
        $res = mysql_query($sql, Conectar::conecta());

    }

    public function registraGastos($datepicker,$monto_neto,$monto_iva,$monto_total)
    {
        $sql = "insert into tb_gastos values (null,'$datepicker','$monto_neto','$monto_iva','$monto_total')";
        $res = mysql_query($sql, Conectar::conecta());

    }

    public function consultaFacturaGeneral()
    {
        $sql = "select * from tb_regi_cli as p
	join tb_factura as s on s.codi_clie=p.codi_clie
	join tb_detalle_ventas as t
	on s.codi_factu = t.codi_factu and t.codi_clie=p.codi_clie";

        $res = mysql_query($sql, Conectar::conecta());

        while ($reg = mysql_fetch_assoc($res))
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
        while ($reg = mysql_fetch_assoc($res))
        {
            $this->datos[] = $reg;
        }
        return $this->datos;
    }



}



Class Productos
{

   //protected $id;
   private $datos;

    public function __construct()
    {
        $this->datos=array();

        }


    public function ListarCategoria($id)
    {
        $sql = "select * from tb_categorias_productos where id_categoria = $id";
        $res = mysql_query($sql,Conectar::conecta());
        while($reg = mysql_fetch_assoc($res))
        {
            $this->datos[] = $reg;

            }
            return $this->datos;
    }

    public function ListarMarca($id)
    {
        $sql = "select * from tb_marcas where id_marca = $id";
        $res = mysql_query($sql,Conectar::conecta());
        while($reg = mysql_fetch_assoc($res))
        {
            $this->datos[] = $reg;
        }
        
        return $this->datos;
    }

    public function mostrarCategoria()
    {
        $sql = "select * from tb_categorias_productos";
        $res = mysql_query($sql,Conectar::conecta());
        while($reg = mysql_fetch_assoc($res))
        {
            $this->datos[] = $reg;

            }
            return $this->datos;
    }

    //Editamos el Categoria que deseamos actualizar
    public function EditarCategoria($id, $nom_categoria, $status,$fecha)
    {
        //echo $codigo,$nom,$rif,$nit,$fecha,$dire,$pais,$cuidad,$estado,$tele,$telepc,$cont;
        $sql = "UPDATE tb_categorias_productos set categoria = '$nom_categoria', status_categoria = '$status',fecha_creacion ='$fecha' WHERE id_categoria = '$id'";

        $reg = mysql_query($sql, Conectar::conecta());
        echo "<script type='text/javascript'>
            alert('El registro ha sido modificado satisfactoriamente');
            window.location='../productos/modificar_categoria.php?id=$id';
            </script>";

    }

    //Editamos el Categoria que deseamos actualizar
    public function EditarMarca($id, $descripcion)
    {
        //echo $codigo,$nom,$rif,$nit,$fecha,$dire,$pais,$cuidad,$estado,$tele,$telepc,$cont;
        $sql = "UPDATE tb_marcas SET descripcion_marca = '$descripcion' WHERE id_marca = '$id'";

        $reg = mysql_query($sql, Conectar::conecta());
        echo "<script type='text/javascript'>
            alert('El registro ha sido modificado satisfactoriamente');
            window.location='../productos/modificar_marca.php?id=$id';
            </script>";

    }


    public function ListarProductos($id)
    {
        $sql = "select * from tb_productos AS A inner join tb_categorias_productos AS B on A.id_categoria = B.id_categoria where id_producto = $id";
        $res = mysql_query($sql,Conectar::conecta());
        while($reg = mysql_fetch_assoc($res))
        {
            $this->datos[] = $reg;

            }
            return $this->datos;
    }

        //Editamos el Producto que deseamos actualizar
    public function EditarProducto($id, $producto, $categoria, $marca, $cantidad, $costo, $precio, $minimo, $puntaje, $fecha)
    {
        //echo $codigo,$nom,$rif,$nit,$fecha,$dire,$pais,$cuidad,$estado,$tele,$telepc,$cont;
        $sql = "UPDATE tb_productos set descripcion_producto = '$producto', id_categoria = '$categoria', id_marca = '$marca', cantidad_producto = '$cantidad', costo_producto = $costo, precio_producto = '$precio', minimo_stock = '$minimo', puntaje = '$puntaje', fecha_creacion ='$fecha' WHERE id_producto = '$id'";

        $reg = mysql_query($sql, Conectar::conecta());
        echo "<script type='text/javascript'>
            alert('El registro ha sido modificado satisfactoriamente');
            window.location='../productos/modificar_producto.php?id_producto=$id';
            </script>";

    }
}

?>
