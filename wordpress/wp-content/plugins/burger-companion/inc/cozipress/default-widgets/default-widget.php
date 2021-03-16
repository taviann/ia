<?php
$activate = array(
        'cozipress-sidebar-primary' => array(
            'search-1',
            'recent-posts-1',
            'archives-1',
        ),
		'cozipress-footer-widget-area' => array(
			 'text-1',
            'categories-1',
            'archives-1',
			'search-1',
        )
    );
    /* the default titles will appear */
   update_option('widget_text', array(
        1 => array('title' => 'About Company',
        'text'=>'<div class="textwidget">
	<div class="logo">
		<a href="javascript:void(0);"><img src="'.BURGER_COMPANION_PLUGIN_URL.'inc/cozipress/images/logo.png" alt="cozipress"></a>
	</div>
	<p>cozipress we talk destination we shine across your organization to fully understand.</p>
	<aside class="widget widget-contact">
		<div class="contact-area">
			<div class="contact-icon">
				<div class="contact-corn"><i class="fa fa-phone"></i></div>
			</div>
			<div class="contact-info">
				<p class="text"><a href="tel:+1 212-683-9756">+1 212-683-9756</a></p>
			</div>
		</div>
		<div class="contact-area">
			<div class="contact-icon">
				<div class="contact-corn"><i class="fa fa-envelope"></i></div>
			</div>
			<div class="contact-info">
				<p class="text"><a href="mailto:hello@example.com">hello@example.com</a></p>
			</div>
		</div>
		<div class="contact-area">
			<div class="contact-icon">
				<div class="contact-corn"><i class="fa fa-map-marker"></i></div>
			</div>
			<div class="contact-info">
				<p class="text"><a href="javascript:void(0);">Main Avenue.987</a></p>
			</div>
		</div>
	</aside>
	<a href="javascript:void(0);" class="btn btn-primary btn-like-icon">Live Chat <span class="bticn"><i class="fa fa-headphones"></i></span></a>
</div>'),        
		2 => array('title' => 'Recent Posts'),
		3 => array('title' => 'Categories'), 
        ));
		 update_option('widget_categories', array(
			1 => array('title' => 'Categories'), 
			2 => array('title' => 'Categories')));

		update_option('widget_archives', array(
			1 => array('title' => 'Archives'), 
			2 => array('title' => 'Archives')));
			
		update_option('widget_search', array(
			1 => array('title' => 'Search'), 
			2 => array('title' => 'Search')));	
		
    update_option('sidebars_widgets',  $activate);
	$MediaId = get_option('cozipress_media_id');
	set_theme_mod( 'custom_logo', $MediaId[0] );