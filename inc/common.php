<?php
	function xmo_is_ie6() {
		  $userAgent = strtolower($_SERVER['HTTP_USER_AGENT']);
		  if (ereg("msie 6.0", $userAgent))
				return true;
		  else
			return false;		  
	}

	function xmo_form_get($str){
		if(!isset($_GET[$str]))
			return false;
		return xmo_read_var(urldecode($_GET[$str]));
	}

	function xmo_read_var($str){
		$res = $str;
		$res = str_replace('\\\'','\'',$res);
		$res = str_replace('\\\\','\\',$res);
		$res = str_replace('\\"','"',$res);
		return $res;
	}

	function xmo_form_post($str, $parse = true){
		if(!isset($_POST[$str]))
			return false;
		if($parse)
			return xmo_read_var($_POST[$str]);
		return $_POST[$str];
	}

	function xmo_get_dir($type) {
		if ( !defined('WP_CONTENT_URL') )
			define( 'WP_CONTENT_URL', get_option('siteurl') . '/wp-content');
		if ( !defined('WP_CONTENT_DIR') )
			define( 'WP_CONTENT_DIR', ABSPATH . 'wp-content' );
		if ($type=='path') { return WP_CONTENT_DIR.'/plugins/'.plugin_basename(xmo_base_dir); }
		else { return WP_CONTENT_URL.'/plugins/'.plugin_basename(xmo_base_dir); }
	}

	function xmo_get_file($name){
		$res = '';
		$res = @file_get_contents($name);
		if($res === false || $res == ''){
			$ch = curl_init();

			curl_setopt($ch, CURLOPT_URL, $name);
			curl_setopt($ch, CURLOPT_AUTOREFERER, 0);
			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

			$res = curl_exec($ch);
			if($res === false){
				xmo_log('Failed to read feeds from twitter because of ' . curl_error($ch));	
			}
			curl_close($ch);
		}		
		return $res;
	}	
?>