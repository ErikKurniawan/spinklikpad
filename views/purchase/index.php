

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
                        <a class="nav-link active" href="<?= URL ?>purchase" >Status Pembayaran</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"  href="<?= URL ?>purchase/status" >Status Pemesanan</a>
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

                <div class="parent4" style="width: 100%; border-bottom:1px dotted black;padding:0px 5px;margin-bottom: 10px;">
                    <div style="width: 245px;">Tanggal</div>
                    <div style="width: 250px;text-align: right;">Total Bayar</div>

                    <div style="width: 200px; text-align: right;">Tujuan Pembayaran</div>
                    <div style="text-align: right;width: 150px; ">
                        Pembatalan Pesanan
                    </div>
                    <div style="text-align: right;width: 100px; ">

                    </div>
                </div>
                <div class="wrapper center-block pruchase-status" style="border:1px solid none;">
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true" style="border:1px solid none;">

                        <?php
                        $purchase = $this->purchase;
//glfn::_pre($purchase);

                        $transaction_time = "";
                        $gross_amount = "";
                        $bank = "";
                        $details = array();

                        foreach ($purchase as $key => $v) {
                            $_code = $v['_code'];
                            $transaction_time = $v['transaction_time'];
                            $gross_amount = $v['gross_amount'];
                            $details = $v['details'];
                            $bank = $v['bank'];
                            ?>
                            <div class="panel panel-default" style="margin-bottom: 20px;">
                                <div class="panel-heading" role="tab" id="headingOne" style="padding:0px 5px;">


                                    <div class="parent" style="width: 100%; border-bottom:1px solid ;">
                                        <div style="width:245px;"><?= $transaction_time ?></div>
                                        <div style="width: 250px;text-align: right;">Rp. <?= number_format($gross_amount) ?></div>

                                        <div style="width: 200px; text-align: right;"><?= $bank ?></div>
                                        <div style="text-align: right;width: 150px; ">
                                            <a href="#" class="pruchase-cancel" code="<?= $_code ?>">
                                                <i class="fas fa-times"></i> Batalkan Pesanan
                                            </a>
                                        </div>
                                        <div style="text-align: right;width: 100px; ">
                                            <a class="detial-purchase" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?=$_code?>" >
                                                <i class="fas fa-list-ul"></i> Rincian
                                            </a>
                                        </div>
                                    </div>

                                </div>
                                <div id="collapse<?=$_code?>" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                    <div class="panel-body">
                                        <div class="row" style="width: 100%;">

                                            <?php
                                            foreach ($details as $k2 => $v2) {
                                                ?>
                                                <div class="col-3" style="padding :15px 20px;" >
                                                    <a href="<?= URL ?>/invoice?a=<?= $v2['_invoice'] ?>"><?= $v2['_invoice'] ?></a>
                                                </div>
                                                <?php
                                            }
                                            ?>



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

        </div>
    </div>

</div>




