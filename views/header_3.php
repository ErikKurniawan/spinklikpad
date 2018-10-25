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
                border:1px solid #d3d3d3;
                width: 700px;
                margin-top:10px;
                border-radius: 0px ;

            }


            .caret {
                position: relative;
                cursor: pointer;
            }

            .caret:before {
                content: '';
                position: absolute;
                top: -27px;
                left: 30px;
                border-bottom: 10px solid #d3d3d3;
                border-left: 10px solid transparent;
                border-right: 10px solid transparent;
            }

            .caret:after {
                content: '';
                position: absolute;
                top: -26px;
                left: 30px;
                border-bottom: 10px solid #fff;
                border-left: 10px solid transparent;
                border-right: 10px solid transparent;
            }

            .caret:hover:before {
                border-top-color: #222;
            }


            .modal-open .modal.modal-center {
                display: flex!important;
                align-items: center!important;
                .modal-dialog {
                    flex-grow: 1;
                }
            }

            .loading-screen
            {
                border:1px solid black;
                position: absolute;
                height: 100%;
                width: 100%;

                overflow: hidden;
                z-index:-100;
            }

            .loading-screen-show
            {
                display: block;
                z-index:9999;
                background: red;
            }

            .header-category
            {
                text-align: center;color:#95999A;

            }
            .header-category
            {
                text-align: center;
                color:#95999A;
                text-decoration: none;
            }
            .header-category:hover
            {
                color:#6a6c6c;
                text-decoration: none;
            }

            input,
            a,
            form-control,
            textarea {

                -webkit-box-shadow: none !important;

                -moz-box-shadow: none !important;

                box-shadow: none !important;


            }

            textarea:focus,
            form-control:focus,
            input[type="text"]:focus,
            input[type="password"]:focus,
            input[type="datetime"]:focus,
            input[type="datetime-local"]:focus,
            input[type="date"]:focus,
            input[type="month"]:focus,
            input[type="time"]:focus,
            input[type="week"]:focus,
            input[type="number"]:focus,
            input[type="email"]:focus,
            input[type="url"]:focus,
            input[type="search"]:focus,
            input[type="tel"]:focus,
            input[type="color"]:focus,
            .uneditable-input:focus {   



                -webkit-box-shadow: none !important;

                -moz-box-shadow: none !important;

                border-color: #d2d2d2;
                box-shadow: #d2d2d2;
            }
        </style>


        <script>
            $(function () {
                $('body').on('click', '#test', function () {
                    $('body').css({"overflow": "hidden"})
                    $('.loading-screen').addClass("loading-screen-show animated fadeIn").one("animationend webkitAnimationEnd oAnimationEnd",
                            function () {
                                $(this).removeClass("animated fadeIn loading-screen-show");
                            });
                });
                $('.panel-collapse').on('show.bs.collapse', function () {
                    $(this).siblings('.panel-heading').addClass('active');
                });
                $('.panel-collapse').on('hide.bs.collapse', function () {
                    $(this).siblings('.panel-heading').removeClass('active');
                });
            });
        </script>

        <!--
        <a class="btn btn-primary" id="test" href="#" role="button">test</a>
        <div class="loading-screen">


        </div>
        -->


        <!--<div class="hover" style="position: absolute;width: 100%;height: 100%;background: #000;z-index: 100;opacity: 0.1"></div>-->


        <header>
            <div class="container-fluid section content">

                <div class="row header-container" style="line-height: 35px;padding-top: 10px;padding-bottom: 10px;">
                    <div class="col-2 logo">
                        <a href="<?= URL ?>">klikpad</a>
                    </div>
                    <div class="col-1">
                        <div class="dropdown" style="">

                            <a class="btn btn-sinin header-category" href="<?= URL ?>category">Kategori</a>

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
                        </div>
                    </div>



                    <div class="col-6">
                        <div class="input-group" style="width: 600px;border:0px solid black;padding-right: 15px; outline: none !important;box-shadow:none !important;">
                            <input type="text" class="form-control" placeholder="Pencarian Produk" style=" outline: none !important;box-shadow:none !important;">
                            <div class="input-group-append">
                                <a href="<?= URL ?>product" class="btn btn-src" type="button">
                                    <i class="fas fa-search"></i>

                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">  
                        <a style="border:0px solid black;" href="<?= URL ?>cart">
                            <img style="width: 40px;height: 40px;mar" src="<?= URL ?>public/image/asset/icon_wishlist_32.png"/>
                        </a>    
                        <a style="border:none;  " href="<?= URL ?>cart">
                            <img style="width: 40px;height: 40px;" src="<?= URL ?>public/image/asset/icon_cart_32.png"/>
                        </a> 

                        <a class="btn btn-sinup" href="<?= URL ?>user/signup">Signup</a>
                        <a class="btn btn-sinin" href="<?= URL ?>user/signin">Signin</a>
                    </div>
                </div>
            </div>
        </header>



        <!--
        
        
        <header>
            <nav class="navbar navbar-expand navbar-light bg-light ">
                <div  class="container-fluid content">

                    <a class="navbar-brand" href="#">   avbar KLIKPAD KLIKPADs</a>

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
        -->


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

        <!--
        <div class="check-warna">
            <div class="warna-1">733f98</div>
            <div class="warna-2">f7931d</div>
            <div class="warna-3">d91b5b</div>
            <div class="warna-4">e2e7e9</div>
            <div class="warna-5">95999A</div>
            <div class="warna-6">6a6c6c</div>
        </div>
        -->