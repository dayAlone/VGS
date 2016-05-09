<? $this->setFrameMode(true);
	$pos = array(
		0 => "structure__link--top structure__link--left structure__link--strong",
		1 => "structure__link--top structure__link--right",
		2 => "structure__link--middle structure__link--left",
		3 => "structure__link--middle structure__link--right",
		4 => "structure__link--bottom",
	);
?>
<div class="hidden-xs hidden-sm">
  <div class="structure">
        <div class="structure__intro">
          <h2>Группа компаний «Гипрогазоочистка» </h2>
          <p>— это многопрофильный холдинг,<br>который объединяет<br>в своей структуре<br>5 компаний:</p><span>Для получения информации<br>нажмите на название компании<br>на схеме</span>
        </div>
      <?foreach ($arResult['ITEMS'] as $key=>$item):?>
       	<a href="#about-<?=$key?>" class="structure__link <?=$pos[$key]?>"><?=$item['NAME']?></a>
  	<?endforeach;?>
      <?foreach ($arResult['ITEMS'] as $key=>$item):?>
       	<div id="about-<?=$key?>" class="structure__content">
          	<h3><?=$item['NAME']?></h3>
          	<p><?=$item['PREVIEW_TEXT']?></p>
        	</div>
  	<?endforeach;?> 
  	<a href="#" class="button">Закрыть</a>
  </div>
  <div class="xxl-margin-bottom xxl-margin-top xxl-padding-top"></div>
</div>
<div class="visible-xs visible-sm">
  <?foreach ($arResult['ITEMS'] as $key=>$item):?>
    <h<?=($key==0?2:3)?>><?=$item['NAME']?></h<?=($key==0?2:3)?>>
    <p><?=$item['PREVIEW_TEXT']?></p>
  <?endforeach;?> 

</div>