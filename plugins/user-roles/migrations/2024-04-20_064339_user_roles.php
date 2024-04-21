<?php
namespace Migration;
defined('FCPATH') OR exit("Access Denied");

/**
 * User_roles
 */
class User_roles extends Migration{


    public function up(){
        $this->addColumn("id int auto_increment");
        $this->addColumn("role varchar(100) null");
        $this->addColumn("disable tinyint(1) unsigned default 0");
       

        $this->addPrimaryKey('id');        
        $this->addKey('disable');
       
        $this->createTable('user_roles');
            /**
             * +++++++++++++++++++++++++++++++++++++++++++++++++
             * +++++ More function in the Migration class ++++++
             * +++++++++++++++++++++++++++++++++++++++++++++++++
             * 
             * addData(['email'=>mrlogic1987@gmail.com]) and more
             * addUniqueKey(unique_name)
             * insertData('user_roles')
             */
            $this->addData([
                'id'=>1,
                'role'=>'admin',
                'disable'=>0
            ]);
           
             $this->insertData('user_roles');
    }

    public function down(){
        $this->dropTable('user_roles');
    }

}