<?
$item = $arResult;

function getTable($item, $prop) {
	ob_start();
		if (count($item['PROPERTIES'][$prop]['VALUE']) > 0 && strlen($item['PROPERTIES'][$prop]['VALUE'][0]['prop_value_0']) > 0):
		?>
		<div class="params">
			<div class="params__frame">
				<?
				foreach ($item['PROPERTIES'][$prop]['VALUE'] as $key => $row):?>
			        <div class="param <?=($row['prop_title'] == "Y"?"param--title":"")?>">
			        <?

			        if(isset($row['prop_title'])) unset($row['prop_title']);
			        foreach ($row as $k => $el) if(strlen($el) == 0) unset($row[$k]);
			        foreach ($row as $k => $el):
			        ?>
			            <div class="param__col" style="flex: 1 1 <?=100/count($row)?>%"><span><?=html_entity_decode($el)?></span></div>
			        <?
			        endforeach;?>
			        </div>
			        <?
			    endforeach;
				?>
			</div>
		</div><?
		endif;
		$table = ob_get_contents();
	ob_end_clean();
	return $table;
}
?>
<div class="text">
	<?if(strlen($item["DETAIL_PICTURE"]['SRC']) > 0):?>
		<img src="<?=$item["DETAIL_PICTURE"]['SRC']?>" class="text__image text__image--right text__image--medium">
	<?endif;?>
	<?=$item["~DETAIL_TEXT"]?>
	<?=getTable($item, 'CONTENT_TABLE');?>
	<?=html_entity_decode($item['PROPERTIES']['CONTENT_TABLE_AFTER']['VALUE']['TEXT'])?>
</div>
<?
$showFooter = false;
$isPopups = false;
$isGallery = false;
$tables = array('POPAP_1', 'POPAP_2');
foreach ($tables as $key => $popup) {
	if (strlen($item['PROPERTIES'][$popup.'_NAME']['VALUE']) > 0) {
		$showFooter = true;
		$isPopups = true;
	}
}
if(count($item["PROPS"]["GALLERY"]) > 0) {
	$isGallery = true;
	$showFooter = true;
}

$APPLICATION->SetPageProperty('page_title', $item['PROPERTIES']['TITLE']);

$this->SetViewTarget('page_footer');
	if($showFooter):
	?>
	<div class="content__footer <?=($isPopups && $isGallery ? 'content__footer--full' : '')?>">
		<? foreach ($tables as $key => $popup) {
			if (strlen($item['PROPERTIES'][$popup.'_NAME']['VALUE']) > 0):?>
			<a href='#table-modal-<?=$key?>' class='file'>
				<?=svg('file')?>
				<span class='file__name'>
					<span><?=$item['PROPERTIES'][$popup.'_NAME']['VALUE']?></span>
				</span>
			</a>
			<?endif;
		}?>
		<? if(count($item["PROPS"]["GALLERY"]) > 0):?>
			<a href="#" class="button button--gallery button--small" data-pictures='<?=json_encode($item["PROPS"]["GALLERY"])?>'>фотогалерея</a>
		<? endif;?>

	</div>
<?
	endif;
$this->EndViewTarget();

$this->SetViewTarget('footer');
	foreach ($tables as $key => $popup) {
	?>
	<div class="table-modal" id='table-modal-<?=$key?>'>
		<a href='#' class='table-modal__close'><?=svg('close')?></a>
		<div class="scroll ">
	      <div class="scroll__wrap">
	        <div class="scroll__content table-modal__content text">

				<?=html_entity_decode($item['PROPERTIES'][$popup.'_BEFORE']['VALUE']['TEXT'])?>
				<?=getTable($item, $popup.'_TABLE');?>
				<?=html_entity_decode($item['PROPERTIES'][$popup.'_AFTER']['VALUE']['TEXT'])?>
			</div>
		  </div>
		</div>
	</div>

	<?
	}
$this->EndViewTarget();
$s = end($arResult['SECTION']['PATH']);
$this->SetViewTarget('toolbar');?>
	<a href="/catalog/<?=strlen($s['CODE']) > 0 ? $s['CODE'].'/' : ''?>" class="back toolbar__dropdown visible-lg">
		<?=svg('back')?><span>Назад в раздел</span>
	</a>
<?$this->EndViewTarget();?>
