<?php
check_extension();

function check_extension()
{
    $required_extension = [
        "gd",
        "bz2",
        "curl",
        "gettext",
        "exif",
        "mysqli",
        "pdo_mysql",
        "pdo_sqlite",

    ];
    $not_loaded = [];
    foreach ($required_extension as $extension) {
        if (!extension_loaded($extension)) {
            $not_loaded[] = $extension;
        }
    }
    if (!empty($not_loaded)) {
        die("Please load the following extension in your php.ini file. <br/>" . implode("<br/>", $not_loaded));
    }
}