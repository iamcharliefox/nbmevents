<?php 
$show_status = get_field('show_status','options'); 
$active_show = get_field('active_show_select','options'); 
$show_code = get_field( 'show_code', $active_show->ID );

$active_role = $show_code . '_titlesponsor';
$title_sponsors = get_users( array( 'role__in' => array( $active_role ) ) );

?>


<div class="gpx-wrapper">
    <div class="hub">
        <div class="title-sponsors">
            <div class="container">
                <h3>TITLE SPONSORS</h3>
                <ul class="sponsor-grid">
                    <?php
                    foreach ( $title_sponsors as $user ) {
                    $user_ID = "user_" . $user->ID; 
                    $logo = get_field('logo', $user_ID);
                    $company_name = get_user_meta( $user->ID, 'username', true );
                    $ID = $user->ID;
                    $user_info = get_userdata($ID);
                    $username = $user_info->user_login;


                    if( !empty( $logo) ) {
                    echo "<li><a href='../sponsor/$username'><img src='" . $logo . "'></a></li>";
                    }

                    };
                    ?>
                </ul>
            </div>
        </div>
    </div>
</div>



