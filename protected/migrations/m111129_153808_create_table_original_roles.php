<?php

class m111129_153808_create_table_original_roles extends CDbMigration
{
	public function up()
	{
            $this->createTable('tbl_original_roles', array(
                'ORID' => 'pk',
                'title' => 'varchar(100) not null',
            ), 'engine = innodb');
	}

	public function down()
	{
            $this->delete('tbl_original_roles');
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