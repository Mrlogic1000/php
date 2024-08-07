<?php
namespace Migration;
defined('FCPATH') OR exit("Access Denied");

/**
 * Task
 */
class Task extends Migration{


    public function up(){
        $this->addColumn("id int auto_increment");
        $this->addColumn("status varchar(200) null");
        $this->addColumn("assign varchar(200) null");
        $this->addColumn("comment text null");
        $this->addColumn("startdate date default null");
        $this->addColumn("enddate date default null");
        $this->addColumn("deleted tinyint(1) unsigned default 0");
        $this->addColumn("date_created datetime default null");
        $this->addColumn("date_updated datetime default null");
        $this->addColumn("date_deleted datetime default null");

        $this->addPrimaryKey('id');        
        $this->addKey('deleted');
        $this->addKey('date_created');
        $this->addKey('date_deleted');
        $this->createTable('task');
            /**
             * +++++++++++++++++++++++++++++++++++++++++++++++++
             * +++++ More function in the Migration class ++++++
             * +++++++++++++++++++++++++++++++++++++++++++++++++
             * 
             * addData(['email'=>mrlogic1987@gmail.com]) and more
             * addUniqueKey(unique_name)
             * insertData('task')
             */
    }

    public function down(){
        $this->dropTable('task');
    }

}