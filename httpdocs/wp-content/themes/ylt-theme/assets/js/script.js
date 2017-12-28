

(function ($)
{

    /*!
    * Slidebars - A jQuery Framework for Off-Canvas Menus and Sidebars
    * Version: 2.0.2
    * Url: http://www.adchsm.com/slidebars/
    * Author: Adam Charles Smith
    * Author url: http://www.adchsm.com/
    * License: MIT
    * License url: http://www.adchsm.com/slidebars/license/
    */

    var slidebars=function(){var t=$("[canvas]"),e={},i=!1,n=!1,s=["top","right","bottom","left"],r=["reveal","push","overlay","shift"],o=function(i){var n=$(),s="0px, 0px",r=1e3*parseFloat(e[i].element.css("transitionDuration"),10);return("reveal"===e[i].style||"push"===e[i].style||"shift"===e[i].style)&&(n=n.add(t)),("push"===e[i].style||"overlay"===e[i].style||"shift"===e[i].style)&&(n=n.add(e[i].element)),e[i].active&&("top"===e[i].side?s="0px, "+e[i].element.css("height"):"right"===e[i].side?s="-"+e[i].element.css("width")+", 0px":"bottom"===e[i].side?s="0px, -"+e[i].element.css("height"):"left"===e[i].side&&(s=e[i].element.css("width")+", 0px")),{elements:n,amount:s,duration:r}},c=function(t,i,n,s){return a(t)?!1:void(e[t]={id:t,side:i,style:n,element:s,active:!1})},a=function(t){return e.hasOwnProperty(t)?!0:!1};this.init=function(t){return i?!1:(n||($("[off-canvas]").each(function(){var t=$(this).attr("off-canvas").split(" ",3);return t&&t[0]&&-1!==s.indexOf(t[1])&&-1!==r.indexOf(t[2])?void c(t[0],t[1],t[2],$(this)):!1}),n=!0),i=!0,this.css(),$(f).trigger("init"),void("function"==typeof t&&t()))},this.exit=function(t){if(!i)return!1;var e=function(){i=!1,$(f).trigger("exit"),"function"==typeof t&&t()};this.getActiveSlidebar()?this.close(e):e()},this.css=function(t){if(!i)return!1;for(var n in e)if(a(n)){var s;s="top"===e[n].side||"bottom"===e[n].side?e[n].element.css("height"):e[n].element.css("width"),("push"===e[n].style||"overlay"===e[n].style||"shift"===e[n].style)&&e[n].element.css("margin-"+e[n].side,"-"+s)}this.getActiveSlidebar()&&this.open(this.getActiveSlidebar()),$(f).trigger("css"),"function"==typeof t&&t()},this.open=function(t,n){if(!i)return!1;if(!t||!a(t))return!1;var s=function(){e[t].active=!0,e[t].element.css("display","block"),$(f).trigger("opening",[e[t].id]);var i=o(t);i.elements.css({"transition-duration":i.duration+"ms",transform:"translate("+i.amount+")"}),setTimeout(function(){$(f).trigger("opened",[e[t].id]),"function"==typeof n&&n()},i.duration)};this.getActiveSlidebar()&&this.getActiveSlidebar()!==t?this.close(s):s()},this.close=function(t,n){if("function"==typeof t&&(n=t,t=null),!i)return!1;if(t&&!a(t))return!1;if(t||(t=this.getActiveSlidebar()),t&&e[t].active){e[t].active=!1,$(f).trigger("closing",[e[t].id]);var s=o(t);s.elements.css("transform",""),setTimeout(function(){s.elements.css("transition-duration",""),e[t].element.css("display",""),$(f).trigger("closed",[e[t].id]),"function"==typeof n&&n()},s.duration)}},this.toggle=function(t,n){return i&&t&&a(t)?void(e[t].active?this.close(t,function(){"function"==typeof n&&n()}):this.open(t,function(){"function"==typeof n&&n()})):!1},this.isActive=function(){return i},this.isActiveSlidebar=function(t){return i&&t&&a(t)?e[t].active:!1},this.getActiveSlidebar=function(){if(!i)return!1;var t=!1;for(var n in e)if(a(n)&&e[n].active){t=e[n].id;break}return t},this.getSlidebars=function(){if(!i)return!1;var t=[];for(var n in e)a(n)&&t.push(e[n].id);return t},this.getSlidebar=function(t){return i&&t&&t&&a(t)?e[t]:!1},this.events={};var f=this.events;$(window).on("resize",this.css.bind(this))};

    // Create a new instance of Slidebars
    var controller = new slidebars();

    // Initialize Slidebars
    controller.init();

    // Right Slidebar controls
    $( '.js-open-right-slidebar' ).on( 'click', function ( event ) {
        event.stopPropagation();
        controller.open( 'slidebar-2' );
    } );

    $( '.js-close-right-slidebar' ).on( 'click', function ( event ) {
        event.stopPropagation();
        controller.close( 'slidebar-2' );
    } );

    $( '.js-toggle-right-slidebar' ).on( 'click', function ( event ) {
        event.stopPropagation();
        controller.toggle( 'slidebar-2' );
    } );

    // Close any
    $( controller.events ).on( 'opened', function () {
        $( '[canvas="container"]' ).addClass( 'js-close-any-slidebar' );
    } );

    $( controller.events ).on( 'closed', function () {
        $( '[canvas="container"]' ).removeClass( 'js-close-any-slidebar' );
    } );

    $( 'body' ).on( 'click', '.js-close-any-slidebar', function ( event ) {
        event.stopPropagation();
        controller.close();
    } );

    // Initilize, exit and css reset
    $( '.js-initialize-slidebars' ).on( 'click', function ( event ) {
        event.stopPropagation();
        controller.init();
    } );

    $( '.js-exit-slidebars' ).on( 'click', function ( event ) {
        event.stopPropagation();
        controller.exit();
    } );

    $( '.js-reset-slidebars-css' ).on( 'click', function ( event ) {
        event.stopPropagation();
        controller.css();
    } );

    // Is and get
    $( '.js-is-active' ).on( 'click', function ( event ) {
        event.stopPropagation();
        console.log( controller.isActive() );
    } );

    $( '.js-is-active-slidebar' ).on( 'click', function ( event ) {
        event.stopPropagation();
        var id = prompt( 'Enter a Slidebar id' );
        console.log( controller.isActiveSlidebar( id ) );
    } );

    $( '.js-get-active-slidebar' ).on( 'click', function ( event ) {
        event.stopPropagation();
        console.log( controller.getActiveSlidebar() );
    } );

    $( '.js-get-all-slidebars' ).on( 'click', function ( event ) {
        event.stopPropagation();
        console.log( controller.getSlidebars() );

    } );

    $( '.js-get-slidebar' ).on( 'click', function ( event ) {
        event.stopPropagation();
        var id = prompt( 'Enter a Slidebar id' );
        console.log( controller.getSlidebar( id ) );
    } );

    // Callbacks
    $( '.js-init-callback' ).on( 'click', function ( event ) {
        event.stopPropagation();
        controller.init( function () {
            console.log( 'Init callback' );
        } );
    } );

    $( '.js-exit-callback' ).on( 'click', function ( event ) {
        event.stopPropagation();
        controller.exit( function () {
            console.log( 'Exit callback' );
        } );
    } );

    $( '.js-css-callback' ).on( 'click', function ( event ) {
        event.stopPropagation();
        controller.css( function () {
            console.log( 'CSS callback' );
        } );
    } );

    $( '.js-open-callback' ).on( 'click', function ( event ) {
        event.stopPropagation();
        controller.open( 'slidebar-1', function () {
            console.log( 'Open callback' );
        } );
    } );

    $( '.js-close-callback' ).on( 'click', function ( event ) {
        event.stopPropagation();
        controller.close( function () {
            console.log( 'Close callback' );
        } );
    } );

    $( '.js-toggle-callback' ).on( 'click', function ( event ) {
        event.stopPropagation();
        controller.toggle( 'slidebar-1', function () {
            console.log( 'Toggle callback' );
        } );
    } );


"use strict";

    function leegmaken ($input){
        $input.val(0);
    }

    function bestelsubmit(){
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

                html += "<tr><td>"+accessoirelink+"</td><td style='text-align: center;'>"+data.prijs+"</td><td style='text-align: center;'>"+data.aantal+"</td><td style='text-align: center;'>€"+totaalprijsMetComma+"</td><td></td></tr>";
                subtotaal += totaalprijs;
            });

            subtotaal = subtotaal.toString().replace(".",",");


            html += "<tr><td></td><td></td><td></td><td></td><td style='text-align: center;text-decoration: underline;'><b>&euro;"+subtotaal+"</b></td></tr></table>";

            $('#bestellijst').val(html);

        }
        else{
            $('#bestellijst').attr('value','');
        }
        $('.wpcf7 form').submit();
    }

    function accesoire_plusmin(){
        var bestellen_grid = $('#bestellen-grid');
        if (bestellen_grid.length > 0) {
            var accessoire = $('.bestellen', bestellen_grid);
            accessoire.each(function () {

                // var min = $(this).find('.min');
                var min = $('.min',this);
                var plus = $('.plus',this);
                var aantal_veld = $('.aantal-veld input',this);

                min.unbind('click');
                plus.unbind('click');

                min.on('click', function () {
                    if (aantal_veld.val() > 0) {
                        aantal_veld.val(Number(aantal_veld.val()) - 1);
                    }
                });
                plus.on('click', function () {
                    aantal_veld.val(Number(aantal_veld.val()) + 1);
                });

                if(aantal_veld.val() <= 0){
                    min.addClass('nul');
                    aantal_veld.addClass('nul');
                }

                $(document).on('click keypress', function () {
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
    }

$(function () {

    // Select all links with hashes
    $('a[href*="#"]')
    // Remove links that don't actually link to anything
        .not('[href="#"]')
        .not('[href="#0"]')
        .click(function(event) {
            // On-page links
            if (
                location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '')
                &&
                location.hostname == this.hostname
            ) {
                // Figure out element to scroll to
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                // Does a scroll target exist?
                if (target.length) {
                    // Only prevent default if animation is actually gonna happen
                    event.preventDefault();
                    $('html, body').animate({
                        scrollTop: target.offset().top
                    }, 1000, function() {
                        // Callback after animation
                        // Must change focus!
                        var $target = $(target);
                        $target.focus();
                        if ($target.is(":focus")) { // Checking if the target was focused
                            return false;
                        } else {
                            $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
                            $target.focus(); // Set focus again
                        };
                    });
                }
            }
        });



    var bestel_pagina = $('body.page-id-40');
    if (bestel_pagina.length > 0) {

        var aantal_veld = $('.aantal-veld input');
        if(aantal_veld.length > 0){
        }


        $(window).on('wpcf7:mailsent',function() {
            var aantal_veld = $('.aantal-veld input');
            aantal_veld.each(function () {
                leegmaken($(this));
            });

            var inputs= $('input[type=text], input[type=email],  input[type=tel],  input[type=number]');
            inputs.each(function () {
               if($(this).next().hasClass('floating-label')){
                   $(this).next().remove();
                   $(this).css({'padding-top' : 0});
                   var placeholder = $(this).attr('ph');
                   $(this).attr('placeholder',placeholder);
               }
            });
        });


        var knop = $('button[type="submit"].knop');
        knop.on('click', function () {
            bestelsubmit();
        });


    }


    $(document).ajaxComplete(function () {
        accesoire_plusmin();
    });





    //label input placeholder
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