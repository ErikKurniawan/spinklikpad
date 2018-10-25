$(document).ready(function () {
    var $s = $(".slider");
    $s.slick({
        autoplay: true,
        dots: true,
        autoplaySpeed: 10000
                /*
                 }).on("afterChange", function (e, slick) {
                 if (slick.currentSlide > 2) {
                 $s.slick("setOption", "autoplaySpeed", 1400);
                 } else {
                 $s.slick("setOption", "autoplaySpeed", 100);
                 }
                 */
    });



    $(".sale-items").slick({
        slidesToShow: 5,
        infinite: false,
        slidesToScroll: 5
    });

});


