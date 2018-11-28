<?php
$purchasestatus = $this->purchasestatus;
$listdataaddress = $this->listaddress;
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

    function cancelOrder(thecode)
    {
        document.getElementById('thecode').value = thecode;
        document.getElementById('frmcancelorder').action = '<?= URL ?>pembelian/cancel';
        document.getElementById('frmcancelorder').submit();
    }

    function approveOrder(thecode)
    {
        document.getElementById('thecode').value = thecode;
        document.getElementById('frmcancelorder').action = '<?= URL ?>pembelian/approve';
        document.getElementById('frmcancelorder').submit();
    }

    $(document).ready(function () {
        $('body').on('click', '.btn-showmodal', function () {
            if (!$.cookie('signin'))
            {
                window.location.replace('<?= URL ?>user/signin');
            } else {
                $.post('<?php echo URL; ?>order/formsetujuorder', {
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


    <form id="frmcancelorder" action="" method="post" enctype="multipart/form-data">
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
                            <a class="nav-link active" id="pills-home-tab" href="<?= URL ?>pembelian/order">Baru Order</a>
                        </li>
                        <!--
                        <li class="nav-item">
                            <a class="nav-link" id="pills-profile-tab" href="<?= URL ?>pembelian/pembayaran">Status Pembayaran</a>
                        </li>-->
                        <li class="nav-item">
                            <a class="nav-link " id="pills-contact-tab" href="<?= URL ?>pembelian" >Daftar Transaksi</a>
                        </li><!--
                        <li class="nav-item">
                            <a class="nav-link " id="pills-contact-tab" href="<?= URL ?>penjualan/retur" >Terima Barang Retur</a>
                        </li>-->
                    </ul>


                    <?php
                    $no=0;
      
                        
                        foreach ($purchasestatus as $k2 => $v2) {
                        $no++;    
                            $_invoice = $v2['_invoice'];
                            $_name_supplier = $v2['_name_supplier'];
                            $_supplier = $v2['_supplier'];
                            $_address = $v2['_address'];
                            $_courier = $v2['_courier'];
                            $_no_delivery = $v2['_no_delivery'];
                            $_courier_price = $v2['_courier_price'];
                            $_name_status = $v2['_name_status'];
                            $transaction_time = $v2['transaction_time'];
                            $_name_distributor = $v2['_name_distributor'];
                            $_qty = $v2['_qty'];
                            $_weight = $v2['_weight'];
                            $_price = $v2['_price'];
                            $_picture = $v2['_picture'];
                            $_name_product = $v2['_name_product'];
                            $_desc = $v2['_desc'];
                            $_code_transaction = $v2['_code_transaction'];

                            
                            $totalbayar = 0;
                            $totalbarang = 0;
                            $totalberat = 0;
                            $totalbarang += $_qty;

                            $totalberat += $_weight;
                            $totalbayar += $_price * $_qty;
                            
                            $totalbayar = $totalbayar + $_courier_price;
                            ?>
                            <table style="border:1px solid #d2d2d2;border-bottom: 3px solid #d2d2d2; width: 100%;margin-bottom: 10px;" border="1">
                                <tr>
                                    <td style="padding:15px;">
                                        <div style="font-size:12px;color:#6a6c6c;">Pembelian Dari</div>
                                        <div style="font-size:14px;color:#733f98;font-weight: bold;"><?= $_name_distributor ?></div>
                                        
                                        
                                        
                                        <img class="img-fluid" style="width: 64px;height: 64px;border:3px solid #d2d2d2;background:white;" src="<?= PATH_IMAGE ?>customer/<?= $picture_customer ?>.jpg?a=<?= time() ?>" onerror="this.src='<?= PATH_IMAGE ?>customer/def-customer.jpg?a=<?= time() ?>';"  />
           
                                        
                                    </td>
                                    <td style="width: 85%;padding:15px;">
                                        <div style="font-size:13px;color:#733f98;font-weight: bold;"><?= $_invoice ?></div>
                                        <div style="font-size:12px;color:#95999A;margin: 5px 0px;">
                                            Tanggal Transaksi <span style="font-weight: bold;color:#6a6c6c;"><?= $transaction_time ?></span> | 
                                            Total <span style="font-weight: bold;color:#6a6c6c;">Rp <?= number_format($totalbayar) ?></span>
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
                                                <tr>
                                                    <td style="width: 50%;border:0px solid black;">
                                                        
                                                        <img style="height: 64px;width: 64px;border:3px solid #d2d2d2;" src="<?= PATH_IMAGE_DISTRIBUTOR ?><?php echo $_picture;?>?a=<?= time() ?>" onerror="this.src='<?= PATH_IMAGE ?>logo.png?a=<?= time() ?>';" />
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
                                                            Catatan untuk Distributor
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
                                            </table>
                                            <div style="padding:10px 5px;text-align: right;color:#d91b5b;font-weight: bold;font-size: 16px">

                                                <button type="button" class="btn btn-xs btn-success float-left" data-toggle="modal" data-target="#exampleModalCenter<?php echo $_code_transaction;?>">
                                                    Setuju Order
                                                </button>

                                                <button type="submit" class="btn btn-xs btn-danger float-left" onclick="javascript:cancelOrder('<?php echo $_code_transaction;?>')">
                                                    Batal Order
                                                </button>

                                                Total Pembayaran: Rp <?= number_format($totalbayar)?>
                                            </div>


                                        </div>
                                    </td>
                                </tr>
                            </table>





                            <div class="modal fade" id="exampleModalCenter<?php echo $_code_transaction;?>" tabindex="-1" role="dialog"data-keyboard="false" data-backdrop="static">
                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                    <div  class="modal-content " >


                                        <div id="loadcontent" class="modal-body popup-modal">
                                            <div style="border-bottom:1px dashed #d2d2d2;padding-bottom:10px;">
                                                <h5 style="display: inline-block" class="modal-title" id="exampleModalLabel">Order Barang</h5>
                                                <button style="border:0px !important;" type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>

                                            </div>
                                            <input type="hidden" id="_code" name="_code_detail_transaction" value="<?= $post['_code_detail_transaction'] ?>">
                                            <div style="border-bottom:1px dashed #d2d2d2;padding:15px 0px;">
                                                <div class="row" >
                                                    <div class="col-1" style="">
                                                         <div style="display: inline-block;line-height:60px;height: 60px;width:60px; border:1px solid #d2d2d2;border-radius: 5px;" >
                                                            <center>
                                                                <img class="img-fluid" src="<?= PATH_IMAGE_DISTRIBUTOR ?><?php echo $_picture;?>?a=<?= time() ?>" onerror="this.src='<?= URL ?>public/image/default.jpg';"  title="kategory 1"/>
                                                            </center>
                                                        </div>
                                                    </div>
                                                    <div class="col-5">
                                                        <div class="label-cart">Produk</div>
                                                       
                                                        <h6 style="color:#733f98;"><?= $_name_product ?></h6>
                                                        <div class="row" >
                                                            <div class="col-sm-4" style="border:0px solid black;">
                                                                <div class="label-cart">Jumlah Barang</div>
                                                                <input number class="simplebox" style="width:100%;" type="text" id="qty<?php echo $_code_transaction;?>" name="qty<?php echo $_code_transaction;?>" value="<?= $_qty ?>">
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <div class="label-cart">Harga Barang</div>
                                                                Rp. <?= glfn::_currency($_price) ?>
                                                                <input style="border:none;" type="hidden" id="price" name="price" readonly value="<?= glfn::_currency($_discount_price) ?>">
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <div class="label-cart">Berat Barang</div>
                                                                <?= $_weight ?> (g) / <?= $_weight / 1000 ?> (Kg)
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="label-cart">Keterangan</div>
                                                        <textarea class="simplebox" placeholder="Keterangan" name="desc<?php echo $_code_transaction;?>" id="desc<?php echo $_code_transaction;?>" cols="" rows="4"><?= $_desc ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div style="border-bottom:1px dashed #d2d2d2;padding:15px 0px;">
                                                <div class="row" style="padding:0px 0px;">
                                                    <div class="col-6 label-cart">
                                                        Alamat
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-9">
                                                        <textarea class="simplebox"  readonly id="address<?php echo $_code_transaction;?>" name="address<?php echo $_code_transaction;?>" rows="6" cols="1000">
<?php
                                                            $no = 0;
                                                            foreach ($listdataaddress as $k => $v) {

                                                                $_email = $v['_email'];
                                                                $_seq = $v['_seq'];
                                                                $_alias = $v['_alias'];
                                                                $_name = $v['_name'];
                                                                $_hp = $v['_hp'];
                                                                $_address = $v['_address'];
                                                                $_zipcode = $v['_zipcode'];
                                                                $_province = $v['_province'];
                                                                $_subprovince = $v['_subprovince'];
                                                                $_district = $v['_district'];
                                                                $_subdistrict = $v['_subdistrict'];

                                                                if ($no == 0) {
                                                                    echo ucfirst($_name) . PHP_EOL
                                                                    . $_hp . PHP_EOL . PHP_EOL
                                                                    . $_address
                                                                    . ', ' . ucfirst(strtolower($_province))
                                                                    . ', ' . ucfirst(strtolower($_subprovince)) . PHP_EOL
                                                                    . $_district . PHP_EOL
                                                                    . $_subdistrict . PHP_EOL
                                                                    . $_zipcode . PHP_EOL;
                                                                }

                                                                $no++;
                                                            }
?>
                                                        </textarea>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="label-cart" style="margin-bottom:20px;" >
                                                            <a class="btn btn-sinin" href="<?= URL ?>user/address">
                                                                Tambah Alamat Baru
                                                                <i class="fa fa-plus"></i>
                                                            </a>
                                                        </div>
                                                        <div class="label-cart" style="border:1px solid #d2d2d2; border-radius: 5px;display: inline-block;padding:5px 10px;">
                                                            <?php
                                                            $no = 0;
                                                            $_seq = 0;
                                                            foreach ($listdataaddress as $k => $v) {

                                                                $_email = $v['_email'];

                                                                if ($no == 0) {
                                                                    $_seq = $v['_seq'];
                                                                }
                                                                $no++;
                                                            }
                                                            ?>

                                                            <style>
                                                                .dp-add li:hover
                                                                {
                                                                    border-bottom: 1px dashed #d2d2d2;
                                                                    background: #fafafa;

                                                                }
                                                                .dp-add a:hover
                                                                {

                                                                }
                                                                .cart-address:hover
                                                                {

                                                                }
                                                            </style>
                                                            <div class="btn-group">
                                                                <a class="dropdown-toggle"  data-toggle="dropdown"> Pilih Alamat 

                                                                </a>

                                                                <?php
                                                                $overflow = '';
                                                                if (count($listdataaddress) > 3) {

                                                                    $overflow = 'overflow-y: scroll;height:200px;';
                                                                }
                                                                ?>

                                                                <ul class="dropdown-menu dp-add"  style="<?= $overflow ?> background: #fff !important;border:1px solid #d2d2d2 !important;padding:0px;width: 300px;margin-top:0px;">
                                                                    <?php
                                                                    $no = 0;
                                                                    foreach ($listdataaddress as $k => $v) {

                                                                        $_email = $v['_email'];
                                                                        $_seq = $v['_seq'];
                                                                        $_alias = $v['_alias'];
                                                                        $_name = $v['_name'];
                                                                        $_hp = $v['_hp'];
                                                                        $_address = $v['_address'];
                                                                        $_zipcode = $v['_zipcode'];
                                                                        $_province = $v['_province'];
                                                                        $_subprovince = $v['_subprovince'];
                                                                        $_district = $v['_district'];
                                                                        $_subdistrict = $v['_subdistrict'];


                                                                        $no++;
                                                                        echo '<li>'
                                                                        . '<a class="cart-address" style="border:0px solid red;display:block;margin:0px;padding:5px 10px;" seq= "' . $v['_seq'] . '" href="">'
                                                                        . '<div>' . $no . '. ' . strtoupper($v['_name']) . '</div>'
                                                                        . $v['_alias']
                                                                        . '</a>'
                                                                        . '</li>';
                                                                    }
                                                                    ?>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div style=";padding-top:15px;">
                                            <!--
                                                <div class="row" style="">
                                                    <div class="col-sm-3 label-cart">
                                                        Kurir Pengiriman
                                                    </div>
                                                    <div class="col-sm-3 label-cart">
                                                        Paket Pengiriman
                                                    </div>


                                                    <div class="col-sm-2 label-cart">
                                                        PPN ( 10 % )
                                                    </div>
                                                    <div class="col-sm-2 label-cart">
                                                        Ongkos Kirim
                                                    </div>
                                                    <div class="col-sm-2 label-cart">
                                                        Subtotal
                                                    </div>
                                                </div>

                                                <div class="row" style="">
                                                    <div class="col-sm-3">
                                                        <select class="simplebox" id="courier" name="courier">
                                                            <option value="">----------------</option>
                                                            <?php
                                                            foreach ($listcourier as $k => $v) {
                                                                $selected = $v['_code'] == $_courier ? 'selected' : '';
                                                                echo '<option ' . $selected . ' value="' . $v['_code'] . '">' . $v['_code'] . '</option>';
                                                                //echo '<option ' . $selected . ' value="'.$v['_code'].'">' . $v['_code'] . '</option';
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-group " >
                                                            <div class="inputGroupContainer">
                                                                <select class="simplebox" id="courier_package" name="courier_package">
                                                                    <option value="">----------------</option>
                                                                    <?php
                                                                    if (count($_detail) > 0) {
                                                                        $post['_code'] = $_courier;
                                                                        $curlcourier = glfn::_curl_api2('courier/detail', $post);
                                                                        $listcourierpackage = $curlcourier['sts'] ? $curlcourier['data'] : array();


                                                                        foreach ($listcourierpackage as $key => $v) {
                                                                            $selected = $v['_seq'] == $_courier_package ? 'selected' : '';
                                                                            echo '<option ' . $selected . ' value="' . $v['_seq'] . '" >' . $v['_name'] . '</option>';
                                                                        }
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="col-sm-6 label-cart">
                                                        <div id="price-courier" class="row">
                                                            <div class="col-sm-4">
                                                                PPN ( 10 % )
                                                            </div>
                                                            <div class="col-sm-4">
                                                                Ongkos Kirim
                                                            </div>
                                                            <div class="col-sm-4">
                                                                Subtotal
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
-->



                                            </div>
                                            <input type="hidden" name="product" id="product" value="<?php echo $post['_product'] ?>"/>
                                            <input type="hidden" name="code_detail_transaction" id="code_detail_transaction" value="<?php echo $post['_code_detail_transaction'] ?>"/>
                                            <input type="hidden" name="flag" id="flag" value="upt"/>
                                            <button  type='submit' class="float-right btn btn-to-cart" onclick="javascript:approveOrder('<?php echo $_code_transaction;?>')">Setuju Order</button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    
                    ?>



                </div>

            </div>
        </div>
        <input type="hidden" name="thecode" id="thecode">
    </form>

</div>




