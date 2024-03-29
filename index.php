<?php
session_start();
// check the versions of the php
$minPHPVersion = '8.0';
if(phpversion()<$minPHPVersion){
    die("You need a minimum of PHP version $minPHPVersion to run this app");
}

define('DS', DIRECTORY_SEPARATOR);
define('ROOTPATH', __DIR__.DS);

require 'config.php';
require 'app'.DS.'core'.DS.'init.php';

$ACTIONS         = [];
$FILTERS         = [];
$APP['URL']     = split_url($_GET['url'] ?? 'home');
$APP['permissions']     = [];
$USER_DATA      =[];

// loads the plugins folder
$PLUGINS = get_plugin_folders();

// load files from the folder that return by get_plugin_folders()
if(!load_plugin($PLUGINS)){
    die("<center><h1 style='font-family:tahoma'>No plugin found! Please put at least one plugin in the plugin folder</center></h1>");
}

$APP['permissions']     = do_filter('user_permissions',$APP['permissions']);
// load website app
$app = new \Core\App;
$app->index();
