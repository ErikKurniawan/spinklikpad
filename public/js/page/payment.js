$(document).ready(function () {
    $("div.bhoechie-tab-menu>div.list-group>a").click(function (e) {
        e.preventDefault();
        $(this).siblings('a.active').removeClass("active");
        $(this).addClass("active");
        var index = $(this).index();
        $("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
        $("div.bhoechie-tab>div.bhoechie-tab-content").eq(index).addClass("active");
    });

    $('#frmtransfer').bootstrapValidator({
        framework: 'bootstrap',
        Icons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },

        fields: {
            no_ref: {
                validators: {
                    notEmpty: {
                        message: 'No rekening harus diisi'
                    }
                }
            },

            name: {
                validators: {
                    notEmpty: {
                        message: 'Nama pemilik rekening harus diisi'
                    }
                }
            }
        }
    }).on('error.form.bv', function (e) {
        $('.err-server').css({'display': 'none'});
    });


    $('#frmcc').bootstrapValidator({
        framework: 'bootstrap',
        Icons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },

        fields: {
            no_ref: {
                validators: {
                    notEmpty: {
                        message: 'No kartu kredit harus diisi'
                    }
                }
            },

            name: {
                validators: {
                    notEmpty: {
                        message: 'Nama pemilik kartu kredit harus diisi'
                    }
                }
            },
            month:
                    {
                        validators:
                                {
                                    notEmpty: {
                                        message: 'Bulan kartu kredit harus diisi'
                                    }
                                }
                    },
            year:
                    {
                        validators:
                                {
                                    notEmpty: {
                                        message: 'Tahun kartu kredit harus diisi'
                                    }
                                }
                    },
            cvv:
                    {
                        validators:
                                {
                                    notEmpty: {
                                        message: 'CCV harus diisi'
                                    }
                                }
                    }
        }
    }).on('error.form.bv', function (e) {
        $('.err-server').css({'display': 'none'});
    });

    $('#frmebank').bootstrapValidator
            ({
                framework: 'bootstrap',
                Icons:
                        {
                            valid: 'glyphicon glyphicon-ok',
                            invalid: 'glyphicon glyphicon-remove',
                            validating: 'glyphicon glyphicon-refresh'
                        },

                fields:
                        {
                            no_ref:
                                    {
                                        validators:
                                                {
                                                    notEmpty:
                                                            {
                                                                message: 'User internet banking harus diisi'
                                                            }
                                                }
                                    }
                        }
            }).on('error.form.bv', function (e) {
        $('.err-server').css({'display': 'none'});
    });
});


$(function () {



});