</div>
<!--// sticky-footer-content -->

<footer class="section-footer">
		<div class="container">
			<div class="row">
				<div class="col section-footer__copyright">
					<p><?php echo $settings['copyright_name'];?></p>
					<p><?php echo $settings['copyright_year'];?></p>
				</div>
				<div class="col section-social-icons">
          <?php if (!empty($settings['youtube'])) : ?>
            <div class="footer-icons">
              <a href="<?php echo $settings['youtube'];?>" target="_blank">
                <img src="<?php echo HOST ?>static/img/favicons/youtube-brands.svg" alt="Youtube" width="30" height="21" />
              </a>
            </div>
          <?php endif;?>

          <?php if( !empty($settings['instagram']) ) : ?>
            <div class="footer-icons"><a href="<?php echo $settings['instagram'];?>" target="_blank"><img src="<?php echo HOST ?>static/img/favicons/instagram.svg" alt="instagram" width="24" height="26" /></a></div>
          <?php endif; ?>

          <?php if( !empty($settings['facebook']) ) : ?>
					  <div class="footer-icons"><a href="<?php echo $settings['facebook'];?>" target="_blank"><img src="<?php echo HOST ?>static/img/favicons/facebook.svg" alt="facebook" width="18" height="28" /></a></div>
          <?php endif; ?>

          <?php if( !empty($settings['vkontakte']) ) : ?>
					  <div class="footer-icons"><a href="<?php echo $settings['vkontakte'];?>" target="_blank"><img src="<?php echo HOST ?>static/img/favicons/vk.svg" alt="vk" width="30" height="18" /></a></div>
          <?php endif; ?>

          <?php if( !empty($settings['linkedin']) ) : ?>
					  <div class="footer-icons"><a href="<?php echo $settings['vkontakte'];?>" target="_blank"><img src="<?php echo HOST ?>static/img/favicons/linkedin.svg" alt="linkedin" width="25" height="28" /></a></div>
          <?php endif; ?>

          <?php if( !empty($settings['github']) ) : ?>
            <div class="footer-icons"><a href="<?php echo $settings['github'];?>" target="_blank"><img src="<?php echo HOST ?>static/img/favicons/github-brands.svg" alt="github-brands" width="27" height="28"/></a></div>
          <?php endif; ?>
				</div>
			</div>
		</div>
	</footer>