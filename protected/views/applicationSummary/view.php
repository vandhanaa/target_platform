<?php
$this->breadcrumbs=array(
	'Application Summaries'=>array('index'),
	$model->ID,
);

$this->menu=array(
	array('label'=>'List ApplicationSummary','url'=>array('index')),
	array('label'=>'Create ApplicationSummary','url'=>array('create')),
	array('label'=>'Update ApplicationSummary','url'=>array('update','id'=>$model->ID)),
	array('label'=>'Delete ApplicationSummary','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ApplicationSummary','url'=>array('admin')),
);
?>

<h1>View ApplicationSummary #<?php echo $model->ID; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'ID',
		'NAR_ID',
		'DOMAIN',
		'INSTANCE_NAME',
		'REPORTING_UNIT',
		'PRIMARILY_AFFECTED_BIZ_AREA',
		'INSTANCE_INVESTMENT_STRATEGY',
		'APP_CRITICALITY_CLASS',
		'INSTANCE_DESCRIPTION',
		'RTB_EXTERNAL',
		'RTB_INTERNAL',
		'RTB_LICENSE',
		'CTB_EXTERNAL',
		'CTB_INTERNAL',
		'CTB_LICENSE',
	),
)); ?>
