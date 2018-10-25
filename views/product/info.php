
<?php

$transfer = $this->type==1 ? 'active' : '';
$internetbanking = $this->type==2 ? 'active' : '';
$creditcard = $this->type==3 ? 'active' : '';

?>

<section>
    <div class="container">

        <div class="row" style="margin-top: 30px 0px 20px 0px;">
            <div class="col-sm-12 col-lg-12 table">
                <div class="wrapper">	
                    <div class="arrow-steps clearfix">
                        <div class="step"> <span> Step 1</span> </div>
                        <div class="step"> <span>Step 2</span> </div>
                        <div class="step current"> <span> Step 3</span> </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="cart-info col-sm-12 col-lg-12 table">
                <p>
                    <span>Terima kasih telah berbelanja di klikpad</span>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3 col-lg-3 bhoechie-tab-menu">
                <div class="list-group">
                    <a href="#" class="list-group-item text-center <?=$transfer?>">
                        <h4 class="glyphicon glyphicon-transfer"></h4><br/>Transafer
                    </a>
                    <a href="#" class="list-group-item text-center <?=$internetbanking?>">
                        <h4 class="glyphicon glyphicon-road"></h4><br/>Internet Banking
                    </a>
                    <a href="#" class="list-group-item text-center <?=$creditcard?>">
                        <h4 class="glyphicon glyphicon-credit-card"></h4><br/>Kartu Kredit
                    </a>
                </div>
            </div>
            <div class="col-sm-9 col-lg-9 bhoechie-tab">
                <div class="bhoechie-tab-content active">
                    <div class="payment-title">
                        <h2>
                            Transafer
                        </h2>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-lg-12">
                            <br>
                            <br>
                            langkah 1<hr>
                            blablabalbalbalbalbalablablabalbalbalbabal<br>
                            <br>
                            langkah 2<hr>
                            blablabalbalbalbalbalablablabalbalbalbabalblablabalbalbalbalbalablablabalb albalbabalblablabalbalbalbalbalablablabalbalbalbabalblablabalbalbalbalbalablablabalbalbalbabal
                            blablabalbalbalbalbalablablabalbalbalbabal<br>
                            blablabalbalbalbalbalablablabalbalbalbabal<br>
                            blablabalbalbalbalbalablablabalbalbalbabalblablabalbalbalbalbalablablabalbalbalbabalblablabalbalbalbalbalablablabalbalbalbabal<br>
                            <br>
                            langkah 3<hr>
                            blablabalbalbalbalbalablablabalbalbalbabal<br>
                            blablabalbalbalbalbalablablabalbalbalbabalblablabalbalbalbalbalablablabalbalbalbabalblablabalbalbalbalbalablablabalbalbalbabal<br>
                        </div>
                    </div>
                </div>
                <div class="bhoechie-tab-content">
                    <div class="payment-title">
                        <h2>
                            Internet Banking
                        </h2>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-lg-12">
                            <br>
                            <br>
                            langkah 1<hr>
                            blablabalbalbalbalbalablablabalbalbalbabal<br>
                            <br>
                            langkah 2<hr>
                            blablabalbalbalbalbalabl  ablabalbalbalbabalblablabalbalbalbalbalablablabalb albalbabalblablabalbalbalbalbalablablabalbalbalbabalblablabalbalbalbalbalablablabalbalbalbabal
                            blablaba lbalbalbalbalablablabalbalbalbabal<br>
                            blablabalbalbalbalbal ablablabalbalbalbabal<br>
                            blablabalbalbalbalbalablablabalbalbalbabalblablabalbalbalba lbalablablabalbalb albabalblablabalbalbalbalbalablablabalbalbalbabal<br>
                            <br>
                            langkah 3<hr>
                            blablabalbalbalbalba lablablabalbalbalbabal<br>
                            blablabalbalbalbal balablablabalbalbalbabalblablabalbalbal balbalablablabalbalb albabalblablabalbalbalbalbalablablabalbalbalbabal<br>
                        </div>
                    </div>
                </div>
                <div class="bhoechie-tab-content">
                    <div class="payment-title">
                        <h2>
                            Kartu Kredit
                        </h2>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-lg-12">
                            <br>
                            <br>
                            langkah 1<hr>
                            blablabalbalbalbalbalablablabalbalbalbabal<br>
                            <br>
                            langkah 2<hr>
                            blablabalbalbalbalbalablablabalbalbal
                            blablabalbalbalbalbalablablabalbalbalbabalblablabalbalbalbalbalablablabal balbalbabalblablabalbalbalbalba lablablabalbalbalbabal<br>
                            <br>
                            langkah 3<hr>
                            blablabalbalbalbalbalablablabalbalbalbabal<br>
                            blablabalbalbalbalbalablablabalbalbalbabalblablabalbalbalbalbalablablabalbalbalbabalblablabalbalbalbalbalablablabalbalbalbabal<br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
