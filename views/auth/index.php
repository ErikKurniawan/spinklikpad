
<br>
<br>
<div class="row">
    <div class=" col-sm-6 col-sm-4 col-sm-offset-1 col-lg-4 col-lg-offset-1">
        <div class="title-form">Masuk</div>
        <div id="alertfrmsignin" class="alert ">
            <a href="#" class="close alert-close"  aria-label="close">&times;</a>
            <div class="msg-server">ZC

            </div>
        </div>
        <form id="frmsignin" class="frm-input" alert="#alertfrmsignin" action="<?= URL ?>auth/signin"  method="post" >
            <div class="form-group" >
                <div class="input-group ">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                    <input id="email" type="text" class="form-control  simplebox" name="email" placeholder="Email">
                </div>
            </div>
            <div class="form-group" >
                <div class="input-group ">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input class="form-control simplebox" type="password" name="password" id="password" placeholder="password"/>
                </div>
            </div>
            <button type="submit" class="btn btn-login">
                <span class="fa fa-sign-in"></span>&nbsp;&nbsp;Login
            </button>
        </form>
    </div>

    <div class="col-sm-1 col-lg-1">
        <div class="vertical-line"></div>
    </div>
    <div class="col-sm-4 col-lg-4">

        <div class="title-form">Daftar</div>
        <div id="alertfrmsignup" class="alert ">
            <a href="#" class="close alert-close"  aria-label="close">&times;</a>
            <div class="msg-server">

            </div>
        </div>
        <form id="frmsignup" class="frm-input" alert="#alertfrmsignup" action="<?= URL ?>auth/signup" method="post">
            <div class="form-group" >
                <div class="input-group ">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                    <input class="form-control simplebox" type="text" name="email" id="name" placeholder="Email"/>
                </div>
            </div>
            <div class="form-group" >
                <div class="input-group ">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input class="form-control simplebox" type="text" name="name" id="name" placeholder="Nama"/>
                </div>
            </div>
            <div class="form-group" >
                <div class="input-group ">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                    <input pickerdate class="form-control simplebox" type="text" name="dob" id="dob" value="<?= date('Y/m/d') ?>" placeholder="Tanggal lahir"/>
                </div>
            </div>
            <div class="form-group" >
                <div class="input-group ">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
                    <input number class="form-control simplebox" type="text" name="hp" id="hp" placeholder="Nomor Hp"/>
                </div>
            </div>
            <div class="form-group" >
                <div class="input-group ">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input class="form-control simplebox" type="password" name="password" id="password" placeholder="Password"/>
                </div>
            </div>
            <div class="form-group" >
                <div class="input-group ">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input class="form-control simplebox" type="password" name="passwordcon" id="passwordcon" placeholder="Konfirmasi Password"/>
                </div>
            </div>
            <button type="submit" class="btn btn-login">
                <span class="fa fa-save"></span>&nbsp;&nbsp;Daftar
            </button>
        </form>
    </div>
</div>
