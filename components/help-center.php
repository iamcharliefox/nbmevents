<div class="gpx-wrapper">
    <div class="help-center">
        <div class="container">
            <h3><?php the_title();?></h3>
            <?php the_content(); ?>

            <?php 
            $rows = get_field('topic');
            if( $rows ) {

            foreach( $rows as $row ) {
            $title = $row['title'];
            $instructions = $row['instructions'];


            echo "<div class='help-row'>"; 

            echo "<div class='details'>"; 
            echo "<h5>" . $title . "</h5>";
            echo $instructions;



            echo "</div>"; 

            echo "</div>"; 
            }

            } ?>
        </div>
    </div>
</div>