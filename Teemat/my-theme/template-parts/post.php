<div class="card m-2 shadow border text-center" style="max-width: 270px; min-width: 280px">
    <!-- TODO: Jos kuvaa ei ole, laita oletuskuva-->
    <?php the_post_thumbnail('post-preview')?>
  <div class="card-body">
    <h5 class="card-title"><?= get_the_title() ?></h5>
    <p class="text-muted"><?php the_time('M jS, Y') ?></p>
    <?php
        // parametrit: mitä ennen tageja, mitä tagien välissä, ja mitä tagien jälkeen
        the_tags('<span class="tag"><i class="fa fa-eye"></i>',
          "</span><span class='tag'><i class='fa fa-eye'></i>", "</span>");
    ?>
    <p class="card-text"><?= substr(get_the_excerpt(), 0,50) . "..."?></p>
    <a href="<?= get_permalink() ?>" class="btn btn-primary">Read more</a>
  </div>
</div> 