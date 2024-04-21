<?php
namespace Migration;
defined('FCPATH') OR exit("Access Denied");

/**
 * User_roles_map
 */
class User_roles_map extends Migration{


    public function up(){
        $this->addColumn("id int auto_increment");
        $this->addColumn("role_id int default 0");
        $this->addColumn("user_id int default 0");
        $this->addColumn("disable tinyint(1) unsigned default 0");
       

        $this->addPrimaryKey('id');        
        $this->addKey('disable');
       
        $this->createTable('user_roles_map');
            /**
             * +++++++++++++++++++++++++++++++++++++++++++++++++
             * +++++ More function in the Migration class ++++++
             * +++++++++++++++++++++++++++++++++++++++++++++++++
             * 
             * addData(['email'=>mrlogic1987@gmail.com]) and more
             * addUniqueKey(unique_name)
             * insertData('user_roles_map')
             */

             $this->addData([
                'id'=>1,
                'role_id'=>1,
                'user_id'=>1,
                'disable'=>0
            ]);  
            $this->insertData('user_roles_map');         
    }

    public function down(){
        $this->dropTable('user_roles_map');
    }

}