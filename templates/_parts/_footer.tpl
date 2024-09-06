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
              <a href="<?php echo $settings['youtube'];?>" target="_blank" title="Перейти в профиль на сайте youtube.com">
                <img src="<?php echo HOST ?>static/img/favicons/youtube-brands.svg" alt="Youtube" width="30" height="21" />
              </a>
            </div>
          <?php endif;?>

          <?php if( !empty($settings['instagram']) ) : ?>
            <div class="footer-icons">
              <a href="<?php echo $settings['instagram'];?>" target="_blank" title="Перейти в профиль на сайте instagram.com">
                <img src="<?php echo HOST ?>static/img/favicons/instagram.svg" alt="instagram" width="24" height="26" />
              </a>
            </div>
          <?php endif; ?>

          <?php if( !empty($settings['facebook']) ) : ?>
					  <div class="footer-icons">
              <a href="<?php echo $settings['facebook'];?>" target="_blank" title="Перейти в профиль на сайте facebook.com">
                <img src="<?php echo HOST ?>static/img/favicons/facebook.svg" alt="facebook" width="18" height="28" />
              </a>
            </div>
          <?php endif; ?>

          <?php if( !empty($settings['vkontakte']) ) : ?>
					  <div class="footer-icons">
              <a href="<?php echo $settings['vkontakte'];?>" target="_blank" title="Перейти в профиль на сайте vkontace.ru">
                <img src="<?php echo HOST ?>static/img/favicons/vk.svg" alt="vk" width="30" height="18" />
              </a>
            </div>
          <?php endif; ?>

          <?php if( !empty($settings['linkedin']) ) : ?>
					  <div class="footer-icons">
              <a href="<?php echo $settings['linkedin'];?>" target="_blank" title="Перейти в профиль на сайте instagram.com" title="Перейти в профиль на сайте linkedin.com">
                <img src="<?php echo HOST ?>static/img/favicons/linkedin.svg" alt="linkedin" width="25" height="28" />
              </a>
            </div>
          <?php endif; ?>

          <?php if( !empty($settings['github']) ) : ?>
            <div class="footer-icons"><a href="<?php echo $settings['github'];?>" target="_blank"><img src="<?php echo HOST ?>static/img/favicons/github-brands.svg" alt="github-brands" width="27" height="28"/></a></div>
          <?php endif; ?>
				</div>
			</div>

      <!-- backtop button -->
      <a href="#top" class="backtop-btn" id="backtop" style="opacity: 1;" title="Наверх">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"> 
          <path d="M214.6 41.4c-12.5-12.5-32.8-12.5-45.3 0l-160 160c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L160 141.2V448c0 17.7 14.3 32 32 32s32-14.3 32-32V141.2L329.4 246.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3l-160-160z"/>
        </svg>
      </a>
      <!--// backtop button -->
		</div>
	</footer>