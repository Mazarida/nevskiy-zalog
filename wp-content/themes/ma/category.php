<?php get_header(); ?>
<div class="flex-row dsk-container hub-links-container">
    <h1 class="hub-title">Перейти в раздел:</h1>
<!--     <?php
    if (have_posts()) :
        while (have_posts()) : the_post();
    ?>
        <a class="hub-link" href="<?php the_permalink(); ?>"><?php the_title(); ?></a><br>
    <?php
        endwhile;
    endif;
    ?> -->
	 <?php
        $args = array(
            'cat' => 'bloki-seo', // Замените на ID рубрики "Блоки SEO"
            'post_type' => 'post',
            'post_status' => 'publish',
            'posts_per_page' => -1, // Вывести все статьи из рубрики "Блоки SEO"
        );

        $query = new WP_Query($args);

        if ($query->have_posts()) :
            while ($query->have_posts()) : $query->the_post();
        ?>
            
                <a href="<?php the_permalink(); ?>" class="hub-link">
                    <?php the_title(); ?>
                </a>
            
        <?php
            endwhile;
            wp_reset_postdata();
        endif;
        ?>
</div>
<style>
    .hub-title {
        font-weight: 500;
        width: 100%;
        padding-bottom: 1em;
    }
    .hub-links-container {
        flex-wrap: wrap;
        padding-top: 1em;
        padding-bottom: 1em;
        justify-content: flex-start;
    }
    .hub-link {
        font-size: .7em;
        padding: .5em;
        width: 33%;
    }
    @media (max-width: 1024px) {
        .hub-link {
            width: 100%;
        }
        .hub-links-container {
            padding-left: .7em;
            padding-right: .7em;
        }
    }
</style>

<?php get_footer(); ?>