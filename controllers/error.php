<?php

class error_link extends controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        $this->view->css = glfn::_css();
        $this->view->js = glfn::_js(array());
        $this->view->render('error/index');
    }

}
