<div id="Feedback" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade feedback">
  <div class="modal-dialog feedback__dialog">
    <div class="modal-content">
		<div class="right s-margin-top l-margin-bottom">
			<a data-dismiss="modal" href="#" class="close">Close</a>
		</div>
        <div class="feedback__success">
          <h1 class="center">Your message has been sent successfully.</h1>
          <p class="center">Our company representatives will contact you soon. Thank you for contacting.</p>
        </div>
    <form class="feedback__form" data-parsley-validate>
      <input type="hidden" name="group_id" value="1">
      <input type="hidden" name="title" value="<?=$APPLICATION->GetTitle()?>">
      <label>Introduce yourself, please</label>
      <input name="name" type="text" required>
      <label>Your E-mail</label>
      <input name="email" type="email" required>
      <label>Your phone number</label>
      <input name="phone" type="text" data-parsley-pattern="/^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}/" data-parsley-trigger="change">
      <label>Company</label>
      <input name="company" type="text" required value="">
      <label>Your message</label>
      <textarea required name="message"></textarea>
      <div class="row">
        <div class="col-xs-6">
          <label class="left">Enter this code</label>
          <div class="captcha" style="background-image:url(/include/captcha.php?captcha_sid=<?=$code?>)"></div>
          <input type="hidden" name="captcha_code" value="<?=$code?>">
          <a href="#" class="captcha__refresh">
            <?=svg('refresh')?>
          </a>
        </div>
        <div class="col-xs-6">
          <label class="right">into this field</label>
          <input name="captcha_word" type="text" required>
        </div>
      </div>
      <div class="center">
        <input type="submit" class="product__big-button product__big-button--border m-margin-top" value="Send">
      </div>
    </form>

    </div>
  </div>
</div>
