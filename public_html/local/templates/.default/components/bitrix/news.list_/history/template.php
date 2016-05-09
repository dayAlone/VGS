<? $this->setFrameMode(true);?>
<div class="hidden"><div class="arrow__prev"><?=svg('prev')?></div><div class="arrow__next"><?=svg('next')?></div></div>
<div class="history">
      <div class="history__slider">
        <?foreach ($arResult['ITEMS'] as $key=>$item):?>
          <div class="history__slider-item"><a href="#history-<?=$key?>"><?=$item['NAME']?></a></div>
        <?endforeach;?>
      </div>
      <div class="history__content">
        <?foreach ($arResult['ITEMS'] as $key=>$item):?>
          <span id="history-<?=$key?>" class="history__content-block <?=($key==0?"history__content-block--active":"")?>">
            <?=$item['PREVIEW_TEXT']?>
          </span>
        <?endforeach;?>
        
      </div>
</div>

