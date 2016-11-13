<?
$this->setFrameMode(true);
use Bitrix\Main\Localization\Loc;
use Bitrix\Sale\Location;
Loc::loadMessages(__FILE__);
$s = end($arResult['SECTION']['PATH']);
?>
<?if(strlen($s['DESCRIPTION']) > 0):?>
<p>
	<?=$s['~DESCRIPTION']?>
</p>
<br/>
<?endif;?>

<?if(count($arResult['ITEMS'])>0):?>
<div class="equipments">

<?foreach ($arResult['ITEMS'] as $key=>$item):?>
	<a href="<?=$item['DETAIL_PAGE_URL']?>" class="equipments__item">
		<div style="background-image:url(<?=$item['PREVIEW_PICTURE']['SRC']?>)" class="equipments__photo"></div>
		<div class="equipments__name"><?=$item['NAME']?></div>
	</a>
	<?
	if ($item['PROPERTIES']['DIVIDER']['VALUE_XML_ID']):?>
		<div class="equipments__divider"></div>
	<?endif;
endforeach;?>
</div>
<? else:?>
<div class='text'>
	<p>В этом разделе еще ничего нет.</p>
</div>
<?endif;?>

<?=$arResult["NAV_STRING"]?>

<?
$this->SetViewTarget('toolbar');?>
	<a href="/catalog/" class="back toolbar__dropdown visible-lg">
		<?=svg('back')?><span><?=Loc::getMessage('BACK')?></span>
	</a>
<?$this->EndViewTarget();?>
