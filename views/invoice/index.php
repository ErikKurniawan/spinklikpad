<?php
$invoice = $this->invoice;




$_code_detail_transaction = "";
$_transaction = "";
$_supplier = "";
$_address = "";
$_courier = "";
$_courier_package = "";
$_courier_price = "";
$_no_delivery = "";
$_sts_delivery = "";
$_customer_feedback = "";
$_zipcode = "";
$_province = "";
$_subprovince = "";
$_district = "";
$_subdistrict = "";
$_invoice = "";
$_bank = "";
$_fraud_status = "";
$_details = array();

foreach ($invoice as $k2 => $v2) {


    $_code_detail_transaction = $v2['_code_detail_transaction'];
    $_supplier = $v2['_supplier'];
    $_address = $v2['_address'];
    $_invoice = $v2['_invoice'];
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
    $_fraud_status = $v2['_fraud_status']==null ? "": $v2['_fraud_status'];
    $_bank = $v2['_bank'];
}
?>

<style>
    .crop {
        width: 200px;
        height: 100px;
        border:0px solid red;
        padding-top:20px;
    }

    .crop img {
        width: 200px;
        height: 200px;
        margin: -50px 0 0px 0px;
    }
</style>

<div style="width: 800px;border:1px solid none;padding:10px 10px;">
    <div class="row">
        <div class="col-12">
            <div class="crop">
                <img class="img-fluid" src="<?= URL ?>public/image/logo2.png?a=<?=time()?>"/>
            </div>
        </div>

    </div>
    <div class="row mt-5">
        <div class="col-6" style="font-size: 16px; font-weight: bold;">
            Invoice
        </div>
        <div class="col-6" style="font-size: 16px; font-weight: bold;text-align: right;">
            <?= $_invoice ?>
        </div>
    </div>
    <div class="row" >
        <div class="col-2" style="font-size: 14px; font-weight: bold;padding-left:15px !Important; ">
            Penjual
        </div>
        <div class="col-4" style="font-size: 14px; ">
            <?= $_name_supplier ?>
        </div>
        <div class="col-4" style="font-size: 14px; font-weight: bold;text-align: right;">

        </div>
        <div class="col-2" style="font-size: 14px; text-align: right;">

        </div>
    </div>


    <style>
        .list-purchase
        {
            border-top:1px dotted #d2d2d2;
            margin-top: 15px;
            width: 100%;
            font-size: 12px;
            text-align: center;
        }


        .list-purchase th:first-child,.list-purchase td:first-child
        {
            text-align: left;
        }


        .list-purchase th:last-child,.list-purchase td:last-child
        {
            text-align: right;
        }

        .list-purchase th
        {
            padding :10px 10px;
            font-size: 14px;
            text-align: center;
        }
        .list-purchase td
        {
            padding :10px 10px;
        }

        .subtotal-purchase
        {
            background: #d2d2d2;
        }
        .subtotal-purchase
        {
            font-weight: bold;
            padding: 100px;
        }

        .courier-purchase
        {
            margin-top: 200px;
            border-top:1px dotted black;

        }
    </style>


    <div class="row" style="padding-bottom: 10px;">
        <div class="col-12">
            <table class="list-purchase"  border="0">
                <thead>
                    <tr>
                        <th>Nama Produk</th>
                        <th style="width: 130px">Jumlah Barang</th>
                        <th style="width: 100px">Berat</th>
                        <th style="width: 150px">Harga Barang</th>
                        <th style="width: 150px">Subtotal</th>
                    </tr>
                </thead>
                <?php
                $totalberat = 0;
                $totalhargabarang = 0;
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


                    $totalberat += $_weight;
                    $totalhargabarang += $hargabarang;

                    /*
                      $totalbarang += $_qty;
                      $totalberatbarang += $_weight * $_qty;

                      $totalcourier = $_courier_price * $_weight * $_qty;
                      $totalhargacourier += $_courier_price * $_weight * $_qty;

                      $totalhargabarang += $_price * $_qty;


                      $totalsubtotal = $totalcourier + $hargabarang;


                      $grandtotalbarang += $totalbarang;
                      $grandtotalhargacourier += $totalhargacourier;
                      $grandtotalhargabarang += $totalhargabarang;

                     */
                    ?>
                    <tr>
                        <td><?= $_name_product ?></td>
                        <td><?= $_qty ?></td>
                        <td><?= $_weight ?> kg</td>
                        <td>Rp <?= number_format($_price) ?></td>
                        <td>Rp <?= number_format($hargabarang) ?></td>

                    </tr>
                    <?php
                }
                ?>
                <tr class="subtotal-purchase">
                    <td colspan="4">Subtotal</td>
                    <td >Rp <?= number_format($totalhargabarang) ?></td>
                </tr>
            </table>

            <table class="list-purchase"  border="0">
                <tr>
                    <td><?= $_courier ?></td>
                    <td style="width: 130px">&nbsp;</th>
                    <td style="width: 100px"><?= $totalberat ?></td>
                    <td style="width: 150px">
                        Rp. 
                        <?php
                        $checkdecimal = explode('.', $totalberat);
                        if (count($checkdecimal) > 1) {

                            $totalberat = $checkdecimal[0] + 1;
                        }

                        echo number_format($_courier_price / $totalberat);
                        ?></td>
                    <td style="width: 150px">Rp. <?= number_format($_courier_price) ?></td>
                </tr>


                <tr class="subtotal-purchase">
                    <td colspan="4">Subtotal</td>
                    <td >Rp <?= number_format($_courier_price) ?></td>
                </tr>
            </table>

            <table  style="margin-top:10px;font-size: 24px;width: 100%;color:#d91b5b;font-weight: bold;"  border="0">
                <tr>
                    <td>&nbsp;</td>
                    <td style="width: 230px;text-align: right;padding:15px;">TOTAL </td>
                    <td style="width: 300px;text-align: right;padding-top:15px;">Rp <?= number_format($totalhargabarang + $_courier_price) ?></td>
                </tr>


            </table>
        </div>
    </div>

    <div class="row" style="padding-bottom: 10px;">
        <div class="col-6" style="font-size: 14px; ">
            <div  style="font-size: 14px; font-weight: bold;margin-bottom: 10px;">
                Tujuan Pengirim
            </div>
            <?= nl2br($_address) ?>


        </div>
        <div class="col-6" style="font-size: 14px; text-align: right">
            <div  style="font-size: 14px; font-weight: bold;margin-bottom: 10px;">
                Pembayaran
            </div>
            <div style="margin-bottom: 10px;">
                <?=$_bank?>
            </div>

            <div  style="font-size: 14px; font-weight: bold;margin-bottom: 10px;">
                Status Pembayaran
            </div>
            <?php
            if ($_fraud_status != "accept") {
                ?>
                <div style="margin-bottom: 10px; border:1px solid #d2d2d2;display: inline-block;padding:10px;font-weight: bold;color:#d91b5b;">
                    BELUM LUNAS
                </div>
                <?php
            } else {
                ?>
                <div style="margin-bottom: 10px; border:1px solid #d2d2d2;display: inline-block;padding:10px;font-weight: bold;color:#733f98;">
                    LUNAS
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</div>