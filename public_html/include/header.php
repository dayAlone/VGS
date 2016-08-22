<!DOCTYPE html>
<html lang='<?=LANGUAGE_ID?>'>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
  <?
  $APPLICATION->SetAdditionalCSS("/layout/css/frontend.css", true);
  $APPLICATION->AddHeadScript('/layout/js/frontend.js');
  global $CITY;
  ?>
  <title><?php
    $rsSites = CSite::GetByID(SITE_ID);
    $arSite  = $rsSites->Fetch();
    define(SITE_NAME, $arSite['NAME']);
    if($APPLICATION->GetCurDir() != '/' && $APPLICATION->GetCurDir() != "/en/") {
      $APPLICATION->ShowTitle();

      echo ' | ' . $arSite['NAME'];
    }
    else echo $arSite['NAME'];
    ?></title>
  <?
    $APPLICATION->ShowHead();
    $APPLICATION->ShowViewContent('header');
  ?>
</head>
<body class="page <?=$APPLICATION->AddBufferContent("body_class");?> <?=SITE_ID?> " data-site-name="<?=$arSite['NAME']?>">
<div id="panel"><?$APPLICATION->ShowPanel();?></div>
<div class="page__wrap">
  <div class="page__toolbar toolbar <?=$APPLICATION->AddBufferContent("toolbar_class");?>">
    <a href="/" class="toolbar__logo">
      <?=svg('logo')?>
    </a>
    <?/*<div class="toolbar__lang language">
      <a href="/" class="language__link language__link--ru <?=LANGUAGE_ID == 'ru' ? 'language__link--active' : '' ?>">RU</a>
      <a href="/en/" class="language__link language__link--en" <?=LANGUAGE_ID == 'en' ? 'language__link--active' : '' ?>>EN</a>
      <span class="language__line"></span>
    </div>*/?>
    <? $APPLICATION->ShowViewContent('toolbar'); ?>
    <div class="toolbar__contacts">
      <a href="mailto:<?=COption::GetOptionString("grain.customsettings", 'email')?>" class="toolbar__link"><?=COption::GetOptionString("grain.customsettings", 'email')?></a>
      <br>
      <a href="tel:+73478320580" class="toolbar__link">+7 (34783) 2-05-80</a>
    </div>
    <a href="#" class="toolbar__nav nav">
      <div class="nav__text">Меню</div>
      <div class="nav__icon">
        <?=svg('menu')?>
      </div>
    </a>
  </div>
