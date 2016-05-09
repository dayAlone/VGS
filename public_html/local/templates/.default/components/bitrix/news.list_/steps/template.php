<? $this->setFrameMode(true);?>
<div class="steps">
<?
$i=0;
foreach ($arResult['SECTIONS'] as $section):
	$i++;
	?>
	<div class="steps__section">
		<a href="#" class="steps__title">
			<span class="steps__title-icon"><?=$section['ICON']?></span>
			<span><?=$i?>. <?=$section['NAME']?></span>
			<span class="steps__title-arrow"><?=svg('steps-arrow')?></span>
		</a>
		<div class="steps__content">
			<?foreach ($section['ELEMENTS'] as $key=>$item):?>
			<div class="steps__sub-content">
				<a href="#" class="steps__sub-title"><?=svg('next')?> <?=$i?>.<?=($key+1)?> <?=$item['NAME']?></a>
				<div class="steps__text">
					<?=$item['TEXT']?>
				</div>
			</div>
			<?endforeach;?>
		</div>
	</div>
<?endforeach;?>
  
</div>