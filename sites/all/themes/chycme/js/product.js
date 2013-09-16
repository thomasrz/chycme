$(document).ready(function(){ 
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
