<?php 
$show_status = get_field('show_status','options'); 
$active_show = get_field('active_show_select','options'); 
$on_demand_details = get_field( 'on_demand_details', $active_show->ID );
$show_start_date = get_field( 'show_start_date', $active_show->ID );
?>



<div class="gpx-hero">
    <div class="hero-overlay"></div>
    <div class="container">
        <div class="grid">
            <div class="hero-inner">
                <h1><?php echo $active_show->post_title; ?></h1>
                <h3><?php echo esc_html( $show_start_date ); ?></h3>
                <h5><?php echo esc_html( $on_demand_details ); ?></h5>
            </div>
        </div>
    </div>
</div>

