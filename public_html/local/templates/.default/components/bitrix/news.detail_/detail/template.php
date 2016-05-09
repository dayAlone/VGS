<?
$item = $arResult;
$s = end($arResult['SECTION']['PATH']);
?>
<div class="news">
	<span class="news__date"><?=r_date($item['ACTIVE_FROM'])?></span><h1 class="news__title no-margin-top"><?=$item['NAME']?></h1>
	<div class="news__description">
		<?if($item["DETAIL_PICTURE"]):?>
			<img src="<?=$item["DETAIL_PICTURE"]['SRC']?>" class="pull-right news-item__image">
		<?endif;?>
		<?=$item["~DETAIL_TEXT"]?>
	</div>
	<div itemscope="" itemtype="http://schema.org/ImageGallery" class="news__gallery" data-pswp-uid="1">
		<?foreach ($item["PROPS"]["GALLERY"] as $img):

		?>
        <figure itemprop="associatedMedia" itemscope="" itemtype="http://schema.org/ImageObject">
        	<a href="<?=$img['value']?>" itemprop="contentUrl" data-size="<?=$img['size']?>" style="background-image:url(<?=$img['small']?>)">
        		<img src="<?=$img['small']?>">
        	</a>
        </figure>
        <?endforeach;?>
    </div>
	
</div>
<?if(LANGUAGE_ID=='ru'):?>
<a href="/press/news/" class="back"><?=svg('back')?> К списку новостей</a>
<?else:?>
<a href="/en/press/news/" class="back"><?=svg('back')?> Back to news list</a>
<?endif;?>