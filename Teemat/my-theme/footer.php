<footer>
    <div class="container-fluid">
        <div class="row"> <!-- custom widgets -->
            <div class="col" style="min-width:200px"><?php dynamic_sidebar('footer-sidebar-1'); ?></div>
            <div class="col" style="min-width:200px"><?php dynamic_sidebar('footer-sidebar-2'); ?></div>
            <div class="col" style="min-width:200px"> </div>
        </div>
        <div class="row">
            <div class="col" style="min-width:200px"><?php dynamic_sidebar('bottom-footer-sidebar'); ?></div>
        </div>
    </div>
</footer>
<?php wp_footer() ?>
</body>
</html>