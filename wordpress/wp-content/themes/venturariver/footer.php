<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */


 $the_theme = wp_get_theme();
 $container = get_theme_mod( 'understrap_container_type' );
 ?>
 <div id="fb-root"></div>
 <script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.9";
  fjs.parentNode.insertBefore(js, fjs);
 }(document, 'script', 'facebook-jssdk'));</script>



 <div class="wrapper" id="wrapper-footer">

   <footer class="site-footer" id="colophon">

  <div class="container-fluid">

       <div class="row">
         <div class="col-md-4">
           <i class="fa fa-phone" aria-hidden="true"></i>
           <p>(805) 656-1019</p>
         </div>
         <div class="col-md-4">
           <i class="fa fa-envelope" aria-hidden="true"></i><p>info@venturacraneinc.com</p>
         </div>
         <div class="col-md-4">
           <i class="fa fa-home" aria-hidden="true"></i><p>114 E Sanata Maria St, Santa Paula, CA 93060</p>
         </div>
       </div>

</div>

   </footer><!-- #colophon -->

 </div><!-- wrapper end -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>
