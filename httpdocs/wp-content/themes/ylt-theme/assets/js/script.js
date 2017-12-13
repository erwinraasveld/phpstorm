"use strict";


jQuery(function () {

    var bestel_pagina = jQuery('body.page-id-40');
    if (bestel_pagina.length > 0) {
        var container = jQuery('.header-banner + .container', bestel_pagina);
        var lader = jQuery('<div>').addClass('lader');
        container.addClass('laden');
        container.append(lader);


        var knop = jQuery('button[type="submit"].knop');
        //var formulier = jQuery('.wpcf7 form');

        knop.on('click', function () {

            var aantal_veld = jQuery('.aantal-veld input');

            var bestellijst = {};
            aantal_veld.each(function () {
                var id = jQuery(this).data(id);
                var aantal = jQuery(this).val();

                if(aantal > 0){
                    bestellijst[id] = jQuery(this).data();
                    jQuery(this).data('aantal',aantal);
                }
                else{
                    delete bestellijst[id];
                }


            });

            console.log(bestellijst);
            //formulier.submit();
        });

    }


    jQuery(document).ajaxComplete(function () {
        if (lader.length > 0) {
            lader.remove();
            container.removeClass('laden');
        }

        var bestellen_grid = jQuery('#bestellen-grid');
        if (bestellen_grid.length > 0) {
            var accessoire = jQuery('.bestellen', bestellen_grid);
            accessoire.each(function () {
                var min = jQuery(this).find('.min');
                var plus = jQuery(this).find('.plus');
                var aantal_veld = jQuery(this).find('.aantal-veld input');

                min.on('click', function () {
                    if (aantal_veld.val() > 0) {
                        aantal_veld.val(Number(aantal_veld.val()) - 1);
                    }
                });
                plus.on('click', function () {
                    aantal_veld.val(Number(aantal_veld.val()) + 1);
                });

                min.addClass('nul');
                aantal_veld.addClass('nul');
                jQuery(this).on('click', function () {
                    if (aantal_veld.val() <= 0) {
                        min.addClass('nul');
                        aantal_veld.addClass('nul');
                    }
                    else {
                        min.removeClass('nul');
                        aantal_veld.removeClass('nul');
                    }
                });


            });
        }
    });

    jQuery(document).ready(function ($) {
        $(document).on('focus', 'input[type=text], input[type=email],  input[type=tel],  input[type=number]', function () {
            var ph = $(this).attr('placeholder');
            if (ph) {
                $(this).attr('ph', $(this).attr('placeholder'));
                $(this).attr('placeholder', '');
                $(this).animate({'padding-top': '15px', 'position': 'relative'}, 100);
                $(this).parent().find('.floating-label').each(function () {
                    $(this).remove();
                });
                $(this).parent().append('<div class="floating-label">' + ph + '</div>');
                $(this).parent().find('.floating-label').fadeIn();
            }
        });

        $(document).on('blur', 'input[type=text], input[type=email],  input[type=tel],  input[type=number]', function () {
            if (!$(this).val()) {
                $(this).animate({'padding-top': '0', 'position': 'relative'}, 100);
                $(this).parent().find('.floating-label').fadeOut();

                $(this).attr('placeholder', $(this).attr('ph'));
            }
        });

    });

});

