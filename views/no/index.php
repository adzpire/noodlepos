<?php

use yii\bootstrap\Html;
//use kartik\widgets\DatePicker;

use kartik\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\noodlepos\models\NoodleOrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->params['breadcrumbs'][] = $this->title;
?>
<div class="noodle-order-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<?php Pjax::begin(); ?>    <?= GridView::widget([
		//'id' => 'kv-grid-demo',
		'dataProvider'=> $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            'id',
            'userid',
            'datetime',
            'status',
            'total',
				[
					'class' => 'yii\grid\ActionColumn',
					/*'visibleButtons' => [
						'view' => Yii::$app->user->id == 122,
						'update' => Yii::$app->user->id == 19,
						'delete' => function ($model, $key, $index) {
										return $model->status === 1 ? false : true;
									}
						],
					'visible' => Yii::$app->user->id == 19,*/
				],
				[
					'class' => 'yii\grid\ActionColumn',
					'template' => '{myButton} {myButton2}',
					'buttons' => [
						'myButton' => function($url, $model, $key) {     // render your custom button
							return Html::a('to2', ['mycomment','id' => $model->id, 'to' => 2], ['class' => 'btn btn-primary', 'data-toggle'=>'modal', 'data-target'=>'#modalvote',]);
						},
						'myButton2' => function($url, $model, $key) {     // render your custom button
							return Html::a('to3', ['mycomment','id' => $model->id, 'to' => 3], ['class' => 'btn btn-success', 'data-toggle'=>'modal', 'data-target'=>'#modalvote',]);
						}
					],
					'visibleButtons' => [
						'myButton' => function ($model, $key, $index) {
							return $model->status === 1 ? true : false;
						},
						'myButton2' => function ($model, $key, $index) {
							return $model->status === 2 ? true : false;
						}
					],
					/*'visible' => Yii::$app->user->id == 19,*/
				],
        ],
		'pager' => [
			'firstPageLabel' => '1stPagi',
			'lastPageLabel' => 'lastPagi',
		],
		'responsive'=>true,
		'hover'=>true,
		'toolbar'=> [
			['content'=>
				Html::a(Html::icon('plus'), ['create'], ['class'=>'btn btn-success', 'title'=>Yii::t('kpi/app', 'Add Book')]).' '.
				Html::a(Html::icon('repeat'), ['grid-demo'], ['data-pjax'=>0, 'class'=>'btn btn-default', 'title'=>Yii::t('kpi/app', 'Reset Grid')])
			],
			//'{export}',
			'{toggleData}',
		],
		'panel'=>[
			'type'=>GridView::TYPE_INFO,
			'heading'=> Html::icon('user').' '.Html::encode($this->title),
		],
    ]); ?>
<?php 	 /* adzpire grid tips
		[
				'attribute' => 'id',
				'headerOptions' => [
					'width' => '50px',
				],
			],
		[
		'attribute' => 'we_date',
		'value' => 'we_date',
			'filter' => DatePicker::widget([
					'model'=>$searchModel,
					'attribute'=>'date',
					'language' => 'th',
					'options' => ['placeholder' => Yii::t('kpi/app', 'enterdate')],
					'type' => DatePicker::TYPE_COMPONENT_APPEND,
					'pickerButton' =>false,
					//'size' => 'sm',
					//'removeButton' =>false,
					'pluginOptions' => [
						'autoclose' => true,
						'format' => 'yyyy-mm-dd'
					]
				]),
			//'format' => 'html',			
			'format' => ['date']

		],	
		[
			'attribute' => 'we_creator',
			'value' => 'weCr.userPro.nameconcatened'
		],
	 */
 ?> <?php Pjax::end(); ?>	
</div>
<div class="modal remote fade" id="modalvote">
        <div class="modal-dialog">
            <div class="modal-content loader-lg"></div>
        </div>
</div>