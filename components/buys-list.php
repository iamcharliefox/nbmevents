<div class="gpx-wrapper">
      <div class="breakaway-buys">
        <div class="container">
            <h3><?php the_title();?></h3>
            <?php the_content(); ?>

            <?php 
            $rows = get_field('breakaway_buy');
            if( $rows ) {

            foreach( $rows as $row ) {
            $title = $row['title'];
            $description = $row['description'];
            $buySponsor = $row['sponsor'];
            $link = $row['link'];
            $image = $row['image'];
            
            echo "<div class='buy-row'>"; //start video row
            echo "<div class='thumbnail'>"; //start video column
            echo "<img src='" . $image . "'>";
            echo "</div>"; //end video column
            echo "<div class='details'>"; //start details column
            echo "<h3>" . $title . "</h3>";
            echo "<p>Sponsored By: " . $buySponsor . "</p>";
            echo $description;

            if ($link ) {
                echo "<a href='" . $link . "' class='button blue-solid' target='_blank'>Learn More</a>";
            }
            
            echo "</div>"; //end details column
            
            echo "</div>"; //end video row
            }

            } ?>
        </div>
    </div>
</div>