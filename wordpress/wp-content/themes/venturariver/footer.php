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

  <div class="container">
  <div class="footer">
       <div class="row">
           <p>Ventura River Water District</p>
           <p>(805) 643-3403</p>
           <p>Bert@VenturaRiverWD.com</p>
           <p>09 Old Baldwin Road, Ojai, CA 93023</p>
           <p>Contact Us</p>
       </div>
</div>
</div>

   </footer><!-- #colophon -->

 </div><!-- wrapper end -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>
