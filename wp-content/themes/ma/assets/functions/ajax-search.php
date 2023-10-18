<?php

// ajax поиск по сайту
add_action("wp_ajax_nopriv_ajax_search", "ajax_search");
add_action("wp_ajax_ajax_search", "ajax_search");
function ajax_search()
{
    $args = array(
        "post_type"      => "any", // Тип записи: post, page, кастомный тип записи
        "post_status"    => "publish",
        "order"          => "DESC",
        "orderby"        => "date",
        "s"              => $_POST["term"],
        "posts_per_page" => -1
    );
    $query = new WP_Query($args);
    if ($query->have_posts()) {
        while ($query->have_posts()) : $query->the_post();
            get_template_part("template-parts/loop-search-item");
        endwhile;
    } else {
        echo "Ничего не найдено"
    }
    exit;
}