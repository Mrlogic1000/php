<?php
define("DEBUG",true);
define('APP_NAME','MRlogic');
define('APP_TITLE','property managment');


if ((empty($_SERVER["SERVER_NAME"]) && PHP_SAPI == 'cli')|| (!empty($_SERVER["SERVER_NAME"]) && $_SERVER["SERVER_NAME"]=='localhost')) {
      
   
    // Database name
    define("DB_NAME", "pluginphp_db");

    // Database user
    define("DB_USER", "root");

    // Database password
    define("DB_PASSWORD", "");

    // Database hostname
    define("DB_HOST", "127.0.0.1");

    // Database driver
    define("DB_DRIVER", "mysql");

    define("ROOT",'http://localhost/pluginphp');

} else {
    define("ROOT", "http://yourdomain.com");
}

