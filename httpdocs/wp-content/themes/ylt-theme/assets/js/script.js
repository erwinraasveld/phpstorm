"use strict";
jQuery(function () {

    var ScrollMagic = require('scrollmagic');
    var controller = new ScrollMagic.Controller();

    new ScrollMagic.Scene({
        duration: 100,	// the scene should last for a scroll distance of 100px
        offset: 50		// start this scene after scrolling for 50px
    })
        .setPin("#voordelen-op-een-rij") // pins the element for the the scene's duration
        .addTo(controller); // assign the scene to the controller

});

