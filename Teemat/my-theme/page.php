<?php
	get_header();
	get_template_part('template-parts/nav');
	?>
<div class="m-4" style="">
    <!-- TODO: Jos kuvaa ei ole, laita oletuskuva-->
  <?php the_post_thumbnail('post-preview')?>
    <div class="card-body">
      <h5 class="card-title"><?= get_the_title() ?></h5>
      <p class="card-text"><?php the_content()?></p>
    </div>
</div> 
<?php get_footer() ?>