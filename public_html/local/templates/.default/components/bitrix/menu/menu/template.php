<? $this->setFrameMode(true);?>
<?if(count($arResult)>0):?>
<nav class="nav <?=$arParams['CLASS']?>"><?=($arParams['FRAME'] ? '<div class="nav__frame">':'')?><?foreach ($arResult as $key=>$item):?><a href="<?=$item['LINK']?>" <?=$item['PARAMS']['MORE']?> class="nav__item <?=($item['SELECTED']?'nav__item--active':'')?>"><?=$item['TEXT']?></a><?endforeach;?>
<?=($arParams['FRAME'] ? '<a href="'.COption::GetOptionString("grain.customsettings", 'catalog').'" class=\'download download--orange\'>'.svg('pdf').'<span>Скачать каталог</span></a></div>':'')?>
<?
if($arParams['SHOW']=="Y"):
	$APPLICATION->ShowViewContent('menu');
endif;
?>
</nav>
<?endif;?>
