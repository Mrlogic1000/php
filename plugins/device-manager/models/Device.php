<?php
namespace DeviceManager;
defined('ROOT') OR exit("Access Denied");

/**
 * Devices
 */use \Model\Model;

class Device extends Model{

    protected $table = 'devices';
    protected $allowColumns = [
        'name',
        'sn',
        'type',
        'ip',
        'mac',
        'model',
        'version',
        'comment',
        'installed',
        'status',
        'date_updated',
        'date_deleted',
        'deleted',
        'date_created'

    ];
    protected $allowUpdateColumns = [
        'name',
        'sn',
        'type',
        'ip',
        'mac',
        'model',
        'version',
        'comment',
        'installed',
        'status',
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
            "unique",
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