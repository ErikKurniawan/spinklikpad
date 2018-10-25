<style>
    .panel-filter
    {
        border:1px solid #f1f1f1;
        padding:10px;
    }


    .panel-filter ul li
    {
        padding:5px 0px;


    }

    .panel-filter ul li,.panel-filter ul li a
    {
        text-decoration: none;
        font-size: 12px;
        padding:0px !important;
        color:#94989b;
    }

    .panel-filter ul li a
    {
        line-height: 20px;
    }

    .panel-filter ul li a:active,.panel-filter ul li a:hover
    {
        color: #6d6e70;
    }

    .panel-container
    {
        border:1px solid #f1f1f1;
    }

    .title-filter
    {
        line-height: 40px;
        font-size: 14px;
        font-weight: bold;
        color:#7f4197;
    }

    .category-title
    {
        font-weight: bold;
        font-size: 20px;
        color: #fff;
        padding: 0 10px;
        background: #7f4197;
        height: 40px;
        line-height: 40px;
    }

</style>
<style>
    .hoverable:not(:hover) + .show-on-hover {
        display: none;
    }

    .product-hover {
        text-align: center;
        background: #231f20;
        color:#d0d1d3;
        font-size: 13px;
        line-height: 35px;

    }
    .product-card:not(:hover) + .product-hover {
        text-align: center;
        background: transparent;
        color:transparent;
        height: 35px;
    }
    .product-site-map
    {
        font-size:14px;
        color:#94989b;
    }

    .product-site-map a
    {
        font-size:14px;
        color:#94989b;
        text-decoration: none;
        margin-right:5px;
    }

    .product-site-map a:hover
    {
        color:#6d6e70;
    }

    .product-site-map div
    {
        width: 10px;
        height: 10px;

        border-bottom: 5px solid transparent;
        border-left: 5px solid #f7931d;
        border-top: 5px solid transparent;
        border-right: 5px solid transparent;
        clear: both;
        display: inline-block;
        margin: 0px 5px;
    }

    .product-site-map a:last-child
    {
        color:#7e3f98;
    }

    .row-product .col
    {

        padding: 0px 15px !important;
    }
</style>
<?php
$trendproduct = $this->trendproduct;

$listkomputer = $this->komputerproduct;
$listcategory = $this->listcategory;
?>
<div class="container-fluid content section">
    <div class="row">
        <div class="col-6">
            <div id="carouselExampleIndicators"  class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active" style="background: #7e3f98;height: 150px;width: 100%;">
<!--                        <img class="img-fluid" src="<?= PATH_IMAGE ?>1.png" alt="First slide">-->
                    </div>
                    <div class="carousel-item" style="background: #f7931d;height: 150px;width: 100%;">

                    </div>
                    <div class="carousel-item" style="background: #d91b5b;height: 150px;width: 100%;">

                    </div>
                </div>

                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <div class="col-6">

        </div>
    </div>
</div>

<div class="container-fluid content section">
    <div class="row" >
        <div class="col-12 i-section-title" >
            <div style="border-bottom: 1px solid #d2d2d2; margin-bottom:10px;padding-bottom:10px;font-size:16px;color:#733f98;font-weight: bold;">
                Produk terbaik
            </div>
        </div>

    </div>
    
          <div class="row" style="border:1px solid red;">
                        
                        <div class="col" style="border:1px solid blue;">ass</div>
                        <div class="col" style="border:1px solid yellow;">asd</div>
                    </div>
                    
    
    <div class="row" >
        <div class="col-12">
            <div id="prodhaha2"  class="carousel slide" data-ride="carousel">
                <div class="carousel-inner" role="listbox">




                    <script>

                        $(function () {
                            $(".rateyo").rateYo({
                                starWidth: "20px",
                                readOnly: true
                            });
                            $(".filter-rate").rateYo({
                                starWidth: "20px",
                                readOnly: true
                            });
                            $('body').on('click ', '.delete-flter', function () {

                                var _id = $(this).attr('data-id');
                                var _child_id = $(this).attr('child-id');
                                $('#' + _id).remove();

                                if (_child_id != "")
                                {
                                    $('#' + _child_id).remove();
                                }
                                $('#frmsearch').submit();
                            });

                        });


                    </script>


                    <script>
                        $(function () {
                            $(".product-rate-star").rateYo({
                                ratedFill: '#d91b5b',
                                starWidth: "15px",
                                readOnly: true
                            });


                            $('body').on('click', '.wishlist', function () {

                                product = $(this).attr("data");

                                var check = $(this).children("i").hasClass("active");


                                addlink = check ? "wishlist/delete_wh_pd" : "wishlist/add_wh_pd";



                                $.post('<?php echo URL; ?>' + addlink, {'product': product}, function (a) {



                                });
                                if (check == 1)
                                {
                                    $(this).children("i").removeClass("active");
                                } else
                                {
                                    $(this).children("i").addClass("active");
                                }




                                return false;
                            });


                            $('.sd').click(function () {
                                alert(1);
                                /*
                                 delete_wh_pd
                                 
                                 $.post('<?php echo URL; ?>wishlist/add_wh_pd', {'product': $('#product_w').val()}, function (a) {
                                 $('.addwishlist').css({
                                 'display': 'none'
                                 });
                                 $('.removewishlist').css({
                                 'display': 'block'
                                 });
                                 });
                                 */
                                return false;
                            });
                        });





                    </script>
                    <?php
                    
                    $maxload = 100/6;
                    
                    ?>
                    <style>
                      
                    </style>
                    
                    
                    
              
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    <?php
                    $checkCol = 0;
                    $limiCol = 5;
                    $total = 0;
                    $apaini = 0;
                    $totalproduct = count($trendproduct);
//            /glfn::_pre($listproduct);
                    foreach ($trendproduct as $k => $v) {
                        $total++;
                        $_date = str_replace('-', '/', $v['_createdate']);
                        $_discount = $v['_discount'];
                        $_supplier = $v['_supplier'];
                        $_picture = $v['_picture'];
                        $_name_product = $v['_name'];
                        $_code = $v['_code'];
                        $_price = $v['_price'];
                        $_weight = $v['_weight'];
                        $_name_supplier = $v['_name_supplier'];
                        $_link = $v['_link'];
                        $_wishlist = $v['_wishlist'];
                        $_province = $v['_province'];
                        $_rating = $v['_rating'] == "" || $v['_rating'] == "0" ? '' : $v['_rating'];
                        $ratestar = $v['_rating'] == "" || $v['_rating'] == "0" ? '' : 'class="rateyo" data-rateyo-rating="' . $v['_rating'] . '"';

                        $_link_thumb = $v['_link_thumb'];
                        $_discount_price = $v['_price'] - ($v['_price'] * $_discount / 100);


                        $icon_discount = '';
                        $show_price = '';

                        if ($_discount > 0) {
                            $icon_discount = '<div class="discount-icon">' . $_discount . '%<br>Sale</div>';
                            $show_price = '<span>Rp. ' . glfn::_currency($_price) . '</span>&nbsp;';
                        }

                        $icon_newitem = date('Ymdhis') < date('Ymdhis', strtotime($_date . "+7 days")) ? '<div class="new-arrival-icon">new</div>' : '';

                        $randstar = rand(1, 4) . '.' . rand(0, 9);
                        $apaini++;
                        $active = $apaini == 1 ? "active" : '';
                        ?>
                        <?php if ($checkCol == 0) { ?>


                            <div class="carousel-item <?= $active ?>" style="border:0px solid red;">
                                <div class="row row-product" style="border:0px solid red;">

                                <?php } ?>
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                <div class="col-2" style="border:0px solid black;">
                                    <div class="product-card" >
                                        <a href="<?= URL ?>product/detail/<?= $_code ?>">

                                            <div class="product-image">
                                                <img class="img-fluid" src="<?= $_link . "?a=" . time() ?>" onerror="this.src='<?= URL ?>public/image/default.jpg';"  title="kategory 1"/>
                                            </div>
                                            <div class="product-title"><?= $v['_name'] ?></div>
                                            <div class="product-sale-price"><?php
                                                if ($_discount > 0) {
                                                    echo "Rp " . glfn::_currency($_price);
                                                }
                                                ?></div>
                                            <div class="product-price">Rp <?= glfn::_currency($_discount_price) ?></div>
                                        </a>
                                        <div class="product-icon">

                                            <?php
                                            if ($_rating != 0) {
                                                ?>
                                                <div class="product-rate-star" data-filter="rate" data-category ="" data-code ="<?= $randstar ?>" data-rateyo-rating="<?= $_rating ?>"></div>
                                                <?php
                                            } else {
                                                ?>
                                                <div style="font-size: 12px;color:#95999A;display: inline-block;">Belum di review</div>
                                                <?php
                                            }


                                            $active = $_wishlist == 1 ? "active" : '';
                                            ?>


                                            <a href="iasd" class="wishlist float-right" data="<?= $_code ?>"><i class="fas <?= $active ?> fa-heart"></i></a>

                                        </div>
                                        <div class="product-info-supplier">
                                            <a href ="<?=URL?>/product?lokasi=<?= $_province ?>"><?= $_province ?></a>
                                        </div>


                                    </div>
                                    <div class="product-hover">PESAN PRODUK</div>
                                </div>
                                <?php if ($checkCol == $limiCol) { ?>

                                </div>
                            </div>
                        <?php } else if ($totalproduct == $total) { ?>

                        </div>
                    </div>
                <?php } ?>
                <?php
                if ($checkCol == $limiCol) {
                    $checkCol = 0;
                } else {
                    $checkCol++;
                }
            }
            ?>
        </div>
    </div>
</div>
</div>


<div class="row" >
    <div class="col-12">
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"></div>
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"></div>
            <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab"></div>
        </div>
    </div>

</div>
<div class="row i-control-carousel">
    <div class="col-1 offset-11" >
        <a class="carousel-control-next" href="#prodhaha2" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#prodhaha2" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>
</div>






<!--

<div class="section i-full-container" >
    <div class="container-fluid content i-full" >
        <div class="row">
            <div class="col-4" >
                <img class="img-fluid float-right" src="<?= PATH_IMAGE ?>asset/icon_categories_32px-12.png" title="kategory 1"/>
            </div>
            <div class="col-4">
                <div class="promo-sale" >
                    <div class="circle">3<br/>Day</div>
                    <div class="circle">12<br/>Hour</div>
                    <div class="circle">54<br/>Minute</div>
                    <div class="circle">29<br/>Second</div>
                </div>
                <div class="i-title-promo" >
                    <h4>HOT DEAL THIS WEEK</h4>
                    <span>NEW COLLECTION UP TO 50% OFF</span>
                </div>
                <div style="text-align: center;margin-top: 10px;"><input type="button" style="color:#fff;background: #f7931d;width:200px;" class="btn" value="Beli Sekarang"/></div>
            </div>
            <div class="col-4">
                <img class="img-fluid" src="<?= PATH_IMAGE ?>asset/icon_categories_32px-01.png" title="kategory 1"/>
            </div>
        </div>
    </div>  
</div>
-->


<div class="container-fluid content section">
    <div class="row">
        <div class="col-12 i-section-title">
            Kategori
        </div>
    </div>
    <div class="row category-icon">
        <?php
        foreach ($listcategory as $k => $v) {
            ?>
            <div class="col-1 hoverbox" >
                <a class="kategory2" href="<?= URL ?>product?kategoricode=<?= $v['_code'] ?>&kategori=<?= $v['_name'] ?>">
                    <img class="img-fluid" src="<?= $v['_link'] . '?a=' . time() ?>" onerror="this.src='<?= URL ?>public/image/default.jpg';"  title="kategory 1"/>
                    <div class="title-icon"><?= $v['_name'] ?></div>
                </a>
            </div>
            <?php
        }
        ?>
    </div>
</div>


<style>
    .hoverbox
    {
        margin:10px 0px;
    }
    .kategory2
    {
        height: 140px;
        display: block;
    }
    .kategory2 img
    {
        height: 70px;
    }
    .hoverbox:hover
    {
        border:0px solid black;
        box-shadow: 0px 2px 10px #d2d2d2;
    }

    .i-tab
    {
        float:right;    
    }

</style>





































<div class="container-fluid content section">
    <div class="row" >
        <div class="col-12 i-section-title" >
            <div style="border-bottom: 1px solid #d2d2d2; margin-bottom:10px;padding-bottom:10px;font-size:16px;color:#733f98;font-weight: bold;">
                Komputer
            </div>
        </div>

    </div>
    <div class="row" >
        <div class="col-12">
            <div id="prodhaha222"  class="carousel slide" data-ride="carousel">
                <div class="carousel-inner" role="listbox">

                    <?php
                    $checkCol = 0;
                    $limiCol = 5;
                    $total = 0;
                    $apaini = 0;
                    $totalproduct = count($listkomputer);
//            /glfn::_pre($listproduct);
                    foreach ($listkomputer as $k => $v) {
                        $total++;
                        $_date = str_replace('-', '/', $v['_createdate']);
                        $_discount = $v['_discount'];
                        $_supplier = $v['_supplier'];
                        $_picture = $v['_picture'];
                        $_name_product = $v['_name'];
                        $_code = $v['_code'];
                        $_price = $v['_price'];
                        $_weight = $v['_weight'];
                        $_name_supplier = $v['_name_supplier'];
                        $_link = $v['_link'];
                        $_wishlist = $v['_wishlist'];
                        $_province = $v['_province'];
                        $_rating = $v['_rating'] == "" || $v['_rating'] == "0" ? '' : $v['_rating'];
                        $ratestar = $v['_rating'] == "" || $v['_rating'] == "0" ? '' : 'class="rateyo" data-rateyo-rating="' . $v['_rating'] . '"';

                        $_link_thumb = $v['_link_thumb'];
                        $_discount_price = $v['_price'] - ($v['_price'] * $_discount / 100);


                        $icon_discount = '';
                        $show_price = '';

                        if ($_discount > 0) {
                            $icon_discount = '<div class="discount-icon">' . $_discount . '%<br>Sale</div>';
                            $show_price = '<span>Rp. ' . glfn::_currency($_price) . '</span>&nbsp;';
                        }

                        $icon_newitem = date('Ymdhis') < date('Ymdhis', strtotime($_date . "+7 days")) ? '<div class="new-arrival-icon">new</div>' : '';

                        $randstar = rand(1, 4) . '.' . rand(0, 9);
                        $apaini++;
                        $active = $apaini == 1 ? "active" : '';
                        ?>
                        <?php if ($checkCol == 0) { ?>


                            <div class="carousel-item <?= $active ?>">
                                <div class="row row-product">

                                <?php } ?>
                                <div class="col-2">
                                    <div class="product-card">
                                        <a href="<?= URL ?>product/detail/<?= $_code ?>">

                                            <div class="product-image">
                                                <img class="img-fluid" src="<?= $_link . "?a=" . time() ?>" onerror="this.src='<?= URL ?>public/image/default.jpg';"  title="kategory 1"/>
                                            </div>
                                            <div class="product-title"><?= $v['_name'] ?></div>
                                            <div class="product-sale-price"><?php
                                                if ($_discount > 0) {
                                                    echo "Rp " . glfn::_currency($_price);
                                                }
                                                ?></div>
                                            <div class="product-price">Rp <?= glfn::_currency($_discount_price) ?></div>
                                        </a>
                                        <div class="product-icon">

                                            <?php
                                            if ($_rating != 0) {
                                                ?>
                                                <div class="product-rate-star" data-filter="rate" data-category ="" data-code ="<?= $randstar ?>" data-rateyo-rating="<?= $_rating ?>"></div>
                                                <?php
                                            } else {
                                                ?>
                                                <div style="font-size: 12px;color:#95999A;display: inline-block;">Belum di review</div>
                                                <?php
                                            }


                                            $active = $_wishlist == 1 ? "active" : '';
                                            ?>

                                            <img class="img-fluid float-right" src="<?= PATH_IMAGE ?>asset/icon_cart_32.png" title=""/>
                                            <a href="iasd" class="wishlist float-right" data="<?= $_code ?>"><i class="fas <?= $active ?> fa-heart"></i></a>

                                        </div>


                                    </div>
                                    <div class="product-hover">PESAN PRODUK</div>
                                </div>
                                <?php if ($checkCol == $limiCol) { ?>

                                </div>
                            </div>
                        <?php } else if ($totalproduct == $total) { ?>

                        </div>
                    </div>
                <?php } ?>
                <?php
                if ($checkCol == $limiCol) {
                    $checkCol = 0;
                } else {
                    $checkCol++;
                }
            }
            ?>
        </div>
    </div>
</div>
</div>


<div class="row" >
    <div class="col-12">
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"></div>
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"></div>
            <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab"></div>
        </div>
    </div>

</div>
<div class="row i-control-carousel">
    <div class="col-1 offset-11" >
        <a class="carousel-control-next" href="#prodhaha222" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#prodhaha222" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>
</div>
