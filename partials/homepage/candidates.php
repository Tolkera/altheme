<?php
    $front_candidates = get_theme_option('homepage-candidates-list');
    ?>

<div class="al-container al-margin--xl">
    <h2 class="al-heading--primary">Featured candidates  <a href="/candidates" class="al-view-link al-btn--attention">View all candidates</a></h2>

    <div class="al-grid al-margin--s">

    <?php  foreach($front_candidates as $front_candidate): ?>

            <?php $post_info = get_post($front_candidate['homepage-candidates-select']);
            $candidate_position = get_post_meta($front_candidate['homepage-candidates-select'], 'candidate_position', true);
            $location = get_post_meta($front_candidate['homepage-candidates-select'], 'candidate_location', true);
            $candidate_excerpt = $post_info->post_excerpt;
            ?>
            <div class="al-grid__item al-grid__item--third al-grid__item--equal">
                <div class="al-card">
                    <header class="al-media al-card__header">
                        <h3 class="al-card__title"><a href="<?php echo get_permalink ($post_info->ID) ?>">
                                <?php print $candidate_position ?>
                            </a></h3>
                        <div class="al-card__location al-location"><span class="fa fa-map-marker"></span>
                            <?php print $location ?>
                        </div>
                    </header>
                    <div class="al-card__description">
                        <?php print $candidate_excerpt ?>
                    </div>
                    <a href="<?php echo get_permalink ($post_info->ID) ?>" class="al-btn al-btn--secondary al-btn--regular al-margin--xs">learn more</a>
                </div>
            </div>


        <?php endforeach; ?>

    </div>
</div>