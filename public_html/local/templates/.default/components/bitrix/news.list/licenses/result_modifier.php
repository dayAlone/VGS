<?
$images = array();

foreach ($arResult['ITEMS'] as $key=>&$item)
	foreach ($item['PROPERTIES']['IMAGES']['VALUE'] as $img)
		$images[] = $img;

$raw = CFile::GetList(array(), array('@ID'=>implode($images,',')));
while($img = $raw->Fetch()):
	$small = CFile::ResizeImageGet(CFile::GetFileArray($img['ID']), Array("width" => 400, "height" => 400), BX_RESIZE_IMAGE_PROPORTIONAL, false, Array("name" => "sharpen", "precision" => 15), false, 75);
	$arResult['IMAGES'][$img['ID']] = array('small'=>$small['src'], 'src'=>"/upload/".$img['SUBDIR']."/".$img['FILE_NAME'], 'h'=>$img['HEIGHT'], 'w'=>$img['WIDTH']);
endwhile;
foreach ($arResult['ITEMS'] as &$item)
	foreach ($item['PROPERTIES']['IMAGES']['VALUE'] as &$img)
		$img = array_merge($arResult['IMAGES'][$img], array('title'=>$item['OLD_NAME']));


$sections = array();

$arFilter = array('IBLOCK_ID' => $arResult['ID']);
$rsSections = CIBlockSection::GetList(array('LEFT_MARGIN' => 'ASC'), $arFilter);
while ($arSection = $rsSections->Fetch()) {
	$sections[$arSection['ID']] = $arSection;
}

foreach ($arResult['ITEMS'] as &$item):
	$sections[$item['IBLOCK_SECTION_ID']]['ITEMS'][] = $item;
endforeach;

$arResult['ITEMS'] = $sections;


if (!function_exists('sec_sort')) {
  function years_sort($a, $b)
  {
      return ($a['SORT'] >= $b['SORT']) ? -1 : 1;
  }
}
uasort($arResult['ITEMS'], "sec_sort");

?>
