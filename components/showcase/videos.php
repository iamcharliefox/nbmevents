<div>
<h2>Videos</h2>

<div class="showcase-videos">


<style>
    .video-embed { 
        position: relative; 
        padding-bottom: 56.25%;
        overflow: hidden;
        max-width: 100%;
        height: auto;
    } 

    .video-embed iframe,
    .video-embed object,
    .video-embed embed { 
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }
</style>



<?php 
$rows = get_field('videos',$user_ID);
if( $rows ) {

    foreach( $rows as $row ) {
      $title = $row['video_title'];
      $description = $row['video_description'];
      $category = $row['video_category'];
      $embed = $row['video'];
      
      echo "<div class='video-row'>"; //start video row
      echo "<div class='video-embed'>"; //start video column
      echo $embed;
      echo "</div>"; //end video column
      echo "<div class='details'>"; //start details column
      echo "<h3>" . $title . "</h3>";
      echo "<strong>" . $category . "</strong>";
      echo $description;
      echo "</div>"; //end details column
      
      echo "</div>"; //end video row
    }

} ?>

</div>





</div>