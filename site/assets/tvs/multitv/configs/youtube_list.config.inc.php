<?php
global $modx;
$youtube_list = dirname(__FILE__) . '/youtube_list.min.css';
$youtube_list = is_file($youtube_list) ? '<style>'.file_get_contents($youtube_list).'</style>' : false;
if($youtube_list)
{
	$modx->regClientCSS($youtube_list);
}
$settings['display'] = 'datatable';
$settings["fields"] = array(
	"title" => array(
		"caption" => "Название",
		"type" => "text"
	),
	"link" => array(
		"caption" => "Ссылка",
		"type"	=> "text"
	),
	"fancybox" => array(
		"caption" => "Просматривать на сайте",
		"type" => "checkbox",
		"elements" => "Yes==1"
	),
	"image"	=> array(
		"caption" => "Изображение",
		"type" => "image"
	),
	'thumb' => array(
		'caption' => 'Thumbnail',
		'type' => 'thumb',
		'thumbof' => 'image'
	)
);
$settings['columns'] = array(
	array(
		'caption' => 'Видео с YouTube',
		'fieldname' => 'title',
		'render' => '<table><tr><td style="width: 50%">[+title+]</td><td style="width: 50%">[+link+]<br>[+fancybox+]</td></tr></table>'
	)
);
$settings['form'] = array(
	array(
		'caption' => 'Редактировать',
		'content' => array(
			'title' => array(),
			'link' => array(),
			'fancybox' => array(),
			'image' => array(),
			'thumb' => array()
		)
	),
);
$settings['configuration'] = array(
	'enablePaste' => true,
	'csvseparator' => ';',
	'radioTabs' => false,
	'hideHeader' => true,
	'displayLength'=>"-1"
);
$settings['templates'] = array(
	'outerTpl' => '
	<div class="youtube_list row">
		[+wrapper+]
	</div>',
	'rowTpl' => '
	<div class="youtube_list--item">
		<a href="[+link+]" target="_blank" class="youtube_list--item--link"[+fancybox:is=`1`:then=` data-fancybox="video" data-click-slide="false" data-click-outside="false"`+]>
			<div class="youtube_list--item--image" style="background-image: url([[phpthumb? &input=`[+image+]` &options=`w=558,h=314,zc=C`]]);"></div>
			<p class="youtube_list--item--title text-center">[+title+]</p>
		</a>
	</div>'
);
$settings['prepare'] = function($data, $modx, $_multiTV)
{
	
	return $data;
};