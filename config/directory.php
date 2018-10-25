<?php

/**
 * Directory
 * ended with slash (/)
 */
/* ================================================================================================================================================ */
define('LIBS', 'libs/');
define('CONTROLLERS', 'controllers/');
define('MODELS', 'models/');
define('VIEWS', 'views/');



/* -------------------------------------------------------------------------------------------------------------------------------------------------- */


$serverip = $_SERVER['SERVER_ADDR'] == "::1" ? 'localhost' : "klikpad.com";
$http = $_SERVER['SERVER_ADDR'] == "::1" ? "http" : "https";
define('DOMAIN', $serverip);
define('NAMAWEB', 'klikpad');
define('URL', $http.'://' . DOMAIN . '/' . NAMAWEB . '/');
define('URLNIKO', $http.'://' . DOMAIN . '/' . NAMAWEB . '/');





/* -------------------------------------------------------------------------------------------------------------------------------------------------- */

define('DOMAINSUPPLIER', 'klikpad.com');
define('NAMAWEBSUPPLIER', 'BKlikPaD');
define('URLSUPPLIER', 'http://' . DOMAINSUPPLIER . '/' . NAMAWEBSUPPLIER . '/');

/* -------------------------------------------------------------------------------------------------------------------------------------------------- */

define('PICGALERY', 'upload/image_detail/'); //detail photo / photo galery
define('PICTHUMBGALERY', 'upload/image_detail/thumb/'); //detail photo / photo galery thumbnail
define('PICPRIMARY', 'upload/'); //primary photo
define('PICTHUMBNAIL', 'upload/thumb/'); //thumbnail primary

/* -------------------------------------------------------------------------------------------------------------------------------------------------- */

define('DOMAINAPI', $serverip);
define('NAMAWEBAPI', 'klikpadapi');
define('URLAPI', 'http://' . DOMAINAPI . '/' . NAMAWEBAPI . '/');

/*--------------------------------------------------------------------------------------------------------------------------------------------------*/

///public access
define('VENDOR_PATH', URL.'public/vendor/');
define('CSS_PATH', URL.'public/css/');
define('JS_PATH', URL.'public/js/');
define('PATH_IMAGE', URL.'public/image/');

/* ================================================================================================================================================ */