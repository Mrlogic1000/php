<?php
namespace Model;
defined('ROOT') OR exit("Access Denied");
class User{
    protected $table = 'users';
    protected $allowColumns = [
        'user',
        'email',
        'password',
        
    ];
    protected $allowUpdateColumns = [
        'user',
        'email',
        'date_updated',
    ];
function __construct(){
    dd("This is from user");
}
}