<? $this->setFrameMode(true);?>
<?if(count($arResult['ITEMS'])>0):?>
<div class="hidden"><div class="arrow__prev"><?=svg('prev')?></div><div class="arrow__next"><?=svg('next')?></div></div>
<div data-nav="false" data-width="100%" data-autoplay="true" class="success-story">
<?foreach ($arResult['ITEMS'] as $key=>$item):?>
	<div style="background-image: url(<?=$item['PREVIEW_PICTURE']['SRC']?>)" class="success-story__item">
        <div class="success-story__content">
          <div class="success-story__text"><?=$item['PREVIEW_TEXT']?></div>
          <div class="success-story__about"><?=html_entity_decode($item['PROPERTIES']['ABOUT']['VALUE']['TEXT'])?></div>
        </div>
     </div>
<?endforeach;?>
</div>
<?endif;?>