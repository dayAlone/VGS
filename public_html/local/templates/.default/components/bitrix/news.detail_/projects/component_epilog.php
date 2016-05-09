<?
if(intval($arResult['IBLOCK_SECTION_ID'])>0):
	CModule::IncludeModule("iblock");
	$res = CIBlockSection::GetByID($arResult['IBLOCK_SECTION_ID']);
	if($ar_res = $res->GetNext()):
		LocalRedirect(str_replace('en/en', 'en', $ar_res['LIST_PAGE_URL'].$ar_res['CODE']."/"));
	endif;	
endif;

?>