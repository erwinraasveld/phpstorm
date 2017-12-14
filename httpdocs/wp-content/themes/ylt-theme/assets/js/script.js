
(function ($)
{


"use strict";


$(function () {



    var bestel_pagina = $('body.page-id-40');
    if (bestel_pagina.length > 0) {
        var container = $('.header-banner + .container', bestel_pagina);
        var lader = $('<div>').addClass('lader');
        container.addClass('laden');
        container.append(lader);


        var knop = $('button[type="submit"].knop');

        knop.on('click', function () {

            var aantal_veld = $('.aantal-veld input');

            var bestellijst = {};
            aantal_veld.each(function () {
                var id = $(this).data(id);
                var aantal = $(this).val();

                if(aantal > 0){
                    bestellijst[id] = $(this).data();
                    $(this).data('aantal',aantal);
                }
                else{
                    delete bestellijst[id];
                }


            });

            if(!$.isEmptyObject(bestellijst)){
                var subtotaal = 0;
                var html = "<table><tr><th>Accessoire</th><th>Prijs</th><th>Aantal</th><th>Totaal</th><th>Subtotaal</th></tr>";

                $.each(bestellijst,function (id,data) {
                    var titel = data.titel;
                    if(data.ondertitel){
                        titel = data.titel + ": " + data.ondertitel;
                    }
                    var permalink = data.permalink;

                    var accessoirelink = "<a href='"+permalink+"' target='_blank'>"+titel+"</a>";

                    var totaalprijs = parseFloat(data.prijs.replace(",",".")) * Number(data.aantal);
                    var totaalprijsMetComma = totaalprijs.toString().replace(".",",");

                    html += "<tr><td>"+accessoirelink+"</td><td>"+data.prijs+"</td><td>"+data.aantal+"</td><td>€"+totaalprijsMetComma+"</td><td></td></tr>";
                    subtotaal += totaalprijs;
                });


                html += "<tr><td></td><td></td><td></td><td></td><td><b>&euro;"+subtotaal+"</b></td></tr></table>";
                html += "<style type=\"text/css\">\n" +
                    "table  {border-collapse:collapse;border-spacing:0;}\n" +
                    "table td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}\n" +
                    "table th{font-family:Arial, sans-serif;font-size:14px;font-weight:bold;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}\n" +
                    "table td{vertical-align:top}\n" +
                    "</style>";

                $('#bestellijst').val(html);

            }

            //$('.wpcf7 form').submit();

        });

    }


    $(document).ajaxComplete(function () {
        if (lader.length > 0) {
            lader.remove();
            container.removeClass('laden');
        }

        var bestellen_grid = $('#bestellen-grid');
        if (bestellen_grid.length > 0) {
            var accessoire = $('.bestellen', bestellen_grid);
            accessoire.each(function () {
                var min = $(this).find('.min');
                var plus = $(this).find('.plus');
                var aantal_veld = $(this).find('.aantal-veld input');

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
                $(this).on('click', function () {
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

    $(document).ready(function () {
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


})(jQuery);