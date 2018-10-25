<?php

class category extends controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
         $this->view->css = glfn::_css();
        $this->view->js = glfn::_js();

   
        $this->view->render('category/index');
    }

    function listdata() {
        glfn::_xml_http_request();
        $req['_code'] = isset($_POST['_code']) && $_POST['_code'] !== "" ? '' . $_POST['_code'] . '' : '';
        $category_list = $this->model->listdata($req);
        echo json_encode($category_list);
    }
    
     function listdatadetail() {
        glfn::_xml_http_request();
        
        $category_list = $this->model->listdatadetail(array());
        echo json_encode($category_list);
    }

}
?>
