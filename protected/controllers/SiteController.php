<?php
Yii::setPathOfAlias( 'charts', dirname( __FILE__ ).'/../../Charts' );
class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions() {
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex() {
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render( 'index' );
	}

	public function actionCharts( $id ) {
		$query = 'SELECT * FROM execution_planning, application_summary WHERE execution_planning.nar_id = application_summary.nar_id and application_summary.id ='.$id;
		$list = Yii::app()->db->createCommand( $query )->queryAll();

		// $strXML .= '<category start="01/01/2014" end="04/01/2014" label="Q1 2014" ></category>';
		// $strXML .= '<category start="04/01/2014" end="07/01/2014" label="Q2 2014"  ></category>';
		// $strXML .= '<category start="07/01/2014" end="10/01/2014" label="Q3 2014"  ></category>';
		// $strXML .= '<category start="10/01/2014" end="01/01/2015" label="Q4 2014"  ></category>';
		// $strXML .= '<category start="01/01/2015" end="04/01/2015" label="Q1 2015"  ></category>';
		// $strXML .= '<category start="04/01/2015" end="07/01/2015" label="Q2 2015"  ></category>';
		// $strXML .= '<category start="07/01/2015" end="10/01/2015" label="Q3 2015"  ></category>';
		// $strXML .= '<category start="10/01/2015" end="01/01/2016" label="Q4 2015"  ></category>';

		$processes = array();
		$comments = array();
		$tasks = array();
		$quarters = array( 1 => "Q1 2014",
			2 => "Q2 2014",
			3 => "Q3 2014",
			4 => "Q4 2014",
			5 => "Q1 2015",
			6 => "Q2 2015",
			7 => "Q3 2015",
			8 => "Q4 2015" );
		$startDates = array( 1 =>"01/01/2014",
			2=>"04/01/2014",
			3=>"07/01/2014",
			4=>"10/01/2014",
			5=>"01/01/2015",
			6=>"04/01/2015",
			7=>"07/01/2015",
			8=>"10/01/2015" );
		$endDates = array( 1 =>"04/01/2014",
			2=>"07/01/2014",
			3=>"10/01/2014",
			4=>"01/01/2015",
			5=>"04/01/2015",
			6=>"07/01/2015",
			7=>"10/01/2015",
			8=>"01/01/2016" );

		$strXML = '<chart dateFormat="mm/dd/yyyy" caption="Transformation Journey" subCaption="(Currently OpEX transformation - Right Platform not planned for)" canvasBorderColor="999999" canvasBorderThickness="" gridBorderColor="4567aa" gridBorderAlpha="20" >';
		$strXML .= '<categories bgColor="009999" showHoverBand="0">';
		$strXML .= '<category start="01/01/2014" end="01/01/2016" label="From Jan 2014 to Dec 2015"  fontColor="ffffff" fontSize="16" />';
		$strXML .= '</categories>';
		$strXML .= '<categories  bgColor="ffffff" fontColor="1288dd" fontSize="10" isBold="1" align="center" hoverBandColor="EEEEEE" hoverBandAlpha="20" >';
		$col = 1;

		while ( $col <= 8 ) {
			$strXML .= '<category start="'.$startDates[$col].'" end="'.$endDates[$col].'" label="'.$quarters[$col].'" ></category>';
			$col++;
		};
		$strXML .= '</categories>';
		foreach ( $list as $item ) {
			$processes[]=$item['RELEASE'];
			$comments[] = $item['COMMENT'];
			$sDate = '';
			$eDate = '';
			$col = 1;

			while ( $col <= 8 ) {
				if ( $item[$quarters[$col]]==='Y' ) {
					$sDate = $startDates[$col];
					break;
				}
				$col++;
			};
			$col = 8;
			while ( $col >= 1 ) {
				if ( $item[$quarters[$col]]==='Y' ) {
					$eDate = $endDates[$col];
					break;
				}
				$col--;
			}
			$tasks[]=array( 'cost'=>$item['COST'], 'start'=>$sDate, 'end'=>$eDate );
		}
		//$strProcess = '<processes fontSize="12" isBold="1" align="right">';
		$strProcess = '<processes headerText="Task" fontColor="000000" fontSize="11" isAnimated="1" bgColor="4567aa"  headerVAlign="bottom" headerAlign="left" headerbgColor="4567aa" headerFontColor="ffffff" headerFontSize="16"  align="left" isBold="1" bgAlpha="25" hoverBandColor="869cc8" hoverBandAlpha="25">';
		foreach ( $processes as $process ) {
			$strProcess .= '<process label="'.$process.'" ></process>';
		}
		$strProcess .= '</processes>';
		$strXML .= $strProcess;
		$strDatatable = '<dataTable showProcessName="1" nameAlign="left" fontColor="000000" fontSize="10" vAlign="right" align="center" headerVAlign="bottom" headerAlign="left" headerbgColor="4567aa" headerFontColor="ffffff" headerFontSize="16" >';
		$strDatatable .= '<dataColumn bgColor="eeeeee" headerText="Comments" >';
		foreach ( $comments as $comment ) {
			$strDatatable .= '<text label="'.$comment.'" ></text>';
		}
		$strDatatable .= '</dataColumn>';
		$strDatatable .= '</dataTable>';
		$strXML .= $strDatatable;
		
		$strTask = '<tasks showLabels="1" isBold="1" >';
		foreach ( $tasks as $task ) {
			$strTask .= '<task start="'.$task["start"].'" end="'.$task["end"].'" label="$'.$task["cost"].'" color="4567aa" height="32%" ></task>';
		}
		$strTask .= '</tasks>';
		$strXML .= $strTask;
		$strXML .= '</chart>';
		echo $strXML;

		$query = 'SELECT * FROM execution_fte_info, application_summary WHERE execution_fte_info.nar_id = application_summary.nar_id and application_summary.id ='.$id;
		$list = Yii::app()->db->createCommand( $query )->queryAll();

		$strXML2 = "<chart caption='Execution FTE' showValues='1' >";
		$strXML2 .="<categories>";
		$strXML2 .="<category label='Q1 2014' />";
		$strXML2 .="<category label='Q2 2014' />";
		$strXML2 .="<category label='Q3 2014' />";
		$strXML2 .="<category label='Q4 2014' />";
		$strXML2 .="<category label='Q1 2015' />";
		$strXML2 .="<category label='Q2 2015' />";
		$strXML2 .="<category label='Q3 2015' />";
		$strXML2 .="<category label='Q4 2015' />";
		$strXML2 .="</categories>";

		foreach ( $list as $item ) {
			$strXML2 .= "<dataset seriesName='".$item['FTE_TYPE']."'>";
			$strXML2 .= "<set value='" . $item['Q1_2014'] . "' />";
			$strXML2 .= "<set value='" . $item['Q2_2014'] . "' />";
			$strXML2 .= "<set value='" . $item['Q3_2014'] . "' />";
			$strXML2 .= "<set value='" . $item['Q4_2014'] . "' />";
			$strXML2 .= "<set value='" . $item['Q1_2015'] . "' />";
			$strXML2 .= "<set value='" . $item['Q2_2015'] . "' />";
			$strXML2 .= "<set value='" . $item['Q3_2015'] . "' />";
			$strXML2 .= "<set value='" . $item['Q4_2015'] . "' />";
			$strXML2 .= "</dataset>";
			if ( strpos( $item['FTE_TYPE'], 'Current' ) !== false ) {
				$strXML2 .= "<dataset seriesName='Resource Supply' lineThickness='4' color='993300' showValues='0' parentYAxis='S' >";
				$strXML2 .= "<set value='" . $item['Q1_2014'] . "' />";
				$strXML2 .= "<set value='" . $item['Q2_2014'] . "' />";
				$strXML2 .= "<set value='" . $item['Q3_2014'] . "' />";
				$strXML2 .= "<set value='" . $item['Q4_2014'] . "' />";
				$strXML2 .= "<set value='" . $item['Q1_2015'] . "' />";
				$strXML2 .= "<set value='" . $item['Q2_2015'] . "' />";
				$strXML2 .= "<set value='" . $item['Q3_2015'] . "' />";
				$strXML2 .= "<set value='" . $item['Q4_2015'] . "' />";
				$strXML2 .= "</dataset>";
			}
		}
		$strXML2 .= "</chart>";

		$this->render( 'charts', array( 'strXML'=>$strXML, 'id'=>$id, 'strXML2'=>$strXML2 ) );
		//$this->render( 'charts', array( 'id'=>$id ) );
	}

	// public function actionGantt( $id ) {
	//  $query = 'SELECT * FROM execution_planning, application_summary WHERE execution_planning.nar_id = application_summary.nar_id and application_summary.id ='.$id;
	//  $list = Yii::app()->db->createCommand( $query )->queryAll();
	//  $strXML = '<chart dateFormat="mm/dd/yyyy" caption="Project Gantt" subCaption="From Jan 2014 - Dec 2016" palette="3">';
	//  $strXML .= '<categories>';
	//  $strXML .= '<category start="01/01/2014" end="04/01/2014" label="Q1 2014" ></category>';
	//  $strXML .= '<category start="04/01/2014" end="07/01/2014" label="Q2 2014"  ></category>';
	//  $strXML .= '<category start="07/01/2014" end="10/01/2014" label="Q3 2014"  ></category>';
	//  $strXML .= '<category start="10/01/2014" end="01/01/2015" label="Q4 2014"  ></category>';
	//  $strXML .= '<category start="01/01/2015" end="04/01/2015" label="Q1 2015"  ></category>';
	//  $strXML .= '<category start="04/01/2015" end="07/01/2015" label="Q2 2015"  ></category>';
	//  $strXML .= '<category start="07/01/2015" end="10/01/2015" label="Q3 2015"  ></category>';
	//  $strXML .= '<category start="10/01/2015" end="01/01/2016" label="Q4 2015"  ></category>';
	//  $strXML .= '</categories>';

	//  $processes = array();
	//  $tasks = array();
	//  $quarters = array ( 1 => "Q1 2014",
	//   2 => "Q2 2014",
	//   3 => "Q3 2014",
	//   4 => "Q4 2014",
	//   5 => "Q1 2015",
	//   6 => "Q2 2015",
	//   7 => "Q3 2015",
	//   8 => "Q4 2015" );
	//  $startDates = array( 1 =>"01/01/2014",
	//   2=>"04/01/2014",
	//   3=>"07/01/2014",
	//   4=>"10/01/2014",
	//   5=>"01/01/2015",
	//   6=>"04/01/2015",
	//   7=>"07/01/2015",
	//   8=>"10/01/2015" );
	//  $endDates = array( 1 =>"04/01/2014",
	//   2=>"07/01/2014",
	//   3=>"10/01/2014",
	//   4=>"01/01/2015",
	//   5=>"04/01/2015",
	//   6=>"07/01/2015",
	//   7=>"10/01/2015",
	//   8=>"01/01/2016" );

	//  foreach ( $list as $item ) {
	//   $processes[]=$item['RELEASE'].' - '.$item['COMMENT'];
	//   $sDate = '';
	//   $eDate = '';
	//   $col = 1;

	//   while ( $col <= 8 ) {
	//    //echo 'col = '.$col.'</br>';
	//    if ( $item[$quarters[$col]]==='Y' ) {
	//     $sDate = $startDates[$col];
	//     //echo $quarters[$col].'/'.$item[$quarters[$col]].'/'.$sDate.'</br>';
	//     break;
	//    }
	//    $col++;
	//   };
	//   $col = 8;
	//   while ( $col >= 1 ) {
	//    if ( $item[$quarters[$col]]==='Y' ) {
	//     $eDate = $endDates[$col];
	//     break;
	//    }
	//    $col--;
	//   }
	//   $tasks[]=array( 'cost'=>$item['COST'], 'start'=>$sDate, 'end'=>$eDate );
	//   //echo CJSON::encode($tasks);
	//  }
	//  $strProcess = '<processes fontSize="12" isBold="1" align="right">';
	//  foreach ( $processes as $process ) {
	//   $strProcess .= '<process label="'.$process.'" ></process>';
	//  }
	//  $strProcess .= '</processes>';
	//  $strXML .= $strProcess;
	//  $strTask = '<tasks showLabels="1" isBold="1" >';
	//  foreach ( $tasks as $task ) {
	//   //  //echo '</br>'.CJSON::encode($task).'</br>';
	//   $strTask .= '<task start="'.$task["start"].'" end="'.$task["end"].'" label="$'.$task["cost"].'"></task>';
	//   echo '<task start='.$task["start"].' end='.$task["end"].' label='.$task["cost"].' ></task>';
	//  }
	//  $strTask .= '</tasks>';
	//  //ho "task string = '".$strTask."'".'</br>';
	//  $strXML .= $strTask;
	//  $strXML .= '</chart>';
	//  echo $strXML;

	//  $query = 'SELECT * FROM execution_fte_info, application_summary WHERE execution_fte_info.nar_id = application_summary.nar_id and application_summary.id ='.$id;
	//  $list = Yii::app()->db->createCommand( $query )->queryAll();

	//  $strXML2 = "<chart caption='Execution FTE' showValues='1' >";
	//  $strXML2 .="<categories>";
	//  $strXML2 .="<category label='Q1 2014' />";
	//  $strXML2 .="<category label='Q2 2014' />";
	//  $strXML2 .="<category label='Q3 2014' />";
	//  $strXML2 .="<category label='Q4 2014' />";
	//  $strXML2 .="<category label='Q1 2015' />";
	//  $strXML2 .="<category label='Q2 2015' />";
	//  $strXML2 .="<category label='Q3 2015' />";
	//  $strXML2 .="<category label='Q4 2015' />";
	//  $strXML2 .="</categories>";

	//  foreach ( $list as $item ) {
	//   $strXML2 .= "<dataset seriesName='".$item['FTE_TYPE']."'>";
	//   $strXML2 .= "<set value='" . $item['Q1_2014'] . "' />";
	//   $strXML2 .= "<set value='" . $item['Q2_2014'] . "' />";
	//   $strXML2 .= "<set value='" . $item['Q3_2014'] . "' />";
	//   $strXML2 .= "<set value='" . $item['Q4_2014'] . "' />";
	//   $strXML2 .= "<set value='" . $item['Q1_2015'] . "' />";
	//   $strXML2 .= "<set value='" . $item['Q2_2015'] . "' />";
	//   $strXML2 .= "<set value='" . $item['Q3_2015'] . "' />";
	//   $strXML2 .= "<set value='" . $item['Q4_2015'] . "' />";
	//   $strXML2 .= "</dataset>";
	//   if ( strpos( $item['FTE_TYPE'], 'Current' ) !== false ) {
	//    $strXML2 .= "<dataset seriesName='Resource Supply' lineThickness='4' color='993300' showValues='0' parentYAxis='S' >";
	//    $strXML2 .= "<set value='" . $item['Q1_2014'] . "' />";
	//    $strXML2 .= "<set value='" . $item['Q2_2014'] . "' />";
	//    $strXML2 .= "<set value='" . $item['Q3_2014'] . "' />";
	//    $strXML2 .= "<set value='" . $item['Q4_2014'] . "' />";
	//    $strXML2 .= "<set value='" . $item['Q1_2015'] . "' />";
	//    $strXML2 .= "<set value='" . $item['Q2_2015'] . "' />";
	//    $strXML2 .= "<set value='" . $item['Q3_2015'] . "' />";
	//    $strXML2 .= "<set value='" . $item['Q4_2015'] . "' />";
	//    $strXML2 .= "</dataset>";
	//   }
	//  }
	//  $strXML2 .= "</chart>";

	//  $this->render( 'gantt', array( 'strXML'=>$strXML, 'id'=>$id, 'strXML2'=>$strXML2 ) );
	// }

	// public function actionTest( $id ) {
	//  $query = 'SELECT * FROM execution_fte_info, application_summary WHERE execution_fte_info.nar_id = application_summary.nar_id and application_summary.id ='.$id;
	//  $list = Yii::app()->db->createCommand( $query )->queryAll();

	//  $strXML = "<chart caption='Execution FTE' showValues='1' >";
	//  $strXML .="<categories>";
	//  $strXML .="<category label='Q1 2014' />";
	//  $strXML .="<category label='Q2 2014' />";
	//  $strXML .="<category label='Q3 2014' />";
	//  $strXML .="<category label='Q4 2014' />";
	//  $strXML .="<category label='Q1 2015' />";
	//  $strXML .="<category label='Q2 2015' />";
	//  $strXML .="<category label='Q3 2015' />";
	//  $strXML .="<category label='Q4 2015' />";
	//  $strXML .="</categories>";

	//  foreach ( $list as $item ) {
	//   $strXML .= "<dataset seriesName='".$item['FTE_TYPE']."'>";
	//   $strXML .= "<set value='" . $item['Q1_2014'] . "' />";
	//   $strXML .= "<set value='" . $item['Q2_2014'] . "' />";
	//   $strXML .= "<set value='" . $item['Q3_2014'] . "' />";
	//   $strXML .= "<set value='" . $item['Q4_2014'] . "' />";
	//   $strXML .= "<set value='" . $item['Q1_2015'] . "' />";
	//   $strXML .= "<set value='" . $item['Q2_2015'] . "' />";
	//   $strXML .= "<set value='" . $item['Q3_2015'] . "' />";
	//   $strXML .= "<set value='" . $item['Q4_2015'] . "' />";
	//   $strXML .= "</dataset>";
	//  }
	//  $strXML .= "</chart>";
	//  echo $strXML;
	//  Yii::app()->fusioncharts->useI18N = true;
	//  Yii::app()->fusioncharts->getXMLData( false, $strXML );
	// }

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError() {
		if ( $error=Yii::app()->errorHandler->error ) {
			if ( Yii::app()->request->isAjaxRequest )
				echo $error['message'];
			else
				$this->render( 'error', $error );
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact() {
		$model=new ContactForm;
		if ( isset( $_POST['ContactForm'] ) ) {
			$model->attributes=$_POST['ContactForm'];
			if ( $model->validate() ) {
				$name='=?UTF-8?B?'.base64_encode( $model->name ).'?=';
				$subject='=?UTF-8?B?'.base64_encode( $model->subject ).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail( Yii::app()->params['adminEmail'], $subject, $model->body, $headers );
				Yii::app()->user->setFlash( 'contact', 'Thank you for contacting us. We will respond to you as soon as possible.' );
				$this->refresh();
			}
		}
		$this->render( 'contact', array( 'model'=>$model ) );
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin() {
		$model=new LoginForm;

		// if it is ajax validation request
		if ( isset( $_POST['ajax'] ) && $_POST['ajax']==='login-form' ) {
			echo CActiveForm::validate( $model );
			Yii::app()->end();
		}

		// collect user input data
		if ( isset( $_POST['LoginForm'] ) ) {
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if ( $model->validate() && $model->login() )
				$this->redirect( Yii::app()->user->returnUrl );
		}
		// display the login form
		$this->render( 'login', array( 'model'=>$model ) );
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout() {
		Yii::app()->user->logout();
		$this->redirect( Yii::app()->homeUrl );
	}

	public function actionDatacapture() {
		$model= new SearchAppForm;
		if ( isset( $_POST['SearchAppForm'] ) ) {
			$model->attributes=$_POST['SearchAppForm'];
			// validate user input and redirect to the previous page if valid
			if ( $model->validate() ) {

			}
			//$this->redirect( Yii::app()->user->returnUrl );
		}
		$this->render( 'datacapture', array( 'model'=>$model ) );
	}
}
