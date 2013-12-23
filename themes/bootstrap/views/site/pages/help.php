<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' - Help';
$this->breadcrumbs=array(
	'Help',
);
?>

<h1>Help</h1>

<?php if(Yii::app()->user->hasFlash('help')): ?>

<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('help'); ?>
</div>

<?php else: ?>

<p>
This is help!! 
</p>

<?php endif; ?>