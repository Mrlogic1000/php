<?php
namespace Migration;
defined('FCPATH') OR exit("Access Denied");

/**
 * Device
 */
class Device extends Migration{


    public function up(){
        $this->addColumn("id int auto_increment");
        $this->addColumn("name varchar(200) null");
        $this->addColumn("sn varchar(200) null");
        $this->addColumn("type varchar(200) null");
        $this->addColumn("ip varchar(200) null");
        $this->addColumn("mac varchar(200) null");
        $this->addColumn("comment text null");
        $this->addColumn("outlet_id tinyint(1) unsigned default 0");
        $this->addColumn("status varchar(200) null");
        $this->addColumn("deleted tinyint(1) unsigned default 0");
        $this->addColumn("date_created datetime default null");
        $this->addColumn("date_updated datetime default null");
        $this->addColumn("date_deleted datetime default null");

        $this->addPrimaryKey('id');        
        $this->addKey('name');
        $this->addKey('type');
        $this->addKey('ip');
        $this->addKey('mac');
        $this->addKey('outlet_id');
        $this->addKey('deleted');
        $this->addKey('date_created');
        $this->addKey('date_deleted');
        $this->createTable('devices');
            /**
             * +++++++++++++++++++++++++++++++++++++++++++++++++
             * +++++ More function in the Migration class ++++++
             * +++++++++++++++++++++++++++++++++++++++++++++++++
             * 
             * addData(['email'=>mrlogic1987@gmail.com]) and more
             * addUniqueKey(unique_name)
             * insertData('device')
             */
            $this->addData(['name'=>'Router']);
            $this->addData(['sn'=>'D20KD-I839']);
            $this->addData(['type'=>'Network']);
            $this->addData(['ip'=>'192.168.1.100']);
            $this->addData(['mac'=>'D8.F5:A9:0D:A9:0D']);
            $this->addData(['outlet_id'=>1]);
            $this->addData(['status'=>'good']);
            $this->addData(['date_created'=>date('Y-m-d H:i:s')]);
            $this->addData(['date_updated'=>date('Y-m-d H:i:s')]);
            $this->insertData('devices');
    }

    public function down(){
        $this->dropTable('devices');
    }

}