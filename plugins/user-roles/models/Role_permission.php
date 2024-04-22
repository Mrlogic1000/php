<?php
namespace UserRoles;
use \Model\Model;
defined('ROOT') OR exit("Access Denied");

/**
 * Role_permission
 */
class Role_permission extends Model{

    protected $table = 'role_permissions';
    protected $allowColumns = [
        'role',
        'permission',
        'disable',

    ];
    protected $allowUpdateColumns = [
        'role',
        'permission',
        'disable',
        

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