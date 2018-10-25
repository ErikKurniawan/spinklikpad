<br>
<br>
<section>
    <div class="container">
        <div class="row">
            <?php glfn::_userleftmenu(); ?>
            <div class="col-sm-9 col-lg-9">
                <div class="tab-contanier">
                    <div class="title-user">Purchase Done</div>
                    <div class="btn-tabcontainer">
                        <ul class="btn-tab">
                            <li class=""><a href="<?php echo URL . 'purchase' ?>">Ongoing</a></li>
                            <li class="active"><a href="<?php echo URL . 'purchase/done' ?>">Done</a></li>
                        </ul>
                    </div>
                    <div class="content-tab row">
                        <div class="col-sm-12 col-lg-12">
                            <table border="1" class="tbl-wishlsit" >
                                <?php
                                $purchasedata = $this->listpurchase;
								
                                foreach ($purchasedata as $k => $v) {

                                    if ($k == "0") {
                                        ?>
                                        <tr>
                                            <td class="col-sm-4 col-lg-4 cst-addr" >
                                                No Transaksi
                                            </td>
											
                                            <td class="col-sm-2 col-lg-4 cst-addr" >
                                                Status
                                            </td>
                                            <td class="col-sm-2 col-lg-4 cst-addr" >
                                                Pajak
                                            </td>
                                            <td class="col-sm-4 col-lg-4 cst-addr" >
                                                Tanggal Transaksi
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                    $_code = $v['_code'];
                                    $_tax = $v['_tax'];
                                    $_createdate = $v['_createdate'];
                                    ?>

                                    <tr>
                                        <td class="col-sm-4 col-lg-4 cst-addr" >
                                            <a class="wh-name-product" href="<?= URL ?>purchase/detail/<?= $v['_code'] ?>"><?= $v['_code'] ?></a>
                                        </td>
										<td class="col-sm-2 col-lg-2 cst-addr" >
										<?= $v['_name'] ?> 
										</td>
                                        <td class="col-sm-2 col-lg-2 cst-addr" >
                                            <?= $v['_tax'] ?> %
                                        </td>
                                        <td class="col-sm-4 col-lg-2 cst-addr" >
                                            <?= $_createdate ?>
                                        </td>
                                    </tr>

                                    <?php
                                }
                                ?>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>

<style>
    .tbl-wishlsit
    {
        width: 100%;
        margin:30px 0px;
    }
    .tbl-wishlsit td
    {
        padding:10px;
    }
    .wh-name-product
    {
        text-decoration: none;
        font-size: 22px;
        font-weight: bold;

    }
    .wh-name-product:hover
    {
        color: #FE980F;

    }

</style>

<script>
    $(document).ready(function () {
        $('.removewishlist').click(function () {
            $.post('<?php echo URL; ?>product/removewishlist', {'product': $('#product').val()}, function (a) {
                $('.addwishlist').css({
                    'display': 'block'
                });
                $('.removewishlist').css({
                    'display': 'none'
                });
            });
            return false;
        });
    });
</script>