<?
	$arSections = array();
	foreach ($arResult['ITEMS'] as $key => &$item)
		if(isset($item['IBLOCK_SECTION_ID']))
			if(!in_array($item['IBLOCK_SECTION_ID'], $arSections))
				$arSections[] = $item['IBLOCK_SECTION_ID'];
	$arFilter = array('IBLOCK_ID' => $arResult['ID'], 'ID' => $arSections);
	$rsSect   = CIBlockSection::GetList(array('left_margin' => 'asc'), $arFilter, false, array('ID', 'NAME', 'SECTION_PAGE_URL', 'SORT', 'PICTURE', 'DETAIL_PICTURE', 'UF_TITLE', 'UF_DATE', 'UF_CLIENT'));
	$rsSect->SetUrlTemplates(str_replace('ELEMENT_CODE', 'SECTION_CODE', $arParams['DETAIL_URL']));
	unset($arResult['SECTION']['PATH']);
	while ($arSect = $rsSect->GetNext())
		$arResult['SECTION']['PATH'] = $arSect;
	
	$item = &$arResult['ITEMS'][0];
	if(strlen($arResult['SECTION']['PATH']['UF_DATE']) > 0)
		$item['PROPERTIES']['TIME']['VALUE']['TEXT'] = html_entity_decode($arResult['SECTION']['PATH']['UF_DATE']);

	if(strlen($arResult['SECTION']['PATH']['UF_CLIENT']) > 0)
		$item['PROPERTIES']['CUSTOMER']['VALUE']['TEXT'] = html_entity_decode($arResult['SECTION']['PATH']['UF_CLIENT']);

?>