<?
$item = $arResult;
?>

<p class="blue xl-margin-bottom"><?=$item['PREVIEW_TEXT']?></p>
<div class="vacancy">
  <div class="vacancy__title"><?=$item["NAME"]?></div>
  <?=$item["~DETAIL_TEXT"]?>
 <a data-toggle="modal" data-target="#vacancyDetail" href="#vacancyDetail" class="xl-margin-top xl-margin-bottom button">Откликнуться на вакансию</a>
 <br><a href="/career/vacancies/" class="back"><?=svg('back')?> К списку вакансий</a>
</div>