jQuery(document).ready(function() {
  jQuery('body').append('<a href="#" id="go-top"><span class="up"></span></span></a>');
});

jQuery(function() {
 jQuery.fn.scrollToTop = function() {
  jQuery(this).hide().removeAttr("href");
  if (jQuery(window).scrollTop() >= "250") jQuery(this).fadeIn("slow")
  var scrollDiv = jQuery(this);
  jQuery(window).scroll(function() {
   if (jQuery(window).scrollTop() <= "250") jQuery(scrollDiv).fadeOut("slow")
   else jQuery(scrollDiv).fadeIn("slow")
  });
  jQuery(this).click(function() {
   jQuery("html, body").animate({scrollTop: 0}, "slow")
  })
 }
});

jQuery(function() {
 jQuery("#go-top").scrollToTop();
});
