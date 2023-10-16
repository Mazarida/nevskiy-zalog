<?php // // Template Name: Hub
$filters = get_calc_filters();
get_header(); ?>

<?php while ( have_rows( 'page_content2') ) : the_row(); ?>
    <?php if ( get_row_layout() == 'our_credit_programs' ) : ?>

<section class="tariffs">
    <h2 <?php live_edit('page_content2, flex-our_credit_programs--header') ?> class="nzlg-title tariffs__trf-title">
        <?php echo strip_tags( get_sub_field( 'header'), ['strong'] ); ?>
    </h2>
	
	
    <div <?php live_edit('page_content2, flex-our_credit_programs--programm_car') ?> class="tariffs__tariff-wrap">
		
		
		<?php if (have_rows("programm_car")) : ?>
    		<?php while (have_rows("programm_car")) : the_row(); ?>
		
		<?php if (get_sub_field('color_card')) : ?>
			<div class="<?php the_sub_field("color_card") ?> click-btn btn-style1">
            
        <?php endif; ?>
        
            <div class="tariff-item__icon-shield"></div>
            <h3 class="tariff-item__tariff-header">
				<?php if (get_sub_field('programm_name')) : ?>
					<?php the_sub_field("programm_name") ?>
				<?php endif; ?>
<!--                 <strong>6% доступное</strong> решение -->
            </h3>
            <div class="tariff-item__tariff-desc">
				<?php if (get_sub_field('programm_description')) : ?>
					<?php the_sub_field("programm_description") ?>
				<?php endif; ?>
<!--                 Выгодная кредитная программа с низкой процентной ставкой для реализации вашей мечты -->
            </div>
            <div class="tariff-item__list-title">
				<?php if (get_sub_field('programm_condition')) : ?>
					<?php the_sub_field("programm_condition") ?>
				<?php endif; ?>
<!--                 Основные условия: -->
            </div>
				
			
            <ul class="tariff-item__desc-list">
				<?php if (have_rows("programm_condition_ul")) : ?>
    				<?php while (have_rows("programm_condition_ul")) : the_row(); ?>
						<?php if (get_sub_field('programm_condition_ul_li')) : ?>
                <li class="desc-list__desc-item">
					
						<?php the_sub_field("programm_condition_ul_li") ?>
					
<!--                     Процентная ставка: 6% годовых -->
                </li>
				<?php endif; ?>
								<?php endwhile; ?>
<?php endif; ?>
<!--                 <li class="desc-list__desc-item">
                    Срок кредита: до 20 лет
                </li>
                <li class="desc-list__desc-item">
                    Необходимые документы: паспорт, справка о доходах, документы на квартиру
                </li>
                <li class="desc-list__desc-item">
                    Дополнительные требования: кредитная история без просрочек
                </li> -->
            </ul>

            <a href="#" class="tariff-item__btn-primary button-animate btn-5">
                <?php if (get_sub_field('button_text')) : ?>
					<?php the_sub_field("button_text") ?>
				<?php endif; ?>
            </a>
        </div>
		
		  <?php endwhile; ?>
<?php endif; ?>

    </div>
	
	

 
    <a href="#" <?php live_edit('page_content2, flex-our_credit_programs--all_programm') ?>  class="tariffs__btn-secondary1  btn-5">

		<?php echo strip_tags( get_sub_field( 'all_programm'), ['strong'] ); ?>
<!--         Посмотреть все программы -->
    </a>
</section>

	<?php endif; ?>
<?php endwhile; ?>



<?php get_footer(); ?>
