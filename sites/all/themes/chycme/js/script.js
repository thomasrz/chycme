$(document).ready(function(){

  /*
		Script: Acertos de layout
		Dev: Jefferson
		Data: 07/11/2013
		Obs: Jefferson fez algumas mudanças na estrutura html, para conseguir o efeito desejado.
	*/
  $("html body.page-cart #cart-form-products table tbody tr:last-child").hide();
  $("html body.page-cart #content-content #cart-form-products #edit-items-update")
    .wrap("<div class='wrap-edit-items-update'></div>");

  
  /*
		Script: Acertos de layout - Página para finalizacao de compra
		Dev: Jefferson
		Data: 16/11/2013
		Obs: Jefferson fez algumas mudanças na estrutura html, para conseguir o efeito desejado.
	*/
  /* adicionar endereco */
  $(".address-pane-table table tr").each(function (index, value){
    $(this).replaceWith("<div class='row'>" + $(this).html() + "</div>");
  });
  $(".address-pane-table table").replaceWith("<div class='table'>" + $(".address-pane-table table").html() + "</div>");
  
  /* WRAP1 */
  $("<div class='wrap1'></div>").insertBefore("body.page-cart #uc-cart-checkout-form #payment-pane");
  $("body.page-cart #uc-cart-checkout-form #payment-pane").prependTo($(".wrap1"));
  $("<div class='wrapBtn'>+</div>").prependTo($(".wrap1"));
  
  /* WRAP2 */
  $("<div class='wrap2'></div>").insertAfter("body.page-cart #uc-cart-checkout-form .wrap1");
  $("#cheque_info-pane, " +
    "body.page-cart #uc-cart-checkout-form #edit-panes-payment-payment-method-check-wrapper").prependTo($(".wrap2"));
    $("<div class='wrapBtn'>+</div>").prependTo($(".wrap2"));
  //Mascara de telefone
  $("body.page-cart #uc-cart-checkout-form" +
    "#edit-panes-cheque-info-cheque-info-telefone").mask("(99)9?9999-9999");
  	
  
  /* WRAP3 */
  $("<div class='wrap3'></div>").insertAfter("body.page-cart #uc-cart-checkout-form .wrap2");
  $("body.page-cart #uc-cart-checkout-form #edit-panes-payment-payment-method-boleto-wrapper").prependTo($(".wrap3"));
  $("<div class='wrapBtn'>+</div>").prependTo($(".wrap3"));
  
  /* WRAP-GENERAL */
  $("body.page-cart #uc-cart-checkout-form .wrap1," +
    "body.page-cart #uc-cart-checkout-form .wrap2," +
    "body.page-cart #uc-cart-checkout-form .wrap3," +
    "body.page-cart #uc-cart-checkout-form #comments-pane," +
    "body.page-cart #uc-cart-checkout-form #checkout-form-bottom").wrapAll("<div class='wrap-general'></div>");
    
  $("body.page-cart #uc-cart-checkout-form .wrap-general #checkout-form-bottom #edit-continue.form-submit")
    .val("Finalizar pedido!");
  
  $("body.page-cart #uc-cart-checkout-form #comments-pane textarea")
    .val($("body.page-cart #uc-cart-checkout-form #comments-pane .description").text());
    
  /*
		Script: Seleção de forma de pagamento - Página para finalizacao de compra
		Dev: Jefferson
		Data: 17/11/2013
		Obs: Ao clicar no botão "+" ao lado de cado método de pagamento o mesmo é selecionado
	*/
  $("body.page-cart #uc-cart-checkout-form .wrap1 .wrapBtn, " + 
    "body.page-cart #uc-cart-checkout-form .wrap2 .wrapBtn, " +
    "body.page-cart #uc-cart-checkout-form .wrap3 .wrapBtn").click(function(){
    //Reset
    $("body.page-cart #uc-cart-checkout-form .form-radios input").removeAttr("checked");
    $(this).parent().find("input").attr("checked", "checked");
  });
  
	/*
		Script: Slide de banners
		Dev: Thomaz/Jefferson
		Data: 17/10/2013
		Obs: Jefferson fez uma atualização, script usando a biblioteca easySlider.
	*/
	$("#slider").easySlider({
		auto: true, 
		continuous: true,
    pause: 8000
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
	
	$("body.page-user #user-register #edit-profile-clientes-telefone, " +
    "body.page-user #user-register #edit-profile-ref-pessoais-telefone1, " + 
    "body.page-user #user-register #edit-profile-ref-pessoais-telefone2, " + 
    "body.page-user #user-register #edit-profile-ref-pessoais-telefone3").mask("(99)9999-9999");
	$("body.page-user #user-register #edit-profile-clientes-celular").mask("(99)9?9999-9999");
  $("body.page-user #user-register #edit-profile-cliente-cep").mask("99.999-999");
	
	placeholdDrupalInput($("#user-register input.form-text"));
	placeholdDrupalInput($("#user-login input.form-text"));
	placeholdDrupalInput($("#user-pass input.form-text"));
    placeholdDrupalInput($("#edit-submitted-email"));
	placeholdDrupalInput($(".page-title-class-contato #edit-submitted-nome"));
	placeholdDrupalInput($(".page-title-class-contato #edit-submitted-email"));
	placeholdDrupalInput($(".page-title-class-contato #edit-submitted-cidade"));
	$("body.page-title-class-contato #edit-submitted-telefone").mask("(99)9?9999-9999");
	placeholdDrupalInput($(".page-title-class-contato #edit-submitted-telefone"));
	
	/* 
	  Script:
	  Dev: Thomaz/Jefferson
	  Data: 17/11/2013
	*/
	placeholdDrupalInput($("#edit-submitted-seu-email"));
	
	/*
		Script:
		Dev: Thomaz/Jefferson
		Data: 17/10/2013
		Obs:
	 */
	$('.activator').click(function(){
		box = $(this).parent().parent().parent();
		product_id = $(this).attr('href');
		product_id = product_id.replace('index.php', '');
		product_id = product_id.replace('?q=', '');
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
  
  /*
		Script:
		Dev: Thomaz
		Data: 17/10/2013
		Obs:
	*/
  $('#edit-panes-payment-payment-method-transferencia-wrapper').click(function(){
    //return false;
    //$('#cheque_info-pane').hide();
  });
  
	$('#edit-panes-payment-payment-method-boleto-wrapper').click(function(){
    //return false;
    //$('#cheque_info-pane').hide();
	});
  $('#edit-panes-payment-payment-method-check-wrapper').click(function(){
    //return false;
    //$('#cheque_info-pane').show();
	});
	
	$("input[name='profile_clientes_tipo']").click(function() {
    var value = "";
    if (this.value == 'Pessoa Jurídica') {
      $('#edit-profile-clientes-cnpj-wrapper').show();
      $('#edit-profile-clientes-cpf-wrapper').hide();
      value = $('#edit-profile-clientes-data-wrapper label').html();
      value = value.replace('Data Nasc.', 'Fundação'); 
      $("#edit-profile-clientes-data-wrapper label").html(value);
    }
    else {
      $('#edit-profile-clientes-cnpj-wrapper').hide();
      $('#edit-profile-clientes-cpf-wrapper').show();
      value = $('#edit-profile-clientes-data-wrapper label').html();
      value = value.replace('Fundação', 'Data Nasc.'); 
      $("#edit-profile-clientes-data-wrapper label").html(value);
    }
	});
  
  $('#uc-cart-checkout-review-form').ready(function() {
    if($('#uc-cart-checkout-review-form').length) {
      $('#edit-submit').click();
    }
  });

  
  /*
		Script: Spinner
		Dev: Jefferson
		Data: 12/11/2013
		Obs: Aumentar e diminuir valor no input
	*/
  $('body span.less-itens, body span.less-item').click(function(){
    var selectorEle = $(this).parent().find(".form-text");
    var number = parseInt(selectorEle.val(),10);
    selectorEle.val(number <= 0 ? 0 : (number-1));
  });
  
  $('body span.more-itens, body span.more-item').click(function(){
    var selectorEle = $(this).parent().find(".form-text");
    var number = parseInt(selectorEle.val(),10);
    selectorEle.val(number+1);
  });
  
});