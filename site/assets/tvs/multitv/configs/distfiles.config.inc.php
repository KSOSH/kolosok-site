<?php
$settings['display'] = 'vertical';
$settings['fields'] = array(
	'title' => array(
		'caption' => 'Заголовок',
		'type' => 'text'
	),
	'file' => array(
		'caption' => 'Файл',
		'type' => 'file'
	)
);
$settings['templates'] = array(
	'outerTpl' => '<ul>[+wrapper+]</ul>',
	'rowTpl' => '<li><p><a href="[(site_url)][+file+]">[+title+]</a></p></li>'
);
$settings['configuration'] = array(
	'enablePaste' => true,
	'csvseparator' => ';'
);