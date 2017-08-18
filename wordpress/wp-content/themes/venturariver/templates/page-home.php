<?php
/*
Template Name: Homepage
*/

get_header(); ?>
<div class="small-12 medium-8  columns end " role="main">
  <section id="homepage">
    <?php /* Start loop */ ?>
    <?php while ( have_posts() ) : the_post(); ?>
      <article <?php post_class() ?> id="post-<?php the_ID(); ?>">
        <header>
          <!--<h1 class="entry-title"><?php the_title(); ?></h1> -->
        </header>

        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner" role="listbox">

            <?php $slider = get_posts(array('post_type' => 'slider', 'posts_per_page' => 5)); ?>
            <?php $count = 0; ?>
            <?php foreach($slider as $slide): ?>
              <div class="carousel-item <?php echo ($count == 0) ? 'active' : ''; ?>">
                <img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id($slide->ID)) ?>" class="img-responsive" style="width:100%"/>
                <div class="carousel-caption">
                  <p><?php echo $slide->post_content;?></p>
                </div>
                <?php if ($count == 0) : ?>

                <?php endif; ?>
              </div>
              <?php $count++; ?>
            <?php endforeach; ?>
          </div>

          <!-- Controls -->
          <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>

        <div class="learn-section">
          <div class="contact-section">
            <div class="container">
              <div class="row">
                <div class="col-md-8">
                  <div class="learn-content">
                    <h3>Need to reach us?</h3>
                    <?php
                    echo get_post_meta(get_the_ID(),"center_left_column_body", true);
                    ?>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="contact">
                    <p> Phone: (805) 643-3403<br>
                      Emergency: (805) 389-6700<br>
                      Email: Bert@VenturaRiverWD.com<br>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div>
          </div>


            <div class="container-fluid">
              <div class="row">
                <div class="col-md-3">
                  <div class="icon-content"><i class="fa fa-newspaper-o" aria-hidden="true"></i></div>
                  <div class="icon-section">
                    <div class="why-title">E-Billing</div>
                    <p>Sign up for e-billing and online payment options. Autopay/ACH is free. Service fees will apply to credit/debit card/ e-check payments.
                    </p>
                  <!--  <a href=""><button class="slider-btn">Pay Online</button></a> -->
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="icon-content"><i class="fa fa-certificate" aria-hidden="true"></i></div>
                  <div class="icon-section">
                    <div class="why-title">Authority to Operate</div>
                    <p>Click here to read about our authority to operate
                    </p>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="icon-content"><i class="fa fa-clock-o" aria-hidden="true"></i></div>
                  <div class="icon-section">
                    <div class="why-title">Hours of Operation</div>
                    <p>We are open Monday through Friday. <br>
                      7:30 A.M. to 4:30 P.M.
                    </p>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="icon-content"><i class="fa fa-newspaper-o" aria-hidden="true"></i></div>
                  <div class="icon-section">
                    <div class="why-title">Mission Statement</div>
                    <p>Learn about our mission
                    </p>
                  </div>
                </div>
              </div>

            </div>
          </div>

          <div class="service-section">
            <div class="container">
              <div class="row">
                <div class="col-md-6">
                  <a href="#"><img class="service-img" src="<?php echo get_template_directory_uri(); ?>/assets/img/ojaiwater.jpg" style="margin:0 auto"></a>
                  <div class="service-content">
                    <div class="service-title">Board & Meetings</div>
                    <p>Our Computer Repair services cover any computer whether it is a
                      Laptop, Desktop, Windows, Mac,
                    </p>
                  </div>
                </div>
                <div class="col-md-6">
                  <a href="#"><img class="service-img" src="<?php echo get_template_directory_uri(); ?>/assets/img/ojaihotsprings.jpg" style="margin:0 auto"></a>
                  <div class="service-content">
                    <div class="service-title">News & Updates</div>
                    <p>Whether you are big or small, a new or existing business, we are here to help.
                      From Maintenance services
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="appointment-section" style="background-repeat: no-repeat;background-image: url(<?php echo get_template_directory_uri(); ?>/assets/img/golf.jpg);background-attachment: fixed;background-position: center right;background-repeat: no-repeat;background-size: cover;">
            <div class="info-content">
              <h3>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.<br>
                Aenean commodo <br>
                <br>
                pellentesque eu, pretium quis, sem. Nulla co</h3>
              </div>
            </div>

            <div class="forms-section">
              <div class="status-content">
                <div class="container">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="status">
                          <h2>Ground Water Levels</h2>
                          <p>Diagram of current ground water levels.<br>
                          Always conserve water!</p>
                        <img src="http://localhost:3000/wp-content/themes/venturariver/assets/img/waterstatus.png">
                      </div>
                      <a href=""><button class="btn">Learn More</button></a>

                    </div>
                    <div class="col-md-6">
                      <?php gravity_form( 1, true, false, false, '', false ); ?>
                      <div class="col-md-12">
                        <?php gravity_form( 2, true, false, false, '', false ); ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>



          <?php comments_template(); ?>
        </article>
      <?php endwhile; // End the loop ?>

    </div>
  </section>

  <?php get_footer(); ?>
