<?php get_header(); ?>


<?php $show_status = get_field('show_status','options'); ?>


<?php if ( is_user_logged_in() ): ?>
  <?php get_template_part( 'components/user-bar'); ?>
  <?php get_template_part( 'components/navigation'); ?>

  
  <!-- VIP ////////////////////////// -->
  <?php if ($show_status == "VIP") : ?>

    <?php if (check_user_roles( array( 'administrator', 'staff', 'sponsor' ) )) : ?>
      <?php get_template_part( 'components/hero-small'); ?>
      <?php get_template_part( 'components/quick-tips'); ?>
      <?php get_template_part( 'components/nav-cards'); ?>    
    <?php else : ?>
      <!-- you are not able to access this show yet. starting soon... -->
      <?php get_template_part( 'components/starting-soon'); ?>
    <?php endif; ?>


  <!-- LIVE OR ON-DEMAND ////////////////////////// -->
  <?php elseif (($show_status == "Live") or ($show_status == "On-Demand")) : ?>

    <?php get_template_part( 'components/hero-small'); ?>
    <?php get_template_part( 'components/quick-tips'); ?>
    <?php get_template_part( 'components/nav-cards'); ?>  

  
  <!-- INACTIVE ////////////////////////// -->
  <?php else : ?>

    <?php if (check_user_roles( array( 'administrator', 'staff' ) )) : ?>
      <?php get_template_part( 'components/hero-small'); ?>
      <?php get_template_part( 'components/quick-tips'); ?>
      <?php get_template_part( 'components/nav-cards'); ?>    
    <?php else : ?>
      <!-- Message for logged in sponsors or attendees and show is inactive. -->
      <?php get_template_part( 'components/show-inactive'); ?>
    <?php endif; ?>  


  <?php endif; ?>

<?php else : ?>
  <!-- you must be logged in to view this... -->
  <?php get_template_part( 'components/not-logged-in'); ?>
<?php endif; ?>



<?php get_footer(); ?>