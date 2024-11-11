<?php
$settings['display'] = 'vertical';
$settings['fields'] = array(
	'title' => array(
		'caption' => 'Заголовок',
		'type' => 'text'
	),
	'type' => array(
		'caption' => 'Тип',
		'type' => 'dropdown',
		'elements' => 'Сайт==home||ВКонтакте==vk||Одноклассники==ok||Telegram==telegram||Твиттер==twitter'
	),
	'link' => array(
		'caption' => 'Ссылка на страницу',
		'type' => 'text'
	)
);
$settings['templates'] = array(
	'outerTpl' => '<p>[+wrapper+]</p>',
	'rowTpl' => '<span><span class="icon-[+type+]"></span><a href="[+link+]" target="_blank">[+title+]</a></span>'
);
$settings['configuration'] = array(
	'enablePaste' => true,
	'csvseparator' => ';'
);