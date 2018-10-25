<style>
    .cart-header
    {
        border:1px solid #95999A;
        font-size:14px;
        color:#6a6c6c;
        line-height: 30px;

    }

    .cart-list-supplier
    {
        margin-top: 20px;
        line-height: 40px;
        font-size:14px;
        border:1px solid #95999A;
        color:#733f98;
        font-weight: bold;

    }
    .cart-list
    {
        margin-top: -1px;
        border:1px solid #95999A;
        font-size:14px;
        color:#6a6c6c;
        line-height: 100px;
        padding:10px 0px;
    }

    .cart-product-icon img {
        margin:  10px auto;
        display: block;
        height: 94px;   

    }

    .cart-product-price
    {
        color:#d91b5b;
    }

    .grand-total-title
    {
        margin-top: 30px;
        margin-bottom: 10px;
        line-height: 30px;
        font-size:14px;
        color:#95999A;

    }
    .grand-total
    {
        font-size:16px;
        color:#d91b5b;
        margin-bottom: 20px;
    }

    .btn-troly
    {
        width: 100%;
        background: #231f20;
        color: #6a6c6c;
    }
    .btn-troly:hover
    {
        color: #fff;
    }

</style>

<div class="container-fluid content section">
    <div class="row cart-header">
        <div class="col-5">Produk</div>
        <div class="col-2">Harga</div>
        <div class="col-1">Jumlah</div>
        <div class="col-2">Subtotal</div>
        <div class="col-2"></div>
    </div>

    <div class="row cart-list-supplier">
        <div class="col-12">Rumah Komputer</div>
    </div>
    <div class="row cart-list">
        <div class="col-1 cart-product-icon" >
            <img class="img-fluid"  src="<?= PATH_IMAGE ?>p1.jpg" title="image 1"/>
        </div>
        <div class="col-4">ASUS ROG GL102</div>
        <div class="col-2 cart-product-price">10,000,000.00</div>
        <div class="col-1 cart-product-price">2</div>
        <div class="col-2 cart-product-price">20,000,000.00</div>
        <div class="col-2 product-icon">
            <img class="img-fluid " src="<?= PATH_IMAGE ?>asset/icon_cart_32.png" title="kategory 1"/>
            <img class="img-fluid " src="<?= PATH_IMAGE ?>asset/icon_wishlist_32.png" title="kategory 1"/>
        </div>
    </div>
    <div class="row cart-list">
        <div class="col-1 cart-product-icon">
            <img class="img-fluid"  src="<?= PATH_IMAGE ?>p2.jpg" title="image 1"/>

        </div>
        <div class="col-4">ASUS AO 12XZ</div>
        <div class="col-2 cart-product-price">30,000,000.00</div>
        <div class="col-1 cart-product-price">1</div>
        <div class="col-2 cart-product-price">30,000,000.00</div>
        <div class="col-2 product-icon">
            <img class="img-fluid " src="<?= PATH_IMAGE ?>asset/icon_cart_32.png" title="kategory 1"/>
            <img class="img-fluid " src="<?= PATH_IMAGE ?>asset/icon_wishlist_32.png" title="kategory 1"/>
        </div>
    </div>
    <div class="row total-belajanja">
        <div class="col-4 offset-8">
            <div class="grand-total-title">Total Belanja</div>
            <div class="grand-total">Rp 50,000,000.00</div>
            <div ><a class="btn btn-troly" href="<?=URL?>payment" role="button">Metode Pembayaran</a></div>
        </div>
    </div>
</div>