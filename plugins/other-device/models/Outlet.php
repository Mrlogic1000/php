<?php
namespace OtherDevice;
defined('ROOT') OR exit("Access Denied");

/**
 * Outlet
 */use \Model\Model;

class Outlet extends Model{

    protected $table = 'outlet';
    protected $allowColumns = [
        'outlet',
        'description',
        'date_created'

    ];
    protected $allowUpdateColumns = [
        'outlet',
        'description',
        'date_updated'
        

    ];

    protected $onInsertValidationRules = [
        "name" => [           
            "unique",
            "required",
        ],

    ];

    protected $onUpdateValidationRules = [
       
        "name" => [               
            "required",
        ],

    ];
   


   
}