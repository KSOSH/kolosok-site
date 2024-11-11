<?php
global $modx;
$settings['display'] = 'datatable';
$settings['fields'] = array(
	'title_1' => array(
		'caption' => 'Отображаемое имя',
		'type' => 'text'
	),
	'title_2' => array(
		'caption' => 'Отображаемое имя',
		'type' => 'text'
	),
	'title_3' => array(
		'caption' => 'Отображаемое имя',
		'type' => 'text'
	),
	'document' => array(
		'caption' => 'Документ',
		'type' => 'dropdown',
		'elements' => '@SELECT `pagetitle`, `id` FROM [+PREFIX+]site_content WHERE parent != 2 AND published = 1 AND deleted = 0 ORDER BY `pagetitle` ASC'
	),
	'file' => array(
		'caption' => 'Файл',
		'type' => 'file'
	),
	'site' => array(
		'caption' => 'Ссылка на сторонний ресурс',
		'type' => 'text'
	),
);
$settings['columns'] = array(
	array(
		'caption' => 'Content',
		'fieldname' => 'title1_1',
		'render' => '[+fieldTab:select=`onecol=<div><p><b>[+title_1+]</b></p><b>ID: </b>[+document+]<br /></div>&twocol=<div><p><b>[+title_2+]</b></p><b>File: </b>http://komsomol.minobr63.ru/[+file+]<br /></div>&threecol=<div><p><b>[+title_3+]</b></p><b>WWW: </b>[+site+]<br /></div>`+]'
	)
);
$settings['form'] = array(
	array(
		'caption' => 'Ссылка на страницу',
		'value' => 'onecol',
		'content' => array(
			'title_1' => array(),
			'document' => array()
		)
	),
	array(
		'caption' => 'Ссылка на файл',
		'value' => 'twocol',
		'content' => array(
			'title_2' => array(),
			'file' => array(),
		)
	),
	array(
		'caption' => 'Ссылка на сторонний ресурс',
		'value' => 'threecol',
		'content' => array(
			'title_3' => array(),
			'site' => array(),
		)
	)
);
$settings['configuration'] = array(
	'enablePaste' => false,
	'csvseparator' => ';',
	'radioTabs' => true,
	'hideHeader' => true,
	'displayLength'=>"-1"
);
$settings['templates'] = array(
	'outerTpl' => '<ul class="files-tv">[+wrapper+]</ul>',
	'rowTpl' => '<li class="files-tv-item">[+fieldTab:is=`onecol`:then=`<a class="files-tv-item-link files-tv-type-document" href="[(site_url)][~[+document+]~]">[+title_1+]</a>`+][+fieldTab:is=`twocol`:then=`<a class="files-tv-item-link files-tv-type-file" href="[(site_url)][+file+]">[+title_2+]</a>`+][+fieldTab:is=`threecol`:then=`<a class="files-tv-item-link files-tv-type-site" href="[+site+]" target="_blank">[+title_3+]</a>`+]
	</li>'
);

$settings['templatesmetodical'] = array(
	'outerTpl' => '<h5 class="text-center">Используемая литература</h5>
	<ul class="files-tv">[+wrapper+]</ul>',
	'rowTpl' => '<li class="files-tv-item">[+fieldTab:is=`onecol`:then=`<a class="files-tv-item-link files-tv-type-document" href="[(site_url)][~[+document+]~]">[+title_1+]</a>`+][+fieldTab:is=`twocol`:then=`<a class="files-tv-item-link files-tv-type-file" href="[(site_url)][+file+]">[+title_2+]</a>`+][+fieldTab:is=`threecol`:then=`<a class="files-tv-item-link files-tv-type-site" href="[+site+]" target="_blank">[+title_3+]</a>`+]
	</li>'
);