<?
  global $APPLICATION;
  $s = end($arResult['SECTION']['PATH']);
  $APPLICATION->SetTitle(str_replace("<br/>", " ", html_entity_decode($s['~NAME'])));
?>
