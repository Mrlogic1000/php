<?php
namespace Migration;
defined('FCPATH') OR exit("Access Denied");

/**
 * Outlet
 */
class Outlet extends Migration{


    public function up(){
        $this->addColumn("id int auto_increment");
        $this->addColumn("name varchar(200)");
        $this->addColumn("description text null");
        $this->addColumn("manager_id int unsigned default 0");
        $this->addColumn("deleted tinyint(1) unsigned default 0");
        $this->addColumn("date_created datetime default null");
        $this->addColumn("date_updated datetime default null");
        $this->addColumn("date_deleted datetime default null");

        $this->addPrimaryKey('id');        
        $this->addKey('manager_id');
        $this->addKey('deleted');
        $this->addKey('date_created');
        $this->addKey('date_deleted');
        $this->createTable('outlet');
            /**
             * +++++++++++++++++++++++++++++++++++++++++++++++++
             * +++++ More function in the Migration class ++++++
             * +++++++++++++++++++++++++++++++++++++++++++++++++
             * 
             * addData(['email'=>mrlogic1987@gmail.com]) and more
             * addUniqueKey(unique_name)
             * insertData('outlet')
             */
            $this->addData(['name'=>'IT']);
            $this->addData(['description'=>'IT is department that handle all software and devices']);
            $this->addData(['manager_id'=>1]);
            $this->addData(['date_created'=>date('Y-m-d H:i:s')]);
            $this->addData(['date_updated'=>date('Y-m-d H:i:s')]);
            $this->insertData('outlet');
            
    }

    public function down(){
        $this->dropTable('outlet');
    }

}