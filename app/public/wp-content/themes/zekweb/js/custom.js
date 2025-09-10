(function($) {
// Menu-mobile
$('#touch-menu').click(function() {
$('body').addClass('active-menu');
});
$('.line-dark').click(function() {
$('body').removeClass('active-menu');
});
$('#close-menu').click(function() {
$('body').removeClass('active-menu');
});
$("#menu-mobile .menu li.menu-item-has-children> a").after('<svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M201.4 342.6c12.5 12.5 32.8 12.5 45.3 0l160-160c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L224 274.7 86.6 137.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l160 160z"/></svg>');
$('#menu-mobile .menu li.menu-item-has-children > svg').on('click', function(e) {
    e.preventDefault();

    var $li = $(this).parent('li');       
    var $submenu = $li.children('ul');     

    
    var $siblings = $li.siblings('li.menu-item-has-children');
    $siblings.removeClass('re-arrow')       
             .children('ul')               
             .stop(true, true)             
             .slideUp(300);                

    
    $submenu.stop(true, true).slideToggle(300);
    $li.toggleClass('re-arrow');
  });
// Select2
$('.wpcf7 select').select2({});
// Back-top
$("#back-top").hide();
$(function () {
$(window).scroll(function () {
if ($(this).scrollTop() > 500) {
$('#back-top').fadeIn();
} else {
$('#back-top').fadeOut();
}
});
$('#back-top').click(function () {
$('body,html').animate({
scrollTop: 0
}, 800);
return false;
});
});
// Head
var navfixed = $(".head");
$(window).scroll(function () {
    if ($(this).scrollTop() > 10) {
        navfixed.addClass("navbar-fixed-top");
    } else {
        navfixed.removeClass("navbar-fixed-top");
    }
});
// Ajax Contact-form7
$('.wpcf7-submit').click(function () {
var thisElement = $(this);
var oldVal = thisElement.val();
var textLoading = 'Đang xử lý ...';
$('.cf7_submit .ajax-loader').remove();
thisElement.val(textLoading);
document.addEventListener('wpcf7submit', function (event) {
thisElement.val(oldVal);
}, false);
});
// Add-class
$('table').addClass('table table-bordered');
$('table').wrap('<div class="table-responsive"></div>');
$(".link-move").click(function(a) {
var i = this.getAttribute("href");
if ("" != i) {
var t = $(i).offset().top - 67;
$(window).width() <= 1190 && (t += 7), $("html, body").animate({
scrollTop: t
}, 500)
}
});
// Lắng nghe sự kiện nhấp chuột vào tất cả các thẻ <a>
document.addEventListener('click', function(event) {
// Kiểm tra xem phần tử mà người dùng nhấp chuột có phải là thẻ <a> không
if (event.target.tagName === 'A') {
// Kiểm tra href có cấu trúc "#"
if (event.target.getAttribute('href').startsWith('#')) {
// Ngăn chặn hành vi mặc định khi nhấp vào liên kết
event.preventDefault();
// Lấy id từ href của liên kết
var targetId = event.target.getAttribute('href').slice(1);
// Tìm phần tử có id tương ứng và cuộn đến nó
var targetElement = document.getElementById(targetId);
if (targetElement) {
targetElement.scrollIntoView({
    behavior: 'smooth'
});
}
}
}
});

// Swiper
var swiper = new Swiper(".swiper-banner", {
loop: true,
autoplay: {
delay: 6000,
},
speed: 500,
pagination: {
el: ".banner-pagination",
clickable: true,
},
navigation: {
nextEl: ".banner-next",
prevEl: ".banner-prev",
},
breakpoints: {
  0: {
      slidesPerView: 1,
  },
  429: {
      slidesPerView: 1,
  },
  575: {
      slidesPerView: 1,
  },
  768: {
      slidesPerView: 1,
  },
  992: {
      slidesPerView: 1,
  }
},
});
//
})(jQuery);