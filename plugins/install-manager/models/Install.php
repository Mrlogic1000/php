<?php
namespace InstallManager;
defined('ROOT') OR exit("Access Denied");

/**
 * Install
 */use \Model\Model;

class Install extends Model{

    protected $table = 'installs';
    protected $allowColumns = [
        'description',
        'user_id',
        'device_id',
        'outlet_id',
        'date_created',
        'date_created',

    ];
    protected $allowUpdateColumns = [
        'description',
        'user_id',
        'device_id',
        'outlet_id',
        'date_updated',
        'date_deleted',
        'deleted',
        

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