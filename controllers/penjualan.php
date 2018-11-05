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

        
        $query="SELECT
        td._code_detail_transaction,
        td._transaction,
        td._invoice,
        td._supplier,
        td._address,
        td._zipcode,
        td._subdistrict,
        td._district,
        td._subprovince,
        td._province,
        td._courier,
        td._courier_package,
        td._courier_price,
        td._no_delivery,
        td._sts_delivery,
        td._customer_feedback,
        s._name AS _name_supplier,
        st._name as _name_status,
        tr._createdate as transaction_time,
        cp._name as _name_package,
        cs._name as _name_customer,
				cs._email,
                                cs._name as _name_customer
				
        
        FROM tr_transaction_delivery td 
        JOIN ms_supplier s ON td._supplier LIKE s._code 
        JOIN ms_courier_package cp ON td._courier_package LIKE cp._seq
        join ms_status_transaction st on st._code=td._sts_delivery
        AND td._courier  = cp._code
        join tr_transaction tr on tr._code = td._transaction
        join ms_customer cs on cs._email = tr._customer
        where s._code=:supplier
        and _sts_delivery='3'
        
    ";
        
        $data_product = $this->db->_select($query,array('supplier' => $data_supplier[0]['_code']));
        //glfn::_pre($data_product);
        
        
          foreach ($data_product as $k => $v) {

            $_code_detail_transaction = $v['_code_detail_transaction'];
            $query = 'SELECT 
            a._code_detail_transaction,
            a._product,
            a._price,
            _picture,
            a._qty,
            a._weight,
            a._desc, b._name as _name_product
            FROM tr_transaction_delivery_detail a join ms_product b on a._product = b._code WHERE _code_detail_transaction=:_code_detail_transaction';
            $data_details = $this->db->_select($query, array('_code_detail_transaction' => $_code_detail_transaction));

            $data_product[$k]['_details'] = $data_details;
        }
        
        $this->view->purchasestatus = $data_product;
        $this->view->render('penjualan/index');
    }

    
    
     function konfirmasi() {
        glfn::_checklogin();
        $this->view->css = glfn::_css();
        $this->view->js = glfn::_js();

        $data_supplier = $this->db->_select('select * from ms_supplier where _email = :email',array('email' => $_COOKIE[COOKIE_USER]));

        
        $query="SELECT
        td._code_detail_transaction,
        td._transaction,
        td._invoice,
        td._supplier,
        td._address,
        td._zipcode,
        td._subdistrict,
        td._district,
        td._subprovince,
        td._province,
        td._courier,
        td._courier_package,
        td._courier_price,
        td._no_delivery,
        td._sts_delivery,
        td._customer_feedback,
        s._name AS _name_supplier,
        st._name as _name_status,
        tr._createdate as transaction_time,
        cp._name as _name_package,
        cs._name as _name_customer,
				cs._email,
                                cs._name as _name_customer
				
        
        FROM tr_transaction_delivery td 
        JOIN ms_supplier s ON td._supplier LIKE s._code 
        JOIN ms_courier_package cp ON td._courier_package LIKE cp._seq
        join ms_status_transaction st on st._code=td._sts_delivery
        AND td._courier  = cp._code
        join tr_transaction tr on tr._code = td._transaction
        join ms_customer cs on cs._email = tr._customer
        where s._code=:supplier
        and _sts_delivery='4'
        
    ";
        
        $data_product = $this->db->_select($query,array('supplier' => $data_supplier[0]['_code']));
        //glfn::_pre($data_product);
        
        
          foreach ($data_product as $k => $v) {

            $_code_detail_transaction = $v['_code_detail_transaction'];
            $query = 'SELECT 
            a._code_detail_transaction,
            a._product,
            a._price,
            _picture,
            a._qty,
            a._weight,
            a._desc, b._name as _name_product
            FROM tr_transaction_delivery_detail a join ms_product b on a._product = b._code WHERE _code_detail_transaction=:_code_detail_transaction';
            $data_details = $this->db->_select($query, array('_code_detail_transaction' => $_code_detail_transaction));

            $data_product[$k]['_details'] = $data_details;
        }
        
        $this->view->purchasestatus = $data_product;
        $this->view->render('penjualan/konfirmasi');
    }
    function konfirmasi2() {
        glfn::_checklogin();
        $this->view->css = glfn::_css();
        $this->view->js = glfn::_js();

        $data_supplier = $this->db->_select('select * from ms_supplier where _email = :email',array('email' => $_COOKIE[COOKIE_USER]));

        
        $query = 'SELECT  a._product as _product, a._qty as _qty, b._price as _price, a._weight as _weight,b._name as _name, b._picture as _picture, c._code_detail_transaction as _code_detail, '
                . 'c._courier_price as _courier_price, c._invoice as _invoice, c._no_delivery as _no_delivery, c._courier as _courier, c._address as _send_address, '
                . 'd._createdate AS _tgl_invoice, e._name as _status_name FROM tr_transaction_delivery_detail a JOIN ms_product b ON a._product = b._code '
                . 'JOIN tr_transaction_delivery c ON a._code_detail_transaction = c._code_detail_transaction JOIN tr_transaction d ON c._transaction = d._code '
                . 'JOIN ms_status_transaction e ON d._status = e._code WHERE b._supplier = :supplier AND d._status = :status AND c._sts_delivery = :sts';
        $data_product = $this->db->_select('SELECT  a._product as _product, a._qty as _qty, b._price as _price, a._weight as _weight,b._name as _name, '
                . 'b._picture as _picture, c._code_detail_transaction as _code_detail, c._courier_price as _courier_price,'
                . ' c._invoice as _invoice, c._no_delivery as _no_delivery, c._courier as _courier, c._address as _send_address, '
                . 'd._createdate AS _tgl_invoice, e._name as _status_name FROM tr_transaction_delivery_detail a'
                . ' JOIN ms_product b ON a._product = b._code JOIN tr_transaction_delivery c ON a._code_detail_transaction = c._code_detail_transaction JOIN tr_transaction d ON c._transaction = d._code JOIN ms_status_transaction e ON d._status = e._code WHERE b._supplier = :supplier AND c._sts_delivery = :sts',
                array('supplier' => $data_supplier[0]['_code'], 'sts' => '4'));
        //glfn::_pre($count_supplier);
        $this->view->product = $data_product;
        $this->view->render('penjualan/konfirmasi');
    }

    function daftar() {
        glfn::_checklogin();
        $this->view->css = glfn::_css();
        $this->view->js = glfn::_js();

        $data_supplier = $this->db->_select('select * from ms_supplier where _email = :email',array('email' => $_COOKIE[COOKIE_USER]));

        $data_product = $this->db->_select('SELECT  a._qty as _qty, b._price as _price, a._weight as _weight,b._name as _name, b._picture as _picture, c._courier_price as _courier_price, c._invoice as _invoice, c._no_delivery as _no_delivery, c._courier as _courier, c._address as _send_address, d._createdate AS _tgl_invoice, e._name as _status_name FROM tr_transaction_delivery_detail a JOIN ms_product b ON a._product = b._code JOIN tr_transaction_delivery c ON a._code_detail_transaction = c._code_detail_transaction JOIN tr_transaction d ON c._transaction = d._code JOIN ms_status_transaction e ON d._status = e._code WHERE b._supplier = :supplier',array('supplier' => $data_supplier[0]['_code']));
        //glfn::_pre($count_supplier);
        $this->view->product = $data_product;
        $this->view->render('penjualan/daftar');
    }

    function konfirmasido() {
        glfn::_checklogin();
        $user_email = isset($_COOKIE[COOKIE_USER]) ? $_COOKIE[COOKIE_USER] : '';

        $return = array();

        
        $_resi = isset($_POST['_resi']) ? $_POST['_resi'] : '';
        $_ctd = isset($_POST['_ctd']) ? $_POST['_ctd'] : '';

        
        
        
        $this->db->_select("select * from tr_transaction_delivery where _code_detail_transaction = :code and _sts_delivery='4'",array('code' => $_ctd));
        if ($this->db->_rr > 0) {

          $table = 'tr_transaction_delivery';

            $update_data = array(
                '_sts_delivery' => 5,
                '_no_delivery' => $_resi
            );

            $update_cond = array(
                '_code_detail_transaction' => $_ctd
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