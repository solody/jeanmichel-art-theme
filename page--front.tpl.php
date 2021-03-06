<?php

/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.tpl.php template in this directory.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see template_process()
 * @see html.tpl.php
 *
 * @ingroup themeable
 */
?>
<script type="text/javascript">
	jQuery(function($){
		
		$(".expanded > a").bind("click",function(){
			return false;
		});
		
		$(".expanded").bind("mouseover",function(){
			$(this).children("ul").css("display","block");
		});
		
		$(".expanded").bind("mouseout",function(){
			$(this).children("ul").css("display","none");
		});

	});
</script>
<?php
if ( !empty($node) && $node->type == "exhibition")
{
?>
<!-- First, add jQuery (and jQuery UI if using custom easing or animation -->
<script type="text/javascript" src="<?php print $base_path.$directory?>/jackwanders-GalleryView/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php print $base_path.$directory?>/jackwanders-GalleryView/js/jquery-ui.min.js"></script>

<!-- Second, add the Timer and Easing plugins -->
<script type="text/javascript" src="<?php print $base_path.$directory?>/jackwanders-GalleryView/js/jquery.timers-1.2.js"></script>
<script type="text/javascript" src="<?php print $base_path.$directory?>/jackwanders-GalleryView/js/jquery.easing.1.3.js"></script>

<!-- Third, add the GalleryView Javascript and CSS files -->
<script type="text/javascript" src="<?php print $base_path.$directory?>/jackwanders-GalleryView/js/jquery.galleryview-3.0-dev.js"></script>
<link type="text/css" rel="stylesheet" href="<?php print $base_path.$directory?>/jackwanders-GalleryView/css/jquery.galleryview-3.0-dev.css" />
<!-- Lastly, call the galleryView() function on your unordered list(s) -->
<script type="text/javascript">
	$(function(){
		
		var htmldata = "";
		$('.field-name-field-exhibition-photos').find("img").each(function(index, element) {
            htmldata = htmldata+"<li><img src='"+$(element).attr("src")+"' /></li>";
        });;
		
		//alert(htmldata);
		$('#myGallery').append(htmldata);
		
		
		$('#myGallery').galleryView({
     panel_width: 885,
     panel_height: 500,
     filmstrip_position: 'right',
     frame_width: 135,
     frame_height: 70,
     show_infobar: false,
		});
	});
</script>
<?php	
}
?>

<link rel="stylesheet" href="<?php print $base_path.$directory?>/flickity/flickity.min.css">
<script src="<?php print $base_path.$directory?>/flickity/flickity.pkgd.min.js"></script>
<style type="text/css">
/* position dots in gallery */
.flickity-page-dots {
  bottom: 10px;
}
/* white circles */
.flickity-page-dots .dot {
  width: 8px;
  height: 8px;
  opacity: 1;
  background: transparent;
  border: 2px solid white;
}
/* fill-in selected dot */
.flickity-page-dots .dot.is-selected {
  background: white;
}
</style>
<div class="jeanmichel_art-page_wrapper">

    <div class="jeanmichel_art-header_bar">
      <?php if ($site_name || $site_slogan): ?>
        <div id="name-and-slogan">
          <?php if ($site_name): ?>
            <?php if ($title): ?>
              <div id="site-name"><strong>
                <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a>
              </strong></div>
            <?php else: /* Use h1 when the content title is empty */ ?>
              <h1 id="site-name">
                <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a>
              </h1>
            <?php endif; ?>
          <?php endif; ?>

          <?php if ($site_slogan): ?>
            <div id="site-slogan"><?php print $site_slogan; ?></div>
          <?php endif; ?>
        </div> <!-- /#name-and-slogan -->
      <?php endif; ?>
      <?php print render($page['header_bar']); ?>
    </div>
    
    <div class="jeanmichel_art-header_main">
    
        <div class="jeanmichel_art-header_main_left">
            <?php if ($logo): ?>
                <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo">
                    <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
                </a>
            <?php endif; ?>
            <?php print render($page['header_left']); ?>
        </div>
        
        <div class="jeanmichel_art-header_main_right">
            <?php print render($page['header_right']); ?>
        </div>
        <?php
			if ($language->language == 'fr'):
		?>
        <style type="text/css">
			.jeanmichel_art-header_main_right ul.menu { font-size:15px; }
		</style>
        <?php
			endif;
		?>
    </div><!-- /.jeanmichel_art-header_main -->
    
    <div class="jeanmichel_art-main">
    
        <div class="jeanmichel_art-main_top">
    <?php if ($main_menu || $secondary_menu): ?>
      <div id="navigation"><div class="section">
        <?php print theme('links__system_main_menu', array('links' => $main_menu, 'attributes' => array('id' => 'main-menu', 'class' => array('links', 'inline', 'clearfix')), 'heading' => t('Main menu'))); ?>
        <?php print theme('links__system_secondary_menu', array('links' => $secondary_menu, 'attributes' => array('id' => 'secondary-menu', 'class' => array('links', 'inline', 'clearfix')), 'heading' => t('Secondary menu'))); ?>
      </div></div> <!-- /.section, /#navigation -->
    <?php endif; ?>

    <?php if ($breadcrumb): ?>
      <div id="breadcrumb"><?php print $breadcrumb; ?></div>
    <?php endif; ?>

    <?php print $messages; ?>
            <?php print render($page['main_top']); ?>
        </div>
    
        <div class="jeanmichel_art-main_content">
              <div class="jeanmichel_art-flowbox" style="overflow:hidden;">
                   <?php
				   $index_nodeid = $default_index_nodeid = 1;
				   
				   switch ( $language->language ){
					   case 'zh-hans':
					   $index_nodeid = 1;
					   break;
					   
					   case 'en':
					   $index_nodeid = 2;
					   break;
					   
					   case 'fr':
					   $index_nodeid = 3;
					   break;
				   }
				   
				   $index_node = node_load($index_nodeid);
				   
				   if (empty($index_node->field_poster)){
					   $index_node = node_load($default_index_nodeid);
				   }
				   
				   //print_r($index_node->field_poster);

				   ?>
              		<div class="jeanmichel_art-flowbox_left" style="width:750px; height:350px; float:left;">
						<?php
                        if (isset($index_node->field_poster['und']) && !empty($index_node->field_poster['und'])){
                        ?>
                        <div class="jeanmichel_art-flowbox_left_gallery js-flickity" style="width:750px;"
                                    data-flickity-options='{ "cellAlign": "left", "contain": true,"wrapAround": true,"autoPlay": true }'>
                        	<?php
							   foreach($index_node->field_poster['und'] as $k=>$poster){
								   $poster_url = file_create_url($poster['uri']);
								   print('<div class="gallery-cell"><img style="width:750px; height:350px;" src="'.$poster_url.'"></div>');
							   }
							?>
                        </div>
                        <?php
						}
						?>
                    </div>
                    <div class="jeanmichel_art-flowbox_right" style="width:290px; height:310px; float:left; padding:20px; background-color:#c5c4c2; line-height:25px; font-size:14px;">
                         <?php echo $index_node->body['und'][0]['value']; ?>
                    </div>
              </div>
              <div style="display:none;">
                   <?php print render($title_prefix); ?>
                   <?php if ($title): ?><h1 class="title" id="page-title"><?php print $title; ?></h1><?php endif; ?>
                   <?php print render($title_suffix); ?>
                   <?php if ($tabs): ?><div class="tabs"><?php print render($tabs); ?></div><?php endif; ?>
                   <?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
                   <?php print render($page['content']); ?>
                   <?php print $feed_icons; ?>
              </div>
        </div>
        
        <div class="jeanmichel_art-indexlist">
            <div class="jeanmichel_art-indexlist-box">
                 <h3><?php print t('New Exhibition') ?></h3>
                 <div class="jeanmichel_art-indexlist-img"><img src="<?php print $base_path.$directory?>/image/e.png"></div>
                 <div class="jeanmichel_art-indexlist-list">
                 <?php print render($page['indexlist_first']); ?>
                 </div>
            </div>
            <div class="jeanmichel_art-indexlist-box">
                 <h3><?php print t('New Painting') ?></h3>
                 <div class="jeanmichel_art-indexlist-img"><img src="<?php print $base_path.$directory?>/image/p.png"></div>
                 <div class="jeanmichel_art-indexlist-list">
                 <?php print render($page['indexlist_second']); ?>
                 </div>
            </div>
            <div class="jeanmichel_art-indexlist-box">
                 <h3><?php print t('New Sculpture') ?></h3>
                 <div class="jeanmichel_art-indexlist-img"><img src="<?php print $base_path.$directory?>/image/s.png"></div>
                 <div class="jeanmichel_art-indexlist-list">
                 <?php print render($page['indexlist_third']); ?>
                 </div>
            </div>
        </div>
            
        <div class="jeanmichel_art-main_bottom">
            <?php print render($page['main_bottom']); ?>
        </div>
    
    </div><!-- /.jeanmichel_art-main -->
    
    <div class="jeanmichel_art-footer">&copy; 2013-2014 <?php print t('All Rights Reserved'); ?><br>
        <?php print render($page['footer']); ?>
    </div>

</div><!-- /.jeanmichel_art-page_wrapper -->
