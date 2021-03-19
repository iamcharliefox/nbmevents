

<?php
$url =  "//{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";

// parse the url and store the last segment of the path
$exhibitor = basename(parse_url($url, PHP_URL_PATH));

// determine the user based on the last segment of the path
$user = get_user_by( 'login', $exhibitor );

// format the user ID for wordpress
$user_ID = "user_" . $user->ID; 

// get nickname from wordpress meta info for user
$company_name = get_user_meta( $user->ID, 'nickname', true );


$sc = get_field('in_progress','options');

// echo $sc;
// echo $user_ID;
// echo $company_name;

$show_code = $sc . '_attendee';

$currentuser = wp_get_current_user();
if ( in_array( $show_code, (array) $currentuser->roles ) ) : ?>

<?php endif; ?>


<div class="showcase-wrapper" style="background-color:<?php the_field('primary_color',$user_ID); ?>">
<div class="exhibitor-wrapper" style="background-image:url('<?php the_field('background_image', $user_ID); ?>')">


</div>


<?php

$tabs = get_field('tabs',$user_ID); ?>


<div class="container full-height">
<div class="show-header">
  <div class="logo">
    <?php 
    $logo = get_field('logo', $user_ID);
    if( !empty( $logo ) ): ?>
        <img src="<?php echo esc_url($logo); ?>" alt="" />
    <?php endif; ?>
  </div>
  <div class="banner" >
  
  </div>
</div>

<div class="show-breadcrumbs" style="background-color:<?php the_field('primary_color',$user_ID); ?>">
  <div class="bc-breadcrumbs">
  <a href="../../" style="font-weight:bold">Hub</a> &raquo; <a href="../../showcases" style="font-weight:bold">Showcases</a> &raquo; <?php echo $company_name; ?>
  </div>
  <div class="bc-contact">
  <a href="#"><?php the_field('phone_number',$user_ID); ?></a><span>|</span><a href="#"><?php the_field('email_address',$user_ID); ?></a>
  </div>
</div>



<div class="show-tabs">

  <style>
  .resp-tab-active {
    border-bottom-color: <?php the_field('primary_color',$user_ID); ?> !important;
  }
  </style>

  <div class="tabs">
    <div id="tab">
      <!-- GENERATE TABS -->
      <ul class="resp-tabs-list">
        <?php if( $tabs && in_array('Welcome', $tabs) ) { echo "<li>Welcome</li>"; } ?>
        <?php if( $tabs && in_array('Videos', $tabs) ) { echo "<li>Videos</li>"; } ?>
        <?php if( $tabs && in_array('Special Offers', $tabs) ) { echo "<li>Special Offers</li>"; } ?>
        <?php if( $tabs && in_array('Featured Products', $tabs) ) { echo "<li>Featured Products</li>"; } ?>
        <?php if( $tabs && in_array('Online Resources', $tabs) ) { echo "<li>Online Resources</li>"; } ?>
        <?php if( $tabs && in_array('Let\'s Connect', $tabs) ) { echo "<li>Let's Connect</li>"; } ?>
        <?php if( $tabs && in_array('Testimonials', $tabs) ) { echo "<li>Testimonials</li>"; } ?>      
      </ul>

    <!-- TAB CONTENT -->
      
      <div class="resp-tabs-container">
        <?php if( $tabs && in_array('Welcome', $tabs) ) { include 'showcase/welcome.php'; } ?>          
        <?php if( $tabs && in_array('Videos', $tabs) ) { include 'showcase/videos.php'; } ?>
        <?php if( $tabs && in_array('Special Offers', $tabs) ) { include 'showcase/offers.php'; } ?>
        <?php if( $tabs && in_array('Featured Products', $tabs) ) { include 'showcase/products.php'; } ?>
        <?php if( $tabs && in_array('Online Resources', $tabs) ) { include 'showcase/resources.php'; } ?>
        <?php if( $tabs && in_array('Let\'s Connect', $tabs) ) { include 'showcase/connect.php'; } ?>
        <?php if( $tabs && in_array('Testimonials', $tabs) ) { include 'showcase/testimonials.php'; } ?>            
      </div>
    </div>
  </div>




</div>










<?php if ( is_user_logged_in() ): ?>



<?php
// check to see which show is marked as active and display
$active_show = get_field('active_show','options');
if( $active_show ): ?>


  <?php
  // check to see if user has access to show. 
  $user = wp_get_current_user();
  $show_start = esc_html( $active_show->show_start_date );
  $ondemand_start = date('Y-m-d', strtotime($show_start . ' + 1 days'));
  $ondemand_end = esc_html( $active_show->on_demand_end_date ); 
  date_default_timezone_set('America/New_York');
  $today = date('Ymd');

  if ( (($today >= $show_start) && ($today <= $ondemand_end)) or in_array( 'staff', (array) $user->roles ) ) : ?>

<div class="presentation-chat-container">
            <div class="chat-title" style="background-color:<?php the_field('primary_color',$user_ID); ?>">
                <div class="title">
                <?php echo $company_name; ?> Showcase Chat
                </div>    
                <div class="controls">
                <svg title="Help" class="chat-help-toggle" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="question-circle" role="img" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 512 512"><path fill="currentColor" d="M504 256c0 136.997-111.043 248-248 248S8 392.997 8 256C8 119.083 119.043 8 256 8s248 111.083 248 248zM262.655 90c-54.497 0-89.255 22.957-116.549 63.758-3.536 5.286-2.353 12.415 2.715 16.258l34.699 26.31c5.205 3.947 12.621 3.008 16.665-2.122 17.864-22.658 30.113-35.797 57.303-35.797 20.429 0 45.698 13.148 45.698 32.958 0 14.976-12.363 22.667-32.534 33.976C247.128 238.528 216 254.941 216 296v4c0 6.627 5.373 12 12 12h56c6.627 0 12-5.373 12-12v-1.333c0-28.462 83.186-29.647 83.186-106.667 0-58.002-60.165-102-116.531-102zM256 338c-25.365 0-46 20.635-46 46 0 25.364 20.635 46 46 46s46-20.636 46-46c0-25.365-20.635-46-46-46z"></path></svg>
                <svg title="Toggle Chat" class="chat-toggle-control" aria-hidden="true" focusable="false" data-prefix="far" data-icon="window-restore"  role="img" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 512 512"><path fill="currentColor" d="M464 0H144c-26.5 0-48 21.5-48 48v48H48c-26.5 0-48 21.5-48 48v320c0 26.5 21.5 48 48 48h320c26.5 0 48-21.5 48-48v-48h48c26.5 0 48-21.5 48-48V48c0-26.5-21.5-48-48-48zm-96 464H48V256h320v208zm96-96h-48V144c0-26.5-21.5-48-48-48H144V48h320v320z"></path></svg>
         
                </div>

            </div>
            <div class="chat-help">
              <ul>
                <li>
                  <div class="chat-question">How do I send a private message?</div>
                  <div class="chat-answer"><p>Click on the recipient's name in the righthand side of the chat window and it will open a private chat with that person.</p></div>
                </li>
                <li>
                  <div class="chat-question">How do I send a private message?</div>
                  <div class="chat-answer"><p>Click on the recipient's name in the righthand side of the chat window and it will open a private chat with that person.</p></div>
                </li>
                <li>
                  <div class="chat-question">How do I send a private message?</div>
                  <div class="chat-answer"><p>Click on the recipient's name in the righthand side of the chat window and it will open a private chat with that person.</p></div>
                </li>              
                <li>
                  <div class="chat-question">How do I send a private message?</div>
                  <div class="chat-answer"><p>Click on the recipient's name in the righthand side of the chat window and it will open a private chat with that person.</p></div>
                </li>
                <li>
                  <div class="chat-question">How do I send a private message?</div>
                  <div class="chat-answer"><p>Click on the recipient's name in the righthand side of the chat window and it will open a private chat with that person.</p></div>
                </li>
                <li>
                  <div class="chat-question">How do I send a private message?</div>
                  <div class="chat-answer"><p>Click on the recipient's name in the righthand side of the chat window and it will open a private chat with that person.</p></div>
                </li>                                  
              </ul>
            </div>            
            <?php echo do_shortcode("[wise-chat channel='" . $company_name . " Showcase" . "']"); ?>
        </div>

</div>

  <?php endif; ?>
    

<?php endif; ?>


<?php endif; ?> 



















</div>
