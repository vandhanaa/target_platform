<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'application-summary-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'NAR_ID',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'DOMAIN',array('class'=>'span5','maxlength'=>200)); ?>

	<?php echo $form->textFieldRow($model,'INSTANCE_NAME',array('class'=>'span5','maxlength'=>2000)); ?>

	<?php echo $form->textFieldRow($model,'REPORTING_UNIT',array('class'=>'span5','maxlength'=>40)); ?>

	<?php echo $form->textFieldRow($model,'PRIMARILY_AFFECTED_BIZ_AREA',array('class'=>'span5','maxlength'=>300)); ?>

	<?php echo $form->textFieldRow($model,'INSTANCE_INVESTMENT_STRATEGY',array('class'=>'span5','maxlength'=>40)); ?>

	<?php echo $form->textFieldRow($model,'APP_CRITICALITY_CLASS',array('class'=>'span5','maxlength'=>30)); ?>

	<?php echo $form->textFieldRow($model,'INSTANCE_DESCRIPTION',array('class'=>'span5','maxlength'=>4000)); ?>

	<?php echo $form->textFieldRow($model,'RTB_EXTERNAL',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'RTB_INTERNAL',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'RTB_LICENSE',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'CTB_EXTERNAL',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'CTB_INTERNAL',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'CTB_LICENSE',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
