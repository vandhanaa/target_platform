<?php
/* @var $this ApplicationSummaryController */
/* @var $model ApplicationSummary */

$this->breadcrumbs=array(
	'Analytics'=>array( '/site/index' ),
	'Application View',
);

Yii::app()->clientScript->registerScript( 'search', "
$('.search-form form').submit(function(){
	$('#application-view-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	$('.result-form').show();
	return false;
});
" );
?>

<h1>Application View</h1>
</br>
<h4>Search your application by NAR ID</h4>
</br>

<div class="search-form">
	<!-- style="display:none" -->
<?php $this->renderPartial( '_search', array(
		'model'=>$model,
	) ); ?>
</div><!-- search-form -->
<div class="result-form" style="display:none">
<?php $this->widget( 'zii.widgets.grid.CGridView', array(
		'id'=>'application-view-grid',
		'dataProvider'=>$model->search(),
		'filter'=>$model,
		'columns'=>array(
			'ID',
			'NAR_ID',
			'INSTANCE_NAME',
			array(
				'class'=>'CButtonColumn',
				'template'=>'{analyse}',
				'buttons'=>array(
				 	'analyse'=>array(
						'icon'=>'search',
						'url'=>'Yii::app()->createUrl("site/charts", array("id" => $data->ID))',
					),
				),
			),
		),
	) ); ?>

</div>
