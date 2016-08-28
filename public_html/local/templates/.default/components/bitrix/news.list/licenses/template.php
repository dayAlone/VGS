<? $this->setFrameMode(true);?>
<?if(count($arResult['ITEMS'])>0):?>
<div class="licenses">
<?foreach ($arResult['ITEMS'] as $key=>$item):
	//var_dump($item);
	?>
	<div class="licenses__section">
		<a class="licenses__title">
			<?=$item['NAME']?>
			<?=svg('down')?>
		</a>
		<div class="licenses__items">
			<div class="licenses__description text">
				<?=$item['DESCRIPTION']?>
			</div>
			<?foreach ($item['ITEMS'] as $key=>$s):?>
				<a href="#" class="licenses__item" data-pictures='<?=json_encode($s['PROPERTIES']['IMAGES']['VALUE'])?>'>
					<div style="background-image: url(<?=$s['PROPERTIES']['IMAGES']['VALUE'][0]['small']?>)" class="licenses__image"></div>
					<div class="licenses__name"><?=$s['NAME']?></div>
				</a>
			<?endforeach;?>
		</div>
	</div>
<?endforeach;?>
</div>
<?endif;?>
