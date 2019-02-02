<footer class="section site-footer">
    <div class="contenedor clearfix">
      <div class="footer-informacion">
        <h3>Sobre <span>Tech-Conference</span></h3> 
        <p>
          It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum
        </p>
      </div><!--footer-informacion-->
      <div class="ultimos-tweets">
        <h3>Ultimos <span>Tweets</span></h3>
        <ul>
          <li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
          </li>
          <li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
          </li>
          <li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
          </li>
        </ul>
      </div><!--ultimos-tweets-->
      <div class="menu">
        <h3>Redes <span>Sociales</span></h3>
        <nav class="redes-sociales">
          <a href="#"><i class="fab fa-facebook"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>
          <a href="#"><i class="fab fa-pinterest-p"></i></a>
          <a href="#"><i class="fab fa-youtube"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>          
        </nav>
      </div><!--menu--> 
    </div><!--contenedor-->   
    <p class="copyright">
      Todos los derechos reservados Tech-Conference 2018 &copy;
      
    </p>
    <!-- Begin Mailchimp Signup Form -->
<link href="//cdn-images.mailchimp.com/embedcode/classic-10_7.css" rel="stylesheet" type="text/css">
<style type="text/css">
  #mc_embed_signup{background:#fff; clear:left; font:14px Helvetica,Arial,sans-serif; }
  /* Add your own Mailchimp form style overrides in your site stylesheet or in this style block.
     We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
</style>
    <div style="display: none;">
      <div id="mc_embed_signup">
      <form action="https://linkedin.us19.list-manage.com/subscribe/post?u=81a54041e036b621b30762efc&amp;id=ed346a76f3" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
          <div id="mc_embed_signup_scroll">
        <h2>Subscribe to our Newsletter</h2>
        <div class="separador">
            <i class="fas fa-cog"></i>
            <i class="fas fa-cog"></i>
            <i class="fas fa-cog"></i>
          </div><!--separador-->
      <div class="indicates-required"><span class="asterisk">*</span> indicates required</div>
      <div class="mc-field-group">
        <label for="mce-EMAIL">Email Address  <span class="asterisk">*</span>
      </label>
        <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL">
      </div>

        <div id="mce-responses" class="clear">
          <div class="response" id="mce-error-response" style="display:none"></div>
          <div class="response" id="mce-success-response" style="display:none"></div>
        </div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
          <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_81a54041e036b621b30762efc_ed346a76f3" tabindex="-1" value=""></div>
          <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
          </div>
      </form>
      </div>
   
      <script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';fnames[3]='ADDRESS';ftypes[3]='address';fnames[4]='PHONE';ftypes[4]='phone';}(jQuery));var $mcj = jQuery.noConflict(true);</script>
      <!--End mc_embed_signup-->
    </div><!-- display:none -->
  </footer><!--site-footer-->
  <script src="js/vendor/modernizr-3.6.0.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script>window.jQuery || document.write('<script src="js/vendor/jquery-3.3.1.min.js"><\/script>')</script>
  <script src="js/plugins.js"></script>
  
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/jquery.lettering.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  
    <?php 
    $archivo = basename($_SERVER['PHP_SELF']);
    $pagina = str_replace(".php", "", $archivo);
    if($pagina == 'index') {
      echo '<script src="js/jquery.colorbox-min.js"></script>';
      echo '<script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js"
  integrity="sha512-nMMmRyTVoLYqjP9hrbed9S+FzjZHW5gY1TWCHA5ckwXZBadntCNs8kEqAWdrb9O7rxbCaA4lKTIWjDXZxflOcA=="
  crossorigin=""></script>';
    } else if($pagina == 'conferencia') {
      echo '<script src="js/lightbox.js"></script>';
    } else if($pagina == 'invitados') {
      echo '<script src="js/jquery.colorbox-min.js"></script>';
    }

  ?>
  <script src="js/main.js"></script>
  

  <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
  <script>
    window.ga = function () { ga.q.push(arguments) }; ga.q = []; ga.l = +new Date;
    ga('create', 'UA-XXXXX-Y', 'auto'); ga('send', 'pageview')
  </script>
  <script src="https://www.google-analytics.com/analytics.js" async defer></script>
  <script type="text/javascript" src="//downloads.mailchimp.com/js/signup-forms/popup/unique-methods/embed.js" data-dojo-config="usePlainJson: true, isDebug: false"></script><script type="text/javascript">window.dojoRequire(["mojo/signup-forms/Loader"], function(L) { L.start({"baseUrl":"mc.us19.list-manage.com","uuid":"81a54041e036b621b30762efc","lid":"ed346a76f3","uniqueMethods":true}) })</script>
</body>

</html>
