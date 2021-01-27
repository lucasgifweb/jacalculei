<?php get_header();
/**
* Template Name: Arquitetura
*
* @package WordPress
* @subpackage Já Calculei
* @since Já Calculei 1.0
*/
?>
<body data-spy="scroll" data-target=".site-navbar-target" data-offset="200">
  <!-- Google Tag Manager (noscript) -->

  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-M63KXF2"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <!-- Start Preloader Area -->
    <!-- <div class="preloader"> -->
    <div>
      <div class="folding-cube">
        <div class="cube1 cube"></div>
        <div class="cube2 cube"></div>
        <div class="cube4 cube"></div>
        <div class="cube3 cube"></div>
      </div>
    </div>
    <!-- End Preloader Area -->

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="fa fa-times js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>

    <!-- Start Main Header Area -->
    <header class="site-navbar js-site-navbar site-navbar-target" id="site-navbar">
      <div class="container">
        <div class="row align-items-center">
          <nav class="navbar fixed-top navbar-light">
            <a class="navbar-brand btn-fixed btn btn-primary" href="{% url 'chatbot' %}" onclick="fbq('track', 'Lead');">CADASTRAR</a>
          </nav>

          <div class="col-11 col-xl-2 site-logo mb-0">
            <a href="http://www.toali.com.br/jacalculei/" class="text-white h2 mb-0">
              <img src="https://storage.googleapis.com/jacalculei/newlayout/assets/images/jacalculei_contabilidade_online.png" class="logo-block lazyload" alt="Já Calculei - Contabilidade Online">
              <img src="https://storage.googleapis.com/jacalculei/newlayout/assets/images/logo2.png" class="d-sm-none d-md-none logo-none d-xl-none lazyload" alt="Logo JaCalculei">
            </a>
          </div>
          <div class="col-12 col-md-10 d-none d-xl-block">
            <?php get_template_part('menu-top'); ?>
          </div>

          <div class="d-inline-block d-xl-none ml-md-0 mr-auto py-3" style="position: relative; top: 3px;">
            <a href="#" class="site-menu-toggle js-menu-toggle"><span class="fa fa-bars h3"></span></a>
          </div>

        </div>

      </div>


    </header>
    <!-- End Main Header Area -->
    <!-- Start Main Banner -->
    <div class="main-banner item-bg-five">
      <div class="creative-banner-two"></div>
      <div class="d-table">
        <div class="d-table-cell">
          <div class="container">
            <div class="row">
              <div class="col-lg-8 col-md-12">
                <div class="main-banner-text-internal">
                  <h1 class="title_internal">Contabilidade para arquitetos<span class="span_no_block">, confira uma das especialidades da Já Calculei</span></h1>
                  <p class="font_price_small">Mensalidades a partir de <span class="price">R$ 89,90</span></p>
                  <ul class="list-internal-services">
                    <li><i class="fa fa-check"></i>Fazemos a abertura de sua empresa gratuitamente e sem burocracia.</li>
                    <li><i class="fa fa-check"></i>Torne sua empresa mais saudável e lucrativa com uma <b>boa gestão da rotina contábil</b>.</li>
                    <li><i class="fa fa-check"></i>Nossa <b>plataforma de contabilidade online </b>para arquitetos possui recursos que vão te ajudar a ter a <b>gerenciar seu patrimônio</b>.</li>
                  </ul>
                  <a href="{% url 'chatbot' %}" class="btn btn-primary btn-links-internal" onclick="fbq('track', 'Lead');">Quero Abrir Empresa - GRÁTIS</a>
                  <a href="{% url 'chatbot' %}" class="btn btn-primary btn-links-internal" onclick="fbq('track', 'Lead');">Quero Transferir Empresa</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div><!-- End Main Banner -->


    <!-- Start Ilustractive -->
    <?php the_content(); ?>
    <?php get_footer(); ?>
