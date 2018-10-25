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


            .dropdown:hover>.dropdown-menu {
                display: block;
            }
            
         
            .dropdown-menu
            {
                border:1px solid black;
                width: 700px;
                margin-top:8px;
                border-radius: 0px ;

            }


            .caret {
                position: relative;
                cursor: pointer;
            }

            .caret:before {
                content: '';
                position: absolute;
                top: -22px;
                left: 30px;
                border-bottom: 12px solid #000;
                border-left: 12px solid transparent;
                border-right: 12px solid transparent;
            }

            .caret:after {
                content: '';
                position: absolute;
                top: -21px;
                left: 31px;
                border-bottom: 11px solid #fff;
                border-left: 11px solid transparent;
                border-right: 11px solid transparent;
            }

            .caret:hover:before {
                border-top-color: #222;
            }
        </style>

        <script>
            $(function () {

            });
        </script>


        <!--<div class="hover" style="position: absolute;width: 100%;height: 100%;background: #000;z-index: 100;opacity: 0.1"></div>-->
        <div class="laoding-page"></div>
        <header>
            <nav class="navbar navbar-expand navbar-light bg-light fixed-top">
                <div  class="container-fluid  content">
                    <a class="navbar-brand" href="#">Navbar KLIKPAD KLIKPADs</a>
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                        <ul class="navbar-nav">

                            <li class="nav-item dropdown">

                                <a class="nav-link  " href="" >
                                    Kategori
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <span class="caret"></span>
                                    <span>asda2</span>
                                    <span>asda4</span>
                                    <span>asd3a</span>
                                    <span>asd6a</span>
                                    <span>asd4a</span>
                                    <span>asda745</span>
                                    <span>asd34a</span>
                                    <span>asd55a</span>
                                    <span>asd777a</span>
                                    <span>as66da</span>
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </li>
                        </ul>
                    </div>

                </div>
            </nav>



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
