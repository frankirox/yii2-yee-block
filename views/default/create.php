<?php

/* @var $this yii\web\View */
/* @var $model yeesoft\block\models\Block */

$this->title = Yii::t('yee/block', 'HTML Blocks');
$this->params['breadcrumbs'][] = ['label' => Yii::t('yee/block', 'HTML Blocks'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('yee', 'Create');
?>

<?= $this->render('_form', compact('model')) ?>