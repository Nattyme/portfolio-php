<?php if ( !empty($settings['status_on'])) : ?>
  <section class="main-page__section-status">
    <a class="section-status" href="<?php echo $settings['status_link'];?>">
      <div class="section-status-badge"><?php echo $settings['status_label'];?></div>
      <div class="section-status-text"><?php echo $settings['status_text'];?></div>
    </a>
  </section>
<?php endif;?>