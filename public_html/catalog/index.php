<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetPageProperty('body_class', 'page--production');
if (isset($_REQUEST['ELEMENT_CODE'])):

elseif (isset($_REQUEST['SECTION_CODE'])):

else:
  $APPLICATION->SetPageProperty('body_class', 'page--blank page--production');
  $APPLICATION->SetTitle('Продукция');
  $APPLICATION->SetPageProperty('footer_class', ' footer--fullwidth');
  $APPLICATION->SetPageProperty('toolbar_class', ' toolbar--white');
  $APPLICATION->IncludeComponent("bitrix:catalog.section.list", "buttons", array(
    "IBLOCK_TYPE"  => "content_".LANGUAGE_ID,
    "IBLOCK_ID"    => "2",
    "TOP_DEPTH"    => "1",
    "CACHE_TYPE"   => "A",
    "CACHE_TIME"   => "36000",
    "CLASS"        => "buttons--margin buttons--production"
  ),
  false
  );
endif;
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>
