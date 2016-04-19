<?php

use yii\db\Migration;
use yii\db\Schema;

class m160418_220620_add_block_permissions extends Migration
{

    public function up()
    {
        $this->insert('auth_item_group', ['code' => 'blockManagement', 'name' => 'Block Management', 'created_at' => '1440180000', 'updated_at' => '1440180000']);

        $this->insert('auth_item', ['name' => '/admin/block/*', 'type' => '3', 'created_at' => '1440180000', 'updated_at' => '1440180000']);
        $this->insert('auth_item', ['name' => '/admin/block/default/*', 'type' => '3', 'created_at' => '1440180000', 'updated_at' => '1440180000']);
        $this->insert('auth_item', ['name' => '/admin/block/default/bulk-activate', 'type' => '3', 'created_at' => '1440180000', 'updated_at' => '1440180000']);
        $this->insert('auth_item', ['name' => '/admin/block/default/bulk-deactivate', 'type' => '3', 'created_at' => '1440180000', 'updated_at' => '1440180000']);
        $this->insert('auth_item', ['name' => '/admin/block/default/bulk-delete', 'type' => '3', 'created_at' => '1440180000', 'updated_at' => '1440180000']);
        $this->insert('auth_item', ['name' => '/admin/block/default/create', 'type' => '3', 'created_at' => '1440180000', 'updated_at' => '1440180000']);
        $this->insert('auth_item', ['name' => '/admin/block/default/delete', 'type' => '3', 'created_at' => '1440180000', 'updated_at' => '1440180000']);
        $this->insert('auth_item', ['name' => '/admin/block/default/grid-page-size', 'type' => '3', 'created_at' => '1440180000', 'updated_at' => '1440180000']);
        $this->insert('auth_item', ['name' => '/admin/block/default/grid-sort', 'type' => '3', 'created_at' => '1440180000', 'updated_at' => '1440180000']);
        $this->insert('auth_item', ['name' => '/admin/block/default/index', 'type' => '3', 'created_at' => '1440180000', 'updated_at' => '1440180000']);
        $this->insert('auth_item', ['name' => '/admin/block/default/toggle-attribute', 'type' => '3', 'created_at' => '1440180000', 'updated_at' => '1440180000']);
        $this->insert('auth_item', ['name' => '/admin/block/default/update', 'type' => '3', 'created_at' => '1440180000', 'updated_at' => '1440180000']);

        $this->insert('auth_item', ['name' => 'fullBlockAccess', 'type' => '2', 'description' => 'Manage other users\' blocks', 'group_code' => 'blockManagement', 'created_at' => '1440180000', 'updated_at' => '1440180000']);
        $this->insert('auth_item', ['name' => 'createBlocks', 'type' => '2', 'description' => 'Create blocks', 'group_code' => 'blockManagement', 'created_at' => '1440180000', 'updated_at' => '1440180000']);
        $this->insert('auth_item', ['name' => 'deleteBlocks', 'type' => '2', 'description' => 'Delete blocks', 'group_code' => 'blockManagement', 'created_at' => '1440180000', 'updated_at' => '1440180000']);
        $this->insert('auth_item', ['name' => 'editBlocks', 'type' => '2', 'description' => 'Edit blocks', 'group_code' => 'blockManagement', 'created_at' => '1440180000', 'updated_at' => '1440180000']);
        $this->insert('auth_item', ['name' => 'viewBlocks', 'type' => '2', 'description' => 'View blocks', 'group_code' => 'blockManagement', 'created_at' => '1440180000', 'updated_at' => '1440180000']);

        $this->insert('auth_item_child', ['parent' => 'editBlocks', 'child' => '/admin/block/default/bulk-activate']);
        $this->insert('auth_item_child', ['parent' => 'editBlocks', 'child' => '/admin/block/default/bulk-deactivate']);
        $this->insert('auth_item_child', ['parent' => 'deleteBlocks', 'child' => '/admin/block/default/bulk-delete']);
        $this->insert('auth_item_child', ['parent' => 'createBlocks', 'child' => '/admin/block/default/create']);
        $this->insert('auth_item_child', ['parent' => 'deleteBlocks', 'child' => '/admin/block/default/delete']);
        $this->insert('auth_item_child', ['parent' => 'viewBlocks', 'child' => '/admin/block/default/grid-page-size']);
        $this->insert('auth_item_child', ['parent' => 'viewBlocks', 'child' => '/admin/block/default/grid-sort']);
        $this->insert('auth_item_child', ['parent' => 'viewBlocks', 'child' => '/admin/block/default/index']);
        $this->insert('auth_item_child', ['parent' => 'editBlocks', 'child' => '/admin/block/default/toggle-attribute']);
        $this->insert('auth_item_child', ['parent' => 'editBlocks', 'child' => '/admin/block/default/update']);

        $this->insert('auth_item_child', ['parent' => 'createBlocks', 'child' => 'viewBlocks']);
        $this->insert('auth_item_child', ['parent' => 'deleteBlocks', 'child' => 'viewBlocks']);
        $this->insert('auth_item_child', ['parent' => 'editBlocks', 'child' => 'viewBlocks']);

        $this->insert('auth_item_child', ['parent' => 'administrator', 'child' => 'createBlocks']);
        $this->insert('auth_item_child', ['parent' => 'administrator', 'child' => 'fullBlockAccess']);
        $this->insert('auth_item_child', ['parent' => 'administrator', 'child' => 'deleteBlocks']);
        $this->insert('auth_item_child', ['parent' => 'administrator', 'child' => 'editBlocks']);
        $this->insert('auth_item_child', ['parent' => 'administrator', 'child' => 'viewBlocks']);
    }

    public function down()
    {
        $this->delete('auth_item_child', ['parent' => 'administrator', 'child' => 'createBlocks']);
        $this->delete('auth_item_child', ['parent' => 'administrator', 'child' => 'fullBlockAccess']);
        $this->delete('auth_item_child', ['parent' => 'administrator', 'child' => 'deleteBlocks']);
        $this->delete('auth_item_child', ['parent' => 'administrator', 'child' => 'editBlocks']);
        $this->delete('auth_item_child', ['parent' => 'administrator', 'child' => 'viewBlocks']);

        $this->delete('auth_item_child', ['parent' => 'createBlocks', 'child' => 'viewBlocks']);
        $this->delete('auth_item_child', ['parent' => 'deleteBlocks', 'child' => 'viewBlocks']);
        $this->delete('auth_item_child', ['parent' => 'editBlocks', 'child' => 'viewBlocks']);

        $this->delete('auth_item_child', ['parent' => 'editBlocks', 'child' => '/admin/block/default/bulk-activate']);
        $this->delete('auth_item_child', ['parent' => 'editBlocks', 'child' => '/admin/block/default/bulk-deactivate']);
        $this->delete('auth_item_child', ['parent' => 'deleteBlocks', 'child' => '/admin/block/default/bulk-delete']);
        $this->delete('auth_item_child', ['parent' => 'createBlocks', 'child' => '/admin/block/default/create']);
        $this->delete('auth_item_child', ['parent' => 'deleteBlocks', 'child' => '/admin/block/default/delete']);
        $this->delete('auth_item_child', ['parent' => 'viewBlocks', 'child' => '/admin/block/default/grid-page-size']);
        $this->delete('auth_item_child', ['parent' => 'viewBlocks', 'child' => '/admin/block/default/grid-sort']);
        $this->delete('auth_item_child', ['parent' => 'viewBlocks', 'child' => '/admin/block/default/index']);
        $this->delete('auth_item_child', ['parent' => 'editBlocks', 'child' => '/admin/block/default/toggle-attribute']);
        $this->delete('auth_item_child', ['parent' => 'editBlocks', 'child' => '/admin/block/default/update']);

        $this->delete('auth_item', ['name' => '/admin/block/*']);
        $this->delete('auth_item', ['name' => '/admin/block/default/*']);
        $this->delete('auth_item', ['name' => '/admin/block/default/bulk-activate']);
        $this->delete('auth_item', ['name' => '/admin/block/default/bulk-deactivate']);
        $this->delete('auth_item', ['name' => '/admin/block/default/bulk-delete']);
        $this->delete('auth_item', ['name' => '/admin/block/default/create']);
        $this->delete('auth_item', ['name' => '/admin/block/default/delete']);
        $this->delete('auth_item', ['name' => '/admin/block/default/grid-page-size']);
        $this->delete('auth_item', ['name' => '/admin/block/default/grid-sort']);
        $this->delete('auth_item', ['name' => '/admin/block/default/index']);
        $this->delete('auth_item', ['name' => '/admin/block/default/toggle-attribute']);
        $this->delete('auth_item', ['name' => '/admin/block/default/update']);

        $this->delete('auth_item', ['name' => 'fullBlockAccess']);
        $this->delete('auth_item', ['name' => 'createBlocks']);
        $this->delete('auth_item', ['name' => 'deleteBlocks']);
        $this->delete('auth_item', ['name' => 'editBlocks']);
        $this->delete('auth_item', ['name' => 'viewBlocks']);

        $this->delete('auth_item_group', ['code' => 'blockManagement']);
    }
}