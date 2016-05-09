<?
	use Bitrix\Main\Localization\Loc;
	use Bitrix\Sale\Location;
	Loc::loadMessages(__FILE__);
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
			$arResult['SECTIONS'][$item['IBLOCK_SECTION_ID']] = array('ELEMENTS' => array(), 'COUNTER'=>0);
		$tooltip = Loc::getMessage($item['PROPERTIES']['EPSCM']['VALUE']);
		if(strlen($tooltip) > 0)
			$arResult['SECTIONS'][$item['IBLOCK_SECTION_ID']]['COUNTER']++;
		$arResult['SECTIONS'][$item['IBLOCK_SECTION_ID']]['ELEMENTS'][] = array(
			'NAME'   => $item['NAME'],
			'CODE'   => $item['CODE'],
			'SORT'   => $item['SORT'],
			'client' => $item['PROPERTIES']['CLIENT']['VALUE'],
			'object' => html_entity_decode($item['PROPERTIES']['OBJECT']['VALUE']['TEXT']),
			'region' => $item['PROPERTIES']['REGION']['VALUE'],
			'period' => $item['PROPERTIES']['PERIOD']['VALUE'],
			'works'  => html_entity_decode($item['PROPERTIES']['WORKS']['VALUE']['TEXT']),
			'epscm'  => (strlen($tooltip)>0?'<span data-toggle="tooltip" data-placement="top" title="'.$tooltip.'">'.$item['PROPERTIES']['EPSCM']['VALUE'].'</span>':$item['PROPERTIES']['EPSCM']['VALUE']),
			'coords' => $item['PROPERTIES']['COORDS']['VALUE'],
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