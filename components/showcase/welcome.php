<div>
<h2>Welcome</h2>

<div class="showcase-welcome">
  <?php if( get_field('introduction',$user_ID) ): ?>
  <div>
    <?php the_field('introduction',$user_ID); ?>
  </div>
  <?php endif; ?>
  <div>
    <?php if( get_field('welcome_image',$user_ID) ): ?>
      <img src="<?php the_field('welcome_image',$user_ID); ?>">
    <?php endif; ?>

    <?php if( get_field('welcome_video',$user_ID) ): ?>

<style>
    .embed-container { 
        position: relative; 
        padding-bottom: 56.25%;
        overflow: hidden;
        max-width: 100%;
        height: auto;
        margin-top: 30px;
    } 

    .embed-container iframe,
    .embed-container object,
    .embed-container embed { 
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }
</style>
<?php endif; ?>    

    <?php

$video = get_field( 'welcome_video', $user_ID );
$autoplay = get_field( 'autoplay_video', $user_ID );

	if ( $video ) {


	
		echo '<div class="embed-container">', $video, '</div>';
	}


    ?>






  </div>
</div>


</div>