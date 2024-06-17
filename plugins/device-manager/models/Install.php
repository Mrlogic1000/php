<?php
namespace DeviceManager;
defined('ROOT') OR exit("Access Denied");

/**
 * Install
 */use \Model\Model;

class Install extends Model{

    protected $table = 'install';
    protected $allowColumns = [          
        'device_id',
        'user_id',      
        'outlet_id',
        'date_created',
        'date_created',

    ];
    protected $allowUpdateColumns = [              
        'device_id',
        'user_id',      
        'outlet_id',
        'date_created',
        

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