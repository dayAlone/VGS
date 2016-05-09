<? $this->setFrameMode(true);?>
<?if(count($arResult['ITEMS'])>0):?>
<div class="licenses">
<?foreach ($arResult['ITEMS'] as $key=>$item):?>
	<a href="#" class="licenses__item" data-pictures='<?=json_encode($item['PROPERTIES']['IMAGES']['VALUE'])?>'>
		<div style="background-image: url(<?=$item['PROPERTIES']['IMAGES']['VALUE'][0]['small']?>)" class="licenses__image"></div>
		<div class="licenses__title"><?=$item['NAME']?></div>
	</a>
<?endforeach;?>
</div>
<?endif;?>
