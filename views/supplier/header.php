
<?php
$_datatoko = $this->supplier;



$_email = "";
$_name = "";
$_address = "";
$_nohp = "";
$_createdate = "";
$_province = "";
$_subprovince = "";
$_district = "";
$_subdistrict = "";
$_image = "";
$_image_banner = "";

foreach ($_datatoko as $k => $v) {
    $_email = $v['_email'];
    $_name = $v['_name'];
    $_address = $v['_address'];
    $_nohp = $v['_nohp'];
    $_createdate = $v['_createdate'];
    $_province = $v['_province'];
    $_subprovince = $v['_subprovince'];
    $_district = $v['_district'];
    $_subdistrict = $v['_subdistrict'];
    $_image = $v['_image'];
    $_image_banner = $v['_image_banner'];
}

$avgsupplierulasan = 0;
$supplierulasan = $this->supplierulasan;
foreach ($supplierulasan as $k => $v) {

    $avgsupplierulasan += $v['_rating'];
}

$finalulasanavgsupplier = count($supplierulasan) > 0 ? $avgsupplierulasan / count($supplierulasan) : 0;
?>

<script>
    $(function () {
        $(".supplier-rate-star").rateYo({
            ratedFill: '#d91b5b',
            starWidth: "15px",
            readOnly: true
        });
    });
</script>

<div class="container-fluid section content" style="margin-top: -25px;">
    <div >
        <img style="width:100%;height:200px; " class="img-fluid" src="<?= PATH_IMAGE ?>merchant/<?= $_image_banner ?>?a=<?= time() ?>" onerror="this.src='<?= PATH_IMAGE ?>logo.png?a=<?= time() ?>';"/>
    </div>
    <div class="parent3" style="font-size: 12px;">
        <div style="padding: 0px 10px;width:160px;">
            <img style="margin-top: -30px;width: 128px;height: 128px;border:3px solid #d2d2d2;background:white;" class="img-fluid" src="<?= PATH_IMAGE ?>merchant/<?= $_image ?>?a=<?= time() ?>" onerror="this.src='<?= PATH_IMAGE ?>logo.png?a=<?= time() ?>';"/>
        </div>
        <div style="">
            <div class="parent2">
                <div style="border:0px solid black;padding:10px; width: 40%">
                    <div style="font-weight: bold;color:#733f98"><?= $_name ?></div>
                    <div style="color:#95999A;"><?= $_nohp ?></div>
                    <div style="color:#95999A;"><?= $_createdate ?></div>
                </div>
                <div style="border:0px solid black;padding:10px;text-align: right">

                    <?= $_province ?>
                    <?= $_subprovince ?>
                    <?= $_district ?>
                    <?= $_subdistrict ?>
                    <div style="border:0px solid black;text-align: right;height: 50px;padding:5px;dis">
                        <div style="text-align:right;padding-right: 30px;margin-bottom: 5px;"><?=$finalulasanavgsupplier?></div>
                        <div style="" class="supplier-rate-star float-right" data-filter="rate" data-category ="" data-code ="5" data-rateyo-rating="<?= rtrim($finalulasanavgsupplier, 0) ?>"></div>
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

