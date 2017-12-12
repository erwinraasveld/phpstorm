"use strict";




jQuery(function () {



    jQuery(document).ajaxComplete(function () {
        var bestellen_grid = jQuery('#bestellen-grid');
        if(bestellen_grid.length > 0){
            var accessoire = jQuery('.bestellen',bestellen_grid);
            accessoire.each(function () {
                var min = jQuery(this).find('.min');
                var plus = jQuery(this).find('.plus');
                var aantal_veld = jQuery(this).find('.aantal-veld input');

                min.on('click',function () {
                    if(aantal_veld.val() > 0){
                        aantal_veld.val(Number(aantal_veld.val()) - 1);
                    }
                });
                plus.on('click',function () {
                    aantal_veld.val(Number(aantal_veld.val()) + 1);
                });

                min.addClass('nul');
                aantal_veld.addClass('nul');
                jQuery(this).on('click',function () {
                    console.log(aantal_veld.val());
                    if(aantal_veld.val() <= 0){
                        min.addClass('nul');
                        aantal_veld.addClass('nul');
                    }
                    else{
                        min.removeClass('nul');
                        aantal_veld.removeClass('nul');
                    }
                });

            });
        }
    });

});

