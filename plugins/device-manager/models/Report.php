<?php

namespace DeviceManager;

defined('ROOT') or exit("Access Denied");

/**
 * Report
 */

use \Model\Model;

class Report extends Model
{

    protected $table = 'report';
    protected $allowColumns = [
        'device_id',
        'status',
        'user_id',
        'comment',
        'category',
        'reference',
        'date_created',
        'date_deleted',
        'deleted',

    ];
    protected $allowUpdateColumns = [
        'status',        
        'comment',        
        'date_updated',
        'date_deleted',
        'deleted',


    ];
    protected $onUpdateValidationRules = [
        "device_id" => [
            "required",
        ],
        "comment" => [
            "required",
        ],
    ];
    protected $onInsertValidationRules = [
        "device_id" => [
            "required",
        ],
        "comment" => [
            "required",
        ],


    ];
}
