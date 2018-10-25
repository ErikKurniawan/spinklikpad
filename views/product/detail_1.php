
<?php
$ulasan = $this->ulasan;


$proddtl = $this->proddtl;
$_code = '';
$_name_product = '';
$_price = '';
$_supplier = '';
$_discount = '';
$_category_detail = '';
$_status = '';
$_content = '';
$_link = '';
$_createby = '';
$_priceshow = '';
$_picture = '';
$_discount_price = '';
$_discount_show = '';
$_user = '';
$_photos = array();
$btn_removewishlist = 'none';
$btn_addwishlist = 'none';
$_weight = '';
//glfn::_pre($proddtl);
foreach ($proddtl as $k => $v) {

    $_date = str_replace('-', '/', $v['_createdate']);
    $_discount = $v['_discount'];
    $_supplier = $v['_supplier'];
    $_picture = $v['_picture'];
    $_name_product = $v['_name'];
    $_code = $v['_code'];
    $_price = $v['_price'];
    $_rating = $v['_rating'];
    $_weight = $v['_weight'];
    $_name_supplier = $v['_name_supplier'];
    $_link = $v['_link'];
    $_link_thumb = $v['_link_thumb'];
    $_discount_price = $v['_price'] - ($v['_price'] * $_discount / 100);
	$_content = $v['_content'];
    $icon_discount = '';
    $show_price = 'Rp.' . glfn::_currency($_discount_price);
    if ($_discount > 0) {
        $icon_discount = '<div class="discount-icon">' . $_discount . '%<br>Sale</div>';
        $show_price = '<span>Rp. ' . glfn::_currency($_price) . '</span>&nbsp; Rp.' . glfn::_currency($_discount_price);
    }
    $icon_newitem = date('Ymdhis') < date('Ymdhis', strtotime($_date . "+7 days")) ? '<div class="new-arrival-icon">new</div>' : '';


    $_photos = is_array($v['_photos']) ? $v['_photos'] : array();

    if (isset($_COOKIE[COOKIE_SIGNIN]) && $_COOKIE[COOKIE_SIGNIN]) {
        $btn_addwishlist = $v['_wishlist'] != "" ? 'none' : 'block';
        $btn_removewishlist = $v['_wishlist'] != "" ? 'block' : 'none';
    }
    //glfn::_pre($proddtl);
}




/* * ********************modal pupup*********************** */
?>



<style>
    .detail-deskripsi li
    {
        list-style-type: square;
    }
</style>

<script type="text/javascript">
    $(document).ready(function () {
        $('.btn-picture').click(function () {
            $($(this).attr('modal')).css({'z-index': '1500'}).animate({opacity: '1'}, 1000);
        });

        $('#showformadd').click(function () {
            if (!$.cookie('signin'))
            {
                window.location.replace('<?php echo URL . 'auth' ?>');
            } else {
                showloadingscreen(1);
                $.post('<?php echo URL; ?>cart/formaddcart', {'product': '<?= $_code ?>', 'courier': '', 'courier_package': ''}, function (a) {
                    hideloadingscreen(1);
                    $('#formaddtocartpopup').html(a);
                });
                $($(this).attr('modal')).css({'z-index': '1500'}).animate({opacity: '1'}, 1000);
                return false;
            }
        });
        $(".slideshow").slick({
            slidesToShow: 1,
            infinite: true,
            slidesToScroll: 1,
            autoplay: true,
            dots: true,
            autoplaySpeed: 1000
        });
        $('.addwishlist').click(function () {
            $.post('<?php echo URL; ?>wishlist/add_wh_pd', {'product': $('#product_w').val()}, function (a) {
                $('.addwishlist').css({
                    'display': 'none'
                });
                $('.removewishlist').css({
                    'display': 'block'
                });
            });
            return false;
        });
        $('.removewishlist').click(function () {
            $.post('<?php echo URL; ?>wishlist/delete_wh_pd', {'product': $('#product_w').val()}, function (a) {
                $('.addwishlist').css({
                    'display': 'block'
                });
                $('.removewishlist').css({
                    'display': 'none'
                });
            });
            return false;
        });


    });
</script>

<br>
<br>

<div class="container">

    <div class="row">
        <div class="col-sm-4 col-xs-12 col-lg-4">
            <h4 class="dp-detail"><?php echo $_name_product; ?></h4>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4 col-lg-4">
            <!--<div class="infotansaction">95% berhasil dari 100%</div>-->
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4 col-lg-4">
            <center><img class="img-responsive" style="height:180px;" src="<?= $_link ?>"  onerror="this.src='<?= URL ?>public/img/detail_default.jpg';"  alt="" /></center>
            <hr>

<?php
if (count($_photos) > 0) {
    ?>
                <div class="row" style="margin-bottom:30px;">
                    <div class="col-sm-12 col-lg-12">
                        <div class="slideshow">
    <?php
    foreach ($_photos as $k => $v) {
        $active = $k == 0 ? 'active' : '';
        ?>
                                <div>
                                    <a class="btn-picture" modal="#test2" href="#">
                                        <center><img class="img-responsive" style="height:50px;" src="<?= $v['_link_galery_thumb'] ?>"  onerror="this.src='<?= URL ?>public/img/detail_default.jpg';"  alt="" /></center>
                                    </a>
                                </div>
        <?php
    }
    ?>
                        </div>
                    </div>
                </div>
    <?php
}
?>
        </div>
        <div class="col-sm-5 col-lg-5">
            <div class="detail-deskripsi">
                <p>
<?php echo $_content; ?>
                </p>
            </div>
        </div>
        <div class="dp-right-menu col-sm-3 col-lg-3">
            <div class="dp-price">Rp. <?php echo glfn::_currency($_discount_price); ?></div>
            <div>
                <a modal="#test" id="showformadd" class="show-modal btn dp-btn-beli">Beli</a>

            </div>
            <div id="r_wh">
                <a style="display:<?= $btn_addwishlist ?>" class="btn addwishlist" href="#">Tambahkan ke wishlist</a>
                <input type="hidden" name="product_w" id="product_w" value="<?php echo $_code ?>"/>
                <a style="display:<?= $btn_removewishlist ?>" class="btn removewishlist" href="#">hapus wishlist</a>
            </div>
        </div>
    </div>
</div>




<div id="test" class="modal-maincontainer">
    <div class="container">
        <div class=" modal-container">
            <span class="modal-close"><span class="glyphicon glyphicon-remove"></span></span>
            <p>Tambahkan Kekeranjang</p>
            <div id="formaddtocartpopup"></div>
        </div>
    </div>
</div>

<div id="test2" class="modal-maincontainer">
    <div class="container">
        <div class=" modal-container col-sm-8 col-sm-offset-2 col-lg-8 col-lg-offset-2">
            <span class="modal-close"><span class="glyphicon glyphicon-remove"></span></span>
            <p>Foto Galeri</p>
            <div class="slideshow" style="border-top:1px solid black;padding:20px 0px;">
                <?php
                foreach ($_photos as $k => $v) {
                    $active = $k == 0 ? 'active' : '';
                    ?>
                    <div>
                        <a class="btn-picture" modal="#test2" href="#">
                            <center><img class="img-responsive"  src="<?= $v['_link_galery'] ?>"  onerror="this.src='<?= URL ?>public/img/detail_default.jpg';"  alt="" /></center>
                        </a>
                    </div>
    <?php
}
?>
            </div>
        </div>
    </div>
</div>