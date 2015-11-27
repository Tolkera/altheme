<?php
    $front_candidates = get_theme_option('homepage-candidates-list');
    ?>

<div class="al-container al-margin--xl">
    <h2 class="al-heading--primary">Featured candidates  <a href="" class="al-view-link al-btn--attention">View all candidates</a></h2>

    <div class="al-grid al-margin--s">

    <?php  foreach($front_candidates as $front_candidate): ?>

            <?php $post_info = get_post($front_candidate['homepage-candidates-select']);
            $candidate_position = get_post_meta($front_candidate['homepage-candidates-select'], 'candidate_position', true);
            $candidate_excerpt = $post_info->post_excerpt;
            ?>
            <div class="al-grid__item al-grid__item--third">
                <div class="al-card">
                    <header class="al-media al-card__header">
                        <div class="al-media__heading">
                            <h3 class="card__title"><a href="<?php echo get_permalink ($post_info->ID) ?>">
                                    <?php print $candidate_position ?>
                                </a></h3>
                        </div>
                        <div class="al-media__info">
                            <div class="card__location al-location"><span class="fa fa-map-marker"></span>Kiev</div>
                        </div>
                    </header>
                    <div class="card__description">
                        <?php print $candidate_excerpt ?>
                    </div>
                    <a href="<?php echo get_permalink ($post_info->ID) ?>" class="al-btn al-btn--secondary al-btn--regular al-margin--xs">learn more</a>
                </div>
            </div>


        <?php endforeach; ?>

    </div>
</div>




<div class="al-container al-margin--l">
    <h2 class="al-heading--primary">Featured vacancies <a href="" class="al-view-link al-btn--brand">View all vacancies</a></h2>

    <div>
        <?php
        foreach($front_candidates as $front_candidate){
            $post_info = get_post($front_candidate['homepage-candidates-select']);
            $candidate_position = get_post_meta($front_candidate['homepage-candidates-select'], 'candidate_position', true);
            $candidate_excerpt = $post_info->post_excerpt;
        }
        ?>

    </div>

    <div class="al-grid al-margin--s">
        <div class="al-grid__item al-grid__item--third">
            <div class="al-card">
                <header class="al-media al-card__header">
                    <div class="al-media__heading">
                        <h3 class="card__title  al-heading--brand"><a href="">Looking for senior PHP developer</a></h3>
                    </div>
                    <div class="al-media__info">
                        <div class="card__location al-location"><span class="fa fa-map-marker"></span>Amsterdam</div>
                    </div>
                </header>
                <div class="card__description">
                    3 years of experience with PHP and Symphony, strong SQL skills, a positive attitude and superior work ethic
                </div>
                <a href="" class="al-btn al-btn--secondary al-btn--regular al-margin--xs">learn more</a>
            </div>
        </div>
        <div class="al-grid__item al-grid__item--third">
            <div class="al-card">
                <header class="al-media al-card__header">
                    <div class="al-media__heading">
                        <h3 class="card__title  al-heading--brand"><a href="">Looking for senior PHP developer</a></h3>
                    </div>
                    <div class="al-media__info">
                        <div class="card__location al-location"><span class="fa fa-map-marker"></span>Amsterdam</div>
                    </div>
                </header>
                <div class="card__description">
                    3 years of experience with PHP and Symphony, strong SQL skills, a positive attitude and superior work ethic
                </div>
                <a href="" class="al-btn al-btn--secondary al-btn--regular al-margin--xs">learn more</a>
            </div>
        </div>
        <div  <div class="al-grid__item al-grid__item--third">
            <div class="al-card">
                <header class="al-media al-card__header">
                    <div class="al-media__heading">
                        <h3 class="card__title  al-heading--brand"><a href="">Looking for senior PHP developer</a></h3>
                    </div>
                    <div class="al-media__info">
                        <div class="card__location al-location"><span class="fa fa-map-marker"></span>Amsterdam</div>
                    </div>
                </header>
                <div class="card__description">
                    3 years of experience with PHP and Symphony, strong SQL skills, a positive attitude and superior work ethic
                </div>
                <a href="" class="al-btn al-btn--secondary al-btn--regular al-margin--xs">learn more</a>
            </div>
        </div>
    </div>
</div>


<div class="al-testimonials al-margin--xl" style="">
        <div class="al-container">
            <blockquote class="al-testimonial-item">
                <p class="al-testimonial-item__copy">Alla is an awesome HR who can get the company spirit to its best.
                    She has a talent to find perfectly right people for the company.</p>
                <footer class="intermediate-section__quote-footer">
                    <cite class="al-testimonial-item__author">Aliaksandr Kanaukou, iOS Developer at Viber Media, Inc.</cite>
                </footer>
                <a href="" class="al-testimonials__view-all">View all testimonials on LinkedIn</a>

            </blockquote>
        </div>
</div>


<div class="al-container al-margin--xxl">
    <div class="al-grid">
        <div class="al-grid__item al-grid__item--half">
            <article class="al-post--home">
                <header>
                    <a href="" class="al-post__thumbnail">
                        <img src="http://www.mictgold.com/wp-content/uploads/2012/04/staff-management1.jpg" alt="">
                    </a>
                    <h3 class="al-heading al-heading--tertiary">
                        <a href="">
                            The best way to headhunt IT-staff
                        </a>
                    </h3>
                </header>
                <div class="al-post__description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis eos iste maiores soluta ullam. Ab aliquid at dicta exercitationem itaque laudantium minima, neque! Eius illum iure minima ut velit veritatis.</div>
                <a href="" class="al-view-link al-btn--brand">read more</a>
            </article>
        </div>

        <div class="al-grid__item al-grid__item--half">
            <article class="al-post--home">
                <header>
                    <a href="" class="al-post__thumbnail">
                        <img src="http://www.nasuni.com/writable/images/2013/Blog/happy-it-guy-web.jpg" alt="">
                    </a>
                    <h3 class="al-heading al-heading--tertiary">
                        <a href="">
                            The best way to headhunt IT-staff
                        </a>
                    </h3>
                </header>
                <div class="al-post__description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis eos iste maiores soluta ullam. Ab aliquid at dicta exercitationem itaque laudantium minima, neque! Eius illum iure minima ut velit veritatis.</div>
                <a href="" class="al-view-link al-btn--brand">read more</a>
            </article>
        </div>
    </div>
</div>

