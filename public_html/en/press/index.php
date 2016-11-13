<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetPageProperty('body_class', 'page--news');
$APPLICATION->SetTitle('Пресс-центр');
$APPLICATION->SetPageProperty('section', array('IBLOCK' => 12, 'CODE'=>'news', "NOEMPTY" => true));
require($_SERVER['DOCUMENT_ROOT'].'/include/section.php');

if(intval($_GLOBALS['currentSection']) > 0):

  $APPLICATION->IncludeComponent("bitrix:news.list", "news",
  	array(
  		"IBLOCK_ID"            => 12,
  		"NEWS_COUNT"           => "20",
  		"SORT_BY1"             => "ACTIVE_FROM",
  		"SORT_ORDER1"          => "DESC",
  		"DETAIL_URL"           => "/press/#ELEMENT_CODE#/",
  		"CACHE_TYPE"           => "A",
  		"SET_TITLE"            => "N",
  		"SHOW_DESCRIPTION"     => "Y",
  		"DISPLAY_BOTTOM_PAGER" => "Y",
  		"SHOW_YEARS"           => "Y",
  		"PARENT_SECTION"       => $_GLOBALS['currentSection'],
  	)
	);
else:
  $APPLICATION->SetPageProperty('page_title', 'Пресс-центр');
  $APPLICATION->IncludeComponent("bitrix:news.detail", "news", Array(
    "IBLOCK_ID"     => 12,
    "ELEMENT_CODE"  => $_REQUEST['SECTION_CODE'],
    "CHECK_DATES"   => "N",
    "IBLOCK_TYPE"   => "content_ru",
    "SET_TITLE"     => "Y",
    "CACHE_TYPE"    => "A",
    "PROPERTY_CODE" => array("GALLERY"),
  ));
endif;

require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>
