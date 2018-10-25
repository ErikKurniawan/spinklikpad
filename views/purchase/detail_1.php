<div id="dp-cart" class="modal fade" role="dialog">
    <div class="modal-dialog" style="width:500px !important;">
        <div class="modal-content" id="r_data">

        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $('.dp-btn-beli').click(function () {

            $.post('<?php echo URL; ?>purchase/formdeliver', {'code': $(this).attr('code'), 'noresi': $(this).attr('noresi')}, function (a) {
                $('#r_data').html(a);
            });
            $('#dp-cart').modal('show');
            
            return false;

        });
    });
</script>

<section>
    <div class="container">
        <div class="row" style="margin-top: 30px 0px 20px 0px;">
        </div>
        <div class="row">

        </div>
        <?php
        $cartlist = $this->cartlist;
        //glfn::_pre($cartlist);

        $_code = '';
        $_tax = '';
        $_status = '';
        $_detail = array();
        foreach ($cartlist as $k => $v) {
            $_code = $v['_code'];
            $_tax = $v['_tax'];
            $_status = $v['_status'];
            $_detail = $v['_detail'];
        }


        $grandtotal = 0;
        foreach ($_detail as $k => $v) {
            $_code_detail_transaction = $v['_code_detail_transaction'];
            $_transaction = $v['_transaction'];
            $_supplier = $v['_supplier'];
            $_address = $v['_address'];
            $_courier = $v['_courier'];
            $_courier_package = $v['_courier_package'];
            $_courier_price = $v['_courier_price'];
            $_no_delivery = $v['_no_delivery'];
            $_sts_delivery = $v['_sts_delivery'];
            $_name_package = $v['_name_package'];
            $_name_supplier = $v['_name_supplier'];
            $_details = $v['_details'];
            ?>
            <div class="row">
                <div class="col-sm-12">
                    <table id="tablecart<?= $_code_detail_transaction ?>" class="tablecart" style="border:2px solid #696763;width: 100%;table-collapse:collapse; margin: 20px 0px;" border="1" >
                        <tr>
                            <td valign="top" colspan="5">

                                <a href ="<?= URL ?>product?supplier=<?= $_supplier ?>"><?= $_name_supplier ?></a>
                                <?php
                                if ($_status == "5" && $_no_delivery != "" && $_sts_delivery != "2") {
                                    ?>
                                    <a code="<?=$_code_detail_transaction?>" noresi="<?=$_no_delivery?>" class="btn pull-right dp-btn-beli rs<?=$_code_detail_transaction?>" style="width:200px;">Barang Sudah Diterima</a>
                                    <?php
                                }
                                ?>
                            </td>
                        </tr>
                        <?php
                        $totalbarang = 0;
                        $totalberatbarang = 0;
                        $totalhargabarang = 0;
                        foreach ($_details as $k2 => $v2) {
                            $_code_detail_transaction = $v2['_code_detail_transaction'];
                            $_product = $v2['_product'];
                            $_price = $v2['_price'];
                            $_qty = $v2['_qty'];
                            $_weight = $v2['_weight'];
                            $_desc = $v2['_desc'];
                            $_name_product = $v2['_name_product'];
                            $hargabarang = $_qty * $_price;
                            $totalbarang += $_qty;
                            $totalberatbarang += $_weight * $_qty * 0.001;
                            $totalhargabarang += $hargabarang;
                            ?>
                            <tr>
                                <td valign="top" colspan="2">
                                    <div class="pull-left">
                                        <img style="border:1px solid #e1e1e1 ;margin:auto;" src="<?= URLSUPPLIER . PICTHUMBNAIL . 'thumb_default.png'; ?>"  onerror="this.src='<?= URL ?>public/img/thumb_default.png';" class="girl img-responsive" alt="" />

                                    </div>
                                    <div style="margin-left: 15px;margin-top:5px;" class="pull-left">
                                        <div class="label-cart">
                                            <?= $_name_product ?>
                                        </div>
                                        <div class="dtl-product">
                                            <?= $_qty ?> x Rp. <?= glfn::_currency($_price) ?> (<?= $_weight / 1000 ?>) kg
                                        </div>
                                    </div>
                                </td>
                                <td valign="top">
                                    <div  class="pull-left">
                                        <div class="label-cart">Harga Barang</div>
                                        <div>
                                            <?php echo 'Rp. ' . glfn::_currency($hargabarang) ?>
                                        </div>
                                    </div>
                                </td>
                                <td valign="top" colspan="2">
                                    <div  class="pull-left">
                                        <div class="label-cart">Keterangan</div>
                                        <div>
                                            <?php echo nl2br($_desc); ?>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                        <tr>
                            <td valign="top">
                                <div  class="pull-left" style="width:100%;">
                                    <div class="label-cart">Kurir
                                        <div style="float:right;margin-top:20px;margin-right:20px;">

                                        </div>
                                    </div>
                                    <div>
                                        <?php
                                        $asd = explode('.', $totalberatbarang);
                                        $beratround = isset($asd[1]) && ($asd[1]) > 0 ? (int) $asd[0] + 1 : $asd[0];

                                        echo $_courier . '<br>';
                                        echo $_name_package . '<br>';
                                        echo 'Rp. ' . glfn::_currency($_courier_price / $beratround);
                                        ?>
                                    </div>

                                    <div class="label-cart" style="margin-top:20px;">Alamat Tujuan 
                                        <div style="float:right;margin-top:20px;margin-right:20px;">
                                        </div>
                                    </div>
                                    <div>
                                        <?php echo nl2br($_address); ?>
                                    </div>
                                </div> 
                            </td>
                            <td valign="top">
                                <div  class="pull-left">
                                    <div class="label-cart">Total Barang</div>
                                    <div>
                                        <?php echo $totalbarang ?> (<?= $totalberatbarang ?>) Kg
                                    </div>
                                </div> 
                            </td>
                            <td valign="top">
                                <div  class="pull-left">
                                    <div class="label-cart">Subtotal</div>
                                    <div>
                                        Rp. <?= glfn::_currency($totalhargabarang) ?>
                                    </div>
                                </div> 
                            </td>
                            <td valign="top">
                                <div  class="pull-left">
                                    <div class="label-cart">PPN</div>
                                    <div>
                                        Rp. <?php
                                        $totalhargabarangppn = $totalhargabarang * $_tax * 0.01;
                                        echo glfn::_currency($totalhargabarangppn);
                                        ?>
                                    </div>
                                </div> 
                            </td>

                            <td valign="top">
                                <div  class="pull-left">
                                    <div class="label-cart">Biaya Kirim</div>
                                    <div>
                                        Rp. <?php
                                        echo glfn::_currency($_courier_price);
                                        ?>
                                    </div>
                                </div> 
                            </td>

                        </tr>
                        <tr>
                            <td class="grand-total" colspan="5">
                                <div class=" pull-right">
                                    <?php
                                    $total = $_courier_price + $totalhargabarangppn + $totalhargabarang;
                                    echo 'Total <span>Rp. ' . glfn::_currency($total) . '</span>';
                                    ?>

                                </div>
                            </td>
                        </tr>

                    </table>
                </div>
            </div>

            <?php
            $grandtotal += $total;
        }


        if ($grandtotal != 0) {
            ?>
            <div class="row">
                <div class="col-sm-12" >
                    <div style="border:0px solid #CCCCCC; padding: 10px;height:210px;">
                        
                        <hr>
                        <div>
                            <table style="text-align: right; border:0px solid black;width: 100%;">
                                <tr>
                                    <td class="total-bayar">Total Pembayaran</td>
                                </tr>
                                <tr>
                                    <td class="total-bayar">
                                        <?php
                                        echo ' <span> Rp. ' . glfn::_currency($grandtotal) . '</span>';
                                        ?>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <hr>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
</section>


<style>
    .cart-icon a:hover
    {
        color:#FE980F;
    }
    .tablecart td
    {
        padding:10px;
    }
</style>
<script type = "text/javascript">
    $(document).ready(function () {
        $('.showmodal').click(function () {
            if (!$.cookie('signin'))
            {
                window.location.replace('<?php echo URL . 'auth' ?>');
            }

            $('#dp-cart').modal('show');

            return false;
        });
    });
</script>