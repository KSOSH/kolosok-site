<?php
return array (
	'caption' => 'ДИРЕКТОР/ШКОЛА',
	'introtext' => '<b style="color: red">Настройки для Школы</b>',
	'settings' => array (
		'logotip' => array (
			'caption' => 'Логотип<br><span style="color: red;">К размеру 210x210</span>',
			'type' => 'image',
			'note' => '',
			'default_text' => 'assets/templates/projectsoft/images/logo.png',
		),
		'org_date' => array(
			'caption' => 'Год основания',
			'type' => 'date',
			'note' => '',
			'default_text' => '01-09-1934 00:00:00',
		),
		'mini_name_org' => array (
			'caption' => 'Наименование организации',
			'type' => 'textareamini',
			'note' => 'Короткое Наименование организации',
			'default_text' => 'ГБОУ СОШ пос. Комсомольский',
			'style' => 'max-height: 2em;'
		),
		'name_org' => array (
			'caption' => 'Наименование организации',
			'type' => 'textareamini',
			'note' => 'Полное Наименование организации',
			'default_text' => 'Государственное бюджетное общеобразовательное учреждение средняя общеобразовательная школа пос. Комсомольский муниципального района Кинельский Самарской области',
		),
		'address' => array (
			'caption' => 'Адрес',
			'type' => 'textareamini',
			'note' => 'Адрес Школы',
			'default_text' => '446412, Самарская область, Кинельский район, 
п. Комсомольский, ул. Комсомольская, 22',
		),
		'email' => array (
			'caption' => 'Email Адрес',
			'type' => 'text',
			'note' => 'Email Школы',
			'default_text' => 'koms_sch_knl@samara.edu.ru',
		),
		'siteschool' => array(
			'caption' => 'Сайты Школы',
			'type' => 'custom_tv:multitv',
			'note' => 'Сайты внизу страницы',
			'elements' => '',
			'default_text' => '[]',
		),
		'twitter_creator' => array(
			'caption' => 'Аккаунт Twitter',
			'type' => 'text',
			'note' => '',
			'elements' => '',
			'default_text' => '',
		),
		'phones' => array (
			'caption' => 'Телефоны',
			'type' => 'textareamini',
			'note' => 'Телефоны Школы',
			'default_text' => '8(84663) 5-11-01
8(84663) 5-11-04
8(84663) 5-11-06',
		),
		'director_position' => array (
			'caption' => 'Должность',
			'type' => 'text',
			'note' => 'Должность Директора Школы',
			'default_text' => 'Директор',
		),
		'director' => array (
			'caption' => 'ФИО',
			'type' => 'text',
			'note' => 'ФИО Директора Школы (занимающий должность полностью)',
			'default_text' => 'Меньшов Максим Владимирович',
		),
		'director_photo' => array (
			'caption' => 'Фотография<br><span style="color: red;">К размеру 485x500</span>',
			'type' => 'image',
			'note' => 'Фотография Директора',
			'default_text' => 'assets/templates/projectsoft/images/ksosh.jpg',
		),
		'google_map' => array (
			'caption' => 'Google Map',
			'type' => 'text',
			'note' => 'Точка на карте Google',
			'default_text' => '53.2302,50.8420',
		),
	),
);

