<?php
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language ?>" lang="<?php print $language->language ?>" dir="<?php print $language->dir ?>">
  <head>
    <?php print $head ?>
    <title><?php print $head_title ?></title>
    <?php print $styles ?>
	<link rel='stylesheet' id='wpex-droid-serif-css'  href='http://fonts.googleapis.com/css?family=Droid+Serif%3A400%2C400italic&#038;ver=1' type='text/css' media='all' />
    <link rel='stylesheet' id='wpex-open-sans-css'  href='http://fonts.googleapis.com/css?family=Open+Sans%3A400italic%2C600italic%2C700italic%2C400%2C300%2C600%2C700&#038;subset=latin%2Ccyrillic-ext%2Ccyrillic%2Cgreek-ext%2Cgreek%2Cvietnamese%2Clatin-ext&#038;ver=1' type='text/css' media='all' />
    <?php print $scripts ?>
    <!--[if lt IE 7]>
      <?php print phptemplate_get_ie_styles(); ?>
    <![endif]-->
  </head>
  <body <?php print phptemplate_body_class($left, $right); ?>>
<!-- Layout -->
	<div id="header-wrap" class="outerbox" >
		<header id="header" class="outerbox clearfix">
			<div id="header-top" class="outerbox">
			  <div id="logo" class="clearfix">
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
      <div id="container" class="outerbox clear-block">
        <div id="div-header">
          <?php if (isset($primary_links)) : ?>
            <?php print theme('links', $primary_links, array('class' => 'links primary-links')) ?>
          <?php endif; ?>
          <?php if (isset($secondary_links)) : ?>
            <?php print theme('links', $secondary_links, array('class' => 'links secondary-links')) ?>
          <?php endif; ?>
        </div> <!-- /header -->
        <?php if ($left): ?>
          <div id="sidebar-left" class="sidebar">
            <?php if ($search_box): ?><div class="block block-theme"><?php print $search_box ?></div><?php endif; ?>
            <?php print $left ?>
          </div>
        <?php endif; ?>
        <div id="center">
	      <div id="squeeze">
	  	    <div class="right-corner">
			  <div class="left-corner">
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
	        </div>
	      </div> 
	    </div> <!-- /.left-corner, /.right-corner, /#squeeze, /#center -->
      <?php if ($right): ?>
        <div id="sidebar-right" class="sidebar">
          <?php if (!$left && $search_box): ?><div class="block block-theme"><?php print $search_box ?></div><?php endif; ?>
          <?php print $right ?>
        </div>
      <?php endif; ?>
        <div id="wrap">
		  <div id="main-content" class="outerbox clearfix fitvids">
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
			<div class='home-content'>
			  <?php print $content_home; ?>
			</div>
			<div class='bt-todos-produtos'><a href='<?php print url('produtos/4');?>'><img src="<?php print url('sites/all/themes/chycme/bt_produtos.png');?>"></img></a></div>
		  </div>
		</div>
      </div> <!-- /container -->
    </div> <!-- /wrapper -->
<!-- /layout -->
    <div id="footer-wrap" >
		<footer id="footer" class="outerbox">  
			<div id="footer-widgets" class="outerbox">
				<div class="footer-box footer-left">
				   <div class="logoFooter">
					 <div id="logo" class="clearfix">
					  <a href="<?php print check_url($front_page);?>" title="<?php print $site_title; ?>">
						<img src="<?php print check_url($logo); ?>" alt="<?php print $site_title;?>" />
					  </a>
					 </div><!-- /logo -->
					</div>
					<div class="footer-widget widget_nav_menu clearfix">
					  <?php print $footer_left; ?>
					  <ul id="header-social">
						<li><a href="https://www.facebook.com/camilla.chycme?fref=ts" title="facebook" target="_blank" class="wpex-tooltip"><img src="<?php print url('sites/all/themes/chycme/images/facebook.png');?>" alt="facebook" /></a></li>
						<li><a href="http://instagram.com/chycme" title="support" target="_blank" class="wpex-tooltip"><img src="<?php print url('sites/all/themes/chycme/images/support.png'); ?>" alt="support" /></a></li>
					  </ul><!-- /header-social -->
					</div>
				</div> 
				<!-- /footer-one -->
				<div class="footer-box footer-center">
					<div class="footer-widget widget_text clearfix">
					  <?php print $footer_center; ?>
					</div>            
				</div>
				<!-- /footer-two -->
			   <div class="footer-box footer-right remove-margin">
				 <div class="footer-widget widget_text clearfix">
					  <?php print $footer_right; ?>
				 </div>
			   </div>
			   <!-- /footer-three -->
			</div>
			<!-- /footer-widgets -->
		</footer>
      <!-- /footer -->
      <div id="footer-bottom">
    	<div class="outerbox clearfix">
            <div id="copyright">
                Chyc.me <?php print date('Y'); ?>. Todos os direitos reservados.
            </div><!-- /copyright -->
        </div><!-- /outerbox -->
	  </div><!-- /footer-bottom -->        
    </div><!-- /footer-wrap -->
  <?php print $closure ?>
  </body>
</html>
