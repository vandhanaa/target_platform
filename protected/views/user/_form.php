<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'PASSWORD'); ?>
		<?php echo $form->passwordField($model,'PASSWORD',array('size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'PASSWORD'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'EMAIL'); ?>
		<?php echo $form->textField($model,'EMAIL',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'EMAIL'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'FIRST_NAME'); ?>
		<?php echo $form->textField($model,'FIRST_NAME',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'FIRST_NAME'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'LAST_NAME'); ?>
		<?php echo $form->textField($model,'LAST_NAME',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'LAST_NAME'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ROLE'); ?>
		<?php echo $form->textField($model,'ROLE',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'ROLE'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'DOMAIN'); ?>
		<?php echo $form->textField($model,'DOMAIN',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'DOMAIN'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->