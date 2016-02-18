 (function ($) {
    /*
     | Mobile Navigation
     */
    $("#navigation").mmenu({
        navbar: { title: CCM_SITE_NAME },
        offCanvas: { position: 'right' },
    }, {
        clone: true,
    });

    $('#mm-navigation').removeClass('ccm-responsive-navigation').removeClass('original');
 }(jQuery));