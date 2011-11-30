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
            $this->alterColumn('article', 'format', 'int');
            $this->addColumn('article', 'scriptWriter', 'varchar(100)');
            $this->addColumn('article', 'originalRole', 'int');
            $this->addForeignKey('format4article', 'article', 'format', 'tbl_formats', 'FtID', 'set null', 'cascade');
            $this->addForeignKey('original_role4article', 'article', 'originalRole', 'tbl_original_roles', 'ORID', 'set null', 'cascade');
	}

	public function safeDown()
	{
            $this->dropForeignKey('original_role4article', 'article');
            $this->dropForeignKey('format4article', 'article');
            $this->dropColumn('article', 'scriptWriter');
            $this->dropColumn('article', 'originalRole');
            $this->alterColumn('article', 'format', "enum('tv', 'ova', 'movie')");
	}
}