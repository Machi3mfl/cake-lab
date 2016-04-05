/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function activar_campo_inap(selecc){
     if(selecc == 1){
        $(".selector_inap").each(function (){
           $(this).show();
           $(this).attr({'disabled':true});
        });
    }else{
        $(".selector_inap").each(function(){
            $(this).hide();
        });
    }
    if(selecc == 2){
        $(".selector_provincial").each(function (){
           $(this).show();
           $(this).attr({'disabled':true});
        });
    }else{
        $(".selector_provincial").each(function(){
            $(this).hide();
        });
    }
}

function activar_campo(selecc){
    if(selecc == 1){
        $(".selector_nacional").each(function (){
           $(this).show();
           $(this).attr({'disabled':true});
        });
    }else{
        $(".selector_nacional").each(function(){
            $(this).hide();
        });        
    }
    if(selecc == 2){
        $(".selector_provincial").each(function (){
           $(this).show();
           $(this).attr({'disabled':true});
        });
    }else{
        $(".selector_provincial").each(function(){
            $(this).hide();
        });
    }

}

function activar_municipio(selecc){
     if(selecc != 0){
        $(".municipio").each(function (){
           $(this).show();	
        });
    }else{
        $(".municipio").each(function(){
            $(this).hide();
            // $(this).attr({'disabled':true});
        });
    }
    
}

function activar_region(selecc){
    if(selecc == 1){
        $(".region").each(function (){
           $(this).show();	
        });
    }else{
        $(".region").each(function(){
            $(this).hide();
            // $(this).attr({'disabled':true});
        });
    }

}

function check_dependencia(valor) {
	if(valor == 33) {
		$(".otra_dependencia").show();
		$(".td_organismo").hide();
		$(".otro_organismo").show();
	}
	else {
		$(".otra_dependencia").hide();
		$(".td_organismo").show();
		$(".otro_organismo").hide();
	}
}

function check_curso(valor) {
	if(valor == 1 ) {
		$(".experiencia").show();

	}
	else {
		$(".experiencia").hide();
	}
}



function check_organismo(valor) {
	if(valor == 200) {
		$(".otro_organismo").show();
	}
	else {
		$(".otro_organismo").hide();
	}
}

function check_estudio(valor) {
	if(valor == 1) {
		$(".que_estudia").hide();
	}
	else {
		$(".que_estudia").show();
	}
}

function checkAll() {
	activar_campo_inap($("#DatosInscripcionCargo").val());
	activar_campo($("#DatosInscripcionInap").val());
	activar_region($("#DatosInscripcionPais").val());
	check_dependencia($("#DatosInscripcionDependencia").val());
	check_organismo($("#DatosInscripcionOrganismo").val());
	check_estudio($("#DatosInscripcionEstudiante").val());
}

function ebuscando(){
  if(typeof buscando != "undefined"){
    buscando.hide();
  }
  buscando = new Boxy("<table><tr><td align='center'><img src='/formularios/img/cargando.gif' /></td></tr><tr><td align='center' style='font-family:verdana;font-weight:bold'>Cargando...</td></tr></table>",{title: '',modal: false, unloadOnHide: true,dragable:true,closeText: "cerrar",fixed:false,show:true});
}

function fbuscando(){
  buscando.hide();
  buscando.unload();
}