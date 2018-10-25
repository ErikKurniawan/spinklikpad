<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title><?= isset($this->title) ? $this->title : 'KlikPAD'; ?></title>
        <link rel="icon" href="<?= URL ?>public/img/logo.png" >
        <?php
        if (isset($this->css)) {
            foreach ($this->css as $css) {
                echo '<link rel="stylesheet" type="text/css" href="' . $css . '" />' . PHP_EOL;
            }
        }
        if (isset($this->js)) {
            foreach ($this->js as $js) {
                echo '<script type="text/javascript" src="' . $js . '"></script>' . PHP_EOL;
            }
        }
        ?>
    </head>
    <body>
        <style>
            .header-container
            {

            }
            .btn-sinup
            {
                background: #733f98;
                color:#fff;
                margin: 0 15px;
            }
            .btn-sinup:hover
            {
                background: #d91b5b;
                color:#fff;
            }


            .btn-src
            {
                background: #733f98;
                color:#fff;
            }
            .btn-src:hover
            {

                color:#fff;
            }

            .btn-sinin
            {
                background: #fff;
                border:1px solid #733f98;
                color:#733f98;
            }

            .btn-sinin:hover
            {
                border:1px solid #d91b5b;
                color:#d91b5b;
            }
            .logo a
            {
                text-decoration: none;
                color: #733f98;
                font-size: 40px;
                font-weight: bold;
                font-style: oblique;
            }
            
            
            .btn-category
            {
                background: #fff;
                border:1px solid #733f98;
                color:#733f98;
                width: 90px;
            }

            .btn-category:hover
            {
                border:1px solid #d91b5b;
                color:#d91b5b;
            }
        </style>

        <script>
            $(function () {
                
            });
        </script>
        
        
        <header>
            <div class="container-fluid section content">

                <div class="row header-container" style="line-height: 35px;padding-top: 10px;padding-bottom: 10px;">
                    <div class="col-2 logo">
                        <a href="<?= URL ?>">klikpad</a>
                    </div>
                    <div class="col-1"><input class="btn btn-category" value="Kategori"></div>
                    <div class="col-6">
                        <div class="input-group " style="width: 600px;border:0px solid black;padding-right: 15px;">
                            <input type="text" class="form-control" placeholder="Pencarian Produk" aria-label="Recipient's username" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <a href="<?= URL ?>product" class="btn btn-src" type="button">
                                    <i class="fas fa-search"></i>

                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">  
                        <a style="border:0px solid black;" href="<?= URL ?>cart">
                            <img style="width: 40px;height: 40px" src="<?= PATH_IMAGE ?>asset/icon_wishlist_32.png"/>
                        </a>    
                        <a style="border:none" href="<?= URL ?>cart">
                            <img style="width: 40px;height: 40px" src="<?= PATH_IMAGE ?>asset/icon_cart_32.png"/>
                        </a>
                        <a class="btn btn-sinup" href="<?= URL ?>user/signup">Signup</a>
                        <a class="btn btn-sinin" href="<?= URL ?>user/signin">Signin</a>
                    </div>
                </div>
            </div>
        </header>


        <div class="container-fluid section content">
            <div class="row">
                <div class="col">
                    <a class="btn btn-sinin" href="<?= URL ?>">Index</a>
                    <a class="btn btn-sinin" href="<?= URL ?>product">List Produk</a>
                    <a class="btn btn-sinin" href="<?= URL ?>product/detail/haha">Produk Detail</a>
                    <a class="btn btn-sinin" href="<?= URL ?>cart">cart</a>
                    <a class="btn btn-sinin" href="<?= URL ?>payment">Info Pembayaran</a>
                    <a class="btn btn-sinin" href="<?= URL ?>index/promotion">Produk Promo</a>
                    <a class="btn btn-sinin" href="<?= URL ?>category">Kategori</a>
                    <a class="btn btn-sinup" href="<?= URL ?>user/signup">Signup</a>
                    <a class="btn btn-sinin" href="<?= URL ?>user/signin">Signin</a>
                </div>
            </div>
        </div>




        <style>
            .check-warna div
            {
                width: 100px;
                height: 100px;
                color: #000;
                font-size:20px;
                font-weight: bold;
                display: inline-block;
                text-align: center;
                line-height: 100px;
            }

            .warna-1
            {
                background: #733f98;
            }
            .warna-2
            {
                background: #f7931d;
            }
            .warna-3
            {
                background: #d91b5b;
            }
            .warna-4
            {
                background: #e2e7e9;
            }
            .warna-5
            {
                background: #95999A;
            }
            .warna-6
            {
                background: #6a6c6c;
            }
        </style>
