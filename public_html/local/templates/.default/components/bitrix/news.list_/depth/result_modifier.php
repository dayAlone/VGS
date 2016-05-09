<?foreach ($arResult['ITEMS'] as $key=>&$item):
	if(intval($item['PROPERTIES']['SVG']['VALUE'])>0)
		$item['ICON'] = file_get_contents($_SERVER['DOCUMENT_ROOT'].CFile::GetPath($item['PROPERTIES']['SVG']['VALUE']));
endforeach;?>