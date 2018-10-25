<?php

session_start();

require './config.php';
require './Veritrans.php';

spl_autoload_register(function($class) {
    if (file_exists('./' . LIBS . $class . '.php')) {
        require_once './' . LIBS . $class . '.php';
    }
});

$app = new application();


//echo enhash::_hash_password('1');
