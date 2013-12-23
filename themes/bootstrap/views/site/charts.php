<?php
/* @var $this ApplicationSummaryController */
/* @var $model ApplicationSummary */

$this->breadcrumbs=array(
	'Analytics'=>array( '/site/index' ),
	'Application View'=>array( '/applicationSummary/applicationView' ),
	$id,
);
?>

<!--?php $this->widget( 'ext.fusioncharts.fusionChartsWidget', array(
		'debugMode'=>true,
		'chartNoCache'=>true, // disabling chart cache
		'chartAction'=>Yii::app()->urlManager->createUrl( 'site/test', array( "id"=>$id ) ), // the chart action that we just generated the xml data at
		'chartType'=>'StackedColumn3D',
		'chartId'=>'test2' ) ); // If you display more then one chart on a single page then make sure you specify and id
?-->

<script type="text/javascript" src="../../../Charts/FusionCharts.js"></script>
<script type="text/javascript" language="Javascript" src="../../../Charts/assets/ui/js/jquery.min.js"></script>
<script type="text/javascript" language="Javascript" src="../../../Charts/assets/ui/js/lib.js"></script>
<script type="text/javascript" language="Javascript" src="../../../Charts/assets/ui/js/prettify.js"></script>
<div id="chartContainer" align="center">FusionWidgets XT will load here!</div>

<script type="text/javascript">
	var myChart = new FusionCharts( "../../../Charts/Gantt.swf", "myChartId", "900", "400", "1", "1" );
	var myXML = '<?php echo $strXML ?>';
	myChart.setXMLData(myXML);
	myChart.render("chartContainer");
</script>

<div id="chartdiv" align="center">Chart will load here</div>
<script type="text/javascript">
    var chart = new FusionCharts("../../../Charts/StackedColumn3DLineDY.swf", "ChartId", "900", "400", "1", "0");
	var dataString = "<?php echo $strXML2 ?>";
    chart.setXMLData( dataString);
   	chart.render("chartdiv");
</script>
