</div>
<?
  $APPLICATION->IncludeComponent("bitrix:news.list", "buttons",
      array(
        "IBLOCK_ID"      => 11,
        "NEWS_COUNT"     => "40",
        "SORT_BY1"       => "SECTION_ID",
        "SORT_ORDER1"    => "ASC",
        "SORT_BY2"       => "SORT",
        "SORT_ORDER2"    => "ASC",
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
        "IBLOCK_ID"            => "15",
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
