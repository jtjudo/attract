<?php

/*
Title: Каталог кейсов модуль
Mode: preview
*/

?>

<?php

$categories = get_terms([
    'taxonomy' => 'case-category',
    'hide_empty' => false,
]);

$cases = get_posts([
    'post_type' => 'case',
    'posts_per_page' => -1,
    'post_status' => 'publish',
    'orderby' => 'ID',
    'order' => 'ASC',
]);

$chunkedArrays = array_chunk($cases, ceil(count($cases) / 2));

?>

<?php if (!is_admin()) : ?>
    <section class="catalog-cases distance">
        <div class="container">
            <div class="cases-sticky">
                <?php if (!empty($categories)) : ?>
                    <div class="cases-categories">
                        <?php foreach ($categories as $key => $category) : ?>
                            <?php
                            $casesForCategory = get_posts([
                                'post_type' => 'case',
                                'posts_per_page' => -1,
                                'post_status' => array('publish', 'private'),
                                'tax_query' => [
                                    [
                                        'relation' => 'AND',
                                        'taxonomy' => $category->taxonomy,
                                        'field' => 'term_id',
                                        'terms' => $category->term_id,
                                    ],

                                ],
                            ]);

                            $casesForCategoryIds = array_map(function ($cat) {
                                return $cat->ID;
                            }, $casesForCategory);
                            ?>

                            <p class="text-4 single-case <?php if ($key === 0) : ?> js-active <?php endif; ?>" data-ids="<?= json_encode($casesForCategoryIds) ?>"><?= $category->name ?></p>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
            <?php if (!empty($cases)) : ?>
                <div class="cases">
                    <div class="cases-left">
                        <?php foreach ($chunkedArrays[0] as $key => $case) : ?>
                            <?php
                            $category = get_the_terms($case->ID, 'case-category');
                            $categoryName = '';
                            if (!empty($category)) {
                                $categoryName = $category[0]->name;
                            }

                            $shor_description = get_field('shor_description', $case->ID);
                            $preview_image = get_field('catalog_image', $case->ID);
                            $link = get_permalink($case);
                            $tags = get_field('tags', $case->ID);
                            $h = 'h5';
                            ?>
                            <?php include get_template_directory() . '/components/case-card.php' ?>
                        <?php endforeach; ?>
                    </div>

                    <div class="cases-right">
                        <?php foreach ($chunkedArrays[1] as $key => $case) : ?>
                            <?php
                            $category = get_the_terms($case->ID, 'case-category');
                            $categoryName = '';
                            if (!empty($category)) {
                                $categoryName = $category[0]->name;
                            }

                            $shor_description = get_field('shor_description', $case->ID);
                            $preview_image = get_field('preview_image', $case->ID);
                            $link = get_permalink($case);
                            $tags = get_field('tags', $case->ID);
                            $h = 'h5';
                            ?>
                            <?php include get_template_directory() . '/components/case-card.php' ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>
<?php else: ?>
    <h2 style="font-family: 'Mark', sans-serif;">Каталог кейсов модуль</h2>
<?php endif; ?>