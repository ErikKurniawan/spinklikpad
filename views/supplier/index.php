

<?php
require 'header.php';
$catforproduct = $this->catforproduct;
?>




<style>

    .review-container{

    }
    .review-content
    {
        padding:15px 10px;
        border-bottom: 1px solid #e2e7e9;
    }

    .review-content:last-child
    {

        border-bottom: 0px;
    }


    .review-icon-container
    {
        width: 55px;
    }

    .review-content img
    {

        border:5px #e2e7e9 solid;
        width: 50px;
        height: 50px;
    }

    .review-name
    {
        padding:0px 5px;
        color: #733f98;
        font-size: 12px;
        font-weight: bold;
    }

    .review-time
    {
        padding: 5px;
        color: #95999A;
        font-size: 12px;
        font-weight: bold;
        font-style: oblique;
    }


    .review-desc
    {
        padding: 5px;
        color: #6a6c6c;
        font-size: 13px;
        font-weight: bold;
    }

    .img-review-container
    {
        padding: 10px;
        border:1px solid black;
        height: 100%;
        width: 150px;
    }


    .img-review{
        padding: 10px;
        height: 100%;
        width: 150px;


    }
    .img-review img{
        border:1px solid #e2e7e9;

    }

    .img-review a
    {
        color: #95999A;
        text-decoration: none;
        font-weight: bold;
        font-size: 14px;
    }

    .img-review a :hover
    {
        color: #733f98;
        text-decoration: none;
    }





    .cst-accordion li
    {
        padding:5px 0px;


    }

    .cst-accordion li,.cst-accordion li a
    {
        text-decoration: none;
        font-size: 12px;
        padding:0px !important;
        color:#94989b;
    }

    .cst-accordion li a
    {
        line-height: 20px;
    }

    .cst-accordion li a:active,.cst-accordion li a:hover
    {
        color: #6d6e70;
    }
</style>



<div class="container-fluid section content" style="margin-top: 30px;">
    <div class="row row-product">


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


                    addlink = check ? "<?php echo URL; ?>wishlist/delete_wh_pd" : "<?php echo URL; ?>wishlist/add_wh_pd";



                    $.post(addlink, {'product': product}, function (a) {



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
        $prodpopuler = $this->prodpopuler;
        $totalproduct = count($prodpopuler);

        foreach ($prodpopuler as $k => $v) {
            $total++;
            $_date = str_replace('-', '/', $v['_createdate']);
            $_discount = $v['_discount'];
            $_supplier = $v['_supplier'];
            $_picture = $v['_picture'];
            $_name_product = $v['_name'];
            $_code = $v['_code'];
            $_price = $v['_price'];
            $_weight = $v['_weight'];
            $_picture = $v['_picture'];
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

            <div class="col-3">
                <div class="product-card2">
                    <a href="<?= URL ?>product/detail/<?= $_code ?>">

                        <div class="product-image" style=" height: 200px;line-height: 200px;">

                            <center>
                                <img class="img-fluid" src="<?= PATH_IMAGE ?>product/<?= $_picture ?>?a=<?= time() ?>" onerror="this.src='<?= PATH_IMAGE ?>logo.png?a=<?= time() ?>';"  />
                            </center>

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


                        $active = $_wishlist != NULL ? "active" : '';
                        ?>

                        <a href="iasd" class="wishlist float-right" data="<?= $_code ?>"><i class="fas <?= $active ?> fa-heart"></i></a>

                    </div>
                    <div class="product-info-supplier">
                        <a class="asd2" href ="<?= URL ?>/product?lokasi=<?= $_province ?>"><?= $_province ?></a>

                    </div>


                </div>
            </div>

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

<div class="container-fluid section content" style="margin-top: 30px;">



    <ul class="nav nav-pills mb-3 i-tab" style="border-bottom:1px solid #d2d2d2;" id="pills-tab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="pills-home-tab"  href="<?= URL ?>supplier?a=<?= $_GET['a'] ?>" >Produk</a>
        </li>
        <li class="nav-item">
            <a class="nav-link " id="pills-profile-tab"  href="<?= URL ?>supplier/review?a=<?= $_GET['a'] ?>" >Ulasan</a>
        </li>
        <!--
        <li class="nav-item">
            <a class="nav-link" id="pills-contact-tab" href="<?= URL ?>supplier/discus?a<?= $GET['a'] ?>">Diskusi Produk</a>
        </li>
        -->
    </ul>


    <script>
        $(document).ready(function () {
            $('body').on('blur', '#srchproductsupplier', function () {

                $.post('<?php echo URL; ?>cart/formaddcart', {
                    product: '<?= $_code ?>'
                }).done(function (data) {
                    $('#loadcontent').html(data);
                });
                $("#exampleModalCenter").modal();

                return false;
            });
        });
    </script>

    <div class="row" >
        <div class="col-12 " >
            <div class="parent2" style="background: #733f98;padding: 10PX;">
                <div><input type="text" id="srchproductsupplier" class="form-control" style="width: 200px;border-radius:0px;" name="srchproductsupplier" /></div>
                <div>
                    <select id="orderby" class="float-right form-control" style="width: 200px;border-radius:0px;">
                        <option value="total_product desc">Penjualan</option>
                        <option value="a._price desc">Harga tertinggi</option>
                        <option value="a._price">Harga terrendah</option>
                        <option value="_rating">Ulasan</option>
                    </select>
                </div>


            </div>    
        </div>

    </div>









    <style>
        .panel-filter
        {
            border:1px solid #f1f1f1;
            padding:10px;
            font-size:12px;
            color:#95999A;
        }
        .etalase
        {
            border: 1px solid #d2d2d2;
        }
        .etalase div
        {
            border-bottom: 1px solid #d2d2d2;
            padding:5px;
        }
    </style>


    <div class="row">
        <div class="col">
            <hr/>
        </div>
    </div>

    <div class="row">
        <div class="col-2" >

            <style>
                .categori-supplier
                {
                    line-height: 30px;
                    padding-left:10px !important;
                    font-size:13px;
                    color:#6a6c6c;
                    cursor: pointer;
                }
                .categori-supplier:hover
                {
                    font-weight: bold;
                    background: #f1f1f1;
                    color:#733f98;
                }

                .etalase .active
                {
                    font-weight: bold;
                    background: #f1f1f1;
                    color:#733f98;
                }

            </style>

            <div style="background: #733f98;padding:10px;color:#fff;">Etalase</div>
            <div class="etalase" style="overflow-y: auto;max-height: 500px">
                <div class="categori-supplier active" data ="">Semua Etalase</div>
                <?php
                foreach ($catforproduct as $k => $v) {
                    ?>

                    <div class="categori-supplier" data ="<?= $v['_category_detail'] ?>"><?= $v['_name'] ?></div>

                    <?php
                }
                ?>
            </div>

        </div>
        <script>
            $(function () {
                $("#pencarian-supplier").load("<?php echo URL; ?>/supplier/loadproduct", {"supplier": "<?= $_GET['a'] ?>"});



                $('body').on('click', '.categori-supplier', function () {


                    $.post('<?php echo URL; ?>/supplier/loadproduct', {'orderby': $('#orderby').val(), 'page': 1, 'produk': $('#srchproductsupplier').val(), 'kategoricode': $(this).attr('data'), "supplier": "<?= $_GET['a'] ?>"},
                            function (a) {

                                $("#pencarian-supplier").html(a);
                            }
                    );
                    $('.categori-supplier').removeClass('active');
                    $(this).addClass('active');
                    $("#pencarian-supplier").focus();
                });


                $('body').on('blur', '#srchproductsupplier', function () {

                    $.post('<?php echo URL; ?>/supplier/loadproduct', {'orderby': $('#orderby').val(), 'page': 1, 'produk': $('#srchproductsupplier').val(), 'kategoricode': $(this).attr('data'), "supplier": "<?= $_GET['a'] ?>"},
                            function (a) {

                                $("#pencarian-supplier").html(a);
                            }
                    );
                    $("#pencarian-supplier").focus();
                });


                $('body').on('click', '.page-link', function () {

                    $.post('<?php echo URL; ?>/supplier/loadproduct', {'orderby': $('#orderby').val(), 'page': $(this).html(), 'produk': $('#srchproductsupplier').val(), 'kategoricode': $(this).attr('data'), "supplier": "<?= $_GET['a'] ?>"},
                            function (a) {

                                $("#pencarian-supplier").html(a);
                            }
                    );


                    $('.page-link').removeClass('active');
                    $(this).addClass('active');

                    $("#pencarian-supplier").focus();

                });

                $('body').on('change', '#orderby', function () {

                    //alert("orderby:"+$(this).val());
                    $.post('<?php echo URL; ?>/supplier/loadproduct', {'orderby': $('#orderby').val(), 'page': 1, 'produk': $('#srchproductsupplier').val(), 'kategoricode': $(this).attr('data'), "supplier": "<?= $_GET['a'] ?>"},
                            function (a) {

                                $("#pencarian-supplier").html(a);
                            }
                    );




                });


            });



        </script>
        <div class="col-10" id="pencarian-supplier">

        </div>

    </div>

</div>
