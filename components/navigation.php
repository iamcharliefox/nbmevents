<div class="gpx-nav">
  <div class="container">
    <div class="nav-inner">
      <div class="logo">
        <?php 
          if(function_exists('the_custom_logo')){
            $custom_logo_id = get_theme_mod('custom_logo');
            $logo = wp_get_attachment_image_src($custom_logo_id, 'full' );
          }
        ?>
         <a href="<?php echo site_url();?>"><img src="<?php echo $logo[0] ?>" width="300" height="auto" alt="<?php echo get_bloginfo('name');?>"></a>
      </div>
      <div class="links">
      <div class="desktop-links">
        <?php
          wp_nav_menu(
            array(
              'menu' => 'primary',
              'container' => '',
              'theme_location' => 'primary',
              'items_wrap' => '<ul>%3$s</ul>'
            )
          );
        ?>   
        </div>

        <div class="mobile-links">
          <i class="fas fa-bars mobile-nav-trigger"></i>
          <div class="mobile-links-container">
            
            <div class="mobile-nav-header">
              <!-- <img src="<?php echo get_template_directory_uri() . '/assets/images/gpx-logo-gpx.svg' ?>" alt="GRAPHICS PRO EXPO"> -->
              <div class="nav-close">&times;</div>
            </div>
            <?php
          wp_nav_menu(
            array(
              'menu' => 'primary',
              'container' => '',
              'theme_location' => 'primary',
              'items_wrap' => '<ul>%3$s</ul>'
            )
          );
        ?>             
          </div>
        </div> 


      </div>
    </div>
  </div>
</div>