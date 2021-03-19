<div class="gpx-wrapper">
    <div class="quick-tips-container">
        <div class="quicktips">
            <div class="container">
                <h3><?php the_title();?></h3>
                <?php the_content(); ?>

                <?php 
                $rows = get_field('tip');
                if( $rows ) {
                echo "<div class='tip-container'>";
                foreach( $rows as $row ) {
                echo "<div class='tip'>";
                $title = $row['title'];
                $description = $row['description'];
                $video = $row['video'];
                echo "<div class='video-embed'>" . $video . "</div>";
                echo "<div class='details'>";
                echo "<div class='title'>" . $title . "</div>";
                echo "<div class='description'>" . $description . "</div>";
                echo "</div>";
                echo "</div>";
                };
                echo "</div>";
                }
                ?>
            </div>
        </div>    
    </div>
</div>