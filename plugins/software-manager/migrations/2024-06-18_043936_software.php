<?php
namespace Migration;
defined('FCPATH') OR exit("Access Denied");

/**
 * Software
 */
class Software extends Migration{


    public function up(){
        $this->addColumn("id int auto_increment");
        $this->addColumn("name varchar(200) null");
        $this->addColumn("version varchar(200) null");
        $this->addColumn("username varchar(200) null");
        $this->addColumn("password varchar(200) null");
        $this->addColumn("device_id tinyint(1) unsigned default 0");
        $this->addColumn("deleted tinyint(1) unsigned default 0");
        $this->addColumn("date_created datetime default null");
        $this->addColumn("date_updated datetime default null");
        $this->addColumn("date_deleted datetime default null");

        $this->addPrimaryKey('id');        
        $this->addKey('device_id');
        $this->addKey('deleted');
        $this->addKey('date_created');
        $this->addKey('date_deleted');
        $this->createTable('software');
            /**
             * +++++++++++++++++++++++++++++++++++++++++++++++++
             * +++++ More function in the Migration class ++++++
             * +++++++++++++++++++++++++++++++++++++++++++++++++
             * 
             * addData(['email'=>mrlogic1987@gmail.com]) and more
             * addUniqueKey(unique_name)
             * insertData('software')
             */
    }

    public function down(){
        $this->dropTable('software');
    }

}