<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title>Alchemist</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<meta content="" name="description"/>
<meta content="alchemist" name="author"/>
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css">
<?php echo HTML::style('themes/alchemist/assets/plugins/font-awesome/css/font-awesome.min.css');?>
<?php echo HTML::style('themes/alchemist/assets/plugins/simple-line-icons/simple-line-icons.min.css');?>
<?php echo HTML::style('themes/alchemist/assets/plugins/bootstrap/css/bootstrap.min.css');?>
<?php echo HTML::style('themes/alchemist/assets/plugins/uniform/css/uniform.default.css');?>
<?php echo HTML::style('themes/alchemist/assets/css/components-md.css');?>
<?php echo HTML::style('themes/alchemist/assets/css/plugins-md.css');?>
<?php echo HTML::style('themes/alchemist/assets/css/layout.css');?>
<?php echo HTML::style('themes/alchemist/assets/css/default.css');?>
<?php echo HTML::style('themes/alchemist/assets/css/custom.css');?>
</head>

<body class="page-md">

<?php echo Theme::partial('header'); ?>
<?php echo Theme::content(); ?>
<?php echo Theme::partial('footer'); ?>

<div class="scroll-to-top">
	<i class="icon-arrow-up"></i>
</div>
<!--[if lt IE 9]>
<?php echo HTML::script('themes/alchemist/assets/plugins/respond.min.js');?>
<?php echo HTML::script('themes/alchemist/assets/plugins/excanvas.min.js');?>
<![endif]-->
<?php echo HTML::script('themes/alchemist/assets/plugins/jquery.min.js');?>
<?php echo HTML::script('themes/alchemist/assets/plugins/jquery-migrate.min.js');?>
<?php echo HTML::script('themes/alchemist/assets/plugins/jquery-ui/jquery-ui.min.js');?>
<?php echo HTML::script('themes/alchemist/assets/plugins/bootstrap/js/bootstrap.min.js');?>
<?php echo HTML::script('themes/alchemist/assets/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js');?>
<?php echo HTML::script('themes/alchemist/assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js');?>
<?php echo HTML::script('themes/alchemist/assets/plugins/jquery.blockui.min.js');?>
<?php echo HTML::script('themes/alchemist/assets/plugins/jquery.cokie.min.js');?>
<?php echo HTML::script('themes/alchemist/assets/plugins/uniform/jquery.uniform.min.js');?>
<!-- END CORE PLUGINS -->
<?php echo HTML::script('themes/alchemist/assets/scripts/metronic.js');?>
<?php echo HTML::script('themes/alchemist/assets/scripts/layout.js');?>
<?php echo HTML::script('themes/alchemist/assets/scripts/demo.js');?>
<script>
    jQuery(document).ready(function() {
         Metronic.init(); // init metronic core components
         Layout.init(); // init current layout
         Demo.init(); // init demo features
      });
</script>
</body>
</html>
