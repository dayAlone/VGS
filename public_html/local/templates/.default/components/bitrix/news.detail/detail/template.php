<?
$item = $arResult;
$s = end($arResult['SECTION']['PATH']);
?>
<div class="text">
	<?if($item["DETAIL_PICTURE"]):?>
		<img src="<?=$item["DETAIL_PICTURE"]['SRC']?>" class="text__image text__image--right text__image--medium">
	<?endif;?>
	<?=$item["~DETAIL_TEXT"]?>
	<div class="news__gallery gallery" data-pictures='<?=json_encode($item['PROPERTIES']['IMAGES']['VALUE'])?>'>
		<?foreach ($item["PROPS"]["GALLERY"] as $img):?>
      <a href="<?=$img['value']?>" itemprop="contentUrl" data-size="<?=$img['size']?>" style="background-image:url(<?=$img['small']?>)" class="gallery__item"></a>
    <?endforeach;?>
  </div>
</div>
<?
$s = end($arResult['SECTION']['PATH']);
$this->SetViewTarget('toolbar');?>
	<a href="/services/<?=strlen($s['CODE']) > 0 ? $s['CODE'].'/' : ''?>" class="back toolbar__dropdown visible-lg">
		<?=svg('back')?><span>Назад в раздел</span>
	</a>
<?$this->EndViewTarget();?>
