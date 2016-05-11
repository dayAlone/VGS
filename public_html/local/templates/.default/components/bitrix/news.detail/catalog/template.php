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
<?$this->SetViewTarget('page_footer');?><div class="content__footer">
	<? foreach ($item["PROPERTIES"]["FILES"]["VALUE"] as $key => $file) {?>
		<a href='<?=CFile::GetPath($file)?>' class='file'>
			<?=svg('file')?>
			<span class='file__name'>
				<span><?=$item["PROPERTIES"]["FILES"]["DESCRIPTION"][$key]?></span>
			</span>
		</a>
	<?}?>
	<? if(count($item["PROPS"]["GALLERY"]) > 0):?>
		<a href="#" class="button button--gallery button--small" data-pictures='<?=json_encode($item["PROPS"]["GALLERY"])?>'>фотогалерея</a>
	<? endif;?>

</div><?$this->EndViewTarget();?>
