<?php

class product_model extends model {

    public function __construct() {
        parent::__construct();
    }

    public function signin($dt) {
        $query = 'SELECT _email from ms_user where _email =:_email AND _password =:_password';
        $conarr['_email'] = $dt['email'];
        $conarr['_password'] = enhash::_hash_signin(HASH_PWD_ALGO, $dt['password'], HASH_PWD_KEY);
        $this->db->_select($query, $conarr);
        return $this->db->_rr;
    }

    public function product($req) {
        $status = 'publish';
        $rr = array();
        
        $srchproduct = isset($req['srchproduct']) && $req['srchproduct'] !== "" ? $req['srchproduct'] : '';
        $category = isset($req['category']) && $req['category'] !== "" ? $req['category'] : '';
        $orderby = isset($req['orderby']) && $req['orderby'] !== "" ? $req['orderby'] : '';

        $query = 'select * from ms_product WHERE _status=:_status and _title like :_title '
                . 'and _category_detail like :_category_detail order by '.$orderby;
        $r_product = $this->db->_select($query, array
            (
            '_status' => $status,
            '_title' => '%'.$srchproduct.'%',
            '_category_detail' => '%'.$category.'%'
        ));
        foreach ($r_product as $key => $value) {
            array_push($rr, $value);
            $query_detail = 'select * from ms_product_photo_detail where _code=:_code ';
            $r_photo = $this->db->_select($query_detail, array('_code' => $value['_code']));
            $rr[$key]['_photos'] = $r_photo;
        }
        return $rr;
    }

    public function category($code) {
        $rr = array();
        $query = 'select * from ms_category';
        $cat = $this->db->_select($query);
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
        return $rr;
    }

}
