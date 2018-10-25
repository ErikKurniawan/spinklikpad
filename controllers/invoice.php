<?php

class invoice extends controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        $this->view->css = glfn::_css();
        $this->view->js = glfn::_js();

        $post['_user'] = isset($_COOKIE[COOKIE_USER]) ? $_COOKIE[COOKIE_USER] : '';
        $post['_invoice'] = isset($_GET['a']) ? $_GET['a'] : "";

        


        $curl = glfn::_curl_api2('invoice', $post);

        if ($curl ['sts']) {
            $invoice = $this->view->invoice = $curl ['data'];
        } else {
            glfn::_redirect('error');
        }



        $this->view->render('invoice/index', 1);
    }

}
