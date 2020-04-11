<?php 
    include 'header.php'; ?>
<main>
<section class="news-primary">
<?php
$idParent = get_the_ID( $post->post_type );
function formatachive ($post_type) {
global $idParent;
global $wp_query;
global $post;
    if( get_post_type( $idParent ) == $post_type ) {
        $args = array(
            'posts_per_page' => -1,
            'post_type' => $post_type,
            'post_status' => 'publish'
        );
        $pageQuery = new WP_Query($args);
        if( $pageQuery->have_posts() ) {
            while( $pageQuery->have_posts() ) {
                $pageQuery->the_post();
                $$idParent = $post->ID;
                include "vendor/news" . $post_type . ".php";
            }
        } else {
            echo '<p>No content found</p>';
        }
    }
}
formatachive ("anime");
formatachive ("figure");
if( get_post_type( $idParent ) != 'anime' && get_post_type( $idParent ) != 'figure' ) {
    while(have_posts() ) {
        the_post();
        $$idParent = $post->ID;
        include "vendor/newsgeneral.php";
    }
}?>
</section>
</main>
<?php
    include 'footer.php';
?>