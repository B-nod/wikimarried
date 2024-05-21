
$(document).ready(function(){/* activate sidebar */
var navHeight = $('.navbar').outerHeight(true) + $('.inner').outerHeight(true)+125;

$('#sidebar').affix({
  offset: {
    top: navHeight
  }
});

/* activate scrollspy menu */
var $body   = $(document.body);


$body.scrollspy({
	target: '#leftCol',
	offset: navHeight
});

/* smooth scrolling sections */
$('a[href*=#]:not([href=#])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html,body').animate({
          scrollTop: target.offset().top - 50
        }, 1000);
        return false;
      }
    }
});
});