<?php
namespace ServiceManager;
defined('ROOT') OR exit("Access Denied");

/**
 * Report
 */use \Model\Model;

class Service extends Model{

    protected $table = 'service';
    protected $allowColumns = [
        'device_id',
        'status',
        'user_id',
        'category',
        'comment',
        'date_updated',
        'date_created',
        'date_deleted',
        'deleted',

    ];
    protected $allowUpdateColumns = [
        'device_id',
        'status',
        'user_id',
        'category',
        'comment',
        'date_updated',
        'date_deleted',
        'deleted',
        

    ];
    protected $onUpdateValidationRules = [
        "device_id" => [           
            "required",
        ],
        "comment" => [           
            "required",
        ],
      
    ];
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