<?
    function buttons_sort($a, $b)
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
    $arFilter = Array('IBLOCK_ID'=>$arResult['ID']);
    $db_list = CIBlockSection::GetList(Array('SORT' => 'ASC'), $arFilter, true);
    while($item = $db_list->Fetch()) {
        $item['DETAIL_PAGE_URL'] = str_replace(array('#SITE_DIR#', '#ELEMENT_CODE#'), array('', $item['CODE']), $arResult['DETAIL_PAGE_URL']);
        $arResult['ITEMS'][] = $item;

    }
    foreach ($arResult['ITEMS'] as $key => $item) {
        if (intval($item['IBLOCK_SECTION_ID']) > 0) {
            unset($arResult['ITEMS'][$key]);
        }
    }
    usort($arResult['ITEMS'], "buttons_sort");
?>
