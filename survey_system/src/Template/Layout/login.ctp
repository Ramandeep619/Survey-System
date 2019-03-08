<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0" name="viewport">
	<?php echo $this->Html->charset(); ?>
        <title>
		<?php echo 'Survey System';  ?> |
		<?php echo $this->fetch('title'); ?>
        </title>
	<?php
            echo $this->Html->meta('icon');

            echo $this->Html->css(array('font', 'font-awesome.min', 'bootstrap.min', 'uniform.default', 'login3', 'components', 'plugins', 'layout',
                'default', 'custom'));

            echo $this->fetch('meta');
            echo $this->fetch('css');
	?>
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="login">

<div class="logo">

</div>
<!-- END LOGO -->
<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
<div class="menu-toggler sidebar-toggler">
</div>
<!-- END SIDEBAR TOGGLER BUTTON -->
<!-- BEGIN LOGIN -->
<div class="content">
	<!-- BEGIN LOGIN FORM -->

	 <?php echo $this->fetch('content');?>

</div>
<?php
echo $this->Html->script(array('jquery.min', 'bootstrap.min', 'jquery.blockui.min', 'jquery.uniform', 'jquery.validate.min',
    'metronic', 'layout', 'login'));
echo $this->fetch('script');
?>
<script>
jQuery(document).ready(function() {
  Metronic.init(); // init metronic core components
  Layout.init(); // init current layout
  Login.init();

});
</script>
    </body>
</html>
