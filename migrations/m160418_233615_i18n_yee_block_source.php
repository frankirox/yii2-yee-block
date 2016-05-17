<?php

use yeesoft\db\SourceMessagesMigration;

class m160418_233615_i18n_yee_block_source extends SourceMessagesMigration
{

    public function getCategory()
    {
        return 'yee/block';
    }

    public function getMessages()
    {
        return [
            'HTML Block' => 1,
            'HTML Blocks' => 1,
        ];
    }
}