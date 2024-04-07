<?php
namespace Migration;
defined('FCPATH') OR exit("Access Denied");

/**
 * Users
 */
class Users extends Migration{


    public function up(){
        $this->addColumn("id int auto_increment");
        $this->addColumn("first_name varchar(30)");
        $this->addColumn("last_name varchar(30)");
        $this->addColumn("email varchar(100) ");
        $this->addColumn("password varchar(255) ");
        $this->addColumn("image varchar(1024) null");
        $this->addColumn("gender varchar(6) null");
        $this->addColumn("deleted tinyint(1) unsigned default 0");
        $this->addColumn("date_created datetime default null");
        $this->addColumn("date_updated datetime default null");
        $this->addColumn("date_deleted datetime default null");

        $this->addPrimaryKey('id');        
        $this->addKey('first_name');
        $this->addKey('last_name');
        $this->addKey('email');
        $this->addKey('deleted');
        $this->addKey('date_created');
        $this->addKey('date_deleted');
        $this->createTable('users');
            /**
             * +++++++++++++++++++++++++++++++++++++++++++++++++
             * +++++ More function in the Migration class ++++++
             * +++++++++++++++++++++++++++++++++++++++++++++++++
             * 
             * addData(['email'=>mrlogic1987@gmail.com]) and more
             * addUniqueKey(unique_name)
             * insertData('users')
             */
            $this->addData([
                'first_name'=>'john',
                'last_name'=>'wick',
                'email'=>'mrlogic1987@gmail.com',
                'password'=>password_hash('password',PASSWORD_DEFAULT),
                'image'=>'',
                'gender'=>'male',
                'date_created'=> date('Y-m-d H:i:s'),
            ]);
            $this->insertData('users');
    }

    public function down(){
        $this->dropTable('users');
    }

}