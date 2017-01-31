'use strict';

(function (win, doc, $) {

    var selectors = {
        navTrigger: $('.js-nav-trigger'),
        nav: $('.js-main-nav'),
        navActiveClass: 'al-mobile-nav-trigger--active',
        slider: $('.js-main-slider'),
        rusDescription: $('.js-rus-descr'),
        rusDescriptionTrigger: $('.js-rus-descr-trigger'),
        rusDescriptionTriggerAction: $('.js-rus-descr-trigger-action')
    }

    var sliderSettings = {
        responsive: true,
        scroll: {
            fx: 'crossfade',
            duration: 800
        },
        auto: false,
        next: $('.al-promo__nav-item--next'),
        prev: $('.al-promo__nav-item--prev'),
        pagination: {
            container: '.al-promo__pagination',
            anchorBuilder: function () {
                return '<li class="al-promo__pagination-item"></li>'
            }
        }
    };

    selectors.slider.caroufredsel(sliderSettings);

    $(window).on('resize', function(){
        selectors.slider.caroufredsel(sliderSettings)
    });


    selectors.navTrigger.on('click', function(){
        if (selectors.navTrigger.hasClass(selectors.navActiveClass)) {
            selectors.nav.slideUp(function(){
                selectors.navTrigger.removeClass(selectors.navActiveClass);
            });
        } else {
            selectors.nav.slideDown();
                selectors.navTrigger.addClass(selectors.navActiveClass);
        }
    });

    selectors.rusDescriptionTrigger.on('click', function(){

        if (!$(this).hasClass('visible')){
            selectors.rusDescription.slideDown();
            $(this).find(selectors.rusDescriptionTriggerAction).text('Hide');
            $(this).addClass('visible');
        } else {
            selectors.rusDescription.slideUp();
            $(this).find(selectors.rusDescriptionTriggerAction).text('Show');
            $(this).removeClass('visible');
        }


    })




})(window, document, jQuery);

