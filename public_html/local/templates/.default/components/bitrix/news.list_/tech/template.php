<? $this->setFrameMode(true);?>
<div class="row xxl-margin-top s-padding-top m-padding-bottom">
<?
foreach ($arResult['SECTIONS'] as $section):
	?>
	
      <div class="col-sm-4">
        <div href="#" class="depth depth--big"><?=$section['ICON']?><br><?=$section['NAME']?> <br>
        	<?foreach ($section['ELEMENTS'] as $key=>$item):?>
				<?if(strlen($item["TEXT"])>0):?><a href="<?=$item['DETAIL_PAGE_URL']?>"><?endif;?>
        			<span><?=$item['NAME']?></span>
        		<?if(strlen($item["TEXT"])>0):?></a><?endif;?><br>
        	<?endforeach;?>
        </div>
      </div>
<?endforeach;?>
  
</div>