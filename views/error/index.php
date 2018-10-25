<style>

    .table-cust { 
        display: table;width: 100%; border:0px solid black; 
        height:500px;
    }
    .cell-cust  {
        display: table-cell; 
        border:0px solid black;
        vertical-align:middle; 
        text-align: center;

    }
.btn-toindex
{
    border:1px solid #733f98;
    color:#733f98;
}
.btn-toindex:hover
{
    border:1px solid #f7931d;
    background: #f7931d;
    color:#fff;
}

   
</style>
<?php
$http = $_SERVER['SERVER_ADDR'] == "::1" ? "http" : "https";
$actual_link = $http."://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];



?>
<div class="table-cust">
    <div class="cell-cust">
        <img style="" class="img-fluid" src="<?= PATH_IMAGE ?>asset/404.png"/>
        <div style="font-size:18px;color:#d91b5b; font-weight: bold;margin-top:20px;">
            ERROR !
        </div>
         <div style="font-size:14px;color:#d91b5b; font-weight: bold;margin-top:20px;">
            Halaman yang anda cari tidak ditemukan
            <br/>
            <?=$actual_link?>
        </div>
        <div style="margin-top:20px;">
            <a href="<?=URL?>" role="button" class="btn btn-toindex">Kembali ke Halaman Utama</a>
        </div>
    </div>
</div>
