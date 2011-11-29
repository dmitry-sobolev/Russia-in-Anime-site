<?php

class m111129_154143_create_table_members extends CDbMigration
{
	public function up()
	{
            $this->createTable('tbl_members', array(
                'MID' => 'pk',
                'name' => 'varchar(100) not null',
            ), 'engine = innodb');
	}

	public function down()
	{
            $this->delete('tbl_members');
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}