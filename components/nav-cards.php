<div class="cards">
    <div class="container">
        <div class="grid">

            <!-- show cards based on page ID -->
            <!-- HUB -->
            <?php if( ! is_page(14) ) : ?>
            <div class="card">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/card-hub.svg" class="bubble">
                <div class="card-inner">
                    <p>Join a Presentation, browse the Showcases, and get answers in the Help Center, all from the GPX Breakaway Hub.</p>
                    <a href="<?php echo get_site_url(); ?>" class="button blue-solid">Event Hub</a>
                </div>
            </div>
            <?php endif; ?>

            <!-- presentations -->
            <?php if( ! is_archive('presentations') ) : ?>
            <div class="card">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/card-presentations.svg" class="bubble">
                <div class="card-inner">
                    <p>Expand your knowledge base, improve your processes, increase sales, and realize greater profits through this lineup of educational video Presentations with live chat.</p>
                    <a href="<?php echo get_site_url(); ?>/presentations" class="button blue-solid">View Presentation Schedule</a>
                </div>
            </div>
            <?php endif; ?>

            <!-- showcases -->
            <?php if( ! is_page(86) ) : ?>
            <div class="card">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/card-showcases.svg" class="bubble">
                <div class="card-inner">
                    <p>Check out the latest from top manufacturers and suppliers. Each sponsored Showcase includes live chat, new and featured product information, online resources, special offers, videos, and more.</p>
                    <a href="<?php echo get_site_url(); ?>/showcases" class="button blue-solid">Visit Showcases</a>
                </div>
            </div>
            <?php endif; ?>            

            <!-- quick tips -->
            <?php if( ! is_page(554) ) : ?>
            <div class="card">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/card-tips.svg" class="bubble">
                <div class="card-inner">
                    <p>Pick up a bite-sized tip or trick of the trade with Reel Quick Tips from industry experts.</p>
                    <a href="<?php echo get_site_url(); ?>/quick-tips" class="button blue-solid">Reel Quick Tips</a>
                </div>
            </div>
            <?php endif; ?>                   

            <!-- breakaway buys -->
            <?php if( ! is_page(612) ) : ?>
            <div class="card">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/card-bb.svg" class="bubble">
                <div class="card-inner">
                    <p>Take advantage of these GPX Breakaway-exclusive offers and deals from our sponsors.</p>
                    <a href="<?php echo get_site_url(); ?>/breakaway-buys" class="button blue-solid">Breakaway Buys</a>
                </div>
            </div> 
            <?php endif; ?>                    
          
        </div>
    </div>
</div>