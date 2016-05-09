<?
	global $APPLICATION;
	$APPLICATION->SetTitle(html_entity_decode($arResult['SECTION']['PATH']['NAME']));
	$APPLICATION->SetPageProperty('sub_title', html_entity_decode($arResult['SECTION']['PATH']['UF_TITLE']));
?>