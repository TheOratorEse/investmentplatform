function scrollUp() {
    $('.scroll-up').click(function () {
        $('html,body').animate({
            scrollTop: 0
        }, {
            duration: 1250
        });
    });
    $(window).scroll(function () {
        if ($(document).scrollTop() >  2000) {
            $('.scroll-up').css({opacity: 1, zIndex: 4});
        } else {
            $('.scroll-up').css({opacity: 0, zIndex: -1});
        }
    });
}
/*
window.onload = function () {
    function a(a, b) {
        var c = /^(?:file):/, d = new XMLHttpRequest, e = 0;
        d.onreadystatechange = function () {
            4 == d.readyState && (e = d.status), c.test(location.href) && d.responseText && (e = 200), 4 == d.readyState && 200 == e && (a.outerHTML = d.responseText)
        };
        try {
            d.open("GET", b, !0), d.send()
        } catch (f) {
        }
    }

    var b, c = document.getElementsByTagName("*");
    for (b in c) c[b].hasAttribute && c[b].hasAttribute("data-include") && a(c[b], c[b].getAttribute("data-include"))
};
*/
function bodyClass($class) {
    return $('body').hasClass($class);
}

function $_GET(url) {
    var query = url.split('?')[1];
    var result = {};
    query.split("&").forEach(function (part) {
        var item = part.split("=");
        result[item[0]] = decodeURIComponent(item[1]);
    });
    return result;
}

function jsonToPost(json) {
    return Object.keys(json).map(function (k) {
        return encodeURIComponent(k) + '=' + encodeURIComponent(json[k])
    }).join('&')
}

function googleFonts() {
    const WebFontConfig = {
        google: {families: ['Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&subset=cyrillic']}
    };
    (function () {
        var wf = document.createElement('script');
        wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
            '://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js';
        wf.type = 'text/javascript';
        wf.async = 'true';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(wf, s);
    })();
}

class TariffCalculator {
    constructor(startValue, min, max) {
        this.startValue = startValue;
        this.min = min;
        this.max = max;
        const $activeTariff = $('.tariffs .active');
        this.tariff = 1 + parseInt($activeTariff.attr('data-percent')) / 100;
        $('.result .after span').text($activeTariff.attr('data-duration'));
        const $class = this;
        this.$slider = $('#price-slider').slider({
            min: this.min,
            max: this.max,
            value: this.startValue,
            create(event, ui) {
                $class.sliderCreate(event.target);
            },
            slide(event, ui) {
                const value = ui.value;
                $class.onChange(event.target, value);
            }
        });
        this.controller();
    }

    updateResult(value) {
        $('.calc .price-input input').val(`$ ${value}.00`);
        $('#gram').html(`${Math.floor(value*100)/100}`);
        var perc = parseInt($( "#plans" ).val());
        perc +=1;
        var days=0;
        var addp=0;
        switch (perc){
            case 2:
                days=9;
                addp=2;
                break;
            case 3:
                days=18;
                addp=1.5;
                break;
            case 4:
                days=32;
                addp=1;
                break;
        }
        /*
        var sum24=value*perc/100;
        $('#sum24').html(`$ ${sum24}`);
        $('#sum_full').html(`$ ${Math.floor(sum24*days*100)/100}`);
*/
        var sum24=value*perc/100;
        sum24=sum24.toFixed(2);
        var sum242=value*(perc+addp)/100;
        sum242=sum242.toFixed(2);
        $('#sum24').html(`$ ${sum24}`);
        $('#sum242').html(`$ ${sum242}`);
        $('#sum_full').html(`$ ${Math.floor(sum24*days*100)/100}`);
        $('#sum_full2').html(`$ ${Math.floor(sum242*days*100)/100}`);


    }

    sliderCreate(el) {
        $(el).find('span').attr('data-value', this.startValue);
        this.updateResult(this.startValue);
    }

    onChange(el, value) {
        $(el).find('span').attr('data-value', value);
        this.updateResult(value);
    }

    controller() {
        $('.tariffs a').click(e => {
            e.preventDefault();
            const $this = $(e.currentTarget);
            this.tariff = 1 + parseInt($this.attr('data-percent')) / 100;
            this.updateResult(this.$slider.slider("value"));
            $('.result .after span').text($this.attr('data-duration'));
            $('.tariffs a').removeClass('active');
            $this.addClass('active');
        });
    }
}

function touchSwipe() {
    $(".slide").swipe({
        swipe: function swipe(event, direction, distance, duration, fingerCount, fingerData) {

            if (direction == 'left') jQuery(this).carousel('next');
            if (direction == 'right') jQuery(this).carousel('prev');
        },
        allowPageScroll: "vertical"
    });
}


$(() => {
    $(".select2").select2({minimumResultsForSearch: -1});
    $('select').change(function () {
        $(this).closest('form').submit();
    });
    $(".scroll-link").click(function (e) {
        e.preventDefault();
        let target = $(this).attr('href'),
            top = $(target).offset().top;
        $('body,html').animate({scrollTop: top}, Math.abs(top - $(document).scrollTop()));
    });
    new TariffCalculator(100, 10, 2500);
    new WOW({
        offset: 150,
    }).init();
    touchSwipe();
    scrollUp();
    $( "#plans" ).change(function () {
        var value = $('.ui-state-default').data().value;
        //console.log(value);
        var perc = parseInt(this.value);
        perc +=1;
        var days=0;
        var addp=0;
        switch (perc){
            case 2:
                days=9;
                addp=2;
                break;
            case 3:
                days=18;
                addp=1.5;
                break;
            case 4:
                days=32;
                addp=1;
                break;
        }
        var sum24=value*perc/100;
        sum24=sum24.toFixed(2);
        var sum242=value*(perc+addp)/100;
        sum242=sum242.toFixed(2);
        $('#period').html(days);
        $('#sum24').html(`$ ${sum24}`);
        $('#sum242').html(`$ ${sum242}`);
        $('#sum_full').html(`$ ${Math.floor(sum24*days*100)/100}`);
        $('#sum_full2').html(`$ ${Math.floor(sum242*days*100)/100}`);
    });

    $( "#calc_sum" ).keyup(function () {


        var str = this.value;

        var value =parseFloat(str.replace(/[^\d.]/g, ''));
        if (!value) value=0;
        $('#gram').html(`${Math.floor(value*100)/100}`);
        var perc = parseInt($( "#plans" ).val());
        perc +=1;
        var days=0;
        var addp=0;
        switch (perc){
            case 2:
                days=9;
                addp=2;
                break;
            case 3:
                days=18;
                addp=1.5;
                break;
            case 4:
                days=32;
                addp=1;
                break;
        }
        $('#period').html(days);
        var sum24=value*perc/100;
        sum24=sum24.toFixed(2);
        var sum242=value*(perc+addp)/100;
        sum242=sum242.toFixed(2);
        $('#sum24').html(`$ ${sum24}`);
        $('#sum242').html(`$ ${sum242}`);
        $('#sum_full').html(`$ ${Math.floor(sum24*days*100)/100}`);
        $('#sum_full2').html(`$ ${Math.floor(sum242*days*100)/100}`);
    });

    $('input[type=radio][name=contract]').change(function() {
        $('#plans').val(this.value); // Select the option with a value of '1'
        $('#plans').trigger('change');

        var value = $('.ui-state-default').data().value;
        //console.log(value);
        var perc = parseInt(this.value);
        perc +=1;
        var days=0;
        var addp=0;
        switch (perc){
            case 2:
                days=9;
                addp=2;
                break;
            case 3:
                days=18;
                addp=1.5;
                break;
            case 4:
                days=32;
                addp=1;
                break;
        }
        var sum24=value*perc/100;
        sum24=sum24.toFixed(2);
        var sum242=value*(perc+addp)/100;
        sum242=sum242.toFixed(2);
        $('#period').html(days);
        $('#sum24').html(`$ ${sum24}`);
        $('#sum242').html(`$ ${sum242}`);
        $('#sum_full').html(`$ ${Math.floor(sum24*days*100)/100}`);
        $('#sum_full2').html(`$ ${Math.floor(sum242*days*100)/100}`);
    });

});


