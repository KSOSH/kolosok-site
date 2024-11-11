<?php
if(!defined('MODX_BASE_PATH')) die('What are you doing? Get out of here!');

/**
 * 
{
  "check": [
    {
      "label": "ID TV",
      "type": "text",
      "value": "5",
      "default": "5",
      "desc": "ID TV Публикации в Telegram, соц. сети"
    }
  ],
  "picture": [
    {
      "label": "ID TV Pcture",
      "type": "text",
      "value": "6",
      "default": "6",
      "desc": "ID TV с картинкой"
    }
  ],
  "chat_id": [
    {
      "label": "ID пользователя в Telegram",
      "type": "text",
      "value": "83741005",
      "default": "83741005",
      "desc": "ID пользователя вы можете узнать у бота <a href='https://t.me/ShowJsonBot' target='_blank'>@ShowJsonBot</a>"
    }
  ],
  "chanel_id": [
    {
      "label": "ID Канала в Telegram",
      "type": "text",
      "value": "-1001885737036",
      "default": "-1001765245206",
      "desc": "ID канала узнать после создания канала приёма заявок. Напишите на канале сообщение и перешлите его <a href='https://t.me/ShowJsonBot' target='_blank'>@ShowJsonBot</a>"
    }
  ],
  "bot_token": [
    {
      "label": "Токен бота в Telegram",
      "type": "text",
      "value": "5742061218:AAE6zhQrQwnIPFh4yZr2-ABwr586c_3WULY",
      "default": "5742061218:AAE6zhQrQwnIPFh4yZr2-ABwr586c_3WULY",
      "desc": "Токен созданного вами бота. Бот должен быть участником канала."
    }
  ]
}
*
**/

$e = &$modx->event;
$params = $e->params;


if(!function_exists('sendBotMessage')):
	function sendBotMessage($url, $arrayQuery = array()){
		$ch = curl_init();
		$optArray = array(
				CURLOPT_URL => $url,
				CURLOPT_RETURNTRANSFER => true
		);
		curl_setopt_array($ch, $optArray);
		if(!empty($arrayQuery)):
			curl_setopt($ch, CURLOPT_POSTFIELDS, $arrayQuery);
		endif;
		$result = curl_exec($ch);
		curl_close($ch);
	}
endif;

$bot_token = !empty($params['bot_token']) ? $params['bot_token'] : false;
$chat_id = !empty($params['chat_id']) ? $params['chat_id'] : false;
$chanel_id = !empty($params['chanel_id']) ? $params['chanel_id'] : false;
$site_url = $modx->config['site_url'];
$imgSoc = !empty($params['picture']) ? $params['picture'] : false;

switch($e->name){
	case "OnLogEvent":
		if($chat_id && $bot_token):
			// Отправляем разработчику ошибки;
			$url = "https://api.telegram.org/bot" . $bot_token . "/sendMessage?chat_id=" . $chat_id;
			$types = array(
				'Пользовательский',
				'Информация',
				'Предупреждение',
				'Ошибка'
			);
			$messagge = "
*site:*\t" . $site_url . "
*name:*\t" . $e->name . "
*eventid:*\t" . $params['eventid'] . "
*type:*\t" . $types[$params['type']] . "
*createdon:*\t" . $modx->toDateFormat($params['createdon']) . "
*source:*\t" . $params['source'] . "";
			$url .= "&text=" . urlencode($messagge) . "&parse_mode=Markdown&disable_web_page_preview=true";
			sendBotMessage($url);
		endif;
		break;
	case "OnSendFormSite":
		// Отправляем на канал заявки с форм
		if($chanel_id):
			$url = "https://api.telegram.org/bot" . $bot_token . "/sendMessage?chat_id=" . $chanel_id;
			$messagge =  $params['message'];
			$url .= "&text=" . urlencode($messagge) . "&parse_mode=Markdown&disable_web_page_preview=true";
			sendBotMessage($url);
		endif;
		break;
	case "OnManagerLogin":
		$pars = print_r($params, true);
		$url = "https://api.telegram.org/bot" . $bot_token . "/sendMessage?chat_id=" . $chat_id;
		$arr = array(
			"userid" => $params["userid"],
			"username" => $params["username"],
		);
		$messagge = $site_url . PHP_EOL . "*Вход пользователя:*" . PHP_EOL . "```" . print_r($arr, true) . PHP_EOL . "```";
		$url .= "&text=" . urlencode($messagge) . "&parse_mode=Markdown&disable_web_page_preview=true";
		sendBotMessage($url);
		break;
	case "OnDocFormSave":
		$check = isset($params['check']) ? (int)$params['check'] : 0;
		if($check):
			$tvcheck = 'tv' . $check;
			if(isset($_POST[$tvcheck]) && is_array($_POST[$tvcheck])):
				$tvVal = (int)$_POST[$tvcheck][0];
				if($tvVal):
					$id = (int)$_POST['id'];
					$tmpl = (int)$_POST['template'];
					$tbl_site_tmplvar_contentvalues = $modx->getFullTableName('site_tmplvar_contentvalues');
					$rs = $modx->db->select('*', $tbl_site_tmplvar_contentvalues, "contentid='{$id}' and tmplvarid='{$check}'");
					$tvIds = array();
					while ($row = $modx->db->getRow($rs)) {
						$tvIds[$check] = $row['id'];
					}
					if(!empty($tvIds)):
						$data = array(
							"value" => 0,
							"tmplvarid" => $check
						);
						$modx->db->update($data, $tbl_site_tmplvar_contentvalues, "id='$tvIds[$check]'");
					endif;
					// OnSendBot, OnSendVK, OnSendOK ...
					$post = print_r($_POST, true);
					file_put_contents('file.txt', $post);
					//published, searchable, 
					$published = (int) $_POST['published'];
					if($published):
						$url = "https://api.telegram.org/bot" . $bot_token . "/sendPhoto?chat_id=" . $chanel_id . "&parse_mode=Markdown&disable_web_page_preview=true";
						$pageUrl = $modx->makeUrl($_POST['id'], '', '', 'full');
						$title = $_POST['pagetitle'];
						$picture = MODX_BASE_PATH . $_POST['tv' . $imgSoc];
						$baseName = pathinfo($picture, PATHINFO_BASENAME);
						$type = mime_content_type($picture);
						$msg = $pageUrl . PHP_EOL . PHP_EOL . "*" . $title . "*" . PHP_EOL . PHP_EOL . $_POST['introtext'];
						$arrayQuery = array(
							'chat_id' => $chanel_id,
							'protect_content' => true,
							'caption' => $msg,
							'photo' => curl_file_create($picture, $type, $baseName)
						);
						sendBotMessage($url, $arrayQuery);
					endif;
				endif;
			endif;
		endif;
		break;
}
