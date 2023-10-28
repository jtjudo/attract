<?php
get_header();

$backgroundImage = get_field('individual_image');
$shorDescription = get_field('shor_description');
$subHeadline = get_field('sub_headline');
$elapsedTime = get_field('elapsed_time');
$year = get_field('year');
?>

<section class="hero-case distance">
    <div class="container">
        <div class="hero-case-wrap" style="background-image: url(<?= $backgroundImage['url'] ?>)">
            <div class="case-info">
                <div class="case-left-info">
                    <p class="text-4"><?= get_the_title() ?></p>
                    <p class="h3"><?= $shorDescription ?? '' ?></p>
                    <div class="wrap-bottom">
                        <div class="left">
                            <p class="text-2"><?= $subHeadline ?? '' ?></p>
                        </div>

                    </div>
                </div>
                <div class="right">
                    <?php if (!empty($elapsedTime)) : ?>
                        <div class="elapsed-time">
                            <p class="text-3">Время работы</p>
                            <p class="h6"><?= $elapsedTime ?></p>
                        </div>
                    <?php endif; ?>
                    <?php if (!empty($year)) : ?>
                        <div class="year">
                            <p class="text-3">ГОД</p>
                            <p class="h6"><?= $year ?></p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
the_content();
get_footer();
?>