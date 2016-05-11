<?
$item = $arResult;
$s = end($arResult['SECTION']['PATH']);
?>
<div class="text news__item">
	<div class="news__date">25.03.2016</div>
	<div class="news__title news__title--big"><?=$item['NAME']?></div>
	<div class="text__divider"></div>
	<?if($item["DETAIL_PICTURE"]):?>
		<img src="<?=$item["DETAIL_PICTURE"]['SRC']?>" class="text__image text__image--right text__image--medium">
	<?endif;?>
	<?=$item["~DETAIL_TEXT"]?>
	<div class="news__gallery gallery gallery--show-all" data-pictures='<?=json_encode($item["PROPS"]["GALLERY"])?>'>
		<?foreach ($item["PROPS"]["GALLERY"] as $img):?>
      <a href="<?=$img['value']?>" itemprop="contentUrl" data-size="<?=$img['size']?>" style="background-image:url(<?=$img['small']?>)" class="gallery__item"></a>
    <?endforeach;?>
  </div>
	<div class="text__divider no-margin-top"></div>
	<a href="/press/<?=$s['CODE']?>/" class="news__back">
		<?=svg('back')?><span>назад к списку новостей</span>
	</a>
</div>
