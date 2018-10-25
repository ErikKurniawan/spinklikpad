<div id="pupcart" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Cart</h4>
            </div>
            <div class="modal-body">
                <div id="cart-content">
                </div>
                <p>Some text in the modal.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<section>
    <div class="container">
        <div class="row">
            <?php
            echo $this->formsearch;
            ?>
            <div class="col-sm-3">
                <div class="left-sidebar">

                    <script type="text/javascript">
                        $(document).ready(function () {
                            $('.submitprod').click(function () {
                                $('#' + $(this).attr('field')).val($(this).attr('key'));
                                $('#page').val('');
                                $('#frmsearch').submit();

                                return false;
                            });
                            $("#srchproduct").bind('blur keyup', function (e) {
                                if (e.type == 'blur' || e.keyCode == '13') {
                                    $('#frmsearch').submit()
                                    return false;
                                }
                            });
                        });
                    </script>

                    <script type="text/javascript">
                        $(document).ready(function () {
                            $('.add-item').click(function () {
                                var code = $(this).attr('key');
                                var md = $(this).attr('md');
                                var objadditem = {'code': code, 'qty': 1, 'flag': 'N'};
                                $.post('product/addtocart', {'code': code, 'qty': 1, 'flag': 'N'}, function (a) {
                                    $('#cart-content').html(a);
                                });
                                $('#pupcart').modal('show');
                                return false;
                            });
                        });
                    </script>

                    <h2>Category</h2>
                    <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                        <?php
                        $cat = $this->category;

                        foreach ($cat as $k => $v) {
                            $active = ($v['_selected']) ? 'active' : '';
                            echo '<div class="panel panel-default">' .
                            '<div class="panel-heading">' .
                            '<h4 class="panel-title">' .
                            '<a class="' . $active . '" data-toggle="collapse" data-parent="#accordian" href="#ac' . $v['_code'] . '">' .
                            '<span class="badge pull-right"><i class="fa fa-plus"></i></span>' .
                            $v['_name'] .
                            '</a>' .
                            '</h4>' .
                            '</div>' .
                            '<div id="ac' . $v['_code'] . '" class="panel-collapse collapse">' .
                            '<div class="panel-body">' .
                            '<ul>';
                            foreach ($v['_details'] as $k2 => $v2) {
                                $active = ($v2['_selected']) ? 'active' : '';
                                echo '<li class="' . $active . '"><a href="#" field="category" class="submitprod" key="' . $v2['_code'] . '">' . $v2['_name'] . '</a></li>';
                            }
                            echo
                            '</ul>' .
                            '</div>' .
                            '</div>' .
                            '</div>';
                        }
                        ?> 
                    </div>
                    <h2>Order By</h2>
                    <div class="brands-name">
                        <ul class="nav nav-pills nav-stacked">
                            <?php
                            $orderby = $this->orderby;
                            foreach ($orderby as $key => $value) {
                                $classactive = $value['selected'] ? 'active' : '';
                                echo '<li><a href="" class="submitprod ' . $classactive . '" field="orderby" key="' . $key . '">' . $value['srch'] . '</a></li>';
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-sm-9 padding-right">
                <div class="features_items">
                    <h2 class="title text-center">Items</h2>
                    <?php
                    $prod = $this->prod;
                    $prodcon = $this->prodcon;
                    $page = $prodcon['page'];
                    $prodcon['limitstart'];
                    $prodcon['limitend'];


                    $showpage = explode('.', count($prod) / $prodcon['loadproduct']);
                    $showpage = is_array($showpage) ? ((int) (count($prod) / $prodcon['loadproduct'])) + 1 : count($prod) / $prodcon['loadproduct'];

                    foreach ($prod as $k => $v) {
                        if ($k >= $prodcon['limitstart'] && $k < $prodcon['limitend']) {

                            $_date = str_replace('-', '/', $v['_createby']);
                            $_discount = $v['_discount'];
                            $checknew = date('Ymdhis') < date('Ymdhis', strtotime($_date . "+7 days")) ? ''
                                    . '<img src="' . URL . 'public/images/home/new.png" class="new" alt="" />' : '';
                            $_title = $v['_title'];
                            $_code = $v['_code'];
                            $_price = explode('.', $v['_price']);
                            $_discount_price = $v['_price'] - ($v['_price'] * $_discount / 100);
                            $_discount_show = explode('.', $_discount_price);
                            $path = $_SERVER['DOCUMENT_ROOT'] . '/' . NAMAWEB . '/public/img/' . $_code . '.jpg';
                            $pic = file_exists($path) ? URL . '/public/img/' . $_code . '.jpg' : URL . 'public/img/default.jpg';
                            //echo $pic;

                            /*
                              $filename = $pic;
                              $percent = 0.5;
                              list($width, $height) = getimagesize($filename);
                              $new_width = $width;
                              $new_height = 200;
                              $image_p = imagecreatetruecolor($new_width, $new_height);
                              $image = imagecreatefromjpeg($filename);
                              imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

                              // Output
                              //imagejpeg($image_p, null, 100);
                             */

                            if ($_discount > 0) {
                                $showprice = '<div style="border:0px solid black;display:block;position:relative;">' .
                                        '<del>' .
                                        '<h4 class="">Rp. ' . number_format($_price[0]) . '.' . $_price[1] . '</h4>' .
                                        '</del>' .
                                        '<img src = "' . URL . 'public/images/home/sale.png" class = "sale" alt = "" />' .
                                        '</div>' .
                                        '<h2>Rp. ' . number_format($_discount_show[0]) . '.' . $_discount_show[1] . '</h2>';
                            } else {
                                $showprice = '<h2>Rp. ' . number_format($_price[0]) . '.' . $_price[1] . '</h2>';
                            }

                            if ($_discount > 0) {
                                $showprice = '<div style="border:1px solid black;display:block;position:relative;height:60px">
                                            <del>
                                            <h4 class="">Rp. ' . number_format($_price[0]) . '.' . $_price[1] . '</h4>
                                            </del>
                                            <img style="margin-right:3px;margin-top:3px;" src="' . URL . 'public/images/home/sale.png" class="sale" alt="" />
                                            </div>
                                            <h2>Rp. ' . number_format($_discount_show[0]) . '.' . $_discount_show[1] . '</h2>';
                            } else {
                                $showprice = '<h2>Rp. ' . number_format($_price[0]) . '.' . $_price[1] . '</h2>';
                            }
                            echo
                            '<div class="col-sm-4">
                            <div class="product-image-wrapper">
                            <div class="single-products">
                            <div class="productinfo text-center">
                            <img class="product-pic" src="' . $pic . '" alt="" />
                                <div style="text-align:left;">
                            Rp. ' . number_format($_discount_show[0]) . '.' . $_discount_show[1] . '
                                </div>
                            <p>' . $_title . '</p>
                            <a class="add-item btn btn-default add-to-cart" md="add" key="' . $_code . '">
                            <i class = "fa fa-shopping-cart"></i>
                            Add to cart
                            </a>
                            <a href = "product-details.php?p=' . $_code . '" class = "btn btn-default add-to-cart"><i class = "fa fa-eye"></i>view detail</a>
                            </div>
                            <div class = "product-overlay">
                            <div class = "overlay-content">
                            Rp. ' . number_format($_discount_show[0]) . '.' . $_discount_show[1] . '
                            <p>' . $_title . '</p>
                            <a class = "add-item btn btn-default add-to-cart" md = "add" key = "' . $_code . '"><i class = "fa fa-shopping-cart"></i>Add to cart</a>
                            <a href = "product-details.php?p=' . $_code . '" class = "btn btn-default add-to-cart"><i class = "fa fa-eye"></i>view detail</a>
                            </div>
                            </div>
                            ' . $checknew . '
                            </div>
                            <div class = "choose">
                            <ul class = "nav nav-pills nav-justified">
                            <li>
                            <a href = "#"><i class = "fa fa-plus-square"></i>
                            Add to wishlist</a>
                            </li>
                            <li><a href = "#"><i class = "fa fa-plus-square"></i>Add to compare</a></li>
                            </ul>
                            </div>
                            </div>
                            </div>
                            ';
                        }
                    }
                    ?>
                </div><!--features_items-->

                <div class="pull-right">
                    <ul class="pagination">
                        <?php
                        for ($i = 1; $i <= $showpage; $i++) {
                            $active = $i == $page ? 'active' : '';
                            echo '<li class="' . $active . '"><a href="" class="link-page">' . $i . '</a></li>';
                        }
                        ?>
                    </ul>

                    <script type="text/javascript">
                        $('.link-page').click(function () {
                            $('#page').val($(this).html());
                            $('#frmsearch').submit();
                            return false;
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
</section>