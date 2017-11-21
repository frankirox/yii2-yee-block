<?php

/* @var $this yii\web\View */
/* @var $model yeesoft\block\models\Block */

$this->title = Yii::t('yee', 'Create');
$this->params['breadcrumbs'][] = ['label' => Yii::t('yee/block', 'HTML Blocks'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?= $this->render('_form', compact('model')) ?>

