<?php

use yii\bootstrap\Html;
use yii\bootstrap\ActiveForm;
use wbraganca\dynamicform\DynamicFormWidget;
use kartik\widgets\Select2;
use kartik\widgets\DatePicker;

$this->title = Yii::t('kpi/app', 'Create');
$this->params['breadcrumbs'][] = ['label' => Yii::t('kpi/app', 'Wasterecycle Details'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$js = '
jQuery(".dynamicform_wrapper").on("afterInsert", function(e, item) {
    jQuery(".dynamicform_wrapper .panel-title-address").each(function(index) {
        jQuery(this).html("<span class=\"glyphicon glyphicon-triangle-right\"></span> no. : " + (index + 1))
    });
});

jQuery(".dynamicform_wrapper").on("afterDelete", function(e) {
    jQuery(".dynamicform_wrapper .panel-title-address").each(function(index) {
        jQuery(this).html("<span class=\"glyphicon glyphicon-triangle-right\"></span> no. : " + (index + 1))
    });
});
';

$this->registerJs($js);
?>

<div class="customer-form">

    <?php $form = ActiveForm::begin([
	'id' => 'dynamic-form', 
	'layout' => 'horizontal',
	'fieldConfig' => [
        'horizontalCssClasses' => [
            'label' => 'col-sm-2',
            'wrapper' => 'col-sm-10',
        ],
    ],
	
	]); ?>
    <div class="row">
		<?php 
		echo $form->field($model, 'datetime')->widget(DatePicker::classname(), [
			'options' => ['placeholder' => 'Enter birth date ...'],
			'language' => 'th',
			'type' => DatePicker::TYPE_COMPONENT_APPEND,
			'pluginOptions' => [
				'todayHighlight' => true,
				'todayBtn' => true,
				'autoclose'=>true,
				'format' => 'yyyy-MM-dd',
			]
		]);

		?>
    </div>
    <div style="padding-bottom: 10px; padding-top: 10px;">
        <div style="background-color: transparent; border-bottom: 1px dashed #dee5e7 !important;"></div>
    </div>
    <?php DynamicFormWidget::begin([
        'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
        'widgetBody' => '.container-items', // required: css class selector
        'widgetItem' => '.item', // required: css class
        'limit' => 4, // the maximum times, an element can be cloned (default 999)
        'min' => 1, // 0 or 1 (default 1)
        'insertButton' => '.add-item', // css class
        'deleteButton' => '.remove-item', // css class
        'model' => $modeldetail[0],
        'formId' => 'dynamic-form',
        'formFields' => [
            'menuid',
            'tableid',
			'noodletype',
            'addons',
            'note',
           // 'postal_code',
        ],
    ]); ?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-envelope"></i> รายการที่สั่ง
            <button type="button" class="pull-right add-item btn btn-success"><span class="glyphicon glyphicon-plus"></span> เพิ่มรายการ</button>
            <div class="clearfix"></div>
        </div>
        <div class="panel-body container-items"><!-- widgetContainer -->
            <?php foreach ($modeldetail as $index => $detail): ?>
                <div class="item panel panel-default"><!-- widgetBody -->
                    <div class="panel-heading">
                        <span class="panel-title-address">no. : <?= ($index + 1) ?></span>
                        <button type="button" class="pull-right remove-item btn btn-danger"><span class="glyphicon glyphicon-minus"></span></button>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body">
                        <?php
                            // necessary for update action.
                            if (!$detail->isNewRecord) {
                                echo Html::activeHiddenInput($detail, "[{$index}]id");
                            }
                        ?>
                        <?php echo $form->field($detail, "[{$index}]menuid")->inline()->radioList(
								$menulist,
								['prompt'=>'Select...']);
						?>
						<?php echo $form->field($detail, "[{$index}]noodletype")->inline()->checkBoxList(
								$noodletypelist);
						?>
						<?php echo $form->field($detail, "[{$index}]addons")->inline()->checkBoxList(
								$addonlist);
						?>
						<?= $form->field($detail, "[{$index}]tableid")->inline()->radioList(
								$tablelist,
								['prompt'=>'Select...']); ?>			
						<?php  
							echo $form->field($detail, 'note')->widget(Select2::classname(), [
								'data' => ['ไม่ใส่ถั่วงอก' => 'ไม่ใส่ถั่วงอก', 'ไม่ใส่ผัก' => 'ไม่ใส่ผัก'],
								'options' => [
									'placeholder' => 'เพิ่มเติม...',
									'multiple' => true,								
								],
								'pluginOptions' => [
									'allowClear' => true
								],
							]);
						 ?>

                        
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?php DynamicFormWidget::end(); ?>
	
	    <div class="form-group">
        <?= Html::submitButton($detail->isNewRecord ? 'Create' : 'Update', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>