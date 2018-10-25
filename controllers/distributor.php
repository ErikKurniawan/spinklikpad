<?php

class distributor extends controller {


    function __construct() {
        $this->db = new database(DB_TYPE,DB_HOST,DB_NAME,DB_PORT,DB_USER,DB_PASS);
        parent::__construct();
    }

    function index() {
        glfn::_checklogin();
        $this->view->css = glfn::_css();
        $this->view->js = glfn::_js();

        $data_product = $this->db->_select('SELECT * FROM ms_product WHERE _level = :level',array('level' => '0'));
        //glfn::_pre($count_supplier);
        $this->view->product = $data_product;
        $this->view->render('distributor/index');
    }
}