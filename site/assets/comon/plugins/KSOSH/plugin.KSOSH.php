<?php
if (!defined('MODX_BASE_PATH')) {
	http_response_code(403);
	die('For'); 
}
use ProjectSoft\PluginEvolution;

$e =& $modx->event;
$params = $e->params;
switch ($e->name) {
	// Создание дирректории по id документа c учётом родителей
	case "OnDocFormSave":
	case "OnDocDuplicate":
		// Create folders
		PluginEvolution::createDocFolders($modx, $params);
		break;
	// Создание документов pdf, jp(e)g, png, gif, bmp, zip, 7z, rar, doc(x), xls(x),  etc... если они не существуют
	case "OnPageNotFound":
		PluginEvolution::routeNotFound($modx, $params);
		break;
	case "OnWebPagePrerender":
		PluginEvolution::minifyHTML($modx);
		break;
}
