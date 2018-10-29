<?php

class penjualan extends controller {


    function __construct() {
        $this->db = new database(DB_TYPE,DB_HOST,DB_NAME,DB_PORT,DB_USER,DB_PASS);
        parent::__construct();
    }

    function index() {
        glfn::_checklogin();
        $this->view->css = glfn::_css();
        $this->view->js = glfn::_js();

        $data_supplier = $this->db->_select('select * from ms_supplier where _email = :email',array('email' => $_COOKIE[COOKIE_USER]));

        $data_product = $this->db->_select('SELECT  a._qty as _qty, b._price as _price, a._weight as _weight,b._name as _name, b._picture as _picture, c._courier_price as _courier_price, c._invoice as _invoice, c._no_delivery as _no_delivery, c._courier as _courier, c._address as _send_address, d._createdate AS _tgl_invoice, e._name as _status_name FROM tr_transaction_delivery_detail a JOIN ms_product b ON a._product = b._code JOIN tr_transaction_delivery c ON a._code_detail_transaction = c._code_detail_transaction JOIN tr_transaction d ON c._transaction = d._code JOIN ms_status_transaction e ON d._status = e._code WHERE b._supplier = :supplier AND d._status = :status',array('supplier' => $_COOKIE[COOKIE_USER], 'status' => '3'));
        //glfn::_pre($count_supplier);
        $this->view->product = $data_product;
        $this->view->render('penjualan/index');
    }

    function konfirmasi() {
        glfn::_checklogin();
        $this->view->css = glfn::_css();
        $this->view->js = glfn::_js();

        $data_supplier = $this->db->_select('select * from ms_supplier where _email = :email',array('email' => $_COOKIE[COOKIE_USER]));

        $data_product = $this->db->_select('SELECT  a._product as _product, a._qty as _qty, b._price as _price, a._weight as _weight,b._name as _name, b._picture as _picture, c._code_detail_transaction as _code_detail, c._courier_price as _courier_price, c._invoice as _invoice, c._no_delivery as _no_delivery, c._courier as _courier, c._address as _send_address, d._createdate AS _tgl_invoice, e._name as _status_name FROM tr_transaction_delivery_detail a JOIN ms_product b ON a._product = b._code JOIN tr_transaction_delivery c ON a._code_detail_transaction = c._code_detail_transaction JOIN tr_transaction d ON c._transaction = d._code JOIN ms_status_transaction e ON d._status = e._code WHERE b._supplier = :supplier AND d._status = :status AND c._sts_delivery = :sts',array('supplier' => $_COOKIE[COOKIE_USER], 'status' => '4', 'sts' => '0'));
        //glfn::_pre($count_supplier);
        $this->view->product = $data_product;
        $this->view->render('penjualan/konfirmasi');
    }

    function daftar() {
        glfn::_checklogin();
        $this->view->css = glfn::_css();
        $this->view->js = glfn::_js();

        $data_supplier = $this->db->_select('select * from ms_supplier where _email = :email',array('email' => $_COOKIE[COOKIE_USER]));

        $data_product = $this->db->_select('SELECT  a._qty as _qty, b._price as _price, a._weight as _weight,b._name as _name, b._picture as _picture, c._courier_price as _courier_price, c._invoice as _invoice, c._no_delivery as _no_delivery, c._courier as _courier, c._address as _send_address, d._createdate AS _tgl_invoice, e._name as _status_name FROM tr_transaction_delivery_detail a JOIN ms_product b ON a._product = b._code JOIN tr_transaction_delivery c ON a._code_detail_transaction = c._code_detail_transaction JOIN tr_transaction d ON c._transaction = d._code JOIN ms_status_transaction e ON d._status = e._code WHERE b._supplier = :supplier',array('supplier' => $_COOKIE[COOKIE_USER]));
        //glfn::_pre($count_supplier);
        $this->view->product = $data_product;
        $this->view->render('penjualan/daftar');
    }

    function updatepengiriman() {
        glfn::_checklogin();
        $user_email = isset($_COOKIE[COOKIE_USER]) ? $_COOKIE[COOKIE_USER] : '';

        $return = array();
        $_code_detail_transaction = isset($_POST['theid']) ? $_POST['theid'] : '';
        $_product = isset($_POST['theprod']) ? $_POST['theprod'] : '';
        $_theseq = isset($_POST['theseq']) ? $_POST['theseq'] : '';
        $_name_resi = "tx_resi".$_theseq;
        $_resi = isset($_POST[$_name_resi]) ? $_POST[$_name_resi] : '';

        $data_delivery = $this->db->_select('select * from tr_transaction_delivery where _code_detail_transaction = :code',array('code' => $_code_detail_transaction));
        if ($this->db->_rr == 0) {

            $return['sts'] = 2;
            $return['msg'] = 'Gagal Update Pengiriman';
            $return['token'] = '';

        }else{
            $table = 'tr_transaction_delivery';

            $update_data = array(
                '_sts_delivery' => 1,
                '_no_delivery' => $_resi
            );

            $update_cond = array(
                '_code_detail_transaction' => $_code_detail_transaction
            );

            $this->db->_update($table, $update_data, $update_cond);

            $return['sts'] = 1;
            $return['msg'] = 'Berhasil Update Pengiriman';
            $return['token'] = '';
        }

        echo json_encode($return);
        glfn::_redirect('penjualan/konfirmasi');
    }
}