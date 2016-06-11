</div>
<?
  $APPLICATION->IncludeComponent("bitrix:news.list", "buttons",
      array(
        "IBLOCK_ID"      => "2",
        "NEWS_COUNT"     => "4",
        "SORT_BY1"       => "SORT",
        "SORT_ORDER1"    => "ASC",
        "CACHE_TYPE"     => "A",
        "SET_TITLE"      => "N",
        "CLASS"          => "buttons--small buttons--index",
        "PARENT_SECTION" => "null"
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
