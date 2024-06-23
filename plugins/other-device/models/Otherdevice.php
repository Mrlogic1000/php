<?php
namespace Otherdevice;
defined('ROOT') OR exit("Access Denied");

/**
 * Install
 */use \Model\Model;

class Otherdevice extends Model{

    protected $table = 'otherdevices';
    protected $allowColumns = [
        'name',
        'sn',
        'color',
        'model',
        'location',
        'version',
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
        'color',
        'model',
        'location',
        'version',
        'product',
        'status',
        'date_updated',
        'date_deleted',
        'deleted',
        

    ];
    protected $onUpdateValidationRules = [
        

    ];
    protected $onInsertValidationRules = [
       
        "sn" => [
            "unique",
           


        ],

    ];



   
}