<?php

class m111202_161404_create extends CDbMigration
{
//	public function up()
//	{
//	}
//
//	public function down()
//	{
//		echo "m111202_161404_create does not support migration down.\n";
//		return false;
//	}

	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
            $this->createTable('tbl_article_members', array(
                'AMID' => 'pk',
                'AID' => 'int',
                'MID' => 'int'
            ), 'engine = innodb');
            
            $this->addForeignKey('article4member', 'tbl_article_members', 'MID', 'tbl_members', 'MID', 'cascade', 'cascade');
            $this->addForeignKey('member4article', 'tbl_article_members', 'AID', 'article', 'AID', 'cascade', 'cascade');
	}

	public function safeDown()
	{
            $this->dropTable('tbl_article_members');
	}
}