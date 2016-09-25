<?php $options = get_option('tm_theme_options'); ?>
    <div id="sidebar" class="v-block">
      <div id="content">
        <ul>
          <li><a href="<?php echo esc_url(home_url('/')); ?>">Home</a></li>

          <?php if ("on" == $options["tm_fbenabled"]): ?>
            <li><a href="//<?=$options["tm_fblink"]; ?>">Facebook</a></li>
          <?php endif; ?>

          <?php if ("on" == $options["tm_clenabled"]): ?>
            <li><a href="<?=$options["tm_cl"]; ?>" target="_href"><?=$options["tm_cl_name"]; ?></a></li>
          <?php endif; ?>
        </ul>

        <h2>Pages</h2>

        <ul><?php wp_list_pages("title_li=");?></ul>

        <div class="reset">
          <div id="widgets" align="center">
            <div id="pub1">
              <?=$options["tm_pub_1"];?>
            </div>
          </div>
        </div>
      </div>
    </div> <!-- end of sidebar --> 
