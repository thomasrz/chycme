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
	$(".representadas-home .item-list").easySlider({
		auto: false, 
		continuous: false,
		prevId: 'prevBtnProd',
		nextId: 'nextBtnProd'
	});
	
	
	/*
		Script: Value dos inputs e Limpar campos após o clique
		Dev: Jefferson
		Data: 17/10/2013
		Obs: Inserir os labels como valor inicial nos inputs.
		Os inputs terá um valor inicial, que irá ser o label do mesmo, após clicar esse valor deve sumir deixando o campo livre.
	*/
	function placeholdDrupalInput (objetoID) {
		objetoID
			.each(function (index, value) {
				$(this).val($(this).parent().find("label").text().split(":")[0]);
			})
			.focus(function (){
				if($(this).val() == $(this).parent().find('label').text().split(":")[0])
				{
					$(this).val('');
				}
			})
			.blur(function (){
				if($(this).val() === '')
				{	
					$(this).val($(this).parent().find('label').text().split(":")[0]);
				}
			});
	}
	
	$("body.page-user #user-register #edit-profile-clientes-telefone").mask("(99)9999-9999");
	$("body.page-user #user-register #edit-profile-clientes-celular").mask("(99)9?9999-9999");
	
	placeholdDrupalInput($("#user-register input.form-text"));
	placeholdDrupalInput($("#user-login input.form-text"));
	placeholdDrupalInput($("#user-pass input.form-text"));

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