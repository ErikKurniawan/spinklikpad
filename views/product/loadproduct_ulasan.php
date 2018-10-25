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
        display: inline-block;
        width: 200px;
        font-weight: bold;
        font-size: 20px;
        color: #fff;
        padding: 0 10px;
        background: #7f4197;
        height: 50px;
        line-height: 50px;
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
        border:0px solid black;
        display: inline-block;
        line-height: 50px;
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
<div  class="container-fluid content section">
    <div class="row">
        <div class="col">
            <div class="col-8 product-site-map">
                <a href="#">Produk</a><div></div><a href="#">Kategori Utama</a><div></div><a href="#">Electronik</a><div></div><a href="#">Komputer</a>
            </div>
        </div>
    </div>

</div>



















<script>
    $(function () {
        $(".supplier-rate-star").rateYo({
            ratedFill: '#d91b5b',
            starWidth: "15px",
            readOnly: true
        });
    });
</script>
<div  class="container-fluid content section">
    <div class="row">
        <div class="col-9">
            <div class="row section">
                <div class="col-1">
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">

                        <a data-toggle="pill" href="#p1"><img class="img-fluid"  src="<?= PATH_IMAGE ?>p1.jpg" title="image 1"/></a>
                        <a data-toggle="pill" href="#p2"><img class="img-fluid"  src="<?= PATH_IMAGE ?>p2.jpg" title="image 2"/></a>
                        <a data-toggle="pill" href="#p3"><img class="img-fluid"  src="<?= PATH_IMAGE ?>p3.jpg" title="image 3"/></a>
                        <a data-toggle="pill" href="#p4"><img class="img-fluid"  src="<?= PATH_IMAGE ?>p4.jpg" title="image 4"/></a>
                        <a data-toggle="pill" href="#p5"><img class="img-fluid"  src="<?= PATH_IMAGE ?>p5.jpg" title="image 5"/></a>

                    </div>
                </div>
                <div class="col-5" style="border:1px solid #e2e7e9;height: 300px;">
                    <div class="tab-content" id="v-pills-tabContent" >
                        <div class="tab-pane fade show active" id="p1" role="tabpanel" aria-labelledby="v-pills-home-tab">
                            <img class="img-fluid"  src="<?= PATH_IMAGE ?>p1.jpg" title="image 1"/>
                        </div>
                        <div class="tab-pane fade" id="p2" role="tabpanel" aria-labelledby="v-pills-home-tab">
                            <img class="img-fluid"  src="<?= PATH_IMAGE ?>p2.jpg" title="image 1"/>
                        </div>
                        <div class="tab-pane fade" id="p3" role="tabpanel" aria-labelledby="v-pills-home-tab">
                            <img class="img-fluid"  src="<?= PATH_IMAGE ?>p3.jpg" title="image 1"/>
                        </div>
                        <div class="tab-pane fade" id="p4" role="tabpanel" aria-labelledby="v-pills-home-tab">
                            <img class="img-fluid"  src="<?= PATH_IMAGE ?>p4.jpg" title="image 1"/>
                        </div>
                        <div class="tab-pane fade" id="p5" role="tabpanel" aria-labelledby="v-pills-home-tab">
                            <img class="img-fluid"  src="<?= PATH_IMAGE ?>p5.jpg" title="image 1"/>
                        </div>
                    </div>
                </div>
                <div class="col-6 product-info">
                    <div class="supplier-title">Rumah Komputer</div>
                    <div class="d-product-title">Asus ROG </div>
                    <div class="d-product-sale-price">Rp 15,699,999.00</div>
                    <div class="d-product-price">Rp 10.000.000</div>
                    <div class="row d-product-dtl">
                        <div class="col-3">Procesor</div>
                        <div class="col-9">
                            <style>
                                .radio-toolbar label
                                {
                                    margin: 0px 5px
                                }
                                .radio-toolbar input[type="radio"] {
                                    display: none;
                                }

                                .radio-toolbar label {
                                    display: inline-block;
                                    border:1px solid #e2e7e9;
                                    padding: 4px 11px;
                                    font-family: Arial;
                                    font-size: 16px;
                                    cursor: pointer;
                                    color:#6a6c6c;

                                }
                                .radio-toolbar input[type="radio"]:checked+label {
                                    background-color: #e2e7e9;
                                }
                            </style>
                            <div class="radio-toolbar">
                                <input type="radio" id="radio1" name="radios" value="all" checked>
                                <label for="radio1">i3</label>

                                <input type="radio" id="radio2" name="radios" value="false">
                                <label for="radio2">i5</label>

                                <input type="radio" id="radio3" name="radios" value="true">
                                <label for="radio3">i7</label>
                            </div>
                        </div>

                    </div>
                    <div class="row">

                        <div class="col">
                            <a class="btn btn-troly" href="<?=URL?>/cart" role="button">Beli</a>
                        </div>
                        <div class="col">
                            <a class="btn btn-wishlist" href="#" role="button">Tambah Wishlist</a>


                        </div>
                    </div>
                </div>
            </div>
            <div class="row section">
                <div class="col-12">
                    <ul class="nav nav-pills mb-3 i-tab" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Detail Produk</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Ulasan</a>
                        </li>
                    </ul>

                    <div class="tab-content" id="pills-tabContent">
                        <div style="border:0px solid black;" class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">

                            ASUS ROG GL702ZC-GC824T [90NB0FV1-M04500] - Black<br><br>Laptop Gaming Pertama dengan Processor AMD Ryzen 7<br>Asus ROG Strix GL702ZC adalah laptop Gaming pertama di dunia yang ditenagai Processor AMD Ryzen 7. Laptop ini dirancang untuk membawa performa luar biasa saat bermain Game High End atau pekerjaan multimedia yang berat. <br><br>HDD+SSD dan RAM DDR4<br>Kombinasi penyimpanan HDD dan SSD dalam satu laptop memungkinkan Anda dapat simpan banyak data dan mempercepat respon aplikasi secara bersamaan. Penyimpanan SSD sebesar 256 GB bisa dimaksimalkan untuk mempercepat Boot Up sistem operasi, meningkatkan respon Game atau aplikasi, dan mempersingkat waktu Loading Game. Sementara itu, HDD berkapasitas 1TB bisa digunakan untuk simpan data berukuran besar. RAM DDR4 memiliki kecepatan dan efisiensi daya listrik lebih baik dibanding generasi sebelumnya. <br><br>GARANSI <br>2 TAHUN GARANSI RESMI ASUS INDONESIA<br><br>FREE PROMO FARCRY 5<br>Cara mendapatkan Game Facry 5, silahkan input langkah-langkah di bawah ini;<br><br>Step 1. Purchase eligible OEM system containing a Radeon RX Vega 64 or 56 or RX 580 to receive Coupon Code from AMD Indonesia. Have all purchase documentation email to <a rel="nofollow noopener noreferrer" target="_blank" href="https://tkp.me/r?url=http://admin@amd-id.com">admin@amd-id•com</a><br><br>Step 2. Log in or set up your <a rel="nofollow noopener noreferrer" target="_blank" href="https://tkp.me/r?url=http://AMDRewards.com">AMDRewards•com</a> profile<br><br>Step 3. Enter Coupon Code. Coupon code will automate Product Verification Tool (PVT)<br><br>Step 4. Click on AMDRewards API to enter log in information for Uplay account game code is dropped into Uplay Profile<br><br>Step 5. Enter Uplay account directly and user will see game in their library<br><br>Step 6. Play Far Cry 5 (from March 27, 2018)<br><br>SPESIFIKASI<br><br>Platform	Notebook <br>Tipe Prosesor	AMD Octa Core <br>Processor Onboard	AMD RYZEN 7-1700 <br>Memori Standar	8GB DDR4 <br>Max. Memori	32 GB <br>Tipe Grafis	AMD Radeon RX 580 4GB <br>Ukuran Layar	17.3 Inch <br>Resolusi Layar	1920 x 1080 <br>Tipe Layar	Anti-Glare Display <br>Audio	Integrated <br>Speaker	Integrated <br>Kapasitas Penyimpanan	1TB HDD <br>Networking	Integrated <br>Kecepatan Jaringan	10 / 100 / 1000 Mbps


                        </div>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <div style="float:left;width: 150px;height: 100px;display: block;text-align: ">

                                <div style="text-align: center;color:#95999A;font-size: 12px;border:0px solid black;margin-bottom: 15px;">Nilai Produk</div>
                                <div class="supplier-rate2">5 / 5</div>
                                <div class="supplier-rate-star" data-filter="rate" data-category ="" data-code ="5" data-rateyo-rating="5"></div>
                                <div style="font-size:12px;color:#95999A;">4 ulasan</div>
                            </div>
                            <div style="float:left;width: 696px;text-align: left;border:0px solid red;height: 500px;  display: block;margin-left: 20px;">

                                <div class="row" style="padding:15px;color:#95999A;font-size: 12px; border:1px #e2e7e9 solid;margin-bottom: 10px;">

                                    <div class="col-2">
                                        <div>Erik Kruniawan</div>
                                        <div style="margin-top: 20px;">07 Jan 2018</div>
                                        <div>19:27</div>
                                    </div>
                                    <div class="col-2"><div class="supplier-rate-star" data-filter="rate" data-category ="" data-code ="5" data-rateyo-rating="5"></div></div>
                                    <div class="col-8">
                                        Produknya keren banget semoga awet
                                    </div>

                                </div>

                                <div class="row" style="padding:15px;color:#95999A;font-size: 12px; border:1px #e2e7e9 solid;margin-bottom: 10px;">

                                    <div class="col-2">
                                        <div>Tristanto</div>
                                        <div style="margin-top: 20px;">07 Jan 2018</div>
                                        <div>19:27</div>
                                    </div>
                                    <div class="col-2"><div class="supplier-rate-star" data-filter="rate" data-category ="" data-code ="5" data-rateyo-rating="5"></div></div>
                                    <div class="col-8">
                                        Rencana buat maen DOTA tapi ternyata seletah di coba pake buat kerja Photo shop dan ai terjanya berjalan sangat smooth
                                    </div>
                                </div>


                                <div class="row" style="padding:15px;color:#95999A;font-size: 12px; border:1px #e2e7e9 solid;margin-bottom: 10px;">

                                    <div class="col-2">
                                        <div>Tristanto</div>
                                        <div style="margin-top: 20px;">07 Jan 2018</div>
                                        <div>19:27</div>
                                    </div>
                                    <div class="col-2"><div class="supplier-rate-star" data-filter="rate" data-category ="" data-code ="5" data-rateyo-rating="5"></div></div>
                                    <div class="col-8">
                                        Rencana buat maen DOTA tapi ternyata seletah di coba pake buat kerja Photo shop dan ai terjanya berjalan sangat smooth
                                    </div>
                                </div>


                                <div class="row" style="padding:15px;color:#95999A;font-size: 12px; border:1px #e2e7e9 solid;margin-bottom: 10px;">

                                    <div class="col-2">
                                        <div>Tristanto</div>
                                        <div style="margin-top: 20px;">07 Jan 2018</div>
                                        <div>19:27</div>
                                    </div>
                                    <div class="col-2"><div class="supplier-rate-star" data-filter="rate" data-category ="" data-code ="5" data-rateyo-rating="5"></div></div>
                                    <div class="col-8">
                                        Rencana buat maen DOTA tapi ternyata seletah di coba pake buat kerja Photo shop dan ai terjanya berjalan sangat smooth
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-3">
            <div class="panel-container">
                <div class="supplier-info">
                    INFORMASI PENJUAL
                </div>
                <div class="panel-supplier">
                    <div class="supplier-image">
                        <img class="img-fluid"  src="<?= PATH_IMAGE ?>asset/icon_cart_32.png" title="kategory 1"/>
                    </div>
                    <div class="supplier-title">Rumah Komputer</div>
                    <div class="supplier-address">Kota Jakarta barat</div>
                    <div class="supplier-address">DKI Jakarta</div>
                    <div class="supplier-rate-star" data-filter="rate" data-category ="" data-code ="5" data-rateyo-rating="5"></div>
                    <div class="supplier-rate">5/5</div>


                    <div class="supplier-btn"><a class="btn btn-1" href="#" role="button">Favorit</a></div>
                    <div class="supplier-btn"><a class="btn btn-2" href="#" role="button">Chat Penjual</a></div>
                </div>
            </div>
        </div>

    </div>
</div>

<style>
    .supplier-title
    {
        color:#733f98;
        font-size:18px;
        font-weight: bold;
    }

    .d-product-title
    {
        color:#733f98;
        font-size: 14px;
        font-weight: bold;
        padding:5px 0px;
        text-overflow: ellipsis;
        overflow: hidden;
    }



    .d-product-sale-price{
        color:#e2e7e9;
        font-size: 13px;
        height: 20px;
        border:0px solid black;
        margin-top: 3px;
        overflow: hidden;

    }
    .d-product-price{
        color:#d91b5b;
        font-size: 15px;
        height: 22px;
        border:0px solid black;
        overflow: hidden;

    }


    .panel-supplier
    {
        border:1px solid #f1f1f1;
        padding:10px;

    }

    .panel-supplier div
    {
        text-align: center;
    }

    .supplier-info
    {
        text-align: center;
        background: #733f98;
        color:#fff;
        font-size:18px;
        font-weight: bold;
        padding: 10px;

    }

    .supplier-image
    {
        padding:20px 0px;

    }

    .supplier-image img
    {
        width: 150px;
        height: 150px;
        border-radius: 75px;
        border:1px solid #e2e7e9;
    }

    .supplier-address
    {
        color:#95999A;
        font-size:13px;
    }

    .supplier-rate-star
    {
        margin: 10px auto 10px auto;   
    }
    .supplier-rate
    {
        font-size: 13px;
        color:#95999A;
        margin-bottom: 15px;
    }

    .supplier-rate2
    {
        font-size: 17px;
        color:#733f98;

    }

    .supplier-btn
    {
        margin-bottom: 10px;
    }
    .btn-1
    {
        background: #f7931d;
        color: #fff;
        width: 200px;
    }
    .btn-1:hover
    {
        background: #d91b5b;
        color: #fff;
    }


    .btn-2
    {
        color: #95999A;
        width: 200px;
        border:1px solid #95999A;
    }
    .btn-2:hover
    {
        background: #6a6c6c;
        color: #fff;
        border:1px solid #6a6c6c;

    }


    .tab-pane  > * 
    {
        padding: 20px;
        height: 300px;    
        vertical-align:middle; 
        text-align:center;
    }

    .product-info
    {
        padding-left:50px;
    }

    .btn-secondary
    {
        background: #fff !important;
        color:#95999A; 
        border: 1px solid #95999A;
    }

    .btn-secondary:hover
    {

        color:#6a6c6c; 
        border: 1px solid #6a6c6c;
    }

    .d-product-dtl
    {
        padding: 20px 0px;
    }

    .ratebox
    {
        border:1px solid black;
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
    
    
    .btn-wishlist
    {
        border:1px solid #733f98;
        width: 100%;
        
        color: #6a6c6c;
    }
    .btn-wishlist:hover
    {
        background: #733f98;
        color: #fff;
    }
</style>