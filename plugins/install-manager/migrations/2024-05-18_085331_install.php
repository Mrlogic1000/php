<?php
namespace Migration;
defined('FCPATH') OR exit("Access Denied");

/**
 * Install
 */
class Install extends Migration{


    public function up(){
        $this->addColumn("id int auto_increment");
        $this->addColumn("description text null");       
        $this->addColumn("user_id tinyint(1) unsigned default 0");
        $this->addColumn("device_id tinyint(1) unsigned default 0");
        $this->addColumn("outlet_id tinyint(1) unsigned default 0");
        $this->addColumn("deleted tinyint(1) unsigned default 0");
        $this->addColumn("date_created datetime default null");
        $this->addColumn("date_updated datetime default null");
        $this->addColumn("date_deleted datetime default null");

        $this->addPrimaryKey('id');        
        $this->addKey('user_id');
        $this->addKey('device_id');
        $this->addKey('outlet_id');
        $this->addKey('deleted');
        $this->addKey('date_created');
        $this->addKey('date_deleted');
        $this->createTable('install');
            /**
             * +++++++++++++++++++++++++++++++++++++++++++++++++
             * +++++ More function in the Migration class ++++++
             * +++++++++++++++++++++++++++++++++++++++++++++++++
             * 
             * addData(['email'=>mrlogic1987@gmail.com]) and more
             * addUniqueKey(unique_name)
             * insertData('install')
             */
    }

    public function down(){
        $this->dropTable('install');
    }

}