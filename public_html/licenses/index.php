<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle('Лицензии и сертификаты');
$APPLICATION->SetPageProperty('body_class', 'page--licenses');
  $APPLICATION->IncludeComponent("bitrix:news.list", "licenses",
  array(
      "IBLOCK_ID"            => "5",
      "NEWS_COUNT"           => "1000000",
      "SORT_BY1"             => "SORT",
      "SORT_ORDER1"          => "ASC",
      "CACHE_TYPE"           => "A",
      "SET_TITLE"            => "N",
      "PROPERTY_CODE"        => Array("GALLERY"),
  ),
  false
);
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>
