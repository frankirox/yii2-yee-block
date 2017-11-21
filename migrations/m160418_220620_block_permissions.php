<?php

use yeesoft\db\PermissionsMigration;

class m160418_220620_block_permissions extends PermissionsMigration
{

    public function safeUp()
    {
        $this->addPermissionsGroup('block-management', 'Block Management');

        $this->addModel('block', 'Block', yeesoft\block\models\Block::class);

        parent::safeUp();
    }

    public function safeDown()
    {
        parent::safeDown();
        $this->deletePermissionsGroup('block-management');
    }

    public function getPermissions()
    {
        return [
            'block-management' => [
                'view-blocks' => [
                    'title' => 'View Blocks',
                    'roles' => [self::ROLE_ADMIN],
                    'routes' => [
                        ['bundle' => self::ADMIN_BUNDLE, 'controller' => 'block/default', 'action' => 'index'],
                        ['bundle' => self::ADMIN_BUNDLE, 'controller' => 'block/default', 'action' => 'view'],
                        ['bundle' => self::ADMIN_BUNDLE, 'controller' => 'block/default', 'action' => 'grid-sort'],
                        ['bundle' => self::ADMIN_BUNDLE, 'controller' => 'block/default', 'action' => 'grid-page-size'],
                    ],
                ],
                'update-blocks' => [
                    'title' => 'Update Blocks',
                    'child' => ['view-blocks'],
                    'roles' => [self::ROLE_ADMIN],
                    'routes' => [
                        ['bundle' => self::ADMIN_BUNDLE, 'controller' => 'block/default', 'action' => 'update'],
                        ['bundle' => self::ADMIN_BUNDLE, 'controller' => 'block/default', 'action' => 'bulk-activate'],
                        ['bundle' => self::ADMIN_BUNDLE, 'controller' => 'block/default', 'action' => 'bulk-deactivate'],
                        ['bundle' => self::ADMIN_BUNDLE, 'controller' => 'block/default', 'action' => 'toggle-attribute'],
                    ],
                ],
                'create-blocks' => [
                    'title' => 'Create Blocks',
                    'child' => ['view-blocks'],
                    'roles' => [self::ROLE_ADMIN],
                    'routes' => [
                        ['bundle' => self::ADMIN_BUNDLE, 'controller' => 'block/default', 'action' => 'create'],
                    ],
                ],
                'delete-blocks' => [
                    'title' => 'Delete Blocks',
                    'child' => ['view-blocks'],
                    'roles' => [self::ROLE_ADMIN],
                    'routes' => [
                        ['bundle' => self::ADMIN_BUNDLE, 'controller' => 'block/default', 'action' => 'delete'],
                        ['bundle' => self::ADMIN_BUNDLE, 'controller' => 'block/default', 'action' => 'bulk-delete'],
                    ],
                ],
            ],
        ];
    }

}
