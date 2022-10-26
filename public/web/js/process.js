$(document).on('submit', '.bform', function() {
    frm = $(this);
    btn = frm.find(".save");
    method = frm.attr("method");
    btn.attr("disabled", "disabled");
    $.ajax({
        url: frm.attr('action'),
        type: method,
        data: frm.serialize(),
        data: new FormData(this),
                contentType: false,
        cache: false,
        processData: false,
    })
            .done(function(data)
            {
                console.log(data);
                btn.removeAttr("disabled");
                frm.find('.response').html(data).hide().slideDown();
            })
            .error(function(data, msg)
            {
                btn.removeAttr("disabled");
                frm.find('.response').html("Ha ocurrido un error interno");
            });
    return false;
});
/*
$(document).on('submit', '.flogin', function() {
    frm = $(this);
    btn = frm.find(".save");
    method = frm.attr("method");
    btn.attr("disabled", "disabled");
    //alert("llego");
    $.ajax({
        url: frm.attr('action'),
        type: method,
        data: frm.serialize(),
        crossDomain :  true ,  // habilitar this 
        data: new FormData(this),
                contentType: false,
        cache: false,
        processData: false,
    })
            .done(function(data)
            {
            	try
            	{
            		var newdata=JSON.parse(data);
	            	var cli_id=newdata.cli_id;
	            	var cli_username=newdata.cli_username;
	            	
	            	//alert(newdata.cli_username+' id:'+cli_id);
	 		$.post('http://exportando-peru.com/test2/ajax',
                        {cli_id:cli_id , cli_username: cli_username},
                        function(response) {
                           
                        });
                        
                        $.post('http://imagenes-eventos.com/test2/ajax',
                        {cli_id:cli_id , cli_username: cli_username},
                        function(response) {
                           
                        });
	 		
	 		$.post('http://gestiona-peru.com/test2/ajax',
                        {cli_id:cli_id , cli_username: cli_username},
                        function(response) {
                         frm.find('.response').html(response).hide().slideDown();
                         setTimeout(function(){ parent.location.reload() }, '2000');
                        });
                        
	            	
            	}
            	catch(e){
            	frm.find('.response').html(data).hide().slideDown();
            	}
                btn.removeAttr("disabled");
                
            })
            .error(function(data, msg)
            {
                btn.removeAttr("disabled");
                frm.find('.response').html(msg);
            });
    return false;
});

*/


$(document).on('submit', '.flogin', function() {
    frm = $(this);
    btn = frm.find(".save");
    method = frm.attr("method");
    btn.attr("disabled", "disabled");
    //alert("llego");
    $.ajax({
        url: frm.attr('action'),
        type: method,
        data: frm.serialize(),
        crossDomain :  true ,  // habilitar this 
        data: new FormData(this),
                contentType: false,
        cache: false,
        processData: false,
    })
            .done(function(data)
            {
            	try
            	{
            		var newdata=JSON.parse(data);
	            	var cli_id=newdata.cli_id;
	            	var cli_username=newdata.cli_username;
	            	var cli_name=newdata.cli_nombres;
	            	var cli_lastname=newdata.cli_apellidos;
	            	
	            	//alert(newdata.cli_username+' id:'+cli_id);
	 		$.post('http://imagenes-eventos.com/ajax',
                        {cli_id:cli_id , cli_username: cli_username,cli_name: cli_name,cli_lastname:cli_lastname},
                        function(response) {
                           frm.find('.response').html(response).hide().slideDown();
                           setTimeout(function(){ parent.location.reload() }, '2000');
                        });   	
            	}
            	catch(e){
            	frm.find('.response').html(data).hide().slideDown();
            	}
                btn.removeAttr("disabled");
                
            })
            .error(function(data, msg)
            {
                btn.removeAttr("disabled");
                frm.find('.response').html(msg);
            });
    return false;
});


$(document).on('submit', '.feditar', function() {
    frm = $(this);
    btn = frm.find(".save");
    method = frm.attr("method");
    btn.attr("disabled", "disabled");
    //alert("llego");
    $.ajax({
        url: frm.attr('action'),
        type: method,
        data: frm.serialize(),
        crossDomain :  true ,  // habilitar this 
        data: new FormData(this),
                contentType: false,
        cache: false,
        processData: false,
    })
            .done(function(data)
            {
            	try
            	{
            		var newdata=JSON.parse(data);
	            	var cli_id=newdata.cli_id;
	            	var cli_username=newdata.cli_username;
	            	var cli_name=newdata.cli_nombres;
	            	var cli_lastname=newdata.cli_apellidos;
	            	
	            	//alert(newdata.cli_username+' id:'+cli_id);
	 		$.post('http://imagenes-eventos.com/edicion',
                        {cli_id:cli_id , cli_username: cli_username,cli_name: cli_name,cli_lastname:cli_lastname},
                        function(response) {
                           frm.find('.response').html(response).hide().slideDown();
                           setTimeout(function(){ parent.location.reload() }, '2000');
                        });   	
            	}
            	catch(e){
            	frm.find('.response').html(data).hide().slideDown();
            	}
                btn.removeAttr("disabled");
                
            })
            .error(function(data, msg)
            {
                btn.removeAttr("disabled");
                frm.find('.response').html(msg);
            });
    return false;
});

/* -- Reloj -- */
function digiClock ( )  
    {  
    var crTime = new Date ( );  
    var crHrs = crTime.getHours ( );  
    var crMns = crTime.getMinutes ( );  
    var crScs = crTime.getSeconds ( );  
    crMns = ( crMns < 10 ? "0" : "" ) + crMns;  
    crScs = ( crScs < 10 ? "0" : "" ) + crScs;  
    var timeOfDay = ( crHrs < 12 ) ? "AM" : "PM";  
    crHrs = ( crHrs > 12 ) ? crHrs - 12 : crHrs;  
    crHrs = ( crHrs == 0 ) ? 12 : crHrs;  
    var crTimeString = crHrs + ":" + crMns + ":" + crScs + " " + timeOfDay;  
  
    $("#liveclock").html(crTimeString);  
  
 }
  
$(document).ready(function()  
{  
   setInterval('digiClock()', 1000);  
  
}); 

$("#buscar").on("click", function() {
    var buscar = $("#buscador").val();
    var url_buscar = buscar.replace(/\s/g, "-");
    location.href = base_url + "buscar/" + url_buscar;
    //alert(buscar);
});

$("#buscador").on('keypress', function(e) {
    if (e.which == 13) {
        $("#buscar").trigger("click");
    }
});

$(".publicidad").on('click',function(e){

	var id=$(this).attr('data-id');
	url = base_url + 'promocion/click';
	$.post(url,
                        {id: id},
                function(response) {
                    
                });
	//alert(id);
});
