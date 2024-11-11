<?php
if (!defined('MODX_BASE_PATH')) {
	http_response_code(403);
	die('For'); 
}
use Mimey\MimeTypes;
use Mpdf\Mpdf;
use Mpdf\HTMLParserMode;
use Mpdf\Output\Destination;
$req = ltrim(explode('?', $_SERVER['REQUEST_URI'])[0], "/");
if (!function_exists('getFileExt')):
	function getFileExt($filename) {
		//получаем информацию о файле в ассоциативный массив
		$path_info = pathinfo($filename);
		//если информация есть
		if(isset($path_info)){
			//возвращаем расширение в строчном формате: txt, doc, png и т.п.
			return strtolower($path_info['extension']);
		}else{
			//иначе возвращаем пустую строку, или что-то своё
			return "";
		}
	}
endif;
$ext = getFileExt($req);
$mimes = new MimeTypes;
switch ($ext) {
	case 'jpg':
	case 'jpeg':
	case 'bmp':
	case 'png':
	case 'gif':
		/*require_once(MODX_BASE_PATH.'assets/snippets/DocLister/lib/DLTemplate.class.php');
		$css = "";
		if(file_exists(dirname(__FILE__) . "/print.css"))
			$css = file_get_contents(dirname(__FILE__) . "/print.css");
		$type = $mimes->getMimeType($ext);
		$modx->tpl = DLTemplate::getInstance($modx);
		// Header
		$header = '@CODE: ' . file_get_contents(MODX_BASE_PATH . 'assets/templates/projectsoft/tpl/printpage_header.html');
		// Footer
		$footer = '@CODE: ' . file_get_contents(MODX_BASE_PATH . 'assets/templates/projectsoft/tpl/printpage_footer.html');
		// Body
		$html = "@CODE: <h1 class='text-center'>Файл<br>\"" . $req . "\"<br>по вашему запросу не найден</h1><h2 class='text-center'>Приносим свои извенения.</h2>";
		// Parse header
		$header = $modx->tpl->parseChunk($header, array(), true);
		// Parse footer
		$footer = $modx->tpl->parseChunk($footer, array(), true);
		// Parse body
		$html = $modx->tpl->parseChunk($html, array(), true);
		$mpdf = new Mpdf([
			'format' => [210, 210],
			'setAutoTopMargin' => 'pad',
			'setAutoBottomMargin' => 'pad'
		]);
		// write css
		$mpdf->WriteHTML($css, HTMLParserMode::HEADER_CSS);
		// set HTML header
		$mpdf->SetHTMLHeader($header);
		// set HTML footer
		$mpdf->SetHTMLFooter($footer);
		// write HTML body
		$mpdf->WriteHTML($html, HTMLParserMode::HTML_BODY);
		// return view pdf
		$dir = MODX_BASE_PATH . 'assets/cache/pdf';
		if(!is_dir($dir)):
			//mkdir(path, 0777, true)
			$permsFolder = octdec($modx->config['new_folder_permissions']);
			@mkdir($dir, $permsFolder, true);
		endif;
		$filename = pathinfo($req, PATHINFO_BASENAME);
		$file = $dir . '/' . $filename . '.pdf';
		$mpdf->Output($file, 'F');
		$img = new imagick($file);
		$img->setImageFormat('jpg');
		$img->writeImage($dir . '/' . $filename);
		header('HTTP/1.1 302 Moved Temporarily');
		header('Pragma: no-cache');
		header("Content-type: " . 'jpg');
		@unlink($file);
		echo file_get_contents($dir . '/' . $filename);
		@unlink($dir . '/' . $filename);
		exit();*/
		break;
	case 'pdf':
		/*require_once(MODX_BASE_PATH.'assets/snippets/DocLister/lib/DLTemplate.class.php');
		$modx->tpl = DLTemplate::getInstance($modx);
		$css = "";
		if(file_exists(dirname(__FILE__) . "/print.css"))
			$css = file_get_contents(dirname(__FILE__) . "/print.css");
		$filename = pathinfo($req, PATHINFO_BASENAME);
		// Header
		$header = '@CODE: ' . file_get_contents(MODX_BASE_PATH . 'assets/templates/projectsoft/tpl/printpage_header.html');
		// Footer
		$footer = '@CODE: ' . file_get_contents(MODX_BASE_PATH . 'assets/templates/projectsoft/tpl/printpage_footer.html');
		// Body
		$html = "@CODE: <h1 class='text-center'>Файл<br>\"" . $req . "\"<br>по вашему запросу не найден</h1><h2 class='text-center'>Приносим свои извенения.</h2>";
		// Parse header
		$header = $modx->tpl->parseChunk($header, array(), true);
		// Parse footer
		$footer = $modx->tpl->parseChunk($footer, array(), true);
		// Parse body
		$html = $modx->tpl->parseChunk($html, array(), true);
		$mpdf = new Mpdf([
			'setAutoTopMargin' => 'pad',
			'setAutoBottomMargin' => 'pad'
		]);
		// Set headers
		header('HTTP/1.1 302 Moved Temporarily');
		header('Pragma: no-cache');
		$type = $mimes->getMimeType($ext);
		header("Content-type: " . $type);
		// Set title, creator, author, subject
		$mpdf->SetTitle("Файл \"" . $filename . "\" не найден");
		$mpdf->SetCreator($modx->config["site_name"]);
		$mpdf->SetAuthor($modx->config["site_name"]);
		$mpdf->SetSubject("Файл \"" . $filename . "\" по вашему запросу не найден");
		// write css
		$mpdf->WriteHTML($css, HTMLParserMode::HEADER_CSS);
		// set HTML header
		$mpdf->SetHTMLHeader($header);
		// set HTML footer
		$mpdf->SetHTMLFooter($footer);
		// write HTML body
		$mpdf->WriteHTML($html, HTMLParserMode::HTML_BODY);
		// return view pdf
		$mpdf->Output();
		exit();*/
		break;
	/*
echo $_SERVER['REQUEST_URI'] . PHP_EOL;
	
	case 'doc':
	case 'docx':
	case 'xls':
	case 'xlsx':
		exit();
		break;
	case 'zip':
	case '7z':
	case 'rar':
		exit();
		break;*/
	default:
		// code...
		break;
}