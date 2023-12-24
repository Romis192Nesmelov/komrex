$(document).ready(function () {
    new WOW().init();

    $.mask.definitions['n'] = "[7-8]";
    $('input[name=phone]').mask("+n(999)999-99-99");

    $('#hamburger').click(function () {
        $(this).toggleClass('rotate');
        const floatMenu = $('#float-menu');
        let floatMenuPos = parseInt(floatMenu.css('top'));
        if (floatMenuPos < 0) floatMenu.animate({'top':0},'slow');
        else floatMenu.animate({'top':-700},'slow');
    });

    window.menuScrollFlag = false;
    $('a[data-scroll], div[data-scroll], button[data-scroll]').click(function (e) {
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
    const consultingBlock = $('.consulting-block');
    consultingBlock.bind('mouseover', function () {
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
        },
        true
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
        },
        true
    ));

    // Reviews carousel
    $('.reviews').owlCarousel(owlSettings(
        20,
        5000,
        {
            0: {
                items: 1
            },
            992: {
                items: 4
            }
        },
        true
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

    // Click to project
    $('.project').click(function () {
        let id = parseInt($(this).attr('id').replace('project',''));
        $.get(getProjectUrl, {
            'id': id
        },(data) => {
            let modal = $('#project-modal'),
                head = modal.find('h2'),
                date = $('#date-presentation'),
                bigImage = $('#big-image'),
                smallImages = $('#small-images'),
                description = $('#description'),
                downloadBlock = modal.find('.download-block'),
                downloadHref = downloadBlock.find('a'),
                downloadSize = downloadBlock.find('span'),
                activeId = null;

            head.html(data.head);
            if (data.date) {
                head.removeClass('mb-2').addClass('mb-0');
                date.html(data.date);
                date.show();
            } else {
                head.removeClass('mb-0').addClass('mb-2');
                date.hide();
            }

            bigImage.html('');
            bigImage.append($('<img>').attr('src',data.images[0].image));
            description.html(data.text);

            if (data.pdf) {
                downloadHref.attr('href', data.pdf);
                downloadSize.html(data.size);
                downloadBlock.show();
            } else {
                downloadBlock.hide();
            }

            smallImages.html('');
            $.each(data.images, function (k, image) {
                smallImages.append($('<img>').attr('src','/' + image.image).addClass('image' + image.id));
            });

            smallImages.trigger('destroy.owl.carousel');
            owlCarouselSmallImages(smallImages);
            smallImages.find('.image' + activeId).addClass('active');

            setTimeout(() => {
                bingSmallImagesCarouselClick();
            },500);
            modal.modal('show');
        });
    });

    // Callback modal
    $('.phone-icon, .pair-buttons button, .consulting-button, .consulting-button-1, .consulting-button-2, .units-button, .footer-button').click(function () {
        const removingLeftClasses = [
            'btn btn-primary',
            'btn btn-secondary',
            'white',
            'withArrow',
            'me-lg-2',
            'mb-2',
            'mb-lg-0'
        ];
        let clearId = $(this).attr('class'),
            feedbackModal = $('#feedback-modal');

        $.each(removingLeftClasses, function (k, className) {
            clearId = clearId.replace(className,'');
        });
        clearId = clearId.trim();
        feedbackModal.find('input[name=from]').val(clearId);
        feedbackModal.modal('show');
    });

    // Events modal
    $('.consulting-button-3').click(() => {
        $('#event-modal').modal('show');
    });

    // Click to open sign-up fields
    $('.event-block .description').click(function () {
        let parent = $(this).parents('.event-block'),
            arrowImg = $(this).find('img'),
            rollUp = parent.find('.roll-up');

        if (!parseInt(rollUp.css('height'))) {
            arrowImg.attr('src','/images/corner_cir_to_up_yellow.svg');
            rollUp.animate({'height':96}, 'fast', function () {
                rollUp.css('height','auto');
            });
        } else {
            arrowImg.attr('src','/images/corner_cir_to_down_yellow.svg');
            rollUp.animate({'height':0}, 'fast')
        }
    });

    // Technic feedback modal
    const technicFeedbackModal = $('#technic-feedback-modal');
    $('button.technic-button').click(function () {
        let technicId = parseInt($(this).attr('id').replace('technic',''));
        technicFeedbackModal.find('input[name=id]').val(technicId);
        technicFeedbackModal.modal('show');
    });

    $('#technic-button').click(() => {
        technicFeedbackModal.modal('show');
    });

    // Unit feedback modal
    const unitFeedbackModal = $('#unit-feedback-modal');
    $('button.unit-button').click(function () {
        let technicId = parseInt($(this).attr('id').replace('unit',''));
        unitFeedbackModal.find('input[name=id]').val(technicId);
        unitFeedbackModal.modal('show');
    });

    // Open left menu
    $('.left-menu .dropdown-active').click(function () {
        const dropDownList = $('.dropdown-list');
        if (!parseInt(dropDownList.css('height'))) {
            let items = dropDownList.find('ul li:not(.active)').length;
            dropDownList.animate({'height':(items * 65)},'fast');
        } else {
            dropDownList.animate({'height':0},'fast');
        }
    });

    // Change view in Technics chapter
    $('.icons-view .icon').click(function () {
        if (!$(this).hasClass('active')) {
            $('.icons-view .icon.active').removeClass('active');
            $(this).addClass('active');

            $('.tech-block > div').toggleClass('col-lg-4 col-lg-12');
            $('.tech-block .image').toggleClass('col-lg-12 col-lg-3');
            $('.tech-block .content').toggleClass('col-lg-12 col-lg-9');
            $('.tech-block .content div').toggleClass('col-lg-12 col-lg-4');
            $('.tech-block button').toggleClass('m-auto');
        }
    });

    // Owl carousel for small images
    owlCarouselSmallImages($('#small-images'));
    // Click on small images on carousel images
    bingSmallImagesCarouselClick();

    // Click on technic-stuff buttons
    $('button.technic-stuff').click(function () {
        if (!$(this).hasClass('active')) {
            let stuffId = $(this).attr('id').replace('button-stuff-',''),
                newActiveContent = $('#stuff-content-' + stuffId),
                currentActiveContent = $('.stuff-content.active');

            $('button.technic-stuff.active').removeClass('active');
            $(this).addClass('active');
            currentActiveContent.animate({'opacity':0}, 'fast', function () {
                currentActiveContent.removeClass('active').addClass('d-none');
                newActiveContent.css('opacity',0).removeClass('d-none').addClass('active');
                newActiveContent.animate({'opacity':1}, 'fast');
            });
        }
    });

    // Cookie modal
    const cookieInfoModal = $('#cookie-info-modal');
    cookieInfoModal.find('button#agree_all').click(() => {
        cookieInfoModal.find('input[name=cookie1]').prop('checked', true);
        cookieInfoModal.find('input[name=cookie2]').prop('checked', true);
    });
    if (window.showCookieInfo) {
        setTimeout(() => {
            cookieInfoModal.modal('show');
        }, 1000);
    }

    // Custom accordion tracking
    $('.tracking-header.clickable').click(function () {
        if (!$(this).hasClass('open')) {
            let id = $(this).attr('id').replace('tracking-header-','');

            $(this).addClass('open');
            $(this).find('img').animate({'opacity':0}, 'fast', function () {
                $(this).attr('src','/images/arrow_up_yellow_simple.svg').removeClass('down').addClass('up');
                $(this).animate({'opacity':1});
            });

            $('#tracking-body-' + id).animate({'height':50,'margin-top':20}, 'fast', function () {
                $(this).addClass('open').css('height','auto');
            });
        }

        $('.tracking-header.open').removeClass('open');
        $('.tracking-header img.up').animate({'opacity':0}, 'fast', function () {
            $(this).attr('src','/images/arrow_down_yellow_simple.svg').removeClass('up').addClass('down');
            $(this).animate({'opacity':1});
        });
        $('.tracking-body.open').animate({'height':0,'margin-top':0}, 'fast', function () {
            $(this).removeClass('open');
        });
    });

    bindFancybox();
    bigTablesScroll();
    windowScroll();
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

const  windowScroll = () => {
    const onTopButton = $('#on-top-button');
    $(window).scroll(function() {
        let windowScroll = $(window).scrollTop();
        // let win = $(this);
        // if (win.scrollTop()) {
        //     window.menuScrollFlag = true;
        //     $('.section').each(function () {
        //         let scrollData = $(this).attr('data-scroll-destination');
        //         if ($(this).offset().top <= win.scrollTop() + 221 && scrollData) {
        //             resetColorHrefsMenu();
        //             $('a[data-scroll=' + scrollData + ']').parents('li.nav-item').addClass('active');
        //         }
        //     });
        // } else {
        //     resetColorHrefsMenu();
        //     $('a[data-scroll=home]').parents('li.nav-item').addClass('active');
        // }
        if (windowScroll > $(window).height()) {
            onTopButton.fadeIn();
        } else onTopButton.fadeOut();
    });
}

// const resetColorHrefsMenu = () => {
//     $('li.nav-item').removeClass('active').blur();
// }

const gotoScroll = (scroll) => {
    $('html,body').animate({
        scrollTop: $('div[data-scroll-destination="' + scroll + '"]').offset().top
    }, 500, function () {
        window.menuScrollFlag = false;
    });
}

const bingSmallImagesCarouselClick = () => {
    $('#small-images img').click(function () {
        if (!$(this).hasClass('active')) {
            const bigTechnicImage = $('#big-image > img');
            $('img.active').removeClass('active');
            let activeClassName = $(this).attr('class'),
                newBigImage = $(this).attr('src');
            $('.' + activeClassName).addClass('active');
            bigTechnicImage.animate({'opacity':0}, 'fast', function () {
                bigTechnicImage.attr('src',newBigImage);
                bigTechnicImage.animate({'opacity':1}, 'fast');
            });
        }
    });
}

const owlSettings = (margin, timeout, responsive, nav) => {
    let navButtonBlack1 = '<img src="/images/arrow_left.svg" />',
        navButtonBlack2 = '<img src="/images/arrow_right.svg" />';
    return {
        margin: margin,
        loop: true,
        nav: nav,
        autoplay: true,
        autoplayTimeout: timeout,
        dots: false,
        responsive: responsive,
        navText: [navButtonBlack1, navButtonBlack2]
    }
}

const owlCarouselSmallImages = (container) => {
    container.owlCarousel(owlSettings(
        10,
        5000,
        {
            0: {
                items: 2
            },
            700: {
                items: 5
            },
            992: {
                items: 6
            },
            1024: {
                items: 8
            }
        },
        true
    ));
}


const bigTablesScroll = () => {
    window.bigTable = $('.big-table-container');
    if (window.bigTable.length && $(window).width() <= 1024) {
        window.bigTable.mCustomScrollbar({
            axis: 'x',
            theme: 'light-3',
            alwaysShowScrollbar: 2,
            advanced: {
                autoExpandHorizontalScroll: true
            }
        });

        $(window).scroll(function () {
            let offset = window.pageYOffset - bigTable.offset().top;
            offset = offset < 0 ? 0 : offset;
            $('.mCSB_scrollTools.mCSB_scrollTools_horizontal').css('top',offset);
        });
    } else if (window.bigTable) {
        window.bigTable.mCustomScrollbar('destroy');
    }
}
