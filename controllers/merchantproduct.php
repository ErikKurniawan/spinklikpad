<?php

class merchantproduct extends controller {


    function __construct() {
        $this->db = new database(DB_TYPE,DB_HOST,DB_NAME,DB_PORT,DB_USER,DB_PASS);
        parent::__construct();
    }

    function index() {
        glfn::_checklogin();
        $this->view->css = glfn::_css();
        $this->view->js = glfn::_js(array(VENDOR_PATH.'tinymce/tinymce.js'));

        $data_supplier = $this->db->_select('select * from ms_supplier where _email = :email',array('email' => $_COOKIE[COOKIE_USER]));

        $data_kategori = $this->db->_select('select * from ms_category_detail',array());
        $data_province = $this->db->_select('select _province from ms_zipcode group by _province',array());
        //glfn::_pre($count_supplier);
        $this->view->province = $data_province;
        $this->view->kategori = $data_kategori;
        $this->view->render('merchantproduct/index');
        //$this->view->render('merchantproduct/index');
    }

    function daftarproduct() {
        glfn::_checklogin();
        $this->view->css = glfn::_css();
        $this->view->js = glfn::_js();

        $data_supplier = $this->db->_select('select * from ms_supplier where _email = :email',array('email' => $_COOKIE[COOKIE_USER]));
        //glfn::_pre($count_supplier);
        
        $data_product = $this->db->_select('select * from ms_product where _supplier = :sup',array('sup' => $data_supplier[0]['_code']));

        $this->view->product = $data_product;
        $this->view->render('merchantproduct/daftarproduct');
    }

    function detail($code = 0) {
        $this->view->css = glfn::_css();
        $this->view->js = glfn::_js();


        if (!$code) {
            glfn::_redirect('error');
            exit();
        }

        $post['_user'] = isset($_COOKIE[COOKIE_USER]) ? $_COOKIE[COOKIE_USER] : '';
        $post['_password'] = isset($_COOKIE[COOKIE_PWD]) ? $_COOKIE[COOKIE_PWD] : '';
        $post['_code'] = $code;

        $data_supplier = $this->db->_select('select * from ms_supplier where _email = :email',array('email' => $_COOKIE[COOKIE_USER]));

        $data_product = $this->db->_select('select b._name as _name_distributor, a._createdate as _createdate, b._code as _distributor, a._picture as _picture, a._name as _name, a._code as _code, a._weight as _weight, a._content as _content, a._spesifikasi as _spesifikasi, a._min_order as _min_order from ms_product_distributor a join ms_distributor b on a._distributor = b._code where a._code = :code',array('code' => $post['_code']));

        $data_photos = $this->db->_select('select * from ms_product_distributor_photo where _code = :code',array('code' => $post['_code']));

        $data_distributor = $this->db->_select('select * from ms_distributor where _code = :code',array('code' => $data_product[0]['_distributor']));

        $data_transaction = $this->db->_select('select * from tr_transaction_distributor where _distributor = :distributor and _supplier = :supplier order by _crdt DESC limit 1',array('distributor' => $data_product[0]['_distributor'], 'supplier' => $data_supplier[0]['_code']));

        $this->view->proddtl = $data_product;
        $this->view->photos = $data_photos;
        $this->view->distributor = $data_distributor;
        $this->view->trans1 = $data_transaction;
        $this->view->render('merchantproduct/detail');
    }

    function simpanproduct() {
        glfn::_checklogin();

        glfn::_pre($_POST);


        $user_email = isset($_COOKIE[COOKIE_USER]) ? $_COOKIE[COOKIE_USER] : '';

        $varip = $_SERVER['REMOTE_ADDR'];
        $varip = str_replace(".","",$varip);
        $vartstamp = date("Ymdhis");
        $_rand_1 = rand();
        $_rand_2 = rand();
        $varsurveyid = ($vartstamp + $varip) + ($_rand_1 + $_rand_2);
        $productid=self::funcCreateID($varsurveyid);

        $nama_produk = isset($_POST['nama_product']) ? $_POST['nama_product'] : '';
        $kategori = isset($_POST['kategori']) ? $_POST['kategori'] : '';
        $level_pemasaran = isset($_POST['level_pemasaran']) ? $_POST['level_pemasaran'] : '';
        $harga_bos = isset($_POST['harga_bos']) ? $_POST['harga_bos'] : '';
        $harga_bos = str_replace(',', '', $harga_bos);
        $harga_publik = isset($_POST['harga_publik']) ? $_POST['harga_publik'] : '';
        $harga_publik = str_replace(',', '', $harga_publik);
        $ppn = isset($_POST['ppn']) ? $_POST['ppn'] : '';
        $diskon = isset($_POST['diskon']) ? $_POST['diskon'] : '';
        $berat = isset($_POST['berat']) ? $_POST['berat'] : '';
        $description = isset($_POST['description']) ? $_POST['description'] : '';

        $_code = date("Ymdhisa");

        for($x=1;$x<6;$x++)
        {
            $picture_product1 = md5($nama_produk.$x);
            $fileInput1 = isset($_FILES['fileInput'.$x]) ? $_FILES['fileInput'.$x] : '';

            if ($fileInput1['name'] != "") {
                //print_r($fileInput1)."<br/>";
                $target_file1 = 'public/image/product';
                if (file_exists($target_file1)) {
                    //echo "masuk sini"."<br/>";
                    $newupload1 = $target_file1 . '/' . $picture_product1 . '.jpg';


                    move_uploaded_file($fileInput1['tmp_name'], $newupload1);
                }

                $head_table = 'ms_product_photo_detail';
                $head_data = array(
                    '_code' => $productid,
                    '_seq' => $productid.$x,
                    '_name' => $picture_product1.'.jpg',
                    '_picture' => ''
                );

                $this->db->_insert($head_table, $head_data);
            }
        }

        $picture_product = md5($nama_produk);
        $fileInput = isset($_FILES['fileInput']) ? $_FILES['fileInput'] : '';

        if ($fileInput != "") {
            
            $target_file = 'public/image/product';
            if (file_exists($target_file)) {
                
                $newupload = $target_file . '/' . $picture_product . '.jpg';


                move_uploaded_file($fileInput['tmp_name'], $newupload);
            }
        }

        $data_supplier = $this->db->_select('select * from ms_supplier where _email = :email',array('email' => $user_email));

        $data_product = $this->db->_select('select * from ms_product where _name = :name',array('name' => $nama_produk));
        if ($this->db->_rr == 0) {
            $head_table = 'ms_product';
            $head_data = array(
                '_code' => $productid,
                '_name' => $nama_produk,
                '_price' => $harga_publik,
                '_price_bos' => $harga_bos,
                '_weight' => $berat,
                '_ppn' => $ppn,
                '_supplier' => $data_supplier[0]['_code'],
                '_discount' => $diskon,
                '_category_detail' => $kategori,
                '_status' => 'publish',
                '_content' => $description,
                '_picture' => $picture_product.'.jpg',
                '_status_product' => $level_pemasaran,
                '_createdate' => date("Y-m-d h:i:sa")
            );

            $this->db->_insert($head_table, $head_data);

            $return['sts'] = 1;
            $return['msg'] = 'Berhasil !!';
            $return['token'] = '';
        }else{
            $return['sts'] = 2;
            $return['msg'] = 'Nama Produk Sudah di Gunakan !!';
            $return['token'] = '';
        }

        echo json_encode($return);
        glfn::_redirect('merchantproduct');
    }

    function simpanproductdistributor() {
        glfn::_checklogin();

        glfn::_pre($_POST);


        $user_email = isset($_COOKIE[COOKIE_USER]) ? $_COOKIE[COOKIE_USER] : '';

        $varip = $_SERVER['REMOTE_ADDR'];
        $varip = str_replace(".","",$varip);
        $vartstamp = date("Ymdhis");
        $_rand_1 = rand();
        $_rand_2 = rand();
        $varsurveyid = ($vartstamp + $varip) + ($_rand_1 + $_rand_2);
        $productid=self::funcCreateID($varsurveyid);

        $nama_produk = isset($_POST['nama_product']) ? $_POST['nama_product'] : '';
        $kategori = isset($_POST['kategori']) ? $_POST['kategori'] : '';
        $propinsi = isset($_POST['propinsi']) ? $_POST['propinsi'] : '';
        $harga_satuan = isset($_POST['harga_satuan']) ? $_POST['harga_satuan'] : '';
        $harga_satuan = str_replace(',', '', $harga_satuan);
        $min_pemesanan = isset($_POST['min_pemesanan']) ? $_POST['min_pemesanan'] : '';
        $min_pemesanan = str_replace(',', '', $min_pemesanan);
        $ppn = isset($_POST['ppn']) ? $_POST['ppn'] : '';
        $diskon = isset($_POST['diskon']) ? $_POST['diskon'] : '';
        $berat = isset($_POST['berat']) ? $_POST['berat'] : '';
        $description = isset($_POST['description']) ? $_POST['description'] : '';

        $_code = date("Ymdhisa");

        for($x=1;$x<6;$x++)
        {
            $picture_product1 = md5($nama_produk.$x);
            $fileInput1 = isset($_FILES['fileInput'.$x]) ? $_FILES['fileInput'.$x] : '';

            if ($fileInput1['name'] != "") {
                //print_r($fileInput1)."<br/>";
                $target_file1 = 'public/image/product';
                if (file_exists($target_file1)) {
                    //echo "masuk sini"."<br/>";
                    $newupload1 = $target_file1 . '/' . $picture_product1 . '.jpg';


                    move_uploaded_file($fileInput1['tmp_name'], $newupload1);
                }

                $head_table = 'ms_product_photo_detail';
                $head_data = array(
                    '_code' => $productid,
                    '_seq' => $productid.$x,
                    '_name' => $picture_product1.'.jpg',
                    '_picture' => ''
                );

                $this->db->_insert($head_table, $head_data);
            }
        }

        $picture_product = md5($nama_produk);
        $fileInput = isset($_FILES['fileInput']) ? $_FILES['fileInput'] : '';

        if ($fileInput != "") {
            
            $target_file = 'public/image/product';
            if (file_exists($target_file)) {
                
                $newupload = $target_file . '/' . $picture_product . '.jpg';


                move_uploaded_file($fileInput['tmp_name'], $newupload);
            }
        }

        $data_supplier = $this->db->_select('select * from ms_supplier where _email = :email',array('email' => $user_email));

        $data_product = $this->db->_select('select * from ms_product where _name = :name',array('name' => $nama_produk));
        if ($this->db->_rr == 0) {
            $head_table = 'ms_product';
            $head_data = array(
                '_code' => $productid,
                '_name' => $nama_produk,
                '_price' => $harga_satuan,
                '_weight' => $berat,
                '_ppn' => $ppn,
                '_level' => $data_supplier[0]['_level'],
                '_min_order' => $min_pemesanan,
                '_province' => $propinsi,
                '_supplier' => $data_supplier[0]['_code'],
                '_discount' => $diskon,
                '_category_detail' => $kategori,
                '_status' => 'publish',
                '_content' => $description,
                '_picture' => $picture_product.'.jpg',
                '_createdate' => date("Y-m-d h:i:sa")
            );

            $this->db->_insert($head_table, $head_data);

            $return['sts'] = 1;
            $return['msg'] = 'Berhasil !!';
            $return['token'] = '';
        }else{
            $return['sts'] = 2;
            $return['msg'] = 'Nama Produk Sudah di Gunakan !!';
            $return['token'] = '';
        }

        echo json_encode($return);
        glfn::_redirect('merchantproduct');
    }

    function publishunpublish() {
        glfn::_checklogin();

        glfn::_pre($_POST);


        $theid = isset($_POST['theid']) ? $_POST['theid'] : '';

        $data_product = $this->db->_select('select * from ms_product where _code = :code',array('code' => $theid));
        if ($this->db->_rr == 0) {

            $return['sts'] = 2;
            $return['msg'] = 'Gagal Update Publish/Unpublish';
            $return['token'] = '';

        }else{

            $_status = 'publish';
            if($data_product[0]['_status'] == 'publish')
            {
                $_status = 'unpublish';
            }

            $table = 'ms_product';

            $update_data = array(
                '_status' => $_status
            );

            $update_cond = array(
                '_code' => $theid
            );

            $this->db->_update($table, $update_data, $update_cond);

            $return['sts'] = 1;
            $return['msg'] = 'Berhasil Update Publish/Unpublish';
            $return['token'] = '';
        }

        echo json_encode($return);
        glfn::_redirect('merchantproduct/daftarproduct');
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