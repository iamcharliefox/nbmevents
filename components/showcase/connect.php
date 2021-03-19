<div>
  <h2>Connect</h2>
  <div class="connect">

  <?php if( get_field('company_description',$user_ID) ): ?><?php the_field('company_description',$user_ID); ?><?php endif; ?>

    <div class="info">
      <strong><?php echo $company_name; ?></strong><br/>
      <?php if( get_field('address',$user_ID) ): ?><?php the_field('address',$user_ID); ?><br/><?php endif; ?>
      <?php if( get_field('phone_number',$user_ID) ): ?><?php the_field('phone_number',$user_ID); ?><br/><?php endif; ?>

      <?php
        $site = get_field('website',$user_ID);
        $site = str_replace(array('http://', 'https://'), '', $site);
        $site = rtrim($site, '/');
      ?>

      <?php if( get_field('website',$user_ID) ): ?><a href="<?php the_field('website',$user_ID); ?>" target="_blank"><?php echo $site; ?></a><br/><?php endif; ?>
      <?php if( get_field('email_address',$user_ID) ): ?><a href="mailto:<?php the_field('email_address',$user_ID); ?>"><?php the_field('email_address',$user_ID); ?></a><?php endif; ?>
    </div>

    <div class="button-row">
      <?php if( get_field('email_address',$user_ID) ): ?><a href="mailto:<?php the_field('email_address',$user_ID); ?>" class="button social email"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-envelope.png"></a><?php endif; ?>
      <?php if( get_field('twitter',$user_ID) ): ?><a href="<?php the_field('twitter',$user_ID); ?>" class="button social twitter"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-twitter.png"></a><?php endif; ?>
      <?php if( get_field('linkedin',$user_ID) ): ?><a href="<?php the_field('linkedin',$user_ID); ?>" class="button social linkedin"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-linkedin.png"></a><?php endif; ?>
      <?php if( get_field('instagram',$user_ID) ): ?><a href="<?php the_field('instagram',$user_ID); ?>" class="button social instagram"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-instagram.png"></a><?php endif; ?>
      <?php if( get_field('facebook',$user_ID) ): ?><a href="<?php the_field('facebook',$user_ID); ?>" class="button social facebook"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-facebook.png"></a><?php endif; ?>
    </div>

  </div>
</div>