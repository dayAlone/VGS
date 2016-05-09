<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle('Партнеры');
$APPLICATION->SetPageProperty('body_class', 'page--partners');
?>
<div class="text">
  <p>Акционерное Общество «Взрывгеосервис» - сотрудничает с ведущими международными и российскими нефте- и газодобывающими команиями. </p>
</div>
<?
  $APPLICATION->IncludeComponent("bitrix:news.list", "partners",
      array(
        "IBLOCK_ID"            => "3",
        "NEWS_COUNT"           => "99",
        "SORT_BY1"             => "SORT",
        "SORT_ORDER1"          => "ASC",
        "CACHE_TYPE"           => "A",
        "SET_TITLE"            => "N"
      ),
      false
    );
?>
<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>
