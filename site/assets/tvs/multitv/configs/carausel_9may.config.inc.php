<?php
$settings['display'] = 'vertical';
$settings['fields'] = array(
    'image' => array(
        'caption' => 'Изображение<br>Будет приведёно к размеру 1200х372',
        'type' => 'image'
    ),
    'thumb' => array(
        'caption' => 'Thumbnail',
        'type' => 'thumb',
        'thumbof' => 'image'
    )
);
$settings['templates'] = array(
    'outerTpl' => '<div class="row carausel"><div class="slick-slider home">[+wrapper+]</div></div>',
    'rowTpl' => '<div class="slick-slider-item"><img src="[[thumb? &input=`[+image+]` &options=`w=1200,h=372,zc=C`]]" alt="[(mini_name_org)]"></div>'
);
$settings['configuration'] = array(
    'enablePaste' => false,
    'csvseparator' => ';'
);