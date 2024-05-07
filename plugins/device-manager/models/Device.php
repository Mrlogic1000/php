<?php
namespace PropertyManager;
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
        'comment',
        'installed',
        'status',
        'date_updated',
        'date_deleted',
        'deleted',
        

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