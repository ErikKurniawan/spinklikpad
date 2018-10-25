<?php

class user extends controller {

    function __construct() {
        $this->db = new database(DB_TYPE,DB_HOST,DB_NAME,DB_PORT,DB_USER,DB_PASS);
        parent::__construct();
    }

    function signin() {
        $this->view->css = glfn::_css();
        $this->view->js = glfn::_js();
        $this->view->render('user/signin');
    }

    function signindo() {
        $post['_user'] = $_POST['user'];
        $post['_password'] = $_POST['password'];
        $toko = 1;
        
        $this->db->_select('select * from ms_supplier where _email = :email',array('email' => $_POST['user']));
        if($this->db->_rr == 0)
        {
            $toko = 0;
        }

        $singin = glfn::_curl_api2('auth/signin', $post);
        if ($singin['sts']) {
            setcookie(COOKIE_SIGNIN, $singin['sts'], time() + 9999999, '/');
            setcookie(COOKIE_USER, $_POST['user'], time() + 9999999, '/');
            setcookie(COOKIE_PWD, $_POST['password'], time() + 9999999, '/');
            setcookie(COOKIE_TOKO, $toko, time() + 9999999, '/');
        } else {
            setcookie(COOKIE_USER, null, -1, '/');
            setcookie(COOKIE_PWD, null, -1, '/');
        }
        echo json_encode($singin);
    }

    function signup() {
        $this->view->css = glfn::_css();
        $this->view->js = glfn::_js();
        $this->view->render('user/signup');
    }

    function signupdo() {
        $post['_user'] = $_POST['email'];
        $post['_name'] = $_POST['name'];
        $post['_dob'] = $_POST['dob'];
        $post['_hp'] = $_POST['hp'];
        $post['_password'] = $_POST['password'];
        $post['_gender'] = $_POST['gender'];


        $singin = glfn::_curl_api2('register', $post);
        echo json_encode($singin);
    }

    function logout() {

        foreach ($_COOKIE as $key => $value) {
            setcookie($key, null, -1, '/');
        }

        session_destroy();
        glfn::_redirect();
    }

    function index() {

        $this->view->css = glfn::_css();
        $this->view->js = glfn::_js();
        $post['_user'] = isset($_COOKIE[COOKIE_USER]) ? $_COOKIE[COOKIE_USER] : '';
        $post['_password'] = isset($_COOKIE[COOKIE_PWD]) ? $_COOKIE[COOKIE_PWD] : '';




        $detail = $this->view->detail = glfn::_curl_api2('user/detail', $post);
        $data = $this->view->detail = isset($detail['data']) && count($detail['data']) > 0 ? $detail['data'] : array();

        $this->view->render('user/index');
    }

    function leftmenu() {

        $this->view->render('user/left-menu');
    }

    function profile() {
        glfn::_checklogin();
        $this->view->css = glfn::_css();
        $this->view->js = glfn::_js();

        $this->view->render('user/profile');
    }

    function updatedatadetail() {
        glfn::_checklogin();
        $post['_user'] = isset($_COOKIE[COOKIE_USER]) ? $_COOKIE[COOKIE_USER] : '';
        $post['_password'] = isset($_COOKIE[COOKIE_PWD]) ? $_COOKIE[COOKIE_PWD] : '';

        $post['_name'] = isset($_POST['name']) ? $_POST['name'] : '';
        $post['_dob'] = isset($_POST['dob']) ? $_POST['dob'] : date('Y-m-d');
        $post['_hp'] = isset($_POST['hp']) ? $_POST['hp'] : '';
        $post['_gender'] = isset($_POST['gender']) ? $_POST['gender'] : '';



        $picture_customer = md5($post['_user']);
        $fileInput = isset($_FILES['fileInput']) ? $_FILES['fileInput'] : '';

        if ($fileInput != "") {
            
            $target_file = 'public/image/customer';
            if (file_exists($target_file)) {
                
                $newupload = $target_file . '/' . $picture_customer . '.jpg';


                move_uploaded_file($fileInput['tmp_name'], $newupload);
            }
        }
        //////glfn::_pre($post);
        $update = $this->view->update = glfn::_curl_api2('user/update', $post);
        echo json_encode($update);
    }

    function changepassword($msgcode = null) {
        $this->view->css = glfn::_css();
        $this->view->js = glfn::_js(array(VENDOR_PATH . 'scrollPosStyler.min.js'));

        $this->view->render('user/changepassword');
    }

    function updatepassword() {
        glfn::_checklogin();
        $post['_user'] = isset($_COOKIE[COOKIE_USER]) ? $_COOKIE[COOKIE_USER] : '';
        $post['_password'] = isset($_COOKIE[COOKIE_PWD]) ? $_COOKIE[COOKIE_PWD] : '';

        $post['_newpassword'] = isset($_POST['newpwd']) ? $_POST['newpwd'] : '';

        $update = $this->view->update = glfn::_curl_api2('user/changepassword', $post);
        if ($update['sts']) {
            setcookie(COOKIE_PWD, $_POST['newpwd'], time() + 9999999999, '/');
        }
        $style = 'style="border-bottom:1px dotted #d2d2d2;font-size:18px;"';
        $style2 = 'style="margin-top:15px;font-size:16px;color:#733f98"';
        $style3 = 'style="margin-top:15px;font-size:16px;color:#d91b5b"';
        ?>
        
        <div <?=$style?>>Ganti Sandi</div><div <?=$style3?>>Sandi berhasil di ganti</div>
        <?php
    }

    function address($msgcode = null) {
        glfn::_checklogin();
        $this->view->css = glfn::_css();
        $this->view->js = glfn::_js();



        $post['_email'] = isset($_COOKIE[COOKIE_USER]) ? $_COOKIE[COOKIE_USER] : '';
        $post['_user'] = isset($_COOKIE[COOKIE_USER]) ? $_COOKIE[COOKIE_USER] : '';
        $post['_password'] = isset($_COOKIE[COOKIE_PWD]) ? $_COOKIE[COOKIE_PWD] : '';

        $curl = glfn::_curl_api2('address/listdata', $post);
        $listaddress = $this->view->listaddress = isset($curl['data']) && count($curl['data']) > 0 ? $curl['data'] : array();

        $this->view->msgcode = $msgcode;
        $curl = glfn::_curl_api2('zipcode/listprovince', $post);
        $listprovince = $this->view->listprovince = isset($curl['data']) && count($curl['data']) > 0 ? $curl['data'] : array();


        $_province = count($listprovince) > 0 ? $listprovince[0]['_province'] : '';



        $curl = glfn::_curl_api2('zipcode/listsubprovince', array('_code' => $_province));
        $listsubprovince = $this->view->listsubprovince = isset($curl['data']) && count($curl['data']) > 0 ? $curl['data'] : array();


        $_subprovince = count($listsubprovince) > 0 ? $listsubprovince[0]['_subprovince'] : '';



        //$curl = glfn::_curl_api2('zipcode/listdistrict', array('_code' => $_subprovince,'_save'=>'SENEN'));
        $curl = glfn::_curl_api2('zipcode/listdistrict', array('_code' => $_subprovince));
        $listdistrict = $this->view->listdistrict = isset($curl['data']) && count($curl['data']) > 0 ? $curl['data'] : array();


        $_district = count($listdistrict) > 0 ? $listdistrict[0]['_district'] : '';



        $curl = glfn::_curl_api2('zipcode/listsubdistrict', array('_code' => $_district));
        $listsubdistrict = $this->view->listsubdistrict = isset($curl['data']) && count($curl['data']) > 0 ? $curl['data'] : array();

        $_subdistrict = count($listsubdistrict) > 0 ? $listsubdistrict[0]['_subdistrict'] : '';


        $curl = glfn::_curl_api2('zipcode/listzipcode', array('_code' => $_subdistrict));
        $listzipcode = $this->view->listzipcode = isset($curl['data']) && count($curl['data']) > 0 ? $curl['data'] : array();
        //$_zipcoe = count($_listsubdistrict) > 0 ? $_listsubdistrict[0]['_district'] : '';

        $_zipcode = count($listsubdistrict) > 0 ? $listsubdistrict[0]['_zipcode'] : '';


        //glfn::_pre($listdistrict);

        $this->view->render('user/address');
    }

    function listaddress() {
        glfn::_checklogin();
        $this->view->css = glfn::_css();
        $this->view->js = glfn::_js();
        $post['_email'] = isset($_COOKIE[COOKIE_USER]) ? $_COOKIE[COOKIE_USER] : '';
        $post['_user'] = isset($_COOKIE[COOKIE_USER]) ? $_COOKIE[COOKIE_USER] : '';
        $post['_password'] = isset($_COOKIE[COOKIE_PWD]) ? $_COOKIE[COOKIE_PWD] : '';

        $curl = glfn::_curl_api2('address/listdata', $post);
        $listaddress = $this->view->listaddress = isset($curl['data']) && count($curl['data']) > 0 ? $curl['data'] : array();



        $this->view->render('user/listaddress', 2);
    }

    function addaddress() {
        glfn::_checklogin();
        $post['_user'] = isset($_COOKIE[COOKIE_USER]) ? $_COOKIE[COOKIE_USER] : '';
        $post['_email'] = isset($_COOKIE[COOKIE_USER]) ? $_COOKIE[COOKIE_USER] : '';
        $post['_password'] = isset($_COOKIE[COOKIE_PWD]) ? $_COOKIE[COOKIE_PWD] : '';
        //////glfn::_pre($_POST);


        $post['_alias'] = isset($_POST['nameplace']) ? $_POST['nameplace'] : '';
        $post['_name'] = isset($_POST['name']) ? $_POST['name'] : '';
        $post['_hp'] = isset($_POST['hp']) ? $_POST['hp'] : '';
        $post['_address'] = isset($_POST['address']) ? $_POST['address'] : '';
        $post['_province'] = isset($_POST['province']) ? $_POST['province'] : '';
        $post['_subprovince'] = isset($_POST['subprovince']) ? $_POST['subprovince'] : '';
        $post['_district'] = isset($_POST['district']) ? $_POST['district'] : '';
        $post['_subdistrict'] = isset($_POST['subdistrict']) ? $_POST['subdistrict'] : '';
        $post['_zipcode'] = isset($_POST['zipcode']) ? $_POST['zipcode'] : '';

        $update = glfn::_curl_api2('address/add', $post);
        echo json_encode($update);
    }

    function deleteaddress() {
        glfn::_checklogin();
        $post['_user'] = isset($_COOKIE[COOKIE_USER]) ? $_COOKIE[COOKIE_USER] : '';
        $post['_email'] = isset($_COOKIE[COOKIE_USER]) ? $_COOKIE[COOKIE_USER] : '';
        $post['_password'] = isset($_COOKIE[COOKIE_PWD]) ? $_COOKIE[COOKIE_PWD] : '';
        $post['_seq'] = isset($_POST['_seq']) ? $_POST['_seq'] : '';
        $delete = glfn::_curl_api2('address/delete', $post);
    }

    function primaryaddress($_seq = '') {
        glfn::_checklogin();
        $post['_user'] = isset($_COOKIE[COOKIE_USER]) ? $_COOKIE[COOKIE_USER] : '';
        $post['_email'] = isset($_COOKIE[COOKIE_USER]) ? $_COOKIE[COOKIE_USER] : '';
        $post['_password'] = isset($_COOKIE[COOKIE_PWD]) ? $_COOKIE[COOKIE_PWD] : '';
        $post['_seq'] = $_seq;
        ////glfn::_pre($post);
        $delete = glfn::_curl_api2('address/primary', $post);
        ////glfn::_pre($delete);
        setcookie(COOKIE_MSG_INFO, json_encode($delete), time() + 9999999999, '/');
        glfn::_redirect('user/address/1');
    }

    function zipcode() {
        glfn::_checklogin();
        $link = isset($_POST['_link']) ? $_POST['_link'] : '';
        $post['_save'] = isset($_POST['_save']) ? $_POST['_save'] : '';
        $post['_code'] = isset($_POST['_code']) ? $_POST['_code'] : '';

        ////glfn::_pre($_POST);
        $curl = glfn::_curl_api2($link, $post);

        $data = isset($curl['data']) && count($curl['data']) > 0 ? $curl['data'] : array();



        foreach ($data as $k => $v) {
            echo '<option value="' . $v['_zipcode'] . '">' . $v['_zipcode'] . '</option>';
        }
    }

    function formaddress() {
        glfn::_checklogin();


        $post['_user'] = isset($_COOKIE[COOKIE_USER]) ? $_COOKIE[COOKIE_USER] : '';
        $post['_email'] = isset($_COOKIE[COOKIE_USER]) ? $_COOKIE[COOKIE_USER] : '';
        $post['_password'] = isset($_COOKIE[COOKIE_PWD]) ? $_COOKIE[COOKIE_PWD] : '';
        $post['_seq'] = isset($_POST['_seq']) ? $_POST['_seq'] : '';
        $curl = glfn::_curl_api2('address/detail', $post);
        $data_alamat = isset($curl['data']) && count($curl['data']) > 0 ? $curl['data'] : array();
        //glfn::_pre($data);

        $_seq = "";
        $_alias = "";
        $_name = "";
        $_hp = "";
        $_address = "";
        $_zipcode = "";
        $_province = "";
        $_subprovince = "";
        $_district = "";
        $_subdistrict = "";

        foreach ($data_alamat as $key => $v) {
            $_seq = $v['_seq'];
            $_alias = $v['_alias'];
            $_name = $v['_name'];
            $_hp = $v['_hp'];
            $_address = $v['_address'];
            $_zipcode = $v['_zipcode'];
            $_province = $v['_province'];
            $_subprovince = $v['_subprovince'];
            $_district = $v['_district'];
            $_subdistrict = $v['_subdistrict'];
        }

        $curl = glfn::_curl_api2('zipcode/listprovince', array());
        $listprovince = $this->view->listprovince = isset($curl['data']) && count($curl['data']) > 0 ? $curl['data'] : array();


        if ($_province == "") {
            $_province = count($listprovince) > 0 ? $listprovince[0]['_province'] : '';
        }



        $curl = glfn::_curl_api2('zipcode/listsubprovince', array('_code' => $_province));
        $listsubprovince = $this->view->listsubprovince = isset($curl['data']) && count($curl['data']) > 0 ? $curl['data'] : array();
        if ($_subprovince == "") {
            $_subprovince = count($listsubprovince) > 0 ? $listsubprovince[0]['_subprovince'] : '';
        }


        //$curl = glfn::_curl_api2('zipcode/listdistrict', array('_code' => $_subprovince,'_save'=>'SENEN'));
        $curl = glfn::_curl_api2('zipcode/listdistrict', array('_code' => $_subprovince));
        $listdistrict = $this->view->listdistrict = isset($curl['data']) && count($curl['data']) > 0 ? $curl['data'] : array();

        if ($_district == "") {
            $_district = count($listdistrict) > 0 ? $listdistrict[0]['_district'] : '';
        }

        $curl = glfn::_curl_api2('zipcode/listsubdistrict', array('_code' => $_district));
        $listsubdistrict = $this->view->listsubdistrict = isset($curl['data']) && count($curl['data']) > 0 ? $curl['data'] : array();

        if ($_subdistrict == "") {
            $_subdistrict = count($listsubdistrict) > 0 ? $listsubdistrict[0]['_subdistrict'] : '';
        }


        $curl = glfn::_curl_api2('zipcode/listzipcode', array('_code' => $_subdistrict));
        $listzipcode = $this->view->listzipcode = isset($curl['data']) && count($curl['data']) > 0 ? $curl['data'] : array();
        //$_zipcoe = count($_listsubdistrict) > 0 ? $_listsubdistrict[0]['_district'] : '';

        if ($_zipcode == "") {
            $_zipcode = count($listsubdistrict) > 0 ? $listsubdistrict[0]['_zipcode'] : '';
        }
        ?>

        <script type="text/javascript" src="<?= URL ?>/public/js/main.js"></script>
        <script>


            $(function () {

                $('#listaddress').load("<?= URL ?>user/listaddress");

                $('#frmaddaddress').bootstrapValidator({
                    framework: 'bootstrap',
                    Icons: {valid: 'glyphicon glyphicon-ok',
                        invalid: 'glyphicon glyphicon-remove',
                        validating: 'glyphicon glyphicon-refresh'},
                    fields: {
                        nameplace: {validators: {
                                notEmpty: {message: 'Alamat sebagai harus diisi'}}},
                        name: {validators: {
                                notEmpty: {message: 'Nama Penerima harus diisi'}}},
                        hp: {validators: {
                                notEmpty: {message: 'Nomor HP harus diisi'}}},
                        address: {validators: {
                                notEmpty: {message: 'Alamat harus diisi'}}},
                        province: {validators: {
                                notEmpty: {message: 'Propinsi baru harus diisi'}}},
                        subprovince: {validators: {
                                notEmpty: {message: 'Kabupaten baru harus diisi'}}},
                        district: {validators: {
                                notEmpty: {message: 'Kecamatan baru harus diisi'}}},
                        subdistrict: {validators: {
                                notEmpty: {message: 'Kelurahan baru harus diisi'}}},
                        zipcode: {validators: {
                                notEmpty: {message: 'Kode pos baru harus diisi'}}}}})
                        .on('error.form.bv', function (e) {
                            $('.err-server').css({'display': 'none'});
                        }).on('success.form.bv', function (e) {
                    e.preventDefault();
                    var $form = $(e.target);



                    $.post($form.attr('action'), $form.serialize()).done(function (rjson) {


                        var obj = JSON.parse(rjson);



                        style = 'style="border-bottom:1px dotted #d2d2d2;font-size:18px;"';
                        style2 = 'style="margin-top:15px;font-size:16px;color:#733f98"';
                        style3 = 'style="margin-top:15px;font-size:16px;color:#d91b5b"';
                        $("#loadcontent").html('<div ' + style + '>Alamat <button type="button" class="close" data-dismiss="modal">&times;</button> </div><div ' + style3 + '>' + obj.msg + '</div>');
                        $("#modal-address").modal('hide');
                        $("#exampleModalCenter2").modal();

                        $('#listaddress').load("<?= URL ?>user/listaddress");
                        $('#frmaddaddress').trigger("reset");

                    });


                });

            });



        </script>


        <?php
        $url = count($data_alamat) == 0 ? URL . 'user/addaddress' : URL . 'user/updatedataaddress';
        ?>

        <form id="frmaddaddress" class="form-horizontal" action="<?= $url ?>" method="post">
            <input type="hidden" value="<?= $_seq ?>" id="seq" name="seq" />
            <div class="modal-body" >
                <div class="form-group">
                    <div class="row">
                        <label class="control-label col-lg-3 col-sm-3 cst-contorl-label" for="#name">Alamat sebagai</label>
                        <div class="col-sm-9 col-lg-9" >
                            <input value="<?= $_alias ?>" style="width: 100%;" type="text" maxlength="50" class="form-control cst-input" id="nameplace" placeholder="Alamat Sebagai ex. rumah"  name="nameplace">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row ">
                        <label class="control-label col-sm-3 col-lg-3">Nama Penerima</label> 
                        <div class="col-sm-9 col-lg-9">



                            <input value="<?= $_name ?>" type="text" maxlength="50" class="form-control" id="name" placeholder="Nama Penerima" name="name">
                        </div>
                    </div> 
                </div>
                <div class="form-group">
                    <div class="row">
                        <label class="control-label col-sm-3 col-lg-3">Nomor HP Penerima</label>
                        <div class="col-sm-9 col-sm-9">  
                            <input value="<?= $_hp ?>" number type="text" maxlength="20" class="form-control cst-input" id="hp" placeholder="Nomor HP Penerima" name="hp">
                        </div>
                    </div>   
                </div>
                <div class="form-group">
                    <div class="row">
                        <label class="control-label col-sm-3 col-lg-3">Alamat</label>
                        <div class="col-sm-9 col-lg-9">   
                            <textarea class="form-control" rows="5" id="address" name="address"><?= $_address ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label class="control-label col-sm-3 col-lg-3 cst-contorl-label">Propinsi</label>
                        <div class="col-sm-9 col-lg-9">
                            <select class="simplebox form-control" id="province" name="province">
                                <?php
                                //$listprovince = $this->listprovince;
                                foreach ($listprovince as $k => $v) {
                                    $selected = $_province == $v['_province'] ? "selected" : "";
                                    ?>
                                    <option <?= $selected ?> value="<?= $v['_province'] ?>"><?= $v['_province'] ?></option>
                                <?php } ?>
                            </select>                         
                        </div>  
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label class="control-label col-sm-3 cst-contorl-label">Kabupaten</label>
                        <div class="col-sm-9"> 
                            <select class="simplebox form-control" id="subprovince" name="subprovince">
                                <?php
                                //$listprovince = $this->listsubprovince;
                                foreach ($listsubprovince as $k => $v) {
                                    $selected = $_subprovince == $v['_subprovince'] ? "selected" : "";
                                    ?>
                                    <option <?= $selected ?> value="<?= $v['_subprovince'] ?>"><?= $v['_subprovince'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label class="control-label col-sm-3 cst-contorl-label">Kecamatan</label>
                        <div class="col-sm-9"> 
                            <select class="simplebox form-control" id="district" name="district">
                                <?php
                                foreach ($listdistrict as $k => $v) {
                                    $selected = $_district == $v['_district'] ? "selected" : "";
                                    ?>
                                    <option  <?= $selected ?> value="<?= $v['_district'] ?>"><?= $v['_district'] ?></option>
                                <?php } ?>

                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label class="control-label col-sm-3 cst-contorl-label">Keluarahan</label>
                        <div class="col-sm-9"> 
                            <select class="simplebox form-control" id="subdistrict" name="subdistrict">
                                <?php
                                foreach ($listsubdistrict as $k => $v) {
                                    $selected = $_subdistrict == $v['_subdistrict'] ? "selected" : "";
                                    ?>
                                    <option <?= $selected ?> value="<?= $v['_subdistrict'] ?>"><?= $v['_subdistrict'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label class="control-label col-sm-3 cst-contorl-label">Kode Pos</label>
                        <div class="col-sm-9"> 
                            <select class="simplebox form-control" id="zipcode" name="zipcode">
                                <?php
                                //$listprovince = $this->listzipcode;
                                foreach ($listzipcode as $k => $v) {
                                    $selected = $_zipcode == $v['_zipcode'] ? "selected" : "";
                                    ?>
                                    <option <?= $selected ?> value="<?= $v['_zipcode'] ?>"><?= $v['_zipcode'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer" style="text-align: left;">
                <button type="submit" class="btn btn-sinup">Tambahkan Alamat</button>
            </div>
        </form>
        <?php
    }

    function updatedataaddress() {
        glfn::_checklogin();


        $post['_user'] = isset($_COOKIE[COOKIE_USER]) ? $_COOKIE[COOKIE_USER] : '';
        $post['_email'] = isset($_COOKIE[COOKIE_USER]) ? $_COOKIE[COOKIE_USER] : '';
        $post['_password'] = isset($_COOKIE[COOKIE_PWD]) ? $_COOKIE[COOKIE_PWD] : '';
        //////glfn::_pre($_POST);




        $post['_alias'] = isset($_POST['nameplace']) ? $_POST['nameplace'] : '';
        $post['_name'] = isset($_POST['name']) ? $_POST['name'] : '';
        $post['_hp'] = isset($_POST['hp']) ? $_POST['hp'] : '';
        $post['_address'] = isset($_POST['address']) ? $_POST['address'] : '';
        $post['_province'] = isset($_POST['province']) ? $_POST['province'] : '';
        $post['_subprovince'] = isset($_POST['subprovince']) ? $_POST['subprovince'] : '';
        $post['_district'] = isset($_POST['district']) ? $_POST['district'] : '';
        $post['_subdistrict'] = isset($_POST['subdistrict']) ? $_POST['subdistrict'] : '';
        $post['_zipcode'] = isset($_POST['zipcode']) ? $_POST['zipcode'] : '';
        $post['_seq'] = isset($_POST['seq']) ? $_POST['seq'] : '';




        $update = glfn::_curl_api2('address/update', $post);
        echo json_encode($update);
    }

}
