<style>
    .login-title
    {
        font-size:18px;
        line-height: 40px;
    }
    .form-group
    {
        font-size:18px;

    }

    .custom-control{
        margin-bottom: 10px;
    }

    .custom-control a
    {
        text-decoration: none;
        font-size:14px;
        color:#f7931d;
    }
    .login-title
    {
        color:#733f98;
        font-weight: bold;
    }

    .btn-1
    {
        background: #f7931d;
        color: #fff;
        width: 100%;
    }
    .btn-1:hover
    {
        background: #d91b5b;
        color: #fff;
    }
    .btn-signup
    {
        border:1px solid #733f98;
        color:#733f98;
        width: 100%;
    }
    .btn-signup:hover
    {
        background:#733f98;
        color:#fff;
    }

    .custom-control-label
    {
        font-size: 12px;
        color:#6d6e70;
        padding-top: 3px;
        cursor: pointer;
    }
    .custom-checkbox .custom-control-input:checked~.custom-control-label::before{
        background: #7f4197;
        color: green;
    }

    .filter-see-more a
    {
        color:#f6931e;
        font-size:12px;
        text-decoration: none;
    }


    .custom-control-input:not(:checked) + .custom-control-label
    {

        color:#94989b;
    }

    .btn-facebook
    {
        background: #456ab1;
        color:#fff;
        width: 100%;
    }


    .btn-google
    {
        background: #cf3334;
        color:#fff;
        width: 100%;
    }

    .l-button-sign a
    {
        margin:5px 0px;
    }
</style>

<script>
    $(function () {



        $('#frmsignup').bootstrapValidator({
            framework: 'bootstrap', Icons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'},
            fields: {
                user: {
                    validators: {
                        notEmpty: {
                            message: 'Email Harus Diisi'
                        }, emailAddress: {
                            message: 'Format Email Harus Benar'
                        }
                    }
                },
                name: {
                    validators: {
                        notEmpty: {
                            message: 'Nama Harus Diisi'
                        }
                    }
                },
                gender: {validators: {
                        notEmpty: {
                            message: 'Pilih Jenis Kelamin'
                        }
                    }
                },
                dob: {
                    validators: {
                        notEmpty: {
                            message: 'Tanggal Lahir Harus Diisi'
                        }
                    }
                }, hp: {
                    validators: {
                        notEmpty: {
                            message: 'No HP Harus Diisi'
                        }
                    }
                },
                password: {
                    validators: {
                        notEmpty: {
                            message: 'Password Harus Diisi'
                        }, identical: {
                            field: 'passwordcon',
                            message: 'Password Harus Sama Dengan Konfirmasi Password'
                        }
                    }
                },
                passwordcon: {
                    validators: {
                        identical: {
                            field: 'password',
                            message: 'Konfirmasi Password Harus Sama Dengan Password'
                        }
                    }
                }
            }
        }).on('success.form.bv', function (e) {
            e.preventDefault();
            var $form = $(e.target);


            //alert($form.attr('action'));
            $.post($form.attr('action'), $form.serialize()).done(function (rjson) {
                $('#loadcontent').html(rjson);

                var obj = JSON.parse(rjson);



                style = 'style="border-bottom:1px dotted #d2d2d2;font-size:18px;"';
                style2 = 'style="margin-top:15px;font-size:16px;color:#733f98"';
                style3 = 'style="margin-top:15px;font-size:16px;color:#d91b5b"';

                $("#loadcontent").html('<div ' + style + '>Register</div><div ' + style2 + '>' + obj.msg + '</div>');
                if(obj.sts===1){
                $('#frmsignup').trigger("reset");
            }
            });

            $("#exampleModalCenter").modal();


            $('#exampleModalCenter').bootstrapValidator('defaultSubmit');



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


<div style="min-height: 568px;">
    <div class="container-fluid content section">
        <div class="row">
            <div class="col-12">
                <div class="login-title">LOGIN</div>
            </div>
        </div>
        <div class="row">
            <div class="col-8" style="border-right: 1px solid #e2e7e9;">

                <form id="frmsignup" action="<?= URL ?>user/signupdo" method="post">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email *</label>
                        <input type="text" autocomplete="off" class="form-control" name="email" id="email   " placeholder="email@sample.com">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Lengkap *</label>
                        <input class="form-control simplebox" type="text" name="name" id="name" placeholder="Nama"/>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Tanggal Lahir *</label>
                        <input pickerdate class="form-control simplebox" type="text" name="dob" id="dob" value="<?= date('Y/m/d') ?>" placeholder="Tanggal lahir"/>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Jenis Kelamin *</label><br/>
                        <input  type="radio" name="gender" id="male" value="1">  
                        <label for="male">Laki - Laki</label> 
                        <input  type="radio" name="gender" id="female" value="2">  
                        <label for="female">Wanita</label> 
                        <div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">No Telepon Genggam *</label>
                        <input number class="form-control simplebox" type="text" name="hp" id="hp" placeholder="Nomor Hp"/>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Password *</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Ketik Ulang Password">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Ketik Ulang Password *</label>
                        <input type="password" class="form-control" id="passwordcon" name="passwordcon" placeholder="Ketik Ulang Password">
                    </div>
                    <button type="submit" class="btn btn-1">Submit</button>
                </form>
            </div>
            <div class="col-4 align-self-center l-button-sign" >
                <a class="btn btn-facebook" href="#">
                    <i class="fab fa-facebook-f"></i>
                    &nbsp;&nbsp;&nbsp;
                    Mendaftar Dengan Facebook
                </a>
                <a class="btn btn-google" href="#">
                    <i class="fab fa-google-plus-g"></i>
                    &nbsp;&nbsp;&nbsp;
                    Mendaftar Dengan Google
                </a>

            </div>
        </div>
    </div>
</div>