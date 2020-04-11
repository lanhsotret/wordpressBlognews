<?php global $idParent; ?>
<div class="news-page<?php echo get_post_type( $idParent); ?>__particle">
    <?php 
    $attimage = get_attached_media( 'image', $post->ID );
    $arrayImg = [];
    foreach($attimage as $index => $image ) {
        array_push( $arrayImg, $index ); } ?>
    <figure class="news-page<?php echo get_post_type( $idParent); ?>__figure mr-3">
        <a href="<?php  echo get_permalink( $post->ID ); ?>" title="<?php echo esc_attr( $post->post_title ); ?>">
            <img src="<?php echo wp_get_attachment_url( min($arrayImg) ); ?>">
        </a>
    </figure>
    <div class="news-page<?php echo get_post_type( $idParent); ?>__info">
        <h3 class="news-page<?php echo get_post_type( $idParent); ?>__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h3>
        <div class="news-page<?php echo get_post_type( $idParent); ?>__meta mb-2">
            <i class="fa fa-clock-o" aria-hidden="true"></i>
            <span>Date Post: </span><span><?php echo get_the_time('F j, Y g: i A'); ?></span>
            <span> | </span>
            <span>By </span>
            <i class="fa fa-user-o fa-fw" aria-hidden="true"></i>
            <a href="<?php echo get_author_posts_url( get_the_author_meta("ID") ) ?>" class="text-capitalize"><?php the_author(); ?></a>
        </div>
        <div class="news-page<?php echo get_post_type( $idParent); ?>__showImg">
        <?php
        foreach($attimage as $index => $image ) {
            if( $index == min( $arrayImg ) ) { ?>
            <figure class="news-page<?php echo get_post_type( $idParent); ?>__figure active">
                <img src="<?php echo wp_get_attachment_url( $index ); ?>">
            </figure>
            <?php } else { ?>
            <figure class="news-page<?php echo get_post_type( $idParent); ?>__figure">
                <img src="<?php echo wp_get_attachment_url( $index ); ?>">
            </figure>
            <?php }
        }
        ?>
        </div>
    </div>
    <script>
    //comment
        function fixImg(ele) {
            $(ele).each(function(index, particle){
                $(particle).outerWidth() < $(particle).closest('figure').outerWidth() ? $(particle).css({'width':'100%', 'height':'initial'}) : $(particle).css({'width':'initial', 'height':'100%'});
            });
        }
        $('.news-page<?php echo get_post_type( $idParent); ?>__figure img').ready(fixImg('.news-page<?php echo get_post_type( $idParent); ?>__figure img'));
    function intervalE(ele, eletarget) {
        let Ele = document.querySelector(ele).children;
        let count = Ele.length;
        let EleTarget = document.querySelector(eletarget);
        function event() {
            for( let i = 0; i <= count; i++) {
                if(/\bactive\b/g.test(Ele[i].className)){
                    Ele[i].classList.remove('active');
                    Ele[i + 1 >= count? 0 : i + 1].classList.add('active');
                    EleTarget.innerHTML = Ele[i + 1 >= count? 0 : i + 1].children[0].outerHTML;
                    break;
                }
            }
        }
        return {Event: event};
    }
    $('.news-page<?php echo get_post_type( $idParent); ?>__figure img').ready(
        setInterval(
            intervalE('.news-page<?php echo get_post_type( $idParent); ?>__showImg', '.news-page<?php echo get_post_type( $idParent); ?>__particle > figure a').Event, 3000)
    );
    </script>
    <div class="text-uppercase news-page<?php echo get_post_type( $idParent ); ?>__element">
        <a href="<?php echo get_post_type_archive_link( get_post_type( $idParent ) ); ?>"
            title="view all <?php echo get_post_type( $idParent ); ?>"><?php echo get_post_type( $idParent ); ?></a>
    </div>
</div>
