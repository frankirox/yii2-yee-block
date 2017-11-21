<?php

use yii\widgets\Pjax;
use yeesoft\models\User;
use yeesoft\helpers\Html;
use yeesoft\grid\GridView;
use yeesoft\block\models\Block;

/* @var $this yii\web\View */
/* @var $searchModel yeesoft\block\models\BlockSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('yee/block', 'HTML Blocks');
$this->params['breadcrumbs'][] = $this->title;
$this->params['description'] = 'YeeCMS 0.2.0';
$this->params['header-content'] = Html::a(Yii::t('yee', 'Add New'), ['create'], ['class' => 'btn btn-sm btn-primary']);
?>
<div class="box box-primary">
    <div class="box-body">
        <?php $pjax = Pjax::begin() ?>
        <?=
        GridView::widget([
            'pjaxId' => $pjax->id,
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'quickFilters' => false,
            'columns' => [
                ['class' => 'yeesoft\grid\CheckboxColumn', 'options' => ['style' => 'width:10px'], 'displayFilter' => false],
                [
                    'attribute' => 'title',
                    'class' => 'yeesoft\grid\columns\TitleActionColumn',
                    'title' => function (Block $model) {
                        return Html::a($model->title, ['update', 'id' => $model->id], ['data-pjax' => 0]);
                    },
                    'buttonsTemplate' => '{update} {delete}',
                    'filterOptions' => ['colspan' => 2],
                ],
                [
                    'attribute' => 'slug',
                    'options' => ['style' => 'width:20%x'],
                ],
                [
                    'attribute' => 'created_by',
                    'filter' => User::getUsersList(),
                    'value' => function (Block $model) {
                        return Html::a($model->author->username, ['/user/default/update', 'id' => $model->created_by], ['data-pjax' => 0]);
                    },
                    'format' => 'raw',
                    'visible' => Yii::$app->user->can('view-users'),
                    'options' => ['style' => 'width:15%'],
                ],
            ],
        ]);
        ?>
        <?php Pjax::end() ?>
    </div>
</div>