<style>
    .modal-lg {
        max-width:  1200px !important;
    }

    .btn-checkout
    {
        background: #d91b5b !important;
        color:#fff;
        font-size:12px;
    }

    .btn-checkout:hover
    {
        background: #f7931d !important;
        color:#fff;
        font-size:12px;
    }
    .asd div
    {
        border:0px solid black;

    }


    .asd { display: table;width: 100%; }
    .asd > div {
        display: table-cell; 
        vertical-align:top; 
    }

    .product-title-cart
    {
        color:#834296;
        font-size: 14px;
        font-weight: bold;
        vertical-align: top;

        word-wrap: break-word;

    }



</style>


<?php
$cart = $this->cartlist;
//glfn::_pre($cart);
?>


<div class="row">
    <div class="col-9">
        <?php
        $_code = "";
        $grandtotalbarang = 0;
        $grandtotalberatbarang = 0;
        $grandtotalhargabarang = 0;
        $grandtotalhargacourier = 0;
        $totalbarang = 0;
        $totalall = 0;
        $gradtotalcourier = 0;
        $gradtotalpajak = 0;
        $gradtotalbarang = 0;
        $_tax = 0;
        if (count($cart) > 0) {
            foreach ($cart as $k1 => $v1) {
                $_code = $v1['_code'];
                $_tax = $v1['_tax'];
                $_status = $v1['_status'];
                $_customer = $v1['_customer'];
                $_createdate = $v1['_createdate'];
                $_detail = $v1['_detail'];



                $totalbarang = 0;
                $totalall = 0;
                $gradtotalcourier = 0;
                $gradtotalpajak = 0;
                $gradtotalbarang = 0;
                foreach ($_detail as $k2 => $v2) {

                    $_code_detail_transaction = $v2['_code_detail_transaction'];
                    $_supplier = $v2['_supplier'];
                    $_address = $v2['_address'];
                    $_zipcode = $v2['_zipcode'];
                    $_subdistrict = $v2['_subdistrict'];
                    $_district = $v2['_district'];
                    $_subprovince = $v2['_subprovince'];
                    $_province = $v2['_province'];
                    $_courier = $v2['_courier'];
                    $_courier_package = $v2['_courier_package'];
                    $_courier_price = $v2['_courier_price'];
                    $_no_delivery = $v2['_no_delivery'];
                    $_sts_delivery = $v2['_sts_delivery'];
                    $_name_package = $v2['_name_package'];
                    $_name_supplier = $v2['_name_supplier'];
                    $_details = $v2['_details'];



                    $totalberatbarang = 0;
                    $totalhargabarang = 0;
                    $totalhargacourier = 0;
                    foreach ($_details as $k3 => $v3) {
                        $_code_detail_transaction = $v3['_code_detail_transaction'];
                        $_product = $v3['_product'];
                        $_price = $v3['_price'];
                        $_qty = $v3['_qty'];
                        $_weight = $v3['_weight'] / 1000;
                        $_desc = $v3['_desc'];
                        $_name_product = $v3['_name_product'];
                        $_link = $v3['_link'];
                        $_link_thumb = $v3['_link_thumb'];
                        $hargabarang = $_qty * $_price;

                        $totalberatbarang += $_weight * $_qty;
                    }

                    $splitweight = explode('.', $totalberatbarang);



                    $perkg = count($splitweight) > 1 ? $splitweight[0] + 1 : $splitweight[0];
                    $subcourier = $perkg * $_courier_price;
                    ?>
                    <div style="padding: 15px;box-shadow: 0px 2px 10px #d2d2d2;font-size:12px;border-radius: 0px;margin-bottom: 20px;">
                        <div style="border-bottom:4px double #d2d2d2; padding: 10px 0px;margin-bottom: 10px;color:#95999A">
                            Penjual 
                            <span style="color:#733f98;font-weight: bold"><?= $_name_supplier ?></span>


                        </div>
                        <div class="asd" style="border:0px solid black; padding: 10px 0px;color:#95999A">
                            <div style="border:0px solid red;width: 40px;">
                                <i style="color:#d2d2d2;font-size:30px;" class="fa fa-map-marker-alt" aria-hidden="true"></i>

                            </div>
                            <div><?= nl2br($_address) ?></div>
                            <div style="color:#d91b5b;position: relative;">
                                <div style="text-align: right;margin-bottom: 5px;">
                                    <?= $_courier ?>
                                </div>
                                <div style="text-align: right">
                                    <?= $_name_package ?>  (Rp. <?= number_format($subcourier) ?> / <?= $totalberatbarang ?> Kg)
                                </div>
                                <div style="text-align: right;position: absolute;bottom: 0;border:0px solid red;width: 200px;right: 0px;">

                                </div>

                            </div>

                        </div>
                        <div class="asd" style="border:0px solid black;margin-top: -20px">
                            <div style="width:10%;">

                            </div>
                            <div style="width: 90%;padding:0px 10px;border:0px solid black;color:#6a6c6c;">
                                <div class="row">
                                    <div class="product-title-cart col-7"></div>
                                    <div class="col-2" style="text-align: center;">Total Barang</div>
                                    <div class="col-3" style="text-align: right;">Sub Total</div>
                                </div>
                            </div>
                        </div>


                        <?php
                        $subtotalbarang = 0;
                        $subtotalpajak = 0;
                        $subtotalbarang_perbarang = 0;
                        $subgrandtotal = 0;
                        foreach ($_details as $k3 => $v3) {
                            $_code_detail_transaction = $v3['_code_detail_transaction'];
                            $_product = $v3['_product'];
                            $_price = $v3['_price'];
                            $_qty = $v3['_qty'];
                            $_weight = $v3['_weight'] / 1000;
                            $_desc = $v3['_desc'];
                            $_name_product = $v3['_name_product'];
                            $_link = $v3['_link'];
                            $_link_thumb = $v3['_link_thumb'];
                            $hargabarang = $_qty * $_price;
                            $totalbarang += $_qty;

                            $pajakhargabarang = $hargabarang * $_tax / 100;


                            $subtotalbarang_perbarang = $hargabarang + $pajakhargabarang;

                            $subtotalbarang += $subtotalbarang_perbarang;
                            $subtotalpajak += $pajakhargabarang;
                            ?>
                            <div class="asd" style="border-top:1px dashed #d2d2d2; padding: 10px 0px 15px 0px;margin-bottom: 10px;color:#95999A">
                                <div style="width:10%;">
                                    <img style="border:2px solid #d2d2d2; width: 64px;height: 64px;"class="center" src="<?= $_link_thumb ?>" title="kategory 1">
                                </div>
                                <div style="width: 90%;padding:0px 10px;border:0px solid black;color:#6a6c6c;">
                                    <div class="row">
                                        <div class="product-title-cart col-7"><?= $_name_product ?></div>
                                    </div>
                                    <div class="row">
                                        <div class=" col-7">
                                            <div>Harga Rp. <?= number_format($_price) ?></div>
                                            <div>Pajak <?= $_tax ?> %</div>
                                            <div>Berat <?= $_weight ?> Kg</div>

                                            <div style="font-size:12px;margin-top:10px;color:#d91b5b;">
                                                <span style="font-weight: bold;">Keterangan</span><br/>
                                                <?= $_desc ?>
                                            </div>
                                        </div>
                                        <div class="col-2" style="text-align: center;vertical-align:middle;"><?= $_qty ?></div>
                                        <div class=" col-3" style="text-align: right;">
                                            <div>Rp. <?= number_format($hargabarang) ?></div>
                                            <div> Rp. <?= number_format($pajakhargabarang) ?></div>

                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div style="border-top: 3px dotted #733f98;margin-bottom: 10px; padding: 15px 0px;font-size: 14px">
                                <a href="#" product="<?= $_product ?>" code_detail_transaction="<?= $_code_detail_transaction ?>" class="edit-cart-item" style="margin-right: 15px;" ><i class="fas fa-edit"></i> Edit</a>
                                <a href="#" product="<?= $_product ?>" code_detail_transaction="<?= $_code_detail_transaction ?>" class="delete-cart-item" style="margin-right: 15px;" ><i class="fas fa-trash"></i> Hapus</a>
                                <a href="#" product="<?= $_product ?>" code_detail_transaction="<?= $_code_detail_transaction ?>" class="wishlist-cart-item"><i class="fas fa-heart"></i> Tambahan Wishlist</a>
                                <div class="float-right" style="color:#f7931d;text-align: right;font-size: 16px;font-weight: bold;">Rp. <?= number_format($subtotalbarang_perbarang) ?></div>
                            </div>
                            <?php
                            $subgrandtotal += $subtotalbarang_perbarang;
                            $gradtotalbarang += $hargabarang;
                            $gradtotalpajak += $pajakhargabarang;
                        }
                        ?>
                        <div style="border-top:4px double #d2d2d2; padding: 10px 0px;margin-bottom: 10px;color:#95999A;font-size:18px;color:#d91b5b;font-weight: bold;text-align: right;">
                            <?php
                            $subgrandtotal = $subgrandtotal + $subcourier
                            ?>
                            TOTAL  <?= number_format($subgrandtotal) ?>
                        </div>
                    </div>
                    <?php
                    $gradtotalcourier += $subcourier;
                }
            }
        }

        $totalall = $gradtotalcourier + $gradtotalbarang + $gradtotalpajak;
        ?>
        <style>
            .edit-cart-item i
            {
                color: #95999A;
            }
            .edit-cart-item
            {   
                color: #95999A;
            }
            .edit-cart-item:hover,.edit-cart-item:hover i
            {
                font-weight: bold;
                color: #733f98;
            }


            .wishlist-cart-item i
            {
                color: #95999A;
            }
            .wishlist-cart-item
            {   
                color: #95999A;
            }
            .wishlist-cart-item:hover,.wishlist-cart-item:hover i
            {
                font-weight: bold;
                color: #d91b5b;
            }

            .delete-cart-item i
            {
                color: #95999A;
            }
            .delete-cart-item
            {
                color: #95999A;
            }
            .delete-cart-item:hover,.delete-cart-item:hover i
            {
                font-weight: bold;
                color: #f7931d;
            }



        </style>

    </div>
    <div class="col-3">
        <div style="padding: 15px;box-shadow: 0px 2px 10px #d2d2d2;font-size:12px;color:#95999A">
            <div style="margin-bottom: 10px;">
                Total <?= $totalbarang ?> Barang 
                <span class="float-right" style="color:#f7931d;font-weight: bold;">Rp. <?= number_format($gradtotalbarang) ?></span>
            </div>

            <div style="">
                Total Pajak <?= $_tax ?> %
                <span class="float-right" style="color:#f7931d;font-weight: bold;">Rp. <?= number_format($gradtotalpajak) ?></span>
            </div>

            <div style="border-bottom: 1px solid #d2d2d2;padding:10px 0px;margin-bottom: 10px;">
                Total Ongkos Kirim
                <span class="float-right" style="color:#f7931d;font-weight: bold;">Rp. <?= number_format($gradtotalcourier) ?></span>
            </div>
            <div style="margin-bottom: 10px;">
                TOTAL 
                <span class="float-right" style="color:#f7931d;font-weight: bold;">Rp. <?= number_format($totalall) ?></span>
            </div>

            <a class="btn btn-checkout" data ="<?= $_code ?>" style="width: 100%;" href="#" role="button">Checkout</a>
        </div>

    </div>

</div>
<?php
