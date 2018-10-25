<?php

class cart extends controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        $this->view->css = glfn::_css();
        $this->view->js = glfn::_js();
        $this->view->render('cart/index');
    }

    function addnedit() {
        $post['_save'] = isset($_POST['courier']) ? $_POST['courier'] : '';
        $post['_courier_package'] = isset($_POST['courier_package']) ? $_POST['courier_package'] : '';
        $post['_code_product'] = $post['_code'] = isset($_POST['product']) ? $_POST['product'] : '';
        $qty = isset($_POST['qty']) ? $_POST['qty'] : '1';

        $post['_user'] = isset($_COOKIE[COOKIE_USER]) ? $_COOKIE[COOKIE_USER] : '';
        $post['_password'] = isset($_COOKIE[COOKIE_PWD]) ? $_COOKIE[COOKIE_PWD] : '';


        $proddtl = glfn::_curl_api2('product/detail', $post);
        $proddtl = glfn::_curl_api2('product/detail', $post);


        $listaddr = glfn::_curl_api2('address/listdata', $post);
        $listdataaddress = $listaddr['sts'] ? $listdataaddress = $listaddr['data'] : array();

        $curlcourier = glfn::_curl_api2('courier/listdata', $post);
        $listcourier = $curlcourier['sts'] ? $listcourier = $curlcourier['data'] : array();



        $_code = '';
        $_name = '';
        $_price = '';
        $_supplier = '';
        $_discount = '';
        $_category_detail = '';
        $_status = '';
        $_content = '';
        $_link = '';
        $_createby = '';
        $_priceshow = '';
        $_discount_price = '';
        $_discount_show = '';
        $_user = '';
        $_weight = '';


        $prmt['_code'] = 'ppn';
        $curl_parameter = glfn::_curl_api2('parameter/detail', $prmt);
        $ppn = $curl_parameter['sts'] ? $curl_parameter['data'][0]['_value'] : 10;


        if (isset($proddtl) && is_array($proddtl)) {

            foreach ($proddtl as $key => $value) {
                $_code = $proddtl['data'][0]['_code'];
                $_name = $proddtl['data'][0]['_name'];
                $_weight = $proddtl['data'][0]['_weight'];
                $_price = $proddtl['data'][0]['_price'];
                $_supplier = $proddtl['data'][0]['_supplier'];
                $_discount = $proddtl['data'][0]['_discount'];
                $_category_detail = $proddtl['data'][0]['_category_detail'];
                $_status = $proddtl['data'][0]['_status'];
                $_content = $proddtl['data'][0]['_content'];
                $_link = $proddtl['data'][0]['_link'];
                $btn_addwishlist = $proddtl['data'][0]['_wishlist'] != "" ? 'none' : 'block';
                $btn_removewishlist = $proddtl['data'][0]['_wishlist'] != "" ? 'block' : 'none';
                $_priceshow = explode('.', $_price);
                $_discount_price = $_price - ($_price * $_discount / 100);
                $_discount_show = explode('.', $_discount_price);
            }
        }
    }

    function checkout() {

        $post['_user'] = isset($_COOKIE[COOKIE_USER]) ? $_COOKIE[COOKIE_USER] : '';
        $post['_password'] = isset($_COOKIE[COOKIE_PWD]) ? $_COOKIE[COOKIE_PWD] : '';


        $curlcategory = $this->view->cartlist = glfn::_curl_api2('cart/listdata', $post);
        $asd = $curlcategory ['sts'] ? $curlcategory ['data'] : array();
        $_code = '';
        foreach ($asd as $k => $v) {
            $_code = $v['_code'];
        }

        //glfn::_pre($asd)





        $post['_code'] = $_code;
        $post['_status'] = '2';
        $curlsts = $this->view->cartlist = glfn::_curl_api2('cart/status', $post);
        $asd = $curlsts ['sts'] ? $curlsts ['data'] : array();

        //glfn::_pre($asd);

        glfn::_redirect('product/index');
    }

    function formaddcart() {
        echo JS_PATH;
        ?>

        <script type="text/javascript" src="<?= JS_PATH ?>main.js"></script>
        
        <?php
        $post['_save'] = isset($_POST['courier']) ? $_POST['courier'] : '';
        $post['_courier_package'] = isset($_POST['courier_package']) ? $_POST['courier_package'] : '';
        $post['_code_product'] = $post['_code'] = isset($_POST['product']) ? $_POST['product'] : '';

        $qty = isset($_POST['qty']) ? $_POST['qty'] : '1';

        $post['_user'] = isset($_COOKIE[COOKIE_USER]) ? $_COOKIE[COOKIE_USER] : '';
        $post['_password'] = isset($_COOKIE[COOKIE_PWD]) ? $_COOKIE[COOKIE_PWD] : '';
        $proddtl = glfn::_curl_api2('product/detail', $post);

        //glfn::_pre($proddtl);
        //print_r($post);

        $post['_user'] = $post['_email'] = isset($_COOKIE[COOKIE_USER]) ? $_COOKIE[COOKIE_USER] : '';
        $post['_password'] = isset($_COOKIE[COOKIE_PWD]) ? $_COOKIE[COOKIE_PWD] : '';
        $listaddr = glfn::_curl_api2('address/listdata', $post);

        $listdataaddress = $listaddr['sts'] ? $listdataaddress = $listaddr['data'] : array();
        $curlcourier = glfn::_curl_api2('courier/listdata', $post);

        $listcourier = $curlcourier['sts'] ? $listcourier = $curlcourier['data'] : array();
        ////glfn::_pre($listcourier);


        $_code = '';
        $_name = '';
        $_price = '';
        $_supplier = '';
        $_discount = '';
        $_category_detail = '';
        $_status = '';
        $_content = '';
        $_link = '';
        $_createby = '';
        $_priceshow = '';
        $_discount_price = '';
        $_discount_show = '';
        $_user = '';
        $_weight = '';


        $prmt['_code'] = 'ppn';
        $curl_parameter = glfn::_curl_api2('parameter/detail', $prmt);
        $ppn = $curl_parameter['sts'] ? $curl_parameter['data'][0]['_value'] : 10;


        if (isset($proddtl) && is_array($proddtl)) {

            foreach ($proddtl as $key => $value) {
                $_code = $proddtl['data'][0]['_code'];
                $_name = $proddtl['data'][0]['_name'];
                $_weight = $proddtl['data'][0]['_weight'];
                $_price = $proddtl['data'][0]['_price'];
                $_supplier = $proddtl['data'][0]['_supplier'];
                $_discount = $proddtl['data'][0]['_discount'];
                $_category_detail = $proddtl['data'][0]['_category_detail'];
                $_status = $proddtl['data'][0]['_status'];
                $_content = $proddtl['data'][0]['_content'];
                $_link = $proddtl['data'][0]['_link'];
                $btn_addwishlist = $proddtl['data'][0]['_wishlist'] != "" ? 'none' : 'block';
                $btn_removewishlist = $proddtl['data'][0]['_wishlist'] != "" ? 'block' : 'none';
                $_priceshow = explode('.', $_price);
                $_discount_price = $_price - ($_price * $_discount / 100);
                $_discount_show = explode('.', $_discount_price);
            }
        }
        require 'loadjs.php';
        ?>


        <form class="popup" id="frmadddtocart" method="post">
            <div>
                <span style="font-size: 16px;font-weight: bold;">Tambahkan Kekeranjang</span>
                <a role="button" class="float-right" data-dismiss="modal" aria-label="Close">
                    <span style="font-size:16px;" class="close" aria-hidden="true">&times;</span>
                </a>
            </div>
            <div style="border-top:1px solid black;">



                <div class="row" >
                    <div class="col-6">
                        <div class="label-cart">Nama produk</div>
                        <h4 class="dp-detail"><?= $_name ?></h4>
                        <div class="row" >
                            <div class="col-sm-4">
                                <div class="label-cart">Jumlah Barang</div>
                                <input number class="simplebox" type="text" id="qty" name="qty" value="<?= $qty ?>">
                            </div>
                            <div class="col-sm-4">
                                <div class="label-cart">Harga Barang</div>
                                Rp. <?= glfn::_currency($_discount_price) ?>
                                <input style="border:none;" type="hidden" id="price" name="price" readonly value="<?= glfn::_currency($_discount_price) ?>">
                            </div>
                            <div class="col-sm-4">
                                <div class="label-cart">Berat Barang</div>
                                <?= $_weight ?> (g) / <?= $_weight / 1000 ?> (Kg)
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="label-cart">Keterangan</div>
                        <textarea class="simplebox" placeholder="Keterangan" name="desc" id="desc" cols="" rows="4" style="width: 100%;"></textarea>
                    </div>
                </div>
            </div>
            <div style="border-top:1px solid black;margin:10px 0px;">
                <div class="row" style="padding:0px 0px;">
                    <div class="col-sm-6 label-cart">
                        Alamat
                    </div>
                    <div class="col-sm-3 label-cart" >
                        <?php
                        $no = 0;
                        $_seq = 0;
                        foreach ($listdataaddress as $k => $v) {

                            $_email = $v['_email'];

                            if ($no == 0) {
                                $_seq = $v['_seq'];
                            }
                            $no++;
                        }
                        ?>


                        <input type="hidden" id="address_seq"  value="<?= $_seq ?>"/>
                        <a class="dropdown-toggle"  data-toggle="dropdown"> Pilih Alamat 
                            <i class="fa fa-chevron-down"></i>
                        </a>

                        <?php
                        $overflow = '';
                        if (count($listdataaddress) > 3) {

                            $overflow = 'overflow-y: scroll;height:200px';
                        }
                        ?>

                        <ul class="dropdown-menu" style="<?= $overflow ?>">
                            <?php
                            $no = 0;
                            foreach ($listdataaddress as $k => $v) {

                                $_email = $v['_email'];
                                $_seq = $v['_seq'];
                                $_alias = $v['_alias'];
                                $_name = $v['_name'];
                                $_hp = $v['_hp'];
                                $_address = $v['_address'];
                                $_zipcode = $v['_zipcode'];
                                $_province = $v['_province'];
                                $_subprovince = $v['_subprovince'];
                                $_district = $v['_district'];
                                $_subdistrict = $v['_subdistrict'];


                                $no++;
                                echo '<li style="border-bottom:1px solid #e0e0e0;">'
                                . '<a class="cart-address" seq= "' . $v['_seq'] . '" href="">'
                                . '<div>' . $no . '. ' . strtoupper($v['_name']) . '</div>'
                                . $v['_alias']
                                . '</a>'
                                . '</li>';
                            }
                            ?>
                        </ul>
                    </div>
                    <div class="col-sm-3 label-cart" style="text-align:right">
                        <a href="<?= URL ?>user/address">
                            Tambah Alamat Baru
                            <i class="fa fa-plus"></i>
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <textarea class="simplebox"  readonly id="address" name="address" rows="6" cols="10" style="width: 100%;resize:none;"> <?php
                            $no = 0;
                            foreach ($listdataaddress as $k => $v) {

                                $_email = $v['_email'];
                                $_seq = $v['_seq'];
                                $_alias = $v['_alias'];
                                $_name = $v['_name'];
                                $_hp = $v['_hp'];
                                $_address = $v['_address'];
                                $_zipcode = $v['_zipcode'];
                                $_province = $v['_province'];
                                $_subprovince = $v['_subprovince'];
                                $_district = $v['_district'];
                                $_subdistrict = $v['_subdistrict'];

                                if ($no == 0) {
                                    echo ucfirst($_name) . PHP_EOL
                                    . $_hp . PHP_EOL . PHP_EOL
                                    . $_address
                                    . ', ' . ucfirst(strtolower($_province))
                                    . ', ' . ucfirst(strtolower($_subprovince)) . PHP_EOL
                                    . $_district . PHP_EOL
                                    . $_subdistrict . PHP_EOL
                                    . $_zipcode . PHP_EOL;
                                }

                                $no++;
                            }
                            ?>
                        </textarea>
                    </div>
                </div>
            </div>
            <div style="border-top:1px solid black;margin-top:10px;">

                <div class="row" style="">
                    <div class="col-3 label-cart">
                        Kurir Pengiriman
                    </div>
                    <div class="col-3 label-cart">
                        Paket Pengiriman
                    </div>
                    <div class="col-2 label-cart">
                        PPN ( 10 % ) 
                    </div>
                    <div class="col-2 label-cart">
                        Ongkos Kirim
                    </div>
                    <div class="col-2 label-cart">
                        Subtotal
                    </div>

                </div>

                <div class="row" style="">
                    <div class="col-3 label-cart">
                        <select class="simplebox" id="courier" name="courier">
                            <option value="">----------------</option>
                            <?php
                            foreach ($listcourier as $k => $v) {
                                $selected = $v['_selected'] ? 'selected' : '';
                                echo '<option ' . $selected . ' value="' . $v['_code'] . '">' . $v['_code'] . '</option>';
                                //echo '<option ' . $selected . ' value="'.$v['_code'].'">' . $v['_code'] . '</option';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-3 label-cart">
                        <div class="form-group " >
                            <div class="inputGroupContainer">
                                <select class="simplebox" id="courier_package" name="courier_package">
                                    <option value="">----------------</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-6" >
                        <div id="price-courier" class="row" style="">
                            <div class="col-4 label-cart">
                                PPN ( <?= $ppn ?> % )
                            </div>
                            <div class="col-4 label-cart">
                                Ongkos Kirim
                            </div>
                            <div class="col-4 label-cart">
                                Subtotal
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <input type="hidden" name="product" id="product" value="<?php echo $_code ?>"/>
            <input type="hidden" name="flag" id="flag" value="upt"/>
            <button  type='submit' class=" float-right btn dp-btn-beli buy-prod" href="#">Tambahkan Kekeranjang</button>
        </form>

        <?php
    }

    function courier_package() {
        $post['_save'] = isset($_POST['courier_package']) ? $_POST['courier_package'] : '';
        $post['_code'] = isset($_POST['courier']) ? $_POST['courier'] : '';

        $curlcourier = glfn::_curl_api2('courier/detail', $post);
        $listcourierpackage = $curlcourier['sts'] ? $curlcourier['data'] : array();
        glfn::_pre($listcourierpackage);

        foreach ($listcourierpackage as $key => $v) {
            $selected = $v['_selected'] ? 'selected' : '';
            echo '<option ' . $selected . ' value="' . $v['_seq'] . '" >' . $v['_name'] . '</option>';
        }
    }

    function courier_package_price() {
        $post['_save'] = isset($_POST['courier_package']) ? $_POST['courier_package'] : '';
        $post['_code'] = isset($_POST['courier']) ? $_POST['courier'] : '';
        $post['_supplier'] = isset($_POST['supplier']) ? $_POST['supplier'] : '';
        $post['_seqaddress'] = isset($_POST['seqaddress']) ? $_POST['seqaddress'] : '';
        $post['_courier_package'] = isset($_POST['courier_package']) ? $_POST['courier_package'] : '';
        $post['_courier'] = isset($_POST['courier']) ? $_POST['courier'] : '';

        $post['_user'] = isset($_COOKIE[COOKIE_USER]) ? $_COOKIE[COOKIE_USER] : '';



        $qty_prod = isset($_POST['qty']) ? $_POST['qty'] : '';
        $price = isset($_POST['price']) ? str_replace(',', '', ltrim($_POST['price'], 'Rp.')) : '';
        $weight = isset($_POST['weight']) ? $_POST['weight'] : '';


        //glfn::_pre($_POST);

        $weighttokg = $weight / 1000;
        $dikalikanqty = $weighttokg * $qty_prod;


        $asd = explode('.', $dikalikanqty);
        $berat = isset($asd[1]) && ($asd[1]) > 0 ? (int) $asd[0] + 1 : $asd[0];


        $prmt['_code'] = 'ppn';



        if ($post['_code'] == "JNE") {


            $curlcourier = glfn::_curl_api2('courier/jne', $post);
            $listcourierpackage = $curlcourier['sts'] ? $curlcourier['data'] : array();
        } else {
            $curlcourier = glfn::_curl_api2('courier/detail', $post);
            $listcourierpackage = $curlcourier['sts'] ? $curlcourier['data'] : array();
        }

        $curl_parameter = glfn::_curl_api2('parameter/detail', $prmt);
        $ppn = $curl_parameter['sts'] ? $curl_parameter['data'][0]['_value'] : 10;



        $courier_price = '';
        $keyselected = 0;
        foreach ($listcourierpackage as $key => $v) {
            if ($v['_selected']) {
                $courier_price = $v['_price'];
            }
        }
        $totalwithppn = $qty_prod * $price * $ppn / 100 + ($qty_prod * $price);
        $total_courier = $berat * $courier_price;
        $subtotal = $totalwithppn + $total_courier;
        ?>
        <input class="" style="border:none;" type="hidden" id="courier_price" name="courier_price" readonly value="<?php echo $courier_price; ?>">


        <div class="col-4 label-cart">
            Rp. <?php echo glfn::_currency($totalwithppn); ?>
        </div>
        <div class="col-4 label-cart">
            Rp. <?php echo glfn::_currency($total_courier); ?>
        </div>
        <div class="col-4 label-cart">
            Rp. <?php echo glfn::_currency($subtotal); ?>
        </div>

        <?php
    }

    function courier_package_price2() {
        $post['_save'] = isset($_POST['courier_package']) ? $_POST['courier_package'] : '';
        $post['_code'] = isset($_POST['courier']) ? $_POST['courier'] : '';

        glfn::_pre($_POST);
        $qty_prod = isset($_POST['qty']) ? $_POST['qty'] : '';
        $price = isset($_POST['price']) ? str_replace(',', '', ltrim($_POST['price'], 'Rp.')) : '';
        $weight = isset($_POST['weight']) ? $_POST['weight'] : '';


        //glfn::_pre($_POST);

        $weighttokg = $weight / 1000;
        $dikalikanqty = $weighttokg * $qty_prod;


        $asd = explode('.', $dikalikanqty);
        $berat = isset($asd[1]) && ($asd[1]) > 0 ? (int) $asd[0] + 1 : $asd[0];


        $prmt['_code'] = 'ppn';

        if ($post['_code'] == "JNE") {


            $curlcourier = glfn::_curl_api2('courier/detail', $post);
            $listcourierpackage = $curlcourier['sts'] ? $curlcourier['data'] : array();
        } else {
            $curlcourier = glfn::_curl_api2('courier/detail', $post);
            $listcourierpackage = $curlcourier['sts'] ? $curlcourier['data'] : array();
        }

        $curl_parameter = glfn::_curl_api2('parameter/detail', $prmt);
        $ppn = $curl_parameter['sts'] ? $curl_parameter['data'][0]['_value'] : 10;



        $courier_price = '';
        $keyselected = 0;
        foreach ($listcourierpackage as $key => $v) {
            if ($v['_selected']) {
                $courier_price = $v['_price'];
            }
        }
        $totalwithppn = $qty_prod * $price * $ppn / 100 + ($qty_prod * $price);
        $total_courier = $berat * $courier_price;
        $subtotal = $totalwithppn + $total_courier;
        ?>
        <input class="" style="border:none;" type="hidden" id="courier_price" name="courier_price" readonly value="<?php echo $courier_price; ?>">

        <div class="col-sm-2 label-cart">
            PPN ( <?= $ppn ?> % )
            <br>
            Rp. <?php echo glfn::_currency($totalwithppn); ?>
        </div>
        <div class="col-sm-2 label-cart">
            Ongkos Kirim
            <br>
            Rp. <?php echo glfn::_currency($total_courier); ?>
        </div>
        <div class="col-sm-2 label-cart">
            Subtotal
            <br>
            Rp. <?php echo glfn::_currency($subtotal); ?>
        </div>

        <?php
    }

    function select_address() {

        $post['_user'] = $post['_email'] = isset($_COOKIE[COOKIE_USER]) ? $_COOKIE[COOKIE_USER] : '';
        $post['_password'] = isset($_COOKIE[COOKIE_PWD]) ? $_COOKIE[COOKIE_PWD] : '';
        $post['_seq'] = isset($_POST['seq']) ? $_POST['seq'] : '';



        $listaddr = glfn::_curl_api2('address/detail', $post);
        $listdataaddress = $listaddr['sts'] ? $listdataaddress = $listaddr['data'] : array();



        $_email = '';
        $_seq = '';
        $_alias = '';
        $_name = '';
        $_hp = '';
        $_address = '';
        $_zipcode = '';
        $_province = '';
        $_subprovince = '';
        $_district = '';
        $_subdistrict = '';
        $_primary = '';

        foreach ($listdataaddress as $k => $v) {

            $_email = $v['_email'];
            $_seq = $v['_seq'];
            $_alias = $v['_alias'];
            $_name = $v['_name'];
            $_hp = $v['_hp'];
            $_address = $v['_address'];
            $_zipcode = $v['_zipcode'];
            $_province = $v['_province'];
            $_subprovince = $v['_subprovince'];
            $_district = $v['_district'];
            $_subdistrict = $v['_subdistrict'];
        }

        echo ucfirst($_name) . PHP_EOL
        . $_hp . PHP_EOL . PHP_EOL
        . $_address
        . ', ' . ucfirst(strtolower($_province))
        . ', ' . ucfirst(strtolower($_subprovince)) . PHP_EOL
        . $_district . PHP_EOL
        . $_subdistrict . PHP_EOL
        . $_zipcode . PHP_EOL;
    }

    /**/

    function addtocart() {
        $post['_user'] = isset($_COOKIE[COOKIE_USER]) ? $_COOKIE[COOKIE_USER] : '';
        $post['_password'] = isset($_COOKIE[COOKIE_PWD]) ? $_COOKIE[COOKIE_PWD] : '';



        $post['_product'] = isset($_POST['product']) ? $_POST['product'] : '';
        $post['_qty'] = isset($_POST['qty']) ? $_POST['qty'] : '';
        $post['_desc'] = isset($_POST['desc']) ? $_POST['desc'] : '';
        $post['_courier'] = isset($_POST['courier']) ? $_POST['courier'] : '';
        $post['_courier_package'] = isset($_POST['courier_package']) ? $_POST['courier_package'] : '';
        $post['_address'] = isset($_POST['address']) ? $_POST['address'] : '';
        $post['_source'] = isset($_POST['source']) ? $_POST['source'] : '';


        ////glfn::_pre($post);
        $curl = glfn::_curl_api2('cart/add', $post);
        //glfn::_pre($curl);

        echo '  
        <div class="container-fluid">
        <div class="row" style="height:80px;border-top:1px solid black;margin-top:10px;">
                    
                    
                            <div class="col-xs-12 col-md-12" style="height:50px;line-height:50px;">Barang Sudah ditambahkan di keranjang</div>
                    
                </div>
                <div class="row">
                    <a style="display:inline" class="btn btn-np pull-left"   href="' . URL . 'product">Lanjutkan Belanja</a>
                    <a style="display:inline" class="btn btn-np pull-right"  href="' . URL . 'cart">Lihat Keranjang</a>
                </div>
                </div>
                ';
    }


}
