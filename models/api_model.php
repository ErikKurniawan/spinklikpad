<?php

class api_model extends model {

    public function __construct() {
        parent::__construct();
    }

    public function signin($dt) {
        $query = 'SELECT _email from ms_user where _email =:_email AND _password =:_password';
        $conarr['_email'] = $dt['email'];
        $conarr['_password'] = $dt['password'];
        $rs = $this->db->_select($query, $conarr);
        if ($this->db->_rr > 0) {
            $rr['sts'] = '1';
            $rr['msg'] = 'Berhasil Login';
            $rr['token'] = enhash::_hash_csrf(HASH_CSRF_ALGO, $dt['email'], HASH_CSRF_KEY);
        } else {
            $rr['sts'] = '0';
            $rr['msg'] = 'Email atau password salah';
            $rr['token'] = '';
        }
        return $rr;
    }

    public function product($req) {
        $status = 'publish';
        $rr = array();

        $srchproduct = isset($req['srchproduct']) && $req['srchproduct'] !== "" ? $req['srchproduct'] : '';
        $category = isset($req['category']) && $req['category'] !== "" ? $req['category'] : '';
        $orderby = isset($req['orderby']) && $req['orderby'] !== "" ? $req['orderby'] : '';

        $query = 'select * from ms_product WHERE _status=:_status and _title like :_title '
                . 'and _category_detail like :_category_detail order by ' . $orderby;
        $r_product = $this->db->_select($query, array
            (
            '_status' => $status,
            '_title' => '%' . $srchproduct . '%',
            '_category_detail' => '%' . $category . '%'
        ));
        foreach ($r_product as $key => $value) {
            array_push($rr, $value);
            $query_detail = 'select * from ms_product_photo_detail where _code=:_code ';
            $r_photo = $this->db->_select($query_detail, array('_code' => $value['_code']));
            $rr[$key]['_photos'] = $r_photo;
        }
        return $rr;
    }

    public function prod_detail($req) {
        $last_result = array();

        $prod = $req['prod'];

        $query_prod = 'SELECT * FROM ms_product WHERE _code=:code';
        $prod_head = $this->db->_select($query_prod, array('code' => $prod));
        $rr = $this->db->_rr > 0 ? '1' : '0';

        $query_photo = 'SELECT * FROM ms_product_photo_detail WHERE _code=:code';
        $prod_photo = $this->db->_select($query_photo, array('code' => $prod));


        $prod_head[0]['_photos'] = $prod_photo;

        $last_result = array(
            'sts' => $rr,
            'msg' => 'result for ' . $prod,
            'data' => $prod_head
        );

        return $last_result;
    }

    public function category($code) {
        $rr = array();
        $query = 'select * from ms_category';
        $cat = $this->db->_select($query);
        if ($this->db->_rr > 0) {
            $return['sts'] = 1;
            $return['msg'] = 'result category';
            //array_push($rr, $return);
        }
        foreach ($cat as $key => $value) {
            array_push($rr, $value);
            $query_detail = 'select * from ms_category_detail where _category=:_code ';
            $cat_detail = $this->db->_select($query_detail, array('_code' => $value['_code']));
            $rr[$key]['_details'] = $cat_detail;
            $rr[$key]['_selected'] = $code == $value['_code'] ? '1' : '0';
            foreach ($cat_detail as $k => $v) {
                $rr[$key]['_details'][$k]['_selected'] = $code == $v['_code'] ? '1' : '0';
            }
        }
        $return['data']=$rr;
        return $return;
    }

    public function addtocart($req) {

        $prod = $req['prod'];
        $qty = $req['qty'];
        $flag = $req['flag'];
        $desc = $req['desc'];
        $user = $req['user'];

        $address = $req['address'];
        $courier = $req['courier'];
        $courier_package = $req['courier_package'];

        $last_result = array();

        $rsparameter = $this->db->_select('SELECT _value FROM ms_parameter WHERE _code =\'ppn\'');
        $ppn = is_array($rsparameter) && isset($rsparameter[0]['_value']) ? $rsparameter[0]['_value'] : '';

        $get_prod = 'SELECT * FROM ms_product WHERE _code=:_proc_code ';
        $data_prod = $this->db->_select($get_prod, array('_proc_code' => $prod));

        $price = $data_prod[0]['_price'];

        $cond = array('_user' => $user, '_status' => '1');

        $query = 'SELECT * FROM tr_transaction WHERE _createby=:_user AND _status=:_status';
        $trans = $this->db->_select($query, $cond);

        if (count($trans) == 1) {
            //update transaction

            $code = $trans[0]['_code'];

            $check_prod = 'SELECT * FROM tr_transaction_detail WHERE _product=:_prod AND _code=:_code';
            $exist_prod = $this->db->_select($check_prod, array('_prod' => $prod, '_code' => $code));

            $exist_qty = $exist_prod[0]['_qty'];

            if (count($exist_prod) == 1) {
                // add qty item

                if ($flag == "add") {
                    $qty = $qty + $exist_qty;
                } else if ($flag == "upd") {
                    $qty = $qty;
                }

                $update_table = 'tr_transaction_detail';
                $update_data = array(
                    '_price' => $price,
                    '_qty' => $qty,
                    '_desc' => $desc,
                    '_courier' => $courier,
                    '_courier_package' => $courier_package,
                    '_address' => $address
                );
                $update_cond = array(
                    '_code' => $code,
                    '_product' => $prod
                );

                $result = $this->db->_update($update_table, $update_data, $update_cond);

                $last_result = array(
                    'status' => $flag . ' qty to item in transaction',
                    'trcode' => $code,
                    'item' => $prod,
                    'qty' => $qty,
                    'result' => $result
                );
            } else {
                // new item
                $detail_table = 'tr_transaction_detail';
                $detail_data = array(
                    '_code' => $code,
                    '_product' => $prod,
                    '_price' => $price,
                    '_qty' => $qty,
                    '_desc' => $desc,
                    '_courier' => $courier,
                    '_courier_package' => $courier_package,
                    '_address' => $address
                );

                $result = $this->db->_insert($detail_table, $detail_data);

                $last_result = array(
                    'status' => 'add new item to transaction',
                    'trcode' => $code,
                    'item' => $prod,
                    'qty' => $qty,
                    'result' => $result
                );
            }
        } else {
            //new transaction with item

            $code = time();

            $head_table = 'tr_transaction';
            $head_data = array(
                '_code' => $code,
                '_ppn' => $ppn,
                '_status' => '1',
                '_createby' => $user
            );

            $result_head = $this->db->_insert($head_table, $head_data);

            $detail_table = 'tr_transaction_detail';
            $detail_data = array(
                '_code' => $code,
                '_product' => $prod,
                '_price' => $price,
                '_qty' => $qty,
                '_desc' => $desc,
                '_courier' => $courier,
                '_courier_package' => $courier_package,
                '_address' => $address
            );

            $result_detail = $this->db->_insert($detail_table, $detail_data);

            $last_result = array(
                'status' => 'new transaction',
                'trcode' => $code,
                'result_head' => $result_head,
                'result_detail' => $result_detail
            );
        }

        return $last_result;
    }

    public function cartlist($req) {

        $last_result = array();

        $user = $req['user'];

        $cond = array('_user' => $user, '_status' => '1');
        $query = 'SELECT * FROM tr_transaction WHERE _createby=:_user AND _status=:_status';
        $trans = $this->db->_select($query, $cond);

        $code = $trans[0]['_code'];

        $cond = array('code' => $code);
        $query = 'SELECT * FROM tr_transaction_detail WHERE _code=:code';
        $detail = $this->db->_select($query, $cond);

        $trans[0]['_data'] = $detail;

        $last_result = array(
            'status' => 'success',
            'transaction' => $trans
        );

        return $last_result;
    }

    public function addtowishlist($req) {

        $last_result = array();

        return $last_result;
    }

}
