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
        $this->addColumn("mac1 varchar(200) null");
        $this->addColumn("mac2 varchar(200) null");
        $this->addColumn("fcc_id varchar(200) null");
        $this->addColumn("model varchar(200) null");
        $this->addColumn("product varchar(200) null");
        $this->addColumn("color varchar(200) null");
        $this->addColumn("location varchar(200) null");
        $this->addColumn("ip varchar(200) null");
        $this->addColumn("status tinyint(1) unsigned default 0");
        $this->addColumn("deleted tinyint(1) unsigned default 0");
        $this->addColumn("date_created datetime default null");
        $this->addColumn("date_updated datetime default null");
        $this->addColumn("date_deleted datetime default null");

        $this->addPrimaryKey('id');        
        $this->addKey('name');
        $this->addKey('fcc_id');
        $this->addKey('model');
        $this->addKey('ip');
        $this->addKey('location');
        $this->addKey('mac1');
        $this->addKey('sn');
        $this->addKey('status');
        $this->addKey('mac2');
        $this->addKey('color');
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
            $this->addData(['model'=>'CRS125-24G-1S-2HnD-IN']);
            $this->addData(['product'=>'mikrotik']);
            $this->addData(['sn'=>'786F08D75733/744']);
            $this->addData(['ip'=>'172.3.10.100']);
            $this->addData(['mac1'=>'2D.F5:A9:0D:A9:0D']);            
            $this->addData(['mac2'=>'D8.F5:A9:0D:A9:0D']);            
            $this->addData(['fcc_id'=>'TV7CRS125-24G2HND']);            
            $this->addData(['status'=>1]);
            $this->addData(['location'=>'room 102']);
            $this->addData(['color'=>'white']);
            $this->addData(['date_created'=>date('Y-m-d H:i:s')]);
            $this->addData(['date_updated'=>date('Y-m-d H:i:s')]);
            $this->insertData('devices');
    }

    public function down(){
        $this->dropTable('devices');
    }

}