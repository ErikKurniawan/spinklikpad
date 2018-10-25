<?php

class purchase extends controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        $this->view->css = glfn::_css();
        $this->view->js = glfn::_js();

        $post['_user'] = isset($_COOKIE[COOKIE_USER]) ? $_COOKIE[COOKIE_USER] : '';
        $post['_password'] = isset($_COOKIE[COOKIE_PWD]) ? $_COOKIE[COOKIE_PWD] : '';

        $curl = glfn::_curl_api2('purchase', $post);
        $purchase = $this->view->purchase = $curl ['sts'] ? $curl ['data'] : array();
        $this->view->render('purchase/index');
    }

    function status() {
        $this->view->css = glfn::_css();
        $this->view->js = glfn::_js();


        $post['_user'] = isset($_COOKIE[COOKIE_USER]) ? $_COOKIE[COOKIE_USER] : '';
        $post['_password'] = isset($_COOKIE[COOKIE_PWD]) ? $_COOKIE[COOKIE_PWD] : '';

        $curl = glfn::_curl_api2('purchase/status', $post);
        $purchasestatus = $this->view->purchasestatus = $curl ['sts'] ? $curl ['data'] : array();


        $this->view->render('purchase/status');
    }

    function history() {
        $this->view->css = glfn::_css();
        $this->view->js = glfn::_js();

        $post['_user'] = isset($_COOKIE[COOKIE_USER]) ? $_COOKIE[COOKIE_USER] : '';
        $post['_password'] = isset($_COOKIE[COOKIE_PWD]) ? $_COOKIE[COOKIE_PWD] : '';

        $curl = glfn::_curl_api2('purchase/history', $post);
        $purchase_history = $this->view->purchasehistory = $curl ['sts'] ? $curl ['data'] : array();



        $this->view->render('purchase/history');
    }

}

?>
