<?php
namespace InstallManager;
defined('ROOT') OR exit("Access Denied");

/**
 * Install
 */use \Model\Model;

class Install extends Model{

    protected $table = 'install';
    protected $allowColumns = [
        'comment',
        'version',
        'user_id',
        'ip',
        'device_id',
        'vlan_id',
        'outlet_id',
        'date_created',
        'date_created',

    ];
    protected $allowUpdateColumns = [
        'comment',
        'version',
        'user_id',
        'ip',
        'device_id',
        'vlan_id',
        'outlet_id',
        'date_updated',
        'date_deleted',
        'deleted',
        

    ];
    protected $onUpdateValidationRules = [
        "ip" => [
            "unique",

        ],

    ];
    protected $onInsertValidationRules = [
       
        "ip" => [
            "unique",

        ],

    ];



   
}