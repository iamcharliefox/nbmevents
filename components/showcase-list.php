<?php 
$show_status = get_field('show_status','options'); 
$active_show = get_field('active_show_select','options'); 
$show_code = get_field( 'show_code', $active_show->ID );
?>

<div class="gpx-wrapper">

    <div class="showcases">


        <div class="showcase-grid-container">
            <div class="container">
                <h3>SHOWCASES</h3>
                <ul class="showcase-grid">

                <?php
                $active_role = $show_code . '_sponsor';
                
                $title_sponsors = get_users( array( 'role__in' => array( $active_role ) ) );
                // Array of WP_User objects.
                foreach ( $title_sponsors as $user ) {
                    $user_ID = "user_" . $user->ID; 
                    $logo = get_field('logo', $user_ID);
                    $sponsor = "";
                    $ID = $user->ID;
                    $user_info = get_userdata($ID);
                    $username = $user_info->user_login;   
                    $active_sponsor =   strtolower($show_code) . '_titlesponsor';
                    if ( in_array( $active_sponsor, (array) $user->roles ) ) {
                    $sponsor = "sponsor";
                    };
                    $company_name = get_user_meta( $user->ID, 'nickname', true );
                    if( !empty( $logo) ) {
                    echo "<li class='$sponsor'><a href='../sponsor/$username'><div class='square' style='background-image:url(" . $logo . ")'></div></a>";
                    } ?>
                    <div class="info">
                    <div class="company">
                        <?php echo $company_name; ?></div>
                    <div class="description"><?php the_field('description',$user_ID); ?></div>
                    </div>
                        <?php
                        if ( in_array( $active_sponsor, (array) $user->roles ) ) {
                            //The user has the "author" role
                            echo "<div class='flag'>TITLE<br/>SPONSOR</div>";
                        }
                        ?>            
                    
                    </li>
                <?php };
                ?>                

                </ul>
            </div>
        </div>
    </div>
</div>
                    