<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle('Контакты');
$APPLICATION->SetPageProperty('body_class', 'page--contacts');
?>
<div class="text">
  <h2>АО «ВЗРЫВГЕОСЕРВИС»</h2>
  <div class="text__divider"></div>
  <h5>Адрес:</h5>
  <p><?=COption::GetOptionString("grain.customsettings", 'address_'.LANGUAGE_ID)?></p>
  <a href="#map" class="button">Показать карту</a>
  <div class="text__divider"></div>
  <h5>Телефон/факс:</h5>
  <p> <a href="tel:<?=preg_replace("/[^0-9+]/", "", COption::GetOptionString("grain.customsettings", 'phone'))?>" class="text__link"><nobr><?=COption::GetOptionString("grain.customsettings","phone") ?></nobr></a></p>
  <div class="text__divider"></div>
  <h5>e-mail:</h5>
  <p> <a href="mailto:<?=COption::GetOptionString("grain.customsettings", 'email')?>" class="text__link"><?=COption::GetOptionString("grain.customsettings", 'email')?></a></p>
  <a href="#Feedback" data-toggle="modal" class="button">Отправить сообщение</a>
  <h2><br>СПИСОК КОНТАКТОВ</h2>
  <?
      $APPLICATION->IncludeComponent("bitrix:news.list", "contacts",
          array(
              "IBLOCK_ID"            => "8",
              "NEWS_COUNT"           => "1000000",
              "SORT_BY1"             => "SORT",
              "SORT_ORDER1"          => "ASC",
              "CACHE_TYPE"           => "A",
              'PROPERTY_CODE'        => array('NAME', 'EMAIL', 'PHONE'),
              "SET_TITLE"            => "N"
          ),
          false
      );
  ?>
</div>
<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>
