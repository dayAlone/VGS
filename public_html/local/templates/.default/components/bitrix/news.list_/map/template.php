<? $this->setFrameMode(true);?>

<div class="geography">
      <div class="geography__popup">
        <div class="geography__popup_toolbar">
        	<a href="#" class="geography__popup_close"><?=svg('close')?> <?=(LANGUAGE_ID=='ru'?"Закрыть":"Close")?></a></div>
        <div class="geography__popup_content">
          
        </div>
      </div>
      <div id="map" data-lang="<?=(LANGUAGE_ID == "ru"?"ru-RU":"en-US")?>"></div>
      <?	
      	$data = array();
      	foreach ($arResult['ITEMS'] as $key=>$item):
      		$data[] = array('id'=>$item['ID'], 'name'=>$item['NAME'], 'coords'=>$item['PROPERTIES']['COORDS']['VALUE'], 'url'=>$item['DETAIL_PAGE_URL']);
    		endforeach;
        $json = json_encode($data, JSON_UNESCAPED_UNICODE);
	     ?>

      <script>mapItems = <?=(strlen($json)>0?$json:"")?></script>
</div>