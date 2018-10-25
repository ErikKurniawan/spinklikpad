<?php
    $data_product = $this->product;
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

    .span-field
    {
        padding-left: 30px;
    }

</style>

<script>
    function readURL(input, type_image) {

        if (input.files && input.files[0]) {
            var _validFileExtensions = ["jpg", "jpeg", "bmp", "gif", "png"];
            split = input.value.split('.');



            var blnValid = false;
            var sFileName = input.value;
            if (sFileName.length > 0) {
                for (var j = 0; j < _validFileExtensions.length; j++) {
                    var sCurExtension = _validFileExtensions[j];
                    if (split[split.length - 1] == sCurExtension) {
                        blnValid = true;
                        break;
                    }
                }
            }

            if (!blnValid) {
                alert("Sorry, " + sFileName + " is invalid, allowed extensions are: " + _validFileExtensions.join(", "));
                return false;
            } else
            {

                var reader = new FileReader();

                reader.onload = function (e) {
                    if(type_image == 0)
                    {
                        $('#blah').attr('src', e.target.result);
                    }else{
                        $('#blah_banner').attr('src', e.target.result);
                    }
                }

                reader.readAsDataURL(input.files[0]);
            }



        }
    }
// Shorthand for $( document ).ready()
    $(function () {
        $("#fileInput").change(function () {
            readURL(this, 0);
        });

        $("#fileBanner").change(function () {
            readURL(this, 1);
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


<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"data-keyboard="false" >
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div  class="modal-content " >


            <div id="loadcontent" class="modal-body popup-modal">

            </div>

        </div>
    </div>
</div>

<div class="container-fluid section content">


    <div class="row">
        <div class="col-2" >


            <?php
            require __DIR__.'/../user/left-menu.php';
            ?>
        </div>

        <div class="col-10">

            <div style="border:1px solid #e2e7e9;padding:10px;">

                <ul style="border-bottom:1px solid #e2e7e9;" class="nav nav-pills mb-3 i-tab" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link" id="pills-home-tab" href="<?= URL ?>penjualan/index">Pesanan Baru</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-profile-tab" href="<?= URL ?>penjualan/konfirmasi">Konfirmasi Pengiriman</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " id="pills-contact-tab" href="<?= URL ?>penjualan/daftar" >Daftar Transaksi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " id="pills-contact-tab" href="<?= URL ?>penjualan/retur" >Terima Barang Retur</a>
                    </li>
                </ul>


                <script>
                    $(function () {
                        $('#frminfotoko').bootstrapValidator({
                            framework: 'bootstrap', Icons: {
                                valid: 'glyphicon glyphicon-ok',
                                invalid: 'glyphicon glyphicon-remove',
                                validating: 'glyphicon glyphicon-refresh'},

                            fields: {

                                name_toko: {validators: {
                                        notEmpty: {
                                            message: 'Nama Toko harus diisi'}}},
                                no_hp: {validators: {
                                        notEmpty: {
                                            message: 'No Handphone harus diisi'}}},
                                level_toko: {validators: {
                                        notEmpty: {
                                            message: 'Level Toko harus diisi'}}}
                            }
                        }).on('error.form.bv', function (e) {
                            e.preventDefault();
                            $('#formID').submit(false);

                        }).on('success.form.bv', function (e) {
                            e.preventDefault();
                            var $form = $(e.target);

                            $.ajax({
                                url: $form.attr('action'),
                                type: "POST",
                                data: new FormData(this),
                                contentType: false,
                                processData: false,
                                success: function (data)
                                {
                                    //alert(data);
                                    var obj = JSON.parse(data);



                                    style = 'style="border-bottom:1px dotted #d2d2d2;font-size:18px;"';
                                    style2 = 'style="margin-top:15px;font-size:16px;color:#733f98"';
                                    style3 = 'style="margin-top:15px;font-size:16px;color:#d91b5b"';
                                    if (obj.sts === 1) {
                                        $("#loadcontent").html('<div ' + style + '>Perbaharui Data</div><div ' + style3 + '>Data Berhasil Diperbaharui</div>');

                                    } else
                                    {
                                        $("#loadcontent").html('<div ' + style + '>Perbaharui Data</div><div ' + style3 + '>Tidak ada Data Yang di update</div>');
                                    }
                                    $("#exampleModalCenter").modal();
                                },
                                error: function ()
                                {
                                }
                            });
                        });
                    });

                    function saveDelivery(theid,theprod,theseq)
                    {
                        document.getElementById('theid').value = theid;
                        document.getElementById('theprod').value = theprod;
                        document.getElementById('theseq').value = theseq;
                        document.getElementById('frminfotoko').action = "<?= URL ?>penjualan/updatepengiriman";
                        document.getElementById('frminfotoko').submit();
                    }



                </script>


                <form id="frminfotoko" action="<?= URL ?>merchant/simpandata" method="post" enctype="multipart/form-data">


<?
                $no=0;
                foreach ($data_product as $key => $value) {

                    $_nama_produk = $value['_name'];
                    $_gmbr_produk = $value['_picture'];
                    $_invoice = $value['_invoice'];
                    $_tgl_invoice = $value['_tgl_invoice'];
                    $_qty = $value['_qty'];
                    $_price = $value['_price'];
                    $_name_status = $value['_status_name'];
                    $_no_delivery = $value['_no_delivery'];
                    $_courier = $value['_courier'];
                    $_send_address = $value['_send_address'];
                    $_weight = $value['_weight'] / 1000;
                    $_courier_price = $value['_courier_price'];
                    $_code_detail = $value['_code_detail'];
                    $_product = $value['_product'];

                    $_total_berat = $_weight * $_qty;
                    $_total = $_qty * $_price;
                    $_total_bayar = $_total + $_courier_price;
?>
                    <table style="border:1px solid #d2d2d2;border-bottom: 3px solid #d2d2d2; width: 100%;margin-bottom: 10px;" border="1">
                        <tr>
                            <td style="padding:15px;">
                                <div style="font-size:12px;color:#6a6c6c;">Produk</div>
                                <div style="font-size:14px;color:#733f98;font-weight: bold;"><?= $_nama_produk ?></div>
                                <img style="border:2px solid #d2d2d2;width: 64px; height: 64px;" class="center"  src="<?= PATH_IMAGE ?>product/<?php echo $_gmbr_produk;?>?a=<?= time() ?>" onerror="this.src='<?= PATH_IMAGE ?>logo.png?a=<?= time() ?>';" title="kategory 1">
                            </td>
                            <td style="width: 70%;padding:15px;">
                                <div style="font-size:13px;color:#733f98;font-weight: bold;"><?= $_invoice ?></div>
                                <div style="font-size:12px;color:#95999A;margin: 5px 0px;">
                                    Tanggal Transaksi <span style="font-weight: bold;color:#6a6c6c;"><?= $_tgl_invoice ?></span> | 
                                    Total <span style="font-weight: bold;color:#6a6c6c;">Rp <?= number_format($_total) ?></span>
                                    <a href="#" style="float: right;" class="btn btn-sm btn-success" data-toggle="modal" data-target="#pengiriman<?php echo $no;?>"> Kirim Pesanan</a>
                                    <br /><br />
                                </div>
                                <a style="color:#fff;" data-toggle="collapse" href="#test<?=$no?>" >
                                    <div style="background: #6551ff; border:1px dotted #d2d2d2;padding:10px;border-radius:3px;font-size:12px;">
                                        <div><?= $_name_status ?></div>
                                        <div>no resi : <?= $_no_delivery ?></div>
                                    </div>
                                </a>
                            </td>
                        </tr>
                        <tr >
                            <td colspan="2">
                                <div class="collapse purchsae-status" id="test<?=$no?>">

                                    <table class="purchase-courier" style=""  border="1">
                                        <tr>
                                            <td>
                                                <div  style="font-size: 14px; font-weight: bold">
                                                    Alamat Tujuan (<?= $_courier ?>)
                                                </div>
                                                <div style="font-size: 14px; font-weight: bold">

                                                </div>
                                                <div>

                                                    <?= nl2br($_send_address) ?>
                                                </div>
                                            </td>
                                            <td>
                                                <table style="width: 100%;" border="0">
                                                    <tr>
                                                        <td>
                                                            <div  style="font-size: 14px; font-weight: bold">
                                                                Jumlah Barang
                                                            </div>
                                                            <div><?= $_qty ?> Barang (<?= $_total_berat ?> kg)</div>
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
                                    <div style="padding:10px 5px;text-align: right;color:#d91b5b;font-weight: bold;font-size: 16px"> 
                                        Total Pembayaran: Rp <?= number_format($_total_bayar)?>
                                    </div>


                                </div>
                            </td>
                        </tr>
                    </table>

                    <div class="modal fade" id="pengiriman<?php echo $no;?>" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="defaultModalLabel">PENGIRIMAN BARANG</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="row clearfix">
                                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
                                            <label for="tx_diskon">No Resi</label>
                                        </div>
                                        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input type="text" id="tx_resi<?php echo $no;?>" name="tx_resi<?php echo $no;?>" class="form-control" placeholder="Masukan No Resi">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-info waves-effect" onclick="javascript:saveDelivery('<?php echo $_code_detail;?>','<?php echo $_product;?>', '<?php echo $no;?>')" > KIRIM PESANAN </button>
                                </div>
                            </div>
                        </div>
                    </div>
<?
                    $no++;
                }
?>
                    <input type="hidden" name="theid" id="theid" />
                    <input type="hidden" name="theprod" id="theprod" />
                    <input type="hidden" name="theseq" id="theseq" />
                </form>
            </div>
        </div>

    </div>
</div>