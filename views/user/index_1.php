<script>
    $(document).ready(function () {
        $('[number]').keypress(function () {
            a = window.event;
            charCode = (a.which) ? a.which : a.keyCode;
            if (charCode > 47 && charCode < 58) {
                return true;
            }
            return false;
        });
        $('[currency]').keyup(function () {
            $(this).val(usersing.formatMoney($(this).val(), "", 0));
        });

        //$('[pickerdate]').datepicker({format: 'yyyy-mm-dd', todayBtn: "linked", autoclose: true});

        var date = new Date();
        date.setDate(date.getDate() - 1);

        $('[pickerdate]').attr("readonly", "readonly");
        $('[pickerdate]').datepicker({
            autoclose: true,
            todayBtn: "linked",
            format: 'yyyy/mm/dd',
            startDate: '-17y'
        });
    });

</script>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3 left-menu">
                <ul id="Menu">
                    <li> <a  href="<?php echo URL.'user'?>" class="avatar">
                            <img style="width:50px; height:50px;" class="imgprofile img-35 img-200-circle" src="https://ecs12.tokopedia.net/newimg/cache/100-square/default_v3-usrnophoto1.png" alt="Erik Kurniawan"/>
                            <span>Erik Kurniawan</span>
                        </a>
                    </li>
                    <li><a href="<?php echo URL.'user/purchase'?>">Pembelian</a></li>
                    <li><a href="<?php echo URL.'user/wishlist'?>">Wishlist</a></li>
                </ul>
            </div>
            <div class="col-sm-9">
                <div class="tab-contanier">
                    <div class="title-user">Biodata Diri</div>
                    <div class="btn-tabcontainer">
                        <ul class="btn-tab">
                            <li class="active"><a href="<?php echo URL.'user'?>">Biodata Diri</a></li>
                            <li><a href="<?php echo URL.'user/password'?>">Password</a></li>
                            <li><a href="<?php echo URL.'user/address'?>">Alamat</a></li>
                            <li><a href="<?php echo URL.'user/bank'?>">Bank</a></li>
                        </ul>
                    </div>
                    <div class="content-tab row">
                        <div class="col-sm-4">
                            <div style="background:#eee;padding:10px;">
                                <img style="width:100%;height:100%;" src="https://ecs12.tokopedia.net/newimg/cache/100-square/default_v3-usrnophoto1.png" alt="Erik Kurniawan"/>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <form id="frmbiodata" class="form-horizontal" action="user/savebiodata" method="post">
                                <div class="sub-title-user">Ubah Biodata Diri</div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3 cst-contorl-label" >Nama</label>
                                    <div class="col-sm-9"> 
                                        <input disabled number type="text" class="form-control cst-input" id="name" placeholder="Nama"  name="name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3 cst-contorl-label">Tanggal Lahir</label>
                                    <div class="col-sm-9"> 
                                        <input pickerdate type="text" class="form-control cst-input datetimepicker" id="dob" placeholder="Tanggal Lahir" name="dob">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3 cst-contorl-label">Jenis kelamin</label>
                                    <div class="col-sm-9"> 
                                        <label class="radio-inline"><input checked type="radio" name="gender">Pria</label>
                                        <label class="radio-inline"><input type="radio" name="gender">Wanita</label>
                                    </div>
                                </div>
                                <div class="sub-title-user">Ubah Kontak</div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3 cst-contorl-label">Email</label>
                                    <div class="col-sm-9"> 
                                        <input disabled type="text" class="form-control cst-input" id="email" placeholder="Email" name="email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3 cst-contorl-label">Nomor HP</label>
                                    <div class="col-sm-9"> 
                                        <input number type="text" class="form-control cst-input" id="hp" placeholder="Nomor HP" name="hp">
                                    </div>
                                </div>
                                <hr>
                                <button type="submit" class="btn btn-signup pull-right">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>

<style>
    .left-menu
    {
        border:1px solid #eeeeee;
        padding-top: 20px;
        padding-bottom: 20px;

    }
    #Menu
    {
        padding:0;
        margin:0;
        list-style-type:none;
        font-size:13px;
        color:#717171;
        width:100%;
    }

    #Menu li a
    {
        padding:7px 10px 7px 10px;
        display: block;

    }

    .table-condensed
    {

    }
    #Menu li:hover
    {
        background-color:#ffcc00;
    }
    #Menu li:hover a
    {
        color:White;
    }


    #Menu a:link
    {
        color:#717171;
        text-decoration:none;
    }

    #Menu a:hover
    {
        color:White;
    }

    .frm-user
    {
        padding:0px !important;
    }

    .title-user
    {
        font-size:16px;
        font-weight: bold;
        color:#FE980F;
        line-height: 40px;
    }

    .sub-title-user
    {
        font-size:14px;
        font-weight: bold;
        color:#FE980F;
        line-height: 40px;
    }


    .tab-contanier
    {
        border:1px solid #eee;
        padding:10px;
    }
    .btn-tabcontainer
    {
        position:relative;
        height:40px;
        width: 100%;
        border-bottom:1px solid #eee;
        padding: 0px;
    }
    .content-tab
    {
        margin-top:10px;
    }

    .btn-tab
    {
        margin-left:-40px;
    }
    .btn-tab li:first-child
    {
        /*border-bottom:1px solid #eeeeee;*/

        margin-left: 0px !important;
    }

    .btn-tab li
    {
        margin-right: 10px;
        float:left;
    }
    
    .btn-tab li a
    {
        padding:7px 12px 7px 12px;
        display: block;
    }

    .btn-tab .active
    {

        border-bottom:3px solid indigo;
        background-color:#5A55A3;

    }
    .btn-tab .active a
    {
        color: #fff !important;
    }


    .btn-tab li:hover
    {
        border-bottom:3px solid indigo;
        background-color:#5A55A3;
    }
    .btn-tab li:hover a
    {
        color:White;
    }


    .btn-tab a:link
    {
        color:#717171;
        text-decoration:none;
    }

    .btn-tab a:hover
    {
        color:White;

    }
</style>