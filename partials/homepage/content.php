<?php
$pageCopy = get_theme_option( 'homepage-copy' );

if( "" != $pageCopy ) : ?>
    <div class="section section--content">
        <div class="content width">
            <?php echo $pageCopy; ?>
        </div>
    </div>
<?php endif; ?>