(function ($) {
    // Menu-mobile
    $('#touch-menu').click(function () {
        $('body').addClass('active-menu');
    });
    $('.line-dark').click(function () {
        $('body').removeClass('active-menu');
    });
    $('#close-menu').click(function () {
        $('body').removeClass('active-menu');
    });
    $('#menu-mobile .menu li.menu-item-has-children> a').after(
        '<svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M201.4 342.6c12.5 12.5 32.8 12.5 45.3 0l160-160c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L224 274.7 86.6 137.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l160 160z"/></svg>'
    );
    $('#menu-mobile .menu li.menu-item-has-children > svg').on(
        'click',
        function (e) {
            e.preventDefault();

            var $li = $(this).parent('li');
            var $submenu = $li.children('ul');

            var $siblings = $li.siblings('li.menu-item-has-children');
            $siblings
                .removeClass('re-arrow')
                .children('ul')
                .stop(true, true)
                .slideUp(300);

            $submenu.stop(true, true).slideToggle(300);
            $li.toggleClass('re-arrow');
        }
    );
    // Select2
    $('.wpcf7 select').select2({});
    // Back-top
    $('#back-top').hide();
    $(function () {
        $(window).scroll(function () {
            if ($(this).scrollTop() > 500) {
                $('#back-top').fadeIn();
            } else {
                $('#back-top').fadeOut();
            }
        });
        $('#back-top').click(function () {
            $('body,html').animate(
                {
                    scrollTop: 0,
                },
                800
            );
            return false;
        });
    });
    // Head
    var navfixed = $('.head');
    $(window).scroll(function () {
        if ($(this).scrollTop() > 10) {
            navfixed.addClass('navbar-fixed-top');
        } else {
            navfixed.removeClass('navbar-fixed-top');
        }
    });
    // Ajax Contact-form7
    $('.wpcf7-submit').click(function () {
        var thisElement = $(this);
        var oldVal = thisElement.val();
        var textLoading = 'Đang xử lý ...';
        $('.cf7_submit .ajax-loader').remove();
        thisElement.val(textLoading);
        document.addEventListener(
            'wpcf7submit',
            function (event) {
                thisElement.val(oldVal);
            },
            false
        );
    });
    // Add-class
    $('table').addClass('table table-bordered');
    $('table').wrap('<div class="table-responsive"></div>');
    $('.link-move').click(function (a) {
        var i = this.getAttribute('href');
        if ('' != i) {
            var t = $(i).offset().top - 67;
            $(window).width() <= 1190 && (t += 7),
                $('html, body').animate(
                    {
                        scrollTop: t,
                    },
                    500
                );
        }
    });
    // Lắng nghe sự kiện nhấp chuột vào tất cả các thẻ <a>
    document.addEventListener('click', function (event) {
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
                        behavior: 'smooth',
                    });
                }
            }
        }
    });

    // Swiper
    var swiper = new Swiper('.swiper-banner', {
        loop: true,
        autoplay: {
            delay: 6000,
        },
        speed: 500,
    });

    // Swiper post image
    var swiper = new Swiper('.swiper-post-image', {
        loop: true,
        autoplay: {
            delay: 6000,
        },
        speed: 500,
        slidesPerView: 1,
        spaceBetween: 20,
        breakpoints: {
            1024: {
                slidesPerView: 2,
            },
            768: {
                slidesPerView: 1,
            },
        },
    });

    // Swiper services
    var swiper = new Swiper('.swiper-services', {
        loop: true,
        autoplay: {
            delay: 6000,
        },
        speed: 500,
        slidesPerView: 2,
        spaceBetween: 20,
        breakpoints: {
            1024: {
                slidesPerView: 5,
            },
            768: {
                slidesPerView: 3,
            },
            480: {
                slidesPerView: 2,
            },
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
    });

    // Swiper about us
    var swiper = new Swiper('.swiper-about-us', {
        loop: true,
        autoplay: {
            delay: 6000,
        },
        speed: 500,
    });

    // Swiper extend
    var swiper = new Swiper('.swiper-extend', {
        loop: true,
        autoplay: {
            delay: 6000,
        },
        speed: 500,
        slidesPerView: 1,
        spaceBetween: 20,
        breakpoints: {
            1024: {
                slidesPerView: 2,
            },
            768: {
                slidesPerView: 1,
            },
        },
    });

    // Swiper news
    var swiper = new Swiper('.swiper-news', {
        loop: true,
        autoplay: {
            delay: 6000,
        },
        speed: 500,
        slidesPerView: 1,
        spaceBetween: 20,
        breakpoints: {
            1024: {
                slidesPerView: 3,
            },
            768: {
                slidesPerView: 2,
            },
            480: {
                slidesPerView: 1,
            },
        },
    });

    // Swiper step
    var swiper = new Swiper('.swiper-step', {
        spaceBetween: 0,
        breakpoints: {
            1024: {
                slidesPerView: 5,
            },
            768: {
                slidesPerView: 3,
            },
            480: {
                slidesPerView: 1,
            },
        },
    });

    //overview run value
    $(window).scroll(testScroll);
    var viewed = false;
    
    function isScrolledIntoView(elem) {
        if (!elem || !elem.length) {
            return false;
        }
        
        var docViewTop = $(window).scrollTop();
        var docViewBottom = docViewTop + $(window).height();
        var elemOffset = $(elem).offset();
        
        if (!elemOffset) {
            return false;
        }
        
        var elemTop = elemOffset.top;
        var elemBottom = elemTop + $(elem).height();
        return elemBottom <= docViewBottom && elemTop >= docViewTop;
    }
    
    function testScroll() {
        var $overview = $('.overview');
        if ($overview.length && isScrolledIntoView($overview) && !viewed) {
            viewed = true;
            $overview.find('.value span').each(function () {
                var $this = $(this);
                var targetValue = parseInt($this.text());
                
                if (!isNaN(targetValue)) {
                    $this
                        .prop('Counter', 0)
                        .animate(
                            { Counter: targetValue },
                            {
                                duration: 4000,
                                easing: 'swing',
                                step: function (now) {
                                    $this.text(Math.ceil(now));
                                },
                            }
                        );
                }
            });
        }
    }

    // Before/After Slider
    console.log('Before/After slider found:', $('.before-after-slider').length);
    
    $('.before-after-slider').each(function() {
        var isDragging = false;
        var slider = $(this);
        var handle = slider.find('.before-after-handle');
        var afterImage = slider.find('.after-image');
        var sliderWidth = slider.width();

        function updateSlider(x) {
            var percentage = (x / sliderWidth) * 100;
            percentage = Math.max(0, Math.min(100, percentage));
            
            // Sử dụng clip-path để che phủ hình after
            afterImage.css('clip-path', 'inset(0 ' + (100 - percentage) + '% 0 0)');
            handle.css('left', percentage + '%');
        }

        // Mouse events
        handle.on('mousedown', function(e) {
            isDragging = true;
            e.preventDefault();
            e.stopPropagation();
        });

        $(document).on('mousemove', function(e) {
            if (!isDragging) return;
            
            var sliderOffset = slider.offset().left;
            var x = e.pageX - sliderOffset;
            updateSlider(x);
        });

        $(document).on('mouseup', function() {
            isDragging = false;
        });

        // Touch events for mobile
        handle.on('touchstart', function(e) {
            isDragging = true;
            e.preventDefault();
            e.stopPropagation();
        });

        $(document).on('touchmove', function(e) {
            if (!isDragging) return;
            
            var sliderOffset = slider.offset().left;
            var x = e.originalEvent.touches[0].pageX - sliderOffset;
            updateSlider(x);
        });

        $(document).on('touchend', function() {
            isDragging = false;
        });

        // Click to move
        slider.on('click', function(e) {
            if (isDragging) return;
            
            var sliderOffset = slider.offset().left;
            var x = e.pageX - sliderOffset;
            updateSlider(x);
        });
    });

    // Video modal functionality
    $(document).off('click', '.video-thumbnail').on('click', '.video-thumbnail', function() {
        var videoUrl = $(this).data('video');
        console.log('Opening video:', videoUrl); // Debug log
        
        // Clear previous video first
        $('#videoModal iframe').attr('src', '');
        
        // Small delay to ensure iframe is cleared
        setTimeout(function() {
            // Set new video URL
            $('#videoModal iframe').attr('src', videoUrl);
            
            // Show modal
            $('#videoModal').modal('show');
        }, 100);
    });
    
    // Clear video when modal is hidden
    $('#videoModal').on('hidden.bs.modal', function () {
        console.log('Modal hidden, clearing video'); // Debug log
        var iframe = $('#videoModal iframe');
        iframe.attr('src', '');
        iframe.removeAttr('src'); // Completely remove src attribute
    });
    
    // Clear video when modal starts hiding
    $('#videoModal').on('hide.bs.modal', function () {
        console.log('Modal hiding, clearing video'); // Debug log
        var iframe = $('#videoModal iframe');
        iframe.attr('src', '');
        iframe.removeAttr('src'); // Completely remove src attribute
    });
    
    // Close button click
    $('.btn-close').on('click', function() {
        console.log('Close button clicked'); // Debug log
        $('#videoModal iframe').attr('src', '');
    });
    
    // Prevent modal close when clicking on video content
    $('.modal-content').on('click', function(e) {
        e.stopPropagation();
    });
    
    // ESC key close
    $(document).on('keydown', function(e) {
        if (e.keyCode === 27) { // ESC key
            $('#videoModal iframe').attr('src', '');
        }
    });

    // Menu fix functionality
    $(window).scroll(function () {
        var scrollTop = $(window).scrollTop();
        
        if (scrollTop >= 44.5) {
            $('.header-main').addClass('menu-fix');
            $('.menu_mobi').addClass('menu-fix');
        } else {
            $('.header-main').removeClass('menu-fix');
            $('.menu_mobi').removeClass('menu-fix');
        }

        // Header mobile
        if (scrollTop >= 35.25) {
            $('.header-mobile').addClass('menu-fix');
        } else {
            $('.header-mobile').removeClass('menu-fix');
        }
    });
    
    // Initialize menu fix on page load
    $(document).ready(function() {
        var scrollTop = $(window).scrollTop();
        
        if (scrollTop >= 44.5) {
            $('.header-main').addClass('menu-fix');
            $('.menu_mobi').addClass('menu-fix');
        } else {
            $('.header-main').removeClass('menu-fix');
            $('.menu_mobi').removeClass('menu-fix');
        }
    });

    // Initialize Fancybox for album gallery
    $('[data-fancybox="album-gallery"]').fancybox({
        buttons: [
            "slideShow",
            "thumbs",
            "close"
        ],
        loop: true,
        protect: true,
        animationEffect: "fade",
        transitionEffect: "slide",
        thumbs: {
            autoStart: true
        },
        slideShow: {
            autoStart: false,
            speed: 3000
        }
    });
    
})(jQuery);
