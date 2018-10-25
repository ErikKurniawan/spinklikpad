
<style>
    .left-menu
    {
        border:1px solid #f1f1f1;
        padding:10px;
    }


    .left-menu ul li
    {
        padding:5px 0px;


    }

    .left-menu ul li,.left-menu ul li a
    {
        text-decoration: none;
        font-size: 12px;
        padding:0px !important;
        color:#94989b;
    }

    .left-menu ul li a
    {
        line-height: 20px;
    }

    .left-menu ul li a:active,.left-menu ul li a:hover
    {
        color: #6d6e70;
    }

    .panel-container
    {
        border:1px solid #f1f1f1;
    }

    .title-filter
    {
        line-height: 40px;
        font-size: 14px;
        font-weight: bold;
        color:#7f4197;
        border-bottom: 1px dashed #d2d2d2;
        margin-bottom: 5px;
    }

    .category-title
    {
        font-weight: bold;
        font-size: 20px;
        color: #fff;
        padding: 0 10px;
        background: #7f4197;
        height: 40px;
        line-height: 40px;
        border:2px solid #f1f1f1;
    }

</style>
<style>
    .hoverable:not(:hover) + .show-on-hover {
        display: none;
    }

    .product-hover {
        text-align: center;
        background: #231f20;
        color:#d0d1d3;
        font-size: 13px;
        line-height: 35px;

    }
    .product-card:not(:hover) + .product-hover {
        text-align: center;
        background: transparent;
        color:transparent;
        height: 35px;
    }
    .product-site-map
    {
        font-size:14px;
        color:#94989b;
    }

    .product-site-map a
    {
        font-size:14px;
        color:#94989b;
        text-decoration: none;
        margin-right:5px;
    }

    .product-site-map a:hover
    {
        color:#6d6e70;
    }

    .product-site-map div
    {
        width: 10px;
        height: 10px;

        border-bottom: 5px solid transparent;
        border-left: 5px solid #f7931d;
        border-top: 5px solid transparent;
        border-right: 5px solid transparent;
        clear: both;
        display: inline-block;
        margin: 0px 5px;
    }

    .product-site-map a:last-child
    {
        color:#7e3f98;
    }

    .row-product .col
    {

        padding: 0px 15px !important;
    }










    .col-xs-5ths,
    .col-sm-5ths,
    .col-md-5ths,
    .col-lg-5ths {
        position: relative;
        min-height: 1px;
        padding-right: 15px;
        padding-left: 15px;
    }

    .col-xs-5ths {
        width: 20%;
        float: left;
    }

    @media (min-width: 768px) {
        .col-sm-5ths {
            width: 20%;
            float: left;
        }
    }

    @media (min-width: 992px) {
        .col-md-5ths {
            width: 20%;
            float: left;
        }
    }

    @media (min-width: 1200px) {
        .col-lg-5ths {
            width: 20%;
            float: left;
        }
    }


</style>
<style>
    .fa-heart
    {
        color: #f7931d;
        font-size: 18px;
        margin-top: 4px;
    }

    .wishlist .active
    {
        color: #733f98;
    }

    .fa-heart:hover
    {
        color: #733f98;
    }
    .product-rate-star
    {
        display: inline-block;
        margin-left: -5px;
    }
</style>
<script>
    $(function () {

        $("#result").load("<?php echo URL; ?>/wishlist/listdata");


        $('body').on('click', '.wishlist', function () {

            product = $(this).attr("data");

            var check = $(this).children("i").hasClass("active");


            addlink = check ? "wishlist/delete_wh_pd" : "wishlist/add_wh_pd";



            $.post('<?php echo URL; ?>' + addlink, {'product': product}, function (a) {
                $("#result").load("<?php echo URL; ?>/wishlist/listdata");
            });
            if (check == 1)
            {
                $(this).children("i").removeClass("active");
            } else
            {
                $(this).children("i").addClass("active");
            }




            return false;
        });
    });
</script>


<div class="container-fluid section content" style="min-height: 550px;">
    <div class="row">
        <div class="col-2" >
            <?php
            require (__DIR__ .'/../user/left-menu.php');
            ?>
        </div>

        <div id="result" class="col-10">



        </div>

    </div>
</div>





