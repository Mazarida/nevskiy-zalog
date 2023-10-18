jQuery(function($){
    window.getPercent = () => {
        if ($('[name="kreditnaya-istoriya"]').val() === 'bez-kreditnoy-istorii') {
            return 16;
        }
        if (
            $('[name="kreditnaya-istoriya"]').val() === 'horoshaya-kreditnaya-istoriya'
            && $('[name="rabota"]').val() === 'so-spravkoy-o-dohodah'
        ) {
            return 14;
        }
        if (
            $('[name="kreditnaya-istoriya"]').val() === 'horoshaya-kreditnaya-istoriya'
            && $('[name="rabota"]').val() === 'bez-spravki-o-dohodah'
        ) {
            return 15;
        }
        if (
            ['bez-kreditnoy-istorii', 'horoshaya-kreditnaya-istoriya'].indexOf($('[name="kreditnaya-istoriya"]').val()) === -1
            && ['nedvijimost', 'kvartira', 'dom', 'kommercheskaya-nedvijimost'].indexOf($('[name="tip-zaloga"]').val()) !== -1
        ) {
            return 18;
        }
        return 20;
    }
    window.recount = () => {
        const percent = getPercent();
        $('.js-percent').html(percent);
        window.sum = Number($('[name="sum"]').val().replace(/[^0-9]/g, ''))
        window.duration = durationVals.find(el => el.id === $('[name="duration"]').val()) ? durationVals.find(el => el.id === $('[name="duration"]').val())['value'] : ''
        if (window.sum && window.duration) {
            const monthly = Math.round(window.sum * percent / 100 / 12 / (1 - Math.pow(1 + percent / 100 / 12, -window.duration)))
            $('.js-monthly').html(monthly.toLocaleString('en-US').replace(/,/g, '&nbsp;'))
        } else {
            $('.js-monthly').html("от 17 652")
        }
        const inputData = {}
        $('.calculate__calculator select').each(function() {
            if ($(this).val()) {
                inputData[$(this).attr("name")] = $(this).val()
            }
        })
        if (!window.calcBusy) {
            window.calcBusy = true
            $.ajax({
                url: '/?get_calc_data=1',
                type: 'post',
                data: inputData,
                success: function (data) {
                    const responseObj = JSON.parse(data)
                    $('[data-action="title-replace"]').html(responseObj.title)
                    $('title').html(responseObj.title)
                    window.responseObj = responseObj
                    window.$ = $
                    $('[data-default-content]').each(function () {
                        $(this).html($(this).attr('data-default-content'))
                    })
                    responseObj.bullets.forEach((el, index) => {
                        $(`[data-bullet="${index}"]`).html(el)
                    })
                    if (responseObj.img) {
                        $('.head-offer').css('background-image', `url('${responseObj.img}')`)
                        $('.head-offer').css('background-position-x', 'right')
                        $('.head-offer').css('background-position-y', 'center')
                        $('.head-offer__ctr').css('background-image', 'none')
                    } else {
                        $('.head-offer').css('background-image', '')
                        $('.head-offer').css('background-position-x', '')
                        $('.head-offer').css('background-position-y', '')
                        $('.head-offer__ctr').css('background-image', '')
                    }
                    window.history.replaceState({}, responseObj.title, responseObj.url)
                },
                complete: function () {
                    window.calcBusy = false
                }
            });
        } else {
            setTimeout(recount, 500)
        }
    }
//     `
//     Нулевой клиент
// Возраст от 21 до 65 + нет кредитной истории (никогда не брал кредиты) = 16% годовых, сумма 1 млн (срок пусть сам ставит, срок кредитования до 30 лет, но по возрасту не более 75)
//
// Хороший клиент
// Возраст от 21 до 65 + хорошая кредитная история + есть доход + есть подтверждение дохода  = 14% годовых, сумма до 10 млн, срок также считаем
//
// Бридж клиент
// Возраст от 21 до 65 + хорошая кредитная история + нет подтверждения дохода = 15% годовых, сумма до 10 млн
//
// Страйк клиент
// Возраст от 21 до 65 + плохая кредитная история + есть недвижимость = 18% годовых, срок также
//
// При всех значениях неважно есть или нет недвижимость, созаемщик и тд, возьмем за основу кредитную историю, кроме последней программы. Там при наличии просрочек обязательно должна быть недвижимость.
//
// Если он вводит остальные параметры кроме истории и подтверждения дохода, то они не учитываются просто (не влияют на ставку)
//     `
    const priceVals = [
        100000,
        110000,
        120000,
        130000,
        140000,
        150000,
        250000,
        350000,
        450000,
        500000,
        1000000,
        2000000,
        3000000,
        4000000,
        5000000,
        6000000,
        7000000,
        8000000,
        9000000,
        10000000,
    ]
    const durationVals = [
        {
            name: 'На полгода',
            value: 6,
            id: 'na-polgoda',
        },
        {
            name: 'На 1 год',
            value: 12,
            id: 'na-god',
        },
        {
            name: 'На год',
            value: 12,
            id: 'na-1-god',
        },
        {
            name: 'На 2 года',
            value: 2 * 12,
            id: 'na-2-goda',
        },
        {
            name: 'На 3 года',
            value: 3 * 12,
            id: 'na-3-goda',
        },
        {
            name: 'На 4 года',
            value: 4 * 12,
            id: 'na-4-goda',
        },
        {
            name: 'На 5 лет',
            value: 5 * 12,
            id: 'na-5-let',
        },
        {
            name: 'На 6 лет',
            value: 6 * 12,
            id: 'na-6-let',
        },
        {
            name: 'На 7 лет',
            value: 7 * 12,
            id: 'na-7-let',
        },
        {
            name: 'На 8 лет',
            value: 8 * 12,
            id: 'na-8-let',
        },
        {
            name: 'На 9 лет',
            value: 9 * 12,
            id: 'na-9-let',
        },
        {
            name: 'На 10 лет',
            value: 10 * 12,
            id: 'na-10-let',
        },
        {
            name: 'На 11 лет',
            value: 11 * 12,
            id: 'na-11-let',
        },
        {
            name: 'На 12 лет',
            value: 12 * 12,
            id: 'na-12-let',
        }
    ]
    window.duration = undefined
    window.sum = undefined
    $('.slider-price').closest('.sliders__ui-slider').append($(`
        <div class="js-slider-min-max"><div class="js-slider-min">${priceVals[0].toLocaleString('en-US').replace(/,/g, '&nbsp;')}</div><div class="js-slider-max">${priceVals[priceVals.length-1].toLocaleString('en-US').replace(/,/g, '&nbsp;')}</div></div>    
    `))
    $('.slider-price').slider({
        value: 0,
        min: 0,
        max: priceVals.length - 1,
        slide: function(event, ui) {
            const value = ui.value
            $('.js-price-val').html(`${priceVals[value].toLocaleString('en-US').replace(/,/g, '&nbsp;')}&nbsp;руб`)
        },
        change: function(event, ui) {
            const value = ui.value
            window.sum = priceVals[value]
            $('.js-price-val').html(`${priceVals[value].toLocaleString('en-US').replace(/,/g, '&nbsp;')}&nbsp;руб`)
            recount()
        },
    });
    $('.slider-duration').closest('.sliders__ui-slider').append($(`
        <div class="js-slider-min-max"><div class="js-slider-min">${durationVals[0].name}</div><div class="js-slider-max">${durationVals[durationVals.length-1].name}</div></div>    
    `))
    $('.slider-duration').slider({
        value: 0,
        min: 0,
        max: durationVals.length - 1,
        slide: function(event, ui) {
            const value = ui.value
            $('.js-duration-val').html(durationVals[value].name)
        },
        change: function(event, ui) {
            const value = ui.value
            $('.js-duration-val').html(durationVals[value].name)
            window.duration = durationVals[value].value
            recount()
        },
    });
    $('body').on('change', '.calculate__calculator select', recount)
});


/* -- start Скрипт попапов --*/

const btns = document.querySelectorAll('.btn');
const modals = document.querySelectorAll('.modal-sm');

btns.forEach((el) => {
    el.addEventListener('click', (e) => {
        let path = e.currentTarget.getAttribute('data-path');
        console.log(path);
        modals.forEach((el) => {
            el.classList.add('.modal--visible');
        } );
        document.querySelector(`[data-target="${path}"]`);
    });
});
   


/* -- end Скрипт попапов  --*/