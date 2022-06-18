$(function() {
  $('#sidebarToggle').on('click', function() {
    $('#sidebar,#content').toggleClass('active');
  });
});
$(document).ready(function(){
  $('.sub-btn').click(function(){
    $(this).next('.sub-menu').slideToggle();
  });
});
