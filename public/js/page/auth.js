$(function () {
    $('#frmsignin').bootstrapValidator({
        framework: 'bootstrap', Icons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'}, fields: {
            email: {
                validators: {
                    notEmpty: {
                        message: 'Email Harus Diisi'
                    }
                }
            }, password: {
                validators: {
                    notEmpty: {
                        message: 'Password Harus Diisi'
                    }
                }}
        }
    }).on('success.form.bv', function (e) {
        e.preventDefault();
        var $form = $(e.target);
        exec_toserver($form, "1");
    });


    $('#frmsignup').bootstrapValidator({
        framework: 'bootstrap', Icons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'},
        fields: {
            email: {
                validators: {
                    notEmpty: {
                        message: 'Email Harus Diisi'
                    }, emailAddress: {
                        message: 'Format Email Harus Benar'
                    }
                }
            },
            name: {
                validators: {
                    notEmpty: {
                        message: 'Nama Harus Diisi'
                    }
                }
            }, dob: {
                validators: {
                    notEmpty: {
                        message: 'Tanggal Lahir Harus Diisi'
                    }
                }
            }, hp: {
                validators: {
                    notEmpty: {
                        message: 'No HP Harus Diisi'
                    }
                }
            },
            password: {
                validators: {
                    notEmpty: {
                        message: 'Password Harus Diisi'
                    }, identical: {
                        field: 'passwordcon',
                        message: 'Password Harus Sama Dengan Konfirmasi Password'
                    }
                }
            },
            passwordcon: {
                validators: {
                    identical: {
                        field: 'password',
                        message: 'Konfirmasi Password Harus Sama Dengan Password'
                    }
                }
            }
        }
    }).on('success.form.bv', function (e) {
        e.preventDefault();
        var $form = $(e.target);
        exec_toserver($form);
    });
});