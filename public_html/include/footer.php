</div>
<?$APPLICATION->ShowViewContent('footer');?>

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
<div class="page__bg" <? if (strlen($_GLOBALS['BG_IMAGE']) > 0): ?>style="background-image:url(<?=$_GLOBALS['BG_IMAGE']?>); <?=strlen($_GLOBALS['BG_POSITION'])> 0 ? $_GLOBALS['BG_POSITION'] : ''?>"<?endif;?>></div>

<div tabindex="-1" role="dialog" aria-hidden="true" class="pswp">
  <div class="pswp__bg"></div>
  <div class="pswp__scroll-wrap">
    <div class="pswp__container">
      <div class="pswp__item"></div>
      <div class="pswp__item"></div>
      <div class="pswp__item"></div>
    </div>
    <div class="pswp__ui pswp__ui--hidden">
      <div class="pswp__top-bar">
        <div class="pswp__counter"></div>
        <button title="Close (Esc)" class="pswp__button pswp__button--close"></button>
        <button title="Share" class="pswp__button pswp__button--share"></button>
        <button title="Toggle fullscreen" class="pswp__button pswp__button--fs"></button>
        <button title="Zoom in/out" class="pswp__button pswp__button--zoom"></button>
        <div class="pswp__preloader">
          <div class="pswp__preloader__icn">
            <div class="pswp__preloader__cut">
              <div class="pswp__preloader__donut"></div>
            </div>
          </div>
        </div>
      </div>
      <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
        <div class="pswp__share-tooltip"></div>
      </div>
      <button title="Previous (arrow left)" class="pswp__button pswp__button--arrow--left"></button>
      <button title="Next (arrow right)" class="pswp__button pswp__button--arrow--right"></button>
      <div class="pswp__caption">
        <div class="pswp__caption__center"></div>
      </div>
    </div>
  </div>
</div>

<? require_once($_SERVER['DOCUMENT_ROOT'] . "/include/feedback-".LANGUAGE_ID.".php"); ?>
<div class="map">
    <a href='#' class='map__close'><?=svg('close')?></a>
    <div class='map__content' id="map" data-coords="<?=COption::GetOptionString("grain.customsettings", 'coords')?>" data-zoom="15" data-map data-lang="<?=(LANGUAGE_ID=='ru'?"ru_RU":"en_US")?>" data-text="<?=SITE_NAME?>"></div>
</div>

</body>
</html>
