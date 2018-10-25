$(document).ready(function () {
    $('[number]').keypress(function () {
        a = window.event;
        charCode = (a.which) ? a.which : a.keyCode;
        if (charCode > 47 && charCode < 58) {
            return true;
        }
        return false;
    });
    $('[currency]').keyup(function () {
        $(this).val(accounting.formatMoney($(this).val(), "", 0));
    });
    $('[pickerdate').attr("readonly", "readonly");
    $('[pickerdate').datepicker({
        autoclose: true,
        todayBtn: "linked",
        format: 'yyyy/mm/dd'
    });
    var RGBChange = function () {
        $('#RGB').css('background', 'rgb(' + r.getValue() + ',' + g.getValue() + ',' + b.getValue() + ')')
    };
    $.scrollUp({
        scrollName: 'scrollUp', // Element ID
        scrollDistance: 300, // Distance from top/bottom before showing element (px)
        scrollFrom: 'top', // 'top' or 'bottom'
        scrollSpeed: 300, // Speed back to top (ms)
        easingType: 'linear', // Scroll to top easing (see http://easings.net/)
        animation: 'fade', // Fade, slide, none
        animationSpeed: 200, // Animation in speed (ms)
        scrollTrigger: false, // Set a custom triggering element. Can be an HTML string or jQuery object
        //scrollTarget: false, // Set a custom target element for scrolling to the top
        scrollText: '<i class="fa fa-angle-up"></i>', // Text for element, can contain HTML
        scrollTitle: false, // Set a custom <a> title if required.
        scrollImg: false, // Set true to use image
        activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
        zIndex: 2147483647 // Z-Index for the overlay
    });
    /*
     $('.show-modal').click(function () {
     $($(this).attr('modal')).css({'z-index': '1500'}).animate({opacity: '1'}, 1000);
     });*/

    $('body').on('click', '.modal-close', function () {
        //alert(111);
        $('#' + $(this).closest('.modal-maincontainer').attr('id')).css({'z-index': '-90'}).animate({opacity: '0'}, 100);
    });

    $('body').on('click', '.alert-close', function () {
        $('.alert').hide(1000);
    });
    $('body').on('click', '.link', function () {
        showloadingscreen(1);
    });
});
/**
 * 
 * @param {int} time (500) animation
 * @returns {div} lading screen show
 */

function showloadingscreen(time = 500)
{
    $('#loading-screen').css({'z-index': '8000'}).animate({opacity: '1'}, time);
}

/**
 * 
 * @param {int} time (500) animation
 * @returns {div} lading screen hide 
 */
function hideloadingscreen(time = 500)
{
    $('#loading-screen').css({'z-index': '-99'}).animate({opacity: '0'}, time);
}


/**
 * 
 * @param {object HTML} form
 * @param {type} flag if 1 then login
 * @returns {NULL}
 */
function exec_toserver(form, flag = "0") {
    $('.alert').hide(50);
    $(form.attr('alert')).removeClass('alert-msg-error');
    $(form.attr('alert')).removeClass('alert-msg-info');
    $('#loading-screen').css({'z-index': '8000'}).animate({opacity: '1'}, 500);
    var url = form.attr('action');
    setTimeout(function () {
        $.post(url, form.serialize()).done(function (rjson) {
            var obj = JSON.parse(rjson);
            $('#loading-screen').css({'z-index': '-99'}).animate({opacity: '0'}, 500);
            if (flag === "1")
            {
                if (obj.sts === 1) {

                    window.location.href = "./product";
                }


            }
            var addclass = 'alert-msg-error';
            var icon = 'fa fa-warning';
            if (obj.sts === 1) {
                addclass = 'alert-msg-info';
                icon = 'fa fa-check';
                form.trigger('reset');
            }

            $('.msg-server').html('<span class="fa ' + icon + '"></span> ' + obj.msg);
            $(form.attr('alert')).removeClass('alert-msg-error');
            $(form.attr('alert')).removeClass('alert-msg-info');
            $(form.attr('alert')).addClass(addclass);
            $(form.attr('alert')).show(1000);
        });
    }, 1);
}

