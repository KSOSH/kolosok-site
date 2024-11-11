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
	'outerTpl' => '<div class="row"><div class="sites">[+wrapper+]</div></div>',
	'rowTpl' => '<div class="column sites-link"><a href="[+link+]" title="[+title+]" target="_blank"><img src="[+image+]" alt="[+title+]"></a></div>'
);
$settings['configuration'] = array(
	'enablePaste' => true,
	'csvseparator' => ';'
);