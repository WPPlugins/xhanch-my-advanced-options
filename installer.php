<?php
	global $wpdb;
	global $xmo_conf;
	global $xmo_default;
				
	$xmo_conf = get_option('xmo_conf');
	if($xmo_conf === false){
		$xmo_conf = $xmo_default;	
		add_option('xmo_conf', $xmo_conf);
	}else{			
		$xmo_conf['show_credit'] = 1;
		$xmo_conf = array_merge($xmo_default, $xmo_conf);		
		update_option('xmo_conf', $xmo_conf);
	}
?>