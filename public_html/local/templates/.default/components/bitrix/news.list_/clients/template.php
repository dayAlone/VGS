<? $this->setFrameMode(true);?>
<?foreach ($arResult['SECTIONS'] as $key=>$section):?>
	<?/*<h3><?=$section['NAME']?></h3>*/?>
	<?foreach ($section['ELEMENTS'] as $item):
		if(strlen($item['LINK'])>0):
			?><a href="<?=$item['LINK']?>" class="client"><img src="<?=$item['IMAGE']?>"></a><?
		else:
			?><span class="client"><img src="<?=$item['IMAGE']?>"></span><?
		endif;
	endforeach;?>
<?endforeach;?>
