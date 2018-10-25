<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title><?= isset($this->title) ? $this->title : 'KlikPAD'; ?></title>
        <link rel="icon" href="<?= URL ?>public/img/logo.png" >
        <?php
        if (isset($this->css)) {
            foreach ($this->css as $css) {
                echo '<link rel="stylesheet" type="text/css" href="' . $css . '" />' . PHP_EOL;
            }
        }
        if (isset($this->js)) {
            foreach ($this->js as $js) {
                echo '<script type="text/javascript" src="' . $js . '"></script>' . PHP_EOL;
            }
        }
        ?>
    </head><!--/head-->

    <body>
        <div class="container text-center">
            <div class="logo-404">
                <a class="btn btn-primary" href="<?= URL ?>">BACK TO HOME</a>
            </div>
            <div class="content-404">
                <img src="<?= URL . '' ?>/public/images/404/404.png" class="img-responsive" alt="" />
                <h1><b>OPPS!</b> We Couldn’t Find this Page</h1>
                <p>Uh... So it looks like you brock something. The page you are looking for has up and Vanished.</p>
                <h2><a href="<?= URL ?>">Bring me back Home</a></h2>
            </div>
        </div>


        <script src="<?= URL . '' ?>public/js/jquery.js"></script>
        <script src="<?= URL . '' ?>public/js/price-range.js"></script>
        <script src="<?= URL . '' ?>public/js/jquery.scrollUp.min.js"></script>
        <script src="<?= URL . '' ?>public/js/bootstrap.min.js"></script>
        <script src="<?= URL . '' ?>public/js/jquery.prettyPhoto.js"></script>
        <script src="<?= URL . '' ?>public/js/main.js"></script>
    </body>
</html>