<?
use Bitrix\Main\Localization\Loc;
use Bitrix\Sale\Location;
Loc::loadMessages(__FILE__);
$item = $arResult;
$item['ICON'] = file_get_contents($_SERVER['DOCUMENT_ROOT'].CFile::GetPath($item['PROPERTIES']['SVG']['VALUE']));
if(strlen($item['ICON'])==0):
	$arFilter = array('IBLOCK_ID' => $arResult['IBLOCK_ID'], 'ID'=>$item['IBLOCK_SECTION_ID']);
	$rsSect = CIBlockSection::GetList(array('left_margin' => 'asc'), $arFilter, false, array('UF_SVG'));
   	while ($arSect = $rsSect->Fetch()) {
   		$item['ICON'] = file_get_contents($_SERVER['DOCUMENT_ROOT'].CFile::GetPath($arSect['UF_SVG']));
   	}
endif;
?>
<h2 class="page__title page__title--icon"><?=$item['ICON']?><span><?=$item['NAME']?></span></h2>
<div class="row">
	<div class="col-md-9">
		<?=$item['~DETAIL_TEXT']?>
		<div class="page__divider page__divider--small"></div>		
	</div>
	<div class="col-md-3 visible-md visible-lg">
		<?if($item['IBLOCK_ID']!=18):?>
			<?if($item['IBLOCK_ID']==4):?>
			<h5 class="top"><?=Loc::getMessage('MORE_DEPTHS')?></h5>
			<?else:?>
			<h5 class="top"><?=Loc::getMessage('MORE_SERVICES')?></h5>
			<?endif;?>
			<div class="page__divider xl-margin-bottom"></div>
			<?
				global $depthFilter;
				$depthFilter = array('!ID'=>$item['ID']);
				$APPLICATION->IncludeComponent("bitrix:news.list", "list", 
		        array(
		          "IBLOCK_ID"      => $item['IBLOCK_ID'],
		          "NEWS_COUNT"     => "100",
		          "FILTER_NAME"    => "depthFilter",
		          "SORT_BY1"       => "SORT",
		          "SORT_ORDER1"    => "ASC",
		          "DETAIL_URL"     => $arParams["DETAIL_URL"],
		          "CACHE_TYPE"     => "A",
		          "SET_TITLE"      => "N",
		          "PROPERTY_CODE"  => array('SVG')
		        ),
		        false
		      );
			?>
		<?else:
			$APPLICATION->IncludeComponent("bitrix:news.list", "section", 
		        array(
		          "IBLOCK_ID"      => $item['IBLOCK_ID'],
		          "NEWS_COUNT"     => "100",
		          "SORT_BY1"       => "SORT",
		          "SORT_ORDER1"    => "ASC",
		          "PARENT_SECTION" => $item['IBLOCK_SECTION_ID'],
		          "DETAIL_URL"     => $arParams["DETAIL_URL"],
		          "CACHE_TYPE"     => "A",
		          "SET_TITLE"      => "N",
		          "CACHE_NOTES"    => $item['ID'],
		          "PROPERTY_CODE"  => array('SVG')
		        ),
		        false
		    );
		endif;?>
	</div>
</div>
<?
	if($item['IBLOCK_ID']==4):
		$prop = "PROPERTY_INDUSTRIES";
		$title = "Проекты данной отрасли";
	elseif($item['IBLOCK_ID']==18):
		$prop = "PROPERTY_TECH_ELEMENTS";
		$title = "Проекты c данной технологией";
	else:
		$prop = "PROPERTY_DEPTH";
		$title = "Проекты данного вида деятельности";
	endif;
  	ob_start();
  	global $projectFilter;
  	$projectFilter = array($prop=>$item['ID']);
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
  		$items = ob_get_contents();
	ob_end_clean();
?>
<?if(strlen($items)>0):?>
	
	<h3 class="l-margin-bottom no-margin-top"><?=$title?></h3>
	<?=$items?>
	<p class="xs-margin-top"><a href="/works/"><?=Loc::getMessage('ALL_PROJECTS')?></a></p>
	
<?endif;?>

<div class="hidden-md hidden-lg">
	<?if($item['IBLOCK_ID']!=18):?>
		<?if($item['IBLOCK_ID']==4):
			$title = "Другие отрасли";
		else:
			$title = "Другие услуги";
		endif;?>
		<?if(strlen($items)>0):?>
			<div class="page__divider page__divider--small l-margin-top xxl-margin-bottom"></div>	
		<?endif;?>
		<h3 class="l-margin-bottom"><?=$title?></h3>
		<?
			global $depthFilter;
			$depthFilter = array('!ID'=>$item['ID']);
			$APPLICATION->IncludeComponent("bitrix:news.list", "depth", 
	        array(
	          "IBLOCK_ID"      => $item['IBLOCK_ID'],
	          "NEWS_COUNT"     => "100",
	          "FILTER_NAME"    => "depthFilter",
	          "SORT_BY1"       => "SORT",
	          "SORT_ORDER1"    => "ASC",
	          "DETAIL_URL"     => $arParams["DETAIL_URL"],
	          "CACHE_TYPE"     => "A",
	          "SET_TITLE"      => "N",
	          "SMALL"          => "Y",
	          "PROPERTY_CODE"  => array('SVG')
	        ),
	        false
	      );
		?>
	<?else:?>
		<div class="xxl-margin-top">
		<?if(strlen($items)>0):?>
			<div class="page__divider page__divider--small l-margin-top xxl-margin-bottom"></div>	
		<?endif;?>
		<?
		$APPLICATION->IncludeComponent("bitrix:news.list", "section", 
	        array(
	          "IBLOCK_ID"      => $item['IBLOCK_ID'],
	          "NEWS_COUNT"     => "100",
	          "SORT_BY1"       => "SORT",
	          "SORT_ORDER1"    => "ASC",
	          "PARENT_SECTION" => $item['IBLOCK_SECTION_ID'],
	          "DETAIL_URL"     => $arParams["DETAIL_URL"],
	          "CACHE_TYPE"     => "A",
	          "SET_TITLE"      => "N",
	          "CACHE_NOTES"    => $item['ID'],
	          "PROPERTY_CODE"  => array('SVG')
	        ),
	        false
	    );?>
	    </div><?
	endif;?>
</div>

