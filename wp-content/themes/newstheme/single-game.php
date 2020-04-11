<?php 
    include 'header.php'; ?>
<main>
<?php the_post(); ?>
<?php include 'vendor/insertPath.php'; ?>
    <section class='news-<?php echo $post->post_type; ?>'>
        <h3 class="news-<?php echo $post->post_type; ?>__title"><?php the_title(); ?></h3>
        <?php the_post_thumbnail(); ?>
        <div class="news-<?php echo $post->post_type; ?>__line">
            <div></div>
            <i class="fa fa-gamepad fa-2x fa-fw mx-2" aria-hidden="true"></i>
            <div></div>
        </div>
        <h3>Game Overview</h3>
        <?php $infoGame = get_field('extramore');?>
        <div class="news-<?php echo $post->post_type; ?>__developer">
            <i class="fa fa-user-circle-o fa-fw" aria-hidden="true"></i>
            <p class="d-inline">DEVELOPER:</p>
            <?php 
            foreach( $infoGame['developer'] as $developer ) { ?>
                <span><?php echo esc_html( $developer->name ); ?></span>
            <?php } ?>
        </div>
        <div class="news-<?php echo $post->post_type; ?>__publisher">
            <i class="fa fa-user-circle-o fa-fw" aria-hidden="true"></i>
            <p class="d-inline">PUBLISHER:</p>
            <?php 
            foreach( $infoGame['publisher'] as $publisher ) { ?>
                <span><?php echo esc_html( $publisher->name ); ?></span>
            <?php } ?>
        </div>
        <div class="news-<?php echo $post->post_type; ?>__release">
            <i class="fa fa-clock-o fa-fw" aria-hidden="true"></i>
            <p class="d-inline">RELEASE DATE:</p>
            <span><?php echo $infoGame['release']; ?></span>
        </div>
        <div class="news-<?php echo $post->post_type; ?>__genre mb-3">
            <i class="fa fa-tags fa-fw" aria-hidden="true"></i>
            <p class="d-inline">GENRE:</p>
            <?php  the_category(); ?>
        </div>
        <?php the_content(); ?>
        <div class="news-<?php echo $post->post_type; ?>__line">
            <div></div>
            <i class="fa fa-gamepad fa-2x fa-fw mx-2" aria-hidden="true"></i>
            <div></div>
        </div>
        <h3> Trailer Gameplay</h3>
        <div><?php echo $infoGame['trailer']; ?></div>
        <div class="news-<?php echo $post->post_type; ?>__line">
            <div></div>
            <i class="fa fa-gamepad fa-2x fa-fw mx-2" aria-hidden="true"></i>
            <div></div>
        </div>
        <h3>System Requirement</h3>
        <div>
            <h4>Minimum:</h4>
            <?php echo $infoGame['system']["minimum"];?>
            <h4>Recommended:</h4>
            <?php echo $infoGame['system']["recommend"];?>
        </div>
        <div class="news-<?php echo $post->post_type; ?>__line">
            <div></div>
            <i class="fa fa-gamepad fa-2x fa-fw mx-2" aria-hidden="true"></i>
            <div></div>
        </div>
        <h3>Link Download: </h3>
        <h4><a href="<?php echo esc_url( $infoGame['downloadlink']['url'] ); ?>" target="_blank" title="<?php echo get_the_title() . " free download"  ?>" class="text-uppercase"><?php echo esc_html( $infoGame['downloadlink']['title'] ); ?></a></h4>
        
    </section>
</main>
<?php
    include 'footer.php';
?>