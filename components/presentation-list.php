<?php 
$show_status = get_field('show_status','options'); 
$active_show = get_field('active_show_select','options'); 
$show_code = get_field( 'show_code', $active_show->ID );

$args =  array( 
  'post_type' => 'presentations',
  'meta_key' => 'start_time',
  'orderby' => 'meta_value',
  'order' => 'ASC',
  'posts_per_page' => '-1',
  'meta_query' => array(
    array(
        'meta_key'  => 'show_code',
        'compare'   => '=',
        'value'     => $show_code,
    ),
),  
);

$the_query = new WP_Query( $args );

?>


<div class="gpx-wrapper">
    <div class="presentations <?php echo $show_status; ?>" id="presentation-list">
        <div class="presentation-grid-container">
            <div class="container">
                <h3>PRESENTATION SCHEDULE</h3>
                <h5>
                <?php
                // date_default_timezone_set("America/New_York");
                $time_date_data = date("g:i a");
                $et_time = date('g:i a', strtotime($time_date_data) - 60 * 60 * 4);
                echo "The time on the east coast is " . $et_time;
                ?>
                </h5>
                <ul class="presentation-grid">



                <?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                    <?php 
                    $user = get_field('exhibitor');
                    $user_id = $user['ID'];
                    $user_meta = get_userdata($user_id);
                    $user_roles = $user_meta->roles;
                    $username = $user_meta->user_login;
                    $title_sponsor = "";
                    $active_role = get_field('show_code') . '_titlesponsor';
                    if ( in_array( $active_role, $user_roles, true ) ) {
                    //The user has the "author" role
                    $title_sponsor = "sponsor";
                    };
                    ?>

                    <li class="<?php echo $title_sponsor; ?> presentation-item">

                        <div class="details">
                            <div>
                                <div class="time">
                                    
                                    <span class="start-time"><?php the_field('start_time'); ?></span>
                                    -
                                    <span class="end-time"><?php the_field('end_time'); ?></span>
                                    (<?php the_field('time_zone'); ?>)
                                </div>

                            <a href="<?php the_permalink(); ?>" class="button blue-solid button-state <?php echo $title_sponsor; ?> disabled"><?php the_field('button_text'); ?></a>

                            </div>
                        </div>
                        <div class="info">
                        <?php if ($title_sponsor == "sponsor"){
                            echo "<div class='sponsored'>" . "TITLE SPONSOR" . "</div>";
                        }; ?>
                            <div class="company"><?php the_title() ;?></div>
                            <div class="description"><?php the_field('description'); ?></div>

                            <div class="by">Presented By: <a href="../sponsor/<?php echo $username; ?>"><?php echo $user['display_name']; ?></a></div>
                        </div>

                    </li>

                    <?php endwhile; else: ?> <p>Sorry, there are no presentations to display</p> <?php endif; ?>
                    <?php wp_reset_query(); ?>



                </ul>
            </div>
        </div>
    </div>
</div>