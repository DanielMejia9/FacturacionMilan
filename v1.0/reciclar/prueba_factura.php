<html>
<head>
</head>
<body>
<script src="http://code.jquery.com/jquery-1.9.0.js"></script>
<script src="http://code.jquery.com/jquery-migrate-1.0.0.js"></script>
<script type="text/javascript">

function calcular(i)
{
	var can;
	can=$("#can"+i).val();
	if(can =="") can=0;


	var pre;
	pre=$("#pre"+i).val();
	if(pre =="") pre=0;
	
	tot = can*pre;
	$("#tot"+i).val(tot);
	$("#oculto"+i).val(tot);

	
	}
	
	function subtotales()
	{
		
			var oculto;
			var i = 0;
		    var subtotal=0;
			for(j = 1;j<=10; j++)
			{
			var t = document.getElementById("oculto"+j).value;
			var total = parseInt(t);
			subtotal = parseInt(subtotal);
			subtotal=subtotal + total[j];
			//alert(total);
			}

			
			alert(subtotal);
			document.getElementById("subtotal").value = subtotal; 
		}
		var total;
  		total=new Array(10);
		
		function valor(sueldos)
		{
			//alert(sueldos);
			var total=0;
			var f;
			for(f=0;f<sueldos.length;f++)
			{
			  total=total+sueldos[f];
			}
			document.getElementById("subtotal").value = total; 
		}
		


		
		
		
		
		var sueldos;
  		sueldos=new Array(8);
		calcularGastos(sueldos);
</script>




<table>
	<tr>
	<td>Cantida</td>
    <td>descripcion</td>
    <td>precio</td>
    <td>total</td>
   	</tr>
    
    <?php
	$i = 0;
	$j = 0;
	
	for($i=0; $i<10; $i ++){
		$j =$j + 1;
	?>
    
    <tr>
	<td><input type="text" name="can<?php echo $j?>" id="can<?php echo $j?>" onKeyup="calcular(<?php echo $j?>)"/></td>
    <td><input type="text" name="des1" id="des1" /></td>
    <td><input type="text" name="pre<?php echo $j?>" id="pre<?php echo $j?>" onKeyup="calcular(<?php echo $j?>)"/></td>
    <td><input type="text" name="tot<?php echo $j?>" id="tot<?php echo $j?>" onKeyPress="valor(this.value);"/></td>
    <input type="hidden" name="oculto<?php echo $j?>" id="oculto<?php echo $j?>" value=""/>
    <?php
	}
	?>
   
    
    <tr>
	<td>Subtotal<input type="text" name="subtotal" id="subtotal"  onblur="subtotales(this.value)"/></td>
   	</tr>

</body>
</html>