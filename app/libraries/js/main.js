/* =================================
------------------------------------
	EndGam - Gaming Magazine Template
	Version: 1.0
 ------------------------------------
 ====================================*/


'use strict';


$(window).on('load', function() {
	/*------------------
		Preloder
	--------------------*/
	$(".loader").fadeOut();
	$("#preloder").delay(400).fadeOut("slow");

});

(function($) {
	/*------------------
		Navigation
	--------------------*/
	$('.primary-menu').slicknav({
		appendTo:'.header-warp',
		closedSymbol: '<i class="fa fa-angle-down"></i>',
		openedSymbol: '<i class="fa fa-angle-up"></i>'
	});


	/*------------------
		Background Set
	--------------------*/
	$('.set-bg').each(function() {
		var bg = $(this).data('setbg');
		$(this).css('background-image', 'url(' + bg + ')');
	});



	/*------------------
		Hero Slider
	--------------------*/
	$('.hero-slider').owlCarousel({
		loop: true,
		nav: true,
		dots: true,
		navText: ['', '<img src="img/icons/solid-right-arrow.png">'],
		mouseDrag: false,
		animateOut: 'fadeOut',
		animateIn: 'fadeIn',
		items: 1,
		//autoplay: true,
		autoplayTimeout: 10000,
	});

	var dot = $('.hero-slider .owl-dot');
	dot.each(function() {
		var index = $(this).index() + 1;
		if(index < 10){
			$(this).html('0').append(index + '.');
		}else{
			$(this).html(index + '.');
		}
	});



	/*------------------
		Video Popup
	--------------------*/
	$('.video-popup').magnificPopup({
  		type: 'iframe'
	});

	$('#stickySidebar').stickySidebar({
	    topSpacing: 60,
	    bottomSpacing: 60
	});

	// $('#tabela').DataTable();

	// /*------------------------
	// 	Modal body changes
	// ------------------------*/
	// $('.modal-body').append('<p>Tipo: Manutenção</p>\n' +
	// 						'<p>Número de pedido: 2729</p>\n' +
	// 						'<p>Referência da máquina: 3578374</p>\n' +
	// 						'<p>Cliente: Prio</p>\n' +
	// 						'<p>Contacto: 204919191</p>\n' +
	// 						'<p>Estado da máquina: Funcional</p>\n' +
	// 						'<p>Módulos: 2</p>\n' +
	// 						'<p>\n' + 
	// 							'Localização:<br />\n' +
	// 							'Distrito: Aveiro <br />\n' +
	// 							'Concelho: Estarreja <br />\n' +
	// 							'Freguesia: Avanca <br />\n' +
	// 							'Código-Postal: 2021-020 <br />\n' +
	// 							'Rua: S. Lourenço\n' +
	// 						'</p>\n' +
	// 						'<p>Data de última manutenção: 10/06/2014</p>\n' +
	// 						'<p>Data de envio: 10/10/2012</p>\n' +
	// 						'<p>\n' +
	// 							'Motivo:\n' +
	// 							'<input type="text">\n' +
	// 						'</p>');

	// if ($('#continue').click(function() {
	// 	$('.modal-body').empty();
	// 	$('.modal-body').append('<p>Esta ação é irreversível.</p>\n' +
	// 							'<p>Tem a certeza que quer continuar?</p>');
		
	// 	if ($('#continue').click(function() {
	// 		$('.modal-body').empty();
	// 		$('.modal-body').append('<p>O pedido de manutenção foi cancelado com sucesso.</p>\n' +
	// 								'<p><button type="button" class="glyphicon glyphicon-ok" aria-hidden="true" style="text-align: center"></button></p>');
	// 		$('.modal-footer').hide();
	// 	}));

	// 	$('.glyphicon glyphicon-ok').click(function() {
	// 		// $('#modal-1').css('display','none');
	// 		alert('HI');
	// 	});
	// }));



})(jQuery);
