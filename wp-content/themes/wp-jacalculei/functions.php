<?php
if ( ! function_exists( 'mytheme_register_nav_menu' ) ) {

  function mytheme_register_nav_menu(){
    register_nav_menus( array(
      'primary_menu' => __( 'Primary Menu', 'text_domain' ),
      'footer_menu'  => __( 'Footer Menu', 'text_domain' ),
    ) );
  }
  add_action( 'after_setup_theme', 'mytheme_register_nav_menu', 0 );
  // Filter except length to 35 words.
  // tn custom excerpt length
  function tn_custom_excerpt_length( $length ) {
    return 25;
  }
  add_filter( 'excerpt_length', 'tn_custom_excerpt_length', 999 );
  // Imagem destacada
  function ed_support_thumbnails() {
    add_theme_support('post-thumbnails'); // thumbnails
  }

  add_action('after_setup_theme', 'ed_support_thumbnails'); // carrega parametros de suporte do tema

  // Chamada customizada de comentários
  function custom_comments($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;
    $GLOBALS['comment_depth'] = $depth;
    ?>
    <li id="comment-<?php comment_ID() ?>" <?php comment_class() ?>>
      <div class="comment-author vcard"><?php commenter_link() ?></div>
      <div class="comment-meta"><?php printf(__('Posted %1$s at %2$s <span class="meta-sep">|</span> <a href="%3$s" title="Permalink to this comment">Permalink</a>', 'seu-template'),
      get_comment_date(),
      get_comment_time(),
      '#comment-' . get_comment_ID() );
      edit_comment_link(__('Edit', 'seu-template'), ' <span class="meta-sep">|</span> <span class="edit-link">', '</span>'); ?></div>
      <?php if ($comment->comment_approved == '0') _e("\t\t\t\t\t<span class='unapproved'>Your comment is awaiting moderation.</span>\n", 'seu-template') ?>
      <div class="comment-content">
        <?php comment_text() ?>
      </div>
      <?php // echo the comment reply link
      if($args['type'] == 'all' || get_comment_type() == 'comment') :
        comment_reply_link(array_merge($args, array(
          'reply_text' => __('Reply','seu-template'),
          'login_text' => __('Log in to reply.','seu-template'),
          'depth' => $depth,
          'before' => '<div class="comment-reply-link">',
          'after' => '</div>'
        )));
      endif;
      ?>
    <?php } // end custom_comments
    // Chamada customizada para listar trackbacks
    function custom_pings($comment, $args, $depth) {
      $GLOBALS['comment'] = $comment;
      ?>
      <li id="comment-<?php comment_ID() ?>" <?php comment_class() ?>>
        <div class="comment-author"><?php printf(__('By %1$s on %2$s at %3$s', 'seu-template'),
        get_comment_author_link(),
        get_comment_date(),
        get_comment_time() );
        edit_comment_link(__('Edit', 'seu-template'), ' <span class="meta-sep">|</span> <span class="edit-link">', '</span>'); ?></div>
        <?php if ($comment->comment_approved == '0') _e('\t\t\t\t\t<span class="unapproved">Your trackback is awaiting moderation.</span>\n', 'seu-template') ?>
        <div class="comment-content">
          <?php comment_text() ?>
        </div>
      <?php } // end custom_pings

      // Produz um avatar compatível com hCard
      function commenter_link() {
        $commenter = get_comment_author_link();
        if ( ereg( '<a[^>]* class=[^>]+>', $commenter ) ) {
          $commenter = ereg_replace( '(<a[^>]* class=[\'"]?)', '\\1url ' , $commenter );
        } else {
          $commenter = ereg_replace( '(<a )/', '\\1class="url "' , $commenter );
        }
        $avatar_email = get_comment_author_email();
        $avatar = str_replace( "class='avatar", "class='photo avatar", get_avatar( $avatar_email, 80 ) );
        echo $avatar . ' <span class="fn n">' . $commenter . '</span>';
      } // end commenter_link

      // Registrar áreas de widgets
      function theme_widgets_init() {
        // Área 1
        register_sidebar( array (
          'name' => 'Primary Widget Area',
          'id' => 'primary_widget_area',
          'before_widget' => '',
          'after_widget' => "",
          'before_title' => '<h3>',
          'after_title' => '</h3>',
        ) );

        // Área 2
        register_sidebar( array (
          'name' => 'Secondary Widget Area',
          'id' => 'secondary_widget_area',
          'before_widget' => '',
          'after_widget' => "",
          'before_title' => '',
          'after_title' => '',
        ) );
      } // end theme_widgets_init

      add_action( 'init', 'theme_widgets_init' );
      $preset_widgets = array (
        'primary_widget_area'  => array( 'search', 'pages', 'categories', 'archives' ),
        'secondary_widget_area'  => array( 'links', 'meta' )
      );
      if ( isset( $_GET['activated'] ) ) {
        update_option( 'sidebars_widgets', $preset_widgets );
      }
      // update_option( 'sidebars_widgets', NULL );

      function register_my_menus() {
        register_nav_menus(
          array(
            'menu_blog' => __( 'Blog Menu' ),
            'extra-menu' => __( 'Extra Menu' )
          )
        );
      }
      add_action( 'init', 'register_my_menus' );




    }

    ?>
