
<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ) ?>" >
	<!-- <label class="screen-reader-text" for="s">Поиск: </label>
	<input type="text" value="<?php echo get_search_query() ?>" name="s" id="s" />
	<input type="submit" id="searchsubmit" value="найти" /> -->

      <input type="text" placeholder="Поиск..." class="desktop-only head-bot__search-input screen-reader-text" for="s">
      <input type="text" placeholder="Поиск..." class="global-search" value="<?php echo get_search_query() ?>" name="s" id="s" />
<!--   		<a href="#"  id="searchsubmit" class="head-bot__head-search-icon"></a> -->
        <input type="submit" id="searchsubmit" class="head-bot__head-search-icon" value="" />

			
	</div>
</form> 
