<?if(count($arResult['ITEMS'])>0):?>
<div class="contacts">
	<?foreach ($arResult['ITEMS'] as $item):?>
		<div class="contact">
			<span class="contact__title"><?=$item['~NAME']?></span>
			<span class="contact__name"><?=$item['PROPERTIES']['NAME']['~VALUE']?></span>
			<span class="contact__types">
				<span class="contact__phone"><?=$item['PROPERTIES']['PHONE']['~VALUE']?></span>
				<span class="contacts__email">
					<?if(strlen($item['PROPERTIES']['EMAIL']['~VALUE'])>0):?>
					<a href="mailto:<?=$item['PROPERTIES']['EMAIL']['~VALUE']?>"><?=$item['PROPERTIES']['EMAIL']['~VALUE']?></a>
					<?endif;?>
				</span>
			</span>
		</div>
	<?endforeach;?>
</div>
<?endif;?>
<?$this->SetViewTarget('sidebar');?>
	<div id="map" data-coords="<?=COption::GetOptionString("grain.customsettings", 'coords')?>" data-zoom="15" data-map data-lang="<?=(LANGUAGE_ID=='ru'?"ru_RU":"en_US")?>" data-text="<?=COption::GetOptionString("grain.customsettings", 'name_'.LANGUAGE_ID)?>"></div>
<?$this->EndViewTarget();?>
