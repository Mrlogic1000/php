<?php
namespace Migration;
defined('FCPATH') OR exit("Access Denied");

/**
 * Outlet
 */
class Vlan extends Migration{


    public function up(){
        $this->addColumn("id int auto_increment");
        $this->addColumn("name varchar(200)");
        $this->addColumn("ip varchar(200)");
        $this->addColumn("cidr varchar(200)");
        $this->addColumn("vlan_id int");
        $this->addColumn("deleted tinyint(1) unsigned default 0");
        $this->addColumn("date_created datetime default null");
        $this->addColumn("date_updated datetime default null");
        $this->addColumn("date_deleted datetime default null");

        $this->addPrimaryKey('id');       
        $this->addKey('name');       
        $this->addKey('vlan_id');       
        $this->addKey('deleted');
        $this->addKey('date_created');
        $this->addKey('date_deleted');
        $this->createTable('vlan');
            /**
             * +++++++++++++++++++++++++++++++++++++++++++++++++
             * +++++ More function in the Migration class ++++++
             * +++++++++++++++++++++++++++++++++++++++++++++++++
             * 
             * addData(['email'=>mrlogic1987@gmail.com]) and more
             * addUniqueKey(unique_name)
             * insertData('outlet')
             */
            $this->addData(['name'=>'management']);
            $this->addData(['ip'=>'172.3.100.0']);
            $this->addData(['cidr'=>'24']);
            $this->addData(['vlan_id'=>100]);
            $this->addData(['date_created'=>date('Y-m-d H:i:s')]);
            $this->addData(['date_updated'=>date('Y-m-d H:i:s')]);
            $this->insertData('vlan');
            
    }

    public function down(){
        $this->dropTable('vlan');
    }

}