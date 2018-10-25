<?php

?>
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
        display: inline-block;
        width: 200px;
        font-weight: bold;
        font-size: 20px;
        color: #fff;
        padding: 0 10px;
        background: #7f4197;
        height: 50px;
        line-height: 50px;
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
        border:0px solid black;
        display: inline-block;
        line-height: 50px;
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


    .modal-lg {
        max-width:  1200px !important;
    }
</style>
<div  class="container-fluid content section">
    <div class="row">
        <div class="col">
            <div class="col-8 product-site-map">
                <!--<a href="#">Produk</a><div></div><a href="#">Kategori Utama</a><div></div><a href="#">Electronik</a><div></div><a href="#">Komputer</a>-->
            </div>
        </div>
    </div>

</div>








<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div  class="modal-content " >


            <div id="loadcontent" class="modal-body popup-modal">
                ...
            </div>

        </div>
    </div>
</div>


<?php
$product = $this->proddtl;
//glfn::_pre($product);

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
foreach ($product as $k => $v) {

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

    $_content = $v['_content'];

    $_discount_price = '';
    if ($_discount > 0) {
        $_discount_price = $v['_price'] - ($v['_price'] * $_discount / 100);
    }
    $icon_newitem = date('Ymdhis') < date('Ymdhis', strtotime($_date . "+7 days")) ? '<div class="new-arrival-icon">new</div>' : '';


    $_photos = is_array($v['_photos']) ? $v['_photos'] : array();

    //glfn::_pre($proddtl);
}
?>



<script>
    $(document).ready(function () {
        $('body').on('click', '.btn-showmodal', function () {
            if (!$.cookie('signin'))
            {
                window.location.replace('<?= URL ?>user/signin');
            } else {
                $.post('<?php echo URL; ?>cart/formaddcart', {
                    product: '<?= $_code ?>'
                }).done(function (data) {
                    $('#loadcontent').html(data);
                });
                $("#exampleModalCenter").modal();
            }
            return false;
        });
    });
</script>




<script>
    $(function () {
        $(".supplier-rate-star").rateYo({
            ratedFill: '#d91b5b',
            starWidth: "15px",
            readOnly: true
        });
    });
</script>
<div  class="container-fluid content section">
    <div class="row">
        <div class="col-9">
            <div class="row section">
                <div class="col-1">
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a data-toggle="pill"  href="#p0">
                            <img style="border:2px solid #d2d2d2;border-radius:5px;;margin-bottom: 5px;" class="img-fluid" src="<?= PATH_IMAGE ?>product/<?= $_picture ?>?a=<?= time() ?>" onerror="this.src='<?= PATH_IMAGE ?>logo.png?a=<?= time() ?>';" />
                            <?php
                            $tmpseq = 0;
                            if (count($_photos > 0)) {

                                $linkphoto = URL . 'public/img/detail_default.jpg';
                                $active = $tmpseq == 0 ? 'active' : '';
                                foreach ($_photos as $k => $v) {
                                    $tmpseq++;
                                    $_detail_picture = $v['_picture'];
                                    $_link_galery = $v['_link_galery'];
                                    if ($tmpseq == 1) {
                                        ?>


                                        <?php
                                    }
                                    ?>
                                    <a data-toggle="pill"  href="#p<?= $tmpseq ?>">
                                        <img style="border:2px solid #d2d2d2;border-radius:5px;;margin-bottom: 5px;" class="img-fluid" src="<?= PATH_IMAGE ?>product/<?= $_picture ?>?a=<?= time() ?>" onerror="this.src='<?= PATH_IMAGE ?>logo.png?a=<?= time() ?>';" />
                                        
                                    </a>
                                    <?php
                                }
                            }
                            ?>
                            <!--
                                                    <a data-toggle="pill" href="#p2"><img class="img-fluid"  src="<?= PATH_IMAGE ?>p2.jpg" title="image 2"/></a>
                                                    <a data-toggle="pill" href="#p3"><img class="img-fluid"  src="<?= PATH_IMAGE ?>p3.jpg" title="image 3"/></a>
                                                    <a data-toggle="pill" href="#p4"><img class="img-fluid"  src="<?= PATH_IMAGE ?>p4.jpg" title="image 4"/></a>
                                                    <a data-toggle="pill" href="#p5"><img class="img-fluid"  src="<?= PATH_IMAGE ?>p5.jpg" title="image 5"/></a>
                            -->

                    </div>
                </div>
                <div class="col-5" style="border:0px solid #e2e7e9;height: 300px;">
                    <div class="tab-content tab-image" id="v-pills-tabContent" >

                        <div class="tab-pane fade show active" id="p0" role="tabpanel" aria-labelledby="v-pills-home-tab">

                            <img style="width: 100%;border:2px solid #d2d2d2;border-radius:5px;;margin-bottom: 5px;" class="img-fluid" src="<?= PATH_IMAGE ?>product/<?= $_picture ?>?a=<?= time() ?>" onerror="this.src='<?= PATH_IMAGE ?>logo.png?a=<?= time() ?>';"  title="kategory 1"/>


                        </div>

                        <?php
                        $tmpseq = 0;
                        if (count($_photos > 0)) {
                            //glfn::_pre($_photos);
                            $linkphoto = URL . 'public/img/detail_default.jpg';

                            foreach ($_photos as $k => $v) {
                                $tmpseq++;
                                $active = $tmpseq == 1 ? '' : '';
                                $_detail_picture = $v['_picture'];
                                $_link_galery = $v['_link_galery'];
                                if ($tmpseq == 1) {
                                    ?>



                                    <?php
                                }
                                ?>

                                <div class="tab-pane fade " id="p<?= $tmpseq ?>" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                    <img style="width: 100%;border:2px solid #d2d2d2;border-radius:5px;;margin-bottom: 5px;" class="img-fluid" src="<?= PATH_IMAGE ?>product/<?= $_picture ?>?a=<?= time() ?>" onerror="this.src='<?= PATH_IMAGE ?>logo.png?a=<?= time() ?>';" />
                                    
                                </div>
                                <?php
                            }
                        }
                        ?>


                    </div>
                </div>
                <div class="col-6 product-info">

                    <div class="supplier-title"><?= $_name_supplier ?></div>
                    <div class="d-product-title"><?= $_name_product ?></div>
                    <div class="d-product-sale-price"><?= $_discount_price ?></div>
                    <div class="d-product-price">Rp <?= number_format($_price) ?></div>
                    <!--
                    <div class="row d-product-dtl">
                        <div class="col-3">Procesor</div>
                        <div class="col-9">
                            <style>
                                .radio-toolbar label
                                {
                                    margin: 0px 5px
                                }
                                .radio-toolbar input[type="radio"] {
                                    display: none;
                                }

                                .radio-toolbar label {
                                    display: inline-block;
                                    border:1px solid #e2e7e9;
                                    padding: 4px 11px;
                                    font-family: Arial;
                                    font-size: 16px;
                                    cursor: pointer;
                                    color:#6a6c6c;

                                }
                                .radio-toolbar input[type="radio"]:checked+label {
                                    background-color: #e2e7e9;
                                }
                            </style>
                            <div class="radio-toolbar">
                                <input type="radio" id="radio1" name="radios" value="all" checked>
                                <label for="radio1">i3</label>

                                <input type="radio" id="radio2" name="radios" value="false">
                                <label for="radio2">i5</label>

                                <input type="radio" id="radio3" name="radios" value="true">
                                <label for="radio3">i7</label>
                            </div>
                        </div>

                    </div>
                    -->
                    <style>

                        .btn-wishlist
                        {
                            border:1px solid #d91b5b;
                            background: #d91b5b;
                            color: #fff;
                        }
                        .btn-wishlist:hover
                        {
                            background: #d91b5b;
                            color: #fff;
                        }

                        .btn-cart
                        {
                            border:1px solid #f7931d;
                            background: #f7931d;
                            color: #fff;
                        }

                        .btn-cart:hover
                        {
                            background: #f7931d;
                            color: #fff;
                        }

                        .btn-buy
                        {
                            border:1px solid #733f98;
                            background: #733f98;
                            color: #fff;
                        }

                        .btn-buy:hover
                        {
                            background: #733f98;
                            color: #fff;
                        }

                    </style>


                    <div class="parent2" style="text-align: center;margin-top: 20px;">
                        <div style="text-align: left;">
                            <a href="#" data="<?= $_code ?>" class="btn btn-wishlist " ><i class="fas fa-heart"></i> 0 </a>
                        </div>

                        <div style="text-align: right;">
                            <a href="#" data="<?= $_code ?>" class="btn btn-cart btn-showmodal" >Tambahkan Ke keranjang</a>
                        </div>

                    </div>

                </div>
            </div>
            <?php
            $avgrate = 0;
            $prouctrate = $this->prodrate;
            foreach ($prouctrate as $k => $v) {
                $avgrate = !is_null($v['avgrating']) ? $v['avgrating'] : 0;
            }

            $product_ulasan = $this->ulasan_product;
            ?>


            <div class="row section">
                <div class="col-12">
                    <ul class="nav nav-pills mb-3 i-tab" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Detil Produk</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link " id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Ulasan</a>
                        </li>

                    </ul>

                    <div class="tab-content " id="pills-tabContent">
                        <div style="border:0px solid black;" class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">

                            <?= nl2br($_content) ?>

                        </div>
                        <div class="tab-pane fade " id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <div style="float:left;width: 150px;height: 100px;display: block;text-align: ">

                                <div style="text-align: center;color:#95999A;font-size: 12px;border:0px solid black;margin-bottom: 15px;">Nilai Produk</div>
                                <?php
                                if ($avgrate == 0) {
                                    ?><div class="supplier-rate-no-review">Belum Direview</div><?php
                                } else {
                                    ?>
                                    <div class="supplier-rate2"><?= rtrim($avgrate, 0) ?> / 5</div>
                                    <div class="supplier-rate-star" data-filter="rate" data-category ="" data-code ="5" data-rateyo-rating="<?= rtrim($avgrate, 0) ?>"></div>
                                    <?php
                                }
                                ?>


                                <div style="font-size:12px;color:#95999A;text-align: center;"><?= count($product_ulasan) ?> ulasan</div>
                            </div>
                            <div style="float:left;width: 600px;text-align: left;border:0px solid red;  display: block;margin-left: 20px;">

                                <style>

                                    .table-cust { 
                                        display: table;width: 100%; border:0px solid black; 

                                    }
                                    .cell-cust  {
                                        display: table-cell; 
                                        border:0px solid black;
                                        vertical-align:middle; 
                                        text-align: center;

                                    }


                                </style>
                                <?php
                                //glfn::_pre($product_ulasan);
                                foreach ($product_ulasan as $k => $v) {
                                    $picture_customer = md5($v['_customer']);
                                    ?>
                                    <div class="row" style="padding:15px;color:#95999A;font-size: 12px; border:1px #e2e7e9 solid;margin-bottom: 10px;">

                                        <div class="col-2">

                                            <div class="table-cust">
                                                <div class="cell-cust">
                                                    <img class="img-fluid" style="float:left;border:3px solid #d2d2d2;" src="<?= PATH_IMAGE ?>customer/<?= $picture_customer ?>.jpg?a=<?= time() ?>" onerror="this.src='<?= PATH_IMAGE ?>customer/def-customer.jpg?a=<?= time() ?>';"  />
                                                </div>
                                            </div>


                                        </div>
                                        <div class="col-2">
                                            <div class="supplier-rate-star" data-filter="rate" data-category ="" data-code ="5" data-rateyo-rating="<?= $v['_rating'] ?>"></div>
                                        </div>
                                        <div class="col-8">
                                            <div style="border-bottom:1px solid #d2d2d2;font-size: 12px;margin-bottom:10px;padding-bottom: 10px;">
                                                <?= $v['_name_customer'] ?>
                                                <div class="float-right"><?= $v['_rating_date'] ?></div>
                                            </div>

                                            <?= $v['_rating_desc'] ?>
                                        </div>

                                    </div>
                                    <?php
                                }
                                ?>



                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <?php
        $supplier = $this->supplier;



        $_email = "";
        $_name = "";
        $_address = "";
        $_nohp = "";
        $_createdate = "";
        $_province = "";
        $_subprovince = "";
        $_district = "";
        $_subdistrict = "";
        
        foreach ($supplier as $k => $v) {
            $_email = $v['_email'];
            $_name = $v['_name'];
            $_address = $v['_address'];
            $_nohp = $v['_nohp'];
            $_createdate = $v['_createdate'];
            $_province = $v['_province'];
            $_subprovince = $v['_subprovince'];
            $_district = $v['_district'];
            $_subdistrict = $v['_subdistrict'];
        }







        $supplierulasan = $this->supplierulasan;
        
        
        $avgsupplierulasan = 0;
        foreach ($supplierulasan as $k => $v) {

            $avgsupplierulasan += $v['_rating'];
        }

        $finalulasanavgsupplier = count($supplierulasan) > 0 ? $avgsupplierulasan / count($supplierulasan) : 0;
        ?>

        <div class="col-3">
            <div class="panel-container">
                <div class="supplier-info">
                    INFORMASI PENJUAL
                </div>
                <div class="panel-supplier">
                    <div class="supplier-image">
                        
                        <img class="img-fluid" src="<?= PATH_IMAGE ?>merchant/<?=$_image?>?a=<?=time()?>" onerror="this.src='<?= PATH_IMAGE ?>logo.png?a=<?= time() ?>';"/>
                    </div>
                    <div class="supplier-title"><?= $_name ?></div>
                    <div class="supplier-address"><?= $_province ?></div>
                    <div class="supplier-address"><?= $_subprovince ?></div>
                    <?php
                    if ($finalulasanavgsupplier == 0) {
                        ?>
                        <div class="supplier-rate-no-review">Belum Direview</div>
                        <?php
                    } else {
                        ?>
                        <div class="supplier-rate-star" data-filter="rate" data-category ="" data-code ="5" data-rateyo-rating="<?= rtrim($finalulasanavgsupplier, 0) ?>"></div>
                        <div class="supplier-rate"><?= rtrim($finalulasanavgsupplier, 0) ?> / 5</div><?php
                    }
                    ?>



                    <div class="supplier-btn"><a class="btn btn-1" href="<?= URL ?>supplier/index?a=<?= $_supplier ?>" role="button">Masuk Ke Toko</a></div>
                    <!--<div class="supplier-btn"><a class="btn btn-2" href="#" role="button">Chat Penjual</a></div>-->
                </div>
            </div>
        </div>

    </div>
</div>

<style>
    .supplier-rate-no-review
    {
        font-size: 13px;
        color:#95999A;
        margin: 10px 0px;
    }
    .supplier-title
    {
        color:#733f98;
        font-size:18px;
        font-weight: bold;
        border-bottom: 1px dashed #d2d2d2;
        padding-bottom: 10px;
        margin-bottom: 10px;
    }

    .d-product-title
    {
        color:#733f98;
        font-size: 14px;
        font-weight: bold;
        padding:5px 0px;
        text-overflow: ellipsis;
        overflow: hidden;
    }



    .d-product-sale-price{
        color:#e2e7e9;
        font-size: 13px;
        height: 20px;
        border:0px solid black;
        margin-top: 3px;
        overflow: hidden;

    }
    .d-product-price{
        color:#d91b5b;
        font-size: 15px;
        height: 22px;
        border:0px solid black;
        overflow: hidden;

    }


    .panel-supplier
    {
        border:1px solid #f1f1f1;
        padding:10px;

    }

    .panel-supplier div
    {
        text-align: center;
    }

    .supplier-info
    {
        text-align: center;
        background: #733f98;
        color:#fff;
        font-size:18px;
        font-weight: bold;
        padding: 10px;

    }

    .supplier-image
    {
        padding:20px 0px;

    }

    .supplier-image img
    {
        width: 150px;
        height: 150px;
        border-radius: 75px;
        border:1px solid #e2e7e9;
    }

    .supplier-address
    {
        color:#95999A;
        font-size:13px;
    }

    .supplier-rate-star
    {
        margin: 10px auto 10px auto;   
    }
    .supplier-rate
    {
        font-size: 13px;
        color:#95999A;
        margin-bottom: 15px;
    }

    .supplier-rate2
    {
        text-align: center;

        font-size: 17px;
        color:#733f98;

    }

    .supplier-btn
    {
        margin-bottom: 10px;
    }
    .btn-1
    {
        background: #f7931d;
        color: #fff;
        width: 200px;
    }
    .btn-1:hover
    {
        background: #d91b5b;
        color: #fff;
    }


    .btn-2
    {
        color: #95999A;
        width: 200px;
        border:1px solid #95999A;
    }
    .btn-2:hover
    {
        background: #6a6c6c;
        color: #fff;
        border:1px solid #6a6c6c;

    }


    .tab-image .tab-pane  > * 
    {
        padding: 20px;
        height: 300px;    
        vertical-align:middle; 
        text-align:center;
    }

    .product-info
    {
        padding-left:50px;
    }

    .btn-secondary
    {
        background: #fff !important;
        color:#95999A; 
        border: 1px solid #95999A;
    }

    .btn-secondary:hover
    {

        color:#6a6c6c; 
        border: 1px solid #6a6c6c;
    }

    .d-product-dtl
    {
        padding: 20px 0px;
    }

    .ratebox
    {
        border:1px solid black;
    }

    .btn-troly
    {
        width: 100%;
        background: #231f20;
        color: #6a6c6c;
    }
    .btn-troly:hover
    {
        color: #fff;
    }


</style>

<?php
//echo enhash::_hash_password("1");
?>