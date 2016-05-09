<?require($_SERVER['DOCUMENT_ROOT'].'/include/header.php');?>
  <div class="page__content">
    <?php
      $APPLICATION->IncludeComponent("bitrix:menu", "menu",
      array(
          "ALLOW_MULTI_SELECT" => "Y",
          "MENU_CACHE_TYPE"    => "A",
          "ROOT_MENU_TYPE"     => "top",
          "MAX_LEVEL"          => "1",
          "CLASS"              => "nav--index"
          ),
      false);
    ?>
