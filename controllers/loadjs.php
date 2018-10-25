<script>


    function courier_prize()
    {
        $.post('<?php echo URL; ?>cart/courier_package_price', {'qty': $('#qty').val(), 'price': $('#price').val(), 'courier': $('#courier').val(), 'courier_package': $('#courier_package').val(), 'weight': '<?= $_weight ?>', 'supplier': '<?= $_supplier ?>', 'seqaddress': $('#address_seq').val()}, function (a) {
            $('#price-courier').html(a);
        });
    }

    $(document).ready(function () {



        $('#courier').change(function () {
            $.post('<?php echo URL; ?>cart/courier_package', {'courier': $('#courier').val(), 'courier_package': ''}, function (a) {
                //alert(a);
                $('#courier_package').html(a);
                courier_prize();
            });

        });

        $('#courier_package').change(function () {
            courier_prize();
        });


        $('#frmadddtocart').bootstrapValidator({
            framework: 'bootstrap',
            Icons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },

            fields: {
                address: {
                    validators: {
                        notEmpty: {
                            message: 'Silahkan Pilih Alamat'
                        }
                    }
                },
                courier: {
                    validators: {
                        notEmpty: {
                            message: 'Silahkan Pilih Kurir'
                        }
                    }
                },
                courier_package: {
                    validators: {
                        notEmpty: {
                            message: 'Silahkan Pilih Paket'
                        },
                        stringLength: {
                            min: 1,
                            message: 'The username must be more than 6 and less than 30 characters long'
                        }
                    }
                }
            }
        }).on('success.form.bv', function (e) {
            e.preventDefault();
            $.post('<?php echo URL; ?>cart/addtocart', $("#frmadddtocart").serialize(), function (a) {
                $('#formaddtocartpopup').html(a);
            });
            return false;
        });


        $("#qty").blur(function () {
            alert(1);
        });
        $('.cart-address').click(function () {
            $('#address_seq').val($(this).attr('seq'));
            $.post('<?php echo URL; ?>cart/select_address', {'seq': $(this).attr('seq')}, function (a) {
                $('#address').val(a);


            });
            courier_prize();
            return false;
        });

        courier_prize();
    });



</script>