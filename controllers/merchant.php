<?php

class merchant extends controller {


    function __construct() {
        $this->db = new database(DB_TYPE,DB_HOST,DB_NAME,DB_PORT,DB_USER,DB_PASS);
        parent::__construct();
    }

    function index() {
        glfn::_checklogin();
        $this->view->css = glfn::_css();
        $this->view->js = glfn::_js();

        $data_supplier = $this->db->_select('select * from ms_supplier where _email = :email',array('email' => $_COOKIE[COOKIE_USER]));
        //glfn::_pre($count_supplier);
        $this->view->supplier = $data_supplier;
        $this->view->render('merchant/index');
    }
    
    function address() {
        glfn::_checklogin();
        $this->view->css = glfn::_css();
        $this->view->js = glfn::_js();


        $data_province = $this->db->_select('select _province from ms_zipcode group by _province',array());
        $data_supplier = $this->db->_select('select * from ms_supplier where _email = :email',array('email' => $_COOKIE[COOKIE_USER]));
        //glfn::_pre($count_supplier);
        $this->view->supplier = $data_supplier;
        $this->view->province = $data_province;
        $this->view->render('merchant/address');
    }
    
    
    function rekening() {
        glfn::_checklogin();
        $this->view->css = glfn::_css();
        $this->view->js = glfn::_js();

        $data_bank = $this->db->_select('select * from ms_bank',array());
        $data_supplier = $this->db->_select('select * from ms_supplier where _email = :email',array('email' => $_COOKIE[COOKIE_USER]));
        //glfn::_pre($count_supplier);
        $this->view->supplier = $data_supplier;
        $this->view->bank = $data_bank;
        $this->view->render('merchant/rekening');
    }

    function simpandata() {
        glfn::_checklogin();
        $user_email = isset($_COOKIE[COOKIE_USER]) ? $_COOKIE[COOKIE_USER] : '';

        $nama_toko = isset($_POST['name_toko']) ? $_POST['name_toko'] : '';
        $no_hp = isset($_POST['no_hp']) ? $_POST['no_hp'] : '';

        $_code = date("Ymdhisa");

        $picture_supplier = "logo_".md5($user_email);
        $picture_banner = "banner_".md5($user_email);
        $fileInput = isset($_FILES['fileInput']) ? $_FILES['fileInput'] : '';

        if ($fileInput != "") {
            
            $target_file = 'public/image/merchant';
            if (file_exists($target_file)) {
                
                $newupload = $target_file . '/' . $picture_supplier . '.jpg';


                move_uploaded_file($fileInput['tmp_name'], $newupload);
            }
        }

        $fileBanner = isset($_FILES['fileBanner']) ? $_FILES['fileBanner'] : '';

        if ($fileBanner != "") {
            
            $target_file_banner = 'public/image/merchant';
            if (file_exists($target_file_banner)) {
                
                $newuploadbanner = $target_file . '/' . $picture_banner . '.jpg';


                move_uploaded_file($fileBanner['tmp_name'], $newuploadbanner);
            }
        }

        $data_supplier = $this->db->_select('select * from ms_supplier where _email = :email',array('email' => $user_email));
        if ($this->db->_rr == 0) {
            $head_table = 'ms_supplier';
            $head_data = array(
                '_code' => $_code,
                '_email' => $user_email,
                '_name' => $nama_toko,
                '_nohp' => $no_hp,
                '_image' => $picture_supplier.'.jpg',
                '_image_banner' => $picture_banner.'.jpg',
                '_createdate' => date("Y-m-d h:i:sa")
            );

            $this->db->_insert($head_table, $head_data);

            setcookie(COOKIE_TOKO, 1, time() + 9999999, '/');
        }else{
            $table = 'ms_supplier';

            $update_data = array(
                '_name' => $nama_toko,
                '_nohp' => $no_hp,
                '_image' => $picture_supplier.'.jpg',
                '_image_banner' => $picture_banner.'.jpg'
            );

            $update_cond = array(
                '_code' => $data_supplier[0]['_code'],
                '_email' => $user_email
            );

            $this->db->_update($table, $update_data, $update_cond);
        }

        $return['sts'] = 1;
        $return['msg'] = 'Berhasil menyimpan data';
        $return['token'] = '';

        echo json_encode($return);
    }

    function simpanrekening() {
        glfn::_checklogin();
        $user_email = isset($_COOKIE[COOKIE_USER]) ? $_COOKIE[COOKIE_USER] : '';

        $nama_akun = isset($_POST['nama_akun']) ? $_POST['nama_akun'] : '';
        $no_rek = isset($_POST['no_rek']) ? $_POST['no_rek'] : '';
        $nama_bank = isset($_POST['nama_bank']) ? $_POST['nama_bank'] : '';
        $cabang = isset($_POST['cabang']) ? $_POST['cabang'] : '';

        $_code = date("Ymdhisa");

        $data_supplier = $this->db->_select('select * from ms_supplier where _email = :email',array('email' => $user_email));
        if ($this->db->_rr == 0) {
            $head_table = 'ms_supplier';
            $head_data = array(
                '_code' => $_code,
                '_email' => $user_email,
                '_bank_account_name' => $nama_akun,
                '_bank_account' => $no_rek,
                '_bank_name' => $nama_bank,
                '_bank_branch' => $cabang,
                '_createdate' => date("Y-m-d h:i:sa")
            );

            $this->db->_insert($head_table, $head_data);

            setcookie(COOKIE_TOKO, 1, time() + 9999999, '/');
        }else{
            $table = 'ms_supplier';

            $update_data = array(
                '_bank_account_name' => $nama_akun,
                '_bank_account' => $no_rek,
                '_bank_name' => $nama_bank,
                '_bank_branch' => $cabang
            );

            $update_cond = array(
                '_code' => $data_supplier[0]['_code'],
                '_email' => $user_email
            );

            $this->db->_update($table, $update_data, $update_cond);
        }

        $return['sts'] = 1;
        $return['msg'] = 'Berhasil menyimpan data';
        $return['token'] = '';

        echo json_encode($return);
    }

    function simpanaddress() {
        glfn::_checklogin();
        $user_email = isset($_COOKIE[COOKIE_USER]) ? $_COOKIE[COOKIE_USER] : '';

        $alamat = isset($_POST['alamat']) ? $_POST['alamat'] : '';
        $provinsi = isset($_POST['provinsi']) ? $_POST['provinsi'] : '';
        $kota = isset($_POST['kota']) ? $_POST['kota'] : '';
        $kecamatan = isset($_POST['kecamatan']) ? $_POST['kecamatan'] : '';
        $kelurahan = isset($_POST['kelurahan']) ? $_POST['kelurahan'] : '';

        $_code = date("Ymdhisa");

        $data_supplier = $this->db->_select('select * from ms_supplier where _email = :email',array('email' => $user_email));
        if ($this->db->_rr == 0) {
            $head_table = 'ms_supplier';
            $head_data = array(
                '_code' => $_code,
                '_email' => $user_email,
                '_address' => $alamat,
                '_province' => $provinsi,
                '_subprovince' => $kota,
                '_district' => $kecamatan,
                '_subdistrict' => $kelurahan,
                '_createdate' => date("Y-m-d h:i:sa")
            );

            $this->db->_insert($head_table, $head_data);

            setcookie(COOKIE_TOKO, 1, time() + 9999999, '/');
        }else{
            $table = 'ms_supplier';

            $update_data = array(
                '_address' => $alamat,
                '_province' => $provinsi,
                '_subprovince' => $kota,
                '_district' => $kecamatan,
                '_subdistrict' => $kelurahan,
            );

            $update_cond = array(
                '_code' => $data_supplier[0]['_code'],
                '_email' => $user_email
            );

            $this->db->_update($table, $update_data, $update_cond);
        }

        $return['sts'] = 1;
        $return['msg'] = 'Berhasil menyimpan data';
        $return['token'] = '';

        echo json_encode($return);
    }

    function getKota() {
        glfn::_checklogin();
        $this->view->css = glfn::_css();
        $this->view->js = glfn::_js();

        $propinsi = isset($_POST['propinsi']) ? $_POST['propinsi'] : '';
        $kota = isset($_POST['kota']) ? $_POST['kota'] : '';

        $data_kota = $this->db->_select('select _subprovince from ms_zipcode where _province = :province group by _subprovince',array('province' => $propinsi));

        echo '<select name="kota" id="kota" class="form-control cst-input" onchange="listKec(this.value);">';
            echo '<option value="">-- Pilih Kota --</option>';
        foreach ($data_kota as $key => $value) {
            if($value['_subprovince'] == $kota)
            {
                echo '<option value="'.$value['_subprovince'].'" selected>'.$value['_subprovince'].'</option>';
            }else{
                echo '<option value="'.$value['_subprovince'].'">'.$value['_subprovince'].'</option>';
            }
        }
        echo '</select>';
    }

    function getKec() {
        glfn::_checklogin();
        $this->view->css = glfn::_css();
        $this->view->js = glfn::_js();

        $kota = isset($_POST['kota']) ? $_POST['kota'] : '';
        $kec = isset($_POST['kec']) ? $_POST['kec'] : '';

        $data_kec = $this->db->_select('select _district from ms_zipcode where _subprovince = :sub group by _district',array('sub' => $kota));

        echo '<select name="kecamatan" id="kecamatan" class="form-control cst-input" onchange="listKel(this.value);">';
            echo '<option value="">-- Pilih Kecamatan --</option>';
        foreach ($data_kec as $key => $value) {
            if($value['_district'] == $kec)
            {
                echo '<option value="'.$value['_district'].'" selected>'.$value['_district'].'</option>';
            }else{
                echo '<option value="'.$value['_district'].'">'.$value['_district'].'</option>';
            }
        }
        echo '</select>';
    }

    function getKel() {
        glfn::_checklogin();
        $this->view->css = glfn::_css();
        $this->view->js = glfn::_js();

        $kec = isset($_POST['kec']) ? $_POST['kec'] : '';
        $kel = isset($_POST['kel']) ? $_POST['kel'] : '';

        $data_kel = $this->db->_select('select _subdistrict from ms_zipcode where _district = :district group by _subdistrict',array('district' => $kec));

        echo '<select name="kelurahan" id="kelurahan" class="form-control cst-input">';
            echo '<option value="">-- Pilih Kelurahan --</option>';
        foreach ($data_kel as $key => $value) {
            if($value['_subdistrict'] == $kel)
            {
                echo '<option value="'.$value['_subdistrict'].'" selected>'.$value['_subdistrict'].'</option>';
            }else{
                echo '<option value="'.$value['_subdistrict'].'">'.$value['_subdistrict'].'</option>';
            }
        }
        echo '</select>';
    }
}