<?php
/**
 * fusionCharts Class file
 *
 * @author Vadim Gabriel <vadimg88[at]gmail[dot]com>
 * @link http://www.vadimg.com/
 * @copyright Vadim Gabriel
 * @license http://www.yiiframework.com/license/
 *
 */

/**
 * Description:
 * --------------
 * This extension allows you to create charts using the known fusion charts {@link http://fusioncharts.com} API.
 * It incorporates all the available methods exists in the fusion charts PHP Class library.
 * With this extension you will be able to create charts in various types
 * Such as Column2D, Column3D, Bar2D, Bar3D, Lines, Areas, Pies etc.
 * Fusion Charts online documentation can be found here: http://www.fusioncharts.com/docs/
 *
 * Requirements:
 * --------------
 * Yii 1.1.x or above
 *
 * Installation:
 * --------------
 * Extract the zip/tar archive and move the contents to your applications extensions directory.
 * So the fusionCharts.php file will be located under application/extensions/fusioncharts.
 * Then you need to initiate the component in the application configuration file by adding the following
 * code to the components array
 *
 *  'components'=>array(
 *   .....
 *   'fusioncharts' => array(
 *      'class' => 'ext.fusioncharts.fusionCharts',
 *    ),
 *   ),
 *
 * That will only make the fusion charts extension available to access as a component. Now we need to create a chart and display it.
 *
 * Creating A Chart:
 * ------------------
 * First in your controller create an action, For this example we will call it 'actionChart'.
 * Inside that chart we start by calling the method {@link fusionCharts::setChartOptions()} and we pass an array
 * as the first argument of key=>value pairs that will work as <chart> element Attributes, In our example we set the caption, xAxisName and yAxisName.
 *
 * Yii::app()->fusioncharts->setChartOptions( array( 'caption'=>'My Chart', 'xAxisName'=>'Months', 'yAxisName'=>'Revenue' ) );
 *
 * Now we would like to add sets, which are used for simple charts as the actual chart data. In order to add a set all we need to do is call
 * the method {@link fusionCharts::addSet()} and pass an array as the first and only argument to that method with the <set> element Attributes.
 * In our example we set the label and the set actual value:
 *
 * Yii::app()->fusioncharts->addSet(array('label'=>'July', 'value'=>'680000'));
 * Yii::app()->fusioncharts->addSet(array('label'=>'August', 'value'=>'680000'));
 * Yii::app()->fusioncharts->addSet(array('label'=>'Jan', 'value'=>'680000'));
 *
 * Note: For convince there is a helper function called {@link fusionCharts::addSets()} that you can pass an array of arrays that each array
 * will be treated as a set and will be added, So the above can be rewritten as follows:
 *
 *  $sets = array(
 *    array('label'=>'July', 'value'=>'680000'),
 *    array('label'=>'August', 'value'=>'680000'),
 *    array('label'=>'Jan', 'value'=>'680000'),
 * );
 *
 * Yii::app()->fusioncharts->addSets($sets);
 *
 * In those charts you can add categories, In this extension that can be done by calling {@link fusioncharts::addCategory()}, In this
 * Method you can also pass an array as the first and only argument that will be treated as the <category> element attributes.
 *
 * Yii::app()->fusioncharts->addCategory(array('label'=>'Jan'));
 * Yii::app()->fusioncharts->addCategory(array('label'=>'Feb'));
 * Yii::app()->fusioncharts->addCategory(array('label'=>'Mar'));
 *
 * If you need to add multiple values at once without calling the addCategory method every time you can pass an array of arrays to the
 * {@link fusioncharts::addCategories()} method similar to the addSets method, So the above code can be rewritten like the following:
 *
 *  $categories = array(
 *    array('label'=>'July'),
 *    array('label'=>'August'),
 *    array('label'=>'Jan'),
 * );
 *
 * Yii::app()->fusioncharts->addCategories($categories);
 *
 * Besides sets and categories you can create datasets by using the {@link fusioncharts::addDataSet()} and {@link fusioncharts::addSetToDataSet()}
 * Those two methods accept two arguments, the first is the dataset unique key and the second is an array of key=>value pairs that will act
 * as the <dataset> / <set> element attributes. So in order to create two datasets and add sets to those datasets we can use the following code:
 *
 *  // Add two data sets
 * Yii::app()->fusioncharts->addDataSet('data_unique_key', $options);
 * Yii::app()->fusioncharts->addDataSet('data_unique_key2', $options);
 *
 * // Add three sets to the 'data_unique_key' data set
 * Yii::app()->fusioncharts->addSetToDataSet('data_unique_key', $options);
 * Yii::app()->fusioncharts->addSetToDataSet('data_unique_key', $options);
 * Yii::app()->fusioncharts->addSetToDataSet('data_unique_key', $options);
 *
 * // Add two sets to the 'data_unique_key2' data set
 * Yii::app()->fusioncharts->addSetToDataSet('data_unique_key2', $options);
 * Yii::app()->fusioncharts->addSetToDataSet('data_unique_key2', $options);
 *
 *
 * You can also add trendlines, styles and applications to apply those to the right elements by using one/all of the following methods:
 *
 *  Yii::app()->fusioncharts->addTrendLine(array('startValue'=>'700000', 'color'=>'009933', 'displayvalue'=>'Target'));
 * Yii::app()->fusioncharts->addDefinition(array('name'=>'CanvasAnim', 'type'=>'animation', 'param'=>'_xScale', 'start'=>'0', 'duration'=>'1'));
 * Yii::app()->fusioncharts->addApplication(array('toObject'=>'Canvas', 'styles'=>'CanvasAnim'));
 *
 * Sometimes you may want to add a vLine (a line separating columns) you can add vLines to both sets and categories by calling
 * {@link fusioncharts::addVLine()} and {@link fusioncharts::addCategoryVLine()} Both accept an array of options for the element attributes.
 * If you need to add a vLine to a data set then just use {@link fusioncharts::addDataSetVLine($key, $options)}
 *
 * If for some reason the labels on the chart do not display properly just set the property useI18N to true:
 *
 * Yii::app()->fusioncharts->useI18N = true;
 *
 * Either in the application configuration or manually at any place in the application.
 *
 * To display the xml generated call {@link fusioncharts::getXMLData()} and the xml will be printed as string. If you want it to be printed as
 * an actual XML document with the correct content type headers pass in a boolean value true to that method.
 *
 * In the fusion chart you can specify special messages that are passed with the .swf file in the url, To specify those just either apply the messages
 * to the Yii::app()->fusioncharts->chartMessage property or call {@link fusioncharts::setChartMessage($msg)}.
 *
 * If you need to have a list of available charts then call either {@link fusioncharts::getChartTypes()} or {@link fusioncharts::getKeyValueChartTypes()}.
 *
 * By default the charts are cached by the URL, if you want to disable caching then simple set the property
 * Yii::app()->fusioncharts->chartNoCache to a boolean value of true.
 *
 * To get a list of commonly used colors in the chart call {@link fusioncharts::getColors()}
 *
 * If for some reason you want to add custom XML string to the generated XML Document you can simply call {@link fusioncharts::addCustomXmlData()}
 *
 * You can turn the chart in debug mode by setting the property Yii::app()->fusioncharts->debugMode to 1. This will display a block on top of the generated
 * Chart with some development info.
 *
 * If you browsed through the Fusion charts PHP Class and you liked that one better you can use the methods in that class by simply calling those methods
 * as if they were inside this extension. So if that class has a method called 'test' You can call Yii::app()->fusioncharts->test(); and that method will be invoked.
 * Or you can also use the builder which implements that class Yii::app()->fusioncharts->builder->test() (both calls are the same), Same thing applies to class members
 * You would like to set or get, Yii::app()->fusioncharts->key = 'value'; or echo Yii::app()->fusioncharts->key;
 *
 * If at some point you need to reset the xml data just call {@link fusioncharts::resetXml()}.
 *
 * Note: All the add* methods return an object of the fusion charts, So you can chain methods.
 * Ie: addset($options)->addSet($options)->addCategory($options)...
 *
 * Displaying A Chart:
 * ------------------
 *
 * After creating the chart in the 'actionChart' action. We now want to display it. We can use the {@link fusionChartWidget} to display the generated chart.
 *
 * $this->widget('ext.fusioncharts.fusionChartsWidget', array(
 *                 'chartNoCache'=>true, // disabling chart cache
 *                 'chartAction'=>Yii::app()->urlManager->createUrl('game/chart'), // the chart action that we just generated the xml data at
 *                 'chartId'=>'mychart')); // If you display more then one chart on a single page then make sure you specify and id
 *
 * The above code will display a 'Column2D' chart by default, if you want to display another chart simply set the property 'chartType' in the widget or globally in the application component
 * and render the widget again (use the helper function {@link fusioncharts::getKeyValueChartTypes()} for a list of available charts).
 *
 * You can also specify the width and height of the chart by specifying the properties 'chartWidth' and 'chartHeight' in the widget or globally in the application component.
 *
 * By default the widget will display the generated chart using JS supplied by fusionCharts. If you want to support users that do not have JS enabled then set the property 'htmlChart' to a boolean value true
 * in the widget properties or globally in the application component and the chart will be rendered using <embed> tag.
 *
 *
 * Note: This extension is just a wrapper for the fustion charts service. You will need to browse trough their documentation and
 * read through the available properties in order to create the chart you want to.
 *
 */
class fusionCharts extends CApplicationComponent
{
	/**
	 *
	 *
	 * @var $chartId unique chart ID
	 */
	public $chartId = 'YiiFusionChart';
	/**
	 *
	 *
	 * @var $chartType Chart type (without the .swf suffix)
	 * Must be located under extensions.fusioncharts.assets.Charts
	 */
	public $chartType = 'Column2D';
	/**
	 *
	 *
	 * @var $chartsPath Charts location path
	 */
	public $chartsPath = null;
	/**
	 *
	 *
	 * @var $assetsPath this extension assets path
	 */
	public $assetsPath = null;
	/**
	 *
	 *
	 * @var $chartAction the action to load the chart data
	 */
	public $chartAction = '';
	/**
	 *
	 *
	 * @var $chartWidth the chart flash width
	 */
	public $chartWidth = 900;
	/**
	 *
	 *
	 * @var $chartHeight the chart flash height
	 */
	public $chartHeight = 300;
	/**
	 *
	 *
	 * @var $registerWithJS registers the chart with the ability
	 * to add JS functions to drill down chrats @see Fusion Charts API Documentation
	 */
	public $registerWithJS = 1;
	/**
	 *
	 *
	 * @var $debugMode enable fusion charts debug mode
	 */
	public $debugMode = 0;
	/**
	 *
	 *
	 * @var $htmlChart display the fusion chart in an HTML form?
	 * Using embed html tags instead of JS embedding.
	 */
	public $htmlChart = false;
	/**
	 *
	 *
	 * @var $useI18N if you are using language other then English
	 * And for some reason the language strings do not display properly
	 * assign a boolean value true to this property.
	 */
	public $useI18N = false;
	/**
	 *
	 *
	 * @var $chartTransparent Use transparent chart background?
	 * You can specify false for 'opaque' or true for 'transparent'
	 */
	public $chartTransparent = null;
	/**
	 *
	 *
	 * @var $builder This is an instance of FusionChartsLib
	 */
	public $builder;
	/**
	 *
	 *
	 * @var $chartMessage the message that will be displayed on the chart
	 */
	public $chartMessage = array();
	/**
	 *
	 *
	 * @var $chartNoCache either true/false to cache or not the generated chart
	 */
	public $chartNoCache = false;
	/**
	 *
	 *
	 * @var $_data array of elements holding the xml document
	 */
	protected $_data=array();
	/**
	 *
	 *
	 * @var $_dataXml holds the string of the chart
	 */
	protected $_dataXml = '';
	/**
	 *
	 *
	 * @var $_chartOptions array of key=>value pairs for the main
	 * Chart xml attribute options
	 */
	protected $_chartOptions = array();
	/**
	 *
	 *
	 * @var $_categoryOptions array of key=>value pairs for the category
	 * xml attribute options
	 */
	protected $_categoryOptions = array();
	/**
	 *
	 *
	 * @var $_chartXmlData temporary holds the current xml data
	 */
	protected $_chartXmlData = '';

	/**
	 * Initialize the extension
	 */
	public function init() {
		// We first reset the chart
		// when we initiate the object
		$this->resetXml();

		// Add path alias
		Yii::setPathOfAlias( '_fc', dirname( __FILE__ ) );

		// Load fusionCharts generator class
		Yii::import( '_fc.Includes.FusionChartsLib' );
		$this->builder = new FusionChartsLib( $this->chartType, $this->chartWidth, $this->chartHeight, $this->chartId, $this->chartTransparent );
	}

	/**
	 * Set the chart options, see the fusion charts documentation
	 * For the full list of available key value pairs.
	 *
	 * @param unknown $options array of the chart attribute options
	 * @return fustionCharts object
	 */
	public function setChartOptions( $options=array() ) {
		$this->_chartOptions = $options;
		return $this;
	}

	/**
	 * Set the category xml attribute options, see the fusion charts documentation
	 * For the full list of available key value pairs.
	 *
	 * @param unknown $options array of the category attribute options
	 * @return fustionCharts object
	 */
	public function setCategoryOptions( $options=array() ) {
		$this->_categoryOptions = $options;
		return $this;
	}

	/**
	 *
	 *
	 * @return array of available chart types
	 */
	public function getChartTypes() {
		return $this->builder->chartSWF;
	}

	/**
	 * Get the available chart types in a key=>value pairs array
	 *
	 * @return $temp array of available chart types
	 */
	public function getKeyValueChartTypes() {
		$temp = array();
		if ( is_array( $this->builder->chartSWF ) && count( $this->builder->chartSWF ) ) {
			foreach ( $this->builder->chartSWF as $chartKey => $chartValue ) {
				$temp[ $chartKey ] = $chartValue[0];
			}
		}

		return $temp;
	}

	/**
	 *
	 *
	 * @return array of available chart colors
	 */
	public function getColors() {
		return $this->builder->arr_FCColors;
	}

	/**
	 * Add custom XML formatted string to the xml data string
	 * This is here for help purposes
	 *
	 * @param unknown $string Add custom string to the xml data
	 * @return void
	 */
	public function addCustomXmlData( $string ) {
		$this->_chartXmlData .= $string."\n";
	}

	/**
	 *  Add the <set ... /> xml attribute with custom declared options
	 *
	 * @param unknown $options array of key=>value pairs to add to the options of the xml attribute
	 * @return fustionCharts object
	 */
	public function addSet( $options=array() ) {
		$this->_chartXmlData .= "\t<set".$this->convertOptionsToXML( $options )." />\n";
		return $this;
	}

	/**
	 *  Add a vLine <vLine ... /> xml attribute with options
	 *
	 * @param unknown $options array of key=>value pairs to add to the options of the xml attribute
	 * @return fustionCharts object
	 */
	public function addVLine( $options=array() ) {
		$this->_chartXmlData .= "\t<vLine".$this->convertOptionsToXML( $options )." />\n";
		return $this;
	}

	/**
	 *  Add a category <category ... /> xml attribute with options
	 *
	 * @param unknown $options array of key=>value pairs to add to the options of the xml attribute
	 * @return fustionCharts object
	 */
	public function addCategory( $options ) {
		$this->_data['categories'][] = "\t<category".$this->convertOptionsToXML( $options )." />\n";
		return $this;
	}

	/**
	 *  Add a category vLine <vLine ... /> xml attribute with options
	 *
	 * @param unknown $options array of key=>value pairs to add to the options of the xml attribute
	 * @return fustionCharts object
	 */
	public function addCategoryVLine( $options ) {
		$this->_data['categories'][] = "\t<vLine".$this->convertOptionsToXML( $options )." />\n";
		return $this;
	}

	/**
	 *  Add a data set <dataset ... /> xml attribute with options
	 *
	 * @param unknown $options array of key=>value pairs to add to the options of the xml attribute
	 * @return fustionCharts object
	 */
	public function addDataSet( $setName, $options ) {
		$this->_data['dataset'][$setName][] = $options;
		return $this;
	}

	/**
	 * Add a set to a data set <set ... /> xml attribute with options
	 *
	 * @param unknown $options array of key=>value pairs to add to the options of the xml attribute
	 * @return fustionCharts object
	 */
	public function addSetToDataSet( $setName, $options ) {
		$this->_data['datasets'][$setName][] = "\t<set".$this->convertOptionsToXML( $options )." />\n";
		return $this;
	}

	/**
	 * Add a vLine to a data set <vLine ... /> xml attribute with options
	 *
	 * @param unknown $options array of key=>value pairs to add to the options of the xml attribute
	 * @return fustionCharts object
	 */
	public function addVLineToDataSet( $setName, $options ) {
		$this->_data['datasets'][$setName][] = "\t<vLine".$this->convertOptionsToXML( $options )." />\n";
		return $this;
	}

	/**
	 *  Add a trend line <line ... /> xml attribute with options
	 *
	 * @param unknown $options array of key=>value pairs to add to the options of the xml attribute
	 * @return fustionCharts object
	 */
	public function addTrendLine( $options ) {
		$this->_data['trendlines'][] = "\t<line".$this->convertOptionsToXML( $options )." />\n";
		return $this;
	}

	/**
	 * Add a style definition <style ... /> xml attribute with options
	 *
	 * @param unknown $options array of key=>value pairs to add to the options of the xml attribute
	 * @return fustionCharts object
	 */
	public function addDefinition( $options ) {
		$this->_data['styles']['definition'][] = "\t<style".$this->convertOptionsToXML( $options )." />\n";
		return $this;
	}

	/**
	 * Add an application <apply ... /> xml attribute with options
	 *
	 * @param unknown $options array of key=>value pairs to add to the options of the xml attribute
	 * @return fustionCharts object
	 */
	public function addApplication( $options ) {
		$this->_data['styles']['application'][] = "\t<apply".$this->convertOptionsToXML( $options )." />\n";
		return $this;
	}

	/**
	 * Add several categories at once each one needs to have an array of options
	 * To insert to it's xml attribute @see addCategory
	 *
	 * @param unknown $rows array of category elements
	 * @return fustionCharts object
	 */
	public function addCategories( $rows=array() ) {
		if ( is_array( $rows ) && count( $rows ) ) {
			foreach ( $rows as $row ) {
				$this->addCategory( $row );
			}
		}

		return $this;
	}

	/**
	 * Add several sets at once each one needs to have an array of options
	 * To insert to it's xml attribute @see addSet
	 *
	 * @param unknown $rows array of set elements
	 * @return fustionCharts object
	 */
	public function addSets( $rows=array() ) {
		if ( is_array( $rows ) && count( $rows ) ) {
			foreach ( $rows as $row ) {
				$this->addSet( $row );
			}
		}

		return $this;
	}

	/**
	 *
	 *
	 * @param unknown $message set the chart message
	 * @return fustionCharts object
	 */
	public function setChartMessage( $message ) {
		$this->chartMessage = $message;
		return $this;
	}

	/**
	 *
	 *
	 * @param unknown $cache set if to cache or not the generated cache
	 * @return fustionCharts object
	 */
	public function setChartCache( $cache ) {
		$this->chartCache = (bool) $cache;
		return $this;
	}

	/**
	 * Parse the xml document and return it's value, If the a boolean value
	 * Passed in the first argument of the method the method will output the xml
	 * data as an xml document with the correct headers and will terminate the script.
	 *
	 * @param unknown $includeHeader boolean value to include the xml content type header
	 * @return XMLData as string
	 */
	public function getXMLData( $includeHeader=true, $useExternalXML=false ) {
		if ( !$useExternalXML ) {


			// Start chart document
			$this->_dataXml = "<chart".$this->convertOptionsToXML( $this->_chartOptions ).">\n";

			// Add sets and vlines
			$this->_dataXml .= $this->_chartXmlData;

			// Add categories
			if ( isset( $this->_data['categories'] ) && count( $this->_data['categories'] ) ) {
				$this->_dataXml .= "\t<categories".$this->convertOptionsToXML( $this->_categoryOptions ).">\n";
				foreach ( $this->_data['categories'] as $categoryValue ) {
					$this->_dataXml .= "\t\t".$categoryValue."\n";
				}
				$this->_dataXml .= "\t</categories>\n";
			}

			// Add datasets and their sets
			if ( isset( $this->_data['dataset'] ) && count( $this->_data['dataset'] ) ) {
				foreach ( $this->_data['dataset'] as $dataSetKey => $dataSetNumbers ) {
					if ( count( $dataSetNumbers ) ) {
						foreach ( $dataSetNumbers as $dataSetOptions ) {
							$this->_dataXml .= "\t<dataset".$this->convertOptionsToXML( $dataSetOptions ).">\n";

							// Add in the data sets values
							if ( isset( $this->_data['datasets'] ) && count( $this->_data['datasets'][$dataSetKey] ) ) {
								foreach ( $this->_data['datasets'][$dataSetKey] as $dataSetValue ) {
									$this->_dataXml .= "\t\t".$dataSetValue."\n";
								}
							}

							$this->_dataXml .= "\t</dataset>\n";
						}
					}
				}
			}

			// Add trendlines
			if ( isset( $this->_data['trendlines'] ) && count( $this->_data['trendlines'] ) ) {
				$this->_dataXml .= "\t<trendLines>\n";
				foreach ( $this->_data['trendlines'] as $trendLineValue ) {
					$this->_dataXml .= "\t\t".$trendLineValue."\n";
				}
				$this->_dataXml .= "\t</trendLines>\n";
			}

			// Add styles
			if ( isset( $this->_data['styles'] ) && count( $this->_data['styles'] ) ) {
				$this->_dataXml .= "\t<styles>\n";

				// Add definition
				if ( isset( $this->_data['styles']['definition'] ) && count( $this->_data['styles']['definition'] ) ) {
					$this->_dataXml .= "\t\t<definition>\n";
					foreach ( $this->_data['styles']['definition'] as $definitionValue ) {
						$this->_dataXml .= "\t\t\t".$definitionValue."\n";
					}
					$this->_dataXml .= "\t\t</definition>\n";
				}

				// Add applications
				if ( isset( $this->_data['styles']['application'] ) && count( $this->_data['styles']['application'] ) ) {
					$this->_dataXml .= "\t\t<application>\n";
					foreach ( $this->_data['styles']['application'] as $applicationValue ) {
						$this->_dataXml .= "\t\t\t".$applicationValue."\n";
					}
					$this->_dataXml .= "\t\t</application>\n";
				}

				$this->_dataXml .= "\t</styles>\n";
			}

			// Close chart document
			$this->_dataXml .= "</chart>";

			// Include headers?
			if ( $includeHeader ) {
				$this->sendChartHeaders( $this->_dataXml );
			}
		}
		else {
			$this->_dataXml = $useExternalXML;
		}

		// Return
		return $this->_dataXml;
	}

	/**
	 * Reset the chart xml data
	 *
	 * @return void
	 */
	public function resetXml() {
		$this->_dataXml = null;
		$this->_data = array();
		$this->_chartOptions = array();
		$this->_chartXmlData = '';
	}

	/**
	 * Convert chart array options into encoded xml string
	 *
	 * @return string
	 */
	protected function convertOptionsToXML( $options=array() ) {
		$parsedXML = '';
		if ( count( $options ) ) {
			$parsedXML = ' ';
			foreach ( $options as $k => $v ) {
				if ( strlen( $v ) >0 ) {
					$parsedXML .= $k . "='" . $this->_encodeSpecialChars( $v ) . "' ";
				}
			}
		}

		return $parsedXML;
	}

	/**
	 * Display the charts xml content header, If needed
	 * Print the UTF8-BOM signature required by the fusion charts
	 * To display I18N language strings properly.
	 * If data is passed then show the data as well.
	 *
	 * @param string  $data      XML Data to display
	 * @param boolean $useI18N   if to print the UTF8-BOM signature
	 * @param boolean $terminate terminate the script execution?
	 * @return mixed null if no data is passed string if data is passed
	 */
	public function sendChartHeaders( $data=null, $useI18N=false, $terminate=true ) {
		header( 'content-type: text/xml;' );
		if ( ( $this->useI18N || $useI18N ) ) {
			echo pack( "C3" , 0xef, 0xbb, 0xbf );
		}
		if ( $data !== null ) {
			print $data;
		}

		if ( $terminate ) {
			Yii::app()->end();
		}
	}

	/**
	 * Convert an array to an XML attributes
	 */
	public function covertParamToXml( $param ) {
		if ( !$param || !is_array( $param ) ) {
			return;
		}

		return $this->builder->ConvertParamToXMLAttribute( $param, true );
	}

	/**
	 * Encode a string to add it to the HTML
	 *
	 * @param unknown $strValue the string needs to be encoded
	 * @return encoded string
	 */
	protected function _encodeSpecialChars( $strValue ) {
		// Converting ' and " to %26apos; and &quot;
		$strValue=str_replace( "'", "%26apos;", $strValue );
		$strValue=str_replace( "\"", "&quot;", $strValue );
		$strValue=str_replace( "<", "&lt;", $strValue );
		$strValue=str_replace( ">", "&gt;", $strValue );
		return $strValue;
	}

	/**
	 * Check if the property exists in the library object
	 * If not then fallback to check if it exists inside
	 * the current class, otherwise return false
	 *
	 * @param unknown $key property name
	 * @return mixed
	 */
	public function __get( $key ) {
		if ( property_exists( 'FusionChartsLib', $key ) ) {
			return $this->builder->$key;
		}

		if ( isset( $this->$key ) ) {
			return $this->$key;
		}

		return false;
	}

	/**
	 * Set a value in the library object and in the current class
	 *
	 * @param unknown $key   property name
	 * @param unknown $value property value
	 * @return void
	 */
	public function __set( $key, $value ) {
		if ( isset( $this->builder->$key ) ) {
			$this->builder->$key = $value;
		}

		if ( isset( $this->$key ) ) {
			$this->$key = $value;
		}
	}

	/**
	 * Check to see if the method name exists under the library object
	 * if it does that call it otherwise do nothing.
	 *
	 * @param unknown $name   method name
	 * @param unknown $params array of parameters to pass to the class method
	 * @return if the method exists in the library object returns mixed otherwise returns void
	 */
	public function __call( $name, $params ) {
		if ( method_exists( 'FusionChartsLib', $name ) ) {
			return call_user_func_array( array( $this->builder, $name ), $params );
		}

		throw new CException( Yii::t( 'extension.fustionchart', 'The method "{method}" was not found under the fusion charts classes.', array( '{method}'=>$name ) ), 500 );
	}
}
