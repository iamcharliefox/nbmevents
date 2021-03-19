<div>
<h2>Featured Products</h2>

<div class="featured-products">




<?php 
$rows = get_field('featured_products',$user_ID);
if( $rows ) {

    foreach( $rows as $row ) {
      $title = $row['product_title'];
      $description = $row['product_description'];
      $featured_image = $row['featured_image'];
      $gallery = $row['product_photo'];
      $link = $row['link'];
      
      echo "<div class='product-row'>"; //start video row
      echo "<div class='thumbnail'>"; //start video column
      echo "<img src='" . $featured_image . "'>";
      echo "</div>"; //end video column
      echo "<div class='details'>"; //start details column
      echo "<h3>" . $title . "</h3>";
      echo $description; 
      if ($link ) {
        echo "<a href='" . $link . "' class='button blue-solid' style='margin-left:0;background-color:" . get_field('primary_color',$user_ID) . ";border-color:" . get_field('primary_color',$user_ID) . ";' target='_blank'>Learn More</a>";
      }      
      ?>


      
      <?php echo "</div>"; //end details column
      
      echo "</div>"; //end video row
    }

} ?>

</div>





</div>