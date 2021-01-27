<?php get_template_part( 'header-dois' ); ?>
<br>
<br>
<br>
<br>
<br>
<br>

<div class="container">
  <div class="row">
    <div class="col-md-8 col-img">
      <h1><?php the_title(); ?></h1>
      <p class="by">Por: <?php the_author_posts_link(); ?> | Data: <?php echo get_the_date(); ?></p>
      <!--h5><?php the_excerpt(); ?></h5-->
      <?php
      if (has_post_thumbnail()):
        the_post_thumbnail('post-thumbnail', ['class' => 'img-fluid']);
      endif;
      ?>
      <?php the_content(); ?>
      <p><?php the_tags('Tags: ', ' , '); ?></p>
      <ul class="comment-list comments">
        <?php
        wp_list_comments( array(
          'style'      => 'ul',
          'short_ping' => true,
          'callback' => 'better_comments'
        ) );
        ?>
      </ul><!-- .comment-list -->
    </div>
    <aside class="col-4">
      <?php dynamic_sidebar('primary_widget_area'); ?>
    </aside>
  </div>
</div>

<?php get_footer();?>
