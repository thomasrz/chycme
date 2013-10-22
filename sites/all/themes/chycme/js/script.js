$(document).ready(function(){

	/*
		Script: Slide de banners
		Dev: Thomaz/Jefferson
		Data: 17/10/2013
		Obs: Jefferson fez uma atualização, script usando a biblioteca easySlider.
	*/
	$("#slider").easySlider({
		auto: true, 
		continuous: true
	});

	
	/*
		Script: Carrousel de Produtos - Home
		Dev: Thomaz/Jefferson
		Data: 17/10/2013
		Obs: Jefferson fez uma atualização, script usando a biblioteca easySlider.
	*/
	$("html .content-wrap .representadas-home .item-list").easySlider({
		auto: false, 
		continuous: false,
		prevId: 'prevBtnProd',
		nextId: 'nextBtnProd'
	});
	
	
	/*
		Script: Value dos inputs
		Dev: Jefferson
		Data: 17/10/2013
		Obs: Inserir os labels como valor inicial nos inputs.
	*/
	$("#user-register input.form-text, #user-login input.form-text").each(function(index, value){
		$(this).val($(this).parent().find("label").text().split(": *")[0]);
	});
	
	
	/*
		Script: Limpar campos após o clique
		Dev: Thomaz/Jefferson
		Data: 17/10/2013
		Obs: Os inputs terá um valor inicial, que irá ser o label do mesmo, após clicar esse valor deve sumir deixando o campo livre.
	*/
	$("#user-register input.form-text, #user-login input.form-text")
	.focus(function (){
		$(this).val("");
	});

	
	/*
		Script:
		Dev: Thomaz/Jefferson
		Data: 17/10/2013
		Obs:
	 */
	$('.activator').click(function(){
		box = $(this).parent().parent().parent();
		product_id = $(this).attr('href');
		product_id = product_id.replace(/\//g,"-"); //regex to replace / to -
		$('#overlay').fadeIn('fast',function(){
			box.find('.product-box-'+product_id).show().animate({'top':'20px'},500);
		});
		return false;
	});

	
	/*
		Script:
		Dev: Thomaz/Jefferson
		Data: 17/10/2013
		Obs:
	*/
	$('.boxclose').click(function(){
		parent_box = $(this).parent('.product-box');
		$(parent_box).animate({'top':'-500px'},500,function(){
			$(parent_box).fadeOut('fast');
			$('#overlay').fadeOut('fast');
		});
	});
  
});