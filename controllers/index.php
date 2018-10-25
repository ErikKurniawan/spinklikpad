<?php

class index extends controller {

    function __construct() {
        parent::__construct();
    }


    function index() {
 
        
        $this->view->css = glfn::_css();
        $this->view->js = glfn::_js();

        
        

        //$post['_category'] = '';
        $post['_orderby'] = 'total_product desc';
        $post['_limitstart'] = 0;
        $post['_limitend'] = 12;
        
        $post['_user'] = isset($_COOKIE[COOKIE_USER]) ? $_COOKIE[COOKIE_USER] : '';
        $post['_password'] = isset($_COOKIE[COOKIE_PWD]) ? $_COOKIE[COOKIE_PWD] : '';
        $post['_customer'] = isset($_COOKIE[COOKIE_USER]) ? $_COOKIE[COOKIE_USER] : '';

        $prod = glfn::_curl_api2('product/listdatafilter', $post);
        $this->view->trendproduct = isset($prod['data']) && count($prod['data']) > 0 ? $prod['data'] : array();
        
        
        $post['_category'] = '00013';
        $post['_orderby'] = '';
        $prod = glfn::_curl_api2('product/listdatafilter', $post);
        $as =$this->view->komputerproduct = isset($prod['data']) && count($prod['data']) > 0 ? $prod['data'] : array();
        //glfn::_pre($as);
        
        $prod = glfn::_curl_api2('category/listdatadetail', $post);
        $this->view->listcategory= isset($prod['data']) && count($prod['data']) > 0 ? $prod['data'] : array();
        
        
        $this->view->render('index/index');
    }

    
    function promotion() {
        $this->view->css = glfn::_css();
        $this->view->js = glfn::_js();


        
        $this->view->render('index/promotion');
    }
}
