<?php
namespace TaskManager;
defined('ROOT') OR exit("Access Denied");

/**
 * Task
 */use \Model\Model;

class Task extends Model{

    protected $table = 'tasks';
    protected $allowColumns = [
        'date_created'

    ];
    protected $allowUpdateColumns = [
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