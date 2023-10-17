<?php // // Template Name: Кредитные программы
$filters = get_calc_filters();
get_header(); ?>

<section class="tariffs">
    <h2 class="nzlg-title tariffs__trf-title">
        Расшифровка <strong>кредитных программ</strong>
    </h2>
    <div class="tariffs__tariff-wrap">
    <?php if ( have_rows( 'page_content3' ) ): ?>
	<?php while ( have_rows( 'page_content3' ) ) : the_row(); ?>
		<?php if ( get_row_layout() == 'our_credit_programs' ) : ?>
			<?php if ( have_rows( 'programm_car' ) ) : ?>
				<?php while ( have_rows( 'programm_car' ) ) : the_row(); ?>
					<?php the_sub_field( 'color_card' ); ?>
					<?php the_sub_field( 'programm_name' ); ?>
					<?php the_sub_field( 'programm_description' ); ?>
					<?php the_sub_field( 'programm_condition' ); ?>
					<?php if ( have_rows( 'programm_condition_ul' ) ) : ?>
						<?php while ( have_rows( 'programm_condition_ul' ) ) : the_row(); ?>
							<?php the_sub_field( 'programm_condition_ul_li' ); ?>
						<?php endwhile; ?>
					<?php else : ?>
						<?php // no rows found ?>
					<?php endif; ?>
					<?php the_sub_field( 'button_text' ); ?>
					<?php // out_pagemain ( value )
					$out_pagemain_array = get_sub_field( 'out_pagemain' );
					if ( $out_pagemain_array ):
						foreach ( $out_pagemain_array as $out_pagemain_item ):
						 	echo $out_pagemain_item;
						endforeach;
					endif; ?>
				<?php endwhile; ?>
			<?php else : ?>
				<?php // no rows found ?>
			<?php endif; ?>
		<?php endif; ?>
	<?php endwhile; ?>
<?php else: ?>
	<?php // no layouts found ?>
<?php endif; ?>
    </div>
    <a href="#" class="tariffs__btn-secondary">
        Посмотреть все программы
    </a>
</section>
 



<?php get_footer(); ?>
