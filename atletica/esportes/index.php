<?php

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport"
    content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <meta name="theme-color" content="#333">
  <title>Vôlei</title>
  <meta name="description" content="Material Style Theme">
  <link rel="shortcut icon" href="../../assets/img/favicon.png?v=3">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="../../assets/css/preload.min.css">
  <link rel="stylesheet" href="../../assets/css/plugins.min.css">
  <link rel="stylesheet" href="../../assets/css/style.bordo.min.css">
  <!--[if lt IE 9]>
        <script src="assets/js/html5shiv.min.js"></script>
        <script src="assets/js/respond.min.js"></script>
    <![endif]-->
</head>

<body>
  <div id="ms-preload" class="ms-preload">
    <div id="status">
      <div class="spinner">
        <div class="dot1"></div>
        <div class="dot2"></div>
      </div>
    </div>
  </div>
  <div class="ms-site-container">
    <!-- Modal -->
    <div class="modal modal-primary" id="ms-account-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog animated zoomIn animated-3x" role="document">
        <div class="modal-content">
          <div class="modal-header d-block shadow-2dp no-pb">
            <button type="button" class="close d-inline pull-right mt-2" data-dismiss="modal" aria-label="Close"><span
                aria-hidden="true"><i class="zmdi zmdi-close"></i></span></button>
            <div class="modal-title text-center">
              <span class="ms-logo ms-logo-white ms-logo-sm mr-1">AV</span>
              <h3 class="no-m ms-site-title">Time<span> Atlética</span></h3>
            </div>
            <div class="modal-header-tabs">
              <ul class="nav nav-tabs nav-tabs-full nav-tabs-3 nav-tabs-primary" role="tablist">
                <li class="nav-item" role="presentation"><a href="#ms-login-tab" aria-controls="ms-login-tab" role="tab"
                    data-toggle="tab" class="nav-link active withoutripple"><i class="zmdi zmdi-account"></i> Login</a>
                </li>
                <li class="nav-item" role="presentation"><a href="#ms-register-tab" aria-controls="ms-register-tab"
                    role="tab" data-toggle="tab" class="nav-link withoutripple"><i class="zmdi zmdi-account-add"></i>
                    Register</a></li>
                <li class="nav-item" role="presentation"><a href="#ms-recovery-tab" aria-controls="ms-recovery-tab"
                    role="tab" data-toggle="tab" class="nav-link withoutripple"><i class="zmdi zmdi-key"></i> Recovery
                    Pass</a></li>
              </ul>
            </div>
          </div>
          <div class="modal-body">
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane fade active show" id="ms-login-tab">
                <form autocomplete="off">
                  <fieldset>
                    <div class="form-group label-floating">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="zmdi zmdi-account"></i></span>
                        <label class="control-label" for="ms-form-user">Username</label>
                        <input type="text" id="ms-form-user" class="form-control">
                      </div>
                    </div>
                    <div class="form-group label-floating">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="zmdi zmdi-lock"></i></span>
                        <label class="control-label" for="ms-form-pass">Password</label>
                        <input type="password" id="ms-form-pass" class="form-control">
                      </div>
                    </div>
                    <div class="row mt-2">
                      <div class="col-md-6">
                        <div class="form-group no-mt">
                          <div class="checkbox">
                            <label>
                              <input type="checkbox"> Remember Me </label>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <button class="btn btn-raised btn-primary pull-right">Login</button>
                      </div>
                    </div>
                  </fieldset>
                </form>
                <div class="text-center">
                  <h3>Login with</h3>
                  <a href="javascript:void(0)" class="wave-effect-light btn btn-raised btn-facebook"><i
                      class="zmdi zmdi-facebook"></i> Facebook</a>
                  <a href="javascript:void(0)" class="wave-effect-light btn btn-raised btn-twitter"><i
                      class="zmdi zmdi-twitter"></i> Twitter</a>
                  <a href="javascript:void(0)" class="wave-effect-light btn btn-raised btn-google"><i
                      class="zmdi zmdi-google"></i> Google</a>
                </div>
              </div>
              <div role="tabpanel" class="tab-pane fade" id="ms-register-tab">
                <form>
                  <fieldset>
                    <div class="form-group label-floating">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="zmdi zmdi-account"></i></span>
                        <label class="control-label" for="ms-form-user-r">Username</label>
                        <input type="text" id="ms-form-user-r" class="form-control">
                      </div>
                    </div>
                    <div class="form-group label-floating">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="zmdi zmdi-email"></i></span>
                        <label class="control-label" for="ms-form-email-r">Email</label>
                        <input type="email" id="ms-form-email-r" class="form-control">
                      </div>
                    </div>
                    <div class="form-group label-floating">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="zmdi zmdi-lock"></i></span>
                        <label class="control-label" for="ms-form-pass-r">Password</label>
                        <input type="password" id="ms-form-pass-r" class="form-control">
                      </div>
                    </div>
                    <div class="form-group label-floating">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="zmdi zmdi-lock"></i></span>
                        <label class="control-label" for="ms-form-pass-rn">Re-type Password</label>
                        <input type="password" id="ms-form-pass-rn" class="form-control">
                      </div>
                    </div>
                    <button class="btn btn-raised btn-block btn-primary">Register Now</button>
                  </fieldset>
                </form>
              </div>
              <div role="tabpanel" class="tab-pane fade" id="ms-recovery-tab">
                <fieldset>
                  <div class="form-group label-floating">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="zmdi zmdi-account"></i></span>
                      <label class="control-label" for="ms-form-user-re">Username</label>
                      <input type="text" id="ms-form-user-re" class="form-control">
                    </div>
                  </div>
                  <div class="form-group label-floating">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="zmdi zmdi-email"></i></span>
                      <label class="control-label" for="ms-form-email-re">Email</label>
                      <input type="email" id="ms-form-email-re" class="form-control">
                    </div>
                  </div>
                  <button class="btn btn-raised btn-block btn-primary">Send Password</button>
                </fieldset>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <header class="ms-header ms-header-dark">
      <!--ms-header-dark-->
      <div class="container container-full">
        <div class="ms-title">
          <a href="index.html">
            <!-- <img src="assets/img/demo/logo-header.png" alt=""> -->
            <span class="ms-logo animated zoomInDown animation-delay-5">AV</span>
            <h1 class="animated fadeInRight animation-delay-6">Time <span> Atlética</span></h1>
          </a>
        </div>
        <div class="header-right">
          <div class="share-menu">
            <ul class="share-menu-list">
              <li class="animated fadeInRight animation-delay-3"><a href="javascript:void(0)"
                  class="btn-circle btn-google"><i class="zmdi zmdi-google"></i></a></li>
              <li class="animated fadeInRight animation-delay-2"><a href="javascript:void(0)"
                  class="btn-circle btn-facebook"><i class="zmdi zmdi-facebook"></i></a></li>
              <li class="animated fadeInRight animation-delay-1"><a href="javascript:void(0)"
                  class="btn-circle btn-twitter"><i class="zmdi zmdi-twitter"></i></a></li>
            </ul>
            <a href="javascript:void(0)" class="btn-circle btn-circle-primary animated zoomInDown animation-delay-7"><i
                class="zmdi zmdi-share"></i></a>
          </div>
          <a href="javascript:void(0)"
            class="btn-circle btn-circle-primary no-focus animated zoomInDown animation-delay-8" data-toggle="modal"
            data-target="#ms-account-modal"><i class="zmdi zmdi-account"></i></a>
          <form class="search-form animated zoomInDown animation-delay-9">
            <input id="search-box" type="text" class="search-input" placeholder="Search..." name="q" />
            <label for="search-box"><i class="zmdi zmdi-search"></i></label>
          </form>
          <a href="javascript:void(0)"
            class="btn-ms-menu btn-circle btn-circle-primary ms-toggle-left animated zoomInDown animation-delay-10"><i
              class="zmdi zmdi-menu"></i></a>
        </div>
      </div>
    </header>
    <nav class="navbar navbar-expand-md  navbar-static ms-navbar ms-navbar-white">
      <div class="container container-full">
        <div class="navbar-header">
          <a class="navbar-brand" href="index.html">
            <!-- <img src="../assets/img/demo/logo-navbar.png" alt=""> -->
            <span class="ms-logo ms-logo-white ms-logo-sm">AV</span>
            <span class="ms-title">Time <strong>Atlética</strong></span>
          </a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li class="nav-item"><a data-scroll class="nav-link active" href="../index.html">Home</a></li>
            <li class="nav-item"><a data-scroll class="nav-link" href="#services">Serviços</a></li>
            <li class="nav-item"><a data-scroll class="nav-link" href="#portfolio">Portfolio</a></li>
            <!-- <li class="nav-item"><a data-scroll class="nav-link" href="#pricing">Pricing</a></li> -->
            <li class="nav-item"><a data-scroll class="nav-link" href="#about">Sobre Nós</a></li>
            <li class="nav-item"><a data-scroll class="nav-link" href="#team">Equipe</a></li>
            <li class="nav-item dropdown">
              <a href="../index.html" class="nav-link dropdown-toggle animated fadeIn animation-delay-8"
                data-toggle="dropdown" data-hover="dropdown" role="button" aria-haspopup="true" aria-expanded="false"
                data-name="portfolio">Engenharias <i class="zmdi zmdi-chevron-down"></i></a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item"
                    href="https://universidadedevassouras.edu.br/graduacao/engenhariasoftware"><i
                      class="zmdi zmdi-devices"></i> Engenharia de Software</a></li>
                <li><a class="dropdown-item" href="https://universidadedevassouras.edu.br/graduacao/engenhariacivil"><i
                      class="zmdi zmdi-city-alt"></i>Engenharia Civil</a></li>
                <li><a class="dropdown-item"
                    href="https://universidadedevassouras.edu.br/graduacao/engenhariaproducao"><i
                      class="zmdi zmdi-assignment-o"></i> Engenharia de Produção</a></li>
                <li><a class="dropdown-item"
                    href="https://universidadedevassouras.edu.br/graduacao/engenhariaquimica"><i
                      class="zmdi zmdi-gradient"></i> Engenharia Química</a></li>
                <li><a class="dropdown-item"
                    href="https://universidadedevassouras.edu.br/graduacao/engenhariaeletrica"><i
                      class="zmdi zmdi-flash"></i>Engenharia Elétrica</a></li>
              </ul>
            </li>
            <li class="nav-item"><a data-scroll class="nav-link" href="#contact">Contato</a></li>
          </ul>
        </div> <!-- navbar-collapse collapse -->
        <a href="javascript:void(0)" class="ms-toggle-left btn-navbar-menu"><i class="zmdi zmdi-menu"></i></a>
      </div> <!-- container -->
    </nav>
    <div class="ms-hero-page-override ms-hero-img-keyboard ms-hero-bg-primary mb-6">
      <div class="container">
        <div class="text-center">
          <span
            class="ms-logo ms-logo-lg ms-logo-white center-block mb-2 mt-2 animated zoomInDown animation-delay-5">T</span>
          <h1
            class="no-m ms-site-title color-white center-block ms-site-title-lg mt-2 animated zoomInDown animation-delay-5">
            Time</h1>
          <p
            class="lead lead-lg color-white text-center center-block mt-2 mw-800 fw-300 animated fadeInUp animation-delay-7">
            Venha fazer parte do <span class="colorStar">time</span> ou <span class="colorStar">tocida</span>.</p>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <div id="carousel-home-blog" class="carousel ms-carousel slide card" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
              <li data-target="#carousel-home-blog" data-slide-to="0" class="active"></li>
              <li data-target="#carousel-home-blog" data-slide-to="1"></li>
              <li data-target="#carousel-home-blog" data-slide-to="2"></li>
            </ol>
            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
              <div class="carousel-item active">
                <img src="../../assets/img/demo/post1.jpg" class="img-fluid" alt="...">
                <div class="carousel-caption-blog">
                  <h2 class="color-primary">Lorem ipsum dolor sit amet</h2>
                  <p class="d-none d-md-block">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis
                    perspiciatis, odit, ipsam ullam officia sint incidunt quam totam quisquam autem beatae alias cumque
                    magnam animi nulla sequi obcaecati eius eligendi iure nostrum ab cum dolor tempora totam
                    necessitatibus iusto.</p>
                </div>
              </div>
              <div class="carousel-item">
                <img src="../../assets/img/demo/post3.jpg" class="img-fluid" alt="...">
                <div class="carousel-caption-blog">
                  <h2 class="color-primary">Nostrum ab cum dolor tempora totam</h2>
                  <p class="d-none d-md-block">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis
                    perspiciatis, odit, ipsam ullam officia sint incidunt quam totam quisquam autem beatae alias cumque
                    magnam animi nulla sequi obcaecati eius eligendi iure nostrum ab cum dolor tempora totam
                    necessitatibus iusto.</p>
                </div>
              </div>
              <div class="carousel-item">
                <img src="../../assets/img/demo/post5.jpg" class="img-fluid" alt="...">
                <div class="carousel-caption-blog">
                  <h2 class="color-primary">Cumque magnam animi nulla sequi obcaecati</h2>
                  <p class="d-none d-md-block">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis
                    perspiciatis, odit, ipsam ullam officia sint incidunt quam totam quisquam autem beatae alias cumque
                    magnam animi nulla sequi obcaecati eius eligendi iure nostrum ab cum dolor tempora totam
                    necessitatibus iusto.</p>
                </div>
              </div>
            </div>
          </div>
          <div class="row masonry-container">
            <div class="col-md-6 masonry-item wow fadeInUp animation-delay-2">
              <article class="card card-info mb-4 wow materialUp animation-delay-5">
                <figure class="ms-thumbnail ms-thumbnail-left">
                  <img src="../../assets/img/demo/post1.jpg" alt="" class="img-fluid">
                  <figcaption class="ms-thumbnail-caption text-center">
                    <div class="ms-thumbnail-caption-content">
                      <h3 class="ms-thumbnail-caption-title">Lorem ipsum dolor sit</h3>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                      <div class="mt-2">
                        <a href="javascript:void(0)"
                          class="btn-circle btn-circle-raised btn-circle-sm mr-1 btn-circle-white color-danger"><i
                            class="zmdi zmdi-favorite"></i></a>
                        <a href="javascript:void(0)"
                          class="btn-circle btn-circle-raised btn-circle-sm ml-1 mr-1 btn-circle-white color-warning"><i
                            class="zmdi zmdi-star"></i></a>
                        <a href="javascript:void(0)"
                          class="btn-circle btn-circle-raised btn-circle-sm ml-1 btn-circle-white color-success"><i
                            class="zmdi zmdi-share"></i></a>
                      </div>
                    </div>
                  </figcaption>
                </figure>
                <div class="card-body">
                  <h2><a href=javascript:void(0)>Lorem ipsum Minim in nulla labore sint</a></h2>
                  <p>Sed ut perspiciatis unde omnis iste natus error nesciunt voluptas sit voluptatem accusantium
                    doloremque laudantium eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae
                    dicta sunt explicabo.</p>
                  <p>Sed ut perspiciatis unde omnis iste natus error nesciunt voluptas sit voluptatem accusantium
                    doloremque laudantium eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae
                    dicta sunt explicabo.</p>
                  <div class="row">
                    <div class="col-lg-6 col-lg-4">
                      <div class="mt-05">
                        <a href="javascript:void(0)" class="ms-tag ms-tag-info">Design</a>
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-8">
                      <a href="javascript:void(0)" class="btn btn-primary btn-sm btn-block animate-icon">Read more <i
                          class="ml-1 no-mr zmdi zmdi-long-arrow-right"></i></a>
                    </div>
                  </div>
                </div>
              </article>
            </div>
            <div class="col-md-6 masonry-item wow fadeInUp animation-delay-2">
              <article class="card card-royal mb-4 wow materialUp animation-delay-5">
                <div class="js-player" data-plyr-provider="vimeo" data-plyr-embed-id="94747106"></div>
                <div class="card-body">
                  <h2><a href=javascript:void(0)>Lorem ipsum Minim in nulla labore sint</a></h2>
                  <p>Sed ut perspiciatis unde omnis iste natus error nesciunt voluptas sit voluptatem accusantium
                    doloremque laudantium eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae
                    dicta sunt explicabo.</p>
                  <div class="row">
                    <div class="col-lg-6 col-md-4">
                      <div class="mt-05">
                        <a href="javascript:void(0)" class="ms-tag ms-tag-royal">Resources</a>
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-8">
                      <a href="javascript:void(0)" class="btn btn-primary btn-sm btn-block animate-icon">Read more <i
                          class="ml-1 no-mr zmdi zmdi-long-arrow-right"></i></a>
                    </div>
                  </div>
                </div>
              </article>
            </div>
            <div class="col-md-6 masonry-item wow fadeInUp animation-delay-2">
              <article class="card card-success mb-4 wow materialUp animation-delay-5">
                <figure class="ms-thumbnail ms-thumbnail-left">
                  <img src="../../assets/img/demo/p3.jpg" alt="" class="img-fluid">
                  <figcaption class="ms-thumbnail-caption text-center">
                    <div class="ms-thumbnail-caption-content">
                      <h3 class="ms-thumbnail-caption-title">Lorem ipsum dolor sit</h3>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                      <div class="mt-2">
                        <a href="javascript:void(0)"
                          class="btn-circle btn-circle-raised btn-circle-sm mr-1 btn-circle-white color-danger"><i
                            class="zmdi zmdi-favorite"></i></a>
                        <a href="javascript:void(0)"
                          class="btn-circle btn-circle-raised btn-circle-sm ml-1 mr-1 btn-circle-white color-warning"><i
                            class="zmdi zmdi-star"></i></a>
                        <a href="javascript:void(0)"
                          class="btn-circle btn-circle-raised btn-circle-sm ml-1 btn-circle-white color-success"><i
                            class="zmdi zmdi-share"></i></a>
                      </div>
                    </div>
                  </figcaption>
                </figure>
                <div class="card-body">
                  <h2><a href=javascript:void(0)>Lorem ipsum Minim in nulla labore sint</a></h2>
                  <p>Sed ut perspiciatis unde omnis iste natus error nesciunt voluptas sit voluptatem accusantium
                    doloremque laudantium eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae
                    dicta sunt explicabo.</p>
                  <p>Sed ut perspiciatis unde omnis iste natus error nesciunt voluptas sit voluptatem accusantium
                    doloremque laudantium eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae
                    dicta sunt explicabo.</p>
                  <div class="row">
                    <div class="col-lg-6 col-md-4">
                      <div class="mt-05">
                        <a href="javascript:void(0)" class="ms-tag ms-tag-success">Multimedia</a>
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-8">
                      <a href="javascript:void(0)" class="btn btn-primary btn-sm btn-block animate-icon">Read more <i
                          class="ml-1 no-mr zmdi zmdi-long-arrow-right"></i></a>
                    </div>
                  </div>
                </div>
              </article>
            </div>
            <div class="col-md-6 masonry-item wow fadeInUp animation-delay-2">
              <article class="card mb-4 wow materialUp animation-delay-5">
                <div class="js-player" data-plyr-provider="youtube" data-plyr-embed-id="bTqVqk7FSmY"></div>
                <div class="card-body">
                  <h2><a href=javascript:void(0)>Lorem ipsum Minim in nulla labore sint</a></h2>
                  <p>Sed ut perspiciatis unde omnis iste natus error nesciunt voluptas sit voluptatem accusantium
                    doloremque laudantium eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae
                    dicta sunt explicabo.</p>
                  <div class="row">
                    <div class="col-lg-6 col-md-4">
                      <div class="mt-05">
                        <a href="javascript:void(0)" class="ms-tag ms-tag-info">Design</a>
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-8">
                      <a href="javascript:void(0)" class="btn btn-primary btn-sm btn-block animate-icon">Read more <i
                          class="ml-1 no-mr zmdi zmdi-long-arrow-right"></i></a>
                    </div>
                  </div>
                </div>
              </article>
            </div>
            <div class="col-md-6 masonry-item wow fadeInUp animation-delay-2">
              <article class="card card-danger mb-4 wow materialUp animation-delay-5">
                <figure class="ms-thumbnail ms-thumbnail-left">
                  <img src="../../assets/img/demo/post5.jpg" alt="" class="img-fluid">
                  <figcaption class="ms-thumbnail-caption text-center">
                    <div class="ms-thumbnail-caption-content">
                      <h3 class="ms-thumbnail-caption-title">Lorem ipsum dolor sit</h3>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                      <div class="mt-2">
                        <a href="javascript:void(0)"
                          class="btn-circle btn-circle-raised btn-circle-sm mr-1 btn-circle-white color-danger"><i
                            class="zmdi zmdi-favorite"></i></a>
                        <a href="javascript:void(0)"
                          class="btn-circle btn-circle-raised btn-circle-sm ml-1 mr-1 btn-circle-white color-warning"><i
                            class="zmdi zmdi-star"></i></a>
                        <a href="javascript:void(0)"
                          class="btn-circle btn-circle-raised btn-circle-sm ml-1 btn-circle-white color-success"><i
                            class="zmdi zmdi-share"></i></a>
                      </div>
                    </div>
                  </figcaption>
                </figure>
                <div class="card-body">
                  <h2><a href=javascript:void(0)>Lorem ipsum Minim in nulla labore sint</a></h2>
                  <p>Sed ut perspiciatis unde omnis iste natus error nesciunt voluptas sit voluptatem accusantium
                    doloremque laudantium eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae
                    dicta sunt explicabo.</p>
                  <div class="row">
                    <div class="col-lg-6 col-md-4">
                      <div class="mt-05">
                        <a href="javascript:void(0)" class="ms-tag ms-tag-danger">Productivity</a>
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-8">
                      <a href="javascript:void(0)" class="btn btn-primary btn-sm btn-block animate-icon">Read more <i
                          class="ml-1 no-mr zmdi zmdi-long-arrow-right"></i></a>
                    </div>
                  </div>
                </div>
              </article>
            </div>
            <div class="col-md-6 masonry-item wow fadeInUp animation-delay-2">
              <article class="card card-info mb-4 wow materialUp animation-delay-5">
                <figure class="ms-thumbnail ms-thumbnail-left">
                  <img src="../../assets/img/demo/post4.jpg" alt="" class="img-fluid">
                  <figcaption class="ms-thumbnail-caption text-center">
                    <div class="ms-thumbnail-caption-content">
                      <h3 class="ms-thumbnail-caption-title">Lorem ipsum dolor sit</h3>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                      <div class="mt-2">
                        <a href="javascript:void(0)"
                          class="btn-circle btn-circle-raised btn-circle-sm mr-1 btn-circle-white color-danger"><i
                            class="zmdi zmdi-favorite"></i></a>
                        <a href="javascript:void(0)"
                          class="btn-circle btn-circle-raised btn-circle-sm ml-1 mr-1 btn-circle-white color-warning"><i
                            class="zmdi zmdi-star"></i></a>
                        <a href="javascript:void(0)"
                          class="btn-circle btn-circle-raised btn-circle-sm ml-1 btn-circle-white color-success"><i
                            class="zmdi zmdi-share"></i></a>
                      </div>
                    </div>
                  </figcaption>
                </figure>
                <div class="card-body">
                  <h2><a href=javascript:void(0)>Lorem ipsum Minim in nulla labore sint</a></h2>
                  <p>Sed ut perspiciatis unde omnis iste natus error nesciunt voluptas sit voluptatem accusantium
                    doloremque laudantium eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae
                    dicta sunt explicabo.</p>
                  <div class="row">
                    <div class="col-lg-6 col-md-4">
                      <div class="mt-05">
                        <a href="javascript:void(0)" class="ms-tag ms-tag-info">Design</a>
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-8">
                      <a href="javascript:void(0)" class="btn btn-primary btn-sm btn-block animate-icon">Read more <i
                          class="ml-1 no-mr zmdi zmdi-long-arrow-right"></i></a>
                    </div>
                  </div>
                </div>
              </article>
            </div>
            <div class="col-md-6 masonry-item wow fadeInUp animation-delay-2">
              <article class="card card-info mb-4 wow materialUp animation-delay-5">
                <figure class="ms-thumbnail ms-thumbnail-left">
                  <img src="../../assets/img/demo/post2.jpg" alt="" class="img-fluid">
                  <figcaption class="ms-thumbnail-caption text-center">
                    <div class="ms-thumbnail-caption-content">
                      <h3 class="ms-thumbnail-caption-title">Lorem ipsum dolor sit</h3>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                      <div class="mt-2">
                        <a href="javascript:void(0)"
                          class="btn-circle btn-circle-raised btn-circle-sm mr-1 btn-circle-white color-danger"><i
                            class="zmdi zmdi-favorite"></i></a>
                        <a href="javascript:void(0)"
                          class="btn-circle btn-circle-raised btn-circle-sm ml-1 mr-1 btn-circle-white color-warning"><i
                            class="zmdi zmdi-star"></i></a>
                        <a href="javascript:void(0)"
                          class="btn-circle btn-circle-raised btn-circle-sm ml-1 btn-circle-white color-success"><i
                            class="zmdi zmdi-share"></i></a>
                      </div>
                    </div>
                  </figcaption>
                </figure>
                <div class="card-body">
                  <h2><a href=javascript:void(0)>Lorem ipsum Minim in nulla labore sint</a></h2>
                  <p>Sed ut perspiciatis unde omnis iste natus error nesciunt voluptas sit voluptatem accusantium
                    doloremque laudantium eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae
                    dicta sunt explicabo.</p>
                  <p>Sed ut perspiciatis unde omnis iste natus error nesciunt voluptas sit voluptatem accusantium
                    doloremque laudantium eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae
                    dicta sunt explicabo.</p>
                  <div class="row">
                    <div class="col-lg-6 col-md-4">
                      <div class="mt-05">
                        <a href="javascript:void(0)" class="ms-tag ms-tag-info">Design</a>
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-8">
                      <a href="javascript:void(0)" class="btn btn-primary btn-sm btn-block animate-icon">Read more <i
                          class="ml-1 no-mr zmdi zmdi-long-arrow-right"></i></a>
                    </div>
                  </div>
                </div>
              </article>
            </div>
            <div class="col-md-6 masonry-item wow fadeInUp animation-delay-2">
              <article class="card card-info mb-4 wow materialUp animation-delay-5">
                <figure class="ms-thumbnail ms-thumbnail-left">
                  <img src="../../assets/img/demo/p2.jpg" alt="" class="img-fluid">
                  <figcaption class="ms-thumbnail-caption text-center">
                    <div class="ms-thumbnail-caption-content">
                      <h3 class="ms-thumbnail-caption-title">Lorem ipsum dolor sit</h3>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                      <div class="mt-2">
                        <a href="javascript:void(0)"
                          class="btn-circle btn-circle-raised btn-circle-sm mr-1 btn-circle-white color-danger"><i
                            class="zmdi zmdi-favorite"></i></a>
                        <a href="javascript:void(0)"
                          class="btn-circle btn-circle-raised btn-circle-sm ml-1 mr-1 btn-circle-white color-warning"><i
                            class="zmdi zmdi-star"></i></a>
                        <a href="javascript:void(0)"
                          class="btn-circle btn-circle-raised btn-circle-sm ml-1 btn-circle-white color-success"><i
                            class="zmdi zmdi-share"></i></a>
                      </div>
                    </div>
                  </figcaption>
                </figure>
                <div class="card-body">
                  <h2><a href=javascript:void(0)>Lorem ipsum Minim in nulla labore sint</a></h2>
                  <p>Sed ut perspiciatis unde omnis iste natus error nesciunt voluptas sit voluptatem accusantium
                    doloremque laudantium eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae
                    dicta sunt explicabo.</p>
                  <div class="row">
                    <div class="col-lg-6 col-md-4">
                      <div class="mt-05">
                        <a href="javascript:void(0)" class="ms-tag ms-tag-info">Design</a>
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-8">
                      <a href="javascript:void(0)" class="btn btn-primary btn-sm btn-block animate-icon">Read more <i
                          class="ml-1 no-mr zmdi zmdi-long-arrow-right"></i></a>
                    </div>
                  </div>
                </div>
              </article>
            </div>
            <div class="col-md-6 masonry-item wow fadeInUp animation-delay-2">
              <article class="card card-danger mb-4 wow materialUp animation-delay-5">
                <figure class="ms-thumbnail ms-thumbnail-left">
                  <img src="../../assets/img/demo/post3.jpg" alt="" class="img-fluid">
                  <figcaption class="ms-thumbnail-caption text-center">
                    <div class="ms-thumbnail-caption-content">
                      <h3 class="ms-thumbnail-caption-title">Lorem ipsum dolor sit</h3>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                      <div class="mt-2">
                        <a href="javascript:void(0)"
                          class="btn-circle btn-circle-raised btn-circle-sm mr-1 btn-circle-white color-danger"><i
                            class="zmdi zmdi-favorite"></i></a>
                        <a href="javascript:void(0)"
                          class="btn-circle btn-circle-raised btn-circle-sm ml-1 mr-1 btn-circle-white color-warning"><i
                            class="zmdi zmdi-star"></i></a>
                        <a href="javascript:void(0)"
                          class="btn-circle btn-circle-raised btn-circle-sm ml-1 btn-circle-white color-success"><i
                            class="zmdi zmdi-share"></i></a>
                      </div>
                    </div>
                  </figcaption>
                </figure>
                <div class="card-body">
                  <h2><a href=javascript:void(0)>Lorem ipsum Minim in nulla labore sint</a></h2>
                  <p>Sed ut perspiciatis unde omnis iste natus error nesciunt voluptas sit voluptatem accusantium
                    doloremque laudantium eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae
                    dicta sunt explicabo.</p>
                  <div class="row">
                    <div class="col-lg-6 col-md-4">
                      <div class="mt-05">
                        <a href="javascript:void(0)" class="ms-tag ms-tag-danger">Productivity</a>
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-8">
                      <a href="javascript:void(0)" class="btn btn-primary btn-sm btn-block animate-icon">Read more <i
                          class="ml-1 no-mr zmdi zmdi-long-arrow-right"></i></a>
                    </div>
                  </div>
                </div>
              </article>
            </div>
            <div class="col-md-6 masonry-item wow fadeInUp animation-delay-2">
              <article class="card card-royal mb-4 wow materialUp animation-delay-5">
                <figure class="ms-thumbnail ms-thumbnail-left">
                  <img src="../../assets/img/demo/p5.jpg" alt="" class="img-fluid">
                  <figcaption class="ms-thumbnail-caption text-center">
                    <div class="ms-thumbnail-caption-content">
                      <h3 class="ms-thumbnail-caption-title">Lorem ipsum dolor sit</h3>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                      <div class="mt-2">
                        <a href="javascript:void(0)"
                          class="btn-circle btn-circle-raised btn-circle-sm mr-1 btn-circle-white color-danger"><i
                            class="zmdi zmdi-favorite"></i></a>
                        <a href="javascript:void(0)"
                          class="btn-circle btn-circle-raised btn-circle-sm ml-1 mr-1 btn-circle-white color-warning"><i
                            class="zmdi zmdi-star"></i></a>
                        <a href="javascript:void(0)"
                          class="btn-circle btn-circle-raised btn-circle-sm ml-1 btn-circle-white color-success"><i
                            class="zmdi zmdi-share"></i></a>
                      </div>
                    </div>
                  </figcaption>
                </figure>
                <div class="card-body">
                  <h2><a href=javascript:void(0)>Lorem ipsum Minim in nulla labore sint</a></h2>
                  <p>Sed ut perspiciatis unde omnis iste natus error nesciunt voluptas sit voluptatem accusantium
                    doloremque laudantium eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae
                    dicta sunt explicabo.</p>
                  <p>Sed ut perspiciatis unde omnis iste natus error nesciunt voluptas sit voluptatem accusantium
                    doloremque laudantium eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae
                    dicta sunt explicabo.</p>
                  <div class="row">
                    <div class="col-lg-6 col-md-4">
                      <div class="mt-05">
                        <a href="javascript:void(0)" class="ms-tag ms-tag-royal">Resources</a>
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-8">
                      <a href="javascript:void(0)" class="btn btn-primary btn-sm btn-block animate-icon">Read more <i
                          class="ml-1 no-mr zmdi zmdi-long-arrow-right"></i></a>
                    </div>
                  </div>
                </div>
              </article>
            </div>
            <div class="col-md-6 masonry-item wow fadeInUp animation-delay-2">
              <article class="card card-success mb-4 wow materialUp animation-delay-5">
                <figure class="ms-thumbnail ms-thumbnail-left">
                  <img src="../../assets/img/demo/p4.jpg" alt="" class="img-fluid">
                  <figcaption class="ms-thumbnail-caption text-center">
                    <div class="ms-thumbnail-caption-content">
                      <h3 class="ms-thumbnail-caption-title">Lorem ipsum dolor sit</h3>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                      <div class="mt-2">
                        <a href="javascript:void(0)"
                          class="btn-circle btn-circle-raised btn-circle-sm mr-1 btn-circle-white color-danger"><i
                            class="zmdi zmdi-favorite"></i></a>
                        <a href="javascript:void(0)"
                          class="btn-circle btn-circle-raised btn-circle-sm ml-1 mr-1 btn-circle-white color-warning"><i
                            class="zmdi zmdi-star"></i></a>
                        <a href="javascript:void(0)"
                          class="btn-circle btn-circle-raised btn-circle-sm ml-1 btn-circle-white color-success"><i
                            class="zmdi zmdi-share"></i></a>
                      </div>
                    </div>
                  </figcaption>
                </figure>
                <div class="card-body">
                  <h2><a href=javascript:void(0)>Lorem ipsum Minim in nulla labore sint</a></h2>
                  <p>Sed ut perspiciatis unde omnis iste natus error nesciunt voluptas sit voluptatem accusantium
                    doloremque laudantium eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae
                    dicta sunt explicabo.</p>
                  <div class="row">
                    <div class="col-lg-6 col-md-4">
                      <div class="mt-05">
                        <a href="javascript:void(0)" class="ms-tag ms-tag-success">Multimedia</a>
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-8">
                      <a href="javascript:void(0)" class="btn btn-primary btn-sm btn-block animate-icon">Read more <i
                          class="ml-1 no-mr zmdi zmdi-long-arrow-right"></i></a>
                    </div>
                  </div>
                </div>
              </article>
            </div>
            <div class="col-md-6 masonry-item wow fadeInUp animation-delay-2">
              <article class="card card-info mb-4 wow materialUp animation-delay-5">
                <figure class="ms-thumbnail ms-thumbnail-left">
                  <img src="../../assets/img/demo/post1.jpg" alt="" class="img-fluid">
                  <figcaption class="ms-thumbnail-caption text-center">
                    <div class="ms-thumbnail-caption-content">
                      <h3 class="ms-thumbnail-caption-title">Lorem ipsum dolor sit</h3>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                      <div class="mt-2">
                        <a href="javascript:void(0)"
                          class="btn-circle btn-circle-raised btn-circle-sm mr-1 btn-circle-white color-danger"><i
                            class="zmdi zmdi-favorite"></i></a>
                        <a href="javascript:void(0)"
                          class="btn-circle btn-circle-raised btn-circle-sm ml-1 mr-1 btn-circle-white color-warning"><i
                            class="zmdi zmdi-star"></i></a>
                        <a href="javascript:void(0)"
                          class="btn-circle btn-circle-raised btn-circle-sm ml-1 btn-circle-white color-success"><i
                            class="zmdi zmdi-share"></i></a>
                      </div>
                    </div>
                  </figcaption>
                </figure>
                <div class="card-body">
                  <h2><a href=javascript:void(0)>Lorem ipsum Minim in nulla labore sint</a></h2>
                  <p>Sed ut perspiciatis unde omnis iste natus error nesciunt voluptas sit voluptatem accusantium
                    doloremque laudantium eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae
                    dicta sunt explicabo.</p>
                  <div class="row">
                    <div class="col-lg-6 col-md-4">
                      <div class="mt-05">
                        <a href="javascript:void(0)" class="ms-tag ms-tag-info">Design</a>
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-8">
                      <a href="javascript:void(0)" class="btn btn-primary btn-sm btn-block animate-icon">Read more <i
                          class="ml-1 no-mr zmdi zmdi-long-arrow-right"></i></a>
                    </div>
                  </div>
                </div>
              </article>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="card animated fadeInUp animation-delay-7">
            <div class="ms-hero-bg-royal ms-hero-img-coffee">
              <h3 class="color-white index-1 text-center no-m pt-4">Victoria Smith</h3>
              <div class="color-medium index-1 text-center np-m">@vic_smith</div>
              <img src="../../assets/img/demo/avatar1.jpg" alt="..." class="img-avatar-circle">
            </div>
            <div class="card-body pt-4 text-center">
              <h3 class="color-primary">Presidende</h3>
              <p>Lorem ipsum dolor sit amet, consectetur alter adipisicing elit. Facilis, natuse inse voluptates officia
                repudiandae beatae magni es magnam autem molestias.</p>
              <a href="javascript:void(0)"
                class="btn-circle btn-circle-raised btn-circle-xs mt-1 mr-1 no-mr-md btn-facebook"><i
                  class="zmdi zmdi-facebook"></i></a>
              <a href="javascript:void(0)"
                class="btn-circle btn-circle-raised btn-circle-xs mt-1 mr-1 no-mr-md btn-twitter"><i
                  class="zmdi zmdi-twitter"></i></a>
              <a href="javascript:void(0)"
                class="btn-circle btn-circle-raised btn-circle-xs mt-1 mr-1 no-mr-md btn-instagram"><i
                  class="zmdi zmdi-instagram"></i></a>
            </div>
          </div>
          <div class="card card-bordo animated fadeInUp animation-delay-7">
            <div class="card-header">
              <h3 class="card-title"><center><i class="zmdi zmdi-collection-add zmd-fw"></i><a href="../../index.html"
                  class="btn btn-circle-danger btn-raised">Inscrever-se</a></h3></a></center>
            </div>
          </div>
          <div class="tab-content">
            <div role="tabpanel" class="tab-pane fade active show" id="favorite">
              <div class="card-body">
                <div class="ms-media-list">
                  <div class="media mb-2">
                    <div class="media-left media-middle">
                      <a href="#">
                        <img class="d-flex mr-3 media-object media-object-circle" src="../../assets/img/demo/p75.jpg"
                          alt="...">
                      </a>
                    </div>
                    <div class="media-body">
                      <a href="javascript:void(0)" class="media-heading">Abertas as incrições para o time feminino e masculino</a>
                      <div class="media-footer text-small">
                        <span class="mr-1"><i class="zmdi zmdi-time color-info mr-05"></i> Encerra 21/05</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div role="tabpanel" class="tab-pane fade" id="categories">
          <div class="list-group">
            <a href="javascript:void(0)" class="list-group-item list-group-item-action withripple"><i
                class=" color-info zmdi zmdi-cocktail"></i>Design <span
                class="ml-auto badge-pill badge-pill-info">25</span></a>
            <a href="javascript:void(0)" class="list-group-item list-group-item-action withripple"><i
                class=" color-warning zmdi zmdi-collection-image"></i> Graphics <span
                class="ml-auto badge-pill badge-pill-warning">14</span></a>
            <a href="javascript:void(0)" class="list-group-item list-group-item-action withripple"><i
                class=" color-danger zmdi zmdi-case-check"></i> Productivity <span
                class="ml-auto badge-pill badge-pill-danger">7</span></a>
            <a href="javascript:void(0)" class="list-group-item list-group-item-action withripple"><i
                class=" color-royal zmdi zmdi-folder-star-alt"></i>Resources <span
                class="ml-auto badge-pill badge-pill-royal">67</span></a>
            <a href="javascript:void(0)" class="list-group-item list-group-item-action withripple"><i
                class=" color-success zmdi zmdi-play-circle-outline"></i>Multimedia <span
                class="ml-auto badge-pill badge-pill-success">32</span></a>
          </div>
        </div>
        <div role="tabpanel" class="tab-pane fade" id="archives">
          <div class="list-group">
            <a href="javascript:void(0)" class="list-group-item list-group-item-action withripple"><i
                class="zmdi zmdi-calendar"></i> January 2016 <span class="ml-auto badge-pill">25</span></a>
            <a href="javascript:void(0)" class="list-group-item list-group-item-action withripple"><i
                class="zmdi zmdi-calendar"></i> February 2016 <span class="ml-auto badge-pill">14</span></a>
            <a href="javascript:void(0)" class="list-group-item list-group-item-action withripple"><i
                class="zmdi zmdi-calendar"></i> March 2016 <span class="ml-auto badge-pill">9</span></a>
            <a href="javascript:void(0)" class="list-group-item list-group-item-action withripple"><i
                class="zmdi zmdi-calendar"></i> April 2016 <span class="ml-auto badge-pill">12</span></a>
            <a href="javascript:void(0)" class="list-group-item list-group-item-action withripple"><i
                class="zmdi zmdi-calendar"></i> June 2016 <span class="ml-auto badge-pill">65</span></a>
          </div>
        </div>
        <div role="tabpanel" class="tab-pane fade" id="tags">
          <div class="card-body overflow-hidden text-center">
            <a href="javascript:void(0)" class="ms-tag ms-tag-primary">Design</a>
            <a href="javascript:void(0)" class="ms-tag ms-tag-primary">Productivity</a>
            <a href="javascript:void(0)" class="ms-tag ms-tag-primary">Web</a>
            <a href="javascript:void(0)" class="ms-tag ms-tag-primary">Resources</a>
            <a href="javascript:void(0)" class="ms-tag ms-tag-primary">Multimedia</a>
            <a href="javascript:void(0)" class="ms-tag ms-tag-primary">HTML5</a>
            <a href="javascript:void(0)" class="ms-tag ms-tag-primary">CSS3</a>
            <a href="javascript:void(0)" class="ms-tag ms-tag-primary">Javascript</a>
            <a href="javascript:void(0)" class="ms-tag ms-tag-primary">Jquery</a>
            <a href="javascript:void(0)" class="ms-tag ms-tag-primary">Bootstrap</a>
            <a href="javascript:void(0)" class="ms-tag ms-tag-primary">Angular</a>
            <a href="javascript:void(0)" class="ms-tag ms-tag-primary">Gulp</a>
            <a href="javascript:void(0)" class="ms-tag ms-tag-primary">Atom</a>
            <a href="javascript:void(0)" class="ms-tag ms-tag-primary">Fonts</a>
            <a href="javascript:void(0)" class="ms-tag ms-tag-primary">Pictures</a>
            <a href="javascript:void(0)" class="ms-tag ms-tag-primary">Developers</a>
            <a href="javascript:void(0)" class="ms-tag ms-tag-primary">Code</a>
            <a href="javascript:void(0)" class="ms-tag ms-tag-primary">SASS</a>
            <a href="javascript:void(0)" class="ms-tag ms-tag-primary">Less</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  </div> <!-- container -->
  <footer class="ms-footer">
    <div class="container">
      <p>Copyright &copy; Material Style 2017</p>
    </div>
  </footer>
  <div class="btn-back-top">
    <a href="#" data-scroll id="back-top" class="btn-circle btn-circle-primary btn-circle-sm btn-circle-raised "><i
        class="zmdi zmdi-long-arrow-up"></i></a>
  </div>
  </div> <!-- ms-site-container -->
  <div class="ms-slidebar sb-slidebar sb-left sb-style-overlay" id="ms-slidebar">
    <div class="sb-slidebar-container">
      <header class="ms-slidebar-header">
        <div class="ms-slidebar-login">
          <a href="javascript:void(0)" class="withripple"><i class="zmdi zmdi-account"></i> Login</a>
          <a href="javascript:void(0)" class="withripple"><i class="zmdi zmdi-account-add"></i> Register</a>
        </div>
        <div class="ms-slidebar-title">
          <form class="search-form">
            <input id="search-box-slidebar" type="text" class="search-input" placeholder="Search..." name="q" />
            <label for="search-box-slidebar"><i class="zmdi zmdi-search"></i></label>
          </form>
          <div class="ms-slidebar-t">
            <span class="ms-logo ms-logo-sm">M</span>
            <h3>Material<span>Style</span></h3>
          </div>
        </div>
      </header>
      <div class="ms-slidebar-social ms-slidebar-block">
        <h4 class="ms-slidebar-block-title">Social Links</h4>
        <div class="ms-slidebar-social">
          <a href="javascript:void(0)" class="btn-circle btn-circle-raised btn-facebook"><i
              class="zmdi zmdi-facebook"></i> <span class="badge-pill badge-pill-pink">12</span>
            <div class="ripple-container"></div>
          </a>
          <a href="javascript:void(0)" class="btn-circle btn-circle-raised btn-twitter"><i
              class="zmdi zmdi-twitter"></i> <span class="badge-pill badge-pill-pink">4</span>
            <div class="ripple-container"></div>
          </a>
          <a href="javascript:void(0)" class="btn-circle btn-circle-raised btn-google"><i class="zmdi zmdi-google"></i>
            <div class="ripple-container"></div>
          </a>
          <a href="javascript:void(0)" class="btn-circle btn-circle-raised btn-instagram"><i
              class="zmdi zmdi-instagram"></i>
            <div class="ripple-container"></div>
          </a>
        </div>
      </div>
    </div>
  </div>
  <script src="../../assets/js/plugins.min.js"></script>
  <script src="../../assets/js/app.min.js"></script>
</body>

</html>