    <div id="sidebar" class="v-block">
      <div id="content">
        <ul>
          <li><a href="<?php echo esc_url(home_url('/')); ?>">Home</a></li>
          <li><a href="//fb.com/officialmicetf">Facebook</a></li>
        </ul>

        <h2>Pages</h2>

        <ul><?php wp_list_pages("title_li=");?></ul>

        <div class="reset">
          <div id="widgets" align="center">
            <img src="http://placehold.it/160x600" />
          </div>
        </div>
      </div>
    </div> <!-- end of sidebar --> 
