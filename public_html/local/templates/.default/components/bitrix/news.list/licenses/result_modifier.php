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

foreach ($arResult['ITEMS'] as &$item):
	if (!$sections[$item['IBLOCK_SECTION_ID']]) {
		$res = CIBlockSection::GetByID($item['IBLOCK_SECTION_ID']);
		$ar_res = $res->Fetch();
		$sections[$item['IBLOCK_SECTION_ID']] = array_merge($ar_res, array('ITEMS' => array()));
	}
	$sections[$item['IBLOCK_SECTION_ID']]['ITEMS'][] = $item;
endforeach;

$arResult['ITEMS'] = $sections;
?>
