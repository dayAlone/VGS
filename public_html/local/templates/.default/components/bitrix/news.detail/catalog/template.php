<?
$item = $arResult;
$s = end($arResult['SECTION']['PATH']);
?>
<div class="text">
	<?if($item["DETAIL_PICTURE"]):?>
		<img src="<?=$item["DETAIL_PICTURE"]['SRC']?>" class="text__image text__image--right text__image--medium">
	<?endif;?>
	<?=$item["~DETAIL_TEXT"]?>
</div>
