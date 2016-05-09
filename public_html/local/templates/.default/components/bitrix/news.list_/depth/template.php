<? $this->setFrameMode(true);?>
<?if(count($arResult['ITEMS'])>0):?>
<div class="row xxl-margin-top-sm <?=($arParams['SMALL']=="Y"?"":"row--center s-padding-top")?> center m-padding-bottom no-gutter">
<?foreach ($arResult['ITEMS'] as $key=>$item):
	?><div class="col-xs-6 <?=($arParams['SMALL']=="Y"?"col-sm-3":"col-sm-4")?> col-md-2"><a href="<?=$item['DETAIL_PAGE_URL']?>" class="depth <?=($arParams['SMALL']=="Y"?"depth--small":"")?>"><?=$item['ICON']?><br><?=$item['NAME']?></a></div><?
endforeach;?>
<?=($arParams["DISPLAY_BOTTOM_PAGER"]=="Y" ? $arResult["NAV_STRING"]:"")?>
</div>
<?endif;?>