<? $this->setFrameMode(true);
use Bitrix\Main\Localization\Loc;
use Bitrix\Sale\Location;
Loc::loadMessages(__FILE__);
?>
<?foreach ($arResult['ITEMS'] as $key=>$item):?>
<div class="news">
<?if(isset($item['ACTIVE_FROM'])):?>
  	<div class="news__date"><?=$item['ACTIVE_FROM']?></div>
<?endif;?>
  <a href="<?=$item['DETAIL_PAGE_URL']?>" <?=$item['TARGET']?> class="news__title"><?=$item['NAME']?></a>

  <?if($arParams['SHOW_DESCRIPTION']=="Y"):?>
  <div class="news__description">
	<?=$item['PREVIEW_TEXT']?>
  </div>
  <?endif;?>
</div>
<?endforeach;?>
<?if($arParams['SHOW_YEARS']=="Y"):
	$this->SetViewTarget('menu');
		$APPLICATION->IncludeComponent("bitrix:catalog.section.list", "years", array(
		    "IBLOCK_TYPE"  => "content",
		    "IBLOCK_ID"    => $arParams["IBLOCK_ID"],
		    "TOP_DEPTH"    => "2",
		    "CACHE_TYPE"   => "A",
		    "CACHE_TIME"   => "36000",
		    "CACHE_NOTES"  => $arParams["PARENT_SECTION"],
		),
		false
		);
	$this->EndViewTarget();
endif;?>
<?if($arParams['SHOW_VACANCY']=="Y"):
	$this->SetViewTarget('title');
	?><a data-toggle="modal" data-target="#vacancyDetail" href="#vacancyDetail" class="button"><?=Loc::getMessage('RESUME')?></a><?
	$this->EndViewTarget();
endif;?>
<?=($arParams["DISPLAY_BOTTOM_PAGER"]=="Y" ? $arResult["NAV_STRING"]:"")?>