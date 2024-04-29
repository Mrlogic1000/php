<?php
namespace UserManager;
defined('ROOT') OR exit("Access Denied");

use \Model\Model;
/**
 * User_roles
 */
class User_role extends Model{

    protected $table = 'user_roles';
    protected $allowColumns = [
        'role',
        'disable'

    ];
    protected $allowUpdateColumns = [
        'role',
        'disable'

        

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
    protected $onInsertValidationRules = [
        "role" => [           
            "required",
            "unique",
        ],
      
       

    ];
   



   
}