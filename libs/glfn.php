<?php

class glfn {


 public function db() {
        return new database(DB_TYPE,DB_HOST,DB_NAME,DB_PORT,DB_USER,DB_PASS);
    }

    /**
     * 
     * @param array $pre 
     */
    public static function _pre($pre) {
        echo '<pre>';
        print_r($pre);
        echo '</pre>';
    }

    /**
     * 
     * @param array $css file css at folder public
     */
    public function _css($css = array()) {
        $defaultcss = array(
            VENDOR_PATH . 'bootstrap-4.1/css/bootstrap.min.css?a='.time(),
            VENDOR_PATH . 'bootstrap-4.1/css/bootstrap-datepicker.min.css?a='.time(),
            VENDOR_PATH . 'fontawesome-free-5.1.0/css/all.css?a='.time(),
            VENDOR_PATH . 'rateyo-v2.3.2/jquery.rateyo.css?a='.time(),
            VENDOR_PATH . 'css/animate.css?a='.time(),
            CSS_PATH . 'main.css?a='.time(),
        );

        foreach ($css as $value) {
            $addarray = $value;
            array_push($defaultcss, $addarray);
        }
        return $defaultcss;
    }

    public function _js($js = array()) {
        $defaultjs = array(
            VENDOR_PATH . 'jquery.js?a='.time(),
            VENDOR_PATH . 'accounting.js?a='.time(),
            VENDOR_PATH . 'popper.js?a='.time(),
            
            VENDOR_PATH . 'bootstrap-4.1/js/bootstrap.min.js?a='.time(),
            VENDOR_PATH . 'bootstrap-4.1/js/bootstrap-datepicker.min.js?a='.time(),
            VENDOR_PATH . 'bootstrap-4.1/js/validate.js?a='.time(),
            VENDOR_PATH . 'rateyo-v2.3.2/jquery.rateyo.js?a='.time(),
            VENDOR_PATH . 'jquery.cookie.js?a='.time(),
            URL . 'phploadjs?a'.time(),
            JS_PATH . 'main.js?a='.time(),
            
        );

        foreach ($js as $value) {
            $addarray = $value;
            array_push($defaultjs, $addarray);
        }

        return $defaultjs;
    }

    public static function _cart_count() {

        $post['_user'] = isset($_COOKIE[COOKIE_USER]) ? $_COOKIE[COOKIE_USER] : '';
        $post['_password'] = isset($_COOKIE[COOKIE_PWD]) ? $_COOKIE[COOKIE_PWD] : '';
        $url = self::_curl_api2('cart/cart_count', $post);
        $data = $url ['sts'] ? $url ['data'] : array();

        return $data;
    }

    public static function _form_list_product() {
        ?>
        <script type="text/javascript">
            $(document).ready(function () {



                $('body').on('keyup ', '#srch-product', function () {
                    if ($("#produk").length == 0)
                    {
                        $("#tmp-filter").after('<input type="hidden" data-code="' + $(this).val() + '" id="produk" name="produk" value="' + $(this).val() + '"/>');
                    } else
                    {
                        $('#produk').val($(this).val());

                    }

                    $.post('<?php echo URL; ?>searchproduct', {'_srch': $(this).val()}, function (a) {
                        //alert($(this).val());
                        $('#rslt-product').html(a);
                    });
                    $('#rslt-product').css({'display': 'block'});
                });
                $('body').click(function () {
                    $('#rslt-product').css({'display': 'none'});
                });

                $('body').on('click ', '.srch-filter', function () {

                    var _id = $(this).attr('data-filter');
                    var _category = $(this).attr('data-category');
                    var _code = $(this).attr('data-code');
                    var _name = $(this).text();

                    if (_id == 'supplier')
                    {
                        if ($("#" + _id).length == 0) {
                            $("#tmp-filter").after('<input data-code="" type="hidden" id="' + _id + '" name="' + _id + '" value="' + _name + '"/>');
                            $("#tmp-filter").after('<input type="hidden" id="' + _category + '" name="' + _category + '" value="' + _code + '"/>');
                        } else {
                            $('#' + _id).val(_name);
                            $('#' + _category).val(_code);
                        }
                        $('#produk').remove();
                    } else {
                        $('#srch-product').val(_name);
                        if ($("#" + _id).length == 0) {
                            $("#tmp-filter").after('<input type="hidden" id="' + _id + '" name="' + _id + '" value="' + _name + '"/>');
                        } else {
                            $('#' + _id).val(_name);
                        }
                    }
                    $('#frmsearch').submit();
                });
                $('body').on('click ', '.srchcst-filter', function () {
                    var _id = $(this).attr('data-filter');
                    var _category = $(this).attr('data-category');
                    var _code = $(this).attr('data-code');
                    var _name = $(this).text();

                    if ($("#" + _id).length == 0) {
                        $("#tmp-filter").after('<input type="hidden" id="' + _id + '" name="' + _id + '" value="' + _name + '"/>');
                        $("#tmp-filter").after('<input type="hidden" id="' + _category + '" name="' + _category + '" value="' + _code + '"/>');
                    } else {
                        $('#' + _id).val(_name);
                        $('#' + _category).val(_code);
                    }

                    $('#frmsearch').submit();
                });


                $('body').on('click ', '.filter-rate', function () {
                    var $rateYo = $(this).rateYo();
                    var rating = $rateYo.rateYo("rating");
                    if ($("#rate").length == 0) {
                        $("#tmp-filter").after('<input type="hidden" id="rate" name="rate" value="' + rating + '"/>');
                    } else {
                        $('#rate').val(rating);

                    }
                    $('#frmsearch').submit();
                });

                $('body').on('blur', '.harga', function () {
                    var tmpid = $(this).attr('id');
                    var id = tmpid == "tmpminprice" ? 'minprice' : 'maxprice';
                    if ($("#" + id).length == 0) {
                        $("#tmp-filter").after('<input type="hidden" id="' + id + '" name="' + id + '" value="' + $('#' + tmpid).val() + '"/>');
                    } else {
                        $('#' + id).val($('#' + tmpid).val());

                    }

                    $('#frmsearch').submit();
                });
                $('body').on('change', '#filter-lokasi', function () {
                    //alert($(this).val());
                    if ($(this).val() != "")
                    {
                        if ($("#lokasi").length == 0) {
                            $("#tmp-filter").after('<input type="hidden" id="lokasi" name="lokasi" value="' + $(this).val() + '"/>');
                        } else {
                            $('#lokasi').val($(this).val());

                        }
                    }

                    $('#frmsearch').submit();
                });

                $('body').on('click ', '.srch-btn', function () {
                    $('#frmsearch').submit();
                });
            });
        </script>
        <style>
            .list-group-item
            {
                border:none;
            }



        </style>

        <?php
        $srchproduct = isset($_GET['srch']) ? '' . $_GET['srch'] . '' : '';
        $orderbycode = isset($_GET['orderby']) && $_GET['orderby'] != '' ? $_GET['orderby'] : '0';
        $category = isset($_GET['category']) ? $_GET['category'] : '';
        $supplier = isset($_GET['supplier']) ? $_GET['supplier'] : '';
        $page = $post['page'] = isset($_GET['page']) && $_GET['page'] != "" ? $_GET['page'] : 1;
        ?>


        <form id="frmsearch" action= "<?= URL ?>product" method="get">
            <div id="tmp-filter"></div>
            <?php
            $filtering = $_GET;
            unset($filtering['url']);
            unset($filtering['srch-product']);
            foreach ($filtering as $k => $v) {
                echo '<input type="hidden" id="' . $k . '" name="' . $k . '" value="' . $v . '"/>';
            }
            ?>

            <div class="srch-group " style="border:0px solid black; position:relative;">
                <div  style="position: absolute;border:0px solid red;height: 30px;top:50%;margin-top:-20px;  ">

                    <div class="input-group ">
                        <input class="form-control simplebox srch-text"  placeholder="Cari Produk" autocomplete="off" id="srch-product" name="srch-product" type="text" name="name" id="name" placeholder="Nama"/>
                        <span class="srch-btn input-group-addon"><i style="width:30px;" class=" glyphicon glyphicon-search"></i></span>
                    </div>
                </div>
                <div id="rslt-product" class="list-group " style="display: none;z-index: 9999;background:#fff;border-radius: 0px;position:absolute;border:1px solid #eee;margin-top:53px;line-height: 10px;width: 100%;">

                </div>
            </div>
            <!--
            <div class="srch-group " style="border:0px solid black; ">
                <div id="rslt-product" class="list-group" style="display: none;z-index: 9999;background:#fff;border-radius: 0px;position:absolute;border:1px solid #eee;margin-top:61px;line-height: 10px;width: 100%;">
                    <div style="font-size:16px;line-height: 35px;font-weight: bold;padding-left: 10px;">Product</div>
                    <a href="#" data-filter="produk" data-category ="produkcode" data-code ="0001" id="asd61" class="list-group-item srch-filter">First item</a>
                    <a href="#" data-filter="produk" data-category ="produkcode" data-code ="0002" id="asd23" class="list-group-item srch-filter">Second item</a>
                    <a href="#" data-filter="produk" data-category ="produkcode" data-code ="0003" id="asd44" class="list-group-item srch-filter">Third item</a>
                    <div style="font-size:16px;line-height: 35px;font-weight: bold;padding-left: 10px;">Supplier</div>
                    <a href="#" data-filter="supplier" data-category ="suppliercode" data-code ="0001" id="asd261" class="list-group-item ">First item</a>
                    <a href="#" data-filter="supplier" data-category ="suppliercode" data-code ="0002" id="asd323" class="list-group-item srch-filter">Second item</a>
                    <a href="#" data-filter="supplier" data-category ="suppliercode" data-code ="0003" id="asd444" class="list-group-item srch-filter">Third item</a>
                </div>
                <input type="text"  autocomplete="off" id="srch-product" name="srch-product" class="srch-text" placeholder="Cari Produk" name="srch" id ="srch">

                <button type="submit"class="btn srch-btn">
                    <i class="fa fa-search"></i>
                </button>

            </div>
            -->
        </form>
        <?php
    }

    public static function _curl_api2($link, $post) {
        try {

            $finallink = URLAPI . $link;
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $finallink);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-Requested-With: XMLHttpRequest'));
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);
            //echo $response;
            curl_close($ch);
            $return = json_decode($response, true);
        } catch (Exception $err) {
            $return['_sts'] = '0';
            $return['_msg'] = $err;
            $return['_token'] = $err;
        }
        return $return;
    }

    public static function _redirect($url = null) {
        header('location:' . URL . $url);
        exit();
    }

    public static function _print_pre($array) {
        echo '<pre>';
        print_r($array);
        echo '</pre>';
    }

    public static function checklogin() {
        if (!isset($_COOKIE[COOKIE_SIGNIN])) {
            $this->_redirect();
        }
        if (!$_COOKIE[COOKIE_SIGNIN]) {
            $this->_redirect();
        }
    }

    public static function _datacustomer() {

        $post['_user'] = isset($_COOKIE[COOKIE_USER]) ? $_COOKIE[COOKIE_USER] : '';
        $post['_password'] = isset($_COOKIE[COOKIE_PWD]) ? $_COOKIE[COOKIE_PWD] : '';
        $curl = self::_curl_api2('user/detail', $post);
        $datacustomer = isset($curl['data']) && count($curl['data']) > 0 ? $curl['data'] : array();
        return $datacustomer;
    }
	
	
    public static function _datatoko() {

        $post['_user'] = isset($_COOKIE[COOKIE_USER]) ? $_COOKIE[COOKIE_USER] : '';
        $post['_password'] = isset($_COOKIE[COOKIE_PWD]) ? $_COOKIE[COOKIE_PWD] : '';
   
        $return = self::db()->_select('select * from ms_supplier where _email = :email',array('email' => $post['_user']));
        return $return;
    }

    
    public static function _listcategory() {

        $post['_user'] = isset($_COOKIE[COOKIE_USER]) ? $_COOKIE[COOKIE_USER] : '';
        $post['_password'] = isset($_COOKIE[COOKIE_PWD]) ? $_COOKIE[COOKIE_PWD] : '';
        $curl = self::_curl_api2('category/listdata', $post);
        $listcategory = isset($curl['data']) && count($curl['data']) > 0 ? $curl['data'] : array();
        return $listcategory;
    }
    

    public static function _userleftmenu() {
        ?>
        <div class="col-md-3">
            <ul id="Menu" class="left-menu">
                <li> <a href="<?php echo URL . 'user' ?>" class="avatar">
                        <img style="width:50px; height:50px;" class="imgprofile img-35 img-200-circle" src="https://ecs12.tokopedia.net/newimg/cache/100-square/default_v3-usrnophoto1.png" alt="Erik Kurniawan"/>
                        <span>Profile</span>
                    </a>
                </li>
                <li><a href="<?php echo URL . 'purchase' ?>">Pembelian</a></li>
                <li><a href="<?php echo URL . 'wishlist' ?>">Wishlist</a></li>
            </ul>
        </div>
        <?php
    }

    public static function _currency($var) {
        if ($var == 0) {
            $return = '0.00';
        } else {
            $expvar = explode('.', $var);
            $return = is_array($expvar) && count($expvar) > 1 ? number_format($expvar[0]) . '.' . substr($expvar[1], 0, 2) : number_format($var) . '.00';
        }

        return $return;
    }

    public static function _checklogin() {
        if (!isset($_COOKIE[COOKIE_USER]) || !isset($_COOKIE[COOKIE_PWD])) {
            self::_redirect();
        }
    }

    /**
     * 
     * @param string $token keytoken 
     * @param string $jwt datajwt
     * @param string $flag flag for open key
     */
    public static function _curl_api($token, $jwt, $flag = '') {
        $checkflag = $flag != '' ? '/' . $flag : '';
        $url = URLNIKO . 'api/process/' . $token . '/' . $jwt . $checkflag;
//echo $url;
        $url = str_replace(' ', '%20', $url);
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_FAILONERROR, true);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);

        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 0);
        curl_setopt($curl, CURLOPT_TIMEOUT_MS, 60000);
        $result = curl_exec($curl);
//echo $result;
        $rr = json_decode($result, TRUE);
        if (curl_error($curl)) {
            $rr = array();
            $rr['sts'] = '0';
            $rr['msg'] = curl_error($curl);
        }
        return $rr;
    }

    public static function _checkbool($var) {

        $search = isset($filter['srchproduct']) ? $filter['srchproduct'] : '';
        $category = isset($filter['category']) ? $filter['category'] : '';
        $orderby = isset($filter['orderby']) ? $filter['orderby'] : '';
        $loadproduct = isset($filter['loadproduct']) ? $filter['loadproduct'] : 9;
        $page = isset($filter['loadproduct']) ? $filter['loadproduct'] : 1;

        foreach ($array_product as $key => $value) {
            
        }
        return $a;
    }

    public static function _array_to_xml($array, &$xml_user_info) {
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                if (!is_numeric($key)) {
                    $subnode = $xml_user_info->addChild("$key");
                    array_to_xml($value, $subnode);
                } else {
                    $subnode = $xml_user_info->addChild("item$key");
                    array_to_xml($value, $subnode);
                }
            } else {
                $xml_user_info->addChild("$key", htmlspecialchars("$value"));
            }
        }
    }

    public static function _xml_http_request($url) {
        if (!isset($_SERVER['HTTP_X_REQUESTED_WITH']) || ($_SERVER['HTTP_X_REQUESTED_WITH']) != 'XMLHttpRequest') {
            self::_redirect($url);
        }
    }

}
