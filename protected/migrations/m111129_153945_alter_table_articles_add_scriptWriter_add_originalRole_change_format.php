<?php

class m111129_153945_alter_table_articles_add_scriptWriter_add_originalRole_change_format extends CDbMigration
{
//	public function up()
//	{
//	}
//
//	public function down()
//	{
//		echo "m111129_153945_alter_table_articles_add_scriptWriter_add_originalRole_change_format does not support migration down.\n";
//		return false;
//	}

	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
            $this->alterColumn('article', 'format', 'int foreign key tbl_formats(FtID) on delete set null on update cascade');
            $this->addColumn('article', 'scriptWriter', 'varchar(100)');
            $this->addColumn('article', 'originalRole', 'int foreign key tbl_original_roles(ORID) on delete set null on update cascade');
	}

	public function safeDown()
	{
            $this->dropColumn('article', 'scriptWriter');
            $this->dropColumn('article', 'originalRole');
            $this->alterColumn('article', 'format', "enum('tv', 'ova', 'movie')");
	}
}