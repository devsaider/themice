<?php $options = get_option('tm_theme_options'); ?>
<?php get_header(); ?>
    <div id="maincontent" class="stone-block">
      <div id="content">
        <?php if ($options["tm_pub_2"] != ""): ?>
          <div id="pub2">
            <?=$options["tm_pub_2"]; ?>
          </div>
          <hr>
        <?php endif; ?>

        <?php if (is_home()): ?>
          <div id="game" style="width:800px;height:600px;">
            <!-- trick for fullscreen -->
            <div id="transformice" style="width:100%;height:100%;">
              <object id="swf1" classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,0,0" width="100%" height="100%" align="middle">
              <param name="allowScriptAccess" value="always">
              <param name="movie" value="http://<?=get_current_domain();?>/TFMC.swf">
              <param name="menu" value="true">
              <param name="quality" value="high">
              <param name="bgcolor" value="#6A7495">
              <embed id="swf2" src="http://<?=get_current_domain();?>/TFMC.swf" wmode="direct" menu="true" quality="high" bgcolor="#6A7495" width="100%" height="100%" name="Transformice" align="middle" swliveconnect="true" allowfullscreen="true" allowscriptaccess="always" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer">
              </object>
            </div>
          </div> <!-- end of #game -->
          <hr>
        <?php endif;

        if (!have_posts()) {

        } else { ?><div id="posts"><?php
          while (have_posts()) {
              the_post(); ?>
              <div class="post" id="post-<?php echo get_the_ID(); ?>">
                <?php if (!is_page()): ?>
                  <h2><div class="postavatar"><?php echo get_avatar($post->post_author, 80); ?></div>
                    <a href="<?php the_permalink();?>" title="<?php the_title();?>">
                      <?php the_title();?>
                    </a>
                  </h2>
                  <!-- title + permalink -->

                  <p class="postmetadata">
                    <!-- meta + author -->
                    <span style="color: #62a4a8; font-weight:bold;font-size:1.2em;"><?php the_author();?></span> - <?php the_time('d/m/Y');?>
                  </p>

                  <div class="post_content">
                    <!-- post content itself -->
                    <p style="color: #555555">______________________________________________________________________________________</p>
                    <p><?php the_content();?></p>
                  </div>
                <?php else: ?>
                  <h2><a href="<?php the_permalink();?>" title="<?php the_title();?>"><?php the_title();?></a></h2>

                  <div class="post_content">
                    <!-- post content itself -->
                    <p><?php the_content();?></p>
                  </div>
                <?php endif; ?>
              </div>
              <?php
              if (!is_page()) {echo "<hr>";}
          }
          ?></div><?php
        }
        ?>
        <?php if ($options["tm_pub_3"] != ""): ?>
          <div id="pub3">
            <?=$options["tm_pub_3"]; ?>
          </div>
          <hr>
        <?php endif; ?>

        <div class="navigation">
          <?php
          if (is_page()):

          elseif (is_home()):
            posts_nav_link(' &#151 ', '<span id="prev">Previous Page</span>', '<span id="next">Next Page</span>');
          else:
            previous_post_link('<span id="prev">%link</span>');
            echo ' &#151; ';
            next_post_link('<span id="next">%link</span>');
          endif; ?>
        </div>
      </div>
    </div> <!-- end of stone blocks -->
<?php get_footer(); ?>