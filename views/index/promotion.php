<style>
    .i-tab
    {
        float:right;    
    }

</style>

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
    .promo-content
    {
        width: 30px;
        height: 30px;
        line-height: 30px;
        color: #fff;
        font-size: 13px;
        display: inline-block;
        background: #f7931d;
        text-align: center;
    }
</style>

<div class="section i-full-container" >
    <div class="container-fluid content i-full" >
        <div class="row">
            <div class="col-4" >
                <img class="img-fluid float-right" src="<?= PATH_IMAGE ?>asset/icon_categories_32px-12.png" title="kategory 1"/>
            </div>
            <div class="col-4">
                <div class="promo-sale" >
                    <div class="circle">3<br/>Day</div>
                    <div class="circle">12<br/>Hour</div>
                    <div class="circle">54<br/>Minute</div>
                    <div class="circle">29<br/>Second</div>
                </div>
                <div class="i-title-promo" >
                    <h4>HOT DEAL THIS WEEK</h4>
                    <span>NEW COLLECTION UP TO 50% OFF</span>
                </div>
                <div style="text-align: center;margin-top: 10px;"><input type="button" style="color:#fff;background: #f7931d;width:200px;" class="btn" value="Beli Sekarang"/></div>
            </div>
            <div class="col-4">
                <img class="img-fluid" src="<?= PATH_IMAGE ?>asset/icon_categories_32px-01.png" title="kategory 1"/>
            </div>
        </div>
    </div>  
</div>

<div class="container-fluid content section">
    <div class="row" >
        <div class="col-6 i-section-title">
            Produk Promo <div class="promo-content">09</div> : <div class="promo-content">51</div> : <div class="promo-content">32</div>
        </div>
        <div class="col-6">
            <ul class="nav nav-pills mb-3  i-tab" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Fasion</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Electronik</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Otomotif</a>
                </li>
            </ul>


        </div>
    </div>
    <div class="row" >

        <div class="col">
            <div class="product-card">
                <a href="<?= URL ?>product/detail/haha">
                    <div class="product-image">
                        <img class="img-fluid" src="<?= PATH_IMAGE ?>asset/icon_categories_32px-04.png" title="kategory 1"/>
                    </div>
                    <div class="product-title">alsdkalsdka</div>
                    <div class="product-sale-price">Rp 2,222,333</div>
                    <div class="product-price">Rp 1,566,371</div>
                    <div class="product-icon">
                        <img class="img-fluid " src="<?= PATH_IMAGE ?>asset/icon_categories_32px-12.png" title="kategory 1"/>
                        <img class="img-fluid float-right" src="<?= PATH_IMAGE ?>asset/icon_cart_32.png" title="kategory 1"/>
                        <img class="img-fluid float-right" src="<?= PATH_IMAGE ?>asset/icon_wishlist_32.png" title="kategory 1"/>
                    </div>
                </a>

            </div>
            <div class="product-hover">
                PESAN PRODUK
            </div>
        </div>
        <div class="col">
            <div class="product-card">
                <a href="<?= URL ?>product/detail/haha">
                    <div class="product-image">
                        <img class="img-fluid" src="<?= PATH_IMAGE ?>asset/icon_categories_32px-04.png" title="kategory 1"/>
                    </div>
                    <div class="product-title">alsdkalsdka</div>
                    <div class="product-sale-price">Rp 2,222,333</div>
                    <div class="product-price">Rp 1,566,371</div>
                    <div class="product-icon">
                        <img class="img-fluid " src="<?= PATH_IMAGE ?>asset/icon_categories_32px-12.png" title="kategory 1"/>
                        <img class="img-fluid float-right" src="<?= PATH_IMAGE ?>asset/icon_cart_32.png" title="kategory 1"/>
                        <img class="img-fluid float-right" src="<?= PATH_IMAGE ?>asset/icon_wishlist_32.png" title="kategory 1"/>
                    </div>
                </a>

            </div>
            <div class="product-hover">
                PESAN PRODUK
            </div>
        </div>
        <div class="col">
            <div class="product-card">
                <a href="<?= URL ?>product/detail/haha">
                    <div class="product-image">
                        <img class="img-fluid" src="<?= PATH_IMAGE ?>asset/icon_categories_32px-04.png" title="kategory 1"/>
                    </div>
                    <div class="product-title">alsdkalsdka dasdlaksd alskd asdasdasdas d asdas</div>
                    <div class="product-sale-price">Rp 2,222,333</div>
                    <div class="product-price">Rp 1,566,371</div>
                    <div class="product-icon">
                        <img class="img-fluid " src="<?= PATH_IMAGE ?>asset/icon_categories_32px-12.png" title="kategory 1"/>
                        <img class="img-fluid float-right" src="<?= PATH_IMAGE ?>asset/icon_cart_32.png" title="kategory 1"/>
                        <img class="img-fluid float-right" src="<?= PATH_IMAGE ?>asset/icon_wishlist_32.png" title="kategory 1"/>
                    </div>
                </a>

            </div>
            <div class="product-hover">
                PESAN PRODUK
            </div>
        </div>
        <div class="col">
            <div class="product-card">
                <a href="<?= URL ?>product/detail/haha">
                    <div class="product-image">
                        <img class="img-fluid" src="<?= PATH_IMAGE ?>asset/icon_categories_32px-04.png" title="kategory 1"/>
                    </div>
                    <div class="product-title">alsdkalsdka dasdlaksd alskd asdasdasdas d asdas</div>
                    <div class="product-sale-price">Rp 2,222,333</div>
                    <div class="product-price">Rp 1,566,371</div>
                    <div class="product-icon">
                        <img class="img-fluid " src="<?= PATH_IMAGE ?>asset/icon_categories_32px-12.png" title="kategory 1"/>
                        <img class="img-fluid float-right" src="<?= PATH_IMAGE ?>asset/icon_cart_32.png" title="kategory 1"/>
                        <img class="img-fluid float-right" src="<?= PATH_IMAGE ?>asset/icon_wishlist_32.png" title="kategory 1"/>
                    </div>
                </a>

            </div>
            <div class="product-hover">
                PESAN PRODUK
            </div>
        </div>
        <div class="col">
            <div class="product-card">
                <a href="<?= URL ?>product/detail/haha">
                    <div class="product-image">
                        <img class="img-fluid" src="<?= PATH_IMAGE ?>asset/icon_categories_32px-04.png" title="kategory 1"/>
                    </div>
                    <div class="product-title">alsdkalsdka dasdlaksd alskd asdasdasdas d asdas</div>
                    <div class="product-sale-price">Rp 2,222,333</div>
                    <div class="product-price">Rp 1,566,371</div>
                    <div class="product-icon">
                        <img class="img-fluid " src="<?= PATH_IMAGE ?>asset/icon_categories_32px-12.png" title="kategory 1"/>
                        <img class="img-fluid float-right" src="<?= PATH_IMAGE ?>asset/icon_cart_32.png" title="kategory 1"/>
                        <img class="img-fluid float-right" src="<?= PATH_IMAGE ?>asset/icon_wishlist_32.png" title="kategory 1"/>
                    </div>
                </a>

            </div>
            <div class="product-hover">
                PESAN PRODUK
            </div>
        </div>
        <div class="col">
            <div class="product-card">
                <a href="<?= URL ?>product/detail/haha">
                    <div class="product-image">
                        <img class="img-fluid" src="<?= PATH_IMAGE ?>asset/icon_categories_32px-04.png" title="kategory 1"/>
                    </div>
                    <div class="product-title">alsdkalsdka dasdlaksd alskd asdasdasdas d asdas</div>
                    <div class="product-sale-price">Rp 2,222,333</div>
                    <div class="product-price">Rp 1,566,371</div>
                    <div class="product-icon">
                        <img class="img-fluid " src="<?= PATH_IMAGE ?>asset/icon_categories_32px-12.png" title="kategory 1"/>
                        <img class="img-fluid float-right" src="<?= PATH_IMAGE ?>asset/icon_cart_32.png" title="kategory 1"/>
                        <img class="img-fluid float-right" src="<?= PATH_IMAGE ?>asset/icon_wishlist_32.png" title="kategory 1"/>
                    </div>
                </a>

            </div>
            <div class="product-hover">
                PESAN PRODUK
            </div>
        </div>
    </div>
    
    <div class="row" >

        <div class="col">
            <div class="product-card">
                <a href="<?= URL ?>product/detail/haha">
                    <div class="product-image">
                        <img class="img-fluid" src="<?= PATH_IMAGE ?>asset/icon_categories_32px-04.png" title="kategory 1"/>
                    </div>
                    <div class="product-title">alsdkalsdka</div>
                    <div class="product-sale-price">Rp 2,222,333</div>
                    <div class="product-price">Rp 1,566,371</div>
                    <div class="product-icon">
                        <img class="img-fluid " src="<?= PATH_IMAGE ?>asset/icon_categories_32px-12.png" title="kategory 1"/>
                        <img class="img-fluid float-right" src="<?= PATH_IMAGE ?>asset/icon_cart_32.png" title="kategory 1"/>
                        <img class="img-fluid float-right" src="<?= PATH_IMAGE ?>asset/icon_wishlist_32.png" title="kategory 1"/>
                    </div>
                </a>

            </div>
            <div class="product-hover">
                PESAN PRODUK
            </div>
        </div>
        <div class="col">
            <div class="product-card">
                <a href="<?= URL ?>product/detail/haha">
                    <div class="product-image">
                        <img class="img-fluid" src="<?= PATH_IMAGE ?>asset/icon_categories_32px-04.png" title="kategory 1"/>
                    </div>
                    <div class="product-title">alsdkalsdka</div>
                    <div class="product-sale-price">Rp 2,222,333</div>
                    <div class="product-price">Rp 1,566,371</div>
                    <div class="product-icon">
                        <img class="img-fluid " src="<?= PATH_IMAGE ?>asset/icon_categories_32px-12.png" title="kategory 1"/>
                        <img class="img-fluid float-right" src="<?= PATH_IMAGE ?>asset/icon_cart_32.png" title="kategory 1"/>
                        <img class="img-fluid float-right" src="<?= PATH_IMAGE ?>asset/icon_wishlist_32.png" title="kategory 1"/>
                    </div>
                </a>

            </div>
            <div class="product-hover">
                PESAN PRODUK
            </div>
        </div>
        <div class="col">
            <div class="product-card">
                <a href="<?= URL ?>product/detail/haha">
                    <div class="product-image">
                        <img class="img-fluid" src="<?= PATH_IMAGE ?>asset/icon_categories_32px-04.png" title="kategory 1"/>
                    </div>
                    <div class="product-title">alsdkalsdka dasdlaksd alskd asdasdasdas d asdas</div>
                    <div class="product-sale-price">Rp 2,222,333</div>
                    <div class="product-price">Rp 1,566,371</div>
                    <div class="product-icon">
                        <img class="img-fluid " src="<?= PATH_IMAGE ?>asset/icon_categories_32px-12.png" title="kategory 1"/>
                        <img class="img-fluid float-right" src="<?= PATH_IMAGE ?>asset/icon_cart_32.png" title="kategory 1"/>
                        <img class="img-fluid float-right" src="<?= PATH_IMAGE ?>asset/icon_wishlist_32.png" title="kategory 1"/>
                    </div>
                </a>

            </div>
            <div class="product-hover">
                PESAN PRODUK
            </div>
        </div>
        <div class="col">
            <div class="product-card">
                <a href="<?= URL ?>product/detail/haha">
                    <div class="product-image">
                        <img class="img-fluid" src="<?= PATH_IMAGE ?>asset/icon_categories_32px-04.png" title="kategory 1"/>
                    </div>
                    <div class="product-title">alsdkalsdka dasdlaksd alskd asdasdasdas d asdas</div>
                    <div class="product-sale-price">Rp 2,222,333</div>
                    <div class="product-price">Rp 1,566,371</div>
                    <div class="product-icon">
                        <img class="img-fluid " src="<?= PATH_IMAGE ?>asset/icon_categories_32px-12.png" title="kategory 1"/>
                        <img class="img-fluid float-right" src="<?= PATH_IMAGE ?>asset/icon_cart_32.png" title="kategory 1"/>
                        <img class="img-fluid float-right" src="<?= PATH_IMAGE ?>asset/icon_wishlist_32.png" title="kategory 1"/>
                    </div>
                </a>

            </div>
            <div class="product-hover">
                PESAN PRODUK
            </div>
        </div>
        <div class="col">
            <div class="product-card">
                <a href="<?= URL ?>product/detail/haha">
                    <div class="product-image">
                        <img class="img-fluid" src="<?= PATH_IMAGE ?>asset/icon_categories_32px-04.png" title="kategory 1"/>
                    </div>
                    <div class="product-title">alsdkalsdka dasdlaksd alskd asdasdasdas d asdas</div>
                    <div class="product-sale-price">Rp 2,222,333</div>
                    <div class="product-price">Rp 1,566,371</div>
                    <div class="product-icon">
                        <img class="img-fluid " src="<?= PATH_IMAGE ?>asset/icon_categories_32px-12.png" title="kategory 1"/>
                        <img class="img-fluid float-right" src="<?= PATH_IMAGE ?>asset/icon_cart_32.png" title="kategory 1"/>
                        <img class="img-fluid float-right" src="<?= PATH_IMAGE ?>asset/icon_wishlist_32.png" title="kategory 1"/>
                    </div>
                </a>

            </div>
            <div class="product-hover">
                PESAN PRODUK
            </div>
        </div>
        <div class="col">
            <div class="product-card">
                <a href="<?= URL ?>product/detail/haha">
                    <div class="product-image">
                        <img class="img-fluid" src="<?= PATH_IMAGE ?>asset/icon_categories_32px-04.png" title="kategory 1"/>
                    </div>
                    <div class="product-title">alsdkalsdka dasdlaksd alskd asdasdasdas d asdas</div>
                    <div class="product-sale-price">Rp 2,222,333</div>
                    <div class="product-price">Rp 1,566,371</div>
                    <div class="product-icon">
                        <img class="img-fluid " src="<?= PATH_IMAGE ?>asset/icon_categories_32px-12.png" title="kategory 1"/>
                        <img class="img-fluid float-right" src="<?= PATH_IMAGE ?>asset/icon_cart_32.png" title="kategory 1"/>
                        <img class="img-fluid float-right" src="<?= PATH_IMAGE ?>asset/icon_wishlist_32.png" title="kategory 1"/>
                    </div>
                </a>

            </div>
            <div class="product-hover">
                PESAN PRODUK
            </div>
        </div>
    </div>
    
    
    <div class="row" >

        <div class="col">
            <div class="product-card">
                <a href="<?= URL ?>product/detail/haha">
                    <div class="product-image">
                        <img class="img-fluid" src="<?= PATH_IMAGE ?>asset/icon_categories_32px-04.png" title="kategory 1"/>
                    </div>
                    <div class="product-title">alsdkalsdka</div>
                    <div class="product-sale-price">Rp 2,222,333</div>
                    <div class="product-price">Rp 1,566,371</div>
                    <div class="product-icon">
                        <img class="img-fluid " src="<?= PATH_IMAGE ?>asset/icon_categories_32px-12.png" title="kategory 1"/>
                        <img class="img-fluid float-right" src="<?= PATH_IMAGE ?>asset/icon_cart_32.png" title="kategory 1"/>
                        <img class="img-fluid float-right" src="<?= PATH_IMAGE ?>asset/icon_wishlist_32.png" title="kategory 1"/>
                    </div>
                </a>

            </div>
            <div class="product-hover">
                PESAN PRODUK
            </div>
        </div>
        <div class="col">
            <div class="product-card">
                <a href="<?= URL ?>product/detail/haha">
                    <div class="product-image">
                        <img class="img-fluid" src="<?= PATH_IMAGE ?>asset/icon_categories_32px-04.png" title="kategory 1"/>
                    </div>
                    <div class="product-title">alsdkalsdka</div>
                    <div class="product-sale-price">Rp 2,222,333</div>
                    <div class="product-price">Rp 1,566,371</div>
                    <div class="product-icon">
                        <img class="img-fluid " src="<?= PATH_IMAGE ?>asset/icon_categories_32px-12.png" title="kategory 1"/>
                        <img class="img-fluid float-right" src="<?= PATH_IMAGE ?>asset/icon_cart_32.png" title="kategory 1"/>
                        <img class="img-fluid float-right" src="<?= PATH_IMAGE ?>asset/icon_wishlist_32.png" title="kategory 1"/>
                    </div>
                </a>

            </div>
            <div class="product-hover">
                PESAN PRODUK
            </div>
        </div>
        <div class="col">
            <div class="product-card">
                <a href="<?= URL ?>product/detail/haha">
                    <div class="product-image">
                        <img class="img-fluid" src="<?= PATH_IMAGE ?>asset/icon_categories_32px-04.png" title="kategory 1"/>
                    </div>
                    <div class="product-title">alsdkalsdka dasdlaksd alskd asdasdasdas d asdas</div>
                    <div class="product-sale-price">Rp 2,222,333</div>
                    <div class="product-price">Rp 1,566,371</div>
                    <div class="product-icon">
                        <img class="img-fluid " src="<?= PATH_IMAGE ?>asset/icon_categories_32px-12.png" title="kategory 1"/>
                        <img class="img-fluid float-right" src="<?= PATH_IMAGE ?>asset/icon_cart_32.png" title="kategory 1"/>
                        <img class="img-fluid float-right" src="<?= PATH_IMAGE ?>asset/icon_wishlist_32.png" title="kategory 1"/>
                    </div>
                </a>

            </div>
            <div class="product-hover">
                PESAN PRODUK
            </div>
        </div>
        <div class="col">
            <div class="product-card">
                <a href="<?= URL ?>product/detail/haha">
                    <div class="product-image">
                        <img class="img-fluid" src="<?= PATH_IMAGE ?>asset/icon_categories_32px-04.png" title="kategory 1"/>
                    </div>
                    <div class="product-title">alsdkalsdka dasdlaksd alskd asdasdasdas d asdas</div>
                    <div class="product-sale-price">Rp 2,222,333</div>
                    <div class="product-price">Rp 1,566,371</div>
                    <div class="product-icon">
                        <img class="img-fluid " src="<?= PATH_IMAGE ?>asset/icon_categories_32px-12.png" title="kategory 1"/>
                        <img class="img-fluid float-right" src="<?= PATH_IMAGE ?>asset/icon_cart_32.png" title="kategory 1"/>
                        <img class="img-fluid float-right" src="<?= PATH_IMAGE ?>asset/icon_wishlist_32.png" title="kategory 1"/>
                    </div>
                </a>

            </div>
            <div class="product-hover">
                PESAN PRODUK
            </div>
        </div>
        <div class="col">
            <div class="product-card">
                <a href="<?= URL ?>product/detail/haha">
                    <div class="product-image">
                        <img class="img-fluid" src="<?= PATH_IMAGE ?>asset/icon_categories_32px-04.png" title="kategory 1"/>
                    </div>
                    <div class="product-title">alsdkalsdka dasdlaksd alskd asdasdasdas d asdas</div>
                    <div class="product-sale-price">Rp 2,222,333</div>
                    <div class="product-price">Rp 1,566,371</div>
                    <div class="product-icon">
                        <img class="img-fluid " src="<?= PATH_IMAGE ?>asset/icon_categories_32px-12.png" title="kategory 1"/>
                        <img class="img-fluid float-right" src="<?= PATH_IMAGE ?>asset/icon_cart_32.png" title="kategory 1"/>
                        <img class="img-fluid float-right" src="<?= PATH_IMAGE ?>asset/icon_wishlist_32.png" title="kategory 1"/>
                    </div>
                </a>

            </div>
            <div class="product-hover">
                PESAN PRODUK
            </div>
        </div>
        <div class="col">
            <div class="product-card">
                <a href="<?= URL ?>product/detail/haha">
                    <div class="product-image">
                        <img class="img-fluid" src="<?= PATH_IMAGE ?>asset/icon_categories_32px-04.png" title="kategory 1"/>
                    </div>
                    <div class="product-title">alsdkalsdka dasdlaksd alskd asdasdasdas d asdas</div>
                    <div class="product-sale-price">Rp 2,222,333</div>
                    <div class="product-price">Rp 1,566,371</div>
                    <div class="product-icon">
                        <img class="img-fluid " src="<?= PATH_IMAGE ?>asset/icon_categories_32px-12.png" title="kategory 1"/>
                        <img class="img-fluid float-right" src="<?= PATH_IMAGE ?>asset/icon_cart_32.png" title="kategory 1"/>
                        <img class="img-fluid float-right" src="<?= PATH_IMAGE ?>asset/icon_wishlist_32.png" title="kategory 1"/>
                    </div>
                </a>

            </div>
            <div class="product-hover">
                PESAN PRODUK
            </div>
        </div>
    </div>
    
    <div class="row" >

        <div class="col">
            <div class="product-card">
                <a href="<?= URL ?>product/detail/haha">
                    <div class="product-image">
                        <img class="img-fluid" src="<?= PATH_IMAGE ?>asset/icon_categories_32px-04.png" title="kategory 1"/>
                    </div>
                    <div class="product-title">alsdkalsdka</div>
                    <div class="product-sale-price">Rp 2,222,333</div>
                    <div class="product-price">Rp 1,566,371</div>
                    <div class="product-icon">
                        <img class="img-fluid " src="<?= PATH_IMAGE ?>asset/icon_categories_32px-12.png" title="kategory 1"/>
                        <img class="img-fluid float-right" src="<?= PATH_IMAGE ?>asset/icon_cart_32.png" title="kategory 1"/>
                        <img class="img-fluid float-right" src="<?= PATH_IMAGE ?>asset/icon_wishlist_32.png" title="kategory 1"/>
                    </div>
                </a>

            </div>
            <div class="product-hover">
                PESAN PRODUK
            </div>
        </div>
        <div class="col">
            <div class="product-card">
                <a href="<?= URL ?>product/detail/haha">
                    <div class="product-image">
                        <img class="img-fluid" src="<?= PATH_IMAGE ?>asset/icon_categories_32px-04.png" title="kategory 1"/>
                    </div>
                    <div class="product-title">alsdkalsdka</div>
                    <div class="product-sale-price">Rp 2,222,333</div>
                    <div class="product-price">Rp 1,566,371</div>
                    <div class="product-icon">
                        <img class="img-fluid " src="<?= PATH_IMAGE ?>asset/icon_categories_32px-12.png" title="kategory 1"/>
                        <img class="img-fluid float-right" src="<?= PATH_IMAGE ?>asset/icon_cart_32.png" title="kategory 1"/>
                        <img class="img-fluid float-right" src="<?= PATH_IMAGE ?>asset/icon_wishlist_32.png" title="kategory 1"/>
                    </div>
                </a>

            </div>
            <div class="product-hover">
                PESAN PRODUK
            </div>
        </div>
        <div class="col">
            <div class="product-card">
                <a href="<?= URL ?>product/detail/haha">
                    <div class="product-image">
                        <img class="img-fluid" src="<?= PATH_IMAGE ?>asset/icon_categories_32px-04.png" title="kategory 1"/>
                    </div>
                    <div class="product-title">alsdkalsdka dasdlaksd alskd asdasdasdas d asdas</div>
                    <div class="product-sale-price">Rp 2,222,333</div>
                    <div class="product-price">Rp 1,566,371</div>
                    <div class="product-icon">
                        <img class="img-fluid " src="<?= PATH_IMAGE ?>asset/icon_categories_32px-12.png" title="kategory 1"/>
                        <img class="img-fluid float-right" src="<?= PATH_IMAGE ?>asset/icon_cart_32.png" title="kategory 1"/>
                        <img class="img-fluid float-right" src="<?= PATH_IMAGE ?>asset/icon_wishlist_32.png" title="kategory 1"/>
                    </div>
                </a>

            </div>
            <div class="product-hover">
                PESAN PRODUK
            </div>
        </div>
        <div class="col">
            <div class="product-card">
                <a href="<?= URL ?>product/detail/haha">
                    <div class="product-image">
                        <img class="img-fluid" src="<?= PATH_IMAGE ?>asset/icon_categories_32px-04.png" title="kategory 1"/>
                    </div>
                    <div class="product-title">alsdkalsdka dasdlaksd alskd asdasdasdas d asdas</div>
                    <div class="product-sale-price">Rp 2,222,333</div>
                    <div class="product-price">Rp 1,566,371</div>
                    <div class="product-icon">
                        <img class="img-fluid " src="<?= PATH_IMAGE ?>asset/icon_categories_32px-12.png" title="kategory 1"/>
                        <img class="img-fluid float-right" src="<?= PATH_IMAGE ?>asset/icon_cart_32.png" title="kategory 1"/>
                        <img class="img-fluid float-right" src="<?= PATH_IMAGE ?>asset/icon_wishlist_32.png" title="kategory 1"/>
                    </div>
                </a>

            </div>
            <div class="product-hover">
                PESAN PRODUK
            </div>
        </div>
        <div class="col">
            <div class="product-card">
                <a href="<?= URL ?>product/detail/haha">
                    <div class="product-image">
                        <img class="img-fluid" src="<?= PATH_IMAGE ?>asset/icon_categories_32px-04.png" title="kategory 1"/>
                    </div>
                    <div class="product-title">alsdkalsdka dasdlaksd alskd asdasdasdas d asdas</div>
                    <div class="product-sale-price">Rp 2,222,333</div>
                    <div class="product-price">Rp 1,566,371</div>
                    <div class="product-icon">
                        <img class="img-fluid " src="<?= PATH_IMAGE ?>asset/icon_categories_32px-12.png" title="kategory 1"/>
                        <img class="img-fluid float-right" src="<?= PATH_IMAGE ?>asset/icon_cart_32.png" title="kategory 1"/>
                        <img class="img-fluid float-right" src="<?= PATH_IMAGE ?>asset/icon_wishlist_32.png" title="kategory 1"/>
                    </div>
                </a>

            </div>
            <div class="product-hover">
                PESAN PRODUK
            </div>
        </div>
        <div class="col">
            <div class="product-card">
                <a href="<?= URL ?>product/detail/haha">
                    <div class="product-image">
                        <img class="img-fluid" src="<?= PATH_IMAGE ?>asset/icon_categories_32px-04.png" title="kategory 1"/>
                    </div>
                    <div class="product-title">alsdkalsdka dasdlaksd alskd asdasdasdas d asdas</div>
                    <div class="product-sale-price">Rp 2,222,333</div>
                    <div class="product-price">Rp 1,566,371</div>
                    <div class="product-icon">
                        <img class="img-fluid " src="<?= PATH_IMAGE ?>asset/icon_categories_32px-12.png" title="kategory 1"/>
                        <img class="img-fluid float-right" src="<?= PATH_IMAGE ?>asset/icon_cart_32.png" title="kategory 1"/>
                        <img class="img-fluid float-right" src="<?= PATH_IMAGE ?>asset/icon_wishlist_32.png" title="kategory 1"/>
                    </div>
                </a>

            </div>
            <div class="product-hover">
                PESAN PRODUK
            </div>
        </div>
    </div>
</div>