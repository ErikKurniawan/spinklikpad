<style>
    .category
    {
        font-weight: bold;
        font-size: 20px;
        color: #fff;
        padding: 0 10px;
        background: #7f4197;
        height: 40px;
        line-height: 40px;

    }

    .category:not(:hover) + .category-panel22 {
        text-align: center;
        background: transparent;
        color:transparent;
        height: 35px;
    }



</style>


<style>
    /*category list*/

    .category-panel 
    {
        height: 300px;
        border:1px solid #e2e7e9;
    }

    .category-panel div a
    {
        padding: 5px 10px;
        font-size:12px;
        text-decoration: none;
        color:#95999A;

        display: inline-block;
    }


    .category-panel div a{
        display: inline-block;
    }
    .category-panel div a:hover
    {

        font-weight: bold;
        color:#6a6c6c;
    }


    .sub-category-container
    {
        width: 500px;
        height: 400px;
        position: absolute;
        top:40px;
        left:100%;
        margin-left: -16px;
        border:1px solid #e2e7e9;
        display: none; /*check */

    }

    /*
        .head-category:not(:hover) + .sub-category-container
        {
            display: none;
            z-index: 99;
        }
    
        .sub-category-container:not(:hover) + .sub-category-container
        {
            display: none;
            z-index: 99;
        }
    */


    .sub-cateogry
    {
        padding:10px;

    }

    .sub-cateogry .category-sub-title
    {
        border-bottom: 1px solid #e2e7e9;
    }
    .sub-cateogry .category-sub-title a
    {
        font-size: 16px;
        color:#6a6c6c;
        font-weight: bold;
    }

    #i-news
    {
        margin-top:40px;
    }
</style>




<div class="container-fluid section">
    <div class="row">
        <div class="col-2" style="position:relative;">

            <div class="category">KATEGORI</div>
            <div class="category-panel" >
                <div class="category-list">
                    <div class="head-category"><a href="#">asd</a></div>
                    <div class="sub-category-container">

                        <div class="sub-cateogry">
                            <div class="category-sub-title">
                                <a href="#">hmmm lalalala</a>
                            </div>
                            <a href="#">baju wanita</a>
                            <a href="#">baju cowok</a>
                            <a href="#">baju pria</a>
                            <a href="#">baju pria</a>
                            <a href="#">baju pria</a>
                            <a href="#">baju pria</a>
                            <a href="#">baju pria</a>
                            <a href="#">baju pria</a>
                        </div>
                    </div>
                </div>
                <div class="category-list">
                    <div class="head-category"><a href="#">asd</a></div>
                    <div class="sub-category-container">

                    </div>
                </div>
            </div>
        </div>
        <div class="col-10">
            <div id="i-news"  class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#i-news" data-slide-to="0" class="active"></li>
                    <li data-target="#i-news" data-slide-to="1"></li>
                    <li data-target="#i-news" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active">
                        <img class="img-fluid"  src="<?= PATH_IMAGE ?>1.png" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="img-fluid" src="<?= PATH_IMAGE ?>2.png" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="img-fluid" src="<?= PATH_IMAGE ?>3.png" alt="Third slide">
                    </div>
                </div>

                <a class="carousel-control-prev" href="#i-news" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#i-news" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>

    </div>
</div>


<style>

    .row-product
    {
        border:0px solid black;
        padding-bottom: 10px
    }

    .product-card
    {
        border:2px solid #e7e5e6;
        padding:5px;   
    }
    .product-card:hover  ,.product-card:hover 
    {
        border:2px solid #804096;
    }


    .product-icon img
    {
        width: 24px;
        height: 24px;
    }

    .product-image  > * 
    {
        border:2px solid #fff;
        height: 150px;
        vertical-align:middle; 
        text-align:center;
    }

    .product-title
    {
        color:#834296;
        font-size: 14px;
        font-weight: bold;
        height: 42px;
        text-overflow: ellipsis;
        overflow: hidden;
    }


    .product-sale-price{
        color:#d1d1d3;
        font-size: 10px;
        height: 20px;
        border:0px solid black;
        margin-top: 3px;
        overflow: hidden;

    }
    .product-price{
        color:#db2061;
        font-size: 15px;
        height: 22px;
        border:0px solid black;
        overflow: hidden;

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


    .i-section-title
    {
        font-size:15px;
        margin-top: 10px;
    }

    
    .section:first-child
    {
        margin-bottom:50px;
    }
    .section:last-child
    {
        margin-top:50px;
    }
</style>

<div class="container-fluid section">
    <div class="row" >
        <div class="col-6 i-section-title">
            Product terbaik
        </div>
        <div class="col-6">
            <ul class="nav nav-pills mb-3  i-tab" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Contact</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="row" >
        <div class="col-12">
            <div id="prodhaha"  class="carousel slide" data-ride="carousel">
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active">
                        <div class="row row-product">
                            <div class="col-2 ">
                                <div class="product-card">
                                    <div class="product-image">
                                        <img class="img-fluid" src="<?= PATH_IMAGE ?>asset/icon_categories_32px-09.png" title="kategory 1"/>
                                    </div>
                                    <div class="product-title">alsdkalsdka dasdlaksd alskd asdasdasdas d asdas</div>
                                    <div class="product-sale-price">Rp 2,222,333</div>
                                    <div class="product-price">Rp 1,566,371</div>
                                    <div class="product-icon">
                                        <img class="img-fluid " src="<?= PATH_IMAGE ?>asset/icon_categories_32px-12.png" title="kategory 1"/>
                                        <img class="img-fluid float-right" src="<?= PATH_IMAGE ?>asset/icon_cart_32.png" title="kategory 1"/>
                                        <img class="img-fluid float-right" src="<?= PATH_IMAGE ?>asset/icon_wishlist_32.png" title="kategory 1"/>
                                    </div>
                                </div>
                                <div class="product-hover">
                                    PESAN PRODUK
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="product-card">
                                    <div class="product-image">
                                        <img class="img-fluid" src="<?= PATH_IMAGE ?>asset/icon_categories_32px-09.png" title="kategory 1"/>
                                    </div>
                                    <div class="product-title">alsdkalsdka dasdlaksd alskd asdasdasdas d asdas</div>
                                    <div class="product-sale-price">Rp 2,222,333</div>
                                    <div class="product-price">Rp 1,566,371</div>
                                    <div class="product-icon">
                                        <img class="img-fluid " src="<?= PATH_IMAGE ?>asset/icon_categories_32px-12.png" title="kategory 1"/>
                                        <img class="img-fluid float-right" src="<?= PATH_IMAGE ?>asset/icon_cart_32.png" title="kategory 1"/>
                                        <img class="img-fluid float-right" src="<?= PATH_IMAGE ?>asset/icon_wishlist_32.png" title="kategory 1"/>
                                    </div>
                                </div>
                                <div class="product-hover">
                                    PESAN PRODUK
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row row-product">
                            <div class="col-2">
                                <div class="product-card">
                                    <div class="product-image">
                                        <img class="img-fluid" src="<?= PATH_IMAGE ?>asset/icon_categories_32px-09.png" title="kategory 1"/>
                                    </div>

                                    <div class="product-title">alsdkalsdka dasdlaksd alskd asdasdasdas d asdas</div>
                                    <div class="product-sale-price">Rp 2,222,333</div>
                                    <div class="product-price">Rp 1,566,371</div>
                                    <div class="product-icon">
                                        <img class="img-fluid " src="<?= PATH_IMAGE ?>asset/icon_categories_32px-12.png" title="kategory 1"/>
                                        <img class="img-fluid float-right" src="<?= PATH_IMAGE ?>asset/icon_cart_32.png" title="kategory 1"/>
                                        <img class="img-fluid float-right" src="<?= PATH_IMAGE ?>asset/icon_wishlist_32.png" title="kategory 1"/>
                                    </div>

                                </div>    
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row row-product">
                            <div class="col-2">
                                <div class="product-card">
                                    <div class="product-image">
                                        <img class="img-fluid" src="<?= PATH_IMAGE ?>asset/icon_categories_32px-09.png" title="kategory 1"/>
                                    </div>

                                    <div class="product-title">alsdkalsdka dasdlaksd alskd asdasdasdas d asdas</div>
                                    <div class="product-sale-price">Rp 2,222,333</div>
                                    <div class="product-price">Rp 1,566,371</div>
                                    <div class="product-icon">
                                        <img class="img-fluid " src="<?= PATH_IMAGE ?>asset/icon_categories_32px-12.png" title="kategory 1"/>
                                        <img class="img-fluid float-right" src="<?= PATH_IMAGE ?>asset/icon_cart_32.png" title="kategory 1"/>
                                        <img class="img-fluid float-right" src="<?= PATH_IMAGE ?>asset/icon_wishlist_32.png" title="kategory 1"/>
                                    </div>

                                </div>    
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="row" >
        <div class="col-12">
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"></div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"></div>
                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab"></div>
            </div>
        </div>

    </div>


    <div class="row i-control-carousel">
        <div class="col-1 offset-11" >
            <a class="carousel-control-next" href="#prodhaha" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#prodhaha" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>





</div>