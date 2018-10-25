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
        padding-left: 10px;
        font-weight: bold;
        font-size: 20px;
        color: #fff;
        background: #7f4197;
        height: 50px;
        line-height: 50px;
    }

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
        line-height: 50px;
    }

    .product-site-map a
    {
        font-size:14px;
        color:#95999A;
        text-decoration: none;
        margin-right:5px;
    }

    .product-site-map a:hover
    {
        color:#6a6c6c;
    }

    .product-site-map div
    {
        width: 10px;
        height: 10px;
        border-bottom: 5px solid transparent;
        border-left: 5px solid #f7931d;
        border-top: 5px solid transparent;
        border-right: 5px solid transparent;
        display: inline-block;
        margin: 0px 5px;
    }

    .product-site-map a:last-child
    {
        color:#733f98;
    }
</style>
<div  class="container-fluid content section">
    <div class="row">
        <div class="col-2">
            <div class="category-title">
                KATEGORI
            </div>
        </div>
        <div class="col-10">
            <div class="product-site-map">
                <a href="#">Product</a><div></div><a href="#">Kategori Utama</a><div></div><a href="#">Fasion Wanita</a><div></div><a href="#">Pakaian Wanita</a>
            </div>

        </div>
    </div>
    

    <div class="row">
        <div class="col-2">
            
        </div>
        <div class="col-10">
            <div class="row">
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
    </div>


    <div class="row">
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
