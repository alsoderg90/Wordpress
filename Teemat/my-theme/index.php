<?php
	get_header();
	get_template_part('template-parts/nav');
	// customizer apissa tallennettu tieto
	get_theme_mod('setting_id', "default");
	if(is_home()) {
		get_template_part('template-parts/slider');
	}
	?>
	<div class="container-fluid">
		<div class="row">
			<div class="col p-4 card-group justify-content-center">
				<?php	
					if(have_posts()) {
						while(have_posts()) {
							the_post();
							get_template_part('template-parts/post');
						}
					}
				?>
			</div>
			<div class="col-md-3 p-2">
				<!-- custom widget -->
				<?php dynamic_sidebar('sidebar-1'); ?>
			</div>
		</div>
	</div>
	<?php get_template_part('template-parts/pagination'); ?>

<?php get_footer() ?>