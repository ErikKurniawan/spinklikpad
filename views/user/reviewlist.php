<?php
$data = $this->data;
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



</style>

<script>
    function readURL(input) {

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
                    $('#blah').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }



        }
    }
// Shorthand for $( document ).ready()
    $(function () {
        $("#fileInput").change(function () {
            readURL(this);
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
            require __DIR__ . '/left-menu.php';
            ?>
        </div>

        <div class="col-10">

            <div style="border:1px solid #e2e7e9;padding:10px;">

                <ul style="border-bottom:1px solid #e2e7e9;" class="nav nav-pills mb-3 i-tab" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link " id="pills-home-tab" href="<?= URL ?>user/review">Menunggu Ulasan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-profile-tab" href="<?= URL ?>user/reviewlist">Ulasan Saya</a>
                    </li>
                </ul>


                <script>


                    $(function () {
                        $('#frmprofileedit').bootstrapValidator({
                            framework: 'bootstrap', Icons: {
                                valid: 'glyphicon glyphicon-ok',
                                invalid: 'glyphicon glyphicon-remove',
                                validating: 'glyphicon glyphicon-refresh'},

                            fields: {

                                name: {validators: {
                                        notEmpty: {
                                            message: 'Nama harus diisi'}}},
                                gender: {validators: {
                                        notEmpty: {
                                            message: 'Pilih Jenis Kelamin'}}},
                                dob: {validators: {
                                        notEmpty: {
                                            message: 'Tanggal lahir harus diisi'}}},

                                hp: {validators: {
                                        notEmpty: {
                                            message: 'Nomor Hp harus diisi'}}}
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
                                    alert(data);
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
                                    /*
                                     $("#targetLayer").html(data);
                                     $("#targetLayer").css('opacity', '1');
                                     setInterval(function () {
                                     $("#body-overlay").hide();
                                     }, 500);
                                     */
                                },
                                error: function ()
                                {
                                }
                            });

                            /*
                             $.post($form.attr('action'), $form.serialize()).done(function (rjson) {
                             
                             
                             var obj = JSON.parse(rjson);
                             
                             
                             
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
                             
                             
                             });
                             */


                        });
                    });


                    $(function () {

                        $(".product-rate-star").rateYo({
                            ratedFill: '#d91b5b',
                            starWidth: "25px",
                            readOnly: true
                        });



                    });


                    //border-top-left-radius: 10px; border-top-right-radius: 10px;
                </script>



                <?php
                $rate_desc = array(1 => "Sangat Buruk", 2 => "Buruk", 3 => "Cukup", 4 => "Baik", 5 => "Sangat Baik");
                foreach ($data as $key => $value) {
                    ?>
                    <div class="row" style="margin-bottom: 10px">


                        <div class="col-12">
                            <div style="border-radius:10px;border:2px solid #f1f1f1;padding: 5px 20px;">

                                <div style="border-bottom:1px solid #d2d2d2;margin-bottom: 15px;padding-bottom: 5px;font-size:13px;">
                                    <?= $value['_invoice'] ?>
                                </div>
                                <div class="row" style="border:0px solid red;">
                                    <div class="col-6">
                                        <div class="parent2">
                                            <div><?= $value['_supplier_name'] ?></div>
                                        </div>
                                        <div class="parent2" style="">
                                            <div style="width:50%;border-radius:5px;border:2px solid #d2d2d2; ">
                                                <div class="product-image" style="padding:5px;">
                                                    <img class="img-fluid" src="<?= $_link . "?a=" . time() ?>" onerror="this.src='<?= URL ?>public/image/default.jpg';"  title="kategory 1"/>
                                                </div>
                                            </div>
                                            <div style="padding:5px;color:#733f98;">

                                                <?= $value['_product_name'] ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <form class="formsubmit" id="frmprofileedit<?= $key ?>" action="<?= URL ?>user/reviewdo" method="post" enctype="multipart/form-data">
                                            <div class="rateY2o" style="border:0px solid red;margin-top: 40px;">
                                                <div class="product-rate-star" data-filter="rate" ata-code ="<?= $value['_rating'] ?>" data-rateyo-rating="<?= $value['_rating'] ?>"></div>
                                                <span style="font-size:15px;float:left;line-height: 40px;padding-left: 5px;color:#95999A" class="rateyo_desc"><?= $rate_desc[$value['_rating']] ?></span>
                                                <input type="hidden" name="valuerateyo" id="valuerateyo<?= $key ?>" value="0"/>
                                            </div>
                                            <div style="padding-top:40px;padding-left: 5px;">
                                                <?=$value['_rating_desc']?>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                    <?php
                }
                ?>


            </div>
        </div>

    </div>
</div>





