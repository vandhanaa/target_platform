<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' - FAQ';
$this->breadcrumbs=array(
	'FAQ',
);
?>
<h1>FAQ : Frequently Asked Questions </h1>

</br>

<?php 
	$this->widget('zii.widgets.jui.CJuiAccordion', array(
		'panels'=>array(
			'How does this work?'=>'content 1',
			'What is the purpose of the Analytics tab?'=>'content 2',
			'Is Administration tab only for administrators?'=>'content 3',
			'Can I trust data on this tool?'=>'content',
			//'panel 3'=>$this->renderPartial('_partial', null, true),
		),
		'options'=>array(
			'animated'=>'bounceslide',
			'collapsible'=>true,
			'active'=>false,
			'autoheight'=>false,
			'style'=>array('minHeight'=>'100',),
			'icons'=>array(
				'header'=>'ui-icon-plus',
				'headerSelected'=>'ui-icon-circle-arrow-s'),

		),
	));
?>