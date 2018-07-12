<?php

use yii\bootstrap\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\noodlepos\models\NoodleAddonSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="noodle-addon-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'cost') ?>

    <div class="form-group">
        <?= Html::submitButton(Html::icon('search').' '.'Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Html::icon('refresh').' '.'Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
