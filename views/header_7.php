
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


    .css-square {
        width: 100px;
        height: 100px;
        background-color: #111;
        -webkit-transition: -webkit-transform .8s ease-in-out;
        -ms-transition: -ms-transform .8s ease-in-out;
        transition: transform .8s ease-in-out;  
    }
    .css-square:hover {
        transform:rotate(45deg);
        -ms-transform:rotate(45deg);
        -webkit-transform:rotate(45deg);
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
        <div class="row header-container" style="line-height: 35px;padding-top: 10px;padding-bottom: 10px;">
            <div class="col-2 logo" style="border:0px solid black;">


                <a href="<?= URL ?>" style="margin-top: -10px;height: 55px;z-index:999;background: transparent;display: block;;border:0px solid black;">
                    <div style="position: relative;border:0px solid blue;z-index: 0;height: 55px;overflow-x: hidden;overflow-y: hidden;">
                        <img class="img-fluid" src="<?= PATH_IMAGE ?>klik pad fix file-02.png?a<?= time() ?>" style="margin-top: -17px;margin-left:-20px;width: 95px;display: inline-block;border:0PX SOLID YELLOW;z-index: 0;"/>
                        <img class="img-fluid" src="<?= PATH_IMAGE ?>klik pad fix file-03.png?a<?= time() ?>" style="margin-top: -58px;margin-left:-50px;width: 200px;display: inline-block;position: absolute;border:0PX SOLID YELLOW;z-index: 0;"/>
                    </div>
                </a>
            </div>
            <div class="col-1" style="border:0px solid black;padding:0px 0px 0px 10px;">
                <style>
                    #categoridetail a
                    {
                        font-size:12px;
                        color:#6a6c6c;
                        display: block;
                        padding-left:5px;

                    }
                    #categoridetail a:hover
                    {

                        color:#733f98;
                        font-weight: bold;
                    }
                </style>
                <div class="dropdown" style="">

                    <a class="hover-ceret" href="<?= URL ?>category">Kategori <i class="fa fa fa-angle-down"></i></a>

                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <div style="margin-top:5px;box-shadow: 0px 2px 10px #d2d2d2;background:white;">
                            <div id="categoridetail" class="parent2" style="padding:5px;">

                                <?php
                                $listcategory = glfn::_listcategory();
                                //glfn::_pre($listcategory);
                                $check = 0;
                                foreach ($listcategory as $k => $v) {
                                    $check++;

                                    if ($check <= 3) {
                                        if ($check == 2) {
                                            ?>
                                            <div style="border-left:1px dashed #d2d2d2;border-right:1px dashed #d2d2d2;padding:5px 10px;">
                                                <?php
                                            } else {
                                                ?>
                                                <div style="padding:5px 10px;">
                                                    <?php
                                                }
                                                $_name_cat_header = $v['_name'];
                                                $_details = $v['_details'];
                                                ?>    


                                                <div style="font-size:14px;color:#733f98;border-bottom: 5px double #733f98;"><?= $_name_cat_header ?></div>

                                                <?php
                                                foreach ($_details as $k2 => $v2) {
                                                    $_code = $v2['_code'];
                                                    $_name_cat_detail = $v2['_name'];
                                                    ?>
                                                    <a href="<?= URL ?>product?kategoricode=<?= $_code ?>&kategori=<?= $_name_cat_detail ?>&srch-product="><?= $_name_cat_detail ?></a>

                                                    <?php
                                                }
                                                ?>
                                            </div>
                                            <?php
                                        }
                                    }
                                    ?>


                                </div>
                                <style>
                                    .see-more
                                    {
                                        font-size:13px;
                                        color:#f7931d;
                                    }
                                    .see-more:hover
                                    {
                                        color:#f7931d;
                                    }

                                </style>
                                <div style="text-align: right;padding-right: 20px;">
                                    <a class="see-more" href="<?= URL ?>category">Lihat Semua Kategori</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-7" style="border:0px solid black;">


                    <script type="text/javascript">
                        $(document).ready(function () {



                            $('body').on('keyup', '#srch-product', function () {
                                if ($("#produk").length == 0)
                                {
                                    $("#tmp-filter").after('<input type="hidden" data-code="' + $(this).val() + '" id="produk" name="produk" value="' + $(this).val() + '"/>');
                                } else
                                {
                                    $('#produk').val($(this).val());
                                }
                                $.post('<?php echo URL; ?>searchproduct', {'_srch': $(this).val()}, function (a) {
                                    //alert($(this).val());
                                    $('#rslt-product').html(a);
                                });
                                $('#rslt-product').css({'display': 'block'});


                                if ($("#page").length > 0) {
                                    $('#page').val("1");
                                }

                            });


                            $('body').click(function () {
                                $('#rslt-product').css({'display': 'none'});
                            });




                            $('body').on('focus', '#srch-product', function () {
                                /*
                                 $.post('<?php echo URL; ?>searchproduct', {'_srch': $(this).val()}, function (a) {
                                 //alert($(this).val());
                                 $('#rslt-product').html(a);
                                 });
                                 $('#rslt-product').css({'display': 'block'});
                                 */
                            });

                            $('body').on('click ', '.srch-filter', function () {
                                var _id = $(this).attr('data-filter');
                                var _category = $(this).attr('data-category');
                                var _code = $(this).attr('data-code');
                                var _name = $(this).text();

                                if (_id == 'supplier')
                                {
                                    if ($("#" + _id).length == 0) {
                                        $("#tmp-filter").after('<input data-code="" type="hidden" id="' + _id + '" name="' + _id + '" value="' + _name + '"/>');
                                        $("#tmp-filter").after('<input type="hidden" id="' + _category + '" name="' + _category + '" value="' + _code + '"/>');
                                    } else {
                                        $('#' + _id).val(_name);
                                        $('#' + _category).val(_code);
                                    }
                                    $('#produk').remove();
                                } else {
                                    $('#srch-product').val(_name);
                                    if ($("#" + _id).length == 0) {
                                        $("#tmp-filter").after('<input type="hidden" id="' + _id + '" name="' + _id + '" value="' + _name + '"/>');
                                    } else {
                                        $('#' + _id).val(_name);
                                    }
                                }
                                $('#frmsearch').submit();
                                if ($("#page").length > 0) {
                                    $('#page').val("1");
                                }
                            });
                            $('body').on('click ', '.srchcst-filter', function () {
                                var _id = $(this).attr('data-filter');
                                var _category = $(this).attr('data-category');
                                var _code = $(this).attr('data-code');
                                var _name = $(this).text();

                                if ($("#" + _id).length == 0) {
                                    $("#tmp-filter").after('<input type="hidden" id="' + _id + '" name="' + _id + '" value="' + _name + '"/>');
                                    $("#tmp-filter").after('<input type="hidden" id="' + _category + '" name="' + _category + '" value="' + _code + '"/>');
                                } else {
                                    $('#' + _id).val(_name);
                                    $('#' + _category).val(_code);
                                }

                                $('#frmsearch').submit();
                            });


                            $('body').on('click ', '.filter-rate', function () {
                                var $rateYo = $(this).rateYo();
                                var rating = $rateYo.rateYo("rating");
                                if ($("#rate").length == 0) {
                                    $("#tmp-filter").after('<input type="hidden" id="rate" name="rate" value="' + rating + '"/>');
                                } else {
                                    $('#rate').val(rating);

                                }
                                $('#frmsearch').submit();
                            });

                            $('body').on('blur', '.filterharga', function () {
                                var tmpid = $(this).attr('id');
                                var id = tmpid == "tmpminprice" ? 'minprice' : 'maxprice';
                                if ($("#" + id).length == 0) {
                                    $("#tmp-filter").after('<input type="hidden" id="' + id + '" name="' + id + '" value="' + $('#' + tmpid).val() + '"/>');


                                } else {
                                    $('#' + id).val($('#' + tmpid).val());

                                }
                                if ($("#" + id).val() != "")
                                {
                                    $('#frmsearch').submit();
                                }

                            });
                            $('body').on('change', '#filter-lokasi', function () {
                                //alert($(this).val());
                                if ($(this).val() != "")
                                {
                                    if ($("#lokasi").length == 0) {
                                        $("#tmp-filter").after('<input type="hidden" id="lokasi" name="lokasi" value="' + $(this).val() + '"/>');
                                    } else {
                                        $('#lokasi').val($(this).val());

                                    }
                                }

                                $('#frmsearch').submit();
                            });

                            $('body').on('click ', '.srch-btn', function () {
                                $('#frmsearch').submit();
                            });
                        });
                    </script>
                    <style>
                        .srch-item
                        {
                            display: block;
                            padding: 10px;
                            font-size:12px;
                            color:#95999A;
                        }
                        .srch-item:hover
                        {
                            color:#733f98;
                            font-size:14px;
                            font-weight: bold;
                        }
                    </style>

                    <?php
                    $srchproduct = isset($_GET['srch']) ? '' . $_GET['srch'] . '' : '';
                    $orderbycode = isset($_GET['orderby']) && $_GET['orderby'] != '' ? $_GET['orderby'] : '0';
                    $category = isset($_GET['category']) ? $_GET['category'] : '';
                    $supplier = isset($_GET['supplier']) ? $_GET['supplier'] : '';
                    $page = $post['page'] = isset($_GET['page']) && $_GET['page'] != "" ? $_GET['page'] : 1;
                    ?>


                    <form id="frmsearch" action= "<?= URL ?>product" method="get">
                        <div id="tmp-filter"></div>
                        <?php
                        $filtering = $_GET;
                        unset($filtering['url']);
                        unset($filtering['srch-product']);
                        foreach ($filtering as $k => $v) {
                            echo '<input type="hidden" id="' . $k . '" name="' . $k . '" value="' . $v . '"/>';
                        }
                        ?>


                        <div class="input-group" style="width: 100%;border:0px solid black;padding-right: 15px; outline: none !important;box-shadow:none !important;">
                            <input type="text" autocomplete="off" class="form-control" id="srch-product" name="srch-product" placeholder="Pencarian Produk" style=" outline: none !important;box-shadow:none !important;">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-src"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                    <div id="rslt-product"  class="list-group" style="display: none;z-index: 9999;background:#fff;border-radius: 0px;position:absolute;border:1px solid #d2d2d2;margin-top:6px;line-height: 10px;width: 100%;box-shadow: 0px 2px 10px #d2d2d2;">

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
                            bottom: -27px;
                            right: 10px;
                            margin-right: 5px;
                            width: 0;
                            height: 0;
                            border-bottom: solid 15px #fff;
                            border-left: solid 15px transparent;
                            border-right: solid 15px transparent;
                            z-index: 100;
                        }

                        .triangle2:hover>.profile-container {
                            display: block;
                        }

                        .container-dropmenu
                        {
                            z-index: 88;
                            display: none;
                            position: absolute;
                            border:0px solid black;
                            margin-top:7px;

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
                    $_email_login = '';
                    $name_login_customer = '';
                    $_dob = '';
                    $_hp = '';
                    $_flaguser = '';
                    $_gender = '';
                    foreach ($datacustomer as $key => $vcustomer) {
                        $_email_login = $vcustomer['_email'];
                        $name_login_customer = $vcustomer['_name'];
                        $_dob = $vcustomer['_dob'];
                        $_gender = $vcustomer['_gender'];
                        $_hp = $vcustomer['_hp'];
                        $_flaguser = $vcustomer['_flag'];
                    }
                    $picture_customer = md5($_email_login);

                    if (isset($_COOKIE[COOKIE_SIGNIN]) && ($_COOKIE[COOKIE_SIGNIN])):
                        ?>
                        <div class="parent" style="border:0px solid black;margin-top:-10px;">
                            <div style="border:0px solid black;text-align: center;width: 60px;line-height: 60px;">
                                <a href = "<?= URL ?>cart" >
                                    <i class="fas fa-shopping-cart" style="color: #666;font-size:20px;"></i>
                                </a>
                            </div>
                            <div style="border:0px solid black;text-align: center;width: 60px;line-height: 60px;">
                                <a style="border:0px solid black;text-align: center;" href = "<?= URL ?>cart" >
                                    <i class="fas fa-store-alt" style="color: #666;font-size:20px;"></i>
                                </a>
                            </div>

                            <div style="border:0px solid black;text-align: right;width: 60px;line-height: 55px;">
                                <div class = "float-right custom-dropdown" style="border:0px solid black;height:40px;">
                                    <img class="img-fluid" style="width: 40px;height: 40px;border:3px solid #d2d2d2;" src="<?= PATH_IMAGE ?>customer/<?= $picture_customer ?>.jpg?a=<?= time() ?>" onerror="this.src='<?= PATH_IMAGE ?>customer/def-customer.jpg?a=<?= time() ?>';"  />

                                    <a class = "triangle2" style="font-size:12px;" href = "<?= URL ?>user" >
                                        
                                            &nbsp;
                                        
                                    </a>

                                    <style>
                                        .menu-custome-container
                                        {
                                            text-decoration: none;
                                            list-style: none;
                                            padding:10px;
                                            text-align: right;
                                            line-height: 30px;
                                        }
                                        .menu-custome-container a
                                        {
                                            color:#6a6c6c;
                                            font-size:12px;
                                            display:block;

                                        }
                                        .menu-custome-container a:hover
                                        {
                                            color:#733f98;
                                            font-weight: bold;

                                        }
                                    </style>

                                    <div class="container-dropmenu profile-menu">
                                        <div style="margin-top:11px;box-shadow: 0px 2px 10px #d2d2d2;background:white;">
                                            <ul class="menu-custome-container">
                                                <li><a href="<?= URL ?>user" class="menu-customer1">Profile</a></li>
                                                <li><a href="<?= URL ?>purchase" class="menu-customer1">Pembelian</a></li>
                                                <li><a href="<?= URL ?>wishlist" class="menu-customer1">Wishlist</a></li>
                                                <li><a href="<?= URL ?>user/logout" class="menu-customer1">Keluar</a></li>
                                            </ul>
                                        </div>
                                    </div>
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
