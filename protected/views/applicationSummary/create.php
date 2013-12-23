<?php
$this->breadcrumbs=array(
	'Application Summaries'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ApplicationSummary','url'=>array('index')),
	array('label'=>'Manage ApplicationSummary','url'=>array('admin')),
);
?>

<h1>Create ApplicationSummary</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>