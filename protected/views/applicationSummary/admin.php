<?php
$this->breadcrumbs=array(
	'Application Summaries'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List ApplicationSummary','url'=>array('index')),
	array('label'=>'Create ApplicationSummary','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('application-summary-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Application Summaries</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'application-summary-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'ID',
		'NAR_ID',
		'DOMAIN',
		'INSTANCE_NAME',
		'REPORTING_UNIT',
		'PRIMARILY_AFFECTED_BIZ_AREA',
		/*
		'INSTANCE_INVESTMENT_STRATEGY',
		'APP_CRITICALITY_CLASS',
		'INSTANCE_DESCRIPTION',
		'RTB_EXTERNAL',
		'RTB_INTERNAL',
		'RTB_LICENSE',
		'CTB_EXTERNAL',
		'CTB_INTERNAL',
		'CTB_LICENSE',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
