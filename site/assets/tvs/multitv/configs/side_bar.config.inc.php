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
	'attributes' => array(
		'caption' => 'Аттрибуты ссылки',
		'type' => 'text'
	),
	'fancybox' => array(
		'caption' => 'Открыть в Fancybox',
		'type' => 'checkbox',
		'elements' => 'Да==data-fancybox data-type="iframe"'
	),
);
$settings['templates'] = array(
	'outerTpl' => '<ul>[+wrapper+]</ul>',
	'rowTpl' => '<li>[[if? &is=`[+link+]:isempty:` &then=`<span>[+title+]</span>` &else=`<a href="[+link+]" [+attributes+] [+fancybox+]>[+title+]</a>` ]]</li>'
);
$settings['configuration'] = array(
	'enablePaste' => true,
	'csvseparator' => ';'
);