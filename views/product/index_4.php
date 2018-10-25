<style>
    .filter-col {
        padding-right: 0px;
        padding-bottom: 0px;
    }
    .filter-title {
        font-size:15px;
        font-weight: 600;
        padding:5px 0px 10px 0px;
        border-bottom: 1px dashed grey;
    }


    .search-filter-detail {
        border:1px solid red;
        padding:2px;
        display: inline-block;
    }



    .search-filter {
        padding: 5px 0px;
        margin-bottom: 10px;
        border-bottom: 1px solid #FE980F;
    }

    .search-filter-title{
        font-size: 16px;
        font-weight: 900;
        display: inline-block;
        width: 200px;
    }


    .filter-container {
        margin-top: 10px;
        border:0px solid blue;
    }

    .panel
    {
        border:none !important;
        border-radius: 0px !important;
        -moz-box-shadow: none !important;
        -webkit-box-shadow: none !important;
        box-shadow: none !important;

    }
    .panel a
    {
        color: #000;
        text-decoration: none;
        display: block;
        font-size: 12px;
    }

    .panel-heading 
    {
        padding: 0px 0px !important;
        background: transparent !important;
    }
    .panel-heading a
    {
        font-size: 13px;
    }

    .panel-heading a:hover,.panel-heading a:active
    {
        color:#FE980F !important;

    }
    .panel-body
    {
        padding: 0px 0px 0px 5px;
        border-top:1px solid grey;
        padding-top: 3px;
    }

    .filter-menu
    {
        margin-top: 10px;
        margin-bottom: 20px;
    }

    .filter-menu a
    {
        color: #000;
        display: block;
    }
    .filter-menu a:hover,.filter-menu a:active {
        color:#FE980F !important;
    }
</style>


<script>

    $(function () {
        $(".rateyo").rateYo({
            starWidth: "20px",
            readOnly: true
        });
        $(".filter-rate").rateYo({
            starWidth: "20px",
            readOnly: true
        });
        $('body').on('click ', '.delete-flter', function () {

            var _id = $(this).attr('data-id');
            var _child_id = $(this).attr('child-id');
            $('#' + _id).remove();

            if (_child_id != "")
            {
                $('#' + _child_id).remove();
            }
            $('#frmsearch').submit();
        });

    });


</script>

<div class="row" style="margin:10px 0px;">
    <?php
    $array = $this->filter;

    $filtering = $_GET;
    unset($filtering['url']);
    unset($filtering['srch-product']);
    if (count($filtering) > 0) {
        ?>
        <div class="col-lg-2 col-sm-4" style="font-size:20px;font-weight: bold;">
            Pencarian
        </div>
        <div class="col-lg-10 col-sm-10">

            <?php
            //glfn::_pre($array);
            ksort($array);
            foreach ($array as $k => $v) {
                
                $postdata = $k ;
                $valuepost = isset($_GET[$postdata]) ? $_GET[$postdata] : '';
                $child_id = $v ? $k . 'code' : '';
                if (isset($_GET[$postdata]) ) {
                    echo '<a style="margin-right:5px;text-align:left" class="btn btn-default delete-flter" data-id="' . $k . '" child-id="' . $child_id . '">'
                    . '<span style="text-align:left;font-size:12px;">' . ucwords($k) . '</span> : '
                    . '' . $valuepost . ' '
                    . '</a>';
                } else {
                    
                }
            }
            ?>
        </div>
    <?php }
    ?>
</div>
<div class="row">
    <!--
    <div class="col-lg-12 ">
        <div class="search-filter">
            <div class="search-filter-title">Filter Pencarian </div>
            <div class="search-filter-detail">asd</div>
            <div class="search-filter-detail">asd</div>
            <div class="search-filter-detail">asd</div>

        </div>
    </div>
    -->
    <div  class="col-lg-2 col-sm-2 filter-col">
        <div class="filter-container">
            <div class="filter-title">Kategori</div>
            <div class="panel-group filter-menu" id="accordioncategory" >
                <?php
                $cat = $this->category;
//glfn::_pre($cat);
                foreach ($cat as $k => $v) {
                    $_codeheader = $v['_code'];
                    $_nameheader = $v['_name'];
                    $_photoheader = $v['_photo'];
                    $_detail = $v['_details'];
                    ?>
                    <div class="panel panel-default">
                        <div class="panel-heading" >
                            <a data-toggle="collapse" data-parent="#accordioncategory" href="#cat<?= $_codeheader ?>"><?= $_nameheader ?></a>
                        </div>
                        <div id="cat<?= $_codeheader ?>" class="panel-collapse collapse ">
                            <div class="panel-body">
                                <?php
                                foreach ($_detail as $k2 => $v2) {
                                    $_codedetail = $v2['_code'];
                                    $_namedetail = $v2['_name'];
                                    $_photodetail = $v2['_photo'];
                                    $_selecteddetail = $v2['_selected'];
                                    ?>

                                    <a href="#" data-filter="kategori" data-category ="kategoricode" data-code ="<?php echo $_codedetail; ?>" class="srchcst-filter" ><?= $_namedetail ?></a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
        <div class="filter-title">Order by</div>
        <div class="filter-menu">
            <?php
            $orderby = $this->orderby;
            foreach ($orderby as $key => $value) {
                ?>
                <a href="#" data-filter="order" data-category ="ordercode" data-code ="<?php echo $key; ?>" class="srchcst-filter" ><?= $value['srch'] ?></a>
                <?php
            }
            ?>
        </div>
        <div class="filter-title" >Rating</div>

        <div class="filter-menu" style="margin-left:-5px;">
            <div class="filter-rate" data-filter="rate" data-category ="" data-code ="5" data-rateyo-rating="5"></div>
            <div class="filter-rate" data-filter="rate" data-category ="" data-code ="4" data-rateyo-rating="4"></div>
            <div class="filter-rate" data-filter="rate" data-category ="" data-code ="3" data-rateyo-rating="3"></div>
            <div class="filter-rate" data-filter="rate" data-category ="" data-code ="2" data-rateyo-rating="2"></div>
            <div class="filter-rate" data-filter="rate" data-category ="" data-code ="1" data-rateyo-rating="1"></div>
        </div>
        <div class="filter-title" >Harga</div>
        <div class="filter-menu" >
            <input type="text" class="harga" currency id="tmpminprice" name="tmpminprice" placeholder="Harga Minimum">
            <input type="text" class="harga" currency id="tmpmaxprice" name="tmpmaxprice" placeholder="Harga Maximum">
        </div>
        <div class="filter-title" >Lokasi</div>
        <div class="filter-menu" >
            <select id="filter-lokasi" name="filter-lokasi">
                <option value="">---- Lokasi ----</option>
                <?php
                
                $listprovince = $this->listprovince;
                foreach ($listprovince as $k => $v) {
                    ?>
                    <option value="<?php echo $v['_province'] ?>"><?php echo $v['_province'] ?></option>
                    <?php
                }
                ?>    
            </select>

        </div>
    </div>
    <div class="col-lg-10 col-sm-10">
        <div class="product-container">
            <?php
            $prod = $this->prod;
            if (count($prod) > 0) {
                $prodcon = $this->prodcon;
                $page = $prodcon['page'];
                $prodcon['limitstart'];
                $prodcon['limitend'];


                $showpage = explode('.', count($prod) / $prodcon['loadproduct']);
                $showpage = count($showpage) > 1 ? ((int) (count($prod) / $prodcon['loadproduct'])) + 1 : count($prod) / $prodcon['loadproduct'];

                foreach ($prod as $k => $v) {
                    if ($k >= $prodcon['limitstart'] && $k < $prodcon['limitend']) {

                        $_date = str_replace('-', '/', $v['_createdate']);
                        $_discount = $v['_discount'];
                        $_supplier = $v['_supplier'];
                        $_picture = $v['_picture'];
                        $_name_product = $v['_name'];
                        $_code = $v['_code'];
                        $_price = $v['_price'];
                        $_weight = $v['_weight'];
                        $_name_supplier = $v['_name_supplier'];
                        $_link = $v['_link'];
                        $_province = $v['_province'];
                        $_rating = $v['_rating'] == "" || $v['_rating'] == "0" ? '' : $v['_rating'];
                        $ratestar = $v['_rating'] == "" || $v['_rating'] == "0" ? '' : 'class="rateyo" data-rateyo-rating="' . $v['_rating'] . '"';

                        $_link_thumb = $v['_link_thumb'];
                        $_discount_price = $v['_price'] - ($v['_price'] * $_discount / 100);


                        $icon_discount = '';
                        $show_price = '';

                        if ($_discount > 0) {
                            $icon_discount = '<div class="discount-icon">' . $_discount . '%<br>Sale</div>';
                            $show_price = '<span>Rp. ' . glfn::_currency($_price) . '</span>&nbsp;';
                        }

                        $icon_newitem = date('Ymdhis') < date('Ymdhis', strtotime($_date . "+7 days")) ? '<div class="new-arrival-icon">new</div>' : '';
                        ?>
                        <div class="col-lg-3 col-sm-4 col-xs-12 show-product">
                            <a href="<?= URL ?>product/detail/<?= $_code ?>">
                                <?= $icon_discount . $icon_newitem; ?>
                                <div class="product-image text">
                                    <center><img class="img-responsive" style="height:180px;" src="<?= $_link ?>"  onerror="this.src='<?= URL ?>public/img/detail_default.jpg';"  alt="" /></center>
                                </div>
                                <div class="product-name">
                                    <a href="#"></a>
                                    <?= $_name_product; ?>
                                </div>
                                <div class="product-price" >
                                    <?= $show_price . 'Rp.' . glfn::_currency($_discount_price) ?>
                                </div>
                                <div <?= $ratestar ?> style="height:30px;">

                                </div>
                                <div class="supplier-product">
                                    <a href="<?= URL ?>product?supplier=<?= $_supplier ?>">
                                        <?= $_name_supplier ?>
                                    </a>
                                    <span class="pull-right"><?php echo $_province;?></span>
                                </div>
                            </a>
                        </div>
                        <?PHP
                    }
                }
            } else {
                ?>
                <div class="cart-info-null col-sm-12 col-lg-12 table" style="padding-bottom: 300px;">
                    <p>
                        Barang Yang anda cari tidak di temukan.<br>
                        <span><a href="<?= URL ?>product">Kembali ke produk</a></span>
                    </p>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
    <div class="col-lg-12 col-sm-12" >
        <div class="pull-right">
            <?php if (count($prod) > 0) { ?>
                <ul class="pagination">
                    <?php
                    for ($i = 1; $i <= $showpage; $i++) {
                        $active = $i == $page ? 'active' : '';
                        echo '<li class="' . $active . '"><a href="#" class="link-page">' . $i . '</a></li>';
                    }
                    ?>
                </ul>

                <script type="text/javascript">
                    $('.link-page').click(function () {

                        if ($("#page").length == 0) {
                            $("#tmp-filter").after('<input type="hidden" id="page" name="page" value="' + $(this).html() + '"/>');
                        } else {
                            $('#page').val($(this).html());

                        }
                        $('#frmsearch').submit();
                        return false;

                    });
                </script>
            <?php } ?>
        </div>
    </div>
</div>
