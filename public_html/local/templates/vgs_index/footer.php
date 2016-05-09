</div>
<?
  $APPLICATION->IncludeComponent("bitrix:catalog.section.list", "buttons", array(
    "IBLOCK_TYPE"  => "content_".LANGUAGE_ID,
    "IBLOCK_ID"    => "2",
    "TOP_DEPTH"    => "1",
    "CACHE_TYPE"   => "A",
    "CACHE_TIME"   => "36000",
    "CLASS"        => "buttons--small buttons--index"
  ),
  false
  );
?>
<?
  $APPLICATION->IncludeComponent("bitrix:news.list", "certs",
      array(
        "IBLOCK_ID"            => "1",
        "NEWS_COUNT"           => "99",
        "SORT_BY1"             => "SORT",
        "SORT_ORDER1"          => "ASC",
        "CACHE_TYPE"           => "A",
        'PROPERTY_CODE'        => array('FILE')
      ),
      false
    );
?>
<?require($_SERVER['DOCUMENT_ROOT'].'/include/footer.php');?>
