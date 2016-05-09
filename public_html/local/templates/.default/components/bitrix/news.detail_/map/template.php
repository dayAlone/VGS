<?
$item = $arResult;
?>
<div class="scroll">
<? foreach(array('CUSTOMER') as $prop):
  if(strlen($item['PROPERTIES'][$prop]['VALUE']['TEXT'])>0):
  ?>
  <h4><span><?=$item['PROPERTIES'][$prop]['NAME']?></span></h4>
    <h2><?=html_entity_decode($item['PROPERTIES'][$prop]['VALUE']['TEXT'])?></h2>
  <? 
  endif;
endforeach;?>
<h4><span><?=(LANGUAGE_ID=="ru"?"Объект":"Object")?></span></h4>
<p><?=html_entity_decode($item['NAME'])?></p>
<? foreach(array('WORKTYPE', 'TIME') as $prop):
  if(strlen($item['PROPERTIES'][$prop]['VALUE']['TEXT'])>0):
  ?>
  <h4><span><?=$item['PROPERTIES'][$prop]['NAME']?></span></h4>
  <p><?=html_entity_decode($item['PROPERTIES'][$prop]['VALUE']['TEXT'])?></p>
  <? 
  endif;
endforeach;?>
<?if($item['PROPERTIES']['TABLE']['VALUE']):?>
<h4><span><?=(LANGUAGE_ID=="ru"?"Технологии":"Technologies")?></span></h4>
<? foreach($item['PROPERTIES']['TABLE']['VALUE'] as $row):?>
  <?if(strlen($row['t0'])>0):?>
    <p><?=$row['t0']?></p>
  <?endif;?>
<? endforeach;?>
<?endif;?>

<h4><span><?=(LANGUAGE_ID=="ru"?"Особенности проекта":"Description")?></span></h4>
<?=$item["~DETAIL_TEXT"]?>
<?if(strlen($item['PREVIEW_PICTURE']['SRC'])>0):?>
<img src="<?=$item['PREVIEW_PICTURE']['SRC']?>" class="max-width">
<?endif;?>
</div>