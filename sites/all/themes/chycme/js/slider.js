$(document).ready(function(){
  $("#slider").easySlider({
    auto: true, 
    continuous: true,
	nextId: "slider1next",
	prevId: "slider1prev"
  }); 
  $(".view-id-representadas .view-content .item-list").easySlider({
    auto: false, 
    continuous: false
  });
  
});