$(document).ready(function () {
    // let sr = ScrollReveal();
    // sr.reveal('#top-line', {duration:1500});
    // sr.reveal('#top-image', {duration:2000});
    // sr.reveal('.container, footer', {duration:2500});

    $('#hamburger').click(function () {
        $(this).toggleClass('rotate');
        const floatMenu = $('#float-menu');
        let floatMenuPos = parseInt(floatMenu.css('top'));
        if (floatMenuPos < 0) floatMenu.animate({'top':0},'slow');
        else floatMenu.animate({'top':-700},'slow');
    });

    bindFancybox();
    windowScroll();

    window.menuScrollFlag = false;
    $('a[data-scroll], div[data-scroll]').click(function (e) {
        e.preventDefault();
        let self = $(this);
        if (!window.menuScrollFlag) {
            gotoScroll(self.attr('data-scroll'));
        }
    });

    if (window.scrollAnchor) {
        window.menuScrollFlag = true;
        gotoScroll(window.scrollAnchor);
    }
});

const bindFancybox = () => {
    // Fancybox init
    $('.fancybox').fancybox({
        'autoScale': true,
        'touch': false,
        'transitionIn': 'elastic',
        'transitionOut': 'elastic',
        'speedIn': 500,
        'speedOut': 300,
        'autoDimensions': true,
        'centerOnScroll': true
    });
}

const  windowScroll = () => {
    $(window).scroll(function() {
        let win = $(this);
        if (win.scrollTop()) {
            window.menuScrollFlag = true;
            $('.section').each(function () {
                let scrollData = $(this).attr('data-scroll-destination');
                if ($(this).offset().top <= win.scrollTop() + 221 && scrollData) {
                    resetColorHrefsMenu();
                    $('a[data-scroll=' + scrollData + ']').parents('li.nav-item').addClass('active');
                }
            });
        } else {
            resetColorHrefsMenu();
            $('a[data-scroll=home]').parents('li.nav-item').addClass('active');
        }
    });
}

const resetColorHrefsMenu = () => {
    $('li.nav-item').removeClass('active').blur();
}

const gotoScroll = (scroll) => {
    $('html,body').animate({
        scrollTop: $('div[data-scroll-destination="' + scroll + '"]').offset().top - 221
    }, 1500, function () {
        window.menuScrollFlag = false;
    });
}

const owlSettings = (margin, nav, timeout, responsive, autoplay) => {
    let navButtonBlack1 = '<img src="/images/arrow_left.svg" />',
        navButtonBlack2 = '<img src="/images/arrow_right.svg" />';
    return {
        margin: margin,
        loop: autoplay,
        nav: nav,
        autoplay: autoplay,
        autoplayTimeout: timeout,
        dots: false,
        responsive: responsive,
        navText: [navButtonBlack1, navButtonBlack2]
    }
}
