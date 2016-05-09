<? $this->setFrameMode(true);?>
<div class="partners">
<?foreach ($arResult['ITEMS'] as $item):?>
	<div class="partners__item"><img src="<?=$item['PREVIEW_PICTURE']['SRC']?>" class="partners__image">
	</div>
<?endforeach;?>
</div>
