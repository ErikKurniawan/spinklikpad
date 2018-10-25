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


</style>
<!--
<a class="hoverable">Hover over me!</a>
<div class="show-on-hover">I'm a block element.</div>

<hr />

<a class="hoverable">Hover over me also!</a>
<span class="show-on-hover">I'm an inline element.</span>
-->

<div class="container-fluid content section">
    <div class="row">
        <div class="col-2">
            <div class="category-title">
                KATEGORI
            </div>
        </div>
        <div class="col-8 product-site-map"><a href="#">Product</a><div></div><a href="#">Kategori Utama</a><div></div><a href="#">Fasion Wanita</a><div></div><a href="#">Pakaian Wanita</a>
        </div>
        <div class="col-2">
            <select id="orderby" name="orderby" style="width:100%">
                <option value="">Penjualan</option>
                <option value="">Harga Tertinggi</option>
                <option value="">Harga Terrendah</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <div class="panel-container">
                <div class="panel-filter">
                    <ul id="accordion1" class="nav nav-pills flex-column">
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="collapse" href="#item-1" data-parent="#accordion1">Ibu & bayi</a>
                            <div id="item-1" class="collapse">
                                <ul class="nav flex-column ml-3">
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Susu</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Botol Bayi</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Baju Bayi</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="collapse" href="#item-2" data-parent="#accordion1">Item 2</a>
                            <div id="item-2" class="collapse show">
                                <ul class="nav flex-column ml-3">
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Sub 2-1</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Sub 2-2</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Sub 2-3</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="collapse" href="#item-3" data-parent="#accordion1">Item 3</a>
                            <div id="item-3" class="collapse">
                                <ul class="nav flex-column ml-3">
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Sub 3-1</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Sub 3-2</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Sub 3-3</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="panel-filter">
                    <div class="title-filter">
                        Merek
                    </div>
                    <style>
                        .custom-control-label
                        {
                            font-size: 12px;
                            color:#6d6e70;
                            padding-top: 3px;
                            cursor: pointer;
                        }
                        .custom-checkbox .custom-control-input:checked~.custom-control-label::before{
                            background: #7f4197;
                            color: green;
                        }

                        .filter-see-more a
                        {
                            color:#f6931e;
                            font-size:12px;
                            text-decoration: none;
                        }


                        .custom-control-input:not(:checked) + .custom-control-label
                        {

                            color:#94989b;
                        }
                    </style>  

                    <div class="custom-control  custom-checkbox">  
                        <input type="checkbox" class="custom-control-input" id="customCheck1">  
                        <label class="custom-control-label" for="customCheck1">Yamaha</label>  
                    </div>
                    <div class="custom-control  custom-checkbox">  
                        <input type="checkbox" class="custom-control-input" id="customCheck2">  
                        <label class="custom-control-label" for="customCheck2">Honda</label>  
                    </div>
                    <div class="custom-control  custom-checkbox">  
                        <input type="checkbox" class="custom-control-input" id="customCheck3">  
                        <label class="custom-control-label" for="customCheck3">Toyota</label>  
                    </div>
                    <div class="filter-see-more">
                        <a href="#">Lihat Merek Lainya</a>
                    </div>
                </div>
                <div class="panel-filter">
                    <div class="title-filter">
                        Lokasi
                    </div>
                    <div class="custom-control  custom-checkbox">  
                        <input type="checkbox" class="custom-control-input" id="customCheck11">  
                        <label class="custom-control-label" for="customCheck11">belitung</label>  
                    </div>
                    <div class="custom-control  custom-checkbox">  
                        <input type="checkbox" class="custom-control-input" id="customCheck22">  
                        <label class="custom-control-label" for="customCheck22">Bali</label>  
                    </div>
                    <div class="custom-control  custom-checkbox">  
                        <input type="checkbox" class="custom-control-input" id="customCheck33">  
                        <label class="custom-control-label" for="customCheck33">Jakarta</label>  
                    </div>
                    <div class="filter-see-more">
                        <a href="#">Liat Seluruh Lokasi</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-10">

            <div class="row row-product">
                <div class="col">
                    <div class="product-card">
                        <a href="<?= URL ?>product/detail/haha">
                            <div class="product-image">
                                <img class="img-fluid" src="<?= PATH_IMAGE ?>testdoang.png" title="kategory 1"/>
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
                                <img class="img-fluid" src="<?= PATH_IMAGE ?>asset/icon_categories_32px-01.png" title="kategory 1"/>
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
                                <img class="img-fluid" src="<?= PATH_IMAGE ?>asset/icon_categories_32px-02.png" title="kategory 1"/>
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
                                <img class="img-fluid" src="<?= PATH_IMAGE ?>asset/icon_categories_32px-03.png" title="kategory 1"/>
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
            <div class="row row-product">
                <div class="col">
                    <div class="product-card">
                        <a href="<?= URL ?>product/detail/haha">
                            <div class="product-image">
                                <img class="img-fluid" src="<?= PATH_IMAGE ?>testdoang.png" title="kategory 1"/>
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
                                <img class="img-fluid" src="<?= PATH_IMAGE ?>asset/icon_categories_32px-05.png" title="kategory 1"/>
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
                                <img class="img-fluid" src="<?= PATH_IMAGE ?>asset/icon_categories_32px-06.png" title="kategory 1"/>
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
            <div class="row row-product">
                <div class="col">
                    <div class="product-card">
                        <a href="<?= URL ?>product/detail/haha">
                            <div class="product-image">
                                <img class="img-fluid" src="<?= PATH_IMAGE ?>testdoang.png" title="kategory 1"/>
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
                                <img class="img-fluid" src="<?= PATH_IMAGE ?>asset/icon_categories_32px-07.png" title="kategory 1"/>
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
                                <img class="img-fluid" src="<?= PATH_IMAGE ?>asset/icon_categories_32px-08.png" title="kategory 1"/>
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
                        </a>

                    </div>
                    <div class="product-hover">
                        PESAN PRODUK
                    </div>
                </div>
            </div>
            <div class="row row-product">
                <div class="col">
                    <div class="product-card">
                        <a href="<?= URL ?>product/detail/haha">
                            <div class="product-image">
                                <img class="img-fluid" src="<?= PATH_IMAGE ?>testdoang.png" title="kategory 1"/>
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
                                <img class="img-fluid" src="<?= PATH_IMAGE ?>asset/icon_categories_32px-10.png" title="kategory 1"/>
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
                                <img class="img-fluid" src="<?= PATH_IMAGE ?>asset/icon_categories_32px-11.png" title="kategory 1"/>
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
                                <img class="img-fluid" src="<?= PATH_IMAGE ?>asset/icon_categories_32px-12.png" title="kategory 1"/>
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
</div>
