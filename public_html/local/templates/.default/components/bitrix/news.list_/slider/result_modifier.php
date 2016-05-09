<?
$arIndustries = array();
foreach ($arResult['ITEMS'] as $key=>&$item)
	if(intval($item['PROPERTIES']['INDUSTRY']['VALUE'])>0)
		$arIndustries[] = $item['PROPERTIES']['INDUSTRY']['VALUE'];

$arFilter = Array("ID" => $arIndustries);
$res = CIBlockElement::GetList(Array("SORT"=>"ASC", "PROPERTY_PRIORITY"=>"ASC"), $arFilter, Array("ID", "NAME", "PROPERTY_SVG"));

$arResult['INDUSTRIES'] = array();

while ($element = $res->GetNext())
	$arResult['INDUSTRIES'][$element['ID']] = array('NAME'=>$element['NAME'], 'SVG' => file_get_contents($_SERVER['DOCUMENT_ROOT'].CFile::GetPath($element['PROPERTY_SVG_VALUE'])))

?>