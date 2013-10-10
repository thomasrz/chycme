﻿<?php
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language ?>" lang="<?php print $language->language ?>" dir="<?php print $language->dir ?>">
	<head>
		<?php print $head ?>
		<title><?php print $head_title ?></title>
		<?php print $styles ?>
		<?php print $scripts ?>
	</head>
	<body <?php print phptemplate_body_class($left, $right); ?> class="<?php print $body_classes; ?>">
		<div class="container-wrap">
			<div class="header-wrap">
				<header class="header container-box" class="outerbox clearfix">
					<div class="logo" class="clearfix"> 
						<a href="<?php print check_url($front_page);?>" title="<?php print $site_title; ?>">
						  <img src="<?php print check_url($logo); ?>" alt="<?php print $site_title;?>" />
						</a>
					</div>
					<?php print $header; ?>
				</header>
			</div>
			<div class="content-wrap">
				<div class="content container-box">
					<?php if (arg(0) == 'produtos') {
						$node = node_load(arg(1));
						if (isset($node->field_logomarca['0']['filepath'])) {
					?>
					<div class="title">
						<img src="<?php print url($node->field_logomarca['0']['filepath']); ?>"></img>
					</div>
					<?php } else { ?>
						<div class="title">
							<h1><?php print $title; ?></h1>
						</div>
					<?php } } ?>
			
					<?php if ($sidebar_left): ?>
						<div id="sidebar-left" class="sidebar">
							<?php print $sidebar_left; ?>
						</div>
					<?php endif; ?>

					<div id="center">
						<?php print $breadcrumb; ?>
						<?php if ($mission): print '<div id="mission">'. $mission .'</div>'; endif; ?>
						<?php if ($tabs): print '<div id="tabs-wrapper" class="clear-block">'; endif; ?>
						<?php if ($title && arg(0) != 'produtos'): print '<h2'. ($tabs ? ' class="with-tabs"' : '') .'>'. $title .'</h2>'; endif; ?>
						<?php if ($tabs): print '<ul class="tabs primary">'. $tabs .'</ul></div>'; endif; ?>
						<?php if ($tabs2): print '<ul class="tabs secondary">'. $tabs2 .'</ul>'; endif; ?>
						<?php if ($show_messages && $messages): print $messages; endif; ?>
						<?php print $help; ?>
						<div class="clear-block">
							<?php print $content ?>
						</div>
						<?php print $feed_icons ?>
						<div id="footer">
							<?php print $footer_message . $footer ?>
						</div>
					</div>
				</div>
			</div>
			<footer id="footer-wrap">
				<div class="footer container-box">
					<div class="footer-box footer-left">
						<div id="logo" class="clearfix">
							<a href="<?php print check_url($front_page);?>" title="<?php print $site_title; ?>">
								<img src="<?php print check_url($logo); ?>" alt="<?php print $site_title;?>" />
							</a>
						</div>
						<div class="footer-widget widget_nav_menu clearfix">
							<?php print $footer_left; ?>
							<ul id="header-social">
								<li><a href="https://www.facebook.com/camilla.chycme?fref=ts" title="facebook" target="_blank" class="wpex-tooltip"><img src="<?php print url('sites/all/themes/chycme/images/facebook.png');?>" alt="facebook" /></a></li>
								<li><a href="http://instagram.com/chycme" title="support" target="_blank" class="wpex-tooltip"><img src="<?php print url('sites/all/themes/chycme/images/support.png'); ?>" alt="support" /></a></li>
							</ul>
						</div>
					</div>
					<div class="footer-box footer-center">
						<div class="footer-widget widget_text clearfix">
						  <?php print $footer_center; ?>
						</div>            
					</div>
					<div class="footer-box footer-right remove-margin">
						<div class="footer-widget widget_text clearfix">
							<?php print $footer_right; ?>
						</div>
					</div>
					<div id="footer-bottom">
						<div class="outerbox clearfix">
							<div id="copyright">
								Chyc.me <?php print date('Y'); ?>. Todos os direitos reservados.
							</div>
						</div>
					</div>
				</div>
			</footer>
		</div>
		<div class="overlay" id="overlay" style="display:none;"></div>
		<?php print $closure ?>
	</body>
</html>