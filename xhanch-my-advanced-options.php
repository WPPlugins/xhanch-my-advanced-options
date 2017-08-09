<?php
	/*
		Plugin Name: Xhanch - My Advanced Options
		Plugin URI: http://xhanch.com/wordpress-plugin-my-advanced-options/
		Description: Provide useful advanced options that are not provided by WordPress by default
		Author: Susanto BSc (Xhanch Studio)
		Author URI: http://xhanch.com
		Version: 1.0.0
	*/
	
	define('xmo', true);
	define('xmo_base_dir', dirname(__FILE__));
		
	global $xmo_conf;
	global $xmo_default;
		
	load_plugin_textdomain('xmo', WP_PLUGIN_URL.'/xhanch-my-advanced-options/lang/', 'xhanch-my-advanced-options/lang/');
		
	$xmo_default = array(
		'disable_wp_auto_p_post' => 0,
		'disable_wp_auto_p_comment' => 0,
		'disable_wp_texturize' => 0,
		'disable_post_revision' => 1,
		'enable_shortcode_on_text_widget' => 1,
		'show_credit' => 1,
	);
		
	$xmo_conf = get_option('xmo_conf');
	if($xmo_conf === false){
		$xmo_conf = array();
	}
	
	function xmo_install () {
		require_once(xmo_base_dir.'/installer.php');
	}
	register_activation_hook(__FILE__,'xmo_install');

	xmo_inc('inc');
	
	define('xmo_base_url', xmo_get_dir('url'));
	
	if($xmo_conf['disable_wp_auto_p_post'])
		remove_filter ('the_content',  'wpautop');
	if($xmo_conf['disable_wp_auto_p_comment'])
		remove_filter ('comment_text',  'wpautop');
	if($xmo_conf['disable_wp_texturize'])
		remove_filter ('the_content',  'wptexturize');
	if($xmo_conf['disable_post_revision'])
		define ('WP_POST_REVISIONS', 0);
	if($xmo_conf['enable_shortcode_on_text_widget'])
		add_filter('widget_text', 'do_shortcode');
	if($xmo_conf['show_credit'])
		add_action('wp_footer', 'xmp_credit');	

	function xmp_credit() {
		$content = '<div style="font-size:10px">Empowered by <a href="http://xhanch.com/wordpress-plugin-my-advanced-options/" rel="section" title="'.__('Xhanch - My Advanced Options - Provide useful advanced options that are not provided by WordPress by default', 'xmo').'">'.__('My Advanced Options', 'xmo').'</a>, <a href="http://xhanch.com/" rel="section" title="'.__('Developed by Xhanch Studio', 'xmo').'">'.__('by Xhanch Studio', 'xmo').'</a></div>';
		echo $content;
	}
			
	if(is_admin()){
		function xmo_admin_menu() {	
			if(!defined('xhanch_root')){
				add_menu_page(
					'Xhanch', 
					'Xhanch', 
					8, 
					'xhanch', 
					'xhanch_intro',
					'http://xhanch.com/icon-16x16.jpg'
				);
				define('xhanch_root', true);
			}
			add_submenu_page(
				'xhanch', 
				__('My Advanced Options', 'xmo'), 
				__('My Adv. Options', 'xmo'), 
				8, 
				'xhanch-my-advanced-options', 
				'xmo_setting'
			);
		}
		require_once(xmo_base_dir.'/admin/xhanch.php');
		require_once(xmo_base_dir.'/admin/setting.php');
		add_action('admin_menu', 'xmo_admin_menu');
	}
	
	function xmo_inc($rel_path){	
		$path = xmo_base_dir.'/'.$rel_path;		
		$dir = dir($path);	
		while($file = $dir->read()){
			if($file == '.' || $file == '..')
				continue;
			$target = $path.'/'.$file;			
			if(is_dir($target))
				 xmo_inc($rel_path.'/'.$file);
			elseif(substr($target,-4) == '.php'){				
				require_once $target;	
			}
		}
		$dir->close();
	}
?>