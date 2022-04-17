(function($) {
    "use strict";
    function update_chart() {
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
                    yAlign: 'bottom'
                },
            }
        });
    }
    $('.refer-count ').on("click","a", function(e){
        e.preventDefault();
        var hotel_id = $(this).data('click');
        theme_ajax_params.hotel_page = hotel_id;

        $.ajax({
            url : theme_ajax_params.ajaxurl, // AJAX handler
            data : {
                'action': 'accom_clicks_ajax_handler', // the parameter for admin-ajax.php
                'hotel_page' : theme_ajax_params.hotel_page,
            },
            type : 'POST',

        });


        var t               = $(this),
            URL             = encodeURI(t.attr('href'));
        $('<a href="'+ URL +'" target="_blank">External Link</a>')[0].click();

        return false;
    });

    $('.dropdown-row .custom-option').on("click", function(){
        var new_year = $(this).data('year');
        var new_month = $(this).data('month');
        var pid = $('.analytics-title').data('pid');
        var monthLong = $(this).data('monthlong');
        theme_ajax_params.new_year = new_year;
        theme_ajax_params.new_month = new_month;
        theme_ajax_params.pid = pid;
        theme_ajax_params.monthLong = monthLong;

        $.ajax({
            url : theme_ajax_params.ajaxurl, // AJAX handler
            data : {
                'action': 'accom_update_chart_ajax_handler', // the parameter for admin-ajax.php
                'new_year' : theme_ajax_params.new_year,
                'new_month' : theme_ajax_params.new_month,
                'monthLong' : theme_ajax_params.monthLong,
                'pid' : theme_ajax_params.pid
            },
            type : 'POST',
            success : function( data ){
                if( data ) {
                    var $content = $(data);
                    $('.charts-row').html( $content );
                    const select = document.querySelector('.custom-select');
                    select.classList.remove('open');
                    update_chart();
                }
            }

        });

        return false;
    });

    $(document).ready(function(){

        if ( $('.single-accom_hotel').length  ) {
            var hotel_id = $('.single-accom-container').data('id');
            var single_hotel_cookie = 'hotel' + hotel_id;
            var cookieValue = escape(Cookies.get(single_hotel_cookie));
            var cookieFlag = "unvisited";
            if (cookieValue === "undefined"){
                Cookies.set(single_hotel_cookie, 'visited', { expires: 30 })
            }
            else {
                cookieFlag = "visited";
            }

            theme_ajax_params.hotel_page = hotel_id;
            theme_ajax_params.cookieFlag = cookieFlag;

            $.ajax({
                url : theme_ajax_params.ajaxurl, // AJAX handler
                data : {
                    'action': 'accom_analytics_ajax_handler', // the parameter for admin-ajax.php
                    'hotel_page' : theme_ajax_params.hotel_page,
                    'cookieFlag' : theme_ajax_params.cookieFlag
                },
                type : 'POST',

            });
            return false;
        }

    });

})(jQuery);