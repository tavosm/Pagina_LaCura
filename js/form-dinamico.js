function mostrarAgregar(){
	var form1 = document.getElementById("fm-agregar");
	form1.style.display = "block";
	var form2 = document.getElementById("fm-modificar");
	form2.style.display = "none";
	var form3 = document.getElementById("fm-eliminar");
	form3.style.display = "none";
}

function mostrarModificar(){
	var form1 = document.getElementById("fm-agregar");
	form1.style.display = "none";
	var form2 = document.getElementById("fm-modificar");
	form2.style.display = "block";
	var form3 = document.getElementById("fm-eliminar");
	form3.style.display = "none";
}

function mostrarEliminar(){
	var form1 = document.getElementById("fm-agregar");
	form1.style.display = "none";
	var form2 = document.getElementById("fm-modificar");
	form2.style.display = "none";
	var form3 = document.getElementById("fm-eliminar");
	form3.style.display = "block";
}

function mostrarVision(){
	var txt = document.getElementById("txt-vision");
	txt.style.display = "block";
}

function mostrarValores(){
	var txt = document.getElementById("txt-valores");
	txt.style.display = "block";
}

function mostrarMision(){
	var txt = document.getElementById("txt-mision");
	txt.style.display = "block";
}

/*
function verificarAgregar(){
	var categoria = $('#categoria').val();
	console.log('categoria');
}
*/