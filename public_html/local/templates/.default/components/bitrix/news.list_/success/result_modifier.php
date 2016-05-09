<?
foreach ($arResult['ITEMS'] as $key=>&$item):
	$small = CFile::ResizeImageGet(CFile::GetFileArray($item['PREVIEW_PICTURE']['ID']), Array("width" => 1000, "height" => 1000), BX_RESIZE_IMAGE_PROPORTIONAL, false, Array("name" => "sharpen", "precision" => 15), false, 75);
	$item['PREVIEW_PICTURE']['SRC'] = $small['src'];
endforeach;
?>