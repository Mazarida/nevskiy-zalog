<?php // // Template Name: Кредитные программы
$filters = get_calc_filters();
get_header(); ?>

    <section class="tariffs">
        <h2 <?php live_edit('flex-our_credit_programs--header', get_option('page_on_front')) ?> class="nzlg-title tariffs__trf-title">
            <?php //echo strip_tags( get_sub_field( 'header', get_option('page_on_front') ), ['strong'] ); ?>
			<?php the_field( 'header' ); ?>
        </h2>
<?php while ( have_rows( 'page_content2' ) ) : the_row(); ?>
<?php if ( get_row_layout() == 'our_credit_programs' ) : ?>
    <div <?php live_edit('page_content2, flex-our_credit_programs--programm_car') ?> class="tariffs__tariff-wrap">
        <?php if (have_rows("programm_car")) : ?>
    	<?php while (have_rows("programm_car")) : the_row(); ?>
                <?php if (get_sub_field('color_card')) : ?>
                <div class="<?php the_sub_field("color_card") ?> click-btn  btn-style1">
                    <?php endif; ?>
                    <div class="tariff-item__icon-shield"></div>
                    <h3 class="tariff-item__tariff-header">
                        <?php if (get_sub_field('programm_name')) : ?>
                            <?php the_sub_field("programm_name") ?>
                        <?php endif; ?>
                    </h3>
                    <div class="tariff-item__tariff-desc">
                        <?php if (get_sub_field('programm_description')) : ?>
                            <?php the_sub_field("programm_description") ?>
                        <?php endif; ?>
                    </div>
                    <div class="tariff-item__list-title">
                        <?php if (get_sub_field('programm_condition')) : ?>
                            <?php the_sub_field("programm_condition") ?>
                        <?php endif; ?>
                    </div>
                    <ul class="tariff-item__desc-list">
                        <?php if (have_rows("programm_condition_ul")) : ?>
                            <?php while (have_rows("programm_condition_ul")) : the_row(); ?>
                                <?php if (get_sub_field('programm_condition_ul_li')) : ?>
                                    <li class="desc-list__desc-item">
                                        <?php the_sub_field("programm_condition_ul_li") ?>
                                    </li>
                                <?php endif; ?>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </ul>
                    <a style="cursor: pointer;" class="tariff-item__btn-primary button-animate modal-btn" data-path="three">
                        <?php if (get_sub_field('button_text')) : ?>
                            <?php the_sub_field("button_text") ?>
                        <?php endif; ?>
                    </a>
                </div>
    <?php endwhile; ?>
    <?php endif; ?>
    </div>
<?php endif; ?>
<?php endwhile; ?>
<!--         <a <?php live_edit('flex-our_credit_programs--имя_поля', get_option('page_on_front')) ?>href="#" class="tariffs__btn-secondary">
            <?php //echo strip_tags( get_sub_field( 'all_programm', get_option('page_on_front') ), ['strong'] ); ?>
			<?php the_field( 'all_programm' ); ?>
        </a> -->
    </section>

<?php get_footer(); ?>