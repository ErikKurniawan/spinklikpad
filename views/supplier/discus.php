
<style>
    .panel-filter
    {
        border:1px solid #f1f1f1;
        padding:10px;
    }


    .panel-filter ul li
    {
        padding:5px 0px;


    }

    .panel-filter ul li,.panel-filter ul li a
    {
        text-decoration: none;
        font-size: 12px;
        padding:0px !important;
        color:#94989b;
    }

    .panel-filter ul li a
    {
        line-height: 20px;
    }

    .panel-filter ul li a:active,.panel-filter ul li a:hover
    {
        color: #6d6e70;
    }

    .panel-container
    {
        border:1px solid #f1f1f1;
    }

    .title-filter
    {
        line-height: 40px;
        font-size: 14px;
        font-weight: bold;
        color:#7f4197;
    }

    .category-title
    {
        font-weight: bold;
        font-size: 20px;
        color: #fff;
        padding: 0 10px;
        background: #7f4197;
        height: 40px;
        line-height: 40px;
    }

</style>
<style>
    .hoverable:not(:hover) + .show-on-hover {
        display: none;
    }

    .product-hover {
        text-align: center;
        background: #231f20;
        color:#d0d1d3;
        font-size: 13px;
        line-height: 35px;

    }
    .product-card:not(:hover) + .product-hover {
        text-align: center;
        background: transparent;
        color:transparent;
        height: 35px;
    }
    .product-site-map
    {
        font-size:14px;
        color:#94989b;
    }

    .product-site-map a
    {
        font-size:14px;
        color:#94989b;
        text-decoration: none;
        margin-right:5px;
    }

    .product-site-map a:hover
    {
        color:#6d6e70;
    }

    .product-site-map div
    {
        width: 10px;
        height: 10px;

        border-bottom: 5px solid transparent;
        border-left: 5px solid #f7931d;
        border-top: 5px solid transparent;
        border-right: 5px solid transparent;
        clear: both;
        display: inline-block;
        margin: 0px 5px;
    }

    .product-site-map a:last-child
    {
        color:#7e3f98;
    }

    .row-product .col
    {

        padding: 0px 15px !important;
    }










    .col-xs-5ths,
    .col-sm-5ths,
    .col-md-5ths,
    .col-lg-5ths {
        position: relative;
        min-height: 1px;
        padding-right: 15px;
        padding-left: 15px;
    }

    .col-xs-5ths {
        width: 20%;
        float: left;
    }

    @media (min-width: 768px) {
        .col-sm-5ths {
            width: 20%;
            float: left;
        }
    }

    @media (min-width: 992px) {
        .col-md-5ths {
            width: 20%;
            float: left;
        }
    }

    @media (min-width: 1200px) {
        .col-lg-5ths {
            width: 20%;
            float: left;
        }
    }


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


    #wrapper{
        border:1px solid black;
        overflow:hidden;
        display: table;
    }






</style>




<div class="container-fluid section content" style="margin-top: -25px;">
    <div >
        <img style="width:100%;height:200px; " class="img-fluid" src="<?= URL ?>public/image/download__1.jpg"/>
    </div>
    <div class="parent3" style="font-size: 12px;">
        <div style="padding: 0px 10px;width:160px;">
            <img style="margin-top: -30px;width: 128px;height: 128px;border:3px solid #d2d2d2;" class="img-fluid" src="<?= URL ?>public/image/klikpad.jpg"/>
        </div>
        <div style="">
            <div class="parent2">
                <div style="border:0px solid black;padding:10px; width: 40%">
                    <div style="font-weight: bold;color:#733f98">Toko aan</div>
                    <div style="color:#95999A;">Jual Makanan</div>
                </div>
                <div style="border:0px solid black;padding:10px;">

                </div>
            </div>
        </div>
    </div>
</div>






<style>

    .review-container{

    }
    .review-content
    {
        padding:15px 10px;
        border-bottom: 1px solid #e2e7e9;
    }

    .review-content:last-child
    {

        border-bottom: 0px;
    }


    .review-icon-container
    {
        width: 55px;
        border:5px #e2e7e9 solid;
    }


    .review-name
    {
        padding:0px 5px;
        color: #733f98;
        font-size: 12px;
        font-weight: bold;
    }

    .review-time
    {
        padding: 5px;
        color: #95999A;
        font-size: 12px;
        font-weight: bold;
        font-style: oblique;
    }


    .review-desc
    {
        padding: 5px;
        color: #6a6c6c;
        font-size: 13px;
        font-weight: bold;
    }

    .img-review-container
    {
        padding: 10px;
        border:1px solid black;
        height: 100%;
        width: 150px;
    }


    .img-review{
        padding: 10px;
        height: 100%;
        width: 150px;


    }
    .img-review img{
        border:1px solid #e2e7e9;

    }

    .img-review a
    {
        color: #95999A;
        text-decoration: none;
        font-weight: bold;
        font-size: 14px;
    }

    .img-review a :hover
    {
        color: #733f98;
        text-decoration: none;
    }



    .parent { display: table;width: 100%; }
    .parent > div {display: table-cell; 
                   border:1px solid #e2e7e9;
                   vertical-align:top; 
    }


    .parent2 { display: table;width: 100%; }
    .parent2 > div {display: table-cell; 

                    vertical-align:top; 
    }

    .parent3 { display: table;width: 100%;
               border:1px solid #e2e7e9;}
    .parent3 > div {display: table-cell; 

                    vertical-align:top; 
    }


    .cst-accordion li
    {
        padding:5px 0px;


    }

    .cst-accordion li,.cst-accordion li a
    {
        text-decoration: none;
        font-size: 12px;
        padding:0px !important;
        color:#94989b;
    }

    .cst-accordion li a
    {
        line-height: 20px;
    }

    .cst-accordion li a:active,.cst-accordion li a:hover
    {
        color: #6d6e70;
    }
</style>



<div class="container-fluid section content" style="margin-top: 30px;">
    <div class="row" >
        <div class="col">

        </div>
        <div class="col">

        </div>
        <div class="col">

        </div>
        <div class="col">

        </div>
    </div>
</div>

<div class="container-fluid section content" style="margin-top: 30px;">




    <ul class="nav nav-pills mb-3 i-tab" style="border-bottom:1px solid #d2d2d2;" id="pills-tab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="pills-home-tab"  href="<?= URL ?>supplier?a<?=$_GET['a']?>" >Produk</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="pills-profile-tab"  href="<?= URL ?>supplier/review?a<?=$_GET['a']?>" >Ulasan</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="pills-contact-tab" href="<?= URL ?>supplier/discus?a<?=$_GET['a']?>">Diskusi Produk</a>
        </li>
    </ul>







    <style>
        .panel-filter
        {
            border:1px solid #f1f1f1;
            padding:10px;
            font-size:12px;
            color:#95999A;
        }
        .etalase
        {
            border: 1px solid #d2d2d2;
        }
        .etalase div
        {
            border-bottom: 1px solid #d2d2d2;
            padding:5px;
        }

        .review-table:first-child
        {
            margin-top:0px;
        }

        .review-table
        {
            margin-top:15px;
            width: 100%;
            border:1px solid #d2d2d2;
            border-bottom:3px solid #d2d2d2;
        }
    </style>




</div>  
<div class="container-fluid section content">
    <table class="review-table" border="1">
        <tr>
            <td style="width: 150px">
                <div class="img-review">
                    <a href="#">
                        <div>
                            <img class="img-fluid" src="<?= PATH_IMAGE ?>/asset/icon_categories_32px-04.png" title="kategory 1"/>
                            asdas 
                            a 
                            a 
                            a 
                            a 
                            a
                            ash ad asd
                            asd a
                            <br/>jsdh akhdg hasld<br/>
                            asdas 
                            a 
                            a 
                            a 
                            <br/>
                            a 
                            a
                            <br/>
                            ash ad asd
                            asd ajsdh akhdg hasld<br/>
                        </div>
                    </a>
                </div>
            </td>
            <td>
                <style>
                    .review-user
                    {
                        font-size:12px;
                        width: 100%;
                        border-bottom:  1px solid #d2d2d2;
                    }
                    .review-user td
                    {
                        padding:10px;
                    }
                </style>
                <table class="review-user">
                    <tr>
                        <td style="width:80px;">
                            <img  class="img-fluid review-icon-container" src="<?= PATH_IMAGE ?>/asset/icon_categories_32px-04.png" title="kategory 1"/>
                        </td>
                        <td>
                            <div>Erik Kurniawan <span style="background: #733f98;font-weight: normal;padding:5px 15px;color:#fff;border-radius: 3px;">Pengguna</span></div>
                            <div style="margin-top:10px;font-style: italic;font-weight: bold;color:#95999A; border-bottom: 2px dashed #d2d2d2;"> 20/02/2018 19:20:29</div>
                            <div style="padding:5px;"> Barang masi ada?</div>
                        </td>
                    </tr>
                </table>


                <table class="review-user">
                    <tr>
                        <td style="width:80px;">
                            <img  class="img-fluid review-icon-container" src="<?= PATH_IMAGE ?>/asset/icon_categories_32px-04.png" title="kategory 1"/>
                        </td>
                        <td>
                            <div>Toko aan <span style="background: #f7931d;font-weight: normal;padding:5px 15px;color:#fff;border-radius: 3px;">Seller</span></div>
                            <div style="margin-top:10px;font-style: italic;font-weight: bold;color:#95999A; border-bottom: 2px dashed #d2d2d2;"> 20/02/2018 19:20:29</div>
                            <div style="padding:5px;"> Ready gan, langsung dibeli aja semua ready stock</div>
                        </td>
                    </tr>
                </table>
                <table class="review-user">
                    <tr>
                        <td style="width:100%">
                            <div class="input-group" >
                                <input type="text" class="form-control" placeholder="Diskusi Produk" >
                                <div class="input-group-append">
                                    <a href="http://localhost/klikpad/product" class="btn btn-src" type="button">
                                        Submit

                                    </a>
                                </div>
                            </div>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

    </table>


    <table class="review-table" border="1">
        <tr>
            <td style="width: 150px">
                <div class="img-review">
                    <a href="#">
                        <div>
                            <img class="img-fluid" src="<?= PATH_IMAGE ?>/asset/icon_categories_32px-04.png" title="kategory 1"/>
                            asdas 
                            a 
                            a 
                            a 
                            a 
                            a
                            ash ad asd
                            asd a
                            <br/>jsdh akhdg hasld<br/>
                            asdas 
                            a 
                            a 
                            a 
                            <br/>
                            a 
                            a
                            <br/>
                            ash ad asd
                            asd ajsdh akhdg hasld<br/>
                        </div>
                    </a>
                </div>
            </td>
            <td>
                <style>
                    .review-user
                    {
                        font-size:12px;
                        width: 100%;
                    }
                    .review-user td
                    {
                        padding:10px;
                    }
                </style>
                <table class="review-user">
                    <tr>
                        <td style="width:80px;">
                            <img  class="img-fluid review-icon-container" src="<?= PATH_IMAGE ?>/asset/icon_categories_32px-04.png" title="kategory 1"/>
                        </td>
                        <td>
                            <div>Erik Kurniawan <span style="background: #733f98;font-weight: normal;padding:5px 15px;color:#fff;border-radius: 3px;">pengguna</span></div>
                            <div style="margin-top:10px;font-style: italic;font-weight: bold;color:#95999A; border-bottom: 2px dashed #d2d2d2;"> 20/02/2018 19:20:29</div>
                            <div style="padding:5px;"> Barang masi ada?</div>
                        </td>
                    </tr>
                </table>
                 <table class="review-user">
                    <tr>
                        <td style="width:100%">
                            <div class="input-group" >
                                <input type="text" class="form-control" placeholder="Diskusi Produk" >
                                <div class="input-group-append">
                                    <a href="http://localhost/klikpad/product" class="btn btn-src" type="button">
                                        Submit
                                    </a>
                                </div>
                            </div>
                        </td>
                    </tr>
                </table>


            </td>
        </tr>

    </table>

</div>  