jQuery(document).ready(function ($) {
    "use strict";

    /* --------------------------------
     Preloader
     -------------------------------- */

    $(window).load(function () {
        $('#preloader').fadeOut('slow', function () {
            $(this).remove();
        });
    });

});



