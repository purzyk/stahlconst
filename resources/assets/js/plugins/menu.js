(function ($) {
  $.fn.dropdowns = function (options) {
    let width = 0;

    function updateWindowSize() {
      if (document.body && document.body.offsetWidth) {
        width = document.body.offsetWidth;
      }
      if (
        document.compatMode == 'CSS1Compat'
        && document.documentElement
        && document.documentElement.offsetWidth
      ) {
        width = document.documentElement.offsetWidth;
      }
      if (window.innerWidth) {
        width = window.innerWidth;
      }
    }
    const defaults = {
      toggleWidth: 767,
    };

    var options = $.extend(defaults, options);
    updateWindowSize();
    let ww = width;

    const addParents = function () {
      $('.c_main_nav-menu li a').each(function () {
        if ($(this).next().length > 0) {
          $(this).addClass('parent');
        }
      });
    };

    const adjustMenu = function () {
      if (ww < options.toggleWidth) {
        $('.toggleMenu').css('display', 'inline-block');
        if (!$('.toggleMenu').hasClass('active')) {
          $('.c_main_nav-menu').hide();
        } else {
          $('.c_main_nav-menu').show();
        }
        $('.c_main_nav-menu li').unbind('mouseenter mouseleave');
        $('.c_main_nav-menu li a.parent')
          .unbind('click')
          .bind('click', function (e) {
            // must be attached to anchor element to prevent bubbling
            e.preventDefault();
            $(this)
              .parent('li')
              .toggleClass('hover');
          });
      } else if (ww >= options.toggleWidth) {
        $('.toggleMenu').css('display', 'none');
        $('.c_main_nav-menu').show();
        $('.c_main_nav-menu li').removeClass('hover');
        $('.c_main_nav-menu li a').unbind('click');
        $('.c_main_nav-menu li')
          .unbind('mouseenter mouseleave')
          .bind('mouseenter mouseleave', function () {
            // must be attached to li so that mouseleave is not triggered when hover over submenu
            $(this).toggleClass('hover');
          });
      }
    };

    return this.each(() => {
      $('.toggleMenu').click(function (e) {
        e.preventDefault();
        $(this).toggleClass('active');
        $(this)
          .next('.c_main_nav-menu')
          .toggle();
        adjustMenu();
      });
      adjustMenu();
      addParents();
      $(window).bind('resize orientationchange', () => {
        updateWindowSize();
        ww = width;
        adjustMenu();
      });
    });
  };
}(jQuery));
