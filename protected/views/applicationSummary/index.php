<?php
$this->breadcrumbs=array(
	'Application Summaries',
);

$this->menu=array(
	array('label'=>'Create ApplicationSummary','url'=>array('create')),
	array('label'=>'Manage ApplicationSummary','url'=>array('admin')),
);
?>

<h1>Application Summaries</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
