<?php

namespace yeesoft\block\controllers;

use yeesoft\block\models\Block;
use yeesoft\block\models\BlockSearch;
use yeesoft\controllers\CrudController;

/**
 * Controller implements the CRUD actions for Block model.
 */
class DefaultController extends CrudController
{

    public $modelClass = Block::class;
    public $modelSearchClass = BlockSearch::class;

    /**
     * @inheritdoc
     */
    protected function getRedirectPage($action, $model = null)
    {
        switch ($action) {
            case 'update':
                return ['update', 'id' => $model->id];
            case 'create':
                return ['update', 'id' => $model->id];
            default:
                return parent::getRedirectPage($action, $model);
        }
    }

}
