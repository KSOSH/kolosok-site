<?php
use ProjectSoft\Video;
$self = 'assets/tvs/EvoVideo/EvoVideo.index.php';
$base_path = str_replace($self, '', str_replace('\\', '/', __FILE__));

define('MODX_API_MODE','true');
define('IN_MANAGER_MODE', true);
include_once("{$base_path}index.php");
header('Content-Type: application/json; charset=utf-8');
$array = array();
/**
 * Вставить проверку на менеджера с правами использования TV
 **/
$video = new Video(null, false);
$array = $video->setLink($_POST['link_evovideo']);
echo json_encode($array);