<?php

class product extends controller {

    function __construct() {
        parent::__construct();
    }

    function index() {

        $this->view->css = glfn::_css();
        $this->view->js = glfn::_js();



        $arrorderby = array(
            array('srch' => 'Penjualan', 'orderby' => 'a._name asc'),
            array('srch' => 'Rating', 'orderby' => 'a._name desc'),
            array('srch' => 'Termahal', 'orderby' => 'a._price desc'),
            array('srch' => 'Termurah', 'orderby' => 'a._price asc')
        );
        $filter = $this->view->filter = array('produk' => 0, 'kategori' => 1, 'order' => 1, 'rate' => 0, 'minprice' => 0, 'maxprice' => 0, 'lokasi' => 0, 'supplier' => 1);


        $fieldname = '_code asc';




        $post['_category'] = isset($_GET['kategoricode']) ? $_GET['kategoricode'] : '';
        $post['_produk_name'] = isset($_GET['produk']) ? $_GET['produk'] : '';
        $post['_rate'] = isset($_GET['rate']) ? $_GET['rate'] : '';
        $post['_minprice'] = isset($_GET['minprice']) ? $_GET['minprice'] : '';
        $post['_maxprice'] = isset($_GET['maxprice']) ? $_GET['maxprice'] : '';
        $post['_lokasi'] = isset($_GET['lokasi']) ? $_GET['lokasi'] : '';

        $post['_user'] = isset($_COOKIE[COOKIE_USER]) ? $_COOKIE[COOKIE_USER] : '';
        $post['_password'] = isset($_COOKIE[COOKIE_PWD]) ? $_COOKIE[COOKIE_PWD] : '';

        $page = $post['page'] = isset($_GET['page']) && $_GET['page'] != "" ? $_GET['page'] : 1;
        $loadproduct = isset($_GET['loadproduct']) ? $_GET['loadproduct'] : 15;
        $limitstart = $page == 1 ? 0 : (($page - 1) * $loadproduct);
        $limitend = $loadproduct;



        $arrpost = array();
        foreach ($filter as $k => $v) {
            $postdata = $v ? $k . 'code' : $k;
            $valuepost = isset($_GET[$postdata]) ? $_GET[$postdata] : '';
            $arrpost[$postdata] = $valuepost;
        }


        $post['_limitstart'] = $limitstart;
        $post['_limitend'] = $limitend;



        $post['_user'] = isset($_COOKIE[COOKIE_USER]) ? $_COOKIE[COOKIE_USER] : '';
        $post['_password'] = isset($_COOKIE[COOKIE_PWD]) ? $_COOKIE[COOKIE_PWD] : '';
        $post['_customer'] = isset($_COOKIE[COOKIE_USER]) ? $_COOKIE[COOKIE_USER] : '';

        //glfn::_pre($post);



        $this->view->orderby = $arrorderby;

        $prod = glfn::_curl_api2('product/listdatafilter', $post);


        $listproduct = $this->view->listproduct = isset($prod['data']) && count($prod['data']) > 0 ? $prod['data'] : array();

        //glfn::_pre($prod);

        $curl = $this->view->category = glfn::_curl_api2('category/listdata', $post);
        $this->view->category = $curl['sts'] ? $curl['data'] : array();


        $curl = glfn::_curl_api2('zipcode/listprovince', $post);
        $this->view->listprovince = isset($curl['data']) && count($curl['data']) > 0 ? $curl['data'] : array();


        $totalpage = 1;
        if (count($prod) > 0) {
            $totalprod = $prod['totalproduct'];
            $totalpage = ($totalprod % $loadproduct) == 0 ? $totalprod / $loadproduct : ((int) ($totalprod / $loadproduct)) + 1;
        }


        $this->view->totalpage = $totalpage;
        $this->view->page = $page;

        $this->view->prodcon = array(
            'page' => $page,
            'loadproduct' => $loadproduct,
            'limitstart' => $limitstart,
            'limitend' => $limitend);


        $this->view->listpord = "";
        $this->view->render('product/index');
    }

    function detail($code = 0) {
        $this->view->css = glfn::_css();
        $this->view->js = glfn::_js();


        if (!$code) {
            glfn::_redirect('error');
            exit();
        }

        $post['_user'] = isset($_COOKIE[COOKIE_USER]) ? $_COOKIE[COOKIE_USER] : '';
        $post['_password'] = isset($_COOKIE[COOKIE_PWD]) ? $_COOKIE[COOKIE_PWD] : '';
        $post['_code'] = $code;
        $curl = glfn::_curl_api2('product/detail', $post);
        $product = $this->view->proddtl = $curl['sts'] ? $curl['data'] : array();





        $_supplier = count($product) > 0 ? $product[0]['_supplier'] : 'asjbahsbda';
        $supplier = glfn::_curl_api2('supplier/detail', array('_code' => $_supplier));
        $supplier = $this->view->supplier = isset($supplier['data']) && count($supplier['data']) > 0 ? $supplier['data'] : array();


        $prouctrate = glfn::_curl_api2('product/productrate', array('_product' => $code));

        $prouctrate = $this->view->prodrate = isset($prouctrate['data']) && count($prouctrate['data']) > 0 ? $prouctrate['data'] : array();



        $supplierulasan = glfn::_curl_api2('product/ulasan', array('_supplier' => $_supplier));
        $supplierulasan = $this->view->supplierulasan = isset($supplierulasan['data']) && count($supplierulasan['data']) > 0 ? $supplierulasan['data'] : array();






        $page = $post['page'] = isset($_POST['page']) && $_POST['page'] != "" ? $_POST['page'] : 1;
        $loadproduct = isset($_POST['loadproduct']) ? $_POST['loadproduct'] : 2;
        $limitstart = $page == 1 ? 0 : (($page - 1) * $loadproduct);
        $limitend = $loadproduct;

        $product_Ulasan['_product'] = $code;
        //$product_Ulasan['_limitstart'] = $limitstart;
        //$product_Ulasan['_limitend'] = $limitend;


        

        $prod = glfn::_curl_api2('product/ulasan', $product_Ulasan);
        //glfn::_pre($prod);
        $product_ulasan = $this->view->ulasan_product = isset($prod['data']) && count($prod['data']) > 0 ? $prod['data'] : array();



        $totalpage = 1;
        if (count($prod) > 0) {
            $totalprod = $prod['total'];
            $totalpage = ($totalprod % $loadproduct) == 0 ? $totalprod / $loadproduct : ((int) ($totalprod / $loadproduct)) + 1;
        }

        $this->view->totalpage = $totalpage;
        $this->view->page = $page;



        $this->view->ulasan = array();
        if (!$curl['sts']) {
            glfn::_redirect('product');
            exit();
        }

        //echo enhash::_hash_password('1');
        $this->view->render('product/detail');
    }

    function loadproduct_ulasan() {






        $this->view->render('product/loadproduct_ulasan', 2);
    }

}
