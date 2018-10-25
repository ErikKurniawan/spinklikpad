


<?php
$cartlist = $this->cartlist;
//glfn::_pre($cartlist);

$_code = '';
$_tax = '';
$_status = '';
$_detail = array();
foreach ($cartlist as $k => $v) {
    $_code = $v['_code'];
    $_tax = $v['_tax'];
    $_status = $v['_status'];
    $_detail = $v['_detail'];
}

$grandtotal = 0;
foreach ($_detail as $k => $v) {
    $_code_detail_transaction = $v['_code_detail_transaction'];
    $_transaction = $v['_transaction'];
    $_supplier = $v['_supplier'];
    $_address = $v['_address'];
    $_courier = $v['_courier'];
    $_courier_package = $v['_courier_package'];
    $_courier_price = $v['_courier_price'];
    $_no_delivery = $v['_no_delivery'];
    $_sts_delivery = $v['_sts_delivery'];
    $_name_supplier = $v['_name_supplier'];
    $_details = $v['_details'];


    $totalbarang = 0;
    $totalberatbarang = 0;
    $totalhargabarang = 0;
    foreach ($_details as $k2 => $v2) {
        $_code_detail_transaction = $v2['_code_detail_transaction'];
        $_product = $v2['_product'];
        $_price = $v2['_price'];
        $_qty = $v2['_qty'];
        $_weight = $v2['_weight'];
        $_desc = $v2['_desc'];
        $_name_product = $v2['_name_product'];
        $hargabarang = $_qty * $_price;
        $totalbarang += $_qty;
        $totalberatbarang += $_weight * $_qty * 0.001;
        $totalhargabarang += $hargabarang;


        $totalhargabarangppn = $totalhargabarang * $_tax * 0.01;
        //echo glfn::_currency($totalhargabarangppn);

        $asd = explode('.', $totalberatbarang);
        $beratround = isset($asd[1]) && ($asd[1]) > 0 ? (int) $asd[0] + 1 : $asd[0];

        $total_biaya_kurir = $beratround * $_courier_price;
        ///echo glfn::_currency($total_biaya_kurir);

        $total = $total_biaya_kurir + $totalhargabarangppn + $totalhargabarang;
        //echo 'Total <span>Rp. ' . glfn::_currency($total) . '</span>';

        $grandtotal += $total;
    }
}
?>



<section>
    <div class="container">
        <div class="row" style="margin-top: 30px 0px 20px 0px;">
            <div class="col-sm-12 col-lg-12 table">
                <div class="wrapper">	
                    <div class="arrow-steps clearfix">
                        <div class="step"> <span> Step 1</span> </div>
                        <div class="step current"> <span>Step 2</span> </div>
                        <div class="step"> <span> Step 3</span> </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        $cartlist = $this->cartlist;

        if ($_code == "") {
            ?>
            <div class="cart-info-null col-sm-12 col-lg-12 table" style="padding-bottom: 300px;">
                <p>
                    Keranjang belanja Anda kosong.<br>
                    <span><a href="<?= URL ?>product">Ayo mulai berbelanja</a></span>
                </p>
            </div>
            <?php
        } else {
            ?>
            <div class="row">
                <div class="cart-info col-sm-12 col-lg-12 table">
                    <p>
                        <span>Silakan pilih metode pembayaran,</span>
                        dan <span>Bank tujuan.</span>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3 col-lg-3 bhoechie-tab-menu">
                    <div class="list-group">
                        <a href="#" class="list-group-item active text-center">
                            <h4 class="glyphicon glyphicon-transfer"></h4><br/>Transafer
                        </a>
                        <a href="#" class="list-group-item text-center">
                            <h4 class="glyphicon glyphicon-road"></h4><br/>Internet Banking
                        </a>
                        <a href="#" class="list-group-item text-center">
                            <h4 class="glyphicon glyphicon-credit-card"></h4><br/>Kartu Kredit
                        </a>
                    </div>
                </div>
                <div class="col-sm-9 col-lg-9 bhoechie-tab">
                    <div class="bhoechie-tab-content active">
                        <div class="payment-title">
                            <h2>
                                Transafer
                                <div class="total-bayar pull-right payment-total">Total <span>Rp. <?php echo glfn::_currency($grandtotal); ?></span></div>
                            </h2>
                        </div>
                        <div class="row">
                            <div class="col-sm-8 col-lg-8">
                                <form class="frm-payment" id="frmtransfer" action="<?php echo URL . 'product/paymentdo' ?>" class="form-horizontal" method="post">
                                    <div class="form-group">
                                        <div class="inputGroupContainer"><select class="form-control cst-input" id="bank" name="bank">
    <?php
    $arraybanklist = $this->bank;
    if (isset($arraybanklist ['data']) && is_array($arraybanklist ['data'])) {
        $banklist = $arraybanklist ['data'];

        foreach ($banklist as $k => $v) {
            echo '<option value ="' . $v['_code'] . '">' . $v['_name'] . '</option>';
        }
    }
    ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="inputGroupContainer">
                                            <input number class="form-control cst-input" type="text" name="no_ref" id="no_ref" placeholder="Nomor Rekening" autofocus/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="inputGroupContainer">
                                            <input class="form-control cst-input" type="text" name="name" id="name" placeholder="Nama Pemilik rekening"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="inputGroupContainer">
                                            <input class="btn btn-signin " type="submit" value="Submit"/>
                                            <input type="hidden" name="type" value="1"/>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-sm-4 col-lg-4">
                                <div class="frm-payment">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bhoechie-tab-content">
                        <div class="payment-title">
                            <h2>
                                Internet Banking
                                <div class="total-bayar pull-right payment-total">Total <span>Rp. <?php echo glfn::_currency($grandtotal); ?></span></div>
                            </h2>
                        </div>
                        <div class="row">
                            <div class="col-sm-8 col-lg-8">
                                <form class="frm-payment" id="frmebank" action="<?php echo URL . 'product/paymentdo' ?>" class="form-horizontal" method="post">
                                    <div class="form-group">
                                        <div class="inputGroupContainer"><select class="form-control cst-input" id="bank" name="bank">
    <?php
    $arraybanklist = $this->bank;
    if (isset($arraybanklist ['data']) && is_array($arraybanklist ['data'])) {
        $banklist = $arraybanklist ['data'];

        foreach ($banklist as $k => $v) {
            echo '<option value ="' . $v['_code'] . '">' . $v['_name'] . '</option>';
        }
    }
    ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="inputGroupContainer">
                                            <input class="form-control cst-input" type="text" name="no_ref" id="no_ref" placeholder="User Internet Banking" autofocus/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="inputGroupContainer">
                                            <input type="hidden" name="type" value="2"/>
                                            <input class="btn btn-signin " type="submit" value="Submit"/>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-sm-4 col-lg-4">
                                <div class="frm-payment">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bhoechie-tab-content">
                        <div class="payment-title">
                            <h2>
                                Kartu Kredit
                                <div class="total-bayar pull-right payment-total">Total <span>Rp. <?php echo glfn::_currency($grandtotal); ?></span></div>
                            </h2>
                        </div>
                        <div class="row">
                            <div class="col-sm-8 col-lg-8">
                                <form class="frm-payment" id="frmcc" action="<?php echo URL . 'product/paymentdo' ?>" class="form-horizontal" method="post">
                                    <div class="form-group">
                                        <div class="inputGroupContainer">
                                            <input number class="form-control cst-input" type="text" name="no_ref" id="no_ref" placeholder="Nomor Kartu Kredit" autofocus/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="inputGroupContainer">
                                            <input class="form-control cst-input" type="text" name="name" id="name" placeholder="Nama Pemilik Kartu Kredit"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="inputGroupContainer" style="position:relative;">
                                            <select class="form-control cst-input cst-3number" name="month" id="month">
                                                <option value="">mm</option>
    <?php
    for ($i = 1; $i <= 12; $i++) {
        ?>
                                                    <option value="<?= $i ?>"><?= $i ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                            /
                                            <select class="form-control cst-input cst-3number" name="year" id="year" >
                                                <option value="">yy</option>
    <?php
    $startyear = date('y') - 5;
    $endtyear = date('y') + 5;

    for ($startyear; $startyear <= $endtyear; $startyear++) {
        ?>
                                                    <option value="<?= $startyear ?>"><?= $startyear ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                            <input number class="form-control cst-input cst-3number pull-right" type="text" name="cvv" id="cvv" placeholder="CVV"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="inputGroupContainer">
                                            <input type="hidden" name="type" value="3"/>
                                            <input class="btn btn-signin " type="submit" value="Submit"/>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-sm-4 col-lg-4">
                                <div class="frm-payment">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<?php } ?>
    </div>
</div>
</section>