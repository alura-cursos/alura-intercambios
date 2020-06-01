<?php
require_once 'header.php';

$args = array('post_type' => 'destinos' );
$query = new WP_Query($args);
if ($query->have_posts()):
    while($query->have_posts()): $query->the_post();
        the_post_thumbnail();
        the_title();
        the_content();
    endwhile;
endif;
require_once 'footer.php';