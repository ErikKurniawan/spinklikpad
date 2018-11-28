<?php

class pembelian extends controller {


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
            td._invoice,
            td._supplier,
            td._address,
            td._courier,
            td._courier_package,
            td._courier_price,
            td._no_delivery,
            td._sts_delivery,
            td._qty,
            td._weight,
            td._price,
            td._desc,
            s._name AS _name_supplier,
            st._name as _name_status,
            td._crdt as transaction_time,
            d._name as _name_distributor,
            pd._picture,
            pd._name AS _name_product
    				
            
            FROM tr_transaction_distributor td 
            JOIN ms_supplier s ON td._supplier LIKE s._code 
            JOIN ms_distributor d ON td._distributor LIKE d._code
            JOIN ms_status_transaction_distributor st ON st._code = td._sts
            JOIN ms_product_distributor pd ON pd._code = td._product
            where s._code = :supplier
        ";
        
        $data_product = $this->db->_select($query,array('supplier' => $data_supplier[0]['_code']));
        //glfn::_pre($data_product);
        
        $this->view->purchasestatus = $data_product;
        $this->view->render('pembelian/index');
    }

    
    
     function order() {
        glfn::_checklogin();
        $this->view->css = glfn::_css();
        $this->view->js = glfn::_js();

        $data_supplier = $this->db->_select('select * from ms_supplier where _email = :email',array('email' => $_COOKIE[COOKIE_USER]));

        $data_address = $this->db->_select('select * from ms_customer_address where _email = :email',array('email' => $_COOKIE[COOKIE_USER]));

        $query="SELECT 
            td._code AS _code_transaction,
            td._invoice,
            td._supplier,
            td._address,
            td._courier,
            td._courier_package,
            td._courier_price,
            td._no_delivery,
            td._sts_delivery,
            td._qty,
            td._weight,
            td._price,
            td._desc,
            s._name AS _name_supplier,
            st._name as _name_status,
            td._crdt as transaction_time,
            d._name as _name_distributor,
            pd._picture,
            pd._name AS _name_product
                    
            
            FROM tr_transaction_distributor td 
            JOIN ms_supplier s ON td._supplier LIKE s._code 
            JOIN ms_distributor d ON td._distributor LIKE d._code
            JOIN ms_status_transaction_distributor st ON st._code = td._sts
            JOIN ms_product_distributor pd ON pd._code = td._product
            WHERE s._code = :supplier
            AND td._sts = :sts
        ";
        
        $data_product = $this->db->_select($query,array('supplier' => $data_supplier[0]['_code'], 'sts' => '2'));
        
        $this->view->purchasestatus = $data_product;
        $this->view->listaddress = $data_address;
        $this->view->render('pembelian/order');
    }

    function cancel() {
        glfn::_checklogin();
        $user_email = isset($_COOKIE[COOKIE_USER]) ? $_COOKIE[COOKIE_USER] : '';

        $return = array();

        
        $_code_transaction = isset($_POST['thecode']) ? $_POST['thecode'] : '';

        
        $this->db->_select("select * from tr_transaction_distributor where _code = :code",array('code' => $_code_transaction));
        if ($this->db->_rr > 0) {

          $table = 'tr_transaction_distributor';

            $update_data = array(
                '_sts' => 99
            );

            $update_cond = array(
                '_code' => $_code_transaction
            );

            $this->db->_update($table, $update_data, $update_cond);

            $return['sts'] = 1;
            $return['msg'] = 'Berhasil Update Pengiriman';
            $return['token'] = '';

        }

        echo json_encode($return);
        glfn::_redirect('pembelian/order');
    }

    function approve() {
        glfn::_checklogin();
        $user_email = isset($_COOKIE[COOKIE_USER]) ? $_COOKIE[COOKIE_USER] : '';

        $return = array();

        $varip = $_SERVER['REMOTE_ADDR'];
        $varip = str_replace(".","",$varip);
        $vartstamp = date("Ymdhis");
        $_rand_1 = rand();
        $_rand_2 = rand();
        $varsurveyid = ($vartstamp + $varip) + ($_rand_1 + $_rand_2);
        $productid=self::funcCreateID($varsurveyid);
        
        $_code_transaction = isset($_POST['thecode']) ? $_POST['thecode'] : '';
        $_jumlah_barang = isset($_POST['qty'.$_code_transaction]) ? $_POST['qty'.$_code_transaction] : '';
        $_keterangan = isset($_POST['desc'.$_code_transaction]) ? $_POST['desc'.$_code_transaction] : '';
        $_alamat = isset($_POST['address'.$_code_transaction]) ? $_POST['address'.$_code_transaction] : '';

        $_payment_code = "PYMDIS".date("Ymdhisa").$productid;

        
        $this->db->_select("select * from tr_transaction_distributor where _code = :code",array('code' => $_code_transaction));
        if ($this->db->_rr > 0) {

          $table = 'tr_transaction_distributor';

            $update_data = array(
                '_address' => $_alamat,
                '_qty' => $_jumlah_barang,
                '_desc' => $_keterangan,
                '_sts' => 3,
                '_payment_code' => $_payment_code
            );

            $update_cond = array(
                '_code' => $_code_transaction
            );

            $this->db->_update($table, $update_data, $update_cond);

            $return['sts'] = 1;
            $return['msg'] = 'Berhasil Update Order';
            $return['token'] = '';

        }

        echo json_encode($return);
        glfn::_redirect('pembelian/order');
    }

    function funcCreateID($thenumber){
         $ascTable = "qwertyuiopasdfghjklzxcvbnm1234567890POIUYTREWQLKJHGFDSAMNBVCXZ";
         $thebase = strlen($ascTable);
         $varreturn = "";
         $varhitung = "";
        
        
         while($thenumber >= $thebase) {
              $tempmodulus = abs($thenumber % $thebase);
              $varhitung = $ascTable[$tempmodulus] . $varhitung;
            //echo $tempmodulus."<br/>";
            //echo $thenumber."<br/>";
              $thenumber = $thenumber/$thebase;
         }
         $thenumber = round($thenumber,0);
         $thenumber = (string)$thenumber;
         $varreturn = $ascTable[$thenumber] . $varhitung;
         return $varreturn;
    }
}