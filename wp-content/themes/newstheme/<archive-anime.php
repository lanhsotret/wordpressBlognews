<?php include 'header.php'; ?>
<main>
<section class="news-primary">
<?php
    $idParent = get_the_ID( $post->post_type );
    if( get_post_type( $idParent ) == 'anime' ) {
    $args = array(
        'posts_per_page' => -1,
        'post_type' => get_post_type( $idParent ),
        'post_status' => 'publish'
    );
    $pageQuery = new WP_Query($args);
    if( $pageQuery->have_posts() ) {
        while( $pageQuery->have_posts() ) {
            $pageQuery->the_post();
            include "vendor/newsanime.php";
        }
    } else {
        echo '<p>No content found</p>';
    }}?>
</section>
</main>
<?php include 'footer.php'; ?>