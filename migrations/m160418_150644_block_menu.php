<?php

use yii\db\Migration;

class m160418_150644_block_menu extends Migration
{

    public function up()
    {
        $this->insert('{{%menu_link}}', ['id' => 'admin-menu-block', 'menu_id' => 'admin-menu', 'link' => '/block/default/index', 'image' => 'clone', 'created_by' => 1, 'order' => 18]);
        $this->insert('{{%menu_link_lang}}', ['link_id' => 'admin-menu-block', 'label' => 'HTML Blocks', 'language' => 'en-US']);
    }

    public function down()
    {
        $this->delete('{{%menu_link}}', ['like', 'id', 'admin-menu-block']);
    }
}