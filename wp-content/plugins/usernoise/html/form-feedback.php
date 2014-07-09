
<div id="un-feedback-content">
  <?php do_action('un_feedback_content_top') ?>
  <div id="un-feedback-form-wrapper">
    <h2 style="color: #625B55">
      <?php echo un_get_option(UN_FEEDBACK_FORM_TITLE, __('Feedback', 'usernoise')) ?>
      <?php if (current_user_can('edit_others_posts')): ?>
        <a class="un-button-gray" id="un-button-settings" href="<?php echo admin_url('options-general.php?page=usernoise')?>">
          <?php echo strtolower(__('Settings', 'usernoise')) ?></a>
      <?php endif ?>
    </h2>
    <p style="color: #625B55"><?php echo un_feedback_form_text() ?></p>
    <?php do_action('un_fedback_form_before')?>
    <form data-action="<?php echo admin_url('admin-ajax.php') ?>?action=un_feedback_form_submit" method="post" id="un-feedback-form" class="un-feedback-form">
      <?php if (un_get_option(UN_FEEDBACK_FORM_SHOW_TYPE)): ?>
        <div id="un-types-wrapper" class="un-types-wrapper">
          <?php $un_h->link_to(__('Idea', 'usernoise') . '<span class="selection"></span>', '#', array('id' => 'un-type-idea', 'class' => 'selected'))?>
          <?php $un_h->link_to(__('Problem', 'usernoise') . '<span class="selection"></span>', '#', array('id' => 'un-type-problem'))?>
          <?php $un_h->link_to(__('Question', 'usernoise') . '<span class="selection"></span>', '#', array('id' => 'un-type-question'))?>
          <?php $un_h->link_to(__('Praise', 'usernoise') . '<span class="selection"></span>', '#', array('id' => 'un-type-praise'))?>
          <?php $un_h->hidden_field('type', 'idea')?>
        </div>
      <?php endif ?>
      <?php $un_h->textarea('description', __('Your feedback', 'usernoise'), array('id' => 'un-description', 'class' => 'text text-empty'))?>
      <?php if (un_get_option(UN_FEEDBACK_FORM_SHOW_SUMMARY)): ?>
        <?php $un_h->text_field('title', __('Short summary', 'usernoise'), array('id' => 'un-title', 'class' => 'text text-empty'))?>
      <?php endif ?>
      <?php if (un_get_option(UN_FEEDBACK_FORM_SHOW_EMAIL)): ?>
        <?php $un_h->text_field('email', __('Your email (will not be published)', 'usernoise'), array('id' => 'un-email', 'class' => 'text text-empty'))?>
      <?php endif ?>

      <div style="margin: 0 auto; width: 100px; margin-bottom: 5px;">
        <img id="urecaptcha" src="<?php echo usernoise_url( '/EasyCaptcha/easycaptcha.php'); ?>" />
        <a id="burecaptcha"style="font-size:0.7em; font-weight: bold; cursor: pointer">Обновить картинку</a>
      </div>
      <?php $un_h->text_field('easycaptcha', __('Введите текст с картинки', 'usernoise'), array('id' => 'un-captcha', 'class' => 'text text-empty'))?>



      <?php do_action('un_feedback_form_body') ?>
      <input type="submit" class="un-submit" value="<?php echo esc_attr(un_submit_feedback_button_text()) ?>" id="un-feedback-submit">
      &nbsp;<img src="<?php echo usernoise_url('/images/loader.gif') ?>" id="un-feedback-loader" class="loader" style="display: none;">
      <div id="un-feedback-errors-wrapper" class="un-errors-wrapper" style="display: none;">
        <div id="un-feedback-errors" class="un-errors" ></div>
        <span id="feedback-errors-corner"></span>
      </div>
    </form>
    <?php do_action('un_feedback_form_after')?>
  </div>
  <?php do_action('un_feedback_content_bottom')?>
</div>

<script>

  jQuery( document ).on( 'click', 'div img#urecaptcha, div a#burecaptcha', function(){
    jQuery('div img#urecaptcha').attr('src','<?php echo usernoise_url( '/EasyCaptcha/easycaptcha.php'); ?>?' + (new Date()).getTime());
  });
</script>
