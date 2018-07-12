<?php

use yii\bootstrap\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\noodlepos\models\NoodleOrderSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="noodle-order-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'userid') ?>

    <?= $form->field($model, 'datetime') ?>

    <?= $form->field($model, 'status') ?>

    <?= $form->field($model, 'total') ?>

    <div class="form-group">
        <?= Html::submitButton(Html::icon('search').' '.'Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Html::icon('refresh').' '.'Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
