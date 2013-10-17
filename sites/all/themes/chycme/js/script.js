$(document).ready(function(){

	$("#slider").easySlider({
		auto: true, 
		continuous: true
	});

	//Carrousel de Produtos - Home
	$("html .content-wrap .representadas-home .item-list").easySlider({
		auto: false, 
		continuous: false,
		prevId: 'prevBtnProd',
		nextId: 'nextBtnProd'
	});
	
	$("body.page-user .content-wrap #center #user-register input.form-text").each(function(index, value){
		$(this).val($(this).parent().find("label").text().split(": *")[0]);
	});

	$('.activator').click(function(){
		product_id = $(this).attr('href');
		product_id = product_id.replace(/\//g,"-"); //regex to replace / to -
		$('#overlay').fadeIn('fast',function(){
			$('.product-box-'+product_id).show();
			$('.product-box-'+product_id).animate({'top':'160px'},500);
		});
		return false;
	});

	$('.boxclose').click(function(){
		parent_box = $(this).parent('.product-box');
		$(parent_box).animate({'top':'-200px'},500,function(){
			$(parent_box).fadeOut('fast');
			$('#overlay').fadeOut('fast');
		});
	});
  
});