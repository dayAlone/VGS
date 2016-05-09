<?require($_SERVER['DOCUMENT_ROOT'].'/include/header.php');?>
<?php
  $APPLICATION->IncludeComponent("bitrix:menu", "menu",
  array(
      "ALLOW_MULTI_SELECT" => "Y",
      "MENU_CACHE_TYPE"    => "A",
      "ROOT_MENU_TYPE"     => "top",
      "MAX_LEVEL"          => "1",
      "CLASS"              => "nav--modal",
      "FRAME"              => true
      ),
  false);
?>
<h1 class="page__title"><?=$APPLICATION->ShowTitle();?></h1>
<div class="page__content content">
  <div class="content__scroll scroll">
    <div class="scroll__wrap">
      <div class="scroll__content">
