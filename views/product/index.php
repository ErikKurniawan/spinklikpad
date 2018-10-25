<?php
$listprovince = $this->listprovince;
$listcategory = $this->category;
$listproduct = $this->listproduct;
?>

<style>
    .left-menu
    {
        border:1px solid #f1f1f1;
        padding:10px;
    }


    .left-menu ul li
    {
        padding:5px 0px;


    }

    .left-menu ul li,.left-menu ul li a
    {
        text-decoration: none;
        font-size: 12px;
        padding:0px !important;
        color:#94989b;
    }

    .left-menu ul li a
    {
        line-height: 20px;
    }

    .left-menu ul li a:active,.left-menu ul li a:hover
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
        border-bottom: 1px dashed #d2d2d2;
        margin-bottom: 5px;
        
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
        border:2px solid #f1f1f1;
         border-top-left-radius: 5px;
         border-top-right-radius: 5px;
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
<div class="container-fluid content section">
    <div class="row">
        <div class="col-2">

        </div>
        <div class="col-8">

            <style>
                .delete-flter
                {
                    text-align:left;
                    font-size:12px;
                    margin-right:10px;
                    margin-top:5px;
                    margin-bottom:5px;
                }

            </style>
            <?php
            $array = $this->filter;

            $filtering = $_GET;
            unset($filtering['url']);
            unset($filtering['srch-product']);
            if (count($filtering) > 0) {
                ?>



                <?php
                //glfn::_pre($array);
                ksort($array);
                foreach ($array as $k => $v) {

                    $postdata = $k;
                    $valuepost = isset($_GET[$postdata]) ? $_GET[$postdata] : '';
                    $child_id = $v ? $k . 'code' : '';
                    if (isset($_GET[$postdata])) {

                        echo '<a class="btn bbtn btn-outline-secondary delete-flter" href="#" role="button" data-id="' . $k . '" child-id="' . $child_id . '">'
                        . '<span style="text-align:left;">' . ucwords($k) . '</span> : '
                        . '' . $valuepost . ' '
                        . '</a>';
                    } else {
                        
                    }
                }
                ?>

            <?php }
            ?>

        </div>
        <div class="col-2">
            <!--
            <select id="order" data-filter="order" data-category="ordercode" name="order" class="srchcst-filter" style="width:100%;font-size:12px;padding:5px;">

            <?php
            $orderby = $this->orderby;
            $no = 0;
            foreach ($orderby as $k => $v) {
                ?>
                                                                                <option  value="<?= $no ?>" ><?= $v['srch'] ?></option>    
                <?php
                $no++;
            }
            ?>
            </select>
            -->
        </div>
    </div>
    <div class="row">
        <div class="col-2">

            <div class="panel-container" style="width:95%;border-radius: 5px;">
                <div class="category-title">
                    Filter
                </div>  
                <div class="left-menu">
                    <div class="title-filter">
                        Kategori
                    </div>

                    <ul id="accordion1" class="nav nav-pills flex-column">
                        <?php
                        $seq1 = 0;
                        foreach ($listcategory as $k => $v) {
                            $seq1++;
                            $_codeheader = $v['_code'];
                            $_nameheader = $v['_name'];
                            $_photoheader = $v['_photo'];
                            $_detail = $v['_details'];
                            ?>

                            <li class="nav-item">

                                <a class="nav-link" data-toggle="collapse" href="#item-<?= $seq1 ?>" data-parent="#accordion1"><?= $_nameheader ?></a>
                                <div id="item-<?= $seq1 ?>" class="collapse">
                                    <ul class="nav flex-column ml-3">

                                        <?php
                                        $seq2 = 0;
                                        foreach ($_detail as $k2 => $v2) {
                                            $seq2++;
                                            $_codedetail = $v2['_code'];
                                            $_namedetail = $v2['_name'];
                                            $_photodetail = $v2['_photo'];
                                            $_selecteddetail = $v2['_selected'];
                                            ?>

                                            <li class="nav-item">
                                                <a class="nav-link srchcst-filter" data-filter="kategori" data-category="kategoricode" data-code="<?= $_codedetail ?>"  href="#"><?= $_namedetail ?></a>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
                <div class="left-menu">
                    <div class="title-filter">
                        Rating
                    </div>


                    <div class="product-rate-star filter-rate" data-filter="rate" data-category ="" data-code ="5" data-rateyo-rating="5"></div>
                    <div class="product-rate-star filter-rate" data-filter="rate" data-category ="" data-code ="4" data-rateyo-rating="4"></div>
                    <div class="product-rate-star filter-rate" data-filter="rate" data-category ="" data-code ="3" data-rateyo-rating="3"></div>
                    <div class="product-rate-star filter-rate" data-filter="rate" data-category ="" data-code ="2" data-rateyo-rating="2"></div>
                    <div class="product-rate-star filter-rate" data-filter="rate" data-category ="" data-code ="1" data-rateyo-rating="1"></div>
                </div>




                <style>
                    .filterharga
                    {
                        font-size: 12px;

                        width: 100% !important;
                    }

                </style>

                <div class="left-menu">
                    <div class="title-filter">
                        Harga
                    </div>
                    <div style="margin-bottom: 5px;">
                        <input currency type="text" class="filterharga"  id="tmpminprice" name="tmpminprice" placeholder="Harga Minimum">
                    </div>
                    <div>
                        <input currency type="text" class="filterharga" id="tmpmaxprice" name="tmpmaxprice" placeholder="Harga Maximum">
                    </div>
                </div>







                <div class="left-menu left-menu-category">
                    <div class="title-filter"> Lokasi</div>
                    <select id="filter-lokasi" name="filter-lokasi" style="font-size:12px;padding:5px;">
                        <option value="">---- Lokasi ----</option>
                        <?php
                        foreach ($listprovince as $k => $v) {
                            ?>
                            <option value="<?= $v['_province'] ?>"><?= $v['_province'] ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
            </div>
        </div>



        <div class="col-10">



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
            <style>
                .product-card2{

                    border:2px solid #f1f1f1;
                    padding:5px;
                    border-radius: 5px;
                }
                .product-card2:hover
                {
                    box-shadow: 0px 2px 10px #d2d2d2;

                }

            </style>

            <style>
                .fa-heart
                {
                    color: #f7931d;
                    font-size: 18px;
                    margin-top: 4px;
                }

                .wishlist .active
                {
                    color: #733f98;
                }

                .fa-heart:hover
                {
                    color: #733f98;
                }
                .product-rate-star
                {
                    display: inline-block;
                    margin-left: -5px;
                }
            </style>
            <?php
            $checkCol = 0;
            $limiCol = 4;
            $total = 0;
            $totalproduct = count($listproduct);
//            /glfn::_pre($listproduct);
            foreach ($listproduct as $k => $v) {
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
                ?>
                <?php if ($checkCol == 0) { ?>
                    <div class="row row-product">

                    <?php } ?>
                    <div class="col-md-5ths">
                        <div class="product-card2">
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
                                <a class="asd2" href ="<?= URL ?>/product?lokasi=<?= $_province ?>"><?= $_province ?></a>

                            </div>


                        </div>

                    </div>
                    <?php if ($checkCol == $limiCol) { ?>

                    </div>
                <?php } else if ($totalproduct == $total) { ?>

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

<div class="row">
    <div class="col-lg-12 col-sm-12"  >
        <div class="float-right" >
            <?php
            $totalpage = $this->totalpage;
            $page = $this->page;
            ?>


            <nav aria-label="...">
                <ul class="pagination">
                    <?php
                    for ($i = 1; $i <= $totalpage; $i++) {

                        $active = $i == $page ? 'active' : '';

                        $prev = $i == 1 ? 'disabled' : '';
                        $next = $i != $totalpage ? 'disabled' : '';
                        ?>
                        <li class="page-item"><a class="page-link <?= $active ?>" href="#"><?= $i ?></a></li>
                        <?php
                    }
                    ?>


                </ul>
            </nav>



            <ul class="pagination">

            </ul>

            <script type="text/javascript">
                $('.page-link').click(function () {

                    if ($("#page").length == 0) {
                        $("#tmp-filter").after('<input type="hidden" id="page" name="page" value="' + $(this).html() + '"/>');
                    } else {
                        $('#page').val($(this).html());

                    }
                    $('#frmsearch').submit();
                    return false;

                });
            </script>

        </div>
    </div>
</div>

</div>




