<?php

use yii\bootstrap\Html;
//use kartik\widgets\DatePicker;
use  yii\bootstrap\Modal;
use kartik\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\noodlepos\models\NoodleAddonSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->params['breadcrumbs'][] = $this->title;
?>
<div class="noodle-addon-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<?php Pjax::begin(); ?>    <?= GridView::widget([
		//'id' => 'kv-grid-demo',
		'dataProvider'=> $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'cost',
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
					'template' => '{myButton}',
					'buttons' => [
						'myButton' => function($url, $model, $key) {     // render your custom button
							return Html::a('click', ['mycomment','id' => $model->id], ['class' => 'btn btn-success', 'id' => 'popupModal', 'data-toggle'=>'modal', 'data-target'=>'#modalvote',]);
						}
					]
					/*'visibleButtons' => [
						'view' => Yii::$app->user->id == 122,
						'update' => Yii::$app->user->id == 19,
						'delete' => function ($model, $key, $index) {
										return $model->status === 1 ? false : true;
									}
						],
					'visible' => Yii::$app->user->id == 19,*/
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
<?php Pjax::end(); ?>	
</div>
<div class="modal remote fade" id="modalvote">
        <div class="modal-dialog">
            <div class="modal-content loader-lg"></div>
        </div>
</div>