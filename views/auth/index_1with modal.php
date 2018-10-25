<style>
    
    
    /* The Modal (background) */
    .modal-maincontainer {
        display: block; /* Hidden by default */
        position: fixed; /* Stay in place */
        padding-top: 100px; /* Location of the box */
        left: -100%;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgb(0,0,0); /* Fallback color */
        background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
        z-index:1500;
    }

    /* Modal Content */
    .modal-container {
        background-color: #fefefe;

        padding: 20px;
        border: 1px solid indigo;
    }

    /* The Close Button */
    .modal-close {
        color: #aaaaaa;
        float: right;
        font-size: 14px;
        font-weight: bold;
    }

    .modal-close:hover,
    .modal-close:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
    }
</style>




<h2>Modal Example</h2>

<a modal="#test" class="show-modal">Open Modal</a>
<div id="test" class="modal-maincontainer">
    <div class="container">
        <div class=" modal-container">        
            <span class="modal-close"><span class="glyphicon glyphicon-remove"></span></span>
            <p>Some text in the Modal..</p>
        </div>
    </div>

</div>


<a modal="#testss" class="show-modal">Open Modal2</a>
<div id="testss" class="modal-maincontainer">
    <div class="container">
        <div class=" modal-container">        
            <span class="modal-close"><span class="glyphicon glyphicon-remove"></span></span>
            <p>Some text asdasdas.</p>
        </div>
    </div>

</div>

<script>
// Get the modal

    /*
     // When the user clicks the button, open the modal 
     btn.onclick = function () {
     modal.style.display = "block";
     $(modal).animateCss('bounce');
     }
     
     // When the user clicks on <span> (x), modal-close the modal
     span.onclick = function () {
     modal.style.display = "none";
     }
     
     // When the user clicks anywhere outside of the modal, modal-close it
     
     window.onclick = function (event) {
     if (event.target == modal) {
     modal.style.display = "none";
     }
     }
     */



    $.fn.extend({
        animateCss: function (animationName) {
            var animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
            this.addClass('animated ' + animationName).one(animationEnd, function () {
                $(this).removeClass('animated ' + animationName);
            });
            return this;
        }
    });

    $(document).ready(function () {
        $('.show-modal').click(function () {
            $($(this).attr('modal')).animate({left: "0"}, 600);
        });
        $('.modal-close').click(function () {
            $('#' + $(this).closest('.modal-maincontainer').attr('id')).animate({left: "-100%"}, 600);
        });
    });




</script>



<div class="row">
    <div class="col-sm-4 col-sm-offset-1">
        <div>Masuk Ke KlikPad</div>
        <form id="frmsignin" action="<?= URL ?>auth/signin" class="form-horizontal" method="post" >
            <div class="form-group cst-inputgrp" >
                <div class="input-group ">
                    <span class="input-group-addon" style="background: white;border:1px solid #F0F0E9;"><i class="glyphicon glyphicon-user"></i></span>
                    <input id="email" type="text" class="form-control  cst-input" name="email" placeholder="Email">
                </div>
                
            </div>
            <div class="form-group cst-inputgrp" >
                <div class="inputGroupContainer">
                    <input class="form-control cst-input" type="password" name="password" id="password" placeholder="password"/>
                </div>
            </div>
            <input class="btn btn-signin pull-left"  type="submit" value="Login"/>
            <div class="checkbox lgn-checkbox pull-left">
                <label><input type="checkbox" value="">Remember me &#45; <a class="default-link" href="">Forgot password&#63;</a></label>
            </div>
        </form>
    </div>

    <div class="col-sm-1">
        <h2 class="text-align">OR</h2>
    </div>
    <div class="col-sm-4">

        <?php
        $array = array('sts' => 0, 'msg' => 'erik');
        $json = isset($_COOKIE[COOKIE_MSG_INFO]) ? $_COOKIE[COOKIE_MSG_INFO] : json_encode($array);
        glfn::_msg_server($json, $this->msgcode)
        ?>
        <div class=""><!--sign up form-->
            <h2>New User Signup!</h2>
            <form id="frmsignup" action="<?= URL ?>auth/signup" method="post" class="form-horizontal" >
                <div class="form-group cst-inputgrp" >
                    <div class="inputGroupContainer">
                        <input class="form-control cst-input" type="text" name="email" id="name" placeholder="Email"/>
                    </div>
                </div>
                <div class="form-group cst-inputgrp" >
                    <div class="inputGroupContainer">
                        <input class="form-control cst-input" type="text" name="name" id="name" placeholder="Nama"/>
                    </div>
                </div>
                <div class="form-group cst-inputgrp" >
                    <div class="inputGroupContainer">
                        <input pickerdate class="form-control cst-input" type="text" name="dob" id="dob" value="<?= date('Y/m/d') ?>" placeholder="Tanggal lahir"/>
                    </div>
                </div>
                <div class="form-group cst-inputgrp" >
                    <div class="inputGroupContainer">
                        <input number class="form-control cst-input" type="text" name="hp" id="hp" placeholder="Nomor Hp"/>
                    </div>
                </div>
                <div class="form-group cst-inputgrp" >
                    <div class="inputGroupContainer">
                        <input class="form-control cst-input" type="password" name="password" id="password" placeholder="Password"/>
                    </div>
                </div>
                <div class="form-group cst-inputgrp" >
                    <div class="inputGroupContainer">
                        <input class="form-control cst-input" type="password" name="passwordcon" id="passwordcon" placeholder="Konfirmasi Password"/>
                    </div>
                </div>
                <input class="btn btn-signup pull-left" type="submit" value="Submit"/>
            </form>
        </div><!--/sign up form-->
    </div>
</div>
