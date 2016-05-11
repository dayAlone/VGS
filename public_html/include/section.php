<?
	$params = $APPLICATION->GetPageProperty('section');

	$obCache       = new CPHPCache();
	$cacheLifetime = 86400;
	$cacheID       = $params['CODE'].'_'.LANGUAGE_ID.'_'.$_REQUEST['SECTION_CODE'];
	$cachePath     = '/'.$cacheID;
	
	if( $obCache->InitCache($cacheLifetime, $cacheID, $cachePath) ):

	   $vars = $obCache->GetVars();
	   $_GLOBALS['currentSection'] = $vars['current'];
	elseif( $obCache->StartDataCache() ):

		CModule::IncludeModule("iblock");
		$arSections   = array();
		$rsSections = CIBlockSection::GetList(array("CODE" => "DESC"), array("IBLOCK_ID" => $params['IBLOCK']));

		$current = false;

		while ($s = $rsSections->Fetch()) {
			if ($s['CODE'] == $_REQUEST['SECTION_CODE']) $current = $s['ID'];
				$arSections[] = $s['ID'];
		}
		if (intval($current) > 0) {
			$_GLOBALS['currentSection'] = $current;
		} else if (isset($_REQUEST['SECTION_CODE'])) {
			$_GLOBALS['currentSection'] = false;
		} else {
			$_GLOBALS['currentSection'] = $arSections[0];
		}
		$obCache->EndDataCache(array('current' => $_GLOBALS['currentSection']));
	endif;
?>
