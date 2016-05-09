<?
$item = $arResult;
?>
<div class="scroll">
  <h4><span><?=($arProps['LANG']=='ru'?"Клиент":"Client")?></span></h4>
  <h2><?=html_entity_decode($item['PROPERTIES']['CLIENT']['VALUE'])?></h2>

<?
if($arProps['LANG']=='ru'):
  $data = array(
    'Объект'    => $item['PROPERTIES']['OBJECT']['VALUE']['TEXT'],
    'Регион'    => $item['PROPERTIES']['REGION']['VALUE'],
    'Период'    => $item['PROPERTIES']['PERIOD']['VALUE'],
    'Вид работ' => $item['PROPERTIES']['WORKS']['VALUE']['TEXT'],
  );
else:
  $data = array(
    'Object'    => $item['PROPERTIES']['OBJECT']['VALUE']['TEXT'],
    'Region'    => $item['PROPERTIES']['REGION']['VALUE'],
    'Period'    => $item['PROPERTIES']['PERIOD']['VALUE'],
    'Description' => $item['PROPERTIES']['WORKS']['VALUE']['TEXT'],
  );
endif;
foreach ($data as $key=>$el):
  if(strlen($el)>0):
  ?>
  <h4><span><?=$key?></span></h4>
  <p><?=html_entity_decode($el)?></p>
  <?
  endif;
endforeach;?>

</div>