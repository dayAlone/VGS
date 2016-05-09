<? $this->setFrameMode(true);
use Bitrix\Main\Localization\Loc;
use Bitrix\Sale\Location;
Loc::loadMessages(__FILE__);
?>
<?if(count($arResult['ITEMS'])>0):?>
<div data-width="100%" data-nav="false" data-loop="true" data-autoplay="6000" data-transition="crossfade" data-click="false" data-keyboard="true" class="slider">
<?foreach ($arResult['ITEMS'] as $key=>$item):?>
	<div style="background-image: url(<?=$item['PREVIEW_PICTURE']['SRC']?>)" class="slider__item">
	    <div class="container right">
	      <div class="slider__section">
	      	<?=$arResult['INDUSTRIES'][$item['PROPERTIES']['INDUSTRY']['VALUE']]['SVG']?><?=$arResult['INDUSTRIES'][$item['PROPERTIES']['INDUSTRY']['VALUE']]['NAME']?>
	      </div>
	      <div class="page__divider page__divider--small float-none"></div><br>
	      <h1><?=html_entity_decode($item['NAME'])?></h1><br>
	      <a href="<?=$item['PROPERTIES']['LINK']['VALUE']?>" <?=($item['PROPERTIES']['TARGET']['VALUE_XML_ID']=="Y"?'target="_black"':'')?> class="button"><?=Loc::getMessage('MORE')?></a>
	    </div>
	</div>
<?endforeach;?>
<?=($arParams["DISPLAY_BOTTOM_PAGER"]=="Y" ? $arResult["NAV_STRING"]:"")?>
</div>
<?endif;?>