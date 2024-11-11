<?php
if(!defined('MODX_BASE_PATH')) die('What are you doing? Get out of here!');

/**
 * Сниппет должен вызываться только в некешируемом состоянии
 **/
$trimStr = function(string $value):string {
    return trim($value);
};

$metriks = isset($metriks) ? $metriks : "metriks";
// IP адреса на которых не выводится Яндекс Метрика
// С локального IP метрика не выводится
$ips = isset($ips) ? array_map($trimStr, explode(";", $ips)) : array();

!in_array("127.0.0.1", $ips) && $ips[] = "127.0.0.1";
// Проверяем файл htaccess На существование
if(!is_file(dirname(__FILE__) . "/.htaccess")):
	$content = '
Order Deny,Allow
Deny from all
';
	file_put_contents(dirname(__FILE__) . "/.htaccess", $content);
	chmod(dirname(__FILE__) . "/.htaccess", 0644);
endif;

if(!in_array($_SERVER['REMOTE_ADDR'], $ips)):
	return $metriks;
else:
	return "";
endif;