<?php
$this->breadcrumbs=array(
	'Application Summaries'=>array('index'),
	$model->ID=>array('view','id'=>$model->ID),
	'Update',
);

$this->menu=array(
	array('label'=>'List ApplicationSummary','url'=>array('index')),
	array('label'=>'Create ApplicationSummary','url'=>array('create')),
	array('label'=>'View ApplicationSummary','url'=>array('view','id'=>$model->ID)),
	array('label'=>'Manage ApplicationSummary','url'=>array('admin')),
);
?>

<h1>Update ApplicationSummary <?php echo $model->ID; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>