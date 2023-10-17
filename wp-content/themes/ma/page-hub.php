<?php // Template Name: Hub
get_header();
$filters_array = get_calc_filters();
$rez = [];
foreach ($filters_array['avail_filters'] as $filter_slug => $filter) {
    $rez[$filter_slug] = [];
    foreach ($filter['options'] as $option) {
        $rez[$filter_slug][] = $option['filter_option_slug'];
    }
}
get_footer(); ?>