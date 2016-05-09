<?
	if($arParams['noSections'] == "Y"):

		$arSections = array();
		foreach ($arResult['ITEMS'] as $key => &$item)
			if(isset($item['IBLOCK_SECTION_ID']))
				if(!in_array($item['IBLOCK_SECTION_ID'], array_keys($arSections)))
					$arSections[$item['IBLOCK_SECTION_ID']] = $key;
				else
					unset($arResult['ITEMS'][$key]);
		
		$arFilter = array('IBLOCK_ID' => $arResult['ID'], 'ID' => array_keys($arSections));
   		$rsSect = CIBlockSection::GetList(array('left_margin' => 'asc'), $arFilter, false, array('ID', 'NAME', 'SECTION_PAGE_URL', 'SORT', 'PICTURE'));
   		$rsSect->SetUrlTemplates(str_replace('ELEMENT_CODE', 'SECTION_CODE', $arParams['DETAIL_URL']));
   		while ($arSect = $rsSect->GetNext()) {
   			$arResult['SECTIONS'][$arSect['ID']] = $arSect;
			$key  = $arSections[$arSect['ID']];
			$item = &$arResult['ITEMS'][$key];
			$item['DETAIL_PAGE_URL'] = $arSect['DETAIL_PAGE_URL'];
			$item['NAME'] = $arSect['NAME'];
			if($arSect['PICTURE'])
				$item['PREVIEW_PICTURE']['SRC'] = CFile::GetPath($arSect['PICTURE']);
   		}
	   	if(!function_exists('sections_sort')):
			function projects_sort($a, $b)
			{
				return ($a['SORT'] <= $b['SORT']) ? -1 : 1;
			}
		endif;
		uasort($arResult['ITEMS'], "projects_sort");
	endif;
?>