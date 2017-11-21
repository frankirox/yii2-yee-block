<?php

namespace yeesoft\block\controllers;

use yeesoft\controllers\CrudController;

/**
 * Controller implements the CRUD actions for Block model.
 */
class DefaultController extends CrudController
{

    public $modelClass = 'yeesoft\block\models\Block';
    public $modelSearchClass = 'yeesoft\block\models\BlockSearch';

    /**
     * @inheritdoc
     */
    protected function getRedirectPage($action, $model = null)
    {
        switch ($action) {
            case 'update':
                return ['update', 'id' => $model->id];
                break;
            case 'create':
                return ['update', 'id' => $model->id];
                break;
            default:
                return parent::getRedirectPage($action, $model);
        }
    }

}
