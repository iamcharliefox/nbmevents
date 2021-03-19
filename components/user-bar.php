welcome
<?php global $current_user;
wp_get_current_user();
echo $current_user->display_name;
?>

<a href="<?php echo wp_logout_url( home_url() ); ?>">Logout</a>

