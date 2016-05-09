<div id="Feedback" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade feedback">
  <div class="modal-dialog feedback__dialog">
    <div class="modal-content">
		<div class="right s-margin-top l-margin-bottom">
			<a data-dismiss="modal" href="#" class="close">Закрыть окно</a>
		</div>
    <div class="feedback__success">
      <h4 class="center">Ваше сообщение успешно отправлено. </h1>
      <p class="center">В ближайшее время представители нашей компании свяжутся с вами. Благодарим за обращение.</p>
    </div>
    <form class="feedback__form" data-parsley-validate>
      <input type="hidden" name="group_id" value="1">
      <input type="hidden" name="title" value="<?=$APPLICATION->GetTitle()?>">
	    <label>представьтесь, пожалуйста</label>
      <input name="name" type="text" required value="">
      <label>Ваш e-mail</label>
      <input name="email" type="email" required value="">
      <label>телефон для связи с вами</label>
      <input name="phone" type="text" data-parsley-pattern="/^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}/" data-parsley-trigger="change" value="">
      <label>Компания</label>
      <input name="company" type="text" required value="">
      <label>ваше сообщение</label>
      <textarea required name="message"></textarea>
      <div class="row">
        <div class="col-xs-6">
          <label class="left">введите данный код</label>
          <div class="captcha" style="background-image:url(/include/captcha.php?captcha_sid=<?=$code?>)"></div>
          <input type="hidden" name="captcha_code" value="<?=$code?>">
          <a href="#" class="captcha__refresh">
            <?=svg('refresh')?>
          </a>
        </div>
        <div class="col-xs-6">
          <label class="right">в это поле</label>
          <input name="captcha_word" type="text" required>
        </div>
      </div>
      <div class="center">
        <input type="submit" class="product__big-button product__big-button--border m-margin-top" value="Отправить">
      </div>
    </form>

    </div>
  </div>
</div>
