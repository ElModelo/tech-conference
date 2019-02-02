(function() {
	"use strict";

	var regalo = document.getElementById('regalo');
	document.addEventListener('DOMContentLoaded', function(){

		if (window.location.href == 'http://localhost/tech-conference/index.php') {
			var map = L.map('mapa').setView([18.467006, -1149.958534], 16);

			L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
			    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
			}).addTo(map);

			L.marker([18.467006, -1149.958534]).addTo(map)
			    .bindPopup('Tech-Conference.<br> Boletos disponibles.')
			    .openPopup();
			
		}
		if (window.location.href == 'http://localhost/tech-conference/registro.php') {
		//Campos datos Usuarios
		var nombre = document.getElementById('nombre');
		var apellido = document.getElementById('apellido');
		var email = document.getElementById('email');


		// Campos pases

		var pase_dia = document.getElementById('pase_dia');
		var pase_dosdias = document.getElementById('pase_dosdias');
		var pase_completo = document.getElementById('pase_completo');

		// Botones y divs

		var calcular = document.getElementById('calcular');
		var errorDiv = document.getElementById('error');
		var botonRegistro = document.getElementById('button_registro');
		var lista_productos = document.getElementById('lista_productos');
		var sumaTotal = document.getElementById('suma_total');

		//Extras

		var camisa = document.getElementById('camisa_evento');
		var etiquetas = document.getElementById('etiquetas');

		botonRegistro.disabled = true;

		}
		if (document.getElementById('calcular')){

			calcular.addEventListener('click', calcularMontos);

			pase_dia.addEventListener('blur', mostrarDias);
			pase_dosdias.addEventListener('blur', mostrarDias);
			pase_completo.addEventListener('blur', mostrarDias);

			nombre.addEventListener('blur', validarCampos);
			apellido.addEventListener('blur', validarCampos);
			email.addEventListener('blur', validarCampos);
			email.addEventListener('blur', validarMail);

			function validarCampos() {
				if (this.value== '') {
					errorDiv.style.display = 'block';
					errorDiv.innerHTML= "Este campo es obligatorio";
					this.style.border = '1px solid red';
					errorDiv.style.border = '1px solid red';
				} else {
					errorDiv.style.display = 'none';
					this.style.border = '1px solid #cccccc';
				}

			}

			function validarMail() {
				if(this.value.indexOf("@") > -1){
					errorDiv.style.display = 'none';
					this.style.border = '1px solid #cccccc';
				} else {
					errorDiv.style.display = 'block';
					errorDiv.innerHTML= "El email debe ser introducido correctamente con '@' ";
					this.style.border = '1px solid red';
					errorDiv.style.border = '1px solid red';
				}
			}

			function calcularMontos(event) {
				event.preventDefault();
				if(regalo.value === '') {
					alert("Debes de escoger un regalo");
					regalo.focus();
				} else {
					var boletosDia = parseInt(pase_dia.value, 10) || 0,
						boletos2Dias = parseInt(pase_dosdias.value, 10) || 0,
						boletosCompleto = parseInt(pase_completo.value, 10) || 0,
						cantidadCamisas = parseInt(camisa.value, 10) || 0,
						cantidadEtiquetas = parseInt(etiquetas.value, 10) || 0;

					var totalPagar = (boletosDia * 30) + (boletos2Dias * 45) + 
						(boletosCompleto * 50) + 
						((cantidadCamisas * 10) * 0.93)  + 
						(cantidadEtiquetas * 2);

					var listadoProductos = [];

					if (boletosDia >= 1) {
						listadoProductos.push(boletosDia + ' Pase por dia');
					}
					if (boletos2Dias >= 1) {
						listadoProductos.push(boletos2Dias + ' Pases por 2 dias');
					}
					if (boletosCompleto >= 1) {
						listadoProductos.push(boletosCompleto + ' Pases completo');
					}
					if (cantidadCamisas >= 1) {
						listadoProductos.push(cantidadCamisas + ' Camisas');
					}
					if (cantidadEtiquetas >= 1) {
						listadoProductos.push(cantidadEtiquetas + ' Etiquetas');
					}
					
					lista_productos.style.display = 'block';
					lista_productos.innerHTML = '';

					for (var i = 0; i < listadoProductos.length ; i++) {
						lista_productos.innerHTML += listadoProductos[i] + '<br />';

						}

					sumaTotal.innerHTML = '$ ' + totalPagar.toFixed(2);
					botonRegistro.disabled = false;
					document.getElementById('total_pedido').value = totalPagar;

		  		}

	 		}

	 		function mostrarDias(){

		 		var	boletosDia = parseInt(pase_dia.value, 10) || 0,
					boletos2Dias = parseInt(pase_dosdias.value, 10) || 0,
					boletosCompleto = parseInt(pase_completo.value, 10) || 0;

				var diasElegidos = [];

				if(boletosDia > 0) {
					diasElegidos.push('viernes');
				}
				if(boletos2Dias > 0) {
					diasElegidos.push('viernes', 'sabado');
				}
				if(boletosCompleto > 0) {
					diasElegidos.push('viernes','sabado','domingo');
				}
				for (var i = 0; i < diasElegidos.length; i++) {
					document.getElementById(diasElegidos[i]).style.display = 'block';
				}




	 		}

 		}
 		







	});// DOM Content Loaded
})();



$(function() {

	


	// Lettering

	$('.nombre-sitio').lettering();


	//agregar class a menu
	
	$('body.conferencia .navegacion-principal a:contains("Conference")').addClass('activo');
	$('body.invitados .navegacion-principal a:contains("Invitados")').addClass('activo');
	$('body.calendario .navegacion-principal a:contains("Calendar")').addClass('activo');


	// Menu fijo

	var windowHeight = $(window).height();
	var barraAltura = $('.barra').innerHeight();
	
	$(window).scroll(function(){
		var scroll = $(window).scrollTop();
		if (scroll > windowHeight) {
			$('.barra').addClass('fixed');
			$('body').css({'margin-top': barraAltura + 'px'});

		} else {
			$('.barra').removeClass('fixed');
			$('body').css({'margin-top': '0px'});
		}
	});

	//Menu responsivo

	$('.menu-movil').on('click', function(){

		$('.navegacion-principal').slideToggle();
	});








	// Programa de conferencias
	$('.programa-evento .info-curso:first').show();
	$('.menu-programa a:first').addClass('activo');

	$('.menu-programa a').on('click', function(){
		$('.menu-programa a').removeClass('activo');
		$(this).addClass('activo');
		$('.ocultar').hide();
		var enlace = $(this).attr('href');
		$(enlace).fadeIn(1000);
		return false;
	});

	//Animaciones para los numeros
	var resumenLista = jQuery('.resumen-evento');
	if(resumenLista.length > 0) {
		$('.resumen-evento').waypoint(function(){
			$('.resumen-evento li:nth-child(1) p').animateNumber({number: 6}, 1200);
			$('.resumen-evento li:nth-child(2) p').animateNumber({number: 15}, 1200);
			$('.resumen-evento li:nth-child(3) p').animateNumber({number: 3}, 1500);
			$('.resumen-evento li:nth-child(4) p').animateNumber({number: 9}, 1500);
		},{
			offset: '30%'
		});
	}

	
	if (window.location.href == 'http://localhost/tech-conference/index.php'){
	//Cuenta regresiva

	$('.cuenta-regresiva').countdown('2019/12/10 9:00:00', function(event){

		$('#dias').html(event.strftime('%D'));
		$('#horas').html(event.strftime('%H'));
		$('#minutos').html(event.strftime('%M'));
		$('#segundos').html(event.strftime('%S'));
	});	
	// Colorbox
	$('.invitado-info').colorbox({inline:true, width: "50%"});
	$('.boton_newsletter').colorbox({inline:true, width: "50%"});
	}



});


























