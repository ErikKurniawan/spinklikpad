<?php

class profile extends controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        $this->view->css = glfn::_css();
        $this->view->js = glfn::_js();
        $this->view->render('profile/index');
    }
    
    function edit() {
        $this->view->css = glfn::_css();
        $this->view->js = glfn::_js(array(VENDOR_PATH.'scrollPosStyler.min.js'));
        $this->view->render('profile/edit');
    }
    
    
    function doedit() {
        $this->view->css = glfn::_css();
        $this->view->js = glfn::_js();
        $this->view->render('profile/edit');
    }
}