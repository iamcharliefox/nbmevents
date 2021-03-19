<div>
<h2>Testimonials</h2>

<div class="showcase-testimonials">




<?php 
$rows = get_field('testimonial',$user_ID);
if( $rows ) {

    foreach( $rows as $row ) {
      $name = $row['name'];
      $title = $row['title'];
      $testimony = $row['testimony'];
      $image = $row['photo'];
      
      echo "<div class='testimonial-row'>"; //start video row
      echo "<div class='thumbnail'>"; //start video column
     

      if ($image) {
         echo "<img src='" . esc_url($image) . "'>";

        
      } else {
        echo "<img src='" . get_template_directory_uri() . "/assets/images/profile-placeholder.png'>";
      }

      echo "</div>"; //end video column
      echo "<div class='details'>"; //start details column
      echo "<h3>" . $name . "</h3>";
      echo "<h6>" . $title . "</h6>";
      echo $testimony;
      
      echo "</div>"; //end details column
      
      echo "</div>"; //end video row
    }

} ?>

</div>





</div>