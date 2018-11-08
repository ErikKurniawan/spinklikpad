<?php
    $data_province = $this->province;
    $supplier = $this->supplier;

    $province = isset($supplier[0]['_province']) ? $supplier[0]['_province'] : '';
    $subprovince = isset($supplier[0]['_subprovince']) ? $supplier[0]['_subprovince'] : '';
    $district = isset($supplier[0]['_district']) ? $supplier[0]['_district'] : '';
    $subdistrict = isset($supplier[0]['_subdistrict']) ? $supplier[0]['_subdistrict'] : '';

    $address = isset($supplier[0]['_address']) ? $supplier[0]['_address'] : '';
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
                        <a class="nav-link" id="pills-home-tab" href="<?= URL ?>merchant/index">Informasi Toko</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-profile-tab" href="<?= URL ?>merchant/address">Alamat</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " id="pills-contact-tab" href="<?= URL ?>merchant/rekening" >Rekening</a>
                    </li>
                </ul>


                <script>
                    $(function () {
                        listKota('<?php echo $province;?>');
                        listKec('<?php echo $subprovince;?>');
                        listKel('<?php echo $district;?>');

                        $('#frmaddress').bootstrapValidator({
                            framework: 'bootstrap', Icons: {
                                valid: 'glyphicon glyphicon-ok',
                                invalid: 'glyphicon glyphicon-remove',
                                validating: 'glyphicon glyphicon-refresh'},

                            fields: {

                                alamat: {validators: {
                                        notEmpty: {
                                            message: 'Alamat harus diisi'}}},
                                provinsi: {validators: {
                                        notEmpty: {
                                            message: 'Provinsi harus diisi'}}},
                                kota: {validators: {
                                        notEmpty: {
                                            message: 'Kota harus diisi'}}},
                                kecamatan: {validators: {
                                        notEmpty: {
                                            message: 'Kecamatan harus diisi'}}},
                                Kelurahan: {validators: {
                                        notEmpty: {
                                            message: 'Kelurahan harus diisi'}}}
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

                    function listKota(thecode)
                    {
                        var kota = '<?php echo $subprovince;?>';

                        $.ajax({
                            url: '<?= URL ?>merchant/getKota',
                            type: "POST",
                            data: 'propinsi='+thecode+'&kota='+kota+'',
                            success: function (response)
                            {
                                //alert(response);
                                document.getElementById("dataKota").innerHTML = response;
                                listKec(document.getElementById("kota").value);
                            },
                            error: function ()
                            {
                            }
                        });
                    }

                    function listKec(thecode)
                    {
                        var kec = '<?php echo $district;?>';

                        $.ajax({
                            url: '<?= URL ?>merchant/getKec',
                            type: "POST",
                            data: 'kota='+thecode+'&kec='+kec+'',
                            success: function (response)
                            {
                                //alert(response);
                                document.getElementById("dataKec").innerHTML = response;
                                listKel(document.getElementById("kecamatan").value);
                            },
                            error: function ()
                            {
                            }
                        });
                    }

                    function listKel(thecode)
                    {
                        var kel = '<?php echo $subdistrict;?>';

                        $.ajax({
                            url: '<?= URL ?>merchant/getKel',
                            type: "POST",
                            data: 'kec='+thecode+'&kel='+kel+'',
                            success: function (response)
                            {
                                //alert(response);
                                document.getElementById("dataKel").innerHTML = response;
                            },
                            error: function ()
                            {
                            }
                        });
                    }

                </script>


                <form id="frmaddress" action="<?= URL ?>merchant/simpanaddress" method="post" enctype="multipart/form-data">


                    <div class="row">
                        <div class="col-3 span-field">
                            <b>Informasi Alamat</b>
                        </div>

                        <div class="col-9">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-3 span-field">
                            Alamat
                        </div>

                        <div class="col-9 form-group">
                            <input type="text" class="form-control cst-input" id="alamat" placeholder="Alamat"  name="alamat" value="<?= $address ?>">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-3 span-field">
                            Provinsi
                        </div>

                        <div class="col-9 form-group">
                            <select name="provinsi" id="provinsi" class="form-control cst-input" onchange="listKota(this.value);">
                                <option value="">-- Pilih Provinsi --</option>
<?
                                foreach ($data_province as $key => $value) {
                                    if($value['_province'] == $province)
                                    {
                                        echo '<option value="'.$value['_province'].'" selected>'.$value['_province'].'</option>';
                                    }else{
                                        echo '<option value="'.$value['_province'].'">'.$value['_province'].'</option>';
                                    }
                                }
?>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-3 span-field">
                            Kota
                        </div>

                        <div class="col-9 form-group" id="dataKota">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-3 span-field">
                            Kecamatan
                        </div>

                        <div class="col-9 form-group" id="dataKec">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-3 span-field">
                            Kelurahan
                        </div>

                        <div class="col-9 form-group" id="dataKel">
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