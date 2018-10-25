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

    .profile-fav-title
    {
        color:#6a6c6c;
        font-size:14px;
        border-bottom: 1px solid #e2e7e9;
        padding-bottom: 10px;
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

</style>
<div class="container-fluid section content">



    <?php
    $datacustomer = glfn::_datacustomer();


    $_email_login = '';
    $name_login_customer = '';
    $_dob = '';
    $_hp = '';
    $_flaguser = '';
    foreach ($datacustomer as $key => $vcustomer) {
        $_email_login = $vcustomer['_email'];
        $name_login_customer = $vcustomer['_name'];
        $_dob = $vcustomer['_dob'];
        $_hp = $vcustomer['_hp'];
        $_flaguser = $vcustomer['_flag'];
    }
    $picture_customer = md5($_email_login);
    ?>



    <div class="row">
        <div class="col-3" >
            <div style="border:5px solid #e2e7e9; width: 270px;height: 270px;position: relative;display: table;">
                <div style="display: table-cell; vertical-align:middle; ">

                    <img class="img-fluid" style="margin-left: auto;margin-right: auto;display: block;" src="<?= PATH_IMAGE ?>customer/<?= $picture_customer ?>.jpg?a=<?= time() ?>" onerror="this.src='<?= PATH_IMAGE ?>customer/def-customer.jpg?a=<?= time() ?>';"  />
                </div>
            </div>
        </div>
        <div class="col-9">
            <div style="border:1px solid #e2e7e9;padding:10px 15px;">
                <a href="<?= URL ?>user/profile" class="btn btn-profile-change"><i class="fas fa-cog"></i> Ubah</a>
                <div class="profile-name">
                    <?= $name_login_customer ?>
                </div>
                <div class="profile-data">
                    <i class="fas fa-envelope"></i> <span><?= $_email_login ?></span>
                </div>
                <div class="profile-data">

                    <i class="fas fa-phone"></i><span><?= $_hp ?></span>
                </div>
                <div class="profile-data">
                    <i class="fas fa-calendar-alt"></i> <span><?= $_dob ?></span>

                </div>
                <!--
                <div class="profile-data">
    
                    <i class="fas fa-map-marked-alt"></i> <span>Jalan Duri Mas 2 Blok D no 34B Jakarta Barat, Duri Kepa, Kebon Jeruk </span>
    
                </div>
                -->
            </div>
        </div>
    </div>

</div>



<div class="container-fluid section content">
    <div style="border:1px solid #e2e7e9;padding:10px 15px;border-radius:5px;">
        <div class="profile-fav-title">Toko Favorit <span class="badge badge-secondary">10</span></div>
        <div class="profile-fav-supplier" style="padding:10px 0px;">

            <div class="profile-container-supplier-icon">
                <img class="rounded-circle img-fluid" src="<?= PATH_IMAGE ?>asset/komputer.png" title="kategory 1"/>
                <div>Toko 1</div>
            </div>
            <div class="profile-container-supplier-icon">
                <img class="rounded-circle img-fluid" src="<?= PATH_IMAGE ?>asset/otomotif.png" title="kategory 1"/>
                <div>Toko 2</div>
            </div>
            <div class="profile-container-supplier-icon">
                <img class="rounded-circle img-fluid" src="<?= PATH_IMAGE ?>asset/pakaianpria.png" title="kategory 1"/>
                <div>Toko 3</div>
            </div>
        </div>
    </div>
</div>    