(function($,sr){

    // debouncing function from John Hann
    // http://unscriptable.com/index.php/2009/03/20/debouncing-javascript-methods/
    var debounce = function (func, threshold, execAsap) {
        var timeout;
  
        return function debounced () {
            var obj = this, args = arguments;
            function delayed () {
                if (!execAsap)
                    func.apply(obj, args);
                timeout = null;
            };
  
            if (timeout)
                clearTimeout(timeout);
            else if (execAsap)
                func.apply(obj, args);
  
            timeout = setTimeout(delayed, threshold || 100);
        };
    }
    // smartresize 
    jQuery.fn[sr] = function(fn){  return fn ? this.bind('resize', debounce(fn)) : this.trigger(sr); };
  
  })(jQuery,'smartresize');

(function($) {
    var uniqueCntr = 0;
    $.fn.scrolled = function (waitTime, fn) {
        if (typeof waitTime === "function") {
            fn = waitTime;
            waitTime = 500;
        }
        var tag = "scrollTimer" + uniqueCntr++;
        this.scroll(function () {
            var self = $(this);
            var timer = self.data(tag);
            if (timer) {
                clearTimeout(timer);
            }
            timer = setTimeout(function () {
                self.removeData(tag);
                fn.call(self[0]);
            }, waitTime);
            self.data(tag, timer);
        });
    }
})(jQuery);

  
(function($) {
    "use strict";
	
	
    function theme_sliders() {
        
      var pencere = $(window).outerWidth();	 
     
  
        var drag = true;
        if ( pencere > 1279 ) {
           drag = false;
        }

        $('.single-hotel-slider').flickity({
            // options
            draggable: true,
            cellAlign: 'left',
            wrapAround: true,
            contain: true,
            prevNextButtons: true,
            pageDots: false,
            adaptiveHeight: false,
            autoPlay: false,
            hash: true,
            fade: true
        });
        $('.accom-featured').flickity({
            // options
            draggable: false,
            cellAlign: 'left',
            wrapAround: true,
            contain: true,
            prevNextButtons: true,
            pageDots: true,
            adaptiveHeight: false,
            setGallerySize: false,
            autoPlay: false,
            lazyLoad: 2,
            cellSelector: '.absolute-image-container'
        });

        
    }

    //
    // Open Close Slider
    //
    $('.open-gallery-link').on('click', function (){
        setTimeout(function(){
            $('.single-hotel-slider-modal').addClass('open-slider');
        }, 100);
    })
    $('.show-all-photos').on('click', function (){
        $('.single-hotel-slider-modal').addClass('open-slider');
    });
    $('.close-slider').on('click', function (){
        $('.single-hotel-slider-modal').removeClass('open-slider');
    });
    //
    // Open Close Mobile Menu
    //

    $('.mobile-menu-icon').on('click', function (){
        $('.mobile-header').show();
    });
    $('.mobile-header-gutter').on('click', function (){
        $('.mobile-header').hide();
    })

    //
    // Open Filter Modal
    //
    $('.filter-details').on('click', function (){
       $('.filter-modal-bg').show();
    });
    $('.close-filter-modal').on('click', function () {
        $('.filter-modal-bg').hide();
    })
    $(document).on('click', '.bookdirect, .about-note span', function (){
       $('.why-book-modal:not(.subscribe)').show();
    });
    $('.close-filter-modal').on('click', function () {
        $('.why-book-modal').hide();
    });
    $('.filter-icon').on('click', function() {
       $('.all-filters').toggleClass('show-hide-filter');
    });
    $('.close-filter-sidebar').on('click', function() {
        $('.all-filters').removeClass('show-hide-filter');
    });
    //
    // Open Mailchimp
    //
    $('body').on('click', '.mobile-menu-mail, .header-mail-trigger', function() {
        $('.mobile-header').hide();
        $('.why-book-modal.subscribe').show();     
    });
  
    // Close All Windows ESC
    //
    $(document).on('keydown', function(event) {
        if (event.keyCode == 27) {
            $('.single-hotel-slider-modal').removeClass('open-slider');
            $('.filter-modal-bg').hide();
            $('.why-book-modal').hide();
            $('.mobile-header').hide();
        }
    });

    //
    // Home Search Input
    //
    function home_search() {

        $('.home').on('click', '.fcomplete-result', function() {
            setTimeout(function(){
                $(".fwp-submit").trigger("click");
            }, 100);
        });

    }
    function fwp_redirect() {
        FWP.parseFacets();
        FWP.setHash();
        var query = FWP.buildQueryString();
        window.location.href = 'https://www.accom.com/accommodation/?' + query;
    }
    // redirect on "enter" key press
    $('body').on('keyup', '.facetwp-autocomplete', function(e) {
        if(e.keyCode == '13') {
            fwp_redirect();
        }
    });
    //
    // Checking Disabled Rooms
    //
    $(document).on('click', '.filter-modal-content', function() {
        setTimeout(function(){
            if($('.filter-modal-content').find('.facetwp-checkbox.checked').length !== 0) {
                $('.filter-details.custom-checkbox').addClass('checked');
            }
            else {
                $('.filter-details.custom-checkbox').removeClass('checked');
            }
        }, 25);
    });
    $(document).on('click', '.reset-all-filters, .filter-clear-modal', function() {
        $('.filter-details.custom-checkbox').removeClass('checked');
    });
    //
    // Fix for VH
    //
    let vh = window.innerHeight * 0.01;
    document.documentElement.style.setProperty('--vh', `${vh}px`);


    //
    // Custom Select
    //
    if ( $('.custom-select-wrapper').length ) {
        document.querySelector('.custom-select-wrapper').addEventListener('click', function () {
            this.querySelector('.custom-select').classList.toggle('open');
        });
        for (const option of document.querySelectorAll(".custom-option")) {
            option.addEventListener('click', function () {
                if (!this.classList.contains('selected')) {
                    this.parentNode.querySelector('.custom-option.selected').classList.remove('selected');
                    this.classList.add('selected');
                    this.closest('.custom-select').querySelector('.custom-select__trigger span').textContent = this.textContent;
                }
            })
        }
        window.addEventListener('click', function (e) {
            const select = document.querySelector('.custom-select');
            if (!select.contains(e.target)) {
                select.classList.remove('open');
            }
        });
    }
    //
    // Custom Select Account Page
    //
    $('#mepr-account-nav').on('click', function () {
        if ( $(window).width() < 720 ) {
            $(this).toggleClass('aktif');
        }
    });
    //
    // Chart JS
    //
    function first_chart() {
        var dataset = $('.val-for-impression').data('chart');
        var labels = $('.val-for-impression').data('label');

        var ctx = document.getElementById("chart-impression").getContext('2d');

        var gradient = ctx.createLinearGradient(0, 0, 0, 400);
        gradient.addColorStop(0, 'rgba(255, 51, 236, 0.3)');
        gradient.addColorStop(.58, 'rgba(102, 102, 255, 0.3)');
        gradient.addColorStop(.94, 'rgba(77, 77, 255, 0.3)');
        gradient.addColorStop(1, 'rgba(51, 51, 255, 0.3)');

        var gradienthover = ctx.createLinearGradient(0, 0, 0, 400);
        gradienthover.addColorStop(0, 'rgba(255, 51, 236, 1)');
        gradienthover.addColorStop(.58, 'rgba(102, 102, 255, 1)');
        gradienthover.addColorStop(.94, 'rgba(77, 77, 255, 1)');
        gradienthover.addColorStop(1, 'rgba(51, 51, 255, 1)');

        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [
                    {
                        label: '',
                        data: dataset,
                        backgroundColor: gradient,
                        hoverBackgroundColor: gradienthover,
                        borderRadius: 4,
                        barThickness: 16,
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    x: {
                        display: false
                    },
                    y: {
                        ticks: {
                            autoSkip: true,
                            maxTicksLimit: 4
                        }
                    }

                },
                tooltips: {
                    xAlign: 'center',
                    yAlign: 'center'
                },
                plugins:{
                    legend: {
                        display: false
                    },
                }
            }
        });
    }
    if( $('.chart-impression').length ) {
        first_chart();
    }

    $(document).on('click', '.chart-tab-value', function(chart) {
        $('.chart-title').removeClass('aktif');
        $(this).parents('.chart-title').addClass('aktif');
        $('#chart-impression').remove(); // this is my <canvas> element
        $('.chart-impression').append('<canvas id="chart-impression"><canvas>');
        setTimeout(function () {
            $('.accom-featured').flickity({
                // options
                draggable: false,
                cellAlign: 'left',
                wrapAround: true,
                contain: true,
                prevNextButtons: true,
                pageDots: true,
                adaptiveHeight: false,
                setGallerySize: false,
                autoPlay: false,
                lazyLoad: 2,
                cellSelector: '.absolute-image-container'
            });
        }, 100);
        var dataset = $(this).data('chart');
        var labels = $(this).data('label');

        var ctx = document.getElementById("chart-impression").getContext('2d');

        var gradient = ctx.createLinearGradient(0, 0, 0, 400);
        gradient.addColorStop(0, 'rgba(255, 51, 236, 0.3)');
        gradient.addColorStop(.58, 'rgba(102, 102, 255, 0.3)');
        gradient.addColorStop(.94, 'rgba(77, 77, 255, 0.3)');
        gradient.addColorStop(1, 'rgba(51, 51, 255, 0.3)');

        var gradienthover = ctx.createLinearGradient(0, 0, 0, 400);
        gradienthover.addColorStop(0, 'rgba(255, 51, 236, 1)');
        gradienthover.addColorStop(.58, 'rgba(102, 102, 255, 1)');
        gradienthover.addColorStop(.94, 'rgba(77, 77, 255, 1)');
        gradienthover.addColorStop(1, 'rgba(51, 51, 255, 1)');

        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [
                    {
                        label: '',
                        data: dataset,
                        backgroundColor: gradient,
                        hoverBackgroundColor: gradienthover,
                        borderRadius: 4,
                        barThickness: 16,
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    x: {
                        display: false
                    },
                    y: {
                        ticks: {
                            autoSkip: true,
                            maxTicksLimit: 4
                        }
                    }

                },
                tooltips: {
                    xAlign: 'center',
                    yAlign: 'bottom'
                },
                plugins:{
                    legend: {
                        display: false
                    },
                }
            }
        });
    });
    //
    // Load Function
    //
    $( window ).load(function() {
    });    
    //
    // Document Ready
    $(document).ready(function(){
        theme_sliders();
        home_search();
    });
    $(window).smartresize(function(){
        $('.single-hotel-slider').flickity('destroy');
        $('.accom-featured').flickity('destroy');
        let vh = window.innerHeight * 0.01;
        document.documentElement.style.setProperty('--vh', `${vh}px`);
        theme_sliders();

    });



    if ( $('.all-accoms-list').length && $('.loads-accoms').length ) {
        $(window).scrolled(function () {
            var blogBottom = $('.loader-location').scrollTop() - 50;
            var ScrollTop = $(window).scrollTop();
            if ( ScrollTop > blogBottom ) {

                $('.lds-spinner').css( "display", "flex" );

                $(".facetwp-load-more:not(.facetwp-hidden)").trigger("click");

            }

            if ($('.facetwp-load-more.facetwp-hidden').length) {
                $('.lds-spinner').css('display', 'none');
                $('.all-accoms-list').removeClass('loads-accoms');
            }
        });
    }
    // lazy load to DOMNodeInserted event
    $(document).bind('DOMNodeInserted', function (e) {
        setTimeout(function () {
            $('.accom-featured').flickity({
                // options
                draggable: false,
                cellAlign: 'left',
                wrapAround: true,
                contain: true,
                prevNextButtons: true,
                pageDots: true,
                adaptiveHeight: false,
                setGallerySize: false,
                autoPlay: false,
                lazyLoad: 2,
                cellSelector: '.absolute-image-container'
            });
        }, 100);
    });



    // end
})(jQuery);
