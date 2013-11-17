<?php
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language ?>" lang="<?php print $language->language ?>" dir="<?php print $language->dir ?>">
	<head>
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE9" ></meta>
		<?php print $head ?>
		<title><?php print $head_title ?></title>
		<!--[if lt IE 9]>
			<script type="text/javascript" src="<?php print base_path( )?><?php print path_to_theme() ?>/js/html5.js"></script>
		<![endif]-->
		<?php print $styles ?>
		<?php print $scripts ?>
	</head>
	<body <?php print phptemplate_body_class($left, $right); ?> class="<?php print $body_classes; ?> page-node-id-<?php print $node->nid; ?>">
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
			<div class="banner-wrap">
				<div id="banner"></div>
			</div>
			<div class="content-wrap">
				<div class="content container-box">
					<?php if (arg(0) == 'produtos') {
						$node = node_load(arg(1));
						if (isset($node->field_logomarca['0']['filepath'])) {
					?>
					<div class="title">
						<div class="beforeTitle"></div>
						<img src="<?php print url($node->field_logomarca['0']['filepath']); ?>"></img>
						<div class="afterTitle"></div>
					</div>
					<?php } else { ?>
						<div class="title">
							<div class="beforeTitle"></div>
							<h2><?php print $title; ?></h2>
							<div class="afterTitle specialAfterTitle"></div>
						</div>
					<?php } } ?>
			
					<?php if ($sidebar_left): ?>
						<div id="sidebar-left" class="sidebar">
							<?php print $sidebar_left; ?>
						</div>
					<?php endif; ?>
					
					<?php if ($tabs): ?>
					  <div id="tabs-wrapper">
						  <?php if ($tabs): ?><ul class="tabs primary"><?php print $tabs; ?></ul><?php endif; ?>
						  <?php if ($tabs2): ?><ul class="tabs secondary"><?php print $tabs2; ?></ul><?php endif; ?>
					  </div>
					<?php endif; ?>
					
					<div id="center">					  
						<?php if ($title && arg(0) != 'produtos'): ?>
							<div class="beforeTitle"></div>
								<h2><?php print $title; ?></h2>
							<div class="afterTitle"></div>
						<?php endif; ?>
						<?php if ($show_messages && $messages): print $messages; endif; ?>
						<?php if (!empty($help)): print $help; endif; ?>
						<div id="content-content" class="clear-block">
							<?php print $content; ?>
						</div>
						<?php print $feed_icons; ?>
					</div>
				</div>
			</div>
			<div class="footer-wrap">
				<footer class="footer">
					<div class="footer-box footer-left">
						<div id="logo">
							<a href="<?php print check_url($front_page);?>" title="<?php print $site_title; ?>">
								<img src="<?php print check_url($logo); ?>" alt="<?php print $site_title;?>" />
							</a>
						</div>
						<?php print $footer_left; ?>
					</div>
					<div class="footer-box footer-center">
						<?php print $footer_center; ?>        
					</div>
					<div class="footer-box footer-right remove-margin">
						<?php print $footer_right; ?>
					</div>
					<div class="footer-bottom">
						<div class="copyright">
							Chyc.me <?php print date('Y'); ?>. Todos os direitos reservados.
						</div>
					</div>
				</footer>
			</div>
		</div>
		<div class="overlay" id="overlay" style="display:none;"></div>
		<?php print $closure ?>
	</body>
</html>