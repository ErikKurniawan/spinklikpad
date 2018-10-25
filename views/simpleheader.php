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
    </head>
    <body>
        