<?php
$regexp = "/^(?:http(?:s)?:\/\/)?(?:www\.)?(?:m\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user)\/))([^\?&\"'>]+)/";
$url = isset($url) ? $url : "";
$output = "https://www.youtube.com/embed/";
preg_match($regexp, $url, $matches);
if(count($matches)){
	$idvideo = $matches[1];
	$output .= $idvideo."?showinfo=0&rel=0";
}
return $output;