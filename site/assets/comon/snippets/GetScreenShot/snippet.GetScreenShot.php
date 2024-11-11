<?php
if (!defined('MODX_BASE_PATH')) {
	http_response_code(403);
	die('For'); 
}

if(!function_exists('file_force_download')):
	function file_force_download($file, $name, $unlink = false) {
	  if (file_exists($file)) {
		// сбрасываем буфер вывода PHP, чтобы избежать переполнения памяти выделенной под скрипт
		// если этого не сделать файл будет читаться в память полностью!
		if (ob_get_level()) {
		  ob_end_clean();
		}
		// заставляем браузер показать окно сохранения файла
		header('Content-Description: File Transfer');
		header('Content-Type: image/png; charset=utf-8');
		header('Content-Disposition: attachment; filename=' . json_encode(array("fname" => basename($name))));
		header('Content-Transfer-Encoding: binary');
		header('Expires: 0');
		header('Cache-Control: must-revalidate');
		header('Pragma: public');
		header('Content-Length: ' . filesize($file));
		// читаем файл и отправляем его пользователю
		if ($fd = fopen($file, 'rb')) {
		  while (!feof($fd)) {
			print fread($fd, 1024);
		  }
		  fclose($fd);
		}
		if($unlink)
			unlink($file);
		exit;
	  }
	}
endif;
if(!function_exists('downLoadInCurl')):
	function downLoadInCurl($url, $file){
		$fp = fopen($file, 'w');
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt( $ch, CURLOPT_FILE, $fp );
		$result = curl_exec($ch);
		fclose($fp);
		if($result){
			return true;
		}
		@unlink($file);
		return false;
	}
endif;

if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_REQUEST['shot'])):
	set_time_limit(0);
	$str = "https://mini.s-shot.ru/1366x0/PNG/1366/Z100/?";
	$id = isset($_REQUEST['shot']) ? $_REQUEST['shot'] : $modx->config["base_url"];
	$title = isset($_REQUEST['title']) ? ($_REQUEST['title'] . ".png") : "image.png";
	$time = time();
	$saveFile =  MODX_BASE_PATH . 'assets/images/' . $time . '.png';
	$name = $title . ".png";
	$str .= $id;
	$ctrl = downLoadInCurl($str, $saveFile);
	if(!$ctrl):
		$title = "ScreenShot Not Found.png";
		file_force_download(MODX_BASE_PATH . 'assets/templates/studionions/images/404.png', $title, false);
	else:
		file_force_download(MODX_BASE_PATH . 'assets/images/' . $time . '.png', $title, true);
	endif;
	exit();
else:
	$modx->sendForward(33, 'HTTP/1.0 403 Forbidden');
endif;
