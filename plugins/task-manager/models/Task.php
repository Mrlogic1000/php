<?php
namespace TaskManager;
defined('ROOT') OR exit("Access Denied");

/**
 * Task
 */use \Model\Model;

class Task extends Model{

    protected $table = 'task';

    protected $allowColumns = [
        'assign',
        'status',
        'comment',
        'startdate',
        'enddate',
        'date_created'

    ];
    protected $allowUpdateColumns = [
        'assign',
        'status',
        'comment',
        'startdate',
        'enddate',
        'date_updated',
        'date_deleted',
        'deleted',
        

    ];
    protected $onUpdateValidationRules = [
        "assign" => [            
            "required",
        ],
      

    ];
    protected $onInsertValidationRules = [
        "assign" => [            
            "required",
        ],
      
    ];



   
}