import $ from 'jquery'
import 'slick-carousel'
import 'magnific-popup'
import AOS from 'aos'
import LazyLoad from 'vanilla-lazyload'
import SmoothScroll from './jq-components/smoothScroll'

$(function () {
    var lazyLoadInstance = new LazyLoad({elements_selector: '.lazy'})
    if (lazyLoadInstance) {
        lazyLoadInstance.update()
        AOS.refresh()
    }

    document.querySelectorAll('img').forEach((img) => img.addEventListener('load', () => AOS.refresh()))

    document.querySelectorAll('source').forEach((source) => source.addEventListener('load', () => AOS.refresh()))

    if ($('.header').length) {
        var navHeader = $('.header'),
            burgerMenu = navHeader.find('.burger-menu'),
            navMenuListWrapper = $('.header__mobileArea'),
            navMenuListDropdown = $()
        burgerMenu.on('click', function () {
            $(this).toggleClass('open')
            $(navHeader).toggleClass('open')
            $('body').toggleClass('is-open')
            navMenuListWrapper.slideToggle(300)
        })
        $('.dropdown-plus').on('click', function () {
            $(this).prev('ul').slideToggle(300)
            $(this).toggleClass('dropdown-open')
        })
    }
})

// Hide Page Loader when DOM and images are ready
$(window).on('load', () => $('.pageloader').removeClass('is-active'))

$(window).scroll(function () {
    if ($(this).scrollTop() > 100) {
        $('.header').addClass('smaller')
    } else {
        $('.header').removeClass('smaller')
    }
})


if (document.cookie.indexOf("accepted_cookies=") < 0) {
    $(".cookie-banner").delay(1000).fadeIn();
}

$('.close').click(function (e) {
    document.cookie = "accepted_cookies=yes;"
    $('.cookie-banner').fadeOut();
});


// cookie policy


$("#ToTop").click(function () {
    $("body, html").animate({
        scrollTop: 0
    }, 800);
    return false;
});

$(window).on('load', () => $('.pageloader').removeClass('is-active'))
$(window).on('load', () => $('body').removeClass('is-loading'))

$('.js-realizacje').slick({
    autoplay: true,
    autoplaySpeed: 2000,
    centerMode: true,
    centerPadding: '10%',
    arrows: false,
    slidesToShow: 2
})

$('.js-referencje').slick({
    autoplay: true,
    autoplaySpeed: 2000,
    arrows: true,
    slidesToShow: 1,
    adaptiveHeight: true,
    nextArrow: $('.referencje__next')
})


AOS.init({once: true})

$('.gallery').each(function () { // the containers for all your galleries
    $(this).magnificPopup({
        delegate: 'a', // the selector for gallery item
        type: 'image',
        gallery: {
            enabled: true
        }
    })
})

// jQuery-based initialisations
$(() => {
    new SmoothScroll()
})
