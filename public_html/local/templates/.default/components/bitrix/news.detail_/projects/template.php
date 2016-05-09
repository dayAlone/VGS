<?
$item = $arResult;
use Bitrix\Main\Localization\Loc;
use Bitrix\Sale\Location;
Loc::loadMessages(__FILE__);
?>
<div class="project__detail">
  <?if(strlen($item['PREVIEW_PICTURE']['SRC'])>0):?>
  <div class="xxl-margin-bottom visible-xs">
    <img src="<?=$item['PREVIEW_PICTURE']['SRC']?>" alt="" class="max-width">
  </div>
  <?endif;?>
  <div class="row">
    <div class="col-sm-8">
      <? foreach(array('CUSTOMER') as $prop):
        if(strlen($item['PROPERTIES'][$prop]['VALUE']['TEXT'])>0):
        ?>
        <h4><?=$item['PROPERTIES'][$prop]['NAME']?></h4>
        <p><?=html_entity_decode($item['PROPERTIES'][$prop]['VALUE']['TEXT'])?></p>
        <? 
        endif;
      endforeach;?>
      <div class="project__divider"></div>
      <div class="row">
        <? foreach(array('WORKTYPE', 'TIME') as $key=>$prop):
      		if(strlen($item['PROPERTIES'][$prop]['VALUE']['TEXT'])>0):
      		?>
          <div class="col-sm-<?=($key==0?8:4)?>">
        		<h4><?=$item['PROPERTIES'][$prop]['NAME']?></h4>
          	<p><?=html_entity_decode($item['PROPERTIES'][$prop]['VALUE']['TEXT'])?></p>
          </div>
      		<? 
      		endif;
      	endforeach;?>
      </div>
      <?if($item['PROPERTIES']['TABLE']['VALUE']):?>
      <div class="project__divider project__divider--width"></div>
        <h5><?=Loc::getMessage('NUMBERS')?></h5>
      <?endif;?>
    </div>
    <div class="col-xs-4 hidden-xs right">
    	<?if(strlen($item['PREVIEW_PICTURE']['SRC'])>0):?>
      <div class="project__picture" style="background-image:url(<?=$item['PREVIEW_PICTURE']['SRC']?>)"></div>
    	<?endif;?>
    </div>
  </div>
  <?if($item['PROPERTIES']['TABLE']['VALUE']):?>
  <div class="project__table">
    <div class="row project__table-title hidden-xs">
      <div class="col-xs-4"><?=Loc::getMessage('TECH')?></div>
      <div class="col-xs-4"><?=Loc::getMessage('SPEED')?></div>
      <div class="col-xs-4"><?=Loc::getMessage('TOOLS')?></div>
    </div>
    <? foreach($item['PROPERTIES']['TABLE']['VALUE'] as $row):?>
      <?if(strlen($row['t0'])>0):?>
        <div class="project__divider project__divider--blue"></div>
        <?else:?>
        <div class="row"><div class="col-sm-8 col-sm-offset-4"><div class="project__divider"></div></div></div>
      <?endif;?>
      <div class="row">
        <div class="col-sm-4">
        <small class="visible-xs"><?=Loc::getMessage('T')?></small>
        <span class="project__table-tech"><?=html_entity_decode($row['t0'])?></span>
        
          <?if(strlen($row['t0'])>0):?>
          <div class="visible-xs project__table-sub-title">
            <div class="row">
              <div class="col-xs-6"><?=Loc::getMessage('P')?></div>
              <div class="col-xs-6"><?=Loc::getMessage('N')?></div>
            </div>
            <div class="project__divider"></div>
          </div>
          <?endif;?>
        </div>
        <div class="col-xs-6 col-sm-4 project__cell--grey"><?=html_entity_decode($row['t1'])?></div>
        <div class="col-xs-6 col-sm-4 project__cell--grey"><?=html_entity_decode($row['t2'])?></div>
      </div>
    <?endforeach;?>
    <div class="project__divider project__divider--blue"></div>
  </div>
  <?endif;?>
<?/*
  <div class="page__divider page__divider--small"></div>
    <h3><?=Loc::getMessage('DETAILS')?></h3>
  	<?=$item["~DETAIL_TEXT"]?>
      */?>
  <?if(count($item['PROPERTIES']['PROJECTS']['VALUE'])>0&&$item['PROPERTIES']['PROJECTS']['VALUE']):?>
    <div class="page__divider page__divider--small"></div>
    <h3 class="l-margin-bottom">Проекты с аналогичными технологиями</h3>
    <?
    	global $projectFilter;
    	$projectFilter = array('ID'=>$item['PROPERTIES']['PROJECTS']['VALUE']);
    	$APPLICATION->IncludeComponent("bitrix:news.list", "projects", 
  		array(
  		  "IBLOCK_ID"      => 2,
  		  "NEWS_COUNT"     => "6",
  		  "FILTER_NAME"    => "projectFilter",
  		  "SORT_BY1"       => "SORT",
  		  "SORT_ORDER1"    => "ASC",
  		  "DETAIL_URL"     => "/works/projects/#ELEMENT_CODE#/",
  		  "CACHE_TYPE"     => "A",
  		  "SET_TITLE"      => "N",
  		  "DISPLAY_BOTTOM_PAGER" => "N"
  		),
  		false
  		);
    ?>
  <?endif;?>
  <?
  if(strlen($item['PROPERTIES']['TITLE']['VALUE'])>0)
    $APPLICATION->SetPageProperty('sub_title', html_entity_decode($item['PROPERTIES']['TITLE']['VALUE']));
  ?>
</div>
<a href="<?=(LANGUAGE_ID=='en'?"/en":"")?>/works/projects/" class="back"><?=svg('back')?> <?=Loc::getMessage('BACK')?></a>