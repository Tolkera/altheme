'use strict';

(function (win, doc, $) {
    $('.js-main-slider').caroufredsel({
    //    auto: false,
        responsive: true,
        scroll: {
            fx: 'crossfade',
            duration: 800
        },
        auto: false,
        next: $('.al-promo__nav-item--next'),
        prev: $('.al-promo__nav-item--prev'),

    })
})(window, document, jQuery);