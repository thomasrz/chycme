$(document).ready(function(){
  function chycme_get_check_info() {
    $.ajax({
        url : 'admin/get_cheque_info',
        data : {
            "order_id": $('.with-tabs').html().replace('Pedido ', '')
        },    
        async: true,
        cache: false,
        timeout: 30000,
        success : function (data) {
            data = Drupal.parseJson(data);	
			$("#order-pane-payment").append(data.data);
            return true;
        },
        type : "POST",
        error : function(){
          //console.log('Fail:' + data.status);
          return true;
            //popup_message(Drupal.t("An error occured."));
        }
    });
	
    

 }
 
 if($('#order-pane-payment').length > 0 && $('#order-pane-payment').html().indexOf("Cheque") >= 0) {
   chycme_get_check_info();
 }
});