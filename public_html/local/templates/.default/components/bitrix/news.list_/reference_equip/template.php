<? $this->setFrameMode(true);?>

<div class="reference-wrap">
<a href="#" class="reference-wrap__trigger"><?=(LANGUAGE_ID=='ru'?"Референс по поставкам оборудования":"Reference list of equipment procurement projects")?> <?=svg('steps-arrow')?></a>
  <div class="reference-wrap__content">
  	<?foreach ($arResult['SECTIONS'] as $key=>$section):?>
    	<div class="reference reference--small">
        	<a href="#" class="reference__trigger"><?=svg('next')?><?=$section['NAME']?></a>
          <div class="reference__content">
          	<table cellpadding="10" class="table" valign="middle">
              <thead>
                <tr>
                	<th width="40%"><?=(LANGUAGE_ID=='ru'?"Наименование оборудования":"Equipment")?></th>
                  <th width="20%" class="year"><?=(LANGUAGE_ID=='ru'?"год":"Year")?></th>
                  
                  <th width="40%"><?=(LANGUAGE_ID=='ru'?"объект":"Customer, project, plant")?></th>
                </tr>
              </thead>
              <tbody>
              <?foreach ($section['ELEMENTS'] as $info):?>
                <tr>
                	<td><?=$info['name']?></td>
                  <td class="year"><?=$info['period']?></td>
                  <td><?=$info['object']?></td>
                </tr>
              <?endforeach;?>
              </tbody>
            </table>
          </div>
      </div>
  	<?endforeach;?>
  </div>
</div>
<div class="page__divider xxl-margin-top m-margin-bottom page__divider--small"></div>