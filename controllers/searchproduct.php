<?php

class searchproduct extends controller {

    function __construct() {
        parent::__construct();
    }

    function index() {

        $post['_user'] = isset($_COOKIE[COOKIE_USER]) ? $_COOKIE[COOKIE_USER] : '';
        $post['_password'] = isset($_COOKIE[COOKIE_PWD]) ? $_COOKIE[COOKIE_PWD] : '';
        $post['_srch'] = isset($_POST['_srch']) ? $_POST['_srch'] : '';

        
        $curlcategory = $this->view->cartlist = glfn::_curl_api2('filter/product_supplier', $post);
        $data = $curlcategory ['sts'] ? $curlcategory ['data'] : array();

          
        foreach ($data as $k => $v) {
        
        }
        $flagcat = 0;
        $flagprod = 0;
        foreach ($data as $k => $v) {
            if ($v['_category'] == "Produk") {
                if ($flagprod == 0) {
                    echo '<div style = "font-size:16px;line-height: 35px;font-weight: bold;padding-left: 10px;">' . $v['_category'] . '</div>';
                }
                $flagprod++;
            }
            if ($v['_category'] == "Supplier") {
                if ($flagcat == 0) {
                    echo '<div style = "font-size:16px;line-height: 35px;font-weight: bold;padding-left: 10px;">' . $v['_category'] . '</div>';
                }
                $flagcat++;
            }
            echo '<a class="srch-item  srch-filter" href="#" data-filter="' . strtolower($v['_category']) . '" data-category ="' . strtolower($v['_category']) . 'code" data-code ="' . $v['_code'] . '" id="' . strtolower($v['_category']) . $v['_code'] . '" >'.$v['_name'].'</a>';
        }
        ?>


        <?php

    }

}
