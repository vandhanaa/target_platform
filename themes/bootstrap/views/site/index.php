<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
//include(Yii::app()->baseUrl.'/../Charts/FusionCharts.php');

?>

<?php
$this->widget( 'bootstrap.widgets.TbMenu', array(
		'type'=>'tabs',
		'stacked'=>false,
		'items'=>array(
			array( 'label'=>'Discovery', 'url'=>'#', 'items'=>array(
					array( 'label'=>'Data Capture', 'url'=>array( '/applicationSummary/datacapture' ) ),
					array( 'label'=>'Approvals', 'url'=>'#' ),
					array( 'label'=>'Data Modification', 'url'=>'#' ),
				) ),
			array( 'label'=>'Analytics', 'url'=>'#', 'items'=>array(
					array( 'label'=>'Application View', 'url'=>array('/applicationSummary/applicationView') ),
					array( 'label'=>'AS Domain View', 'url'=>'#' ),
					array( 'label'=>'CIO View', 'url'=>'#' ),
					array( 'label'=>'KPI Tracking', 'url'=>'#' ),
				) ),
			array( 'label'=>'Administration', 'url'=>'#', 'items'=>array(
					array( 'label'=>'User Access Mgmt.', 'url'=>'#' ),
					array( 'label'=>'Static Content Mgmt.', 'url'=>'#' )
				) ),
		),
	) ); ?>

<?php $this->beginWidget( 'bootstrap.widgets.TbHeroUnit', array(
		'heading'=>'Welcome to '.CHtml::encode( Yii::app()->name ),
	) ); ?>

<p>Congratulations! You have successfully created your Yii application.</p>

<?php $this->endWidget(); ?>

<!--?php $this->widget( 'ext.fusioncharts.fusionChartsWidget', array(
		'debugMode'=>true,
		'chartNoCache'=>true, // disabling chart cache
		'chartAction'=>Yii::app()->urlManager->createUrl( 'site/chart' ), // the chart action that we just generated the xml data at
		'chartType'=>'StackedColumn3D',
		'chartId'=>'test' ) ); // If you display more then one chart on a single page then make sure you specify and id
?>
