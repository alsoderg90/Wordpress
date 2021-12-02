<div class="card m-4 shadow border text-center">
    <!-- TODO: Jos kuvaa ei ole, laita oletuskuva-->
    <div style="text-align:center">

    <?php
    //haetaan postauksen metatiedoista tieto katsomiskerroista
        $views = get_post_meta(get_the_ID(),"views", true);
        $views = $views = '' ? 0 : $views;
        //luodaan metatieto blogin katsomiskerroista
        update_post_meta(get_the_ID(), "views", $views++ );
        // TODO: Fontaweseome versio -> fa fa-eye toimii
        echo "Views: <i class='fa fa-eye'></i>" . $views;
    ?>

    <?php the_post_thumbnail('post-thumbnail', [
      'style' =>'width: 50%; height: 75%;display:inline-block;',
      'class' => ''
    ])?>
  </div>
  <div class="card-body">
    <h5 class="card-title"><?= get_the_title() ?></h5>
    <p class="card-text"><?= get_the_tags() ?></p>
    <p class="card-text"><?= get_the_content() ?></p>
  </div>


<?php
/* TODO: Blogikommenttien näyttäminen

  <div class="comments-wrapper">
    <div class="comments" id="comments">
        <div class="comments-header">
            <h2 class="comment-reply-title">
                <?php
                if( ! have_comments()) {
                    echo "Leave a Comment";
                    }
                else {
                    echo get_comments_number() . " Comments";
                }
                ?>
            </h2><!-- .comments-title -->
        </div><!-- .comments-header -->
        <div class="comments-inner">
            <?php
                wp_list_comments(
                    array(
                        'avatar_size' => 120,
                        'style' => 'div'
                    )
                ); 
            ?>
        </div><!-- .comments-inner -->
    </div><!-- comments -->
    <hr class="" aria-hidden="true">
    <?php
        if( comments_open() ){ // onko kommentointi sallittua
            comment_form(
                array(
                    'class_form' => '',
                    "title_reply_before" => '<h2 id=""reply-title" class="comment-reply-title">',
                    'title_reply_after' => '</h2>'
                )
            );
        }
    ?>
</div>
 */?> 