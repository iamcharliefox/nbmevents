<?php 
$show_status = get_field('show_status','options'); 
$active_show = get_field('active_show_select','options'); 
$show_code = get_field( 'show_code', $active_show->ID );

$active_role = $show_code . '_titlesponsor';
$title_sponsors = get_users( array( 'role__in' => array( $active_role ) ) );

?>




<div class="gpx-wrapper">
    <div class="container" style="padding-bottom:24px;">

        <div class="presentation-header">
            <div class="presentation-logo">
                <?php
                $user = get_field("exhibitor");
                $user_ID = 'user_' . $user['ID']; 
                $logo = get_field('logo', $user_ID);
                if( !empty( $logo ) ): ?>
                    <img src="<?php echo esc_url($logo); ?>" alt="" />
                <?php endif; ?> 
            </div>
            <div class="presentation-title">
                <?php the_title();?>
            </div>             
            <div class="presentation-speakers">
                <a class="button blue-solid" ID="speakerToggle">VIEW SPEAKERS</a>
            </div>
        </div>

        <div class="presentation-video-container">
            <div class="speaker-container">
                <?php
                $rows = get_field('speaker');
                if( $rows ) {
    
                    foreach( $rows as $row ) {
                        $speakername = $row['name'];
                        $speakercompany = $row['company'];
                        $speakerbio = $row['bio'];
                        $speakerphoto = $row['photo'];
                        echo '<div class="speaker-grid-row">';
                        echo '<div class="photo" style="background-image:url(' . $speakerphoto . ')"></div>';
                        echo '<div class="bio">';
                        echo '<div class="name">' . $speakername . '</div>';
                        echo '<div class="company">' . $speakercompany . '</div>';
                        echo '<p>' . $speakerbio . '</p>';
                        echo '</div></div>';
                    }
                }
                ?>
            </div>
        </div>

        <style>
            .embed-container { 
                position: relative; 
                padding-bottom: 56.25%;
                overflow: hidden;
                max-width: 100%;
                height: auto;
            } 

            .embed-container iframe,
            .embed-container object,
            .embed-container embed { 
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
            }
        </style>    
        <div class="embed-container">
            <?php the_field('video'); ?>
        </div>        


        <div class="presentation-chat-container">
            <div class="chat-title">
                <div class="title">
                    Chat
                </div>    
                <div class="controls">
                    <svg title="Help" class="chat-help-toggle" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="question-circle" role="img" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 512 512"><path fill="currentColor" d="M504 256c0 136.997-111.043 248-248 248S8 392.997 8 256C8 119.083 119.043 8 256 8s248 111.083 248 248zM262.655 90c-54.497 0-89.255 22.957-116.549 63.758-3.536 5.286-2.353 12.415 2.715 16.258l34.699 26.31c5.205 3.947 12.621 3.008 16.665-2.122 17.864-22.658 30.113-35.797 57.303-35.797 20.429 0 45.698 13.148 45.698 32.958 0 14.976-12.363 22.667-32.534 33.976C247.128 238.528 216 254.941 216 296v4c0 6.627 5.373 12 12 12h56c6.627 0 12-5.373 12-12v-1.333c0-28.462 83.186-29.647 83.186-106.667 0-58.002-60.165-102-116.531-102zM256 338c-25.365 0-46 20.635-46 46 0 25.364 20.635 46 46 46s46-20.636 46-46c0-25.365-20.635-46-46-46z"></path></svg>
                    <svg title="Toggle Chat" class="chat-toggle-control" aria-hidden="true" focusable="false" data-prefix="far" data-icon="window-restore"  role="img" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 512 512"><path fill="currentColor" d="M464 0H144c-26.5 0-48 21.5-48 48v48H48c-26.5 0-48 21.5-48 48v320c0 26.5 21.5 48 48 48h320c26.5 0 48-21.5 48-48v-48h48c26.5 0 48-21.5 48-48V48c0-26.5-21.5-48-48-48zm-96 464H48V256h320v208zm96-96h-48V144c0-26.5-21.5-48-48-48H144V48h320v320z"></path></svg>       
                </div>
            </div>
            <div class="chat-help">
              <ul>
                <li>
                  <div class="chat-question">How do I send a private message?</div>
                  <div class="chat-answer"><p>Click on the recipient's name in the righthand side of the chat window and it will open a private chat with that person.</p></div>
                </li>
                <li>
                  <div class="chat-question">What do the colors mean?</div>
                  <div class="chat-answer"><p>Click on the recipient's name in the righthand side of the chat window and it will open a private chat with that person.</p></div>
                </li>
                <li>
                  <div class="chat-question">How do I send a private message?</div>
                  <div class="chat-answer"><p>Click on the recipient's name in the righthand side of the chat window and it will open a private chat with that person.</p></div>
                </li>              
                <li>
                  <div class="chat-question">How do I send a private message?</div>
                  <div class="chat-answer"><p>Click on the recipient's name in the righthand side of the chat window and it will open a private chat with that person.</p></div>
                </li>
                <li>
                  <div class="chat-question">How do I send a private message?</div>
                  <div class="chat-answer"><p>Click on the recipient's name in the righthand side of the chat window and it will open a private chat with that person.</p></div>
                </li>
                <li>
                  <div class="chat-question">How do I send a private message?</div>
                  <div class="chat-answer"><p>Click on the recipient's name in the righthand side of the chat window and it will open a private chat with that person.</p></div>
                </li>                                  
              </ul>
            </div>  
            <?php echo do_shortcode("[wise-chat channel='" . "Presentation - " . get_the_title() . "' sound_notification='1']"); ?>
        </div>
    </div>
</div>



