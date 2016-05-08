<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
    <label>
        <span class="screen-reader-text">Search for:</span>
		<input type="search" class="search-field" placeholder="Search" value="<?php echo get_search_query(); ?>" name="s" title="Search" />
    </label>
	<button type="submit" class="search-submit">
		<i class="fa fa-search"></i>
	</button>
</form>
