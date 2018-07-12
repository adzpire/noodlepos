<?php

use yii\bootstrap\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\noodlepos\models\NoodleOrderdetailSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="noodle-orderdetail-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'orderid') ?>

    <?= $form->field($model, 'menuid') ?>

    <?= $form->field($model, 'noodletype') ?>

    <?= $form->field($model, 'addons') ?>

    <?php // echo $form->field($model, 'tableid') ?>

    <?php // echo $form->field($model, 'price') ?>

    <?php // echo $form->field($model, 'note') ?>

    <div class="form-group">
        <?= Html::submitButton(Html::icon('search').' '.'Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Html::icon('refresh').' '.'Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
