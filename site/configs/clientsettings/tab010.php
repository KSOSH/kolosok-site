<?php
return array (
	'caption' => 'Фон сайта',
	'introtext' => '<b style="color: red">Общий фон сайта</b>',
	'settings' => array (
		'background_image' => array (
			'caption' => 'Изображение',
			'type' => 'image',
			'note' => '',
			'elements' => '',
			'default_text' => 'assets/templates/projectsoft/images/bg.jpg',
		),
		'background_repeat' => array (
			'caption' => 'Заполнение',
			'type' => 'dropdown',
			'note' => '',
			'elements' => 'repeat==repeat||repeat-x==repeat-x||repeat-y==repeat-y||no-repeat==no-repeat||initial==initial||inherit==inherit||unset==unset',
			'default_text' => 'initial',
		),
		'background_position' => array(
			'caption' => 'Позиция',
			'type' => 'dropdown',
			'note' => '',
			'elements' => 'top left==top left||top center==top center||top right==top right||center left==center left||center center==center center||center right==center right||bottom left==bottom left||bottom center==bottom center||bottom right==bottom right||initial==initial||inherit==inherit||unset==unset',
			'default_text' => 'initial',
		),
		'background_attachment' => array(
			'caption' => 'Прокручивание',
			'type' => 'dropdown',
			'note' => '',
			'elements' => 'fixed==fixed||scroll==scroll||initial==initial||inherit==inherit||unset==unset',
			'default_text' => 'initial',
		),
		'background_size' => array(
			'caption' => 'Размер',
			'type' => 'dropdown',
			'note' => '',
			'elements' => 'cover==cover||contain==contain||auto==auto||100% auto==100% auto||auto 100%==auto 100%||initial==initial||inherit==inherit||unset==unset',
			'default_text' => 'initial',
		)
	),
);

