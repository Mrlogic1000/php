<?php
namespace UserManager;
defined('ROOT') OR exit("Access Denied");

/**
 * User_roles_map
 */
use \Model\Model;
class User_roles_map extends Model{

    protected $table = 'user_roles_map';
    protected $allowColumns = [
        'role_id',
        'user_id',
        'disable'

    ];
    protected $allowUpdateColumns = [
        'role_id',
        'user_id',
        'disable'
        

    ];
    // protected $onUpdateValidationRules = [
    //     "email" => [
    //         "email",
    //         "unique",
    //         "required",
    //     ],
    //     "password" => [
    //         "not_less_than_8",
    //         "required",
    //     ],
    //     "username" => [
    //         "alpha_space",
    //         "unique",
    //         "required",

    //     ],

    // ];
    // protected $onInsertValidationRules = [
    //     "email" => [
    //         "email",
    //         "unique",
    //         "required",
    //     ],
    //     "password" => [
    //         "not_less_than_8",
    //         "required",
    //     ],
    //     "username" => [
    //         "alpha_space",
    //         "unique",
    //         "required",

    //     ],

    // ];



   
}