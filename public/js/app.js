$(document).ready(function () {
    // let sr = ScrollReveal();
    // sr.reveal('#top-line', {duration:1500});
    // sr.reveal('#top-image', {duration:2000});
    // sr.reveal('.container, footer', {duration:2500});

    $.mask.definitions['n'] = "[7-8]";
    $('input[name=phone]').mask("+n(999)999-99-99");

    $('#hamburger').click(function () {
        $(this).toggleClass('rotate');
        const floatMenu = $('#float-menu');
        let floatMenuPos = parseInt(floatMenu.css('top'));
        if (floatMenuPos < 0) floatMenu.animate({'top':0},'slow');
        else floatMenu.animate({'top':-700},'slow');
    });

    bindFancybox();
    // windowScroll();

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

    // Consulting block clock or over
    $('.consulting-block').bind('mouseover', function () {
        consultingBlockOver($(this), true);
    }).bind('mouseleave', function () {
        consultingBlockOver($(this), false);
    }).bind('click', function () {
        consultingBlockOver($(this), !parseInt($(this).attr('slideIn')));
    });

    // Team carousel
    $('#our-team').owlCarousel(owlSettings(
        20,
        5000,
        {
            0: {
                items: 1
            },
            992: {
                items: 3
            }
        }
    ));

    // Projects carousel
    $('.projects').owlCarousel(owlSettings(
        20,
        5000,
        {
            0: {
                items: 1
            },
            992: {
                items: 3
            }
        }
    ));

    // Click to project type button
    $('button.project-type').click(function () {
        if (!$(this).hasClass('active')) {
            let projectsId = $(this).attr('id').replace('button-project-type-',''),
                allProjects = $('#projects');

            $('.project-type.active').removeClass('active');
            $('#button-project-type-'+projectsId).addClass('active');

            if (allProjects.length) {
                allProjects.animate({'opacity':0}, 'fast', function () {
                    activatingProjectBlock(allProjects, projectsId, () => {
                        allProjects.remove();
                    });
                });
            } else {
                $('.projects.active').animate({'opacity':0}, 'fast', function () {
                    activatingProjectBlock($(this), projectsId);
                });
            }
        }
    });

    // $('#project-modal').modal('show');
});

const activatingProjectBlock = (prevActiveBlock, projectsId, callBack) => {
    prevActiveBlock.removeClass('active').addClass('d-none').css('opacity',1);
    let projects = $('#project-type-'+projectsId);
    projects.addClass('active').removeClass('d-none').css('opacity',0);
    setTimeout(() => {
        projects.animate({'opacity':1}, 'fast');
        if (callBack) callBack();
    }, 500);
};

const consultingBlockOver = (obj, over) => {
    let plate = obj.find('.plate');
    if (over) {
        plate.animate({'top':0},'fast',function () {
            obj.attr('animation',0);
            obj.attr('slideIn',1);
        });
    } else {
        plate.animate({'top':obj.height()},'fast',function () {
            obj.attr('animation',0);
            obj.attr('slideIn',0);
        });
    }
}

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

// const  windowScroll = () => {
//     $(window).scroll(function() {
//         let win = $(this);
//         if (win.scrollTop()) {
//             window.menuScrollFlag = true;
//             $('.section').each(function () {
//                 let scrollData = $(this).attr('data-scroll-destination');
//                 if ($(this).offset().top <= win.scrollTop() + 221 && scrollData) {
//                     resetColorHrefsMenu();
//                     $('a[data-scroll=' + scrollData + ']').parents('li.nav-item').addClass('active');
//                 }
//             });
//         } else {
//             resetColorHrefsMenu();
//             $('a[data-scroll=home]').parents('li.nav-item').addClass('active');
//         }
//     });
// }

const resetColorHrefsMenu = () => {
    $('li.nav-item').removeClass('active').blur();
}

const gotoScroll = (scroll) => {
    $('html,body').animate({
        scrollTop: $('div[data-scroll-destination="' + scroll + '"]').offset().top
    }, 500, function () {
        window.menuScrollFlag = false;
    });
}

const owlSettings = (margin, timeout, responsive) => {
    let navButtonBlack1 = '<img src="/images/arrow_left.svg" />',
        navButtonBlack2 = '<img src="/images/arrow_right.svg" />';
    return {
        margin: margin,
        loop: true,
        nav: true,
        autoplay: true,
        autoplayTimeout: timeout,
        dots: false,
        responsive: responsive,
        navText: [navButtonBlack1, navButtonBlack2]
    }
}
