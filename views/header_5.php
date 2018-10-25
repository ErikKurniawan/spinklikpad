
<style>
    .header-container
    {

    }
    .btn-sinup
    {
        background: #733f98;
        color:#fff;
        margin: 0 15px;
    }
    .btn-sinup:hover
    {
        background: #d91b5b;
        color:#fff;
    }


    .btn-src
    {
        background: #733f98;
        color:#fff;
    }
    .btn-src:hover
    {

        color:#fff;
    }

    .btn-sinin
    {
        background: #fff;
        border:1px solid #733f98;
        color:#733f98;
    }

    .btn-sinin:hover
    {
        border:1px solid #d91b5b;
        color:#d91b5b;
    }
    .table-header td
    {
        line-height: 48px;
        height: 48px;
    }
    .logo a
    {
        text-decoration: none;
        color: #733f98;
        font-size: 30px;
        font-weight: bold;
        font-style: oblique;
    }


    .btn-category
    {
        background: #fff;
        border:1px solid #733f98;
        color:#733f98;
        width: 90px;
    }

    .btn-category:hover
    {
        border:1px solid #d91b5b;
        color:#d91b5b;
    }


    .dropdown:hover>.dropdown-menu {
        display: block;
    }
    .dropdown:hover>.hover-ceret{
        color: #733f98;
        font-weight: bold;
    }

    .dropdown:hover>.hover-ceret:after {
        content:'';
        position: absolute;
        bottom: -10px;
        left: 50%;
        margin-left: -5px;
        width: 0;
        height: 0;
        border-bottom: solid 10px #fff;
        border-left: solid 10px transparent;
        border-right: solid 10px transparent;

        z-index: 9999;
    }


    .dropdown-menu
    {

        width: 700px;
        background: transparent !important;
        border: 0px !important;
        margin-top:-5px;

    }
    .hover-ceret
    {
        color: #6a6c6c;
    }
    .hover-ceret:hover {
        color: #733f98;
        font-weight: bold;
    }



    .caret {
        position: relative;
        cursor: pointer;
    }

    .caret:before {
        content: '';
        position: absolute;
        top: -27px;
        left: 30px;
        border-bottom: 10px solid #d3d3d3;
        border-left: 10px solid transparent;
        border-right: 10px solid transparent;
    }

    .caret:after {
        content: '';
        position: absolute;
        top: -26px;
        left: 30px;
        border-bottom: 10px solid #fff;
        border-left: 10px solid transparent;
        border-right: 10px solid transparent;
    }

    .caret:hover:before {
        border-top-color: #222;
    }


    .modal-open .modal.modal-center {
        display: flex!important;
        align-items: center!important;
        .modal-dialog {
            flex-grow: 1;
        }
    }

    .loading-screen
    {
        border:0px solid black;
        position: absolute;
        height: 100%;
        width: 100%;

        overflow: hidden;
        z-index:-100;
    }

    .loading-screen-show
    {
        display: block;
        z-index:9999;
        background: red;
    }

    .header-category
    {
        text-align: center;color:#95999A;

    }
    .header-category
    {
        text-align: center;
        color:#95999A;
        text-decoration: none;
    }
    .header-category:hover
    {
        color:#6a6c6c;
        text-decoration: none;
    }

    input,
    a,
    form-control,
    textarea {

        -webkit-box-shadow: none !important;

        -moz-box-shadow: none !important;

        box-shadow: none !important;


    }

    textarea:focus,
    form-control:focus,
    input[type="text"]:focus,
    input[type="password"]:focus,
    input[type="datetime"]:focus,
    input[type="datetime-local"]:focus,
    input[type="date"]:focus,
    input[type="month"]:focus,
    input[type="time"]:focus,
    input[type="week"]:focus,
    input[type="number"]:focus,
    input[type="email"]:focus,
    input[type="url"]:focus,
    input[type="search"]:focus,
    input[type="tel"]:focus,
    input[type="color"]:focus,
    .uneditable-input:focus {   



        -webkit-box-shadow: none !important;

        -moz-box-shadow: none !important;

        border-color: #d2d2d2;

    }

    .hero {
        position:relative;
        background-color:#e15915;

        width:100% !important;
    }

    .hero:after {
        content:'';
        position: absolute;
        bottom:  -20px;
        left: 50%;
        margin-left: -20px;
        width: 0;
        height: 0;
        border-bottom: solid 20px #fff;
        border-left: solid 20px transparent;
        border-right: solid 20px transparent;
    }




    .read-more-state {
        display: none;
    }

    .read-more-target {
        opacity: 0;
        max-height: 0;
        font-size: 0;
        transition: .25s ease;
    }

    .read-more-state:checked ~ .read-more-wrap .read-more-target {
        opacity: 1;
        font-size: inherit;
        max-height: 999em;
    }

    .read-more-state ~ .read-more-trigger:before {
        content: 'Show more';
    }

    .read-more-state:checked ~ .read-more-trigger:before {
        content: 'Show less';
    }

    .read-more-trigger {
        cursor: pointer;
        display: inline-block;
        padding: 0 .5em;
        color: #666;
        font-size: .9em;
        line-height: 2;
        border: 1px solid #ddd;
        border-radius: .25em;
    }



    .parent { display: table;width: 100%; }
    .parent > div {display: table-cell; 
                   border:1px solid #e2e7e9;
                   vertical-align:top; 
    }


    .parent2 { display: table;width: 100%; }
    .parent2 > div {display: table-cell; 

                    vertical-align:top; 
    }

    .parent3 { display: table;width: 100%;
               border:1px solid #e2e7e9;}
    .parent3 > div {display: table-cell; 

                    vertical-align:top; 
    }
</style>


<script>
    $(function () {
        $('body').on('click', '#test', function () {
            $('body').css({"overflow": "hidden"})
            $('.loading-screen').addClass("loading-screen-show animated fadeIn").one("animationend webkitAnimationEnd oAnimationEnd",
                    function () {
                        $(this).removeClass("animated fadeIn loading-screen-show");
                    });
        });
        $('.panel-collapse').on('show.bs.collapse', function () {
            $(this).siblings('.panel-heading').addClass('active');
        });
        $('.panel-collapse').on('hide.bs.collapse', function () {
            $(this).siblings('.panel-heading').removeClass('active');
        });
    });
</script>

<!--
<a class="btn btn-primary" id="test" href="#" role="button">test</a>
<div class="loading-screen">


</div>
-->



<!--<div class="hover" style="position: absolute;width: 100%;height: 100%;background: #000;z-index: 100;opacity: 0.1"></div>-->


<header>
    <div class="container-fluid section content">
        <!--
                <table class="table-header" border="0">
                    <tr>
                        <td class="logo"><a href="<?= URL ?>">klikpad</a></td>
                        <td class="logo">kategori</td>
                    </tr>
                </table>-->
        <div class="row header-container" style="line-height: 35px;padding-top: 10px;padding-bottom: 10px;">
            <div class="col-2 logo" style="border:0px solid black;">


                <a href="<?= URL ?>" style="margin-top: -10px;height: 55px;z-index:999;background: transparent;display: block;;border:0px solid black;">
                    <div style="position: relative;border:0px solid blue;z-index: 0;height: 55px;overflow-x: hidden;overflow-y: hidden;">
                        <img class="img-fluid" src="<?= PATH_IMAGE ?>klik pad fix file-02.png?a<?= time() ?>" style="margin-top: -17px;margin-left:-20px;width: 95px;display: inline-block;border:0PX SOLID YELLOW;z-index: 0;"/>
                        <img class="img-fluid" src="<?= PATH_IMAGE ?>klik pad fix file-03.png?a<?= time() ?>" style="margin-top: -58px;margin-left:-50px;width: 200px;display: inline-block;position: absolute;border:0PX SOLID YELLOW;z-index: 0;"/>
                    </div>
                </a>
            </div>
            <div class="col-1" >
                <!--
                <div class="hero">
                    
                    Kategori
                </div>
                -->
                <div class="dropdown" style="">

                    <a class="hover-ceret" href="<?= URL ?>category">Kategori</a>

                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <div style="margin-top:5px;background: red;box-shadow: 0px 2px 10px #d2d2d2;background:white;">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>

                    </div>
                </div>
            </div>



            <div class="col-7" style="border:0px solid black;">
                <div class="input-group" style="width: 680px;border:0px solid black;padding-right: 15px; outline: none !important;box-shadow:none !important;">
                    <input type="text" class="form-control" placeholder="Pencarian Produk" style=" outline: none !important;box-shadow:none !important;">
                    <div class="input-group-append">
                        <a href="<?= URL ?>product" class="btn btn-src" type="button">
                            <i class="fas fa-search"></i>

                        </a>
                    </div>
                </div>
            </div>
            <div class="col-2"> 




                <style>



                    .custom-dropdown:hover>.triangle-center{
                        color: #733f98;
                        font-weight: bold;
                    }

                    .triangle-center:hover {
                        color: #733f98;
                        font-weight: bold;
                    }

                    .triangle-center {
                        position:relative;
                        color: #6a6c6c;
                        height:20px !important;
                        width:100px !important;
                        z-index: 9999;

                    }

                    .custom-dropdown:hover>.triangle-center:after {
                        content:'';
                        position: absolute;
                        bottom: -17px;
                        left: 50%;
                        margin-left: -10px;
                        width: 0;
                        height: 0;
                        border-bottom: solid 10px #fff;
                        border-left: solid 10px transparent;
                        border-right: solid 10px transparent;
                        z-index: 9999;
                    }

                    .triangle-center:hover>.profile-container {
                        display: block;
                    }


                    .custom-dropdown
                    {
                        position: relative;
                        display: inline-block;
                    }

                    .custom-dropdown:hover>.container-dropmenu {
                        display: block;
                    }
                    .custom-dropdown:hover>.triangle2{
                        color: #733f98;
                        
                    }






                    .triangle2:hover {
                        color: #733f98;
                        
                    }

                    .triangle2 {
                        position:relative;
                        color: #6a6c6c;
                        height:20px !important;
                        width:100px !important;

                    }

                    .custom-dropdown:hover>.triangle2:after {
                        content:'';
                        position: absolute;
                        bottom: -19px;
                        right: 10px;
                        margin-left: -10px;
                        width: 0;
                        height: 0;
                        border-bottom: solid 10px #fff;
                        border-left: solid 10px transparent;
                        border-right: solid 10px transparent;
                        z-index: 9999;
                    }

                    .triangle2:hover>.profile-container {
                        display: block;
                    }

                    .container-dropmenu
                    {
                        z-index: 9999;
                        display: none;
                        position: absolute;
                        border:0px solid black;

                    }
                    .profile-menu
                    {
                        width: 200px;
                        height: 100px;
                        right: 0px;
                        top:35px;
                    }



                    .signin {
                        position:relative;
                        color: #6a6c6c;
                        padding: 10px 15px !important;
                        border:2px solid #733f98;
                        text-align: right;
                        border-radius: 5px;
                        background: #fff;
                    }
                    .signin:hover {
                        color: #fff;
                        background: #733f98;
                    }

                    .signup:hover {
                        color: #fff;
                        background: #d91b5b;
                        
                    }

                    .signup {
                        position:relative;
                        color: #6a6c6c;
                        padding: 10px 10px ;
                        border:2px solid #d91b5b;
                        text-align: right;
                        border-radius: 5px;
                        background: #fff;
                    }

                </style>

                <?php
                $datacustomer = glfn::_datacustomer();

                //glfn::_pre($datacustomer);
                $_email = '';
                $_name = '';
                $_dob = '';
                $_hp = '';
                $_flaguser = '';
                foreach ($datacustomer as $key => $vcustomer) {
                    $_email = $vcustomer['_email'];
                    $_name = $vcustomer['_name'];
                    $_dob = $vcustomer['_dob'];
                    $_hp = $vcustomer['_hp'];
                    $_flaguser = $vcustomer['_flag'];
                }
                if (isset($_COOKIE[COOKIE_SIGNIN]) && ($_COOKIE[COOKIE_SIGNIN])):
                    ?>
                    <div class = " custom-dropdown" style="border:0px solid black;">
                        <a class = "triangle-center" style="border:0px solid black;" href = "#" >
                            <img style="width: 30px;height: 30px;" src="<?= URL ?>public/image/asset/icon_cart_32.png"/>
                            <span style="color:#6a6c6c;font-size: 12px;">2</span>

                        </a>
                        <div class="container-dropmenu" style="margin-top:-2px;width: 240px;left:50%;margin-left:-120px;">
                            <div style="margin-top:9px;box-shadow: 0px 2px 10px #d2d2d2;background:white;">
                                asdads
                            </div>
                        </div>
                    </div>
                    <div class = "float-right custom-dropdown">
                        <img style="width: 40px;height: 40px;border:3px solid #d2d2d2;" src="<?= URL ?>public/image/asset/icon_cart_32.png"/>
                        <a class = "triangle2" href = "<?=URL?>user" >
                            <?= $_name ?>
                        </a>
                        <div class="container-dropmenu profile-menu">
                            <div style="margin-top:9px;box-shadow: 0px 2px 10px #d2d2d2;background:white;">
                                asdads
                            </div>
                        </div>
                    </div>
                <?php else: ?>
                    <a class = "signup " href = "<?= URL ?>user/signup">Sign up</a>
                    <a class = "signin " href = "<?= URL ?>user/signin">Sign in</a>
                <?php endif; ?>

            </div>
        </div>
</header>


<style>
    .check-warna div
    {
        width: 100px;
        height: 100px;
        color: #000;
        font-size:20px;
        font-weight: bold;
        display: inline-block;
        text-align: center;
        line-height: 100px;
    }

    .warna-1
    {
        background: #733f98;
    }
    .warna-2
    {
        background: #f7931d;
    }
    .warna-3
    {
        background: #d91b5b;
    }
    .warna-4
    {
        background: #e2e7e9;
    }
    .warna-5
    {
        background: #95999A;
    }
    .warna-6
    {
        background: #6a6c6c;
    }
</style>

<!--
<div class = "check-warna">
<div class = "warna-1">733f98</div>
<div class = "warna-2">f7931d</div>
<div class = "warna-3">d91b5b</div>
<div class = "warna-4">e2e7e9</div>
<div class = "warna-5">95999A</div>
<div class = "warna-6">6a6c6c</div>
</div>
-->