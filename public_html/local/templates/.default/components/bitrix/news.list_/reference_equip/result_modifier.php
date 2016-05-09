<?
	$arResult['SECTIONS'] = array();
	function reference_sort($a, $b)
    {
        if($a['SORT']=='' && $b['SORT']>0) 
            return 1;
        if($b['SORT']=='' && $a['SORT']>0) 
            return -1;
        if($a['SORT']=='' && $b['SORT']=='')
            return ($a['value'] < $b['value']) ? -1 : 1;
        if ($a['SORT'] == $b['SORT'])
            return 0;
        return ($a['SORT'] < $b['SORT']) ? -1 : 1;
    }	
	foreach ($arResult['ITEMS'] as $key=>$item):
		if(!isset($arResult['SECTIONS'][$item['IBLOCK_SECTION_ID']]))
			$arResult['SECTIONS'][$item['IBLOCK_SECTION_ID']] = array('ELEMENTS' => array());

		$arResult['SECTIONS'][$item['IBLOCK_SECTION_ID']]['ELEMENTS'][] = array(
			'name'   => str_replace( "<br>", "<div class=\"page__divider xs-margin-top xs-margin-bottom\"></div>", html_entity_decode($item['PROPERTIES']['NAME']['VALUE']['TEXT'])),
			'CODE'   => $item['CODE'],
			'SORT'   => $item['SORT'],
			'object' => str_replace( "<br>", "<div class=\"page__divider xs-margin-top xs-margin-bottom\"></div>", html_entity_decode($item['PROPERTIES']['OBJECT']['VALUE']['TEXT'])),
			'period' => html_entity_decode($item['PROPERTIES']['PERIOD']['VALUE']),
			);
	endforeach;
	
	foreach ($arResult['SECTIONS'] as $key=>$item):
		usort($item['ELEMENTS'], "reference_sort");
	endforeach;

	$arFilter = array('IBLOCK_ID' => $arResult['ID'], 'ID'=>array_keys($arResult['SECTIONS']));
   	$rsSect = CIBlockSection::GetList(array('left_margin' => 'asc'),$arFilter);
   	while ($arSect = $rsSect->Fetch()) {
   		$arResult['SECTIONS'][$arSect['ID']]['NAME'] = $arSect['NAME'];
   		$arResult['SECTIONS'][$arSect['ID']]['CODE'] = $arSect['CODE'];
   		$arResult['SECTIONS'][$arSect['ID']]['SORT'] = $arSect['SORT'];
   	}

   	usort($arResult['SECTIONS'], "reference_sort");
?>