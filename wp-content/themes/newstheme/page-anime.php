<?php 

    include 'header.php';?>
<main>
<?php
    $args = array (
        'showposts' => '1',
        'category_name' => 'Anime',
        'paged' => $paged
    );
    $the_query = new WP_Query( $args );

    if(have_posts()):
        while($the_query->have_posts()) : $the_query->the_post(); ?>
    <h2><?php the_title(); ?></h2>
    <p><?php the_content(); ?></p>
    <?php   endwhile;
    else:
        echo '<p>No content found</p>';
    endif;
    ?>
    </main>
<?php
    include 'footer.php';
?>