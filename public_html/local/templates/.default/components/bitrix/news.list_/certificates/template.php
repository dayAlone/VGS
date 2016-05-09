<? $this->setFrameMode(true);?>
<?if(count($arResult['ITEMS'])>0):?>
<div class="row certs">
<?foreach ($arResult['ITEMS'] as $key=>$item):
	?>
	<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
		<div class="cert">
			<a href="#" style="background-image: url(<?=$item['PROPERTIES']['IMAGES']['VALUE'][0]['small']?>)" class="cert__picture" data-pictures='<?=json_encode($item['PROPERTIES']['IMAGES']['VALUE'])?>'></a>
		  	<div class="cert__title"><?=$item['NAME']?></div>
		</div>
	</div>
<?endforeach;?>
</div>
<?endif;?>