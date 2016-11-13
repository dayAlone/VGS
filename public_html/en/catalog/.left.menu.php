<?
global $APPLICATION;
$aMenuLinks = array_merge($APPLICATION->IncludeComponent("bitrix:menu.sections","",Array(
        "IS_SEF"           => "Y",
        "SEF_BASE_URL"     => "/catalog/",
        "SECTION_PAGE_URL" => "#SECTION_CODE#/",
        "DETAIL_PAGE_URL"  => "#ELEMENT_CODE#/",
        "IBLOCK_TYPE"      => "news",
        "IBLOCK_ID"        => 11,
        "DEPTH_LEVEL"      => "2",
        "CACHE_TYPE"       => "A",
        "CACHE_TIME"       => "3600"
    )), IBlockElementsMenu(2, array('SECTION_ID' => false)));

?>
