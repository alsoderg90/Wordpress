<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <?php
      if( has_custom_logo()) {
        the_custom_logo();
      } else 
      { ?>
        <a class="navbar-brand site-title" href="<?= get_home_url()?>">
        <?php
        bloginfo('name')?>
        </a>
        <?php
      }
    ?>  
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
        data-bs-target="#navbarSupportedContent" 
        aria-controls="navbarSupportedContent" aria-expanded="false" 
        aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSuppoertedContent">    
      <?php
        wp_nav_menu(
          array(
            'theme_location' => 'header-menu',
            'container_class' => 'my_extra_menu_class'
            /* Ei käytetä walkeria ja bootstrappia
            'container' => '',
            'menu_class' => "navbar-nav me-auto mb-2 mb-lg-0",
            'walker' => new header_menu_walker()
            */
          )
        )
      ?>  
      <form class="d-flex" action="<?php home_url()?>">
        <input name="s" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>



