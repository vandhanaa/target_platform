<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->ID,
);

$this->menu=array(
	array('label'=>'List User', 'url'=>array('index')),
	array('label'=>'Create User', 'url'=>array('create')),
	array('label'=>'Update User', 'url'=>array('update', 'id'=>$model->ID)),
	array('label'=>'Delete User', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage User', 'url'=>array('admin')),
);
?>

<h1>View User #<?php echo $model->ID; ?></h1>

<!--?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ID',
		'PASSWORD',
		'EMAIL',
		'FIRST_NAME',
		'LAST_NAME',
		'ROLE',
		'DOMAIN',
	),
)); ?-->
<?php $this->widget('bootstrap.widgets.TbDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		array('name'=>'ID','label'=>'ID'),
		array('name'=>'EMAIL','label'=>'Email'),
		array('name'=>'FIRST_NAME', 'label'=>'First Name'),
		array('name'=>'LAST_NAME', 'label'=>'Last Name'),
		array('name'=>'ROLE', 'label'=>'Role'),
		array('name'=>'DOMAIN', 'label'=>'Domain'),
	),
)); ?>