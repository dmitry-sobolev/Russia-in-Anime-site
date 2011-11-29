<?php

class m111129_145553_create_table_news extends CDbMigration {

    public function up() {
        $this->createTable('news', array(
            'NID' => 'pk',
            'date' => 'timestamp default CURRENT_TIMESTAMP',
            'text' => 'text',
                ), 'engine = innodb');
    }

    public function down() {
        $this->delete('news');
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