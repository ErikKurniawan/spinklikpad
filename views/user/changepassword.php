

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
</style>

<script>

// Shorthand for $( document ).ready()
    $(function () {
        $('#frmchangepassword').bootstrapValidator({
            framework: 'bootstrap',
            Icons: {valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'},
            fields: {
                oldpwd: {validators: {
                        notEmpty: {
                            message: 'Password lama harus diisi'}}},
                newpwd: {validators: {
                        notEmpty: {
                            message: 'Password baru harus diisi'}}},
                passwordcon: {validators: {
                        notEmpty: {
                            message: 'Konfirmasi password baru harus diisi'},
                        identical: {
                            field: 'newpwd',
                            message: 'Password harus sama dengan Konfirmasi Password'}}}}})
                .on('error.form.bv', function (e) {

                }).on('success.form.bv', function (e) {
            e.preventDefault();
            var $form = $(e.target);




            $.post($form.attr('action'), $form.serialize()).done(function (rjson) {




                $("#loadcontent").html(rjson);

                $("#exampleModalCenter").modal();


            });


        });
    });

</script>


<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"data-keyboard="false" >
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div  class="modal-content " >


            <div id="loadcontent" class="modal-body popup-modal">

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
                        <a class="nav-link" id="pills-profile-tab" href="<?= URL ?>user/address">Daftar Alamat</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-contact-tab" href="<?= URL ?>user/changepassword" >Ganti Sandi</a>
                    </li>
                </ul>

                <div class="row">
                    <div class="col-12">


                        <form id="frmchangepassword" class="form-horizontal" action="<?= URL ?>user/updatepassword" method="post">
                            <div class="form-group row">
                                <label class="control-label col-sm-3 col-lg-3 cst-contorl-label" for="oldpwd">Password Lama</label>
                                <div class="col-sm-9 col-lg-9"> 
                                    <input type="password" class="form-control cst-input" id="oldpwd" placeholder="Password Lama"  name="oldpwd">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-sm-3 col-lg-3 cst-contorl-label" for="newpwd">Password Baru</label>
                                <div class="col-sm-9 col-lg-9"> 
                                    <input type="password" class="form-control cst-input" id="newpwd" placeholder="Password Baru" name="newpwd">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-sm-3 col-lg-3 cst-contorl-label" for="passwordcon">Konfirmasi Password Baru</label>
                                <div class="col-sm-9 col-lg-9"> 
                                    <input type="password" class="form-control cst-input" id="passwordcon" placeholder="Konfirmasi Password Baru" name="passwordcon">
                                </div>
                            </div>


                            <button type="submit" class="float-right btn btn-sinup">Submit</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>





