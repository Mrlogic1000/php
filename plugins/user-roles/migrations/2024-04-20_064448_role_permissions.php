<?php
namespace Migration;
defined('FCPATH') OR exit("Access Denied");

/**
 * Role_permissions
 */
class Role_permissions extends Migration{


    public function up(){
        $this->addColumn("id int auto_increment");
        $this->addColumn("role_id int default 0");
        $this->addColumn("permission varchar(100) null");
        $this->addColumn("disable tinyint(1) unsigned default 0");
        

        $this->addPrimaryKey('id');        
        $this->addKey('role_id');
        $this->addKey('disable');
       
        $this->createTable('role_permissions');
            /**
             * +++++++++++++++++++++++++++++++++++++++++++++++++
             * +++++ More function in the Migration class ++++++
             * +++++++++++++++++++++++++++++++++++++++++++++++++
             * 
             * addData(['email'=>mrlogic1987@gmail.com]) and more
             * addUniqueKey(unique_name)
             * insertData('role_permissions')
             */
            $this->addData([
                'id'=>1,
                'role_id'=>1,
                'permission'=>'all',
                'disable'=>0
            ]);           
            $this->insertData('role_permissions');
    }

    public function down(){
        $this->dropTable('role_permissions');
    }

}