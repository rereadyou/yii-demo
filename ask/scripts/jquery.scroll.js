function mycarousel_initCallback(carousel)
{
    // Disable autoscrolling if the user clicks the prev or next button.
    carousel.buttonNext.bind('click', function() {
        carousel.startAuto(0);
    });

    carousel.buttonPrev.bind('click', function() {
        carousel.startAuto(0);
    });

    // Pause autoscrolling if the user moves with the cursor over the clip.
    carousel.clip.hover(function() {
        carousel.stopAuto();
    }, function() {
        carousel.startAuto();
    });
};

jQuery(document).ready(function() {
    jQuery('.mycarousel').jcarousel({
        auto: 2,
        wrap: 'last',
        initCallback: mycarousel_initCallback
    });
	jQuery('.mycarousel li').hover(
	  function(){
	    //用于修复最后一个会丢失的原因
	    var w = $('.mycarousel').width() + 300;		
	    $('.mycarousel').css('width',w);	  
		$(this).addClass('sp-b-f').addClass('jcarousel-mgr0').end().prev('li').addClass('jcarousel-mgr0');
	  },
	  function(){
	    $(this).removeClass('sp-b-f').addClass('jcarousel-mgr').end().prev('li').addClass('jcarousel-mgr');
	  });
	  
}); 