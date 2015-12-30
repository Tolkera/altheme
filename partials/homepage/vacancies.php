<?php
$front_vacancies = get_theme_option('homepage-vacancies-list');
?>

<div class="al-container al-margin--xl">
    <h2 class="al-heading--primary">Featured vacancies  <a href="/vacancies" class="al-view-link al-btn--brand">View all vacancies</a></h2>

    <div class="al-grid al-margin--s">

        <?php  foreach($front_vacancies as $front_vacancy): ?>

            <?php $post_info = get_post($front_vacancy['homepage-vacancies-select']);
            $location = get_post_meta($front_vacancy['homepage-vacancies-select'], 'vacancy_location', true);

            ?>
            <div class="al-grid__item al-grid__item--third al-grid__item--equal">
                <div class="al-card">
                    <header class="al-media al-card__header">
                        <h3 class="al-card__title"><a href="<?php echo get_permalink ($post_info->ID) ?>">
                                <?php print $post_info->post_title ?>
                            </a></h3>
                        <div class="al-card__location al-location"><span class="fa fa-map-marker"></span> <?php print $post_info->vacancy_location ?></div>
                    </header>
                    <div class="al-card__description">
                        <?php print $post_info->post_excerpt ?>
                    </div>
                    <a href="<?php echo get_permalink ($post_info->ID) ?>" class="al-btn al-btn--secondary al-btn--regular al-margin--xs">apply now</a>
                </div>
            </div>


        <?php endforeach; ?>

    </div>
</div>