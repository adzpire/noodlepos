<?php

use yii\bootstrap\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\modules\noodlepos\models\NoodleOrder */

$this->params['breadcrumbs'][] = ['label' => 'Noodle Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="noodle-order-view">

<div class="panel panel-success">
	<div class="panel-heading">
		<span class="panel-title"><?= Html::icon('eye').' '.Html::encode($this->title) ?></span>
		<?= Html::a( Html::icon('fire').' '.'Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger panbtn',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
		<?= Html::a( Html::icon('pencil').' '.'Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary panbtn']) ?>
	</div>
	<div class="panel-body">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
 			[
				'label' => $model->attributeLabels()['id'],
				'value' => $model->id,			
				//'format' => ['date', 'long']
			],
     			[
				'label' => $model->attributeLabels()['userid'],
				'value' => $model->userid,			
				//'format' => ['date', 'long']
			],
     			[
				'label' => $model->attributeLabels()['datetime'],
				'value' => $model->datetime,			
				//'format' => ['date', 'long']
			],
     			[
				'label' => $model->attributeLabels()['status'],
				'value' => $model->status,			
				//'format' => ['date', 'long']
			],
     			[
				'label' => $model->attributeLabels()['total'],
				'value' => $model->total,			
				//'format' => ['date', 'long']
			],
    	],
    ]) ?>
	</div>
</div>
</div>