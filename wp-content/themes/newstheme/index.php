<?php 
    include 'header.php'; ?>
<main>
    <section class='news-primary'>
        <?php if(have_posts()): while(have_posts()) : the_post(); ?>
        <div class="news-primary__particle py-4">
            <figure class="news-primary__figure mr-3">
                <?php the_post_thumbnail(); ?>
            </figure>
            <div class="news-primary__info">
                <h3 class="news-primary__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                <?php the_excerpt(); ?>
            </div>
        </div>
        <?php endwhile; else:
        echo '<p>No content found</p>';
    endif;?>
    </section>
    <section class="news-latest"></section>
    <section class="news-popular"></section>
</main>
<?php
    include 'footer.php';
?>