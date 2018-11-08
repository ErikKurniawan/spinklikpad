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

        $data_supplier = $this->db->_select('select * from ms_supplier where _email = :email',array('email' => $_COOKIE[COOKIE_USER]));

        $data_product = $this->db->_select('SELECT * FROM ms_product_distributor a JOIN ms_publish_merchant b ON a._code = b._product_code WHERE b._supplier = :supplier',array('supplier' => $data_supplier[0]['_code']));
        //glfn::_pre($count_supplier);
        $this->view->product = $data_product;
        $this->view->render('distributor/index');
    }
}