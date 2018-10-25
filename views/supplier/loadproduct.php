<?php
$checkCol = 0;
$limiCol = 4;
$total = 0;

$listproduct = $this->listproduct;




$totalproduct = count($listproduct);
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





<div class="row">
    <div class="col-lg-12 col-sm-12"  >
        <div class="float-right" >
            <?php
            $totalpage = $this->totalpage;
            $page = $this->page;
            ?>


            <style>

                .pagination  a
                {
                    border:1px solid #d91b5b !important;
                    font-size:14px;
                    color:#d91b5b;
                }


                .pagination  a:hover
                {
                    background:#d91b5b !important;
                    color:white;
                }

                .pagination  a.active
                {
                    background:#d91b5b !important;
                    color:white;

                }
            </style>

            <nav aria-label="...">
                <ul class="pagination">
                    <?php
                    for ($i = 1; $i <= $totalpage; $i++) {

                        $active = $i == $page ? 'active' : '';

                        $prev = $i == 1 ? 'disabled' : '';
                        $next = $i != $totalpage ? 'disabled' : '';
                        ?>
                        <li class="page-item "><a class="page-link <?= $active ?>" href="#"><?= $i ?></a></li>
                            <?php
                        }
                        ?>


                </ul>
            </nav>



            <script type="text/javascript">


            </script>

        </div>
    </div>
</div>  