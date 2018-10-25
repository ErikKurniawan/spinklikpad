

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div  class="modal-content " >


            <div id="loadcontent" class="modal-body popup-modal">
                ...
            </div>

        </div>
    </div>
</div>


<script type="text/javascript">
    $(document).ready(function () {

        $('#listcart').load('<?= URL ?>cart/listdata');

        $('body').on('click', '.delete-cart-item', function () {
            //showloadingscreen(1);
            $.post('<?php echo URL; ?>cart/formdelete', {'product': $(this).attr('product'), 'code_detail_transaction': $(this).attr('code_detail_transaction')}, function (a) {
                //hideloadingscreen(1);

                $('#loadcontent').html(a);
            });
            $("#exampleModalCenter").modal();

            return false;
        });


        $('body').on('click', '.edit-cart-item', function () {
            $.post('<?php echo URL; ?>cart/formaddcart', {'product': $(this).attr('product'), 'code_detail_transaction': $(this).attr('code_detail_transaction')}, function (a) {
                $('#loadcontent').html(a);
            });
            $("#exampleModalCenter").modal();

            return false;
        });


        $('body').on('click', '.edit-cart-item', function () {
            $.post('<?php echo URL; ?>cart/formaddcart', {'product': $(this).attr('product'), 'code_detail_transaction': $(this).attr('code_detail_transaction')}, function (a) {
                $('#loadcontent').html(a);
            });
            $("#exampleModalCenter").modal();

            return false;
        });



        $('body').on('click', '.btn-checkout', function () {
            //alert($(this).attr("data"));
            $.post('<?php echo URL; ?>payment/add', {'code': $(this).attr("data")}, function (a) {
                var obj = JSON.parse(a);
                //alert(a)
                if (obj.sts === 1) {
                    window.location.href = "<?= URL ?>payment/info";
                } else
                {
                    window.location.href = "<?= URL ?>product";
                }
            });

        });

    });
</script>


<div id="listcart" class="container-fluid content section">

</div>