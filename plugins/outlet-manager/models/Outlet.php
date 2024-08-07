<?php
namespace OutletManager;
defined('ROOT') OR exit("Access Denied");

/**
 * Outlet
 */use \Model\Model;

class Outlet extends Model{

    protected $table = 'outlet';
    protected $allowColumns = [
        'outlet',
        'email',
        'email_password',
        'phone1',
        'phone2',
        'description',
        'date_created'

    ];
    protected $allowUpdateColumns = [
        'outlet',
        'email',
        'email_password',
        'phone1',
        'phone2',
        'description',
        'date_updated'
        

    ];

    protected $onInsertValidationRules = [
        "outlet" => [           
            "unique",
            "required",
        ],

    ];

    protected $onUpdateValidationRules = [
       
        "outlet" => [               
            "required",
        ],

    ];
   


   
}