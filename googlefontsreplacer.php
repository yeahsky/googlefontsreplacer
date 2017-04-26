<?php
/*
	Plugin Name: googlefonts replacer
	Plugin URI: http://www.redren.net/2017/04/tihuangooglezaixianzitiweiguoneiyuanjiakuaiwordpresshoutaidakaisududefangfa/
	Description: 将谷歌字体替换成国内CDN链接，加快wordpress后台管理界面的速度.
	Version: 1.0
	Author: David
	Author URI: http://redren.net
*/


function redren_cdn_callback($buffer) {
	return str_replace('fonts.googleapis.com', 'fonts.css.network', $buffer);
}
function redren_buffer_start() {
	ob_start("redren_cdn_callback");
}
function redren_buffer_end() {
	ob_end_flush();
}
add_action('init', 'redren_buffer_start');
add_action('shutdown', 'redren_buffer_end');

?>
