<?php

class payment extends controller {

    function __construct() {
        parent::__construct();
    }

    function add() {



        $post['_user'] = isset($_COOKIE[COOKIE_USER]) ? $_COOKIE[COOKIE_USER] : '';
        $post['_password'] = isset($_COOKIE[COOKIE_PWD]) ? $_COOKIE[COOKIE_PWD] : '';
        $post['_code'] = isset($_POST['code']) ? $_POST['code'] : '';

        $curl = $this->view->cartlist = glfn::_curl_api2('payment/newadd', $post);
        //$cart = $this->view->cartlist = $curl ['sts'] ? $curl ['data'] : array();

        
        
        echo json_encode($curl);
        /*
        if ($curl['sts'] == 1) {
            glfn::_redirect("payment/confirmation");
        } else {
            glfn::_redirect("product");
        }
         * 
         */
    }

    function index() {
        
        glfn::_redirect();
    }
    function info() {
        $this->view->css = glfn::_css();
        $this->view->js = glfn::_js();
        
        
        $this->view->render('payment/index');
        glfn::_redirect();
    }

    function check() {
        header("Content-Type: application/json");

        $params = file_get_contents('php://input');
        $params = json_decode($params, true);



        $transcode = isset($params['order_id']) ? $params['order_id'] : '';



        $rs = glfn::_curl_api2('payment/add', $params);
        //glfn::_pre($rs);



        $post['_status'] = 4;
        $post['_code'] = $transcode;

        $status = glfn::_curl_api2('cart/status_mintrans', $post);
        //glfn::_pre($status);


        Veritrans_Config::$isProduction = false;
        Veritrans_Config::$serverKey = 'SB-Mid-server-etiWNyuZWK2dpPGu9q_soAU0';
        $notif = new Veritrans_Notification();

        $transaction = $notif->transaction_status;
        $type = $notif->payment_type;
        $order_id = $notif->order_id;
        $fraud = $notif->fraud_status;

        if ($transaction == 'capture') {
            // For credit card transaction, we need to check whether transaction is challenge by FDS or not
            if ($type == 'credit_card') {
                if ($fraud == 'challenge') {
                    // TODO set payment status in merchant's database to 'Challenge by FDS'
                    // TODO merchant should decide whether this transaction is authorized or not in MAP
                    echo "Transaction order_id: " . $order_id . " is challenged by FDS";
                } else {
                    // TODO set payment status in merchant's database to 'Success'
                    echo "Transaction order_id: " . $order_id . " successfully captured using " . $type;
                }
            }
        } else if ($transaction == 'settlement') {
            // TODO set payment status in merchant's database to 'Settlement'
            echo "Transaction order_id: " . $order_id . " successfully transfered using " . $type;
        } else if ($transaction == 'pending') {
            // TODO set payment status in merchant's database to 'Pending'
            echo "Waiting customer to finish transaction order_id: " . $order_id . " using " . $type;
        } else if ($transaction == 'deny') {
            // TODO set payment status in merchant's database to 'Denied'
            echo "Payment using " . $type . " for transaction order_id: " . $order_id . " is denied.";
        } else if ($transaction == 'expire') {
            // TODO set payment status in merchant's database to 'expire'
            echo "Payment using " . $type . " for transaction order_id: " . $order_id . " is expired.";
        } else if ($transaction == 'cancel') {
            // TODO set payment status in merchant's database to 'Denied'
            echo "Payment using " . $type . " for transaction order_id: " . $order_id . " is canceled.";
        }
    }

}
