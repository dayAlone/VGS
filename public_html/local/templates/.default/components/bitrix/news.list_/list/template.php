<? $this->setFrameMode(true);?>
<?if(count($arResult['ITEMS'])>0):?>
<?foreach ($arResult['ITEMS'] as $key=>$item):?><a href="<?=$item['DETAIL_PAGE_URL']?>" class="with-icon"><?=$item['ICON']?><span><?=$item['NAME']?></span></a>	<br><?endforeach;?>
<?endif;?>