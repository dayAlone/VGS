<div class="certs <?=$arParams['CLASS']?>">
  <?foreach ($arResult['ITEMS'] as $item):?>
  <div class="certs__item certs__item--<?=strtolower($item['NAME'])?>">
    <?=(intval($item['PROPERTIES']['FILE']['VALUE']) > 0 ? file_get_contents($_SERVER['DOCUMENT_ROOT'].CFile::GetPath($item['PROPERTIES']['FILE']['VALUE'])) : '')?>
  </div>
  <?endforeach;?>
</div>
