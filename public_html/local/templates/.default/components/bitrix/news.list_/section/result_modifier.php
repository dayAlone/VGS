<?
	$arResult['SECTIONS'] = array();
	foreach ($arResult['ITEMS'] as $key=>$item):
		if(!isset($arResult['SECTIONS'][$item['IBLOCK_SECTION_ID']]))
			$arResult['SECTIONS'][$item['IBLOCK_SECTION_ID']] = array('ELEMENTS' => array());
		$arResult['SECTIONS'][$item['IBLOCK_SECTION_ID']]['ELEMENTS'][] = array('NAME'=>$item['NAME'],'ID'=>$item['ID'], 'DETAIL_PAGE_URL'=>$item['DETAIL_PAGE_URL']);
	endforeach;
	
	 $arFilter = array('IBLOCK_ID' => $arResult['ID'], 'ID'=>array_keys($arResult['SECTIONS']));
   	$rsSect = CIBlockSection::GetList(array('left_margin' => 'asc'), $arFilter, false, array('ID', 'NAME', 'CODE', 'SORT', 'UF_SVG'));
   	
   	while ($arSect = $rsSect->Fetch()) {
   		$arResult['SECTIONS'][$arSect['ID']]['NAME'] = $arSect['NAME'];
   		$arResult['SECTIONS'][$arSect['ID']]['CODE'] = $arSect['CODE'];
   		$arResult['SECTIONS'][$arSect['ID']]['SORT'] = $arSect['SORT'];
   		$arResult['SECTIONS'][$arSect['ID']]['ICON'] = file_get_contents($_SERVER['DOCUMENT_ROOT'].CFile::GetPath($arSect['UF_SVG']));
   	}
    if(!function_exists('sections_sort')):
     	function sections_sort($a, $b)
      {
          return ($a['SORT'] <= $b['SORT']) ? -1 : 1;
      }
    endif;
    uasort($arResult['SECTIONS'], "sections_sort");
?>