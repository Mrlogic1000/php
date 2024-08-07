<?php
namespace Migration;
defined('FCPATH') OR exit("Access Denied");

/**
 * Ports
 */
class Ports extends Migration{


    public function up(){
        $this->addColumn("id int auto_increment");
        $this->addColumn("port varchar(200) null");
        $this->addColumn("neigbor_id varchar(200) null");
        $this->addColumn("device_id varchar(200) null");
        $this->addColumn("type varchar(200) null");
        $this->addColumn("deleted tinyint(1) unsigned default 0");
        $this->addColumn("date_created datetime default null");
        $this->addColumn("date_updated datetime default null");
        $this->addColumn("date_deleted datetime default null");

        $this->addPrimaryKey('id');        
        $this->addKey('deleted');
        $this->addKey('date_created');
        $this->addKey('date_deleted');
        $this->createTable('ports');
            /**
             * +++++++++++++++++++++++++++++++++++++++++++++++++
             * +++++ More function in the Migration class ++++++
             * +++++++++++++++++++++++++++++++++++++++++++++++++
             * 
             * addData(['email'=>mrlogic1987@gmail.com]) and more
             * addUniqueKey(unique_name)
             * insertData('ports')
             */
             $this->addData(['port'=>'Ether1']);             
             $this->addData(['neigbor_id'=>'2']);             
             $this->addData(['device_id'=>'3']);             
             $this->addData(['type'=>'trunk']);             
             $this->insertData('ports');
    }

    public function down(){
        $this->dropTable('ports');
    }

}