// content Loaded with JS
// document.addEventListener('DOMContentLoaded', function(){ 
// 	document.querySelector('#crear-admin').addEventListener('submit', function(e) {
// 		e.preventDefault();
// 		console.log("Click");
// 	})});

// Content Loaded with Jquery

$(document).ready(function() {
	$('#crear-admin').on('submit', function(e) {
		e.preventDefault();

		var datos = $(this).serializeArray();

		$.ajax({
			type: $(this).attr('method'),
			data: datos,
			url: $(this).attr('action'),
			dataType: 'json',
			success: function(data) {
				var resultado = data;
				if (resultado.respuesta == 'exito') {
					Swal.fire(
					    'Good job!',
					    'El administrador se creo correctamente',
					    'success'
					)
				} else {
					Swal.fire({
				  		type: 'error',
				  		title: 'Oops...',
				  		text: 'Something went wrong!',
				  		footer: '<a href>Why do I have this issue?</a>'
					})
				}
			}



		});
	})
	$('#login-admin').on('submit', function(e) {
		e.preventDefault();

		var datos = $(this).serializeArray();

		$.ajax({
			type: $(this).attr('method'),
			data: datos,
			url: $(this).attr('action'),
			dataType: 'json',
			success: function(data) {
				console.log(data);
				var resultado = data;
				if (resultado.respuesta == 'exitoso') {
					Swal.fire(
					    'Login Correcto!',
					    'bienvenid@  ' + resultado.usuario + '!!',
					    'success'
					)
					setTimeout(function() {
						window.location.href = 'admin-area.php';
					}, 2000);
				} else {
					Swal.fire(
					    'Error!',
					    'usuario o password incorrecto',
					    'error'
					)
				}
			}



		});
	})
})
























