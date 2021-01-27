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
      <h1><?php single_cat_title( __( '', 'textdomain' ) ); ?></h1>
      <?php
      // Check if there are any posts to display
      if ( have_posts() ) : ?>

      <?php

      // The Loop
      while ( have_posts() ) : the_post(); ?>
      <h5><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h5>
      <small><?php the_time('F jS, Y') ?> por <?php the_author_posts_link() ?></small>

      <div class="entry">
        <!--?php the_content(); ?-->

        <p class="postmetadata"><?php
        comments_popup_link( '');
        ?></p>
      </div>

    <?php endwhile;

  else: ?>


<p>Sorry, no posts matched your criteria.</p>


<?php endif; ?>
</div>
<aside class="col-4">
  <?php dynamic_sidebar('primary_widget_area'); ?>
</aside>
</div>
</div>

<?php get_footer(); ?>
