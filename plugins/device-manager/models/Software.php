<?php
namespace DeviceManager;
defined('ROOT') OR exit("Access Denied");

/**
 * Devices
 */use \Model\Model;

class Software extends Model{

    protected $table = 'software';
    protected $allowColumns = [
        'name',
        'version',
        'login',
        'password',       
        'username',       
        'description',       
        'license',       
        'device_id',
        'date_updated',
        'date_deleted',
        'deleted',
        'date_created'

    ];
    protected $allowUpdateColumns = [
        'name',
        'version',
        'login',
        'password',       
        'username',       
        'description',       
        'license',       
        'device_id',
        'date_updated',
        'date_deleted',
        'deleted',
        

    ];



   
    
    
    protected $onUpdateValidationRules = [
        "name" => [           
            "required",
        ],
       
        "status" => [
           
            "required",

        ],
        "ip" => [           
            "ip",

        ],
        "mac" => [           
            "mac",

        ],

    ];
    protected $onInsertValidationRules = [
        "name" => [            
            "required",
            
        ],
       
        "status" => [           
            "required",

        ],
        "status" => [           
            "required",

        ],
        "ip" => [           
            "ip",

        ],
        "mac" => [           
            "mac",

        ],

    ];



   
}