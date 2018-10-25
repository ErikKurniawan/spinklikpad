<?php

class view {

    function __construct() {
        
    }

    /**
     * 
     * @param String $name File from folder Views
     * @param String $noInclude load folder without header and footer
     */
    public function render($name, $noInclude = '3') {
        if ($noInclude == '2') {
            require VIEWS . $name . '.php';
        } else if ($noInclude == '1') {
            require VIEWS . 'simpleheader.php';
            require VIEWS . $name . '.php';
            require VIEWS . 'simplefooter.php';
        } else {
            require VIEWS . 'simpleheader.php';
            require VIEWS . 'header.php';
            require VIEWS . $name . '.php';
            require VIEWS . 'footer.php';
            require VIEWS . 'simplefooter.php';
        }
    }

}
