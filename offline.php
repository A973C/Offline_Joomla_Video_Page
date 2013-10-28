<?php
/**
 * @Author     	A973C
 * @Website  	http://a973c.com
 * @Twitter  	https://twitter.com/a973c.com
 *
 * @Install		See README file for install instructions
 *
 * @copyright   Copyright (C) 2011 - 2013 A973C. All rights reserved.
 * @license     GNU General Public License version 2 or later - see LICENSE.txt
 */

defined( '_JEXEC' ) or die;

// variables
$app = JFactory::getApplication();
$doc = JFactory::getDocument(); 
$tpath = $this->baseurl.'/templates/'.$this->template;

$this->setGenerator(null);

// load sheets and scripts
$doc->addStyleSheet('//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.no-icons.min.css');
$doc->addStyleSheet('//netdna.bootstrapcdn.com/font-awesome/4.0.0/css/font-awesome.min.css');
$doc->addStyleSheet('http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700');
$doc->addStyleSheet($tpath.'/offline/scripts/offline.css'); 
//$doc->addScript($tpath.'/js/modernizr-2.6.2.js');

?><!doctype html>
<!--[if IEMobile]><html class="iemobile" lang="<?php echo $this->language; ?>"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="<?php echo $this->language; ?>"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="<?php echo $this->language; ?>"> <![endif]-->
<!--[if gt IE 8]><!-->  <html class="no-js" lang="<?php echo $this->language; ?>"> <!--<![endif]-->

<head>
	<jdoc:include type="head" />
	<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" /> <!-- mobile viewport optimized -->
	<link rel="apple-touch-icon-precomposed" href="<?php echo $tpath; ?>/images/apple-touch-icon-57x57-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo $tpath; ?>/images/apple-touch-icon-72x72-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo $tpath; ?>/images/apple-touch-icon-114x114-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo $tpath; ?>/images/apple-touch-icon-144x144-precomposed.png">

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="<?php echo $tpath; ?>/offline/scripts/jquery.tubular.1.0.js"></script>
	<script src="<?php echo $tpath; ?>/offline/scripts/jquery.countdown.js"></script>
	<script src="<?php echo $tpath; ?>/offline/scripts/main.js"></script>
</head>

<body>
    <div class="container">
		<?php if ($app->getCfg('offline_image')) : ?>
		  <img src="<?php echo $app->getCfg('offline_image'); ?>" alt="<?php echo $app->getCfg('sitename'); ?>" />
		<?php endif; ?>
		<h1> <?php echo htmlspecialchars($app->getCfg('sitename')); ?> </h1>
		
		<div id="countdown"></div>
		<jdoc:include type="message" />
		<div class="row">
			
			<div id="box-left" class="col-lg-6">
				<?php if ($app->getCfg('display_offline_message', 1) == 1 && str_replace(' ', '', $app->getCfg('offline_message')) != ''): ?>
					<p><?php echo $app->getCfg('offline_message'); ?></p>
				<?php elseif ($app->getCfg('display_offline_message', 1) == 2 && str_replace(' ', '', JText::_('JOFFLINE_MESSAGE')) != ''): ?>
					<p><?php echo JText::_('JOFFLINE_MESSAGE'); ?></p>
				<?php endif; ?>
			</div>
			
			<div id="box-right" class="col-lg-6">
				<form action="<?php echo JRoute::_('index.php', true); ?>" method="post" name="login" id="form-login">
				  <fieldset class="input">
					<p id="form-login-username">
					  <label for="username"><?php echo JText::_('JGLOBAL_USERNAME'); ?></label><br />
					  <input type="text" name="username" id="username" class="inputbox form-control" alt="<?php echo JText::_('JGLOBAL_USERNAME'); ?>" size="18" placeholder="<?php echo JText::_('JGLOBAL_USERNAME'); ?>"/>
					</p>
					<p id="form-login-password">
					  <label for="passwd"><?php echo JText::_('JGLOBAL_PASSWORD'); ?></label><br />
					  <input type="password" name="password" id="password" class="inputbox form-control" alt="<?php echo JText::_('JGLOBAL_PASSWORD'); ?>" size="18" placeholder="<?php echo JText::_('JGLOBAL_PASSWORD'); ?>" />
					</p>
					<p id="form-login-remember">
					  <label for="remember"><?php echo JText::_('JGLOBAL_REMEMBER_ME'); ?></label>
					  <input type="checkbox" name="remember" value="yes" alt="<?php echo JText::_('JGLOBAL_REMEMBER_ME'); ?>" id="remember" />
					</p>
					<p id="form-login-submit">
					  <label>&nbsp;</label>
					  <input type="submit" name="Submit" class="btn" value="<?php echo JText::_('JLOGIN'); ?>" />
					</p>
				  </fieldset>
				  <input type="hidden" name="option" value="com_users" />
				  <input type="hidden" name="task" value="user.login" />
				  <input type="hidden" name="return" value="<?php echo base64_encode(JURI::base()); ?>" />
				  <?php echo JHTML::_( 'form.token' ); ?>
				</form>
			</div>
		</div>
		<div id="social-links">
			<span class="social"><a href="https://twitter.com/A973C" target="_blank"><i class="fa fa-twitter" alt="Twitter"></i></a></span>
			<span class="social"><a href="https://github.com/A973C" target="_blank"><i class="fa fa-github" alt="Github"></i></a></span>
			<span class="social"><a href="javascript:void(0);"><i class="fa fa-google-plus" alt="Google Plus"></i></a></span>
			<span class="social"><a href="javascript:void(0);"><i class="fa fa-facebook" alt="Facebook"></i></a></span>
		</div>
	</div>

	<footer>
		<p>Made with <i class="fa fa-heart"></i> by <strong><a href="http://a973c.com">A973C</a></strong></p>
	</footer>

	<script>
	jQuery(document).ready(function() {

	});
	</script>

  
</body>

</html>