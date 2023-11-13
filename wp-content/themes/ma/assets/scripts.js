jQuery(function($){
    $('body').on('click', '.head-bot__menu-icon', function(e) {
        e.preventDefault()
        $('body').addClass('menu-active')
    })
    $('body').on('click', '.popup-menus__close-btn', function(e) {
        e.preventDefault()
        $('body').removeClass('menu-active')
    })
    $('body').click(function (e) {
        const $target = $(e.target);
        if(!$target.closest('.header').length) {
            $('body').removeClass('menu-active')
        }
    })
    $('body').on('click', '.btns-wrap__btn-clc', function (e) {
        e.preventDefault()
        if ($(this).hasClass('btn-clc-active')) {
            $(this).removeClass('btn-clc-active')
            const val = '-'
            const name = $(this).closest('.quiz-step__quiz-section').attr('data-slug')
            $(`[name="${name}"]`).val(val).change()
        } else {
            $(this).closest('.tab-btns__btns-wrap').find('.btns-wrap__btn-clc').removeClass('btn-clc-active')
            $(this).addClass('btn-clc-active')
            const val = $(this).attr('data-value')
            const name = $(this).closest('.quiz-step__quiz-section').attr('data-slug')
            $(`[name="${name}"]`).val(val).change()
        }
    })
    $('body').on('click', '.quiz-footer__btn-primary', function(e) {
        e.preventDefault()
        let step = Number($(this)
            .closest('.credit-calc__calc-quiz')
            .find('.step-current')
            .attr('data-step'))
        if (step === 4) {
            $('.calc-quiz__calc-results').css('display', 'flex')
            return
        }
        step++;
        if (step === 4) {
            $(this).html("Рассчитать")
        }
        $(this)
            .closest('.credit-calc__calc-quiz')
            .find('.calc-quiz__quiz-step')
            .removeClass('step-current')
        $(this)
            .closest('.credit-calc__calc-quiz')
            .find(`.calc-quiz__quiz-step[data-step="${step}"]`)
            .addClass('step-current')
        $(this)
            .closest('.credit-calc__calc-quiz')
            .find('.js-quiz-step')
            .html(step)
    })
    $('body').on('click', '.quiz-footer__btn-alt', function(e) {
        e.preventDefault()
        $('.quiz-footer__btn-primary').html("Далее")
        $('.calc-quiz__calc-results').css('display', 'none')
        let step = Number($(this)
            .closest('.credit-calc__calc-quiz')
            .find('.step-current')
            .attr('data-step'))
        if (step === 1) {
            return
        }
        step--;
        $(this)
            .closest('.credit-calc__calc-quiz')
            .find('.calc-quiz__quiz-step')
            .removeClass('step-current')
        $(this)
            .closest('.credit-calc__calc-quiz')
            .find(`.calc-quiz__quiz-step[data-step="${step}"]`)
            .addClass('step-current')
        $(this)
            .closest('.credit-calc__calc-quiz')
            .find('.js-quiz-step')
            .html(step)
    })

    $('body').on('click', '.questions-wrapper__single-question:not(.question-expanded)', function () {
        $('.questions-wrapper__single-question').removeClass('question-expanded')
        $(this).addClass('question-expanded')
    })

    $('body').on('click', '.tst-tabs-header__tabs-btn', function () {
        const mdlId = $(this).attr('data-modal')
        $(this).closest('section').find('.tst-tabs-header__tabs-btn').removeClass('btn-active')
        $(this).closest('section').find(`.tst-tabs-header__tabs-btn[data-modal="${mdlId}"]`).addClass('btn-active')
        $(this).closest('section').find(`.testimonails__slider-tst`).hide()
        $(this).closest('section').find(`.testimonails__slider-tst[data-modal="${mdlId}"]`).show()
    })


    const tstSld = new Swiper(".js-slider-testimonials-txt", {
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        slidesPerView: 'auto',
        ...($(window).outerWidth() >= 1020 ? {} : {
            effect: 'cards',
            cardsEffect: {
                slideShadows: false,
                rotate: false,
                perSlideRotate: 0,
                perSlideOffset: 21
            },
        }),
    });

    let spaceTst = 12
    if ($(window).outerWidth() <= 1280) {
        spaceTst = Math.round($(window).outerWidth()/100 * 0.9375)
    }
    if ($(window).outerWidth() <= 1020) {
        spaceTst = Math.round($(window).outerWidth()/100 * 2.5)
    }

    new Swiper(".js-slider-testimonials-vid", {
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        slidesPerView: 'auto',
        spaceBetween: spaceTst,
    });

//     new Swiper(".js-slider-certificates", {
//         pagination: {
//             el: ".swiper-pagination",
//             clickable: true,
//         },
//         centeredSlides: $(window).outerWidth() >= 1020,
//         slidesPerView:  $(window).outerWidth() >= 1020 ? 3 : undefined,
//         initialSlide: $(window).outerWidth() >= 1020 ? 1 : undefined,
//     });
new Swiper(".js-slider-certificates", {
pagination: {
            el: ".swiper-pagination",
            clickable: true,
         },
//   effect: "coverflow",
  grabCursor: true,
  centeredSlides: true,
  coverflowEffect: {
    rotate: 0,
    stretch: 0,
    depth: 100,
    modifier: 2.5
  },
  keyboard: {
    enabled: true
  },
  mousewheel: {
    thresholdDelta: 70
  },
  spaceBetween: 30,
  loop: false,
  breakpoints: {
    640: {
      slidesPerView: 2
    },
    1024: {
      slidesPerView: 3
    }
  }
});

swiper.slideTo(1, false, false);
})
