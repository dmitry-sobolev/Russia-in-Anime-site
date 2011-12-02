<?php

class m111202_072100_alter_timeTag_column_add_year_column_table_article extends CDbMigration
{
//	public function up()
//	{
//	}
//
//	public function down()
//	{
//		echo "m111202_072100_alter_timeTag_column_add_year_column_table_article does not support migration down.\n";
//		return false;
//	}

	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
            $this->addColumn('article', 'year', 'year');
//            $this->alterColumn('article', 'timeTag', 'varchar(15)');
	}

	public function safeDown()
	{
            $this->dropColumn('article', 'year');
	}
}