<?php
namespace Model;
defined('ROOT') OR exit("Access Denied");

/**
 * {CLASS_NAME}
 */
class {CLASS_NAME} extends Model{

    protected $table = '{TABLE_NAME}s';
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