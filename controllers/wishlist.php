<?php

class wishlist extends controller {

    function __construct() {
        glfn::_checklogin();
        parent::__construct();
    }

    function index($msgcode = '') {

        $this->view->css = glfn::_css();
        $this->view->js = glfn::_js(array());

        $post['_user'] = isset($_COOKIE[COOKIE_USER]) ? $_COOKIE[COOKIE_USER] : '';
        $post['_password'] = isset($_COOKIE[COOKIE_PWD]) ? $_COOKIE[COOKIE_PWD] : '';
        $curl = glfn::_curl_api2('wishlist/listdata', $post);
        $wishlist = $this->view->wishlist = isset($curl['data']) && count($curl['data']) > 0 ? $curl['data'] : array();

        $this->view->render('wishlist/index');
    }

    function add_wh_pd() {
        $post['_user'] = isset($_COOKIE[COOKIE_USER]) ? $_COOKIE[COOKIE_USER] : '';
        $post['_password'] = isset($_COOKIE[COOKIE_PWD]) ? $_COOKIE[COOKIE_PWD] : '';
        $post['_product'] = isset($_POST['product']) ? $_POST['product'] : '';
        $curlcategory = glfn::_curl_api2('wishlist/add', $post);
        glfn::_pre($curlcategory);
    }

    function delete_wh_pd() {
        $post['_user'] = isset($_COOKIE[COOKIE_USER]) ? $_COOKIE[COOKIE_USER] : '';
        $post['_password'] = isset($_COOKIE[COOKIE_PWD]) ? $_COOKIE[COOKIE_PWD] : '';
        $post['_product'] = isset($_POST['product']) ? $_POST['product'] : '';
        $curlcategory = $this->view->category = glfn::_curl_api2('wishlist/remove', $post);
        //glfn::_pre($curlcategory);
    }

    function deletewishlist($code = '') {
        $post['_user'] = isset($_COOKIE[COOKIE_USER]) ? $_COOKIE[COOKIE_USER] : '';
        $post['_password'] = isset($_COOKIE[COOKIE_PWD]) ? $_COOKIE[COOKIE_PWD] : '';
        $post['_product'] = $code;

        $update = glfn::_curl_api2('wishlist/remove', $post);
        ////glfn::_pre($post);
        //glfn::_pre($update);
        setcookie(COOKIE_MSG_INFO, json_encode($update), time() + 9999999999, '/');
        glfn::_redirect('wishlist/index/1');
    }

    function listdata() {


        $this->view->css = glfn::_css();
        $this->view->js = glfn::_js(array());

        $post['_user'] = isset($_COOKIE[COOKIE_USER]) ? $_COOKIE[COOKIE_USER] : '';
        $post['_password'] = isset($_COOKIE[COOKIE_PWD]) ? $_COOKIE[COOKIE_PWD] : '';
        $curl = glfn::_curl_api2('wishlist/listdata', $post);
        $wishlist = $this->view->wishlist = isset($curl['data']) && count($curl['data']) > 0 ? $curl['data'] : array();
        
        
        $this->view->render('wishlist/listdata',2);
    }

}
