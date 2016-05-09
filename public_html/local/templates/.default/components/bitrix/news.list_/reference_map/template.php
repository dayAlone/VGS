<? $this->setFrameMode(true);?>
<?	
	$data = array();
	foreach ($arResult['ITEMS'] as $item):
		if(strlen($item['PROPERTIES']['COORDS']['VALUE']) > 0)
			$data[] = array('id'=>$item['ID'], 'name'=>$item['PROPERTIES']['OBJECT']['VALUE']['TEXT'], 'coords'=>$item['PROPERTIES']['COORDS']['VALUE'], 'url'=>$item['DETAIL_PAGE_URL'].$key."/");
	endforeach;
	$json = json_encode($data, JSON_UNESCAPED_UNICODE);
?>
<script>mapRefItems = <?=(strlen($json)>0?$json:"")?></script>