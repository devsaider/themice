<?php $options = get_option('tm_theme_options'); ?>
<?php get_header(); ?>
    <div id="maincontent" class="stone-block">
      <div id="content">
        <div style="text-align: center;">
          <h1>Page Not Found</h1>
          <p>
            It looks like nothing was found at this location.
          </p>
          <img src="<?=get_stylesheet_directory_uri();?>/images/404error.png" width=800 />
          <script type="text/javascript">
            /* redirect after 5s */
            setTimeout(function () {
               window.location.href = "/";
            }, 5000);
          </script>
        </div>
      </div>
    </div> <!-- end of stone blocks -->
<?php get_footer(); ?>