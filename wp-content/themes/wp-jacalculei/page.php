<?php get_header(); ?>
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
            <a href="/" class="text-white h2 mb-0">
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
    <div id="home" class="main-banner item-bg-two">
      <div class="creative-banner-two"></div>
      <div class="d-table">
        <div class="d-table-cell">
          <div class="container">
            <div class="row">
              <div class="col-lg-12 col-md-12">
                <div class="main-banner-text">
                  <h1 class="title-internal">Abra a sua empresa<span>é grátis!</span></h1>
                  <p>Abrimos sua empresa sem burocracia para você focar no seu <br> negócio. Contrate nosso plano anual de contabilidade, pague <br>
                    apenas as taxas do governo e faça os protocolos físicos, <br> o resto é com a gente.</p>
                    <a href="{% url 'chatbot' %}" class="btn btn-primary" onclick="fbq('track', 'Lead');">Quero abrir minha empresa</a>
                    <a href="tel:08006081029" class="btn btn-primary">0800 608 1029</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- End Main Banner -->


        <!-- Start Ilustractive -->
        <section class="ilustractive ptb-80">
          <div class="container">
            <div class="row">
              <div class="col-lg-12 col-md-12">
                <div class="section-title">
                  <h2>Abrir empresa GRÁTIS!<span> Veja como é fácil</span></h2>
                  <p>Contrate o nosso plano anual de contabilidade e a sua GRATUIDADE é grátis</p>
                </div>
                <div class="row">
                  <?php echo the_content(); ?>
                </div>
              </div>
              <div class="col text-center">
                <a href="{% url 'chatbot' %}" class="btn btn-primary btn-lg btn-orange" onclick="fbq('track', 'Lead');">Quero abrir minha Empresa</a>
              </div>
            </div>
          </section>
          <!-- End Ilustractive -->

          <!-- Start Process Area -->
          <section class="process ptb-80">
            <div class="container">
              <div class="row">
                <div class="col-lg-12 col-md-12">
                  <img class="img-fluid lazyload" data-src="https://storage.googleapis.com/jacalculei/newlayout/assets/images/img-process.png" alt="Já Calculei - Contabilidade Online">
                </div>
                <div class="col text-center">
                  <a href="{% url 'chatbot' %}" class="btn btn-primary btn-lg btn-orange" onclick="fbq('track', 'Lead');">Quero abrir minha Empresa</a>
                </div>
              </div>
            </div>
          </section>
          <!-- End Process Area -->
          <?php get_footer(); ?>
