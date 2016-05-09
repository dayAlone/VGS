<?$APPLICATION->ShowViewContent('footer');?>
</div>
<div class="page__footer footer <?=$APPLICATION->GetPageProperty('footer_class')?>">
  <div class="footer__copyright">

    © <?=date('Y')?> АО&nbsp;“ВГС”<br><br>
  </div>
  <div class="footer__address"><?=COption::GetOptionString("grain.customsettings", 'address_'.LANGUAGE_ID)?></div>
  <div class="footer__contacts">
    <a href="mailto:<?=COption::GetOptionString("grain.customsettings", 'email')?>" class="footer__link"><?=COption::GetOptionString("grain.customsettings", 'email')?></a>
    <br>
    <a href="tel:<?=preg_replace("/[^0-9+]/", "", COption::GetOptionString("grain.customsettings", 'phone'))?>" class="footer__link"><nobr><?=COption::GetOptionString("grain.customsettings","phone") ?></nobr></a>
  </div>
  <div class="footer__map"><a href="/sitemap/" class="footer__link">Карта сайта</a><br><br></div>
  <?
    $APPLICATION->IncludeComponent("bitrix:news.list", "certs",
				array(
					"IBLOCK_ID"            => "1",
					"NEWS_COUNT"           => "99",
					"SORT_BY1"             => "SORT",
					"SORT_ORDER1"          => "ASC",
					"CACHE_TYPE"           => "A",
					'PROPERTY_CODE'        => array('FILE'),
          'CLASS'                => 'footer__certs certs--small',
          'SET_TITLE'            => 'N'
				),
				false
			);
  ?>
  <a href="http://radia.ru" target="_blank" class="footer__radia radia">
    <div class="radia__logo"><?=svg('radia')?></div>
    <div class="radia__text">Разработка сайта<br/>RADIA Interactive</div></a>
</div>
<div class="page__bg" <? if (strlen($_GLOBALS['BG_IMAGE']) > 0): ?>style="background-image:url(<?=$_GLOBALS['BG_IMAGE']?>)"<?endif;?>></div>
<? require_once($_SERVER['DOCUMENT_ROOT'] . "/include/feedback-".LANGUAGE_ID.".php"); ?>
</body>
</html>
