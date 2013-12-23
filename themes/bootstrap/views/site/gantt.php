<?php
/* @var $this ApplicationSummaryController */
/* @var $model ApplicationSummary */

$this->breadcrumbs=array(
	'Analytics'=>array( '/site/index' ),
	'Application View'=>array( '/applicationSummary/applicationView' ),
	$id,
);

echo '<script type="text/javascript">'.$strXML2.'</script>';
?>

<script type="text/javascript" src="../../../Charts/FusionCharts.js"></script>
<script type="text/javascript" language="Javascript" src="../../../Charts/assets/ui/js/jquery.min.js"></script>
<script type="text/javascript" language="Javascript" src="../../../Charts/assets/ui/js/lib.js"></script>
<script type="text/javascript" language="Javascript" src="../../../Charts/assets/ui/js/prettify.js"></script>
<div id="chartContainer" align="center">FusionWidgets XT will load here!</div>

<script type="text/javascript"><!--
	var myChart = new FusionCharts( "../../../Charts/Gantt.swf", "myChartId", "900", "400", "1", "1" );
	var myXML = '<?php echo $strXML ?>';
	myChart.setXMLData(myXML);
	myChart.render("chartContainer");
</script>

<div id="chartdiv" align="center">Chart will load here</div>
<script type="text/javascript">
    //if (GALLERY_RENDERER && GALLERY_RENDERER.search(/javascript|flash/i)==0)  FusionCharts.setCurrentRenderer(GALLERY_RENDERER);
    var chart = new FusionCharts("../../../Charts/StackedColumn3DLineDY.swf", "ChartId", "900", "400", "1", "0");
//     var dataString ='<chart caption="Visits from search engines" showValues="1" showColumnShadow="0" sNumberSuffix="%">\n\
// \n\
// 	<categories>\n\
// 		<category label="Jan" />\n\
// 		<category label="Feb" />\n\
// 		<category label="Mar" />\n\
// 		<category label="Apr" />\n\
// 		<category label="May" />\n\
// 		<category label="Jun" />\n\
// 		<category label="Jul" />\n\
// 		<category label="Aug" />\n\
// 		<category label="Sep" />\n\
// 		<category label="Oct" />\n\
// 		<category label="Nov" />\n\
// 		<category label="Dec" />\n\
// 	</categories>\n\
// \n\
// 	<dataset seriesName="Google">\n\
// 		<set value="3040" />\n\
// 		<set value="2794" />\n\
// 		<set value="3026" />\n\
// 		<set value="3341" />\n\
// 		<set value="2800" />\n\
// 		<set value="2507" />\n\
// 		<set value="3701" />\n\
// 		<set value="2671" />\n\
// 		<set value="2980" />\n\
// 		<set value="2041" />\n\
// 		<set value="1813" />\n\
// 		<set value="1691" />\n\
// 	</dataset>\n\
// \n\
// 	<dataset seriesName="Yahoo">\n\
// 		<set value="1200" />\n\
// 		<set value="1124" />\n\
// 		<set value="1006" />\n\
// 		<set value="921" />\n\
// 		<set value="1500" />\n\
// 		<set value="1007" />\n\
// 		<set value="921" />\n\
// 		<set value="971" />\n\
// 		<set value="1080" />\n\
// 		<set value="1041" />\n\
// 		<set value="1113" />\n\
// 		<set value="1091" />\n\
// 	</dataset>\n\
// \n\
// 	<dataset seriesName="MSN">\n\
// 		<set value="600" />\n\
// 		<set value="724" />\n\
// 		<set value="806" />\n\
// 		<set value="621" />\n\
// 		<set value="700" />\n\
// 		<set value="907" />\n\
// 		<set value="821" />\n\
// 		<set value="671" />\n\
// 		<set value="880" />\n\
// 		<set value="641" />\n\
// 		<set value="913" />\n\
// 		<set value="691" />\n\
// 	</dataset>\n\
// \n\
// 	<dataset seriesName="Percent of total hits" parentYAxis="S" lineThickness="4" color="993300">\n\
// 		<set value="96.5" />\n\
// 		<set value="77.1" />\n\
// 		<set value="73.2" />\n\
// 		<set value="61.1" />\n\
// 		<set value="70.0" />\n\
// 		<set value="60.7" />\n\
// 		<set value="62.1" />\n\
// 		<set value="75.1" />\n\
// 		<set value="80.0" />\n\
// 		<set value="54.1" />\n\
// 		<set value="51.3" />\n\
// 		<set value="59.1" />\n\
// 	</dataset>\n\
// </chart>';
// var dataString ='<chart palette="1" caption="Sales" showLabels="1" showvalues="0" numberPrefix="$" sYAxisValuesDecimals="2" connectNullData="0" PYAxisName="Revenue" SYAxisName="Quantity"  numDivLines="4" formatNumberScale="0" syncAxisLimits="1">\n\
// <categories>\n\
// <category label="March" />\n\
// <category label="April" />\n\
// <category label="May" />\n\
// <category label="June" />\n\
// <category label="July" />\n\
// </categories>\n\
// <dataset seriesName="Product A" color="AFD8F8" showValues="0">\n\
// <set value="25601.34" />\n\
// <set value="20148.82" />\n\
// <set value="17372.76" />\n\
// <set value="35407.15" />\n\
// <set value="38105.68" />\n\
// </dataset>\n\
// <dataset seriesName="Product B" color="F6BD0F" showValues="0" >\n\
// <set value="57401.85" /> \n\
// <set value="41941.19" />\n\
// <set value="45263.37" />\n\
// <set value="117320.16" />\n\
// <set value="114845.27" dashed="1"/>\n\
// </dataset>\n\
// <dataset seriesName="Total Quantity" color="8BBA00" showValues="0" parentYAxis="S" >\n\
// <set value="45000" />\n\
// <set value="44835" />\n\
// <set value="42835" />\n\
// <set value="77557" />\n\
// <set value="92633" />\n\
// </dataset>\n\
// </chart>';
var dataString = "<?php echo $strXML2 ?>";
    chart.setXMLData( dataString);
   	chart.render("chartdiv");
</script>
