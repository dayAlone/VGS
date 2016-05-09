<?
$arUrlRewrite = array(
	array(
		"CONDITION" => "#^/catalog/([\\w-_]+)/([\\w-_]+)/([\\w-_]+)/#",
		"RULE"      => "&SECTION_CODE=\$1&ELEMENT_CODE=\$2&\$3",
		"ID"        => "",
		"PATH"      => "/404.php",
	),
	array(
		"CONDITION" => "#^/catalog/([\\w-_]+)/([\\w-_]+)/.*#",
		"RULE"      => "&SECTION_CODE=\$1&ELEMENT_CODE=\$2&\$3",
		"ID"        => "",
		"PATH"      => "/catalog/index.php",
	),

	array(
		"CONDITION" => "#^/catalog/([\\w-_]+)/.*#",
		"RULE"      => "&SECTION_CODE=\$1&\$2",
		"ID"        => "",
		"PATH"      => "/catalog/index.php",
	),
	array(
		"CONDITION" => "#^/press/([\\w-_]+)/([\\w-_]+)/.*#",
		"RULE"      => "&SECTION_CODE=\$1&ELEMENT_CODE=\$2&\$3",
		"ID"        => "",
		"PATH"      => "/press/index.php",
	),

	array(
		"CONDITION" => "#^/en/catalog/([\\w-_]+)/([\\w-_]+)/([\\w-_]+)/#",
		"RULE"      => "&SECTION_CODE=\$1&ELEMENT_CODE=\$2&\$3",
		"ID"        => "",
		"PATH"      => "/404.php",
	),
	array(
		"CONDITION" => "#^/en/catalog/([\\w-_]+)/([\\w-_]+)/.*#",
		"RULE"      => "&SECTION_CODE=\$1&ELEMENT_CODE=\$2&\$3",
		"ID"        => "",
		"PATH"      => "/en/catalog/index.php",
	),
	array(
		"CONDITION" => "#^/en/catalog/([\\w-_]+)/.*#",
		"RULE"      => "&SECTION_CODE=\$1&\$2",
		"ID"        => "",
		"PATH"      => "/en/catalog/index.php",
	),
	array(
		"CONDITION" => "#^/en/press/([\\w-_]+)/([\\w-_]+)/.*#",
		"RULE"      => "&SECTION_CODE=\$1&ELEMENT_CODE=\$2&\$3",
		"ID"        => "",
		"PATH"      => "/en/press/index.php",
	),
	array(
		"CONDITION" => "#^/ajax/en/press/([\\w-_]+)/([\\w-_]+)/.*#",
		"RULE"      => "&SECTION_CODE=\$1&ELEMENT_CODE=\$2&\$3",
		"ID"        => "",
		"PATH"      => "/ajax/press/index.php",
	),
	array(
		"CONDITION" => "#^/press/([\\w-_]+)/.*#",
		"RULE"      => "&SECTION_CODE=\$1&\$2",
		"ID"        => "",
		"PATH"      => "/press/index.php",
	),
	array(
		"CONDITION" => "#^/en/press/([\\w-_]+)/.*#",
		"RULE"      => "&SECTION_CODE=\$1&\$2",
		"ID"        => "",
		"PATH"      => "/en/press/index.php",
	)
);

?>
