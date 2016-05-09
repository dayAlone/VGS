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
  <a href="#" class="button">Показать карту</a>
  <div class="text__divider"></div>
  <h5>Телефон/факс:</h5>
  <p> <a href="tel:<?=preg_replace("/[^0-9+]/", "", COption::GetOptionString("grain.customsettings", 'phone'))?>" class="text__link"><nobr><?=COption::GetOptionString("grain.customsettings","phone") ?></nobr></a></p>
  <div class="text__divider"></div>
  <h5>e-mail:</h5>
  <p> <a href="mailto:<?=COption::GetOptionString("grain.customsettings", 'email')?>" class="text__link"><?=COption::GetOptionString("grain.customsettings", 'email')?></a></p>
  <a href="#" class="button">Отправить сообщение</a>
</div>
<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>
