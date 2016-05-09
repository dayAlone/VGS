<? $this->setFrameMode(true);?>
<?foreach ($arResult['SECTIONS'] as $key=>$section):?>
	<h3 class="page__title page__title--small-icon"><?=$section['ICON']?><?=$section['NAME']?></h3>
	<ul class="sections">
	<?foreach ($section['ELEMENTS'] as $item):?>
		<li><a href="<?=$item["DETAIL_PAGE_URL"]?>" class="sections__itema <?=($item['ID'] == $arParams["CACHE_NOTES"]?"sections__item--active":"")?>"><?=$item['NAME']?></a></li>
	<?endforeach;?>
	</ul>
<?endforeach;?>


  
