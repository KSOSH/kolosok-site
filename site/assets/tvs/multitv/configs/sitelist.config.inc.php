<?php
$settings['display'] = 'vertical';
$settings['fields'] = array(
	'title' => array(
		'caption' => 'Заголовок',
		'type' => 'text'
	),
	'link' => array(
		'caption' => 'Ссылка на страницу',
		'type' => 'text'
	),
);
$settings['templates'] = array(
	'outerTpl' => '<ul>[+wrapper+]</ul>',
	'rowTpl' => '<li>[[if? &is=`[+link+]:isempty:` &then=`<span>[+title+]</span>` &else=`<a href="[+link+]">[+title+]</a>` ]]</li>'
);
$settings['configuration'] = array(
	'enablePaste' => true,
	'csvseparator' => ';'
);