<?php

/*
Title: Контакная форма
Mode: preview
*/

?>

<?php
$headline = get_field('headline');
$icon = get_field('icon');
$form = get_field('form');
?>

<?php if (!is_admin()) : ?>
    <section class="contact-form">
        <div class="container">
            <div class="contact-form__header">
                <?php if (!empty($headline)) : ?>
                    <h2 class="contact-form__headline">
                        <?= $headline ?>
                    </h2>
                <?php endif; ?>

                <?php if (!empty($icon)) : ?>
                    <div class="contact-form__icon">
                        <img loading="lazy" src="<?= $icon['url'] ?>" alt="Иконка">
                    </div>
                <?php endif; ?>


            </div>
            <?php if (!empty($form)) : ?>

                <?= $form ?>

            <?php endif; ?>

        </div>
    </section>
<?php else: ?>
    <h2 style="font-family: 'Mark', sans-serif;">Контакная форма</h2>
<?php endif; ?>