<?php
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
  
	<div id="header-wrap">
		<header id="header">
			<div id="header-top">
				<div id="logo">
					<?php
					  // Prepare header
					  $site_fields = array();
					  if ($site_name) {
						$site_fields[] = check_plain($site_name);
					  }
					  if ($site_slogan) {
						$site_fields[] = check_plain($site_slogan);
					  }
					  $site_title = implode(' ', $site_fields);
					  if ($site_fields) {
						$site_fields[0] = '<span>'. $site_fields[0] .'</span>';
					  }
					  $site_html = implode(' ', $site_fields);
					?>  
					<a href="<?php print check_url($front_page);?>" title="<?php print $site_title; ?>">
					  <img src="<?php print check_url($logo); ?>" alt="<?php print $site_title;?>" />
					</a>
				</div>
				<div id="header-region" class="clear-block"><?php print $header; ?></div>
			</div>
		</header>
	</div>
	
	<div id="wrapper">
		<div id="container">
			<div class="featured">
				<?php print $breadcrumb; ?>
				<?php if ($mission): print '<div id="mission">'. $mission .'</div>'; endif; ?>
				<?php if ($tabs): print '<div id="tabs-wrapper" class="clear-block">'; endif; ?>
				<?php if ($title): print '<h2'. ($tabs ? ' class="with-tabs"' : '') .'>'. $title .'</h2>'; endif; ?>
				<?php if ($tabs): print '<ul class="tabs primary">'. $tabs .'</ul></div>'; endif; ?>
				<?php if ($tabs2): print '<ul class="tabs secondary">'. $tabs2 .'</ul>'; endif; ?>
				<?php if ($show_messages && $messages): print $messages; endif; ?>
				<?php print $help; ?>
				<?php print $feed_icons ?>
				<div id="footer">
				  <?php print $footer_message . $footer ?>
				</div>
			</div>
			<div id="wrap">
			  <div id="main-content">
				<div class="wrap-slider">
					<div id="slider">
					  <ul>
					  <?php foreach ($node->field_banners as $banner) { 
						if (isset($banner['view']) && $banner['view']) {
					  ?>
						<li><?php print $banner['view']; ?></li>
					  <?php } 
					  } ?>
					  </ul>
					</div>
				</div>
				<div class='home-content'>
				  <?php print $content_home; ?>
				</div>
				<div class='bt-todos-produtos'><a href='<?php print url('produtos/4');?>'><img src="<?php print url('sites/all/themes/chycme/bt_produtos.png');?>"></img></a></div>
			  </div>
			  <div class="clearBoth"></div>
			</div>
		</div>
		<div class="clearBoth"></div>
    </div>

    <div id="footer-wrap">
		<footer id="footer">  
			<div id="footer-widgets">
				<div class="footer-box footer-left">
					<div class="logoFooter">
						<div id="logo">
							<a href="<?php print check_url($front_page);?>" title="<?php print $site_title; ?>">
								<img src="<?php print check_url($logo); ?>" alt="<?php print $site_title;?>" />
							</a>
						</div>
					</div>
					<div class="footer-widget widget_nav_menu">
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
			</div>
		</footer>
		<div id="footer-bottom">
			<div class="outerbox clearfix">
				<div id="copyright">
					Chyc.me <?php print date('Y'); ?>. Todos os direitos reservados.
				</div>
			</div>
		</div>
    </div>
	
	<?php print $closure ?>
  </body>
</html>
