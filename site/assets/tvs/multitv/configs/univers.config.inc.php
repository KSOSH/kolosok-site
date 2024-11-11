<?php
$settings['display'] = 'vertical';
$settings['fields'] = array(
	'title' => array(
		'caption' => 'Заголовок',
		'type' => 'text'
	),
	'image' => array(
		'caption' => 'Изображение',
		'type' => 'image'
	),
	'link' => array(
		'caption' => 'Ссылка на страницу',
		'type' => 'text'
	),
	'thumb' => array(
		'caption' => 'Thumbnail',
		'type' => 'thumb',
		'thumbof' => 'image'
	)
);
$settings['templates'] = array(
	'outerTpl' => '<div class="row"><div class="container-fluid"><div class="univers"><h3 class="news-title text-center">Университеты Самары</h3><div class="univers-wrapper"><div class="univers-slick slick-slider">[+wrapper+]</div></div></div></div></div>',
	'rowTpl' => '<div class="univers-slick-item"><a href="[+link+]" title="[+title:hsc+]" target="_blank"><img src="[+image+]" alt="[+title:hsc+]"></a></div>'
);
$settings['configuration'] = array(
	'enablePaste' => true,
	'csvseparator' => ';'
);