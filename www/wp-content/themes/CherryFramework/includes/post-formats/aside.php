<article id="post-<?php the_ID(); ?>" <?php post_class('post__holder'); ?>>
    <?php 
      $game_number = get_post_meta(get_the_ID(), 'game_number', true);
      $game_names = get_post_meta(get_the_ID(), 'game_names', true);
      $game_image_link = get_post_meta(get_the_ID(), 'game_image_link', true);
      $game_logo_link = get_post_meta(get_the_ID(), 'game_logo_link', true);
      if ($game_image_link == false) {
        $game_image_link = $game_logo_link;
      }
    ?>
    <?php if(!is_singular()) : ?>
    <header class="post-header">
      <?php if(is_sticky()) : ?>
        <h5 class="post-label"><?php echo theme_locals("featured");?></h5>
      <?php endif; ?>
      <!--<h3 class="post-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>-->
    </header>
    <?php endif; ?>
    <?php get_template_part('includes/post-formats/post-thumb'); ?>

    <?php if ( !is_singular() ) : ?>
    <!-- Post Content -->
    <div class="post_content">
      <?php
        if (of_get_option('post_excerpt')=="true" || of_get_option('post_excerpt')=='') { ?>
          <div class="excerpt">
            <div class="products-grid">
              <a href="<?php the_permalink() ?>" class="product-image" title="<?php echo $game_names; ?>"><img src="<?php echo $game_logo_link; ?>" alt="<?php echo $game_names; ?>"></a>
              <h2 class="product-name">
                <a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
              </h2>
              <a href="<?php the_permalink() ?>" class="btn">Подробнее</a>
              <div class="eDetails">
                <?php
                  $category = get_the_category(); 
                  $cat_name = $category[0]->cat_name;
                  $cat_id = $category[0]->term_id;
                  $cat_link = get_category_link($cat_id);
                  ?>
                <a href="<?php echo $cat_link; ?>"><?php echo $cat_name; ?></a>
              </div> 
            </div>
            <?php
            if (has_excerpt()) {
              the_excerpt();
            } else {
              if (!is_search()) {
                $content = get_the_content();
                /*echo apply_filters( 'cherry_standard_post_content_list', wp_trim_words( $content, 55 ) );*/
                /*echo $content;*/
              } else {
                $excerpt = get_the_excerpt();
                echo apply_filters( 'cherry_standard_post_content_search', wp_trim_words( $excerpt, 55 ) );
              }
            } ?>
          </div>
      <!--<?php }
        $button_text = of_get_option('blog_button_text') ? apply_filters( 'cherry_text_translate', of_get_option('blog_button_text'), 'blog_button_text' ) : theme_locals("read_more") ;
      ?>
      <a href="<?php the_permalink() ?>" class="btn btn-primary"><?php echo $button_text; ?></a>-->
      <div class="clear"></div>
    </div>
  
    <?php else :?>
    <!-- Post Content -->
    <div class="post_content">
      <div class="game-info">
        <div class="game-img"><a title="<?php echo $game_names; ?>" href="<?php echo $game_image_link; ?>" rel="lightbox[1]"><img src="<?php echo $game_image_link; ?>" alt="<?php echo $game_names; ?>" /></a></div>
        <div class="extra-wrap">
          <h3><?php echo $game_names; ?></h3>
          <div class="play-buttons m4"><a class="btn" title="Играть в <?php the_title(); ?>" href="#" onclick="return doStartGame(<?php echo $game_number; ?>);">Играть в <?php the_title(); ?></a><a class="btn" title="Скачать казино" href="#">Скачать казино</a></div>
          <div class="alert-block m2"><span class="color1">*</span>Если у вас возникли проблемы при запуске игры, <a href="/contacts/">напишите нам</a> или посмотрите в разделе <a href="/faqs/">Помощь</a>.</div>
        </div>
      </div>
      <?php the_content(''); ?>
      <div class="clear"></div>
    </div>
    <!-- //Post Content -->
    <?php endif; ?>

    <?php get_template_part('includes/post-formats/post-meta'); ?>

</article>