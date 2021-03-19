<div>
<h2>Offers</h2>

<div class="showcase-offers">




<?php 
$rows = get_field('special_offers',$user_ID);
if( $rows ) {

    foreach( $rows as $row ) {
      $title = $row['title'];
      $description = $row['description'];
      $breakaway = $row['offer_type'];
      $link = $row['link'];
      $image = $row['image'];
      
      echo "<div class='offer-row'>"; //start video row
      echo "<div class='thumbnail'>"; //start video column
      echo "<img src='" . $image . "'>";
      echo "</div>"; //end video column
      echo "<div class='details'>"; //start details column
      echo "<h3>" . $title . "</h3>";
      if ($breakaway == true) {
        echo "<div class='bb'>Breakaway Buy</div>";
      };
      echo $description;

      if ($link ) {
        echo "<a href='" . $link . "' class='button blue-solid' style='background-color:" . get_field('primary_color',$user_ID) . ";border-color:" . get_field('primary_color',$user_ID) . ";'>Learn More</a>";
      }
      
      echo "</div>"; //end details column
      
      echo "</div>"; //end video row
    }

} ?>

</div>





</div>