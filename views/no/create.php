<?php

use yii\bootstrap\Html;


/* @var $this yii\web\View */
/* @var $model frontend\modules\noodlepos\models\NoodleOrder */

$this->params['breadcrumbs'][] = ['label' => 'Noodle Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="noodle-order-create">

    <div class="panel panel-primary">
		<div class="panel-heading">
			<span class="panel-title"><?= Html::icon('edit').' '.Html::encode($this->title) ?></span>
			<?= Html::a( Html::icon('list-alt').' '.'entry', ['index'], ['class' => 'btn btn-success panbtn']) ?>
		</div>
		<div class="panel-body">
		 <?= $this->render('_form', [
			  'model' => $model,
		 ]) ?>
		</div>
	</div>

</div>
