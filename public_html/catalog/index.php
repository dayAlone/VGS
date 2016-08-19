<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetPageProperty('body_class', 'page--production');

$APPLICATION->SetPageProperty('section', array('IBLOCK' => 2, 'CODE'=>'catalog'));
require($_SERVER['DOCUMENT_ROOT'].'/include/section.php');

if (isset($_REQUEST['ELEMENT_CODE']) || (isset($_REQUEST['SECTION_CODE']) && !$_GLOBALS['currentSection'])):
    $APPLICATION->IncludeComponent("bitrix:news.detail", "catalog", Array(
      "IBLOCK_ID"     => 2,
      "ELEMENT_CODE"  => isset($_REQUEST['ELEMENT_CODE']) ? $_REQUEST['ELEMENT_CODE'] : $_REQUEST['SECTION_CODE'],
      "CHECK_DATES"   => "N",
      "IBLOCK_TYPE"   => "content_ru",
      "SET_TITLE"     => "Y",
      "CACHE_TYPE"    => "A",
      "PROPERTY_CODE" => array("GALLERY", "FILES"),
    ));
elseif (isset($_REQUEST['SECTION_CODE'])):
  $APPLICATION->IncludeComponent("bitrix:news.list", "catalog",
  	array(
  		"IBLOCK_ID"            => 2,
  		"NEWS_COUNT"           => "60",
  		"SORT_BY1"             => "ACTIVE_FROM",
  		"SORT_ORDER1"          => "DESC",
  		"DETAIL_URL"           => "/catalog/#SECTION_CODE#/#ELEMENT_CODE#/",
  		"CACHE_TYPE"           => "A",
  		"SET_TITLE"            => "N",
  		"SHOW_DESCRIPTION"     => "Y",
  		"DISPLAY_BOTTOM_PAGER" => "Y",
  		"PARENT_SECTION_CODE"  => $_REQUEST['SECTION_CODE'],
  	)
	);
else:
  $APPLICATION->SetPageProperty('body_class', 'page--blank page--production');
  $APPLICATION->SetTitle('Продукция');
  $APPLICATION->SetPageProperty('footer_class', ' footer--fullwidth');
  $APPLICATION->SetPageProperty('toolbar_class', ' toolbar--white');

  $APPLICATION->IncludeComponent("bitrix:news.list", "buttons",
      array(
        "IBLOCK_ID"      => "2",
        "NEWS_COUNT"     => "40",
        "SORT_BY1"       => "SECTION_ID",
        "SORT_ORDER1"    => "ASC",
        "CACHE_TYPE"     => "A",
        "SET_TITLE"      => "N",
        "CLASS"          => "buttons--margin buttons--production",
        "PARENT_SECTION" => "null"
      ),
      false
    );
endif;
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>
