<?php
namespace BasicAuth;
use \Model\Model;
defined('ROOT') OR exit("Access Denied");

/**
 * User
 */
class User extends Model{

    protected $table = 'users';
    //  $this->primaryKey = 'id';

    protected $allowColumns = [
        'first_name',
        'last_name',
        'email',
        'password',           
        'gender',
        'image',
        'date_created',
       
    ];
    protected $allowUpdateColumns = [
        'first_name',
        'last_name',
        'email',
        'password',
        'gender',
        'image',
        'date_updated',
        'date_deleted',
        'deleted',
        

    ];
     protected $onInsertValidationRules = [
        "first_name" => [
            "required",
        ],
        "last_name" => [
            "required",
        ],
        "email" => [
            "unique",
            "required",
        ],
        "gender" => [           
            "required",
        ],
        "password" => [
            "not_less_than_8",
            "required",           
            
        ],
       
    ];


protected $onUpdateValidationRules = [
        "email" => [            
            "required",
        ],
        "password" => [           
            "required",
        ],
       
        

    ];




    }
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



   
