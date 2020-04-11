<?php 
    include 'header.php'; ?>
<main>
    <section class='news-primary'>
        <?php
            $home = strtolower( get_the_title() );
            $args = array(
                'posts_per_page' => -1,
                'post_type' => array(
                    'post',
                    'Anime',
                    'Manga',
                    'Live Action',
                    'Drama',
                    'Game',
                    'Light Novel',
                    'Music',
                    'Cosplay',
                    'Figure',
                    'Gallery'
                ),
                'post_status' => 'publish'
            );
            
            $NewsQuery = new WP_Query($args);
            while( $NewsQuery->have_posts() ) {
                $NewsQuery->the_post(); ?>
            <?php if($post->post_type == 'figure') {
                $idParent = $post->ID;
                include 'vendor/news' . get_post_type( $idParent ) . '.php';
            } else { ?>
                <div class="news-page<?php echo $home; ?>__particle">
                    <?php 
                    if( has_post_thumbnail($post->ID) ){ ?>
                        <figure class="news-page<?php echo $home; ?>__figure mr-3">
                            <a href="<?php  echo get_permalink( $post->ID ); ?>" title="<?php echo esc_attr( $post->post_title ); ?>">
                            <?php the_post_thumbnail(); ?>
                            </a>
                        </figure>
                    <?php ;} ?>
                    <div class="news-page<?php echo $home; ?>__info">
                        <h3 class="news-page<?php echo $home; ?>__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <div class="news-page<?php echo get_post_type( $idParent); ?>__meta mb-2">
            <i class="fa fa-clock-o" aria-hidden="true"></i>
            <span>Date Post: </span><span><?php echo get_the_time('F j, Y g: i A'); ?></span>
            <span> | </span>
            <span>By </span>
            <i class="fa fa-user-o fa-fw" aria-hidden="true"></i>
            <a href="<?php echo get_author_posts_url( get_the_author_meta("ID") ) ?>" class="text-capitalize"><?php the_author(); ?></a>
        </div>
                        <?php $excerpt = get_the_excerpt(); ?>
                        <p><?php echo substr($excerpt, 0, 200) . "[...]"; ?></p>
                    </div>
                    <div class="text-uppercase news-page<?php echo $home; ?>__element">
                        <a href="<?php echo get_post_type_archive_link( $post->post_type )?>" title="view all <?php echo $post->post_type;?>"><?php echo $post->post_type;?></a>
                    </div>
                </div>
            <?php } }?>
    </section>
</main>
<?php
    include 'footer.php';
?>