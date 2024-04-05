<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=plugin_http_path('assets/css/style.css')?>">
    <title><?=ucfirst(page())?></title>
    <style>
        :root{
            --color1:#dde5f4;
            --color2:#f1f7fe;
            --color3:#3d4785;


        }
    </style>
</head>
<body>
    <header>
        <?php foreach($links as $key=>$link): ?>
        <a class="btn btn-primary" href="<?=ROOT?>/<?= $link->slug ?>"><?= $link->title ?></a>
        <?php endforeach ?>

    </header>
