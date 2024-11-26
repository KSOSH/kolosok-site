<?php
if(!defined('MODX_BASE_PATH')){die('What are you doing? Get out of here!');}

if(!function_exists('removeEmptyFolders')):
	/**
	 * Функция очистки от пустых директорий
	 * Держим дерево в порядке
	*/
	function removeEmptyFolders($path){
		$isFolderEmpty = true;
		$pathForGlob = (substr($path, -1) == "/") ? $path . "*" : $pathForGlob = $path . DIRECTORY_SEPARATOR . "*";
		// смотрим что есть внутри раздела
		foreach (glob($pathForGlob) as $file){
			if (is_dir($file)){
				if (!removeEmptyFolders($file)) {
					$isFolderEmpty = false;
				}
			}else{
				$isFolderEmpty = false;
			}
		}
		if ($isFolderEmpty){
			@rmdir($path);
		}
		return $isFolderEmpty;
	}
endif;

if(!function_exists('removeLogOut_Cookie')):
	/**
	 * Функция очиски установленных системой Cookies
	 * Нужна если сидим в школе
	 */
	function removeLogOut_Cookie() {
		$time = time() - 3600;
		if (isset($_SERVER['HTTP_COOKIE'])):
			$cookies = explode(';', $_SERVER['HTTP_COOKIE']);
			foreach($cookies as $cookie):
				$parts = explode('=', $cookie);
				if(count($parts)):
					$name = trim($parts[0]);
					setcookie($name, '', $time);
					setcookie($name, '', $time, '/');
				endif;
			endforeach;
		endif;
	}
endif;

$e = &$modx->event;
$params = $e->params;

switch($e->name){
	case "OnManagerLogin":
		/**
		 * Запустим для директорий images, files, media
		 */
		removeEmptyFolders(MODX_BASE_PATH . 'assets/images');
		removeEmptyFolders(MODX_BASE_PATH . 'assets/files');
		removeEmptyFolders(MODX_BASE_PATH . 'assets/media');
		break;
	case "OnManagerLogout":
		/**
		 * Запустим для директорий images, files, media
		 */
		removeEmptyFolders(MODX_BASE_PATH . 'assets/images');
		removeEmptyFolders(MODX_BASE_PATH . 'assets/files');
		removeEmptyFolders(MODX_BASE_PATH . 'assets/media');
		/**
		 * Очистим куки
		 */
		removeLogOut_Cookie();;
		break;
	case "OnManagerLoginFormRender":
		/**
		 * Рендер формы логина
		 */
		// Очищаем localStorage
		// Очищаем sessionStorage
		$modx->Event->output('<script>localStorage.clear();sessionStorage.clear();</script>');
		break;
}