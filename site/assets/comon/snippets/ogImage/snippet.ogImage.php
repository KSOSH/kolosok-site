<?php
if(!defined('MODX_BASE_PATH')) die('What are you doing? Get out of here!');

$object = $modx->documentObject;
$ID = $object['id'];
$img = $object['imageSoc'][1];
$out = "";

$trimString = function(string $value):string {
	return trim($value);
};

if(is_file(MODX_BASE_PATH . $img)):
	$type = isset($type) ? array_map($trimString, explode(",", $type)) : array();
	$og_1 = $modx->runSnippet('phpthumb', array(
		'input'		=> $img,
		'options'	=> 'w=640,h=320,f=jpg,zc=C'
	));
	// Пока оставим
	//$og_2 = $modx->runSnippet('phpthumb', array(
	//	'input'		=> $img,
	//	'options'	=> 'w=537,h=240,f=jpg,zc=C'
	//));
	//$og_3 = $modx->runSnippet('phpthumb', array(
	//	'input'		=> $img,
	//	'options'	=> 'w=400,h=400,f=jpg,zc=C'
	//));
	$out = PHP_EOL . '	<meta itemprop="image" content="' . $modx->config['site_url'] . $og_1 . '">' . PHP_EOL;
	foreach ($type as $key => $value):
		switch ($value) {
			case 'vk':
				$out = '	<meta itemprop="vk:image" content="' . $modx->config['site_url'] . $og_1 . '">' . PHP_EOL;
				break;
			case 'og':
				$out .= '	<meta property="og:image" content="' . $modx->config['site_url'] . $og_1 . '">' . PHP_EOL;
				$out .= '	<meta property="og:image:width" content="640">' . PHP_EOL;
				$out .= '	<meta property="og:image:height" content="320">' . PHP_EOL;
				$out .= '	<meta property="og:image:type" content="image/jpeg">' . PHP_EOL;
				break;
			case 'twitter':
				$out .= '	<meta name="twitter:image0" content="' . $modx->config['site_url'] . $og_1 . '">' . PHP_EOL;
				break;
			default:
				break;
		}
	endforeach;
	return $out;
endif;
return $out;