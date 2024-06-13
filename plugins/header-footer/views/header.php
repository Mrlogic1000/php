<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=plugin_http_path('assets/css/style.css')?>">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
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

        <?php if(!empty($links)): ?>            
        <?php foreach($links as $key=>$link): ?>
            <?php if(user_can($link->permission)): ?>            
            <a class="btn btn-primary" href="<?=ROOT?>/<?= $link->slug ?>"><?= $link->title ?></a>
            <?php endif ?>
        <?php endforeach ?>
        <?php endif ?>
        

    </header>
