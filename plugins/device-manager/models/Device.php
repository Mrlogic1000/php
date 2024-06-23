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
        'mac1',
        'color',
        'mac2',
        'model',
        'ip',
        'location',
        'version',
        'fcc_id',
        'product',
        'status',
        'date_updated',
        'date_deleted',
        'deleted',
        'date_created'

    ];
    protected $allowUpdateColumns = [
        'name',
        'sn',
        'mac1',
        'color',
        'mac2',
        'model',
        'location',
        'version',
        'version',
        'fcc_id',
        'product',
        'status',
        'date_updated',
        'date_deleted',
        'deleted',
        

    ];



   
    
    
    protected $onUpdateValidationRules = [
        "name" => [           
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