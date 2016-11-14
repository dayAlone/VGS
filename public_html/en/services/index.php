<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetPageProperty('body_class', 'page--services');
if (isset($_REQUEST['ELEMENT_CODE'])):
  $APPLICATION->IncludeComponent("bitrix:news.detail", "detail",
    Array(
      "IBLOCK_ID"     => 12,
      "ELEMENT_CODE"  => $_REQUEST['ELEMENT_CODE'],
      "CHECK_DATES"   => "N",
      "IBLOCK_TYPE"   => "content_en",
      "SET_TITLE"     => "Y",
      "PROPERTY_CODE" => Array("GALLERY"),
      "CACHE_TYPE"    => "A",
      "CACHE_TIME"    => "36000",
      )
    );
else:
  $APPLICATION->SetTitle('Технологии ПВР');
  $APPLICATION->SetPageProperty('body_class', 'page--blank page--services');
  $APPLICATION->SetPageProperty('footer_class', ' footer--fullwidth');
  $APPLICATION->SetPageProperty('toolbar_class', ' toolbar--white');
  $APPLICATION->IncludeComponent("bitrix:news.list", "buttons",
      array(
        "IBLOCK_ID"   => 12,
        "NEWS_COUNT"  => "4",
        "SORT_BY1"    => "SORT",
        "SORT_ORDER1" => "ASC",
        "CACHE_TYPE"  => "A",
        "SET_TITLE"   => "N",
        "CLASS"       => "buttons--margin"
      ),
      false
    );
endif;
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>
