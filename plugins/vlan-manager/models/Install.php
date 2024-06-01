<?php
namespace OutletManager;
defined('ROOT') OR exit("Access Denied");

/**
 * Install
 */use \Model\Model;

class Install extends Model{

    protected $table = 'install';
    protected $allowColumns = [
        'comment',
        'software',
        'version',
        'user_id',
        'device_id',
        'outlet_id',
        'date_created',
        'date_created',

    ];
    protected $allowUpdateColumns = [
        'comment',
        'software',
        'version',
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
    protected $onInsertValidationRules = [
        "router" => [
            "unique",
            "required",
        ],
        "mac" => [
            "unique",
        ],
        "ip" => [
            "unique",

        ],

    ];



   
}