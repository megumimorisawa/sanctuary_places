$("button").attr("id","header-btn");

$(function(){
  $('button').click(function(){
    $('ul').slideToggle(200);
  });
});