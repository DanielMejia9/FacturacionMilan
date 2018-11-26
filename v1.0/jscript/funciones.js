// JavaScript Document

function validarUser(){
	if (document.getElementById("usuario").value =="")
	{
		alert("Debe el nombre de usuario registrado");
	}
	else if(document.getElementById("password").value =="")
	{
		alert("Debe la contraseña del usuario registrado ");
		
		}
	else{
			document.form_ing.submit();
		}
	}
	
	
	function validaReg(){
		
		if(document.getElementById("nom_cliente").value==""){
			alert("Debe escribir el nombre del cliente");
			form_clie.nom_cliente.focus()
			}
				else if(document.getElementById("rifEmp").value==""){
					alert("Debe escribir el RIF");
					form_clie.rifEmp.focus()
					}
					else if(document.getElementById("datepicker").value==""){
						alert("Debe indicar la fecha");
						form_clie.datepicker.focus()
						}
						
						else if(document.getElementById("dirEmp").value==""){
							alert("Debe escribir la dirección");
							form_clie.dirEmp.focus()
						}
							else if(document.getElementById("paisEmp").value==""){
								alert("Debe indicar el pais");
								form_clie.paisEmp.focus()
							}
								else if(document.getElementById("ciuEmp").value==""){
									alert("Debe indicar la ciudad");
									form_clie.ciuEmp.focus()
								}
									else if(document.getElementById("estEmp").value==""){
										alert("Debe indicar el estado");
										form_clie.estEmp.focus()
									}
										/*else if(document.getElementById("telEmpr").value==""){
											alert("Debe indicar un número telefónico");
											form_clie.telEmpr.focus()
										}*/
										
											else if(document.getElementById("contEmp").value==""){
												alert("Debe indicar si el cliente es contribuyente");
												form_clie.contEmp.focus()
											}
											else{
													//document.form_clie.action ="controle/modelo.php"
													document.form_clie.submit();
													
												}                       
		
	}

//Eliminar Registro de Usuario
function eliminarReg(cod_uni){
	var confirmar = confirm("¿Desea eliminar este registro?");
	if(confirmar){
		document.getElementById("cod_uni").value = cod_uni
		document.form_user.action ="controle/modelo_eliminar.php"
		document.form_user.submit();
		}			
	}
//Modificar Registro de Usuario	
function modificarReg(cod_uni){
	var confirmar = confirm("¿Desea modificar este registro?");
	if(confirmar){
		var codi_uni = cod_uni
		document.getElementById("cod_uni").value = cod_uni
		
		document.form_user.submit();

		}
}


//Eliminar registro Cliente
function eliminarClie(cod_uniClie){
	var confirmar = confirm("¿Desea eliminar este registro?");
	if(confirmar){
		document.getElementById("cod_uniClie").value = cod_uniClie
		document.form_clie.action ="../controle/eliminar_cliente.php"
		document.form_clie.submit();
		}			
	}
//Modificar registro Cliente	
function modificarClie(cod_uniClie){
	var confirmar = confirm("¿Desea modificar este registro?");
	if(confirmar){
		var codi_uni = cod_uniClie
		document.getElementById("cod_uniClie").value = cod_uniClie
		document.form_clie.action ="controle/modificar_cliente.php"
		document.form_clie.submit();

		}
}












function validaReguser(){
	if(document.getElementById("nom_usu").value==""){
			alert("Debe indicar el nombre del usuario");
			form.nom_usu.focus()
			}
				else if(document.getElementById("ape_usu").value==""){
					alert("Debe indicar el apellido");
					form.ape_usu.focus()
					}
					else if(document.getElementById("ced_usu").value==""){
						alert("Debe indicar el Nº de cédula");
						form.ced_usu.focus()
						}
						
						else if(document.getElementById("car_usu").value==""){
							alert("Debe indicar el cargo");
							form.car_usu.focus()
						}
							else if(document.getElementById("per_usu").value==""){
								alert("Debe indicar el tipo de usuario");
								form.per_usu.focus()
							}
							
							else if(document.getElementById("pass_usu").value==""  ) {
								alert("Debe escribir una contraseña");
								form.conf_pass_usu.focus()
							}
							
							else if(document.getElementById("conf_pass_usu").value==""  ) {
								alert("Debe confirma la contraseña");
								form.conf_pass_usu.focus()
							}		

							else if(!(document.getElementById("pass_usu").value == document.getElementById("conf_pass_usu").value )) {
								alert("Debe escribir la misma contraseña");
								form.conf_pass_usu.focus()
							}
						
								else{
									document.form_user.action ="controle/modelo_usuario.php"
									document.form_user.submit();								
									} 			   							                  
	}
	
	
	function validaRegcont(){
	if(document.getElementById("nom_cont").value==""){
			alert("Debe indicar el nombre del usuario");
			form.nom_usu.focus()
			}
				else if(document.getElementById("ape_cont").value==""){
					alert("Debe indicar el apellido");
					form.ape_usu.focus()
					}
					else if(document.getElementById("tel_cont_local").value==""){
						alert("Debe indicar el Nº de telefono");
						form.ced_usu.focus()
						}
						
						/*else if(document.getElementById("car_usu").value==""){
							alert("Debe indicar el cargo");
							form.car_usu.focus()
						}
							else if(document.getElementById("per_usu").value==""){
								alert("Debe indicar el tipo de usuario");
								form.per_usu.focus()
							}
							
							else if(document.getElementById("pass_usu").value==""  ) {
								alert("Debe escribir una contraseña");
								form.conf_pass_usu.focus()
							}
							
							else if(document.getElementById("conf_pass_usu").value==""  ) {
								alert("Debe confirma la contraseña");
								form.conf_pass_usu.focus()
							}		

							else if(!(document.getElementById("pass_usu").value == document.getElementById("conf_pass_usu").value )) {
								alert("Debe escribir la misma contraseña");
								form.conf_pass_usu.focus()
							}*/
						
								else{
									document.form_user.action ="controle/modelo_contacto.php"
									document.form_user.submit();								
									} 			   							                  
	}
	
	
	function validaModuser(){
	if(document.getElementById("nom_usum").value==""){
			alert("Debe indicar el nombre del usuario");
			form_moduse.nom_usu.focus()
			}
				else if(document.getElementById("ape_usum").value==""){
					alert("Debe indicar el apellido");
					form_moduse.ape_usu.focus()
					}
					else if(document.getElementById("ced_usum").value==""){
						alert("Debe indicar el Nº de cédula");
						form_moduse.ced_usu.focus()
						}
						
						else if(document.getElementById("car_usum").value==""){
							alert("Debe indicar el cargo");
							form_moduse.car_usu.focus()
						}
							else if(document.getElementById("per_usum").value==""){
								alert("Debe indicar el tipo de usuario");
								form_moduse.per_usu.focus()
							}
							
							else if(document.getElementById("pass_usum").value==""  ) {
								alert("Debe escribir una contraseña");
								form_moduse.conf_pass_usu.focus()
							}
							
							else if(document.getElementById("conf_pass_usum").value==""  ) {
								alert("Debe confirma la contraseña");
								form_moduse.conf_pass_usu.focus()
							}		

							else if(!(document.getElementById("pass_usum").value == document.getElementById("conf_pass_usum").value )) {
								alert("Debe escribir la misma contraseña");
								form_moduse.conf_pass_usu.focus()
							}
						
								else{
									document.form_moduse.action ="controle/modelo_modif_user.php"
									document.form_moduse.submit();								
									} 			   							                  
	}



function verUsuer(){	
	
		var tabla1 = document.getElementById("Tabla1");
		var tabla2 = document.getElementById("Tabla2");
		var titulo1 = document.getElementById("titulo1");
		var pie =   document.getElementById("pie");
		if (tabla1.style.display == "none") {
		tabla1.style.display = "";
		tabla2.style.display = "";
		pie.style.display = "none";
		} else {
		tabla1.style.display = "none";
		tabla2.style.display = "none";
		pie.style.display = "";
		
} 

		
		if (titulo1.style.display == "none") {
		titulo1.style.display = "";
		
		} else {
		titulo1.style.display = "none";
		} 
	}
	
	
	
//Calcula de la suma de la facturacion
function suma(v1,v2){
	
	//Toma el valor incremen de los seleccionado en la tabla
	var v1 = v1 ;
	var v2 = v2;

	//alert(v1);
	//obtenemos el valor de los input y le asignamos el valor del incremento
	document.getElementById("txtCant"+v1).value;
	document.getElementById("txtPrec"+v1).value;
	
	var cantidad;
	var precio;
	var suma;
	
	cantidad = parseFloat(document.getElementById("txtCant"+v1).value);
	precio   = parseFloat(document.getElementById("txtPrec"+v1).value);
	
	cantidad1 = parseFloat(cantidad);
	
	
	
	precio1 = parseFloat(precio);
	
	
		
	suma =  cantidad1 * precio1;
	//Coloca dos decimales
	suma2 = suma.toFixed(2);
	//Asignamos suma2 a suma3 para modificar
	suma3 = suma2;
	//Convertimos los puntos por comas
	suma3 =  suma3.toString().replace(/\./g,',');
	suma3 = suma3.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1.');
	suma3 = suma3.split('').reverse().join('').replace(/^[\.]/,'');
	
	
	if(document.getElementById("txtCant"+v1).value == "" || document.getElementById("txtPrec"+v1).value  == "")
	{
		document.getElementById("txtTota").value == "";

		}
		else
		{
			txtTota = document.getElementById("txtTota"+v1).value = suma3;
			
			valor=document.getElementById("valorsuma"+v1).value = suma2;
			
			}
			//document.getElementById("txtTota"+v1).disabled = true;
			
			
	
	
	
	//cambio del punto por la coma
	suma2 =  suma2.toString().replace(/\./g,',');
	cantidad1 =  cantidad1.toString().replace(/\./g,',');
	precio1 =  precio1.toString().replace(/\./g,',');
	
	
	}
	
	
		
	function sumaTotales(total)
	{
	
		valor1 = document.getElementById("valorsuma1").value;
		valor1 = parseFloat(valor1);
		valor2 = document.getElementById("valorsuma2").value;
		valor2 = parseFloat(valor2);
		valor3 = document.getElementById("valorsuma3").value;
		valor3 = parseFloat(valor3);
		valor4 = document.getElementById("valorsuma4").value;
		valor4 = parseFloat(valor4);
		valor5 = document.getElementById("valorsuma5").value;
		valor5 = parseFloat(valor5);
		valor6 = document.getElementById("valorsuma6").value;
		valor6 = parseFloat(valor6);
		valor7 = document.getElementById("valorsuma7").value;
		valor7 = parseFloat(valor7);
		valor8 = document.getElementById("valorsuma8").value;
		valor8 = parseFloat(valor8);
		valor9 = document.getElementById("valorsuma9").value;
		valor9 = parseFloat(valor9);
		valor10 = document.getElementById("valorsuma10").value;
		valor10 = parseFloat(valor10);
		
		
		if(valor1 =="")
		{
			valor1=0;
			}
			if(valor2 =="")
			{
			valor2=0;
			}
			if(valor3 =="")
			{
			valor3=0;
			}
			if(valor4 =="")
			{
			valor4=0;
			}
			if(valor5 =="")
			{
			valor5=0;
			}
			if(valor6 =="")
			{
			valor6=0;
			}
			if(valor7 =="")
			{
			valor7=0;
			}
			if(valor8 =="")
			{
			valor8=0;
			}
			if(valor9 =="")
			{
			valor9=0;
			}
			if(valor10 =="")
			{
			valor10=0;
			}
			
		valorTotal = valor1 + valor2 + valor3 + valor4 + valor5 + valor6 + valor7 + valor8 + valor9 + valor10;
		valorTotal = parseFloat(valorTotal);
		
		var selectiva = document.getElementById("selectiva").selectedIndex;
		
		if (selectiva ==0)
		{
			iva = valorTotal * 0;
			}
			if (selectiva ==1)
			{
				iva = valorTotal * 0.12;
				}
			
		
		
		
		
		totalGeneral = valorTotal + iva;
		
		//Permitir solo dos decimales
		valorTotal = valorTotal.toFixed(2);
		iva = iva.toFixed(2);
		totalGeneral = totalGeneral.toFixed(2);
		
		//Convertir los puntos en comas
		valorTotal =  valorTotal.toString().replace(/\./g,',');
		iva =  iva.toString().replace(/\./g,',');
		totalGeneral =  totalGeneral.toString().replace(/\./g,',');
		
		
		//Colocar separadores de millares
		valorTotal = valorTotal.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1.');
		valorTotal = valorTotal.split('').reverse().join('').replace(/^[\.]/,'');
		
		iva = iva.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1.');
		iva = iva.split('').reverse().join('').replace(/^[\.]/,'');
		
		totalGeneral = totalGeneral.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1.');
		totalGeneral = totalGeneral.split('').reverse().join('').replace(/^[\.]/,'');
		
		
		document.getElementById("subTotal").value = valorTotal;
		document.getElementById("ivaRes").value = iva;
		document.getElementById("genTotal").value = totalGeneral;
		
		
		
		}
		
		
		function validarn(e) { // 1
    tecla = (document.all) ? e.keyCode : e.which; // 2
    if (tecla==8) return true; // 3
	 if (tecla==9) return true; // 3
	 if (tecla==11) return true; // 3
    patron = /[0-9/.]/; // 4
 
    te = String.fromCharCode(tecla); // 5
    return patron.test(te); // 6
}
		


function onSelect(valor){	
	
	valor = valor
	document.getElementById('valSelect').value = valor
	document.form_fact.action ="controle/modelo_factura.php?valor="+valor;
	document.form_fact.submit();
	//document.form_fact.action ="facturacion.php"
	//window.location.href = "facturacion.php?valor="+valor;
	}
	
	function onSelectP(valor){	
	
	valor = valor
	document.getElementById('valSelect').value = valor
	document.form_fact.action ="controle/modelo_presupuesto.php?valor="+valor;
	document.form_fact.submit();
	//document.form_fact.action ="facturacion.php"
	//window.location.href = "facturacion.php?valor="+valor;
	}
	
	function onSelectR(valor){	
	
	valor = valor
	document.getElementById('valSelect').value = valor
	document.form_fact.action ="controle/modelo_recibo.php?valor="+valor;
	document.form_fact.submit();
	//document.form_fact.action ="facturacion.php"
	//window.location.href = "facturacion.php?valor="+valor;
	}
	
	function imprimirFactura()
	{
		//window.location.href = "reporte/imprimir_factura.php";
		document.form_fact.action ="facturacion/imprimir_factura.php";
		document.form_fact.submit();
		//alert("Entre a la funcion");
		}
		
     function guardarFactura()
	{
		//window.location.href = "reporte/imprimir_factura.php";
		document.form_fact.action ="reporte/guardar_factura.php";
		document.form_fact.submit();
		//alert("Entre a la funcion");
		}
		
	function guardarPresupuesto()
	{
		//window.location.href = "reporte/imprimir_factura.php";
		document.form_fact.action ="reporte/guardar_presupuesto.php";
		document.form_fact.submit();
		//alert("Entre a la funcion");
		}
		
	function guardarRecibo()
	{
		//window.location.href = "reporte/imprimir_factura.php";
		document.form_fact.action ="reporte/guardar_recibo.php";
		document.form_fact.submit();
		//alert("Entre a la funcion");
		}
		
		
		
//Valida si se selecciono algun cliente para la factura
function validarFactura()
{

	if($("#sele_clie option:selected").val() == 0) 
	{
    alert("Debe seleccionar el cliente");
    return false;
	}
	else if(document.getElementById("numero_control").value =="")
	{
		alert("Escriba el numero de control de la factura");
		}
		else if(document.getElementById("numero_factura").value =="" )
		{
			alert("Escriba el numero de la factura");
			}
			else if(document.getElementById("datepicker").value =="" )
			{
				alert("Seleccione la fecha");
				}
				else
				{
					document.form_fact.action ="registrar_factura.php";
					document.form_fact.submit();
					}
			
	
	}
	





