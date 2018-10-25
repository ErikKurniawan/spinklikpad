<?php

class supplier extends controller {

    function __construct() {
        parent::__construct();
    }

    function index() {

        $_code = $_GET['a'];

        $this->view->css = glfn::_css();
        $this->view->js = glfn::_js();



        $supplier = glfn::_curl_api2('supplier/detail', array('_code' => $_code));
        $supplier = $this->view->supplier = isset($supplier['data']) && count($supplier['data']) > 0 ? $supplier['data'] : array();



        $prm = array('_supplier' => $_code, '_customer' => $_COOKIE[COOKIE_USER]);

        $prodpopuler = $this->view->prodpopuler = glfn::_curl_api2('product/productpopuler', $prm);
        $prodpopuler = $this->view->prodpopuler = isset($prodpopuler['data']) && count($prodpopuler['data']) > 0 ? $prodpopuler['data'] : array();



        $supplierulasan = glfn::_curl_api2('product/ulasan', array('_supplier' => $_code));
        $supplierulasan = $this->view->supplierulasan = isset($supplierulasan['data']) && count($supplierulasan['data']) > 0 ? $supplierulasan['data'] : array();




        $catforproduct = glfn::_curl_api2('category/catforproduct', array('_supplier' => $_code));

        $catforproduct = $this->view->catforproduct = isset($catforproduct['data']) && count($catforproduct['data']) > 0 ? $catforproduct['data'] : array();




        $this->view->render('supplier/index');
    }

    function discus() {
        $this->view->css = glfn::_css();
        $this->view->js = glfn::_js();
        $this->view->render('supplier/discus');
    }

    function review() {

        $_code = $_GET['a'];

        $this->view->css = glfn::_css();
        $this->view->js = glfn::_js();



        $supplier = glfn::_curl_api2('supplier/detail', array('_code' => $_code));
        $supplier = $this->view->supplier = isset($supplier['data']) && count($supplier['data']) > 0 ? $supplier['data'] : array();




        $page = $post['page'] = isset($_POST['page']) && $_POST['page'] != "" ? $_POST['page'] : 1;
        $loadproduct = isset($_POST['loadproduct']) ? $_POST['loadproduct'] : 5;
        $limitstart = $page == 1 ? 0 : (($page - 1) * $loadproduct);
        $limitend = $loadproduct;






        $post['_supplier'] = $_code;
        //$post['_limitstart'] = $limitstart;
        //$post['_limitend'] = $limitend;


        $prod = glfn::_curl_api2('product/ulasan', $post);
        $listproduct = $this->view->listproduct = isset($prod['data']) && count($prod['data']) > 0 ? $prod['data'] : array();


        /*
          $totalpage = 1;
          if (count($prod) > 0) {
          $totalprod = $prod['totalproduct'];
          $totalpage = ($totalprod % $loadproduct) == 0 ? $totalprod / $loadproduct : ((int) ($totalprod / $loadproduct)) + 1;
          }


          $this->view->totalpage = $totalpage;
          $this->view->page = $page;
         */


        $this->view->css = glfn::_css();
        $this->view->js = glfn::_js();
        $this->view->render('supplier/review');
    }

    function loadproduct() {



        $page = $post['page'] = isset($_POST['page']) && $_POST['page'] != "" ? $_POST['page'] : 1;
        $loadproduct = isset($_POST['loadproduct']) ? $_POST['loadproduct'] : 15;
        $limitstart = $page == 1 ? 0 : (($page - 1) * $loadproduct);
        $limitend = $loadproduct;



        $post['_category'] = isset($_POST['kategoricode']) ? $_POST['kategoricode'] : '';
        $post['_produk_name'] = isset($_POST['produk']) ? $_POST['produk'] : '';
        $post['_orderby'] = isset($_POST['orderby']) ? $_POST['orderby'] : '';
        $post['_supplier'] = isset($_POST['supplier']) ? $_POST['supplier'] : '';
        $post['_limitstart'] = $limitstart;
        $post['_limitend'] = $limitend;


        $post['_customer'] = $_COOKIE[COOKIE_USER];



        $prod = glfn::_curl_api2('product/listdatafilter', $post);
        $listproduct = $this->view->listproduct = isset($prod['data']) && count($prod['data']) > 0 ? $prod['data'] : array();

        $totalpage = 1;
        if (count($prod) > 0) {
            $totalprod = $prod['totalproduct'];
            $totalpage = ($totalprod % $loadproduct) == 0 ? $totalprod / $loadproduct : ((int) ($totalprod / $loadproduct)) + 1;
        }


        $this->view->totalpage = $totalpage;
        $this->view->page = $page;



        $this->view->render('supplier/loadproduct', 2);
    }

}
