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
    .btn-facebook:hover
    {
        color:#fff;
    }


    .btn-google
    {
        background: #cf3334;
        color:#fff;
        width: 100%;
    }
    .btn-google:hover
    {
        color:#fff;
    }

    .l-button-sign a
    {
        margin:5px 0px;
    }
    .err-msg
    {
        color :#b5272b;
        font-size:12px;
    }
</style>
<script>
    $(function () {
        $('#frmsignin').bootstrapValidator({
            framework: 'bootstrap', Icons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'}, fields: {
                user: {
                    validators: {
                        notEmpty: {
                            message: 'Email Harus Diisi'
                        }
                    }
                }, password: {
                    validators: {
                        notEmpty: {
                            message: 'Password Harus Diisi'
                        }
                    }}
            }
        }).on('error.form.bv', function (e) {
            e.preventDefault();

            // prevent form submission if preventDefault() not working
            $('#formID').submit(false);

            // other validation error handlings

        }).on('success.form.bv', function (e) {
            e.preventDefault();
            var $form = $(e.target);



            $.post($form.attr('action'), $form.serialize()).done(function (rjson) {


                var obj = JSON.parse(rjson);



                style = 'style="border-bottom:1px dotted #d2d2d2;font-size:18px;"';
                style2 = 'style="margin-top:15px;font-size:16px;color:#733f98"';
                style3 = 'style="margin-top:15px;font-size:16px;color:#d91b5b"';
                if (obj.sts === 1) {

                    ///$("#loadcontent").html('<div '+style+'>Login</div><div '+style2+'>Berhasil login</div>');
                    window.location.href = "<?= URL ?>product";
                } else
                {
                    $("#loadcontent").html('<div ' + style + '>Login</div><div ' + style3 + '>User Or Password Salah</div>');
                    $("#exampleModalCenter").modal();
                    $('#exampleModalCenter').bootstrapValidator('defaultSubmit');
                }

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


<div style="min-height: 518px;">
    <div class="container-fluid content section">
        <div class="row">
            <div class="col-12">
                <div class="login-title">Lupa Password</div>
            </div>
        </div>
        <div class="row">
            <div class="col-8">
                <form id="frmsignin" action="<?= URL ?>user/signindo"  method="post">
                    <div class="form-group">
                        <label for="user">Email *</label>
                        <input type="text" autocomplete="off" id="user" name="user" class="form-control" aria-describedby="emailHelp" placeholder="email@sample.com">
                    </div>
                    <button type="submit" class="btn btn-1 float-right">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>