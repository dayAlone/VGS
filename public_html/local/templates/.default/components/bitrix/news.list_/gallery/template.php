<? $this->setFrameMode(true);?>
<?if(count($arResult['ITEMS'])>0):?>
<div class="projects gallery">
<?foreach ($arResult['ITEMS'] as $key=>$item):
	$img = $item['PREVIEW_PICTURE'];
	?><figure itemprop="associatedMedia" itemscope="" itemtype="http://schema.org/ImageObject"><a href="<?=$img['SRC']?>" class="project" itemprop="contentUrl" data-size="<?=$img['WIDTH']."x".$img['HEIGHT']?>" style="background-image:url(<?=$img['SMALL']?>)">
    		<img src="<?=$img['SRC']?>">
    		<span><?=str_replace("#", "", $item['NAME'])?></span>
    	</a><figcaption itemprop="caption description hidden"><?=str_replace("#", "", $item['NAME'])?></figcaption></figure><?
    endforeach;?>
</div>
<?endif;?>