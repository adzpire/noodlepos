<?php

use yii\bootstrap\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\modules\noodlepos\models\NoodleOrderdetail */

$this->params['breadcrumbs'][] = ['label' => 'Noodle Orderdetails', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="noodle-orderdetail-view">

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
				'label' => $model->attributeLabels()['orderid'],
				'value' => $model->orderid,			
				//'format' => ['date', 'long']
			],
     			[
				'label' => $model->attributeLabels()['menuid'],
				'value' => $model->menuid,			
				//'format' => ['date', 'long']
			],
     			[
				'label' => $model->attributeLabels()['noodletype'],
				'value' => $model->noodletype,			
				//'format' => ['date', 'long']
			],
     			[
				'label' => $model->attributeLabels()['addons'],
				'value' => $model->addons,			
				//'format' => ['date', 'long']
			],
     			[
				'label' => $model->attributeLabels()['tableid'],
				'value' => $model->tableid,			
				//'format' => ['date', 'long']
			],
     			[
				'label' => $model->attributeLabels()['price'],
				'value' => $model->price,			
				//'format' => ['date', 'long']
			],
     			[
				'label' => $model->attributeLabels()['note'],
				'value' => $model->note,			
				//'format' => ['date', 'long']
			],
    	],
    ]) ?>
	</div>
</div>
</div>