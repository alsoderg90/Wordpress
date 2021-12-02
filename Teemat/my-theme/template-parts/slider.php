<?php
  $slider_active = get_theme_mod('mytheme_slider_activate', 1);
?>
<!-- Malli: https://getbootstrap.com/docs/5.1/components/carousel/#with-controls -->
<?php if($slider_active) : ?>
  <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <?php 
          $image = get_template_directory_uri() . '/assets/images/slider1.jpg';    
          if (get_theme_mod('mytheme_slider_image_1', '') != "") {
            $image = wp_get_attachment_url(get_theme_mod('mytheme_slider_image_1', ''));
          }    
        ?>
      <img src=  "<?= $image ?> "class="d-block w-100" alt="..."> 
        <div class="carousel-caption d-none d-md-block">
          <h5><?= get_theme_mod('mytheme_slider_header_text_1') ?> </h5>
          <p><?= get_theme_mod('mytheme_slider_content_text_1') ?> </p>
        </div>
      </div>
      <div class="carousel-item">
      <?php 
          $image = get_template_directory_uri() . '/assets/images/slider2.jpg';    
          if (get_theme_mod('mytheme_slider_image_2', '') != "") {
            $image = wp_get_attachment_url(get_theme_mod('mytheme_slider_image_2', ''));
          }    
        ?>
        <img src=  "<?= $image ?> "class="d-block w-100" alt="..."> 
        <div class="carousel-caption d-none d-md-block">
        <h5><?= get_theme_mod('mytheme_slider_header_text_2') ?> </h5>
          <p><?= get_theme_mod('mytheme_slider_content_text_2') ?> </p>
        </div>
      </div>
      <div class="carousel-item">
      <?php 
          $image = get_template_directory_uri() . '/assets/images/slider3.jpg';    
          if (get_theme_mod('mytheme_slider_image_3', '') != "") {
            $image = wp_get_attachment_url(get_theme_mod('mytheme_slider_image_3', ''));
          }    
        ?>
        <img src=  "<?= $image ?> "class="d-block w-100" alt="...">       
        <div class="carousel-caption d-none d-md-block">
        <h5><?= get_theme_mod('mytheme_slider_header_text_3') ?> </h5>
          <p><?= get_theme_mod('mytheme_slider_content_text_3') ?> </p>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
<?php endif;?>