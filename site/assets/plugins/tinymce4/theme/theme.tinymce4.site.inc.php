<?php
/*
  * Конфиг-параметры TinyMCE4 для сайта https://потолок72.рф/
  * https://www.tinymce.com/docs/configure/
  *
  * Приведенная ниже настройка конфигурации по умолчанию гарантирует, что все параметры редактора имеют резервное значение, а тип для каждого ключа известен.
  * $this->set($editorParam, $value, $type, $emptyAllowed=false)
  *
  * $editorParam = параметр для установки
  * $value = значение для установки
  * $type = строка, число, логическое значение, json (массив или строка)
  * $emptyAllowed = true, false (разрешает параметр: '' вместо возврата к значениям по умолчанию)
  * Если $editorParam пуст, а $emptyAllowed равен true, $defaultValue будет игнорироваться
  *
  * $this->modxParams содержит массив фактических настроек Modx/user-settings
  * 
  **/

// Используемые плагины
$this->set('plugins', 'autolink lists layer table modxlink image media contextmenu paste visualchars nonbreaking visualblocks charmap wordcount code autoresize', 'string');

// Первая строка тулбара
$this->set('toolbar1', 'formatselect | undo redo | cut copy paste pastetext | visualchars | visualblocks | code', 'string');

// Вторая строка тулбара
$this->set('toolbar2', 'bold italic underline strikethrough subscript superscript removeformat | alignleft aligncenter alignright alignjustify | bullist numlist | blockquote', 'string');

// Третья строка тулбара emoticons
$this->set('toolbar3', 'image media | link unlink | table | charmap', 'string');

// Четвёртая строка тулбара (отключаем)
$this->set('toolbar4', '', 'string');

// Основное меню (отключаем)
$this->set('menubar', false, 'bool');


// Выставляем свой формат выравнивания текста
$this->set('formats', '{
			alignleft: {
				selector: "p,h1,h2,h3,h4,h5,h6,table,td,th,div,ul,ol,li,dl,dt,dd",
				classes: "text-left"
			},
			aligncenter: {
				selector: "p,h1,h2,h3,h4,h5,h6,table,td,th,div,ul,ol,li,dl,dt,dd",
				classes: "text-center"
			},
			alignright: {
				selector: "p,h1,h2,h3,h4,h5,h6,table,td,th,div,ul,ol,li,dl,dt,dd",
				classes: "text-right"
			},
			alignjustify: {
				selector: "p,h1,h2,h3,h4,h5,h6,table,td,th,div,ul,ol,li,dl,dt,dd",
				classes: "text-justify"
			},
			bold: {
				inline : "strong"
			},
			italic: {
				inline : "em"
			},
			underline: {
				inline : "u"
			},
			strikethrough: {
				inline : "del"
			}
		}', 'json');

// Классы для таблицы
$this->set('table_class_list', '[
		{title: "None", value: "table"},
		{title: "Table Hover", value: "table-hover"},
		{title: "Table Bordered", value: "table-bordered"},
		{title: "Table Bordered Hover", value: "table-bordered-hover"},
		{title: "Table Bordered Striped", value: "table-bordered-striped"},
		{title: "Table Bordered Striped Hover", value: "table-bordered-striped-hover"},
		{title: "Table Striped", value: "table-striped"},
		{title: "Table Striped Hover", value: "table-striped-hover"}
	]', 'json');

// Удаляем все ненужные стили в таблице и изображениях
$this->set('invalid_styles', '{ 
		"table": "width height border border-width border-style border-collapse", 
		"tr" : "width height border border-width border-style border-collapse",
		"th" : "width height border border-width border-style border-collapse",
		"td" : "width height border border-width border-style border-collapse",
		"img" : "width height border border-width border-style float",
		"iframe" : "width height border border-width border-style float"
	}', 'json');
$this->set('table_default_attributes', '{
		"class": "table-bordered"
	}', 'json');
$this->set('table_style_by_css', false, 'bool');
// Бордюр Table
// Убираем дополнительные стили таблицы (бордер, бакграунд, ...)
$this->set('table_advtab', false, 'bool');
$this->set('table_cell_advtab', false, 'bool');
$this->set('table_row_advtab', false, 'bool');
$this->set('table_appearance_options', false, 'bool');
// Ресайзер Table 
$this->set('object_resizing', false, 'bool');
$this->set('table_resize_bars', false, 'bool');
// ???
$this->set('table_header_type', 'thead', 'string');
$this->set('visualblocks_default_state', true, 'bool');
// rel="noopener" disabled
$this->set('allow_unsafe_link_target', true, 'bool');

$this->set('image_dimensions', false, 'bool');
$this->set('image_description', false, 'bool');

// Старт и сохранение
$this->set('setup', 'function(ed) { ed.on("change", function(e) { documentDirty=true; }); }',  'object');
$this->set('save_onsavecallback', 'function () { documentDirty=false; document.getElementById("stay").value = 2; document.mutate.save.click(); }',  'object');

try {
	$hash = "1.0.0";
	$css = $this->themeConfig["content_css"]["value"][0];
	if(is_file(MODX_BASE_PATH . $css)){
		$hash = filemtime(MODX_BASE_PATH . $css);
		$css .= '?hash=hash' . $hash;
		$this->themeConfig["content_css"]["value"][0] = $css;
	}
} catch (Exception $e) {}
