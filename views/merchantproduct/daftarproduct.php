<?php
    $data_product = $this->product;
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

    .span-field
    {
        padding-left: 30px;
    }

</style>

<script>
// Shorthand for $( document ).ready()
    $(function () {
        $("#fileInput").change(function () {
            readURL(this,0);
        });

        $("#fileInput1").change(function () {
            readURL(this,1);
        });

        $("#fileInput2").change(function () {
            readURL(this,2);
        });

        $("#fileInput3").change(function () {
            readURL(this,3);
        });

        $("#fileInput4").change(function () {
            readURL(this,4);
        });

        $("#fileInput5").change(function () {
            readURL(this,5);
        });
    });

    function sendPU(theid)
    {
        document.getElementById('theid').value = theid;
        document.getElementById('frmdaftarproduct').action = '<?= URL ?>merchantproduct/publishunpublish';
        document.getElementById('frmdaftarproduct').submit();
    }

</script>


<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"data-keyboard="false" >
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div  class="modal-content " >


            <div id="loadcontent" class="modal-body popup-modal">

            </div>

        </div>
    </div>
</div>

<form id="frmdaftarproduct" action="" method="post" enctype="multipart/form-data">
    <div class="container-fluid section content">
        <div class="row">
            <div class="col-2" >
                <?php
                require __DIR__.'/../user/left-menu.php';
                ?>
            </div>
            <div class="col-10">
                <div class="row" style="border:1px solid #e2e7e9;padding:10px 15px;background-color: #ededed;">
                    <div class="col-6">
                        <div class="profile-fav-title">Produk</div>
                    </div>
                    <div class="col-2">
                        <div class="profile-fav-title">Harga</div>
                    </div>
                    <div class="col-2">
                        <div class="profile-fav-title">Info</div>
                    </div>
                    <div class="col-2">
                        <div class="profile-fav-title">Action</div>
                    </div>
                </div>

<?
            foreach ($data_product as $key => $value) {

                $name = 'Publish';
                $fa_icon = 'fa-eye';
                if($value['_status'] == 'publish')
                {
                    $name = 'Unpublish';
                    $fa_icon = 'fa-eye-slash';
                }
?>
                <div class="row" style="border-left:1px solid #e2e7e9;border-bottom:1px solid #e2e7e9;border-right:1px solid #e2e7e9;padding:10px 15px;">
                    <div class="col-6">
                        <div class="row">
                            <div class="col-2">
                                <img class="img-fluid" style="margin-left: auto;margin-right: auto;display: block;" src="<?= PATH_IMAGE ?>product/<?= $value['_picture'] ?>?a=<?= time() ?>" onerror="this.src='<?= PATH_IMAGE ?>logo.png?a=<?= time() ?>';"  />
                            </div>
                            <div class="col-10">
                                <?php echo $value['_name'];?>
                            </div>
                        </div>
                    </div>
                    <div class="col-2">
                        Rp. <?php echo number_format($value['_price']);?>
                    </div>
                    <div class="col-2">
                        Kategori : <?php echo $value['_category_detail'];?>
                        <br/>
                        Status : <?php echo $value['_status'];?>
                        <br/>
                        <a href="javascript:sendPU('<?php echo $value['_code']?>');"><i class="fa <?php echo $fa_icon;?>"></i> <?php echo $name;?></a>
                    </div>
                    <div class="col-2">
                        <a href="<?= URL ?>merchantproduct/editproduct"><i class="fa fa-edit"></i> Ubah</a>
                        <br/>
                        <a href="<?= URL ?>merchantproduct/duplicateproduct"><i class="fa fa-share"></i> Duplicate</a>
                    </div>
                </div>
<?
            }
?>
                <input type="hidden" name="theid" id="theid" />
            </div>
        </div>
    </div>
</form>