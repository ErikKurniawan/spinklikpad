<?php

class phploadjs extends controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        $this->view->css = glfn::_css();
        $this->view->js = glfn::_js();
        $this->view->render('phploadjs/index',2);
    }
}