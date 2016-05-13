/*function mostrarAgregar(){
	var formulario = document.getElementById('fm-agregar');
	formulario.style.display = block;
}*/

/*
$(function(){
	$('.b-ag').click(function(){
		$('.form-ag').slideToggle('slow');
		}
		);
		
}
	);
*/

$(document).ready(function(){
  
    $(".b-ag").click(function(){
      
        $(".b-ag").removeClass("form-ag");
        $(this).addClass("form-ag2");
      
    });
  
});