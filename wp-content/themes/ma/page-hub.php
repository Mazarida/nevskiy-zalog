<?php // Template Name: Hub
get_header();
$filters_array = get_calc_filters();
$uri_parts = explode('/', $_SERVER['REQUEST_URI']);
$calc_links = [$_SERVER['REQUEST_URI']];
$hub_links = [];
foreach ($filters_array['avail_filters'] as $filter_slug => $filter) {
    $part_found = false;
    foreach ($filter['options'] as $option) {
        if (in_array($option['filter_option_slug'], $uri_parts)) {
            $part_found = $option['filter_option_slug'];
        }
    }
    if ($part_found) {
        foreach ($filter['options'] as $option) {
            if (!in_array($option['filter_option_slug'], $uri_parts)) {
                $hub_link = str_replace($part_found, $option['filter_option_slug'], $_SERVER['REQUEST_URI']);
                $hub_links[] = $hub_link;
                $calc_links[] = str_replace('/hub/', '/kredit/', $hub_link);
            }
        }
    } else {
        foreach ($filter['options'] as $option) {
            if (!in_array($option['filter_option_slug'], $uri_parts)) {
                $hub_link = $_SERVER['REQUEST_URI'].$option['filter_option_slug'].'/';
                $hub_links[] = $hub_link;
                $calc_links[] = str_replace('/hub/', '/kredit/', $hub_link);
            }
        }
    }
}
echo '<div class="flex-row dsk-container hub-links-container">';
echo '<h1 class="hub-title">Перейти в раздел:</h1>';
foreach ($calc_links as $hub_link) {
    $hub_link = correct_link($hub_link, $filters_array, '/kredit/');
    if ($hub_link == '/kredit/') {
        $hub_link = '/';
    }
    echo '<a class="hub-link" href="'.$hub_link.'">'.get_calc_template($hub_link, 100).'</a><br>';
}
echo '</div>';
echo '<div class="flex-row dsk-container hub-links-container">';
    echo '<h2 class="hub-title">Разделы по теме: '.get_calc_template().'</h2>';
    foreach ($hub_links as $hub_link) {
        if ($hub_link == '/hub/') {
            continue;
        }
        $hub_link = correct_link($hub_link, $filters_array, '/hub/');
        echo '<a class="hub-link" href="'.$hub_link.'">Разделы по теме: '.get_calc_template($hub_link, 100).'</a><br>';
    }
echo '</div>';
echo '<style>
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
@media(max-width: 1024px) {
    .hub-link {
        width: 100%;
    }
    .hub-links-container {
        padding-left: .7em;
        padding-right: .7em;
    }
   
}
</style>';
get_footer(); ?>
