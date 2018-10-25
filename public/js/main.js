$(function () {

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
    //$('[pickerdate]').attr("readonly", "readonly");
    $('[pickerdate]').datepicker({
        autoclose: true,
        todayBtn: "linked",
        format: 'yyyy/mm/dd'
    });


    $('body').on('click', '.btn-cart', function () {
        data = $(this).attr('data');
        $("#shopping-cart span").html("2");
        return false;
    });
});
