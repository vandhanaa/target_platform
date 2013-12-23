<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="language" content="en" />

	    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/styles.css" />

		<title><?php echo CHtml::encode( $this->pageTitle ); ?></title>

		<?php Yii::app()->bootstrap->register(); ?>
	</head>

	<body>

	<?php $this->widget( 'bootstrap.widgets.TbNavbar', array(
			'type'=>'inverse',
			'brand'=>CHtml::encode( Yii::app()->name ),
			'brandUrl'=>array( '/site/index' ),
			'fixed' => 'top',
			'collapse'=>true,
			'items'=>array(
				array(
					'class'=>'bootstrap.widgets.TbMenu',
					'htmlOptions'=>array( 'class'=>'pull-right' ),
					'items'=>array(
						array( 'label'=>'Home', 'icon'=>'home', 'url'=>array( '/site/index' ) ),
						array( 'label'=>'About', 'icon'=>'comment', 'url'=>array( '/site/page', 'view'=>'about' ) ),
						array( 'label'=>'Sitemap', 'icon'=>'road', 'url'=>array( '/site/page', 'view'=>'sitemap' ) ),
						array( 'label'=>'FAQ', 'icon'=>'tasks', 'url'=>array( '/site/page', 'view'=>'faq' ) ),
						array( 'label'=>'Contact', 'icon'=>'user', 'url'=>array( '/site/contact' ) ),
						array( 'label'=>'Help', 'icon'=>'question-sign', 'url'=>array( '/site/page', 'view'=>'help' ) ),
						array( 'label'=>'Login', 'icon'=>'cog', 'url'=>array( '/site/login' ), 'visible'=>Yii::app()->user->isGuest ),
						array( 'label'=>'Logout ('.Yii::app()->user->name.')', 'icon'=>'cog', 'url'=>array( '/site/logout' ), 'visible'=>!Yii::app()->user->isGuest )
					),
				),
			),
		) ); ?>
	<div class="wrap">
	<div class="container clear-top" id="page">

		<?php if ( isset( $this->breadcrumbs ) ):?>
			<?php $this->widget( 'bootstrap.widgets.TbBreadcrumbs', array(
				'links'=>$this->breadcrumbs,
			) ); ?><!-- breadcrumbs -->
		<?php endif?>

		<?php echo $content; ?>

		<div class="clear"></div>
	<!--
		<div id="footer"> -->


	<!--	</div> footer -->

	</div><!-- page -->
	</div>

	</body>
	<footer class="footer pull-right" style="background-color:#c2c2c2">
		Copyright &copy; <?php echo date( 'Y' ); ?> Deutsche Bank AG, Frankfurt am Main.
	</footer>
</html>
