<?php
    $data_kategori = $this->kategori;
    $data_province = $this->province;
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
    function readURL(input, theid) {

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
                    if(theid == 0)
                    {
                        $('#blah').attr('src', e.target.result);
                    }else{
                        $('#blah'+theid).attr('src', e.target.result);
                    }
                }

                reader.readAsDataURL(input.files[0]);
            }



        }
    }
// Shorthand for $( document ).ready()
    $(function () {
        $("#fileInput").change(function () {
            readURL(this,0);
        });

        $("#fileInput1").change(function () {
            readURL(this,1);
        });

        $("#fileInput2").change(function () {
            readURL(this,2);
        });

        $("#fileInput3").change(function () {
            readURL(this,3);
        });

        $("#fileInput4").change(function () {
            readURL(this,4);
        });

        $("#fileInput5").change(function () {
            readURL(this,5);
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

                <script>
                    $(function () {
                        $('#frmproduct').bootstrapValidator({
                            framework: 'bootstrap', Icons: {
                                valid: 'glyphicon glyphicon-ok',
                                invalid: 'glyphicon glyphicon-remove',
                                validating: 'glyphicon glyphicon-refresh'},

                            fields: {

                                nama_product: {validators: {
                                        notEmpty: {
                                            message: 'Nama Product harus diisi'}}},
                                kategori: {validators: {
                                        notEmpty: {
                                            message: 'Kategori harus diisi'}}},
                                propinsi: {validators: {
                                        notEmpty: {
                                            message: 'Propinsi harus diisi'}}},
                                harga_satuan: {validators: {
                                        notEmpty: {
                                            message: 'Harga Satuan harus diisi'}}},
                                min_pemesanan: {validators: {
                                        notEmpty: {
                                            message: 'Minimum Pemesanan harus diisi'}}},
                                diskon: {validators: {
                                        notEmpty: {
                                            message: 'Diskon harus diisi'}}},
                                berat: {validators: {
                                        notEmpty: {
                                            message: 'Berat harus diisi'}}},
                                description: {validators: {
                                        notEmpty: {
                                            message: 'Deskripsi Produk harus diisi'}}}
                            }
                        }).on('error.form.bv', function (e) {
                            e.preventDefault();
                            $('#formID').submit(false);

                        }).on('success.form.bv', function (e) {
                            $('#formID').submit();
                        });
                    });

                    tinymce.init({
                        selector: "textarea#description",
                        theme: "modern",
                        height: 300,
                        plugins: [
                            'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                            'searchreplace wordcount visualblocks visualchars code fullscreen',
                            'insertdatetime media nonbreaking save table contextmenu directionality',
                            'emoticons template paste textcolor colorpicker textpattern imagetools'
                        ],
                        toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
                        toolbar2: 'print preview media | forecolor backcolor emoticons',
                        image_advtab: true
                    });

                </script>


                <form id="frmproduct" action="<?= URL ?>merchantproduct/simpanproductdistributor" method="post" enctype="multipart/form-data">


                    <div class="row">
                        <div class="col-3 span-field">
                            <b>Apa Yang Anda Jual</b>
                        </div>

                        <div class="col-9">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-3 span-field">
                            Nama Product
                        </div>

                        <div class="col-9 form-group">
                            <input type="text" class="form-control cst-input" id="nama_product" placeholder="Nama Product"  name="nama_product" value="">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-3 span-field">
                            Kategori
                        </div>

                        <div class="col-9 form-group">
                            <select name="kategori" id="kategori" class="form-control">
                                <option value="">-- Pilih Kategori --</option>
<?
                                foreach ($data_kategori as $key => $value) {
                                    echo '<option value="'.$value['_code'].'">'.$value['_name'].'</option>';
                                }
?>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-3 span-field">
                            <b>Gambar Product</b>
                        </div>

                        <div class="col-9">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-2 span-field" style="">
                            <div class="form-group" style="border:1px solid #d2d2d2;padding:10px;background: #f7f7f7;display: table;width: 100%;">
                                <div>
                                    <img class="img-fluid" id="blah" style="margin-left: auto;margin-right: auto;display: block;" src="<?= PATH_IMAGE ?>merchant/<?= $supplier[0]['_image'] ?>?a=<?= time() ?>" onerror="this.src='<?= PATH_IMAGE ?>klikpadlogogram.jpg?a=<?= time() ?>';"  />
                                </div>
                                <div>
                                    <label for="fileInput" class="custom-file-upload">
                                        <i class="fa fa-cloud-upload"></i> Upload File
                                    </label>
                                    <input name="fileInput" id="fileInput" type="file"/>
                                </div>
                            </div>
                        </div>
<?
                    for($x=1;$x<6;$x++)
                    {
?>
                        <div class="col-2 span-field" style="">
                            <div class="form-group" style="border:1px solid #d2d2d2;padding:10px;background: #f7f7f7;display: table;width: 100%;">
                                <div>
                                    <img class="img-fluid" id="blah<?php echo $x?>" style="margin-left: auto;margin-right: auto;display: block;" src="<?= PATH_IMAGE ?>merchant/<?= $supplier[0]['_image'] ?>?a=<?= time() ?>" onerror="this.src='<?= PATH_IMAGE ?>klikpadlogogram.jpg?a=<?= time() ?>';"  />
                                </div>
                                <div>
                                    <label for="fileInput<?php echo $x?>" class="custom-file-upload">
                                        <i class="fa fa-cloud-upload"></i> Upload File
                                    </label>
                                    <input name="fileInput<?php echo $x?>" id="fileInput<?php echo $x?>" type="file"/>
                                </div>
                            </div>
                        </div>
<?
                    }
?>
                    </div>

                    <div class="row">
                        <div class="col-3 span-field">
                            <b>Detail Product</b>
                        </div>

                        <div class="col-9">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-3 span-field" id="idSHP">
                            Harga Satuan
                        </div>

                        <div class="col-9 form-group" id="idHP">
                            <input currency type="text" class="form-control cst-input" id="harga_satuan" placeholder="Harga Satuan"  name="harga_satuan" value="">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-3 span-field" id="idSHB">
                            Minimum Pemesanan
                        </div>

                        <div class="col-9 form-group" id="idHB">
                            <input currency type="text" class="form-control cst-input" id="min_pemesanan" placeholder="Minimum Pemesanan"  name="min_pemesanan" value="">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-3 span-field" id="idSPPN">
                            PPN
                        </div>

                        <div class="col-9 form-group" id="idPPN">
                            <select name="ppn" id="ppn" class="form-control">
                                <option value="">-- Pilih PPN --</option>
                                <option value="Y">Ya</option>
                                <option value="N">Tidak</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-3 span-field">
                            Diskon
                        </div>

                        <div class="col-9 form-group">
                            <input persentase type="text" class="form-control cst-input" id="diskon" placeholder="Diskon"  name="diskon" value="">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-3 span-field">
                            Berat
                        </div>

                        <div class="col-9 form-group">
                            <input number type="text" class="form-control cst-input" id="berat" placeholder="Berat"  name="berat" value="">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-3 span-field">
                            Propinsi
                        </div>

                        <div class="col-9 form-group">
                            <select name="propinsi" id="propinsi" class="form-control">
                                <option value="">-- Pilih Propinsi --</option>
<?
                                foreach ($data_province as $key => $value) {
                                    echo '<option value="'.$value['_province'].'">'.$value['_province'].'</option>';
                                }
?>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-3 span-field">
                            <b>Deskripsi Produk</b>
                        </div>

                        <div class="col-9">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 form-group">
                            <textarea class="form-control" id="description" name="description"></textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 span-field" style="">
                            <button type="submit" style="margin-top:20px;margin-right: 00px;" class="float-right btn btn-sinup">Tambah Produk</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>