// JavaScript Document

var ordenar = '';

$(document).ready(function(){

	



	// Llamando a la funcion de busqueda al

	// cargar la pagina

	

	var dates = $( "#del, #al" ).datepicker({

			yearRange: "-50",

			defaultDate: "+1w",

			changeMonth: true,

			changeYear: true,

			onSelect: function( selectedDate ) {

				var option = this.id == "del" ? "minDate" : "maxDate",

					instance = $( this ).data( "datepicker" ),

					date = $.datepicker.parseDate(

						instance.settings.dateFormat ||

						$.datepicker._defaults.dateFormat,

						selectedDate, instance.settings );

				dates.not( this ).datepicker( "option", option, date );

			}

	});

	

	// filtrar al darle click al boton

	//$("#btnfiltrar").click(function(){ filtrar() });
	$("#buscar").keypress(function(){ filtrar() });
	$("#buscar").keyup(function(){ filtrar() });
	$("#cantidad").change(function(){ filtrar() });
	$("#categoria").change(function(){ filtrar() });
	$("#marca").change(function(){ filtrar() });
	$("#precio").change(function(){ filtrar() });

	// boton cancelar

	$("#btncancel").click(function(){ 

		$(".fondo input").val('')

		$(".fondo select").find("option[value='']").attr("selected",true)

		filtrar()

	});

	

	// ordenar por

	$("#data th span").click(function(){

		var orden = '';

		if($(this).hasClass("desc"))

		{

			$("#data th span").removeClass("desc").removeClass("asc")

			$(this).addClass("asc");

			ordenar = "&orderby="+$(this).attr("title")+" asc"		

		}else

		{

			$("#data th span").removeClass("desc").removeClass("asc")

			$(this).addClass("desc");

			ordenar = "&orderby="+$(this).attr("title")+" desc"

		}

		filtrar()

	});

});




    
function filtrar()

{	

	$.ajax({

		data: $("#frm_filtro").serialize()+ordenar,

		type: "POST",

		dataType: "json",

		url: "ajax.php?action=listar",

			success: function(data){

				var html = '';

				var caracteres= 200;

				if(data.length != 0){

					$.each(data, function(i,item){	
							html += '<div class="row altoFila">'
							
								html += '<div class="col-md-1 col-sm-12">'
									html += item.id_producto
                                html += '</div>'    
                               	html += '<div class="col-md-3 col-sm-12">'
									html += item.descripcion_producto
                                html += '</div>'
                                html += '<div class="col-md-2 col-sm-12">'
									html += item.categoria
                                html += '</div>'
                                html += '<div class="col-md-1 col-sm-12">'
									html += item.cantidad_producto
                                html += '</div>'
                                html += '<div class="col-md-1 col-sm-12">'
									html += item.precio_producto
                                html += '</div>'
                                html += '<div class="col-md-2 col-sm-12">'
									html += item.descripcion_marca
                                html += '</div>'  
                                html += '<div class="col-md-1 col-sm-12">'
									html += '<a  href="modificar_producto.php?id_producto='+item.id_producto+'"  class="btn btn-warning"></a>'
                                html += '</div>' 
                                html += '<div class="col-md-1 col-sm-12">'
									html += '<a  onclick="eliminarProducto('+item.id_producto+')" class="btn btn-danger"></a>'
                                html += '</div>' 
							html += '</div>';								

					});					

				}

				if(html == '') html = '<div class="fila tabla filaContenido">No se encontraron registros..</div>'

				$("#resultado").html(html);

			}

	  });

}


function filtrar_user()

{	

	$.ajax({

		data: $("#frm_filtro_user").serialize()+ordenar,

		type: "POST",

		dataType: "json",

		url: "ajax.php?action=listar",

			success: function(data){

				var html = '';

				var caracteres= 200;

				if(data.length != 0){

					$.each(data, function(i,item){	
							html += '<div class="row altoFila">'
							
								html += '<div class="col-md-1 col-sm-12">'
									html += item.id_producto
                                html += '</div>'    
                               	html += '<div class="col-md-3 col-sm-12">'
									html += item.descripcion_producto
                                html += '</div>'
                                html += '<div class="col-md-2 col-sm-12">'
									html += item.categoria
                                html += '</div>'
                                html += '<div class="col-md-1 col-sm-12">'
									html += item.cantidad_producto
                                html += '</div>'
                                html += '<div class="col-md-1 col-sm-12">'
									html += item.precio_producto
                                html += '</div>'
                                html += '<div class="col-md-2 col-sm-12">'
									html += item.descripcion_marca
                                html += '</div>'  
                                html += '<div class="col-md-1 col-sm-12">'
									html += '<a  href=""  class="btn btn-warning"></a>'
                                html += '</div>' 
                                html += '<div class="col-md-1 col-sm-12">'
									html += '<a  onclick="" class="btn btn-danger"></a>'
                                html += '</div>' 
							html += '</div>';							

					});					

				}

				if(html == '') html = '<div class="fila tabla filaContenido">No se encontraron registros..</div>'

				$("#resultado").html(html);

			}

	  });

}

$("#libro").click(function(){ reportePDF() });
$("#General").click(function(){ reporteGeneralPDF() });





function reporteGeneralGastoPDF()
{	

	var desde = $("#desde").val();
    var hasta = $("#hasta").val();
    var cliente = $("#cliente").val();
    window.open("../contabilidad/reporte_gastos_general.php?desde="+desde+"&hasta="+hasta);
 
}


function reporteDetalladoGastosPDF()
{	

	var desde = $("#desde").val();
    var hasta = $("#hasta").val();
    var cliente = $("#cliente").val();
    window.open("../contabilidad/reporte_gastos.php?desde="+desde+"&hasta="+hasta);
 
}


function generarPedido()
{	

    window.open("../productos/pedido.php"); 
}

function reporteCajaPDF()
{	

	var desde = $("#desde").val();
    var hasta = $("#hasta").val();
    var cliente = $("#cliente").val();
    window.open("../contabilidad/reporte_caja.php?desde="+desde+"&hasta="+hasta+"&cliente="+cliente);
 
}