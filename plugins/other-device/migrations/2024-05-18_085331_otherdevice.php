<?php
namespace Migration;
defined('FCPATH') OR exit("Access Denied");

/**
 * Install
 */
class Otherdevice extends Migration{


    public function up(){        
            $this->addColumn("id int auto_increment");
            $this->addColumn("name varchar(200) null");
            $this->addColumn("sn varchar(200) null");
            $this->addColumn("model varchar(200) null");
            $this->addColumn("product varchar(200) null");
            $this->addColumn("color varchar(200) null");
            $this->addColumn("location varchar(200) null");
            $this->addColumn("status tinyint(1) unsigned default 0");
            $this->addColumn("deleted tinyint(1) unsigned default 0");
            $this->addColumn("date_created datetime default null");
            $this->addColumn("date_updated datetime default null");
            $this->addColumn("date_deleted datetime default null");
    
            $this->addPrimaryKey('id');        
            $this->addKey('name');
            $this->addKey('model');
            $this->addKey('location');
            $this->addKey('sn');
            $this->addKey('status');
            $this->addKey('color');
            $this->addKey('deleted');
            $this->addKey('date_created');
            $this->addKey('date_deleted');
            $this->createTable('otherdevices');
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
        $this->dropTable('otherdevice');
    }

}