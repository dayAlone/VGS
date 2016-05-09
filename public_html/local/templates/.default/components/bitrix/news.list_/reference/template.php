<? $this->setFrameMode(true);
use Bitrix\Main\Localization\Loc;
use Bitrix\Sale\Location;
Loc::loadMessages(__FILE__);
?>
<?/*
<div role="tabpanel">

	<ul role="tablist" class="nav nav-tabs">
	<?
	$s = array_keys($arResult['SECTIONS']);
	$first = $s[0];
	foreach ($arResult['SECTIONS'] as $key=>$section):?>
	    <li role="presentation" <?=($key==$first?'class="active"':'')?>><a href="#<?=$section['CODE']?>" aria-controls="home" role="tab" data-toggle="tab"><?=$section['NAME']?></a></li>
	<?endforeach;?>
	</ul>
	<div class="tab-content">
	<?=($key==$first?'active':'')?>
*/?>	
	<?foreach ($arResult['SECTIONS'] as $key=>$section):?>
			
		<div class="reference">
          	<a href="#" class="reference__trigger"><?=svg('next')?><?=$section['NAME']?></a>
            <div class="reference__content">
            	<div class="list">
	            	<?foreach ($section['ELEMENTS'] as $k => $info):?>
	            		<?if($k>0):?>
	            			<div class="list__divider"></div>
	            		<?endif;?>
	            		<small><?=Loc::getMessage('CLIENT')?>:</small> <br><?=$info['client']?><br>
      						<div class="row xs-margin-top">
      							<div class="col-xs-6">
      								<small><?=Loc::getMessage('PERIOD')?>:</small> <br><?=str_replace(Loc::getMessage('TIME'), "<nobr>"+Loc::getMessage('TIME')+"</nobr>", $info['period'])?><br>
      							</div>
      							<div class="col-xs-6">										
      								<small><?=Loc::getMessage('REGION')?>:</small> <br><?=$info['region']?><br>
      							</div>
      							
      						</div>
      						<small><?=Loc::getMessage('OBJECT')?>:</small> <br><?=$info['object']?><br>
      						<small><?=Loc::getMessage('WORKS')?>:</small> <br><?=$info['epscm']?><br>
	             <?endforeach;?>
            					
            	</div>
              <table cellpadding="10" class="table">
                <thead>
                  <tr>
                  	<th width="20%"><?=Loc::getMessage('CLIENT')?></th>
                    <th width="10%" class="hidden-xs"><?=Loc::getMessage('REGION')?></th>
					         <th width="10%" class="hidden-xs"><?=Loc::getMessage('PERIOD')?></th>
                    
                    <th <?=($section['COUNTER']>0?'width="45%"':'width="35%"')?>><?=Loc::getMessage('OBJECT')?></th>
                    
                    <th <?=($section['COUNTER']>0?'width="10%"':'width="20%"')?>><nobr><?=Loc::getMessage('WORKS')?></nobr></th>
                  </tr>
                </thead>
                <tbody>
                <?foreach ($section['ELEMENTS'] as $info):?>
                  <tr>
                  	<td><?=$info['client']?></td>
                  	<td class="hidden-xs"><?=$info['region']?></td>
                    <td class="hidden-xs"><?=$info['period']?></td>
                    <td>
                    	<small class="visible-xs"><strong><?=$info['period']?></strong></small>
                    	<?=$info['object']?>
                    	<div class="visible-xs">
                    		<small class=""><strong>Регион, страна:</strong> <?=$info['region']?></small>	
                    	</div>
                    </td>
                    
                    <?/*<td><?=$info['works']?></td>*/?>
                    <td><?=$info['epscm']?></td>
                  </tr>
                <?endforeach;?>
                </tbody>
              </table>
            </div>
        </div>

	<?endforeach;?><?/*
	</div>
</div>
*/?>