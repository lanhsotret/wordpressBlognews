<?php 
    include 'header.php'; ?>

<?php the_post(); ?>
<main class='news-<?php echo $post->post_type; ?>'>
<?php include 'vendor/insertPath.php'; ?>
    <div class='news-<?php echo $post->post_type; ?>__boardInfo'>
    <section class='news-<?php echo $post->post_type; ?>__details mr-3'>
        <figure class='news-<?php echo $post->post_type; ?>__figure'><?php the_post_thumbnail(); ?></figure>
        <?php $info = get_field( 'information' ); ?>
        <div class='news-<?php echo $post->post_type; ?>__alterName'>
            <h4>Alternative Titles</h4>
            <?php echo $info[ 'alternative_titles' ]; ?>
        </div>
        <div class='news-<?php echo $post->post_type; ?>__info'>
            <h4>Information</h4>
            <?php $key_word = array_keys( $info[ 'details' ] );
                foreach( $key_word as $nameTitle ) { ?>
            <?php if( $nameTitle == "source") { ?>
            <div>
                <span><b><?php echo ucwords( $nameTitle ); ?></b></span>
                <span><?php echo $info[ 'details' ][ $nameTitle ]; ?></span>
            </div>
            <div>
                <span><b>Genre:</b></span>
                <?php the_category(); ?>
            </div>
            <?php } ?>
            <div>
                <span><b><?php echo ucwords( $nameTitle); ?>:</b></span>
                <?php if( is_string( $info[ 'details' ][ $nameTitle ] ) ) { ?>
                <span><?php echo $info[ 'details' ][ $nameTitle ]; ?><span>
                        <?php } else { ?>
                        <span><?php foreach( $info[ 'details' ][ $nameTitle ] as $content) {
                        echo $content->name;
                    } ?></span> <?php } ?>
            </div>
            <?php } ?>
        </div>
        <div class='news-<?php echo $post->post_type; ?>__music'>
            <h4>Music</h4>
        <?php $music = get_field('music'); ?>
        <?php if( $music[ 'opening' ] ) { ?>
            <div class='news-<?php echo $post->post_type; ?>__opening'>
                <span>Opening:</span>
                <span><?php echo sanitize_text_field( $music[ 'opening' ] ); ?></span>
            </div>
        <?php } 
        if( $music[ 'ending' ] ) { ?>
            <div class='news-<?php echo $post->post_type; ?>__ending'>
                <span>Ending:</span>
                <span><?php echo sanitize_text_field( $music[ 'ending' ] ); ?></span>
            </div>
        <?php } ?>
        </div>
    </section>
    <section class='news-<?php echo $post->post_type; ?>__content'>
        <h3 class="news-<?php echo $post->post_type; ?>__title"><?php the_title(); ?></h3>
        <?php the_content(); ?>
        <div class='news-<?php $postType = $post->post_type; echo $postType; ?>__cast'>
            <h4>Characters & Voice Actors</h4>
        <?php
        $IDparent = $post->ID;
        $chars = get_field( 'actor' );
        $art = explode( ";", $chars['voice_actors'] );
        $char = explode( ";", $chars['characters'] );
        $length = count( $char );
        for( $i = 0; $i < $length; $i++) {
            $argChars = array(
                'post_type' => 'character',
                'post_status' => 'publish',
                'tag_slug__and' => array( strtolower( get_the_title($IDparent) ), trim( $char[$i], " " )),
                'posts_per_page' => -1,
            );
            $charQuery = new WP_Query( $argChars );
            if( $charQuery->have_posts() ) {
                $charQuery->the_post(); ?>
                    <div class='news-<?php echo $postType; ?>__actor'>
                    <figure><?php the_post_thumbnail(); ?></figure>
                    <div><h4><?php echo sanitize_text_field( $char[$i] ); ?></h4>
                    <p class="text-uppercase">detals</p>
                    <?php 
                    $argArts = array(
                        'post_type' => 'art',
                        'post_status' => 'publish',
                        'tag_slug__and' => array( strtolower( get_the_title($IDparent) ), trim( $art[ $i ], " ") ),
                        'posts_per_page' => -1
                    );
                    $ArtQuery = new WP_Query( $argArts );
                    if( $ArtQuery->have_posts() ) {
                        $ArtQuery->the_post(); ?>
                            <div class='news-<?php echo $postType; ?>__child'>
                            <h4><?php echo sanitize_text_field( $art[$i]); ?></h4>
                            <figure><?php the_post_thumbnail(); ?></figure>
                            </div></div>
                    <?php }
            }
            echo '</div>';
        }?>
        </div>
    </section>
    </div>
    <section class='news-<?php echo $postType; ?>__trailer'>
    <h4>Trailer</h4>
    <?php
    $parent = new WP_Query( $IDparent );
    $parent->the_post();
    $trailer = sanitize_text_field( get_field( 'trailer' ) );
    $video = explode( " ", $trailer ); ?>
    <?php if( count($video) > 1) { ?>
    <div class='news-<?php echo $postType; ?>__playVideo'></div>
    <div class='news-<?php echo $postType; ?>__iframeParent'>
    <?php foreach( $video as $key => $particle ) {
        $url = substr($particle, 4);
        if ($key === 0) {
            echo '<div class="news-' . $postType . '__iframe active"><iframe src="'. $url .'" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>';
        } else {
            echo '<div class="news-' . $postType . '__iframe"><iframe src="'. $url .'" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>';
        }
    }?>
    </div>
    <?php } else {
        if( is_null($video) ) {
            echo '<div class="news-' . $postType . '__playVideo"><iframe src="'. $url .'" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>';
        }
    }?>
    <script>
        $('iframe').on('load', function(){
            $('.news-<?php echo $postType; ?>__playVideo').html($('.news-<?php echo $postType; ?>__iframe.active iframe').clone());
            $('.news-<?php echo $postType; ?>__iframe').on('click', function(){
                $('.news-<?php echo $postType; ?>__iframe').removeClass('active');
                $(this).addClass('active');
                $('.news-<?php echo $postType; ?>__playVideo').html($('.news-<?php echo $postType; ?>__iframe.active iframe').clone());
            });
        });
        let condition = document.querySelector('.news-<?php echo $postType; ?>__iframeParent').childElementCount;
        if(condition > 4) {
            $("<button class='.news-<?php echo $postType; ?>__btn active'><a href='#button'></a></button><button><a href='#button'></a></button>").appendTo('.news-<?php echo $postType; ?>__iframeParent');
        }
        console.log('news-<?php echo $postType; ?>__trailer');
    </script>

    </section>
    <?php $source = get_field("related"); ?>
    <div class='news-<?php echo $postType; ?>__watch'>
        <h4 class="text-uppercase">Watch</h4>
        <a href="<?php echo esc_url($source['linkwatch']['url']); ?>" title="<?php echo "watch " . get_the_title($IDparent); ?>" target="_blank"><?php echo esc_html($source['linkwatch']['title']); ?></a>
    </div>
    <div class='news-<?php echo $postType; ?>__source'>
    <h4 class="text-uppercase">source</h4>
        <a href="<?php echo esc_url($source['source']['url']); ?>" title="<?php echo "more information about ". get_the_title($IDparent); ?>" target="_blank"><?php echo esc_html($source['source']['title']); ?></a>
    </div>
</main>
<?php
    include 'footer.php';
?>