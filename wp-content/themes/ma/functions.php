<?php
add_action( 'after_setup_theme', 'blankslate_setup' );
function blankslate_setup()
{
    add_theme_support( 'title-tag' );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'post-thumbnails' );
}
add_action( 'wp_enqueue_scripts', 'blankslate_load_scripts' );
function blankslate_load_scripts()
{
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'jquery_ui', get_bloginfo('template_url').'/lib/jquery-ui.min.js', array('jquery'), '1.0', true );
    wp_enqueue_script( 'punch', get_bloginfo('template_url').'/lib/jquery.ui.touch-punch.min.js', array('jquery_ui'), '1.0', true );
    wp_enqueue_script( 'mamain', get_bloginfo('template_url').'/main.js', array('punch'), '1.0', true );
}
add_action( 'comment_form_before', 'blankslate_enqueue_comment_reply_script' );
function blankslate_enqueue_comment_reply_script()
{
    if ( get_option( 'thread_comments' ) ) { wp_enqueue_script( 'comment-reply' ); }
}
add_filter( 'the_title', 'blankslate_title' );
function blankslate_title( $title ) {
    if ( $title == '' ) {
        return '&rarr;';
    } else {
        return $title;
    }
}
add_filter( 'wp_title', 'blankslate_filter_wp_title' );
function blankslate_filter_wp_title( $title )
{
    return $title . esc_attr( get_bloginfo( 'name' ) );
}
add_filter( 'get_comments_number', 'blankslate_comments_number' );
function blankslate_comments_number( $count )
{
    if ( !is_admin() ) {
        global $id;
        $comments_by_type = &separate_comments( get_comments( 'status=approve&post_id=' . $id ) );
        return count( $comments_by_type['comment'] );
    } else {
        return $count;
    }
}
add_filter( 'show_admin_bar', '__return_false' );

add_action('init', 'anew_rewrite_rule');
function anew_rewrite_rule(){
    add_rewrite_rule('^kredit\\/(.*)','index.php?is_generated_page=1','top');
}

add_action('init', 'get_calc_data_response');
function get_calc_data_response() {
    if (isset($_GET['get_calc_data'])) {
        die(json_encode(get_calc_data()));
    }
}

function get_calc_data() {
    global $calc_data;
//    $max_depth = (int)get_field('max_depth', 'option');
    if (!$calc_data) {
        $filters = get_calc_filters();
        $img = '';
        $url_fragments = [];
//        $bullets = [];
        foreach ($filters['vals'] as $filter_val) {
            if (in_array($filter_val['filter_option_slug'], $_POST)) {
//                if (count($url_fragments) < $max_depth) {
                    if ($filter_val['filter_option_head_offer_img'] && !$img) {
                        $img = $filter_val['filter_option_head_offer_img'];
                    }
                    $url_fragments[] = $filter_val['filter_option_slug'];
//                } else {
//                    $bullets[] = $filter_val['filter_option_template'];
//                }
            }
        }
        $url = '/kredit/'.implode('/', $url_fragments).'/';
        $calc_data = [
            'title' => get_calc_template($url),
            'img' => $img,
//            'bullets' => $bullets,
            'url' => $url,
        ];
    }
    return $calc_data;
}

add_action('query_vars','controller_set_query_var');
function controller_set_query_var($vars) {
    array_push($vars, 'is_generated_page'); // ref url redirected to in add rewrite rule

    return $vars;
}

add_filter('template_include', 'include_controller');
function include_controller($template){
    if(get_query_var('is_generated_page')){
        $new_template = get_stylesheet_directory().'/page-home.php';
        if(file_exists($new_template)){
            $template = $new_template;
            add_filter('document_title', 'get_calc_title');
        }
    }
    return $template;
}

function get_calc_title($title) {
    global $replace_title;
    $replace_title = get_calc_template();
    return get_calc_template().' | '.get_bloginfo('name');
}

if (function_exists('acf_add_options_page')) {
    acf_add_options_page();
}

function get_calc_filters() {
    global $filters_array;
    if (!$filters_array) {
        $filters_array = [
            'vals' => [],
            'avail_filters' => [],
        ];
        while ( have_rows( 'filter', 'option' ) ) : the_row();
            $filter_slug = get_sub_field( 'filter_slug' );
            $quiz_step = get_sub_field( 'quiz_step' );
            $filter_label = get_sub_field( 'filter_label' );
            $filter_visible_calc = get_sub_field( 'filter_visible_calc' );
            $filters_array['avail_filters'][$filter_slug] = [
                'options' => [],
                'filter_slug' => $filter_slug,
                'quiz_step' => $quiz_step,
                'filter_label' => $filter_label,
                'filter_visible_calc' => $filter_visible_calc,
            ];
            while ( have_rows( 'filter_options', 'option' ) ) : the_row();
                $filters_array['vals'][] = [
                    'filter_option_label' => get_sub_field( 'filter_option_label' ),
                    'filter_option_slug' => get_sub_field( 'filter_option_slug' ),
                    'filter_option_template' => lcfirst(get_sub_field( 'filter_option_template' )),
                    'filter_option_head_offer_img' => get_sub_field( 'filter_option_head_offer_img' ),
                ];
                $filters_array['avail_filters'][$filter_slug]['options'][] = [
                    'filter_option_label' => get_sub_field( 'filter_option_label' ),
                    'filter_option_slug' => get_sub_field( 'filter_option_slug' ),
                    'filter_option_template' => get_sub_field( 'filter_option_template' ),
                    'filter_option_head_offer_img' => get_sub_field( 'filter_option_head_offer_img' ),
                ];
            endwhile;
        endwhile;
    }
    return $filters_array;
}

function get_calc_template($url = '', $n = 4) {
    $template = ['Кредит'];
    if (!$url) {
        $url = $_SERVER['REQUEST_URI'];
    }
    $url = explode('/', $url);
    $filters = get_calc_filters();
    global $replace_img;
    $replace_img = '';
    foreach ($filters['vals'] as $filter) {
        if (in_array($filter['filter_option_slug'], $url)) {
            if ($filter['filter_option_head_offer_img'] && !$replace_img) {
                $replace_img = $filter['filter_option_head_offer_img'];
            }

            if ($n > 0) {
                $template[] = mb_strtolower($filter['filter_option_template']);
            }
            $n--;
        }
    }
    return implode(' ', $template);
}

if( function_exists('acf_add_options_page') ) {
$args = array(
'page_title' => 'Параметры',
'menu_title' => '',
'menu_slug' => 'Options',
'post_id' => 'options',
);
acf_add_options_page( $args );
}
