<?php

class cart extends controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        $this->view->css = glfn::_css();
        $this->view->js = glfn::_js();

        $post['_user'] = isset($_COOKIE[COOKIE_USER]) ? $_COOKIE[COOKIE_USER] : '';
        $post['_password'] = isset($_COOKIE[COOKIE_PWD]) ? $_COOKIE[COOKIE_PWD] : '';


        $curl = $this->view->cartlist = glfn::_curl_api2('cart/listdata', $post);
        $cart = $this->view->cartlist = $curl ['sts'] ? $curl ['data'] : array();
//glfn::_pre($cart);


        $this->view->render('cart/index');
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

        $post['_product'] = isset($_POST['product']) ? $_POST['product'] : '';
        $post['_code_detail_transaction'] = isset($_POST['code_detail_transaction']) ? $_POST['code_detail_transaction'] : '';
        $post['_courier_package'] = isset($_POST['courier_package']) ? $_POST['courier_package'] : '';
        $post['_user'] = $post['_email'] = isset($_COOKIE[COOKIE_USER]) ? $_COOKIE[COOKIE_USER] : '';
        $post['_password'] = isset($_COOKIE[COOKIE_PWD]) ? $_COOKIE[COOKIE_PWD] : '';



        $proddtl = glfn::_curl_api2('product/detail', array('_code' => $post['_product']));


        $listaddr = glfn::_curl_api2('address/listdata', $post);
        $listdataaddress = $listaddr['sts'] ? $listaddr['data'] : array();

        $curlcourier = glfn::_curl_api2('courier/listdata', $post);
        $listcourier = $curlcourier['sts'] ? $curlcourier['data'] : array();



        $prmt['_code'] = 'ppn';
        $curl_parameter = glfn::_curl_api2('parameter/detail', $prmt);
        $ppn = $curl_parameter['sts'] ? $curl_parameter['data'][0]['_value'] : 10;


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



        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



        $curl = glfn::_curl_api2('cart/singledata', $post);
        $singleitem = $curl['sts'] ? $curl['data'] : array();


        //glfn::_pre($post);
        $_code = '';
        $_tax = '';
        $_status = '';
        $_detail = array();

        foreach ($singleitem as $k => $v) {
            $_code = $v['_code'];
            $_tax = $v['_tax'];
            $_status = $v['_status'];
            $_detail = $v['_detail'];
        }

        $address = "";
        $_desc = "";
        $_courier = "";
        $_courier_package = "";
        $grandtotal = 0;
        $_qty = 1;
        if (count($_detail) > 0) {
            foreach ($_detail as $k => $v) {


                $_supplier = $v['_supplier'];
                $address = $v['_address'];
                $_courier = $v['_courier'];
                $_courier_package = $v['_courier_package'];
                $_details = $v['_details'];
                foreach ($_details as $k2 => $v2) {



                    $_price = $v2['_price'];
                    $_qty = $v2['_qty'];
                    $_desc = $v2['_desc'];
                }
            }
        }


        $qty = count($_detail) > 0 ? $_qty : '1';
        ?>
        <script type="text/javascript" src="<?= JS_PATH ?>main.js"></script>
        <script>


            function courier_prize()
            {
                $.post('<?php echo URL; ?>cart/courier_package_price', {'qty': $('#qty').val(), 'price': $('#price').val(), 'courier': $('#courier').val(), 'courier_package': $('#courier_package').val(), 'weight': '<?= $_weight ?>', 'supplier': '<?= $_supplier ?>', 'seqaddress': $('#address_seq').val()}, function (a) {
                    $('#price-courier').html(a);
                });
            }

            $(document).ready(function () {



                $('#courier').change(function () {
                    $.post('<?php echo URL; ?>cart/courier_package', {'courier': $('#courier').val(), 'courier_package': ''}, function (a) {
                        //alert(a);
                        $('#courier_package').html(a);
                        courier_prize();
                    });

                });

                $('#courier_package').change(function () {
                    courier_prize();
                });


                $('#frmadddtocart').bootstrapValidator({
                    framework: 'bootstrap',
                    Icons: {
                        valid: 'glyphicon glyphicon-ok',
                        invalid: 'glyphicon glyphicon-remove',
                        validating: 'glyphicon glyphicon-refresh'
                    },

                    fields: {
                        address: {
                            validators: {
                                notEmpty: {
                                    message: 'Silahkan Pilih Alamat'
                                }
                            }
                        },
                        courier: {
                            validators: {
                                notEmpty: {
                                    message: 'Silahkan Pilih Kurir'
                                }
                            }
                        },
                        courier_package: {
                            validators: {
                                notEmpty: {
                                    message: 'Silahkan Pilih Paket'
                                },
                                stringLength: {
                                    min: 1,
                                    message: 'The username must be more than 6 and less than 30 characters long'
                                }
                            }
                        }
                    }
                }).on('success.form.bv', function (e) {
                    e.preventDefault();
                    $.post('<?php echo URL; ?>cart/addtocart', $("#frmadddtocart").serialize(), function (a) {
                        $('#loadcontent').html(a);
                    });
                    $("#exampleModalCenter").modal();
                    $('#listcart').load('<?= URL ?>cart/listdata');
                    return false;
                });


                $("#qty").bind('blur', function (e) {

                    if ($('#qty').val() == "")
                    {
                        $('#qty').val('1');
                    }

                    courier_prize();
                });
                $('.cart-address').click(function () {
                    $('#address_seq').val($(this).attr('seq'));
                    $.post('<?php echo URL; ?>cart/select_address', {'seq': $(this).attr('seq')}, function (a) {
                        $('#address').val(a);


                    });
                    courier_prize();
                    return false;
                });

                courier_prize();
            });



        </script>
        <form id="frmadddtocart" method="post">

            <div style="border-bottom:1px dashed #d2d2d2;padding-bottom:10px;">
                <h5 style="display: inline-block" class="modal-title" id="exampleModalLabel">Tambahkan Ke Keranjang</h5>
                <button style="border:0px !important;" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>
            <input type="hidden" id="_code_detail_transaction" name="_code_detail_transaction" value="<?= $post['_code_detail_transaction'] ?>">
            <div style="border-bottom:1px dashed #d2d2d2;padding:15px 0px;">
                <div class="row" >
                    <div class="col-1" style="">
                         <div style="display: inline-block;line-height:60px;height: 60px;width:60px; border:1px solid #d2d2d2;border-radius: 5px;" >
                            <center>
                                <img class="img-fluid" src="<?= $_link . "?a=" . time() ?>" onerror="this.src='<?= URL ?>public/image/default.jpg';"  title="kategory 1"/>
                            </center>
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="label-cart">Produk</div>
                       
                        <h6 style="color:#733f98;"><?= $_name ?></h6>
                        <div class="row" >
                            <div class="col-sm-4" style="border:0px solid black;">
                                <div class="label-cart">Jumlah Barang</div>
                                <input number class="simplebox" style="width:100%;" type="text" id="qty" name="qty" value="<?= $qty ?>">
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
                        <textarea class="simplebox" placeholder="Keterangan" name="desc" id="desc" cols="" rows="4"><?= $_desc ?></textarea>
                    </div>
                </div>
            </div>
            <div style="border-bottom:1px dashed #d2d2d2;padding:15px 0px;">
                <div class="row" style="padding:0px 0px;">
                    <div class="col-6 label-cart">
                        Alamat
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-9">
                        <textarea class="simplebox"  readonly id="address" name="address" rows="6" cols="1000"><?php
                            if (count($_detail) > 0) {
                                echo $address;
                            } else {
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
                            }
                            ?>
                        </textarea>
                    </div>
                    <div class="col-sm-3">
                        <div class="label-cart" style="margin-bottom:20px;" >
                            <a class="btn btn-sinin" href="<?= URL ?>user/address">
                                Tambah Alamat Baru
                                <i class="fa fa-plus"></i>
                            </a>
                        </div>
                        <div class="label-cart" style="border:1px solid #d2d2d2; border-radius: 5px;display: inline-block;padding:5px 10px;">
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

                            <style>
                                .dp-add li:hover
                                {
                                    border-bottom: 1px dashed #d2d2d2;
                                    background: #fafafa;

                                }
                                .dp-add a:hover
                                {

                                }
                                .cart-address:hover
                                {

                                }
                            </style>
                            <div class="btn-group">
                                <a class="dropdown-toggle"  data-toggle="dropdown"> Pilih Alamat 

                                </a>

                                <?php
                                $overflow = '';
                                if (count($listdataaddress) > 3) {

                                    $overflow = 'overflow-y: scroll;height:200px;';
                                }
                                ?>

                                <ul class="dropdown-menu dp-add"  style="<?= $overflow ?> background: #fff !important;border:1px solid #d2d2d2 !important;padding:0px;width: 300px;margin-top:0px;">
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
                                        echo '<li>'
                                        . '<a class="cart-address" style="border:0px solid red;display:block;margin:0px;padding:5px 10px;" seq= "' . $v['_seq'] . '" href="">'
                                        . '<div>' . $no . '. ' . strtoupper($v['_name']) . '</div>'
                                        . $v['_alias']
                                        . '</a>'
                                        . '</li>';
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div style=";padding-top:15px;">
                <div class="row" style="">
                    <div class="col-sm-3 label-cart">
                        Kurir Pengiriman
                    </div>
                    <div class="col-sm-3 label-cart">
                        Paket Pengiriman
                    </div>


                    <div class="col-sm-2 label-cart">
                        PPN ( <?= $ppn ?> % )
                    </div>
                    <div class="col-sm-2 label-cart">
                        Ongkos Kirim
                    </div>
                    <div class="col-sm-2 label-cart">
                        Subtotal
                    </div>
                </div>

                <div class="row" style="">
                    <div class="col-sm-3">
                        <select class="simplebox" id="courier" name="courier">
                            <option value="">----------------</option>
                            <?php
                            foreach ($listcourier as $k => $v) {
                                $selected = $v['_code'] == $_courier ? 'selected' : '';
                                echo '<option ' . $selected . ' value="' . $v['_code'] . '">' . $v['_code'] . '</option>';
                                //echo '<option ' . $selected . ' value="'.$v['_code'].'">' . $v['_code'] . '</option';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group " >
                            <div class="inputGroupContainer">
                                <select class="simplebox" id="courier_package" name="courier_package">
                                    <option value="">----------------</option>
                                    <?php
                                    if (count($_detail) > 0) {
                                        $post['_code'] = $_courier;
                                        $curlcourier = glfn::_curl_api2('courier/detail', $post);
                                        $listcourierpackage = $curlcourier['sts'] ? $curlcourier['data'] : array();


                                        foreach ($listcourierpackage as $key => $v) {
                                            $selected = $v['_seq'] == $_courier_package ? 'selected' : '';
                                            echo '<option ' . $selected . ' value="' . $v['_seq'] . '" >' . $v['_name'] . '</option>';
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>


                    <div class="col-sm-6 label-cart">
                        <div id="price-courier" class="row">
                            <div class="col-sm-4">
                                PPN ( <?= $ppn ?> % )
                            </div>
                            <div class="col-sm-4">
                                Ongkos Kirim
                            </div>
                            <div class="col-sm-4">
                                Subtotal
                            </div>
                        </div>
                    </div>

                </div>




            </div>
            <input type="hidden" name="product" id="product" value="<?php echo $post['_product'] ?>"/>
            <input type="hidden" name="code_detail_transaction" id="code_detail_transaction" value="<?php echo $post['_code_detail_transaction'] ?>"/>
            <input type="hidden" name="flag" id="flag" value="upt"/>
            <button  type='submit' class="float-right btn btn-to-cart" href="#"><?php
                if (count($_detail) > 0) {
                    echo 'Update Keranjang';
                } else {
                    echo 'Tambahkan Kekeranjang';
                }
                ?></button>
        </form>

        <?php
    }

    function courier_package() {
        $post['_save'] = isset($_POST['courier_package']) ? $_POST['courier_package'] : '';
        $post['_code'] = isset($_POST['courier']) ? $_POST['courier'] : '';

        $curlcourier = glfn::_curl_api2('courier/detail', $post);
        $listcourierpackage = $curlcourier['sts'] ? $curlcourier['data'] : array();
        //glfn::_pre($listcourierpackage);

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



        $courier_price = 0;
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

        <div class="col-sm-4 label-cart">
            Rp. <?php echo glfn::_currency($totalwithppn); ?>
        </div>
        <div class="col-sm-4 label-cart">
            Rp. <?php echo glfn::_currency($total_courier); ?>
        </div>
        <div class="col-sm-4 label-cart">
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


        $post['_code_detail_transaction'] = isset($_POST['code_detail_transaction']) && $_POST['code_detail_transaction'] !== "" ? $_POST['code_detail_transaction'] : "";
        $post['_product'] = isset($_POST['product']) ? $_POST['product'] : '';
        $post['_qty'] = isset($_POST['qty']) ? $_POST['qty'] : '';
        $post['_desc'] = isset($_POST['desc']) ? $_POST['desc'] : '';
        $post['_courier'] = isset($_POST['courier']) ? $_POST['courier'] : '';
        $post['_courier_package'] = isset($_POST['courier_package']) ? $_POST['courier_package'] : '';
        $post['_address'] = isset($_POST['address']) ? $_POST['address'] : '';
        $post['_source'] = isset($_POST['source']) ? $_POST['source'] : '';


////
        $curl = glfn::_curl_api2('cart/add', $post);
        //glfn::_pre($curl);
        //glfn::_pre($post);
        ?>
        <div style="border-bottom:1px dashed #d2d2d2;padding-bottom:10px;">
            <h5 style="display: inline-block" class="modal-title" id="exampleModalLabel">Tambahkan Ke Keranjang</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div>
            <div style="border-bottom:0px dashed #d2d2d2;padding:15px 0px;">
                <div class="row" >
                    <div class="col-12">
                        <h4 style="color:#733f98;">
                            <?php
                            if ($post['_code_detail_transaction'] !== "") {
                                echo 'Barang Telah Diupdate';
                            } else {
                                echo 'Produk Telah Berhasil Ditambahkan';
                            }
                            ?>
                        </h4>
                    </div>
                </div>


            </div>
            <div class="row" >
                <div class="col-12">
                    <?php
                    if ($post['_code_detail_transaction'] !== "") {
                        ?>
                        <a  href="#" data-dismiss="modal"  role="button" class="deleteitem float-right btn btn-to-product">Tutup</a>
                        <?php
                    } else {
                        ?>
                        <a  href="<?= URL ?>cart" role="button" class="float-right btn btn-to-cart">Ke Keranjang</a>
                        <a style="margin-right: 15px" href="<?= URL ?>product" role="button" class="float-right btn btn-to-product">Liat Produk Lainnya</a>
                        <?php
                    }
                    ?>

                </div>
            </div>
        </div>
        <?php
    }

    function formdelete() {



        $post['_product'] = isset($_POST['product']) ? $_POST['product'] : '';
        $post['_code_detail_transaction'] = isset($_POST['code_detail_transaction']) ? $_POST['code_detail_transaction'] : '';
        $post['_user'] = isset($_COOKIE[COOKIE_USER]) ? $_COOKIE[COOKIE_USER] : '';
        $post['_password'] = isset($_COOKIE[COOKIE_PWD]) ? $_COOKIE[COOKIE_PWD] : '';

        $proddtl = glfn::_curl_api2('cart/singledata', $post);
        $cartlist = $proddtl['sts'] ? $proddtl['data'] : array();


        //glfn::_pre($post);
        $_code = '';
        $_tax = '';
        $_status = '';
        $_detail = array();
        foreach ($cartlist as $k => $v) {
            $_code = $v['_code'];
            $_tax = $v['_tax'];
            $_status = $v['_status'];
            $_detail = $v['_detail'];
        }


        $grandtotal = 0;
        foreach ($_detail as $k => $v) {

            $_transaction = $v['_transaction'];
            $_supplier = $v['_supplier'];
            $_address = $v['_address'];
            $_courier = $v['_courier'];
            $_courier_package = $v['_courier_package'];
            $_courier_price = $v['_courier_price'];
            $_no_delivery = $v['_no_delivery'];
            $_sts_delivery = $v['_sts_delivery'];
            $_name_supplier = $v['_name_supplier'];
            $_details = $v['_details'];

            $totalbarang = 0;
            $totalberatbarang = 0;
            $totalhargabarang = 0;
            foreach ($_details as $k2 => $v2) {


                if ($v2['_product'] == $post['_product']) {
                    $_code_detail_transaction = $v2['_code_detail_transaction'];
                    $_product = $v2['_product'];
                    $_price = $v2['_price'];
                    $_qty = $v2['_qty'];
                    $_weight = $v2['_weight'];
                    $_desc = $v2['_desc'];
                    $_name_product = $v2['_name_product'];
                    $hargabarang = $_qty * $_price;
                    $totalbarang += $_qty;
                    $totalberatbarang += $_weight * $_qty * 0.001;
                    $totalhargabarang += $hargabarang;
                }
            }
        }
        ?>
        <script type="text/javascript" src="<?= JS_PATH ?>main.js"></script>

        <div style="border-bottom:1px dashed #d2d2d2;padding-bottom:10px;">
            <h5 style="display: inline-block" class="modal-title" id="exampleModalLabel">Harpus Barang di Keranjang</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div>
            <div style="border-bottom:0px dashed #d2d2d2;padding:15px 0px;">
                <div class="row" >
                    <div class="col-12">
                        <div style="color:#6a6c6c;">
                            Menghapus Produk dari toko <span style="color:#733f98;font-weight: bold;"><?= $_name_supplier ?></span> untuk produk <span style="color:#733f98;font-weight: bold;"><?= $_name_product ?></span> senilai Rp <?= glfn::_currency($_price) ?> ?
                        </div>
                    </div>
                </div>


            </div>
            <div class="row" >
                <div class="col-12">
                    <a  href="#" role="button" data-dismiss="modal" class="float-right btn btn-to-cart ">Tidak</a>
                    <a style="margin-right: 15px" product="<?= $_product ?>" code_detail_transaction="<?= $_code_detail_transaction ?>" href="#"  role="button" class="deleteitem float-right btn btn-to-product">Ya</a>


                </div>
            </div>
        </div>




        <script type="text/javascript">
            $(document).ready(function () {
                $('.deleteitem').click(function () {
                    $.post('<?php echo URL; ?>cart/dodelete', {'product': '<?= $_product ?>', 'code_detail_transaction': '<?= $_code_detail_transaction ?>'}, function (a) {

                        $('#loadcontent').html(a);
                    });
                    $("#exampleModalCenter").modal();
                    $('#listcart').load('<?= URL ?>cart/listdata');
                    return false;
                });

            });
        </script>
        <?php
    }

    function dodelete() {
        $post['_user'] = isset($_COOKIE[COOKIE_USER]) ? $_COOKIE[COOKIE_USER] : '';
        $post['_password'] = isset($_COOKIE[COOKIE_PWD]) ? $_COOKIE[COOKIE_PWD] : '';


        $post['_code_detail_transaction'] = isset($_POST['code_detail_transaction']) ? $_POST['code_detail_transaction'] : '';
        $post['_product'] = isset($_POST['product']) ? $_POST['product'] : '';






        //glfn::_pre($post);
        $curl = glfn::_curl_api2('cart/remove_item', $post);

        //glfn::_pre($curl);
        ?>
        <div style="border-bottom:1px dashed #d2d2d2;padding-bottom:10px;">
            <h5 style="display: inline-block" class="modal-title" id="exampleModalLabel">Harpus Barang di Keranjang</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div>
            <div style="border-bottom:0px dashed #d2d2d2;padding:15px 0px;">
                <div class="row" >
                    <div class="col-12">
                        <h4 style="color:#733f98;">Produk Telah Berhasil Dihapus</h4>
                    </div>
                </div>


            </div>
            <div class="row" >
                <div class="col-12">
                    <a style="margin-right: 15px" product="<?= $_product ?>" code="<?= $_code ?>" href="#" data-dismiss="modal"  role="button" class="deleteitem float-right btn btn-to-product">Tutup</a>
                </div>
            </div>
        </div>
        <?php
    }

    function listdata() {


        $post['_user'] = isset($_COOKIE[COOKIE_USER]) ? $_COOKIE[COOKIE_USER] : '';
        $post['_password'] = isset($_COOKIE[COOKIE_PWD]) ? $_COOKIE[COOKIE_PWD] : '';


        $curl = $this->view->cartlist = glfn::_curl_api2('cart/listdata', $post);
        $cart = $this->view->cartlist = $curl ['sts'] ? $curl ['data'] : array();



        $this->view->render('cart/listdata', 2);
    }

}
