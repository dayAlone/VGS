<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle('Карта сайта');
$APPLICATION->IncludeComponent(
  "bitrix:main.map",
  ".default",
  array(
    "LEVEL"            => "10",
    "COL_NUM"          => "1",
    "SHOW_DESCRIPTION" => "Y",
    "SET_TITLE"        => "N",
    "CACHE_TIME"       => "36000",
    "CACHE_TYPE"       => "A"
  ),
  false
);
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>
