<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
if(count($arResult['ITEMS']) > 1):?>
	<div class="buttons <?=$arParams['CLASS']?>">
		<?foreach ($arResult['ITEMS'] as $key => &$item):?>
    <a href="<?=$item['DETAIL_PAGE_URL']?>" class="buttons__item"><span class="buttons__text"><?=html_entity_decode($item['NAME'])?></span></a>
  	<?endforeach;?>
  </div>
<?endif;?>
