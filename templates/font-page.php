<?php
  get_header();
?>


<?php
$today = date('Y-m-d');
$found = false;

if( have_rows('shows','options') ):

  // Loop through rows.
  while( have_rows('shows','options') ) : the_row();

  // Load sub field values
  $show_name = get_sub_field('show_name');

  $show_start = get_sub_field('show_date');
  $show_start_nice = date('F j, Y', strtotime($show_start));
  $show_start_nice_multi = date('F j', strtotime($show_start));

  $show_end = get_sub_field('event_end');
  $show_end_nice = date('F j, Y', strtotime($show_end));      
  $show_end_nice_multi = date('j, Y', strtotime($show_end));          

  $ondemand_start = date('Y-m-d', strtotime($show_end. ' + 1 days'));
  $ondemand_start_nice = date('F j', strtotime($ondemand_start));

  $ondemand_end = get_sub_field('demand_end');
  $ondemand_end_nice = date('F j', strtotime($ondemand_end));


  if (($today >= $show_start) && ($today <= $ondemand_end)) {

    echo "<div class='gpx-hero'>";
    echo "<div class='hero-overlay'></div>";
    echo "<div class='container'>";
    echo "<div class='grid'>";
    echo "<div class='hero-inner'>";

    $found = true;
    echo "<h5>EVENT HUB</h5>";  
    echo "<h1>" . $show_name . "</h1>";

    if ($show_start == $show_end) {
    echo "<h3 class='blink'>LIVE NOW!</h3>";
    } 
    else {
    // TODO: refactor this to show names of days - today through friday
    echo "<h3>" . $show_start_nice_multi . "-" . $show_end_nice_multi ."</h3>";
    }
    // TODO: refactor this to omit second month name if its the same as the first
    echo "<h6>With ON DEMAND Access " . $ondemand_start_nice . " - " . $ondemand_end_nice . "</h6>"; 
    };

    echo "</div></div></div></div>";
    
  // End loop.
  endwhile;

endif; 

if (($today >= $show_start) && ($today <= $ondemand_end)) {
  
  get_template_part( 'template-parts/hub/hub');
}

if (!$found) {
  echo '<div class="gpx-wrapper"><div class="container offline"><center><h6 style="padding:50px 0;">There are currently no events in progress. Please check back later.</h6></center></div></div>';
}
?>




<?php
  get_footer();
?>