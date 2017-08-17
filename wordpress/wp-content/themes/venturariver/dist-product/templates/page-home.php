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
            <div class="rigging-section">
              <div class="learn-content">
                <div class="container-fluid">
                  <div class="row">
                    <h3>Need to reach us?</h3>
                    <?php
                    echo get_post_meta(get_the_ID(),"center_left_column_body", true);
                    ?>
                  </div>
                </div>
              </div>
            </div>





  <div class="why-section" style="background-repeat: no-repeat;background-image: url(<?php echo get_template_directory_uri(); ?>/img/house-wire-model-fade-white-1500x1085.png);background-attachment: fixed;background-position: top left;background-repeat: no-repeat;background-size: cover;">
<div class="container-fluid">
<div class="row">
  <div class="col-md-4">
    <div class="icon-content"><i class="fa fa-certificate" aria-hidden="true"></i></div>
    <div class="why-content">
      <div class="why-title">Authority to Operate</div>
      <p>Click here to read about our authority to operate
      </p>
    </div>
  </div>
  <div class="col-md-4">
    <div class="icon-content"><i class="fa fa-clock-o" aria-hidden="true"></i></div>
    <div class="why-content">
      <div class="why-title">Hours of Operation</div>
      <p>We are open Monday through Friday. <br>
        7:30 A.M. to 4:30 P.M.
      </p>
    </div>
  </div>
  <div class="col-md-4">
    <div class="icon-content"><i class="fa fa-newspaper-o" aria-hidden="true"></i></div>
    <div class="why-content">
      <div class="why-title">New & Updates</div>
      <p>Find out the latest information
      </p>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-4">
    <div class="icon-content"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></div>
    <div class="why-content">
      <div class="why-title">Mission Statement</div>
      <p>Learn about our mission.
      </p>
    </div>
  </div>
  <div class="col-md-4">
    <div class="icon-content"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
    <div class="why-content">
      <div class="why-title">Location</div>
      <p>VRCWD, 409 Old Baldwin Road, Ojai, CA 93023
      <p>
    </div>
  </div>
  <div class="col-md-4">
    <div class="icon-content"><i class="fa fa-search" aria-hidden="true"></i></div>
    <div class="why-content">
      <div class="why-title">Employment Opportunities</div>
      <p>Learn about available positions.
      </p>
    </div>
  </div>
</div>
</div>
</div>


            <div class="trucking-section">
              <div class="learn-content">
                <div class="container-fluid">
                  <div class="row">
                    <h3>Ground Water Levels</h3>
                    <?php
                    echo get_post_meta(get_the_ID(),"center_right_column_body", true);
                    ?>
                    <a href=""><button class="btn">Learn More</button></a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="contact-us">
          <div class="container">
            <div class="row">
              <?php gravity_form( 1, true, false, false, '', false ); ?>
            </div>
          </div>
        </div>





        <footer>
          <?php wp_link_pages( array('before' => '<nav id="page-nav"><p>' . __( 'Pages:', 'foundationpress' ), 'after' => '</p></nav>' ) ); ?>
          <p><?php the_tags(); ?></p>
        </footer>
        <?php comments_template(); ?>
      </article>
    <?php endwhile; // End the loop ?>

  </div>
</section>
<?php get_footer(); ?>
