<?
$arResult["PROPS"] = array();
$props = &$arResult["PROPS"];
function images_sort($a, $b)
{
    if($a['sort']=='' && $b['sort']>0) 
        return 1;

    if($b['sort']=='' && $a['sort']>0) 
        return -1;

    if($a['sort']=='' && $b['sort']=='')
        return ($a['value'] < $b['value']) ? -1 : 1;

    if ($a['sort'] == $b['sort'])
        return 0;

    return ($a['sort'] < $b['sort']) ? -1 : 1;
}
foreach ($arResult["PROPERTIES"] as $key => $prop):
    switch ($prop['CODE']):
        case "GALLERY":
            $gallery     = array();
            $description = $prop['DESCRIPTION'];
            if(is_array($prop['VALUE'])):
                foreach ($prop['VALUE'] as $key => $value):
                      $file = CFile::GetByID($value)->Fetch();
                      $small = CFile::ResizeImageGet($value, Array("width" => 312, "height" => 312), BX_RESIZE_IMAGE_PROPORTIONAL, false, false, false, 100);
                      $big = CFile::ResizeImageGet($value, Array("width" => 800, "height" => 700), BX_RESIZE_IMAGE_PROPORTIONAL, false, false, false, 100);
                      $gallery[] = array('sort'=>$description[$key], 'value'=> $big['src'], 'small'=> $small['src'], 'size'=>$file['WIDTH']."x".$file['HEIGHT']);
                endforeach;
                usort($gallery, "images_sort");
                $props[$prop["CODE"]] = $gallery;
            endif;
        break;  
        default:
            if(strlen($prop["VALUE"])>0)
                $props[$prop["CODE"]] = $prop["VALUE"];
        break;
    endswitch;
endforeach;
if(in_array($arResult['CODE'], array("postavka-oborudovaniya", "equipment-supply"))):
    ob_start();

    $APPLICATION->IncludeComponent("bitrix:news.list", "reference_equip", 
        array(
          "IBLOCK_ID"      => (LANGUAGE_ID=='ru'?31:34),
          "NEWS_COUNT"     => "100",
          "SORT_BY1"       => "SORT",
          "SORT_ORDER1"    => "ASC",
          "CACHE_TYPE"     => "A",
          "SET_TITLE"      => "N",
          "PROPERTY_CODE"  => array('SVG')
        ),
        false
    );
        $data = ob_get_contents();
    ob_end_clean();
    $arResult['~DETAIL_TEXT'] = str_replace('#REFERENCE#', $data, $arResult['~DETAIL_TEXT']);
endif;
?>