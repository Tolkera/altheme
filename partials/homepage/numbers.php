<?php
$achievements = get_theme_option('homepage-achievements-list');
?>

<?php  if (!empty($achievements)) : ?>


<div class="al-numbers al-margin--xl" style="">
    <div class="al-container">
        <div class="al-grid">

            <?php  foreach($achievements as $achievement): ?>


            <div class="al-grid__item al-grid__item--1-4">
                <div class="al-number">
                    <div class="al-number__number"> <?php print $achievement['achievement-number'] ?></div>
                    <div>
                        <div class="al-number__copy"><?php print $achievement['title'] ?></div>
                        <div class="al-number__action"><?php print $achievement['achievement-action'] ?></div>
                    </div>

                </div>
            </div>

            <?php endforeach; endif; ?>
        </div>
    </div>
</div>