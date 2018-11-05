<?php
    $supplier = $this->supplier;

    $nama_toko = isset($supplier[0]['_name']) ? $supplier[0]['_name'] : '';
    $no_hp = isset($supplier[0]['_nohp']) ? $supplier[0]['_nohp'] : '';
?>

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

    .span-field
    {
        padding-left: 30px;
    }

</style>

<script>
    function readURL(input, type_image) {

        if (input.files && input.files[0]) {
            var _validFileExtensions = ["jpg", "jpeg", "bmp", "gif", "png"];
            split = input.value.split('.');



            var blnValid = false;
            var sFileName = input.value;
            if (sFileName.length > 0) {
                for (var j = 0; j < _validFileExtensions.length; j++) {
                    var sCurExtension = _validFileExtensions[j];
                    if (split[split.length - 1] == sCurExtension) {
                        blnValid = true;
                        break;
                    }
                }
            }

            if (!blnValid) {
                alert("Sorry, " + sFileName + " is invalid, allowed extensions are: " + _validFileExtensions.join(", "));
                return false;
            } else
            {

                var reader = new FileReader();

                reader.onload = function (e) {
                    if(type_image == 0)
                    {
                        $('#blah').attr('src', e.target.result);
                    }else{
                        $('#blah_banner').attr('src', e.target.result);
                    }
                }

                reader.readAsDataURL(input.files[0]);
            }



        }
    }
// Shorthand for $( document ).ready()
    $(function () {
        $("#fileInput").change(function () {
            readURL(this, 0);
        });

        $("#fileBanner").change(function () {
            readURL(this, 1);
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
            require __DIR__.'/../user/left-menu.php';
            ?>
        </div>

        <div class="col-10">

            <div style="border:1px solid #e2e7e9;padding:10px;">

                <ul style="border-bottom:1px solid #e2e7e9;" class="nav nav-pills mb-3 i-tab" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-home-tab" href="<?= URL ?>merchant/index">Informasi Toko</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-profile-tab" href="<?= URL ?>merchant/address">Alamat</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " id="pills-contact-tab" href="<?= URL ?>merchant/rekening" >Rekening</a>
                    </li>
                </ul>


                <script>
                    $(function () {
                        $('#frminfotoko').bootstrapValidator({
                            framework: 'bootstrap', Icons: {
                                valid: 'glyphicon glyphicon-ok',
                                invalid: 'glyphicon glyphicon-remove',
                                validating: 'glyphicon glyphicon-refresh'},

                            fields: {

                                name_toko: {validators: {
                                        notEmpty: {
                                            message: 'Nama Toko harus diisi'}}},
                                no_hp: {validators: {
                                        notEmpty: {
                                            message: 'No Handphone harus diisi'}}}
                            }
                        }).on('error.form.bv', function (e) {
                            e.preventDefault();
                            $('#formID').submit(false);

                        }).on('success.form.bv', function (e) {
                            e.preventDefault();
                            var $form = $(e.target);

                            $.ajax({
                                url: $form.attr('action'),
                                type: "POST",
                                data: new FormData(this),
                                contentType: false,
                                processData: false,
                                success: function (data)
                                {
                                    //alert(data);
                                    var obj = JSON.parse(data);



                                    style = 'style="border-bottom:1px dotted #d2d2d2;font-size:18px;"';
                                    style2 = 'style="margin-top:15px;font-size:16px;color:#733f98"';
                                    style3 = 'style="margin-top:15px;font-size:16px;color:#d91b5b"';
                                    if (obj.sts === 1) {
                                        $("#loadcontent").html('<div ' + style + '>Perbaharui Data</div><div ' + style3 + '>Data Berhasil Diperbaharui</div>');

                                    } else
                                    {
                                        $("#loadcontent").html('<div ' + style + '>Perbaharui Data</div><div ' + style3 + '>Tidak ada Data Yang di update</div>');
                                    }
                                    $("#exampleModalCenter").modal();
                                },
                                error: function ()
                                {
                                }
                            });
                        });
                    });



                </script>


                <form id="frminfotoko" action="<?= URL ?>merchant/simpandata" method="post" enctype="multipart/form-data">


                    <div class="row">
                        <div class="col-3 span-field">
                            <b>Informasi Toko</b>
                        </div>

                        <div class="col-9">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-3 span-field">
                            Nama Toko
                        </div>

                        <div class="col-9 form-group">
                            <input type="text" class="form-control cst-input" id="name_toko" placeholder="Nama Toko"  name="name_toko" value="<?= $nama_toko ?>">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-3 span-field">
                            No Handphone
                        </div>

                        <div class="col-9 form-group">
                            <input type="text" class="form-control cst-input" id="no_hp" placeholder="No Handphone"  name="no_hp" value="<?= $no_hp ?>">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-3 span-field">
                            <b>Gambar Toko</b>
                        </div>

                        <div class="col-9">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-3 span-field" style="">
                            <div class="form-group" style="border:1px solid #d2d2d2;padding:10px;background: #f7f7f7;display: table;width: 100%;">
                                <div>
                                    <img class="img-fluid" id="blah" style="margin-left: auto;margin-right: auto;display: block;" src="<?= PATH_IMAGE ?>merchant/<?= $supplier[0]['_image'] ?>?a=<?= time() ?>" onerror="this.src='<?= PATH_IMAGE ?>customer/def-customer.jpg?a=<?= time() ?>';"  />
                                </div>
                                <div>
                                    <label for="fileInput" class="custom-file-upload">
                                        <i class="fa fa-cloud-upload"></i> Upload File
                                    </label>
                                    <input name="fileInput" id="fileInput" type="file"/>
                                </div>
                            </div>
                        </div>

                        <div class="col-9">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-3 span-field">
                            <b>Sampul Toko</b>
                        </div>

                        <div class="col-9">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 span-field" style="">
                            <div class="form-group" style="border:1px solid #d2d2d2;padding:10px;background: #f7f7f7;display: table;width: 100%;">
                                <div>
                                    <img class="img-fluid" id="blah_banner" style="margin-left: auto;margin-right: auto;display: block; height: 150px;" src="<?= PATH_IMAGE ?>merchant/<?= $supplier[0]['_image_banner'] ?>?a=<?= time() ?>" onerror="this.src='<?= PATH_IMAGE ?>customer/def-customer.jpg?a=<?= time() ?>';"  />
                                </div>
                                <div>
                                    <label for="fileBanner" class="custom-file-upload">
                                        <i class="fa fa-cloud-upload"></i> Upload File
                                    </label>
                                    <input name="fileBanner" id="fileBanner" type="file"/>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 span-field" style="">
                            <button type="submit" style="margin-top:20px;margin-right: 00px;" class="float-right btn btn-sinup">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>