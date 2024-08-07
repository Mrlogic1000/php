<?php
namespace Migration;
defined('FCPATH') OR exit("Access Denied");

/**
 * 
 */
class  extends Migration{


    public function up(){
        $this->addColumn("id int auto_increment");
        $this->addColumn("column1 varchar(200) null");
        $this->addColumn("column1 varchar(200) null");
        $this->addColumn("deleted tinyint(1) unsigned default 0");
        $this->addColumn("date_created datetime default null");
        $this->addColumn("date_updated datetime default null");
        $this->addColumn("date_deleted datetime default null");

        $this->addPrimaryKey('id');        
        $this->addKey('deleted');
        $this->addKey('date_created');
        $this->addKey('date_deleted');
        $this->createTable('');
            /**
             * +++++++++++++++++++++++++++++++++++++++++++++++++
             * +++++ More function in the Migration class ++++++
             * +++++++++++++++++++++++++++++++++++++++++++++++++
             * 
             * addData(['email'=>mrlogic1987@gmail.com]) and more
             * addUniqueKey(unique_name)
             * insertData('')
             */
    }

    public function down(){
        $this->dropTable('');
    }

}