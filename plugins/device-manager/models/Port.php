<?php
namespace DeviceManager;
defined('ROOT') OR exit("Access Denied");

/**
 * Port
 */use \Model\Model;

class Port extends Model{

    protected $table = 'ports';
    protected $allowColumns = [
        'port',
        'type',
        'neigbor_id',
        'device_id',
        'date_created'

    ];
    protected $allowUpdateColumns = [
        'port',
        'type',
        'neigbor_id',
        'device_id',
        'date_updated',
        'date_deleted',
        'deleted',
        

    ];
    protected $onUpdateValidationRules = [
        "port" => [            
            "required",
        ],
       

    ];
    protected $onInsertValidationRules = [
       "port" => [           
            "required",
        ],

    ];



   
}