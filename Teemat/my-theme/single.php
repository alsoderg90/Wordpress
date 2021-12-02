<?php
	get_header();
	get_template_part('template-parts/nav');
    if(is_home()) {
	    get_template_part('template-parts/slider');
    }
	?>
	<div class="p-4 card-group justify-content-center">
	<?php	
		if(have_posts()) {
			while(have_posts()) {
				the_post();
                get_template_part('template-parts/single-post');                    
	?>
			<?php
			}
		}
	?>
	</div>
	<?php wp_footer() ?>