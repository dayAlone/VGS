<?
	$params = $APPLICATION->GetPageProperty('section');

	if(!isset($_REQUEST['SECTION_CODE'])):
		$obCache       = new CPHPCache();
		$cacheLifetime = 86400;
		$cacheID       = $params['CODE'].'_'.LANGUAGE_ID;
		$cachePath     = '/'.$cacheID;

		if( $obCache->InitCache($cacheLifetime, $cacheID, $cachePath) ):

		   $vars = $obCache->GetVars();
		   $_GLOBALS['currentSection'] = $vars['current'];
		elseif( $obCache->StartDataCache() ):

			CModule::IncludeModule("iblock");
			$arSections   = array();
			$rsSections = CIBlockSection::GetList(array("CODE" => "DESC"), array("IBLOCK_ID" => $params['IBLOCK']));

			while ($s = $rsSections->Fetch()) $arSections[] = $s['CODE'];
			$_GLOBALS['currentSection'] = $arSections[0];
			$obCache->EndDataCache(array('current' => $arSections[0]));
		endif;
	endif;
?>
