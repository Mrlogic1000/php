<?php
namespace DeviceManager;
defined('ROOT') OR exit("Access Denied");

/**
 * Vlan
 */use \Model\Model;

class Vlan extends Model{

    protected $table = 'vlan';
    protected $allowColumns = [
        'name',
        'vlan_id',
        'ip',
        'cidr',
        'date_created'

    ];
    protected $allowUpdateColumns = [
        'name',
        'vlan_id',
        'ip',
        'cidr',
        'date_updated'
        

    ];

    protected $onInsertValidationRules = [
        "name" => [           
            "unique",
            'alpha_numeric',
            "required",
        ],
        "name" => [           
            "unique",
            "required",
        ],
        "ip" => [           
            "unique",
            "required",
            "ip",
        ],

    ];

    protected $onUpdateValidationRules = [
       
        "name" => [          
            'alpha_numeric',
           
        ],
        "vlan_id" => [           
            
            'numeric',
           
        ],
        "ip" => [           
                   
            "ip",
        ],
    ];
   


   
}