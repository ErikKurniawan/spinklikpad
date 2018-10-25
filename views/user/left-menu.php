<?php
    $datatoko = glfn::_datatoko();

    $toko = isset($_COOKIE[COOKIE_TOKO]) ? $_COOKIE[COOKIE_TOKO] : '';
    $nama_toko = isset($datatoko[0]['_name']) ? $datatoko[0]['_name'] : 'Toko Saya';
    $_image = isset($datatoko[0]['_image']) ? $datatoko[0]['_image'] : '';
?>

<style>

    .sps {
        padding: 1em .5em;
        position: fixed;
        top: 0;
        left: 0;
        transition: all 0.25s ease;
        width: 100%;
    }

    .sps--abv {
        background-color: transparent;
        color: #000;
    }

    .sps--blw {

        color: #fff;
    }



    .left-menu ul li
    {
        padding:5px 0px;


    }

    .left-menu ul li,.left-menu ul li a
    {
        text-decoration: none;
        font-size: 12px;
        padding:0px !important;
        color:#94989b;
    }
    .left-menu .title-accordion
    {
        font-size: 14px;
        font-weight: bold;
        color:#733f98;
    }
    .left-menu .title-accordion:after
    {
        font-family: "Font Awesome 5 Free";
        font-weight: 900; 
        content: "\f0d8";
        float: right;
        transition: all 0.5s;
    }

    .left-menu .title-accordion.active:after
    {
        -webkit-transform: rotate(180deg);
        -moz-transform: rotate(180deg);
        transform: rotate(180deg);
    }



    .left-menu ul li a
    {
        line-height: 30px;
    }

    .left-menu ul li a:active,.left-menu ul li a:hover
    {
        color: #733f98;
    }

</style>


<script>
  
    $(function () {
    
        $('.title-accordion').on('show.bs.collapse', function () {
            $(this).siblings('.panel-heading').addClass('active');
        });

        $('.panel-collapse').on('hide.bs.collapse', function () {
            $(this).siblings('.panel-heading').removeClass('active');
        });
    });

</script>

<div class="sps sps--abv position-sticky" style=" border: 0px solid black;padding: 0px 0px;">
    <div class="left-menu" style="border:1px solid #d2d2d2;padding:10px;">
        <div style="padding-bottom: 15px;margin-bottom: 10px; border-bottom:1px solid #d2d2d2;">
            <img style="border:2px solid #d2d2d2;width: 48px; height: 48px;" class="center img-fluid" src="<?=PATH_IMAGE?>customer/9d6a5f81ed4a6c8612813d72b12cc1f1.jpg?a=1540359883" 
			onerror="this.src='http://localhost/klikpad/public/image/customer/def-customer.jpg?a=<?=time()?>';">
			<div style="font-size:12px; color:#733f98;font-weight: bold; border:0px solid black;height:50px;line-height:40px;width:100px;;float:right;padding:5px;"><?php echo $name_login_customer;?></div>

        </div>
		

        <div style="padding-bottom: 15px;margin-bottom: 10px; border-bottom:1px solid #d2d2d2;">
			<img style="border:2px solid #d2d2d2;width: 48px; height: 48px;" class="center"  src="<?= PATH_IMAGE ?>merchant/<?php echo $_image;?>?a=<?= time() ?>" onerror="this.src='<?=PATH_IMAGE?>asset/merchant.jpeg?a=<?= time() ?>';" title="kategory 1">
            
            <div style="font-size:12px; color:#733f98;font-weight: bold; border:0px solid black;height:50px;width:100px;;float:right;padding:5px;"><?php echo $nama_toko;?></div>

<?
            if($toko == 0)
            {
?>
                <a href="<?= URL ?>merchant" class="btn btn-sinup" style="width: 100%;margin-left: 0;margin-top:10px;height: 30px;padding-top: 5px;font-size: 10pt;">Buat Toko</a>
<?
            }
?>
        </div>


        <ul id="accordion1" class="nav nav-pills flex-column">
            <li class="nav-item">
                <a class="title-accordion nav-link" data-toggle="collapse" href="#item-1" data-parent="#accordion1">Profile</a>
                <div id="item-1" class="collapse show">
                    <ul class="nav flex-column ml-3">
                        <li class="nav-item">
                            <a class="nav-link" href="<?= URL ?>purchase">Pembelian</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= URL ?>wishlist">Wishlist</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= URL ?>user">Pengaturan</a>
                        </li>
                    </ul>
                </div>
            </li>

        </ul>

<?
        if($toko != 0)
        {
?>
            <ul id="accordion2" class="nav nav-pills flex-column">
                <li class="nav-item">
                    <a class="title-accordion nav-link" data-toggle="collapse" href="#item-2" data-parent="#accordion2">Toko Saya</a>
                    <div id="item-2" class="collapse show">
                        <ul class="nav flex-column ml-3">
                            <li class="nav-item">
                                <a class="nav-link" href="<?= URL ?>penjualan">Penjualan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= URL ?>merchantproduct">Tambah Produk</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= URL ?>merchantproduct/daftarproduct">Daftar Produk</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= URL ?>distributor">Penawaran Distributor</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= URL ?>merchant">Pengaturan Toko</a>
                            </li>
                        </ul>
                    </div>
                </li>

            </ul>
<?
        }
?>

        <ul id="accordion3" class="nav nav-pills flex-column">
            <li class="nav-item">
                <a class="title-accordion nav-link" data-toggle="collapse" href="#item-3" data-parent="#accordion3">Kotak Masuk</a>
                <div id="item-3" class="collapse show">
                    <ul class="nav flex-column ml-3">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Ulasan</a>
                        </li>
                        <!--
                        <li class="nav-item">
                            <a class="nav-link" href="#">Chat</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Diskusi Produk</a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="#">Pesan Bantuan</a>
                        </li>
                        -->
                    </ul>
                </div>
            </li>

        </ul>
    </div>
</div>