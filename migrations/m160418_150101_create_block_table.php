<?php

use yii\db\Migration;
use yii\db\Schema;

class m160418_150101_create_block_table extends Migration
{

    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        $this->createTable('block', [
            'id' => 'pk',
            'slug' => Schema::TYPE_STRING . '(200) NOT NULL DEFAULT ""',
            'created_by' => Schema::TYPE_INTEGER . ' DEFAULT NULL',
            'created_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'updated_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'updated_by' => Schema::TYPE_INTEGER . ' DEFAULT NULL',
            'CONSTRAINT `fk_block_created_by` FOREIGN KEY (created_by) REFERENCES user (id) ON DELETE SET NULL ON UPDATE CASCADE',
            'CONSTRAINT `fk_block_updated_by` FOREIGN KEY (updated_by) REFERENCES user (id) ON DELETE SET NULL ON UPDATE CASCADE',
        ], $tableOptions);

        $this->createIndex('block_slug', 'block', 'slug', true);

        $this->createTable('block_lang', [
            'id' => 'pk',
            'block_id' => Schema::TYPE_INTEGER . '(11) NOT NULL',
            'language' => Schema::TYPE_STRING . '(6) NOT NULL',
            'content' => Schema::TYPE_TEXT . ' DEFAULT NULL',
        ], $tableOptions);

        $this->createIndex('block_lang_post_id', 'block_lang', 'block_id');
        $this->createIndex('block_lang_language', 'block_lang', 'language');
        $this->addForeignKey('fk_block_lang', 'block_lang', 'block_id', 'block', 'id', 'CASCADE', 'CASCADE');
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk_block_created_by', 'block');
        $this->dropForeignKey('fk_block_updated_by', 'block');
        $this->dropForeignKey('fk_block_lang', 'block_lang');
        $this->dropTable('block_lang');
        $this->dropTable('block');
    }
}