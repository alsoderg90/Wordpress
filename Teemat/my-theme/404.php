<?php
	get_header();
	get_template_part('template-parts/nav');
	?>
	<div class="p-4 justify-content-center mx-auto " style="max-width: 700px">
        <h3>Sorry, we can't find what you're looking for </h3><br>
        <h4>try to search for something below</h4>
        <br>
        <form class="form-inline my-2 my-lg-0" action="<?=  get_home_url()?>">
            <input autofocus name="s" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>

<?php get_footer() ?>