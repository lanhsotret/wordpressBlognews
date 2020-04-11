<div class='news-<?php echo $post->post_type; ?>__path'>
<div class='news-<?php echo $post->post_type; ?>__pathChild path-wrap'>
    <div><a href="<?php echo get_post_type_archive_link( $post->post_type ) ?>" title="view all <?php echo $post->post_type; ?>"><?php echo $post->post_type; ?></a></div>
    <?php $categories = get_the_category();
        foreach( $categories as $category ) { ?>
        <div><a href="<?php echo esc_url( get_category_link( $category->term_id ) ); ?>" title="view all <?php echo esc_attr( $category->name ); ?>"><?php echo esc_html( $category->cat_name ); ?></a></div>
        <?php }
    ?>
    <div><span><?php echo esc_html( $post->post_title ); ?></span></div>
    </div>
</div>