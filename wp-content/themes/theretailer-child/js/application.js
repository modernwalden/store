jQuery(function($) {
  $(document).ready(function() {
    if ($('body').hasClass('page-template-page-blog-php')) {
      function respond() {
        var windowWidth = $(window).width();
        
        if (windowWidth<960) {
          $('.thumb-container').each(function() {
            $(this).removeClass('grid_4');
          });
          
          $('.content-container').each(function() {
            $(this).removeClass('grid_4');
          });
        } else {
          $('.thumb-container').each(function() {
            $(this).addClass('grid_4');
          });
          
          $('.content-container').each(function() {
            $(this).addClass('grid_4');
          });
        }
      }
      
      $(window).resize(function() {
        respond();
      });
      
      if ($(window).width()<960) {
        respond();
      }
    }
  });
});