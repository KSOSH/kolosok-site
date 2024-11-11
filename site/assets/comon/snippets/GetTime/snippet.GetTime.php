<?php
if(!defined('MODX_BASE_PATH')) die('What are you doing? Get out of here!');

$input = isset($input) ? $input : time() + (int)$modx->config['server_offset_time'];
if(is_string($input)):
	$input = strtotime($input);
endif;

$format = isset($format) ? (string)$format : 'd-m-Y H:i:s';

return date($format, $input);