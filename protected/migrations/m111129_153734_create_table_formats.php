<?php

class m111129_153734_create_table_formats extends CDbMigration
{
	public function up()
	{
            $this->createTable('tbl_formats', array(
                'FtID' => 'pk',
                'title' => 'varchar(32) not null',
            ), 'engine = innodb');
	}

	public function down()
	{
            $this->delete('tbl_formats');
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