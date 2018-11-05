<?php

class purchase extends controller {

    function __construct() {
        $this->db = new database(DB_TYPE,DB_HOST,DB_NAME,DB_PORT,DB_USER,DB_PASS);
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

    function penerimanaan() {
        glfn::_checklogin();
        $user_email = isset($_COOKIE[COOKIE_USER]) ? $_COOKIE[COOKIE_USER] : '';

        $return = array();


        $_resi = isset($_POST['_resi']) ? $_POST['_resi'] : '';
        $_ctd = isset($_POST['_ctd']) ? $_POST['_ctd'] : '';




        $this->db->_select("select * from tr_transaction_delivery where _code_detail_transaction = :code and _sts_delivery='5'", array('code' => $_ctd));
        if ($this->db->_rr > 0) {

            $table = 'tr_transaction_delivery';

            $update_data = array(
                '_sts_delivery' => 6
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
        glfn::_redirect('purchase/status');
    }

}

?>
