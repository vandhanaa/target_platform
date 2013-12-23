<?php
/* @var $this ApplicationSummaryController */
/* @var $model ApplicationSummary */

$this->breadcrumbs=array(
	'Discovery'=>array('/site/index'),
	'Data Capture',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-form form').submit(function(){
	$('#application-summary-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	$('.result-form').show();
	return false;
});
");
?>

<h1>Data capture</h1>
</br>
<h4>Search your application by NAR ID</h4>
</br>

<div class="search-form"> 
	<!-- style="display:none" -->
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->
<div class="result-form" style="display:none">
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'application-summary-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'ID',
		'NAR_ID',
		'DOMAIN',
		'INSTANCE_NAME',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

</div>
