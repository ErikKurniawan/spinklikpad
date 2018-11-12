<?php
$listproduct = $this->product;
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

    .col-xs-5ths,
    .col-sm-5ths,
    .col-md-5ths,
    .col-lg-5ths {
        position: relative;
        min-height: 1px;
        padding-right: 15px;
        padding-left: 15px;
    }

    .col-xs-5ths {
        width: 20%;
        float: left;
    }

    @media (min-width: 768px) {
        .col-sm-5ths {
            width: 20%;
            float: left;
        }
    }

    @media (min-width: 992px) {
        .col-md-5ths {
            width: 20%;
            float: left;
        }
    }

    @media (min-width: 1200px) {
        .col-lg-5ths {
            width: 20%;
            float: left;
        }
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

            <?php
            require __DIR__.'/../user/left-menu.php';
            ?>
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
                $_distributor = $v['_distributor'];
                $_picture = $v['_picture'];
                $_name_product = $v['_name'];
                $_code = $v['_code'];
                $_product_code = $v['_product_code'];
                $_weight = $v['_weight'];
                //$_name_supplier = $v['_name_supplier'];
                //$_link = $v['_link'];
                //$_wishlist = $v['_wishlist'];
                $_wishlist = 0;
                $_province = $v['_province'];
                $_rating = 0 == "" || 0 == "0" ? '' : 0;
                $ratestar = 0 == "" || 0 == "0" ? '' : 'class="rateyo" data-rateyo-rating="' . 0 . '"';

                $icon_newitem = date('Ymdhis') < date('Ymdhis', strtotime($_date . "+7 days")) ? '<div class="new-arrival-icon">new</div>' : '';

                $randstar = rand(1, 4) . '.' . rand(0, 9);
                ?>
                <?php if ($checkCol == 0) { ?>
                    <div class="row row-product">

                    <?php } ?>
                    <div class="col-md-5ths">
                        <div class="product-card">
                            <a href="<?= URL ?>merchantproduct/detail/<?= $_product_code ?>">

                                <div class="product-image">
                                    <img class="img-fluid" src="<?= PATH_IMAGE_DISTRIBUTOR ?><?php echo $_picture;?>" onerror="this.src='<?= PATH_IMAGE ?>logo.png';"  title="kategory 1"/>
                                </div>
                                <div class="product-title"><?= $v['_name'] ?></div>
                                <div class="product-price"></div>
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

</div>




