<div>
<h2>Online Resources</h2>

<div class="online-resources">
<?php if( have_rows('resources',$user_ID) ): ?>
    <?php while( have_rows('resources',$user_ID) ): the_row(); ?>

      
        <?php if( get_row_layout() == 'file' ): ?>
          <?php $file = get_sub_field('upload_file'); ?>
          <div class="file-card">
            <div class="thumb" style="background-color:<?php the_field('primary_color',$user_ID); ?>">
              <a href="<?php echo $file; ?>" target="_blank">
              <svg id="file-download-24px" xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 60 60">
                <path id="Path_270" data-name="Path 270" d="M0,0H60V60H0Z" fill="none"/>
                <path id="Path_271" data-name="Path 271" d="M40,18H30V3H15V18H5L22.5,35.5ZM5,40.5v5H40v-5Z" transform="translate(7.5 4.5)" fill="#fff"/>
              </svg>
              </a>
            </div>
            <div class="details">
              <div class="title"><a href="<?php echo $file; ?>" target="_blank"><?php the_sub_field('title'); ?></a></div>
              <?php the_sub_field('description'); ?>
            </div>
          </div>


        <?php elseif( get_row_layout() == 'url' ): ?>

          <?php $url = get_sub_field('enter_url'); ?>
          <div class="file-card">
            <div class="thumb" style="background-color:<?php the_field('primary_color',$user_ID); ?>">
              <a href="<?php echo $url; ?>" target="_blank">
              <svg id="file-download-24px" xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 60 60">
                <path id="Path_270" data-name="Path 270" d="M0,0H60V60H0Z" fill="none"/>
                <path id="Path_271" data-name="Path 271" d="M40,18H30V3H15V18H5L22.5,35.5ZM5,40.5v5H40v-5Z" transform="translate(7.5 4.5)" fill="#fff"/>
              </svg>
              </a>
            </div>
            <div class="details">
              <div class="title"><a href="<?php echo $url; ?>" target="_blank"><?php the_sub_field('title'); ?></a></div>
              <?php the_sub_field('description'); ?>
            </div>
          </div>

        <?php endif; ?>
      

    <?php endwhile; ?>
<?php endif; ?>
</div>




</div>