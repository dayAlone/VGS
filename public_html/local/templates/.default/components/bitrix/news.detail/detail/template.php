<?
$item = $arResult;
$s = end($arResult['SECTION']['PATH']);
?>
<div class="text">
	<?if($item["DETAIL_PICTURE"]):?>
		<img src="<?=$item["DETAIL_PICTURE"]['SRC']?>" class="text__image text__image--right text__image--medium">
	<?endif;?>
	<?=$item["~DETAIL_TEXT"]?>
	<div itemscope="" itemtype="http://schema.org/ImageGallery" class="news__gallery" data-pswp-uid="1">
		<?foreach ($item["PROPS"]["GALLERY"] as $img):?>
      <figure itemprop="associatedMedia" itemscope="" itemtype="http://schema.org/ImageObject">
      	<a href="<?=$img['value']?>" itemprop="contentUrl" data-size="<?=$img['size']?>" style="background-image:url(<?=$img['small']?>)">
      		<img src="<?=$img['small']?>">
      	</a>
      </figure>
      <?endforeach;?>
  </div>
</div>
