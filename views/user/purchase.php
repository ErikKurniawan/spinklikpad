

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
            
            require 'left-menu.php';
            
            ?>
        </div>

        <div class="col-10">
            <div style="border:1px solid #e2e7e9;padding:10px;">

                <ul style="border-bottom:1px solid #e2e7e9;" class="nav nav-pills mb-3 i-tab" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Status Pemesanan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Status Pembayaran</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Konfirmasi Penerimaan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Daftar Transaksi</a>
                    </li>
                </ul>

                <div class="row">
                    <div class="col" style="">
                        <div class="row">
                            <div class="col-12">
                                <div style="font-size:12px;color:#95999A;margin-bottom: 20px;"> Pembelian dari toko <span style="color:#733f98">Aan</span></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2" >
                                
                                <div style="border:1px solid yellow;">
                                    <img style="border:1px solid red;width: 131px" class="img-fluid" src="<?= PATH_IMAGE ?>asset/icon_categories_32px-0111.png" onerror="this.src='<?= URL ?>public/image/default.jpg';"  title="kategory 1"/>

                                </div>
                            </div>
                            <div class="col-6" style="font-size:12px;color:#95999A;">
                                <div style="margin-bottom: 10px;color:#6a6c6c; font-size: 14px;">Kemeja wanita terbaik</div>
                                <div style="margin-bottom: 10px;">Keterangan warna biru</div>
                                <div style="margin-bottom: 10px;">Jumlah 1</div> 
                                <div style="margin-bottom: 10px;">Pengimriman  GO-Send</div>
                                <div style="margin-bottom: 10px;">Estimasi Pengiriman 18-08-2018</div>
                            </div>
                            <div class="col-2" style="font-size:12px;color:#95999A;">
                                <div style="margin-bottom: 100px;">19,000,000.00</div>    
                                <div>harga 2 </div>    
                                <div>rincian</div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        Pembayaran Sebelum Tanggal  18 Juli 2029 dengan Bank BCA
                        <div>INVOICE01823817391</div>
                        <div>Liat Invoice</div>


                    </div>
                    <div class="col-2">
                        <div>Total Belanja</div>
                        <div>Biaya Pengiriman</div>
                        <div>Voucher</div>
                        <div>Total Pembayaran</div>
                    </div>
                    <div class="col-2">
                        <div>19,000,000.00</div>
                        <div>9,000.00</div>
                        <div>50,000.00</div>
                        <div>19,059,000.00</div>
                    </div>`
                </div>
                <div class="row">
                    <div class="col-12">
                        <input type="button" class="btn btn-secondary" value="Test"/>
                        <input type="button" class="btn btn-primary" value="Test 2"/>


                    </div>

                </div>
            </div>


        </div>
    </div>

</div>




