<?php
$settings['display'] = 'vertical';
$settings['fields'] = array(
	'title' => array(
		'caption' => 'Заголовок',
		'type' => 'textareamini'
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
	'outerTpl' => '<div class="row">
						<div class="container-fluid univers">
							[+wrapper+]
						</div>
					</div>',
	'rowTpl' => '<div class="univers-item">
					<div class="row">
						<div class="column univers-item-image">
							<a href="[+link+]" title="[+title:hsc+]" target="_blank">
								<img src="[+image+]" alt="[+title:hsc+]">
							</a>
						</div>
					</div>
				</div>'
);
$settings['configuration'] = array(
	'enablePaste' => true,
	'csvseparator' => ';'
);