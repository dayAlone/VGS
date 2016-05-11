<? $this->setFrameMode(true);?>
<?if(count($arResult['ITEMS'])>0):?>
<div class="equipments">

<?foreach ($arResult['ITEMS'] as $key=>$item):?>
	<a href="<?=$item['DETAIL_PAGE_URL']?>" class="equipments__item">
		<div style="background-image:url(<?=$item['PREVIEW_PICTURE']['SRC']?>)" class="equipments__photo"></div>
		<div class="equipments__name"><?=$item['NAME']?></div>
	</a>
<?endforeach;?>
</div>
<? else:?>
<div class='text'>
	<p>В этом разделе еще ничего нет.</p>
</div>
<?endif;?>

<?=$arResult["NAV_STRING"]?>
