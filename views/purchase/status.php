<?php
$purchasestatus = $this->purchasestatus;
//glfn::_pre($purchasestatus);
?>

<style>
    .btn-profile-change
    {
        background: #d91b5b;
        font-size:10px;
        color: #fff !important;

    }
    .btn-profile-change i
    {
        background: #d91b5b;
        color: #fff;

    }
    .profile-name
    {
        padding:10px 0px;
        font-weight: bold;
        font-size:16px;
        color: #733f98 ;
    }


    .profile-data
    {
        padding:5px 0px;
        border-bottom:1px solid #e2e7e9;
        font-size: 14px;
    }
    .profile-data i
    {
        color :#95999A;
    }

    .profile-data span
    {
        padding-left:10px;
        color:#6a6c6c;
    }

    .profile-data:last-child
    {
        border-bottom:none;
    }

    .profile-title
    {
        color:#733f98;
        font-size:14px;
        border-bottom: 1px solid #e2e7e9;
        padding: 5px 0px;
    }

    .profile-fav-supplier img
    {
        border:1px solid #95999A;
        width: 70px;
        height: 70px;
    }

    .profile-container-supplier-icon
    {
        display: inline-block;
    }

    .profile-container-supplier-icon div
    {
        font-size: 12px;
        color:#d91b5b;
        text-align: center;
        white-space: nowrap; 
        width: 70px; 
        overflow: hidden;
        text-overflow: ellipsis; 
    }

    input[type="file"] {
        display: none;
    }
    .custom-file-upload {
        border: 1px solid #ccc;
        width: 100%;
        line-height: 30px;
        height: 30px;
        text-align: center;
        cursor: pointer;
    }
    img
    {
        width: 100%;
    }

    .profile-address
    {
        font-size: 14px;
    }



    .parent { display: table;width: 100%; }
    .parent > div {display: table-cell; 
                   border:0px solid #e2e7e9;
                   vertical-align:top; 
                   padding:10px  5px 5px 5px;
    }

    .parent4 { display: table;width: 100%; }
    .parent4 > div {display: table-cell; 
                    border:0px solid #e2e7e9;
                    vertical-align:top; 
                    padding:10px  5px 5px 5px;
                    font-size: 12px;
    }

    /*
        .panel-heading  a:before {
            font-family: "Font Awesome 5 Free";
            font-weight: 900; 
            content: "\f0d8";
            float: right;
            margin-right: 5px;
            transition: all 0.5s;
        }
    .panel-heading.active a:before {
            -webkit-transform: rotate(180deg);
            -moz-transform: rotate(180deg);
            transform: rotate(180deg);
        } 
    */
    .panel-heading.active .detial-purchase {
        color:red !important;
    } 

    .pruchase-status .panel-heading a,.pruchase-status
    {
        font-size:12px;
        color:black;
    }
</style>

<script>
    function readURL(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
// Shorthand for $( document ).ready()
    $(function () {
        $("#file-upload").change(function () {
            readURL(this);
        });
    });

</script>
<style>
    .purchsae-status
    {

        margin: 1%;
        font-size: 12px;


    }
    .purchase-courier
    {
        width: 100%;border:1px solid #d2d2d2;
    }
    .purchase-courier td
    {
        padding:10px;
        width: 50%;
        vertical-align:top; 
    }
    .purchsae-list
    {
        width: 100%;border:1px solid #d2d2d2;
    }

    .purchsae-list td
    {
        padding:10px;
        vertical-align:top; 
    }
</style>
<div class="container-fluid section content">


    <div class="row"> 

        <div class="col-2" >
            <?php
            require __DIR__ . '/../user/left-menu.php';
            ?>
        </div>

        <div class="col-10">
            <div style="border:1px solid #e2e7e9;padding:10px;">

                <ul style="border-bottom:1px solid #e2e7e9;" class="nav nav-pills mb-3 i-tab" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link " href="<?= URL ?>purchase" >Status Pembayaran</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active"  href="<?= URL ?>purchase/status" >Status Pemesanan</a>
                    </li>
                    <!--
                    <li class="nav-item">
                        <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Konfirmasi Penerimaan</a>
                    </li>
                    -->
                    <li class="nav-item">
                        <a class="nav-link"  href="<?= URL ?>purchase/history">Daftar Transaksi</a>
                    </li>
                </ul>

                <?php
                $no = 0;


                foreach ($purchasestatus as $k2 => $v2) {
                    $no++;
                    $_invoice = $v2['_invoice'];
                    $_name_supplier = $v2['_name_supplier'];
                    $_supplier = $v2['_supplier'];
                    $_address = $v2['_address'];
                    $_courier = $v2['_courier'];
                    $_name_package = $v2['_name_package'];
                    $_no_delivery = $v2['_no_delivery'];
                    $_courier_price = $v2['_courier_price'];
                    $_details = $v2['_details'];
                    $_name_status = $v2['_name_status'];
                    $transaction_time = $v2['transaction_time'];
                    $_code_detail_transaction = $v2['_code_detail_transaction'];
                    $_sts_delivery = $v2['_sts_delivery'];

                    $totalbayar = 0;
                    $totalbarang = 0;
                    $totalberat = 0;
                    foreach ($_details as $k3 => $v3) {
                        $_product = $v3['_product'];
                        $_price = $v3['_price'];
                        $_qty = $v3['_qty'];

                        $_picture = $v3['_picture'];
                        $_weight = $v3['_weight'] / 1000;
                        $_desc = $v3['_desc'];
                        $_name_product = $v3['_name_product'];
                        $_link = $v3['_link'];
                        $_link_thumb = $v3['_link_thumb'];
                        $totalbarang += $_qty;

                        $totalberat += $_weight;
                        $totalbayar += $_price * $_qty;
                    }

                    $totalbayar = $totalbayar + $_courier_price;
                    ?>
                    <table style="border:1px solid #d2d2d2;border-bottom: 3px solid #d2d2d2; width: 100%;margin-bottom: 10px;" border="1">
                        <tr>
                            <td style="padding:15px;">
                                <div style="font-size:12px;color:#6a6c6c;">Pembelian Dari Toko</div>
                                <div style="font-size:14px;color:#733f98;font-weight: bold;"><?= $_name_supplier ?></div>

                                <img style="width: 64px;height: 64px;border:3px solid #d2d2d2;background:white;" class="img-fluid" src="<?= PATH_IMAGE ?>merchant/<?= $_image ?>?a=<?= time() ?>" onerror="this.src='<?= PATH_IMAGE ?>logo.png?a=<?= time() ?>';"/>


                            </td>
                            <td style="width: 85%;padding:15px;">
                                <div style="font-size:13px;color:#733f98;font-weight: bold;"><?= $_invoice ?>
                                    <?php if ($_sts_delivery == 5) { ?>


                                        <button type="button" onclick="parsecode('<?= $_code_detail_transaction ?>')" class="btn btn-xs btn-success float-right" data-toggle="modal" data-target="#exampleModal">
                                            Terima barang
                                        </button>

                                    <?php } ?>


                                </div>
                                <div style="font-size:12px;color:#95999A;margin: 5px 0px;">
                                    Tanggal Transaksi <span style="font-weight: bold;color:#6a6c6c;"><?= $transaction_time ?></span> | 
                                    Total <span style="font-weight: bold;color:#6a6c6c;">Rp <?= number_format($totalbayar) ?></span>
                                </div>
                                <a style="color:#fff;" data-toggle="collapse" href="#test<?= $no ?>" >
                                    <div style="background: #6551ff; border:1px dotted #d2d2d2;padding:10px;border-radius:3px;font-size:12px;">
                                        <div><?= $_name_status ?></div>
                                        <div>no resi : <?= $_no_delivery ?></div>
                                    </div>
                                </a>
                            </td>
                        </tr>
                        <tr >
                            <td colspan="2">
                                <div class="collapse purchsae-status" id="test<?= $no ?>">

                                    <table class="purchase-courier" style=""  border="1">
                                        <tr>
                                            <td>
                                                <div  style="font-size: 14px; font-weight: bold">
                                                    Alamat Tujuan (<?= $_courier ?>)
                                                </div>
                                                <div style="font-size: 14px; font-weight: bold">

                                                </div>
                                                <div>

                                                    <?= nl2br($_address) ?>
                                                </div>
                                            </td>
                                            <td>
                                                <table style="width: 100%;" border="0">
                                                    <tr>
                                                        <td>
                                                            <div  style="font-size: 14px; font-weight: bold">
                                                                Jumlah Barang
                                                            </div>
                                                            <div><?= $totalbarang ?> Barang (<?= $totalberat ?> kg)</div>
                                                        </td>
                                                        <td style="v">
                                                            <div  style="font-size: 14px; font-weight: bold">
                                                                Ongkos Kirim
                                                            </div>
                                                            <div> Rp <?= number_format($_courier_price) ?></div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div  style="font-size: 14px; font-weight: bold">
                                                                Terima Sebagian
                                                            </div>
                                                            <div>Tidak</div>

                                                        </td>
                                                        <td>
                                                            <div  style="font-size: 14px; font-weight: bold">

                                                            </div>
                                                            <div></div>

                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>

                                    </table>
                                    <div style="padding:10px 5px;">
                                        <i class="fa fa-list" aria-hidden="true"></i> Daftar Produk    
                                    </div>

                                    <table class="purchsae-list" border="1">

                                        <?php
                                        foreach ($_details as $k3 => $v3) {
                                            $_product = $v3['_product'];
                                            $_price = $v3['_price'];
                                            $_qty = $v3['_qty'];
                                            $_weight = $v3['_weight'] / 1000;
                                            $_desc = $v3['_desc'];
                                            $_picture = $v3['_picture'];
                                            $_name_product = $v3['_name_product'];
                                            $_link = $v3['_link'];
                                            $_link_thumb = $v3['_link_thumb'];
                                            ?>
                                            <tr>
                                                <td style="width: 50%;border:0px solid black;">

                                                    <img style="height: 64px;width: 64px;border:3px solid #d2d2d2;" src="<?= PATH_IMAGE ?>product/<?= $_picture ?>?a=<?= time() ?>" onerror="this.src='<?= PATH_IMAGE ?>logo.png?a=<?= time() ?>';" />
                                                    <div  style="font-size: 12px; font-weight: bold;display: inline-block;vertical-align:top;padding:5px; border:px solid red;width:330px;">
                                                        <div style="border:0px solid black;height: 40px;">
                                                            <?= $_name_product ?>
                                                        </div>
                                                        <div  style="font-size: 11px;color:#95999A">
                                                            <?= $_qty ?> Barang (<?= $_weight ?> kg) x Rp <?= number_format($_price) ?>
                                                        </div>
                                                    </div>
                                                </td>


                                                <td>
                                                    <div  style="font-size: 14px; font-weight: bold">
                                                        Catatan untuk Penjual
                                                    </div>
                                                    <div><?= $_desc ?></div>
                                                </td>
                                                <td>
                                                    <div  style="font-size: 14px; font-weight: bold">
                                                        Harga Barang
                                                    </div>
                                                    <div>Rp <?= number_format($_price) ?></div>
                                                </td>

                                            </tr>
                                            <?php
                                        }
                                        ?>

                                    </table>
                                    <div style="padding:10px 5px;text-align: right;color:#d91b5b;font-weight: bold;font-size: 16px"> 
                                        Total Pembayaran: Rp <?= number_format($totalbayar) ?>
                                    </div>


                                </div>
                            </td>
                        </tr>
                    </table>
                    <?php
                }
                ?>



            </div>

        </div>
    </div>

</div>



<script>
    function parsecode(code)
    {

        $('#_ctd').val(code)
    }
</script>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="frmprofileedit" action="<?= URL ?>purchase/penerimanaan" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Terima barang</h5>

                </div>
                <div class="modal-body row">

                    <div class="col-12">Barang Sudah Diterima ?</div>


                    <input type="hidden" name="_ctd" id="_ctd">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Belum</button>
                    <button type="submit" class="btn btn-primary">Sudah</button>
                </div>
            </form>
        </div>
    </div>
</div>



