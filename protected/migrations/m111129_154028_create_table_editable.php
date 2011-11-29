<?php

class m111129_154028_create_table_editable extends CDbMigration
{
	public function up()
	{
            $this->createTable('tbl_editable', array(
                'EID' => 'pk',
                'id' => 'varchar(100) unique',
                'content' => 'text',
            ), 'engine = innodb');
	}

	public function down()
	{
            $this->delete('tbl_editable');
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