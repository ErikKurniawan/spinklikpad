

<style>
    .btn-profile-change
    {
        background: #d91b5b;
        font-size:10px;
        color: #fff !important;

    }
    .btn-profile-change i
    {
        background: #d91b5b;
        color: #fff;

    }
    .profile-name
    {
        padding:10px 0px;
        font-weight: bold;
        font-size:16px;
        color: #733f98 ;
    }


    .profile-data
    {
        padding:5px 0px;
        border-bottom:1px solid #e2e7e9;
        font-size: 14px;
    }
    .profile-data i
    {
        color :#95999A;
    }

    .profile-data span
    {
        padding-left:10px;
        color:#6a6c6c;
    }

    .profile-data:last-child
    {
        border-bottom:none;
    }

    .profile-title
    {
        color:#733f98;
        font-size:14px;
        border-bottom: 1px solid #e2e7e9;
        padding: 5px 0px;
    }

    .profile-fav-supplier img
    {
        border:1px solid #95999A;
        width: 70px;
        height: 70px;
    }

    .profile-container-supplier-icon
    {
        display: inline-block;
    }

    .profile-container-supplier-icon div
    {
        font-size: 12px;
        color:#d91b5b;
        text-align: center;
        white-space: nowrap; 
        width: 70px; 
        overflow: hidden;
        text-overflow: ellipsis; 
    }

    input[type="file"] {
        display: none;
    }
    .custom-file-upload {
        border: 1px solid #ccc;
        width: 100%;
        line-height: 30px;
        height: 30px;
        text-align: center;
        cursor: pointer;
    }
    img
    {
        width: 100%;
    }

    .profile-address
    {
        font-size: 14px;
    }


    .sps {
        padding: 1em .5em;
        position: fixed;
        top: 0;
        left: 0;
        transition: all 0.25s ease;
        width: 100%;
    }

    .sps--abv {
        background-color: transparent;
        color: #000;
    }

    .sps--blw {

        color: #fff;
    }



    .left-menu ul li
    {
        padding:5px 0px;


    }

    .left-menu ul li,.left-menu ul li a
    {
        text-decoration: none;
        font-size: 12px;
        padding:0px !important;
        color:#94989b;
    }
    .left-menu .title-accordion
    {
        font-size: 14px;
        font-weight: bold;
        color:#733f98;
    }
    .left-menu .title-accordion:after
    {
        font-family: "Font Awesome 5 Free";
        font-weight: 900; 
        content: "\f0d8";
        float: right;
    }




    .left-menu ul li a
    {
        line-height: 30px;
    }

    .left-menu ul li a:active,.left-menu ul li a:hover
    {
        color: #733f98;
    }




    .panel-heading  a:before {
        font-family: "Font Awesome 5 Free";
        font-weight: 900; 
        content: "\f0d8";
        float: right;
        transition: all 0.5s;
    }
    .panel-heading.active a:before {
        -webkit-transform: rotate(180deg);
        -moz-transform: rotate(180deg);
        transform: rotate(180deg);
    } 
</style>




<script>
    $(document).ready(function () {

        $('body').on('change', '#province', function () {
            listsubprovince();
        });

        $('body').on('change', '#subprovince', function () {
            listdistrict();
        });

        $('body').on('change', '#district', function () {
            listsubdistrict();
        });


        $('body').on('change', '#subdistrict', function () {
            listzipcode();
        });

        $('.btn-address').click(function () {
            $.post('<?php echo URL; ?>user/formaddress', {'_seq': 'asda'}, function (a) {
                $('#returnaddress').html(a);
            });
            $('#modal-address').modal('show');
            return false;
        });
        $('body').on('click', '.btn-addr-edit', function () {

            $.post('<?php echo URL; ?>user/formaddress', {'_seq': $(this).attr('data')}, function (a) {
                $('#returnaddress').html(a);
            });
            $('#modal-address').modal('show');
            return false;
        });


        $('body').on('click', '.btn-addr-del', function () {
            $.post('<?php echo URL; ?>user/deleteaddress', {'_seq': $(this).attr('data')}, function (a) {
                $('#listaddress').load("<?= URL ?>user/listaddress");
            });
            return false;
        });
    });

    function listsubprovince()
    {
        $.post('<?php echo URL; ?>user/zipcode', {'_code': $('#province').val(), '_link': 'zipcode/listsubprovince', '_save': ''}, function (a) {
            $('#subprovince').html(a);
            listdistrict();
        });
    }

    function listdistrict()
    {
        $.post('<?php echo URL; ?>user/zipcode', {'_code': $('#subprovince').val(), '_link': 'zipcode/listdistrict', '_save': ''}, function (a) {
            $('#district').html(a);
            listsubdistrict();
        });

    }
    function listsubdistrict()
    {
        $.post('<?php echo URL; ?>user/zipcode', {'_code': $('#district').val(), '_link': 'zipcode/listsubdistrict', '_save': ''}, function (a) {
            $('#subdistrict').html(a);
            listzipcode();
        });

    }
    function listzipcode()
    {
        $.post('<?php echo URL; ?>user/zipcode', {'_code': $('#subdistrict').val(), '_link': 'zipcode/listzipcode', '_save': ''}, function (a) {
            $('#zipcode').html(a);
        });
    }
</script>


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

<div  id="exampleModalCenter2" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">   
        <div class="modal-content" id="r_data">   

            <div id="loadcontent" class="modal-body popup-modal">
            </div>
        </div>
    </div>
</div>


<div id="modal-address"  class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">   
        <div class="modal-content" id="r_data">
            <div class="modal-header"> 
                <div class="">Tambah Alamat Baru</div>   
                <button type="button" style="border:0px !important;" class="close" data-dismiss="modal">&times;</button>   

            </div>
            <div id="returnaddress" >

            </div> 
        </div> 

    </div>  
</div>



<div class="container-fluid section content">
    <div class="row">
        <div class="col-2" >
            <?php
            require 'left-menu.php';
            ?>
        </div>

        <div class="col-10">



            <div style="border:1px solid #e2e7e9;padding:10px;">

                <ul style="border-bottom:1px solid #e2e7e9;" class="nav nav-pills mb-3 i-tab" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link" id="pills-home-tab" href="<?= URL ?>user/profile">Biodata</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-profile-tab" href="<?= URL ?>user/address">Daftar Alamat</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " id="pills-contact-tab" href="<?= URL ?>user/changepassword" >Ganti Sandi</a>
                    </li>
                </ul>


                <div class="row">
                    <div class="col-4 " >
                        <a href="#" class="btn btn-sinin btn-address" role="button">
                            <i class="fa fa-plus" ></i>
                            Tambah Alamat
                        </a>
                    </div>
                </div>


                <div class="row">
                    <div class="col " >
                        <div style="padding:0px 15px;" class="profile-address">
                            <div style="border-bottom:1px solid #d2d2d2;padding:10px 0px;margin-bottom:10px;">
                                <div style="display: table-cell;width:200px;border:0px solid red;">Penerima</div>
                                <div style="display: table-cell;width:300px;border:0px solid red;">Alamat</div>
                                <div style="display: table-cell;width:250px;border:0px solid red;">Daerah Pengirim</div>
                                <div style="display: table-cell;border:0px solid red;"></div>
                            </div>
                            <div id="listaddress">
                            </div>

                        </div>

                        <style>
                            .btn-addr-edit
                            {
                                border:1px solid #733f98;
                                color:#733f98;
                            }
                            .btn-addr-edit:hover
                            {
                                background: #733f98;
                                border:1px solid #733f98;
                                color:#fff;
                            }

                            .btn-addr-del
                            {
                                border:1px solid #d91b5b;
                                color:#d91b5b;
                            }
                            .btn-addr-del:hover
                            {
                                background: #d91b5b;
                                border:1px solid #d91b5b;
                                color:#fff;
                            }


                        </style>

                    </div>
                </div>
            </div>


        </div>

    </div>
</div>





