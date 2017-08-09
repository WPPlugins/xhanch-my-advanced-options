<?php
	if(!defined('xmo'))
		exit;
	
	function xmo_setting(){
		global $wpdb;
		global $xmo_conf;
		global $xmo_default;
				
		if($_POST['cmd_xmo_update']){
			$xmo_conf = array(
				'disable_wp_auto_p_post' => xmo_form_post('chk_xmo_disable_wp_auto_p_post'),
				'disable_wp_auto_p_comment' => xmo_form_post('chk_xmo_disable_wp_auto_p_comment'),	
				'disable_wp_texturize' => xmo_form_post('chk_xmo_disable_wp_texturize'),	
				'disable_post_revision' => xmo_form_post('chk_xmo_disable_post_revision'),		
				'enable_shortcode_on_text_widget' => xmo_form_post('chk_xmo_enable_shortcode_on_text_widget'),	
				'show_credit' => xmo_form_post('chk_xmo_show_credit'),	
			);
						
			update_option('xmo_conf', $xmo_conf);	
			echo '<div id="message" class="updated fade"><p>'.__('Configuration Updated', 'xmo').'</p></div>';
		}			
?>
		<style type="text/css">
			table, td{font-family:Arial;font-size:12px}
			tr{height:22px}
			ul li{line-height:2px}	
			.clear{clear:both}		
		</style>
		<script type="text/javascript">
			function show_spoiler(obj){
				var inner = obj.parentNode.getElementsByTagName("div")[0];
				if (inner.style.display == "none")
					inner.style.display = "";
				else
					inner.style.display = "none";
			}
			function show_more(obj_nm){
				var obj = document.getElementById(obj_nm);
				if (obj.style.display == "none")
					obj.style.display = "";
				else
					obj.style.display = "none";
			}
    	</script>
		<div class="wrap">
			<h2><?php echo __('Xhanch - My Advanced Options - Configuration', 'xmo'); ?></h2>		
            <div style="float:right;line-height:21px">
            	<b><?php echo __('Do you like this plugin? If yes, click this button -&gt;', 'xmo'); ?></b> <iframe src="http://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fxhanch.com%2Fwordpress-plugin-my-advanced-options/%2F&amp;layout=button_count&amp;show_faces=false&amp;width=450&amp;action=like&amp;font=arial&amp;colorscheme=light&amp;height=21" scrolling="no" frameborder="0" style="border:1px solid #999; overflow:hidden; width:100px; height:21px; margin:0 0 0 10px; float:right" allowTransparency="true"></iframe>           
            </div>
            <div class="clear"></div>	
            <div style="float:right;line-height:21px">
            	<b><?php echo __('Do you like our service and support? If yes, click this button -&gt;', 'xmo'); ?></b> <iframe src="http://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.facebook.com%2Fpages%2FXhanch-Studio%2F146245898739871&amp;layout=button_count&amp;show_faces=false&amp;width=450&amp;action=like&amp;font=arial&amp;colorscheme=light&amp;height=21" scrolling="no" frameborder="0" style="border:1px solid #999; overflow:hidden; width:100px; height:21px; margin:0 0 0 10px; float:right" allowTransparency="true"></iframe>           
            </div>
            <div class="clear"></div>
			<br/>
                
            <form action="" method="post">
                <i><small>Note: <a href="#guide"><?php echo __('Click here for a complete explaination about these configurations fields', 'xmo'); ?></a></small></i><br/>
                <br/>                             
                <br/>
                <table cellpadding="0" cellspacing="0">
                    <tr>
                        <td width="22px"><input type="checkbox" id="chk_xmo_disable_wp_auto_p_post" name="chk_xmo_disable_wp_auto_p_post" value="1" <?php echo ($xmo_conf['disable_wp_auto_p_post']?'checked="checked"':''); ?>/></td>
                        <td width="775px"><?php echo __('Disable auto p on post/page? <i>(This will stop WordPress to add paragraph automatically to your post/page contents)</i>', 'xmo'); ?></td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" id="chk_xmo_disable_wp_auto_p_comment" name="chk_xmo_disable_wp_auto_p_comment" value="1" <?php echo ($xmo_conf['disable_wp_auto_p_comment']?'checked="checked"':''); ?>/></td>
                        <td><?php echo __('Disable auto p on comments? <i>(This will stop WordPress to add paragraph automatically to your comments)</i>', 'xmo'); ?></td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" id="chk_xmo_disable_wp_texturize" name="chk_xmo_disable_wp_texturize" value="1" <?php echo ($xmo_conf['disable_wp_texturize']?'checked="checked"':''); ?>/></td>
                        <td><?php echo __('Disable content texturize? <i>(This will stop WordPress to automatically clean up your post/page contents HTML code)</i>', 'xmo'); ?></td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" id="chk_xmo_disable_post_revision" name="chk_xmo_disable_post_revision" value="1" <?php echo ($xmo_conf['disable_post_revision']?'checked="checked"':''); ?>/></td>
                        <td><?php echo __('Disable post/page revision logging? <i>(This will stop WordPress to store post/page revisions records that will mostly be junks to your database)</i>', 'xmo'); ?></td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" id="chk_xmo_enable_shortcode_on_text_widget" name="chk_xmo_enable_shortcode_on_text_widget" value="1" <?php echo ($xmo_conf['enable_shortcode_on_text_widget']?'checked="checked"':''); ?>/></td>
                        <td><?php echo __('Enable shortcode on text widgets?', 'xmo'); ?></td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" id="chk_xmo_show_credit" name="chk_xmo_show_credit" value="1" <?php echo ($xmo_conf['show_credit']?'checked="checked"':''); ?>/></td>
                        <td><?php echo __('Show Credit?', 'xmo'); ?></td>
                    </tr>
                </table><br/>                 
                
                <p class="submit">
                    <input type="submit" name="cmd_xmo_update" value="<?php echo __('Update Configuration', 'xmo'); ?>"/>
                </p>
            </form>	
				
			<br/><br/>
			<a name="guide"></a>
			<b><big><?php echo __('Support This Plugin Development', 'xmo'); ?></big></b><br/>		
			<br/>	
			<?php echo __('Do you like this plugin? Do you think this plugin very helpful?', 'xmo'); ?><br/>
			<?php echo __('Why don\'t you support this plugin developement by donating any amount you are willing to give?', 'xmo'); ?><br/>
			<br/>
			<?php echo __('If you wish to support the developer and make a donation, please click the following button. Thanks!', 'xmo'); ?><br/>
			<a href="http://xhanch.com/xhanch-donate" target="_blank"><img src="http://xhanch.com/image/paypal/btn_donate.gif" alt="<?php echo __('Donate', 'xmo'); ?>"></a></p>

			<br/><br/>
			<a name="guide"></a>
			<b><big><?php echo __('Complete Info and Share Room', 'xmo'); ?></big></b><br/>		
			<br/>	
			<div class="spoiler">
				<input type="button" onclick="show_spoiler(this);" value="<?php echo __('Complete information regarding Xhanch - My Advanced Options (Share Room)', 'xmo'); ?>"/>
				<div class="inner" style="display:none;">
					<br/>
					<iframe src="http://xhanch.com/wordpress-plugin-my-advanced-options/" style="width:700px;height:500px"></iframe>
				</div>
			</div>			
			<br/>			
			<br/>
		</div>
<?php
	}
?>