<?php // Template Name: Calc
$filters = get_calc_filters();
get_header();
global $replace_img;
$style_head_offer = '';
$style_head_offer_ctr = '';
if ($replace_img) {
    $style_head_offer = "background-image: url('$replace_img'); background-position: 100% 50%;";
    $style_head_offer_ctr = "background-image: none;";
}
?>

<section class="head-offer head-offer-dsk"<?=($style_head_offer ? ' style="'.$style_head_offer.'"' : '')?>>
    <div class="dsk-container head-offer__ctr"<?=($style_head_offer_ctr ? ' style="'.$style_head_offer_ctr.'"' : '')?>>
        <h1 data-action="title-replace" class="head-offer__offer-title">
            <?php global $replace_title;
            if ($replace_title) {
                echo $replace_title;
            } else {
                ?>
                <strong>Получи</strong> лучшее предложение по кредиту
                <?php
            }
            ?>
        </h1>
        <ul class="head-offers__head-benefits">
            <li class="head-benefits__head-benefit">
                За <strong>1 день</strong>
            </li>
            <li class="head-benefits__head-benefit">
                Ставка <strong>5%</strong>
            </li>
            <li class="head-benefits__head-benefit">
                С любой <strong>кредитной историей</strong>
            </li>
            <li class="head-benefits__head-benefit">
                Минимум <strong>документов</strong>
            </li>
            <li class="head-benefits__head-benefit">
                Максимальная <strong>сумма кредита</strong>
            </li>
        </ul>
        <a href="#" class="head-offer__offer-link button-animate btn-5" id="open-modal-btn1">
            Получить финансирование
        </a>
        <div class="flex-row head-offer__bonus-banner">
            <div class="bonus-banner__banner-img"></div>
            <div class="bonus-banner__banner-text">
                +получите бесплатный <strong>анализ
                    кредитной истории</strong> и инструкцию
                как получить финансирование
            </div>
        </div>
    </div>
</section>
<section class="credit-calc">
    <h2 class="nzlg-title credit-calc__calc-title">
        <strong>Кредитный</strong> калькулятор
    </h2>
    <div class="credit-calc__calc-quiz">
        <div class="flex-row calc-quiz__quiz-header">
            <div class="quiz-header__quiz-title">
                Узнай свои условия
            </div>
            <div class="flex-row quiz-header__quiz-steps">
                <div class="quiz-steps__step-current">
                    Шаг <span class="js-quiz-step">1</span>
                </div>
                <div class="quiz-steps__step-next">
                    из 4
                </div>
            </div>
        </div>
        <?php for ($i = 1; $i <= 4; $i++) { ?>
            <div data-step="<?=$i?>" class="calc-quiz__quiz-step<?=$i==1 ? ' step-current' : '' ?>">
                <?php foreach ($filters['avail_filters'] as $filter) { if ($filter['quiz_step'] != $i) { continue; } ?>
                    <div data-slug="<?=$filter['filter_slug']?>" class="quiz-step__quiz-section">
                        <div class="quiz-section__qz-section-header">
                            <?=$filter['filter_label']?>:
                        </div>
                        <div class="quiz-section__tab-btns">
                            <div class="tab-btns__btns-wrap">
                                <?php foreach ($filter['options'] as $option): ?>
                                    <div data-value="<?=$option['filter_option_slug']?>" class="btns-wrap__btn-clc<?=strpos($_SERVER['REQUEST_URI'], $option['filter_option_slug']) !== false ? ' btn-calc-active' : ''?>">
                                        <?=$option['filter_option_label']?>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        <?php } ?>
        <div class="flex-row calc-quiz__quiz-footer">
            <div class="quiz-footer__btn-alt">
                Назад
            </div>
            <div class="quiz-footer__btn-primary">
                Далее
            </div>
        </div>

        <div class="flex-row calc-quiz__calc-results">
            <div class="calc-results__result-col">
                <div class="result-col__result-title">
                    Ежемесячный платеж:
                </div>
                <div class="result-col__res-digits">
                    <span class="js-monthly">96 753</span> ₽
                </div>
                <a href="#" class="result-col__btn-primary">
                    Оформить сейчас
                </a>
            </div>
            <div class="calc-results__result-col">
                <div class="result-col__result-title">
                    Сумма кредита:
                </div>
                <div class="result-col__res-digits">
                    <span class="js-percent">6 933 199</span> ₽
                </div>
                <a href="#" class="result-col__btn-secondary">
                    Рассчитать заново
                </a>
            </div>
            <div class="calc-quiz__calc-disclaimer">
                *Не является публичной офертой
            </div>
        </div>
    </div>
    <div <?php live_edit('filter', 'option') ?> class="calculate__calculator desktop-only">
        <div class="calculator__top-calc">
            <div class="top-calc__sliders">
                <?php foreach ($filters['avail_filters'] as $filter): if (!in_array($filter['filter_slug'], ['sum', 'duration'])) { continue; } ?>
                    <label class="bottom-calc__calc-select">
                        <span class="calc-select__label-text">
                            <?=$filter['filter_label']?>:
                        </span>
                        <select name="<?=$filter['filter_slug']?>" class="calc-select__selector">
                            <option value="-">
                                (не выбрано)
                            </option>
                            <?php foreach ($filter['options'] as $option): ?>
                                <option <?=strpos($_SERVER['REQUEST_URI'], $option['filter_option_slug']) !== false ? 'selected' : ''?> value="<?=$option['filter_option_slug']?>">
                                    <?=$option['filter_option_label']?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </label>
                <?php endforeach; ?>
            </div>
            <div class="top-calc__calc-result">
                <div class="calc-result__results">
                    <div class="results__result-item">
                        <div class="result-item__title">
                            Ежемесячный платеж:
                        </div>
                        <div class="result-item__value">
                            <span class="js-monthly">от 17 652</span> Р
                        </div>
                        <a href="#" class="calc-result__btn button-animate-light btn-5">
                            Оформить сейчас
                        </a>
                    </div>
                    <div class="results__result-item">
                        <div class="result-item__title title-gap">
                            Процентная ставка:
                        </div>
                        <div class="result-item__value value-gap">
                            <span class="js-percent">от 9,49</span>%
                        </div>
                        <a href="#" class="calc-result__btn-alt btn-5">
                            Рассчитать заново
                        </a>
                    </div>
                    <div class="results__result-disclaimer">
                        Калькулятор поможет рассчитать кредит за доли секунды.
                        <br>
                        <br>
                        Ежемесячный платёж
                        меняется от выбранных
                        вами параметров
                    </div>
                </div>
                <div class="calc-result__disclaimer">
                    *Не является публичной офертой
                </div>
            </div>
        </div>
        <div class="calculator__bottom-calc">
            <?php foreach ($filters['avail_filters'] as $filter): if (!$filter['filter_visible_calc']) { continue; } ?>
                <label class="bottom-calc__calc-select">
                        <span class="calc-select__label-text">
                            <?=$filter['filter_label']?>:
                        </span>
                    <select name="<?=$filter['filter_slug']?>" class="calc-select__selector">
                        <option value="-">
                            (не выбрано)
                        </option>
                        <?php foreach ($filter['options'] as $option): ?>
                            <option <?=strpos($_SERVER['REQUEST_URI'], $option['filter_option_slug']) !== false ? 'selected' : ''?> value="<?=$option['filter_option_slug']?>">
                                <?=$option['filter_option_label']?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </label>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- <section class="our-team">
    <h2 class="nzlg-title our-team__team-title">
        <strong>Команда</strong> экспертов
    </h2>
    <div class="our-team__team-experts">
        <div class="team-experts__team-expert">
            <div style="background-image: url('<?php bloginfo('template_url'); ?>/assets/img/team-expert__expert-photo.jpg')" class="team-expert__expert-photo"></div>
            <div class="team-expert__expert-info">
                <h3 class="expert-info__expert-name">
                    Валерия
                </h3>
                <div class="expert-info__expert-position">
                    Должность эксперта в компании
                </div>
                <div class="expert-info__expert-desc">
                    имеет более 10 лет опыта работы в сфере кредитования и финансов. За время своей карьеры, он помог более чем 500 клиентам успешно оформить кредиты под залог квартиры. Александр постоянно повышает свою квалификацию и является экспертом в области ипотечного кредитования.
                </div>
            </div>
        </div>
        <div class="team-experts__team-expert">
            <div style="background-image: url('<?php bloginfo('template_url'); ?>/assets/img/team-expert__expert-photo.jpg')" class="team-expert__expert-photo"></div>
            <div class="team-expert__expert-info">
                <h3 class="expert-info__expert-name">
                    Олеся
                </h3>
                <div class="expert-info__expert-position">
                    Должность эксперта в компании
                </div>
                <div class="expert-info__expert-desc">
                    имеет более 10 лет опыта работы в сфере кредитования и финансов. За время своей карьеры, он помог более чем 500 клиентам успешно оформить кредиты под залог квартиры. Александр постоянно повышает свою квалификацию и является экспертом в области ипотечного кредитования.
                </div>
            </div>
        </div>
    </div>
    <a href="#" class="our-team__btn-primary button-animate">
        Получить консультацию эксперта
    </a>
</section> -->


<?php while ( have_rows( 'page_content', get_option('page_on_front') ) ) : the_row(); ?>
    <?php if ( get_row_layout() == 'our_team_experts' ) : ?>

<section class="our-team">
    <h2 <?php live_edit('page_content, flex-our_team_experts--header', get_option('page_on_front')) ?>  class="nzlg-title our-team__team-title">
        <?php echo strip_tags( get_sub_field( 'header', get_option('page_on_front') ), ['strong'] ); ?>

    </h2>
    <div <?php live_edit('page_content, flex-our_team_experts--expert_card', get_option('page_on_front')) ?>  class="our-team__team-experts our-team__team-experts--mod">

		<?php if (have_rows("expert_card")) : ?>
    		<?php while (have_rows("expert_card")) : the_row(); ?>

        <div  class="team-experts__team-expert team-experts__team-expert--mod">
			<?php if (get_sub_field('expert_img')) : ?>

				<div style="background-image: url('<?php the_sub_field("expert_img") ?>')" class="team-expert__expert-photo"></div>
			<?php endif; ?>


            <div class="team-expert__expert-info">
				        <?php if (get_sub_field('expert_name')) : ?>
							 <h3 class="expert-info__expert-name">
								<?php the_sub_field("expert_name") ?>
							</h3>

						<?php endif; ?>


                <div class="expert-info__expert-position">
					<?php if (get_sub_field('expert_span')) : ?>
						<?php the_sub_field("expert_span") ?>
					<?php endif; ?>

                </div>
                <div class="expert-info__expert-desc">

					 <?php if (get_sub_field('expert_info')) : ?>
						<?php the_sub_field("expert_info") ?>
					<?php endif; ?>
                </div>
            </div>
        </div>

			<?php endwhile; ?>
		<?php endif; ?>

    </div>
    <a <?php live_edit('page_content, flex-our_team_experts--button_text', get_option('page_on_front')) ?> href="#" class="our-team__btn-primary button-animate btn-5">
		<?php echo strip_tags( get_sub_field( 'button_text', get_option('page_on_front') ), ['strong'] ); ?>
<!--         Получить консультацию эксперта -->
    </a>
</section>

    <?php endif; ?>
<?php endwhile; ?>



<?php while ( have_rows( 'page_content', get_option('page_on_front') ) ) : the_row(); ?>
    <?php if ( get_row_layout() == 'video_services' ) : ?>



<section class="service-video">
    <h2 <?php live_edit('page_content, flex-video_services--video_services_header_h', get_option('page_on_front')) ?>  class="nzlg-title service-video__video-title">
		<?php echo strip_tags( get_sub_field( 'video_services_header_h', get_option('page_on_front') ), ['strong'] ); ?>

    </h2>
    <p <?php live_edit('page_content, flex-video_services--video_services_header_text_p', get_option('page_on_front')) ?>  class="desktop-only service-video__text">
        <strong data-action="title-replace">
            <?php global $replace_title;
            if ($replace_title) {
                echo $replace_title;
            } else {
                ?>
				<?php echo strip_tags( get_sub_field( 'video_services_header_text_p', get_option('page_on_front') ), ['strong'] ); ?>
<!--                 Кредит под залог квартиры -->
                <?php
            }
            ?>
        </strong>

        <br>
        <br>

			<span <?php live_edit('page_content, flex-video_services--video_services_text_p', get_option('page_on_front')) ?>>
				<?php echo strip_tags( get_sub_field( 'video_services_text_p', get_option('page_on_front') ), ['strong'] ); ?>
			</span>


<!--         это удобный и надежный способ получить необходимую сумму денег при наличии недвижимости, которая будет выступать в роли залога. Наша компания предлагает выгодные условия кредитования и индивидуальный подход к каждому клиенту. Оформление кредита под залог квартиры позволяет получить средства налюбые нужды, будь то покупка новой недвижимости, образование или реализация бизнес-проекта -->
    </p>

<!-- 		style="background-image: url('<?php bloginfo('template_url'); ?>/assets/img/service-video__video-player.jpg')"  -->

		<div class="service-video__video-player embed-container" <?php live_edit('page_content, flex-video_services--video_test', get_option('page_on_front')) ?> >
<!-- 			<div class="video-player__icon-play"></div> -->
			<?php the_sub_field( 'video_test' ); ?>
		</div>

<!-- 		<div class="embed-container">

			</div> -->


</section>

	<?php endif; ?>
<?php endwhile; ?>



<?php while ( have_rows( 'page_content', get_option('page_on_front') ) ) : the_row(); ?>
    <?php if ( get_row_layout() == 'our_reviews' ) : ?>

<section class="testimonials">
    <div class="dsk-container">
        <h2 <?php live_edit('page_content, flex-our_reviews--header', get_option('page_on_front')) ?>  class="nzlg-title testimonials__tst-title">
				<?php echo strip_tags( get_sub_field( 'header', get_option('page_on_front') ), ['strong'] ); ?>
<!--             За 3 года работы <strong>более 300 положительных отзывов</strong> -->
        </h2>
        <div class="flex-row testimonials__tst-tabs-header">
            <div <?php live_edit('page_content, flex-our_reviews--reviews_tab_1', get_option('page_on_front')) ?>  data-modal="txt" class="tst-tabs-header__tabs-btn btn-active">
					<?php echo strip_tags( get_sub_field( 'reviews_tab_1', get_option('page_on_front') ), ['strong'] ); ?>
<!--                 Отзывы -->
            </div>
            <div <?php live_edit('page_content, flex-our_reviews--reviews_tab_2', get_option('page_on_front')) ?>  data-modal="vid" class="tst-tabs-header__tabs-btn">
					<?php echo strip_tags( get_sub_field( 'reviews_tab_2', get_option('page_on_front') ), ['strong'] ); ?>
<!--                 Видеоотзывы -->
            </div>
        </div>
    </div>
    <div data-modal="txt" class="testimonails__slider-tst">
        <div <?php live_edit('page_content, flex-our_reviews--reviews_images', get_option('page_on_front')) ?> class="swiper slider-tst__slider js-slider-testimonials-txt">
            <div   class="swiper-wrapper slider-tst__slide-wrapper">

				<?php if (have_rows("reviews_images")) : ?>
					<?php while (have_rows("reviews_images")) : the_row(); ?>
                <div class="swiper-slide slide-wrapper__tst-slide">
								<?php if (get_sub_field('reviews_img')) : ?>
									<img style="margin-left: -3%;" class="tst-slide__img" src="<?php the_sub_field("reviews_img") ?>" alt="">

								<?php endif; ?>


                </div>
				<?php endwhile; ?>
			<?php endif; ?>


<!--                 <div class="swiper-slide slide-wrapper__tst-slide">
                    <img class="tst-slide__img" src="<?php bloginfo('template_url'); ?>/assets/img/tst-slide__img2.jpg" alt="">
                </div>
                <div class="swiper-slide slide-wrapper__tst-slide">
                    <img class="tst-slide__img" src="<?php bloginfo('template_url'); ?>/assets/img/tst-slide__img2.jpg" alt="">
                </div>
                <div class="swiper-slide slide-wrapper__tst-slide">
                    <img class="tst-slide__img" src="<?php bloginfo('template_url'); ?>/assets/img/tst-slide__img2.jpg" alt="">
                </div>
                <div class="swiper-slide slide-wrapper__tst-slide">
                    <img class="tst-slide__img" src="<?php bloginfo('template_url'); ?>/assets/img/tst-slide__img2.jpg" alt="">
                </div>
                <div class="swiper-slide slide-wrapper__tst-slide">
                    <img class="tst-slide__img" src="<?php bloginfo('template_url'); ?>/assets/img/tst-slide__img2.jpg" alt="">
                </div>
                <div class="swiper-slide slide-wrapper__tst-slide">
                    <img class="tst-slide__img" src="<?php bloginfo('template_url'); ?>/assets/img/tst-slide__img2.jpg" alt="">
                </div>
                <div class="swiper-slide slide-wrapper__tst-slide">
                    <img class="tst-slide__img" src="<?php bloginfo('template_url'); ?>/assets/img/tst-slide__img2.jpg" alt="">
                </div>
                <div class="swiper-slide slide-wrapper__tst-slide">
                    <img class="tst-slide__img" src="<?php bloginfo('template_url'); ?>/assets/img/tst-slide__img2.jpg" alt="">
                </div>
                <div class="swiper-slide slide-wrapper__tst-slide">
                    <img class="tst-slide__img" src="<?php bloginfo('template_url'); ?>/assets/img/tst-slide__img2.jpg" alt="">
                </div>
                <div class="swiper-slide slide-wrapper__tst-slide">
                    <img class="tst-slide__img" src="<?php bloginfo('template_url'); ?>/assets/img/tst-slide__img2.jpg" alt="">
                </div> -->
            </div>
            <div class="swiper-pagination" style="margin-top: 20px;"></div>
        </div>
    </div>


    <div data-modal="vid" style="display: none;" class="testimonails__slider-tst slider-tst-vid">
        <div <?php live_edit('page_content, flex-our_reviews--reviews_videos', get_option('page_on_front')) ?>  class="swiper slider-tst__slider js-slider-testimonials-vid">
            <div class="swiper-wrapper slider-tst__slide-wrapper slide-wrapper-vid">
				<?php if (have_rows("reviews_videos")) : ?>
    				<?php while (have_rows("reviews_videos")) : the_row(); ?>
                <div class="swiper-slide slide-wrapper__tst-slide slider-tst-vid__single-vid">
					<?php if (get_sub_field('reviews_video')) : ?>
<!-- 							<div class="single-vid__player" style="background-image: url('<?php bloginfo('template_url'); ?>/assets/img/single-vid__player.jpg')"> -->
<!-- 								<div class="player__play-btn"></div> -->
								<?php the_sub_field("reviews_video") ?>
<!-- 							</div> -->
					<?php endif; ?>

                </div>
					<?php endwhile; ?>
				<?php endif; ?>

<!--                 <div class="swiper-slide slide-wrapper__tst-slide slider-tst-vid__single-vid">
                    <div class="single-vid__player" style="background-image: url('<?php bloginfo('template_url'); ?>/assets/img/single-vid__player.jpg')">
                        <div class="player__play-btn"></div>
                    </div>
                </div>
                <div class="swiper-slide slide-wrapper__tst-slide slider-tst-vid__single-vid">
                    <div class="single-vid__player" style="background-image: url('<?php bloginfo('template_url'); ?>/assets/img/single-vid__player.jpg')">
                        <div class="player__play-btn"></div>
                    </div>
                </div>
                <div class="swiper-slide slide-wrapper__tst-slide slider-tst-vid__single-vid">
                    <div class="single-vid__player" style="background-image: url('<?php bloginfo('template_url'); ?>/assets/img/single-vid__player.jpg')">
                        <div class="player__play-btn"></div>
                    </div>
                </div>
                <div class="swiper-slide slide-wrapper__tst-slide slider-tst-vid__single-vid">
                    <div class="single-vid__player" style="background-image: url('<?php bloginfo('template_url'); ?>/assets/img/single-vid__player.jpg')">
                        <div class="player__play-btn"></div>
                    </div>
                </div>
                <div class="swiper-slide slide-wrapper__tst-slide slider-tst-vid__single-vid">
                    <div class="single-vid__player" style="background-image: url('<?php bloginfo('template_url'); ?>/assets/img/single-vid__player.jpg')">
                        <div class="player__play-btn"></div>
                    </div>
                </div> -->
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>


    <a <?php live_edit('page_content, flex-our_reviews--button_text', get_option('page_on_front')) ?>  href="#" class="testimonials__btn-primary button-animate btn-5">
			<?php echo strip_tags( get_sub_field( 'button_text', get_option('page_on_front') ), ['strong'] ); ?>

    </a>
</section>

 <?php endif; ?>
<?php endwhile; ?>



<!-- <section class="testimonials">
    <div class="dsk-container">
        <h2 class="nzlg-title testimonials__tst-title">
            За 3 года работы <strong>более 300 положительных отзывов</strong>
        </h2>
        <div class="flex-row testimonials__tst-tabs-header">
            <div data-modal="txt" class="tst-tabs-header__tabs-btn btn-active">
                Отзывы
            </div>
            <div data-modal="vid" class="tst-tabs-header__tabs-btn">
                Видеоотзывы
            </div>
        </div>
    </div>
    <div data-modal="txt" class="testimonails__slider-tst">
        <div class="swiper slider-tst__slider js-slider-testimonials-txt">
            <div class="swiper-wrapper slider-tst__slide-wrapper">
                <div class="swiper-slide slide-wrapper__tst-slide">
                    <img style="margin-left: -3%;" class="tst-slide__img" src="<?php bloginfo('template_url'); ?>/assets/img/tst-slide__img.png" alt="">
                </div>
                <div class="swiper-slide slide-wrapper__tst-slide">
                    <img class="tst-slide__img" src="<?php bloginfo('template_url'); ?>/assets/img/tst-slide__img2.jpg" alt="">
                </div>
                <div class="swiper-slide slide-wrapper__tst-slide">
                    <img class="tst-slide__img" src="<?php bloginfo('template_url'); ?>/assets/img/tst-slide__img2.jpg" alt="">
                </div>
                <div class="swiper-slide slide-wrapper__tst-slide">
                    <img class="tst-slide__img" src="<?php bloginfo('template_url'); ?>/assets/img/tst-slide__img2.jpg" alt="">
                </div>
                <div class="swiper-slide slide-wrapper__tst-slide">
                    <img class="tst-slide__img" src="<?php bloginfo('template_url'); ?>/assets/img/tst-slide__img2.jpg" alt="">
                </div>
                <div class="swiper-slide slide-wrapper__tst-slide">
                    <img class="tst-slide__img" src="<?php bloginfo('template_url'); ?>/assets/img/tst-slide__img2.jpg" alt="">
                </div>
                <div class="swiper-slide slide-wrapper__tst-slide">
                    <img class="tst-slide__img" src="<?php bloginfo('template_url'); ?>/assets/img/tst-slide__img2.jpg" alt="">
                </div>
                <div class="swiper-slide slide-wrapper__tst-slide">
                    <img class="tst-slide__img" src="<?php bloginfo('template_url'); ?>/assets/img/tst-slide__img2.jpg" alt="">
                </div>
                <div class="swiper-slide slide-wrapper__tst-slide">
                    <img class="tst-slide__img" src="<?php bloginfo('template_url'); ?>/assets/img/tst-slide__img2.jpg" alt="">
                </div>
                <div class="swiper-slide slide-wrapper__tst-slide">
                    <img class="tst-slide__img" src="<?php bloginfo('template_url'); ?>/assets/img/tst-slide__img2.jpg" alt="">
                </div>
                <div class="swiper-slide slide-wrapper__tst-slide">
                    <img class="tst-slide__img" src="<?php bloginfo('template_url'); ?>/assets/img/tst-slide__img2.jpg" alt="">
                </div>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
    <div data-modal="vid" style="display: none;" class="testimonails__slider-tst slider-tst-vid">
        <div class="swiper slider-tst__slider js-slider-testimonials-vid">
            <div class="swiper-wrapper slider-tst__slide-wrapper slide-wrapper-vid">
                <div class="swiper-slide slide-wrapper__tst-slide slider-tst-vid__single-vid">
                    <div class="single-vid__player" style="background-image: url('<?php bloginfo('template_url'); ?>/assets/img/single-vid__player.jpg')">
                        <div class="player__play-btn"></div>
                    </div>
                </div>
                <div class="swiper-slide slide-wrapper__tst-slide slider-tst-vid__single-vid">
                    <div class="single-vid__player" style="background-image: url('<?php bloginfo('template_url'); ?>/assets/img/single-vid__player.jpg')">
                        <div class="player__play-btn"></div>
                    </div>
                </div>
                <div class="swiper-slide slide-wrapper__tst-slide slider-tst-vid__single-vid">
                    <div class="single-vid__player" style="background-image: url('<?php bloginfo('template_url'); ?>/assets/img/single-vid__player.jpg')">
                        <div class="player__play-btn"></div>
                    </div>
                </div>
                <div class="swiper-slide slide-wrapper__tst-slide slider-tst-vid__single-vid">
                    <div class="single-vid__player" style="background-image: url('<?php bloginfo('template_url'); ?>/assets/img/single-vid__player.jpg')">
                        <div class="player__play-btn"></div>
                    </div>
                </div>
                <div class="swiper-slide slide-wrapper__tst-slide slider-tst-vid__single-vid">
                    <div class="single-vid__player" style="background-image: url('<?php bloginfo('template_url'); ?>/assets/img/single-vid__player.jpg')">
                        <div class="player__play-btn"></div>
                    </div>
                </div>
                <div class="swiper-slide slide-wrapper__tst-slide slider-tst-vid__single-vid">
                    <div class="single-vid__player" style="background-image: url('<?php bloginfo('template_url'); ?>/assets/img/single-vid__player.jpg')">
                        <div class="player__play-btn"></div>
                    </div>
                </div>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
    <a href="#" class="testimonials__btn-primary button-animate">
        Напишите нам
    </a>
</section> -->


<section class="about">
    <div class="about__text-content">
        <strong data-action="title-replace">
            <?php global $replace_title;
            if ($replace_title) {
                echo $replace_title;
            } else {
                ?>
                Кредит под залог квартиры
                <?php
            }
            ?>
        </strong>
        - это удобный и надежный способ получить необходимую сумму денег при наличии недвижимости, которая будет выступать в роли залога. Наша компания предлагает выгодные условия кредитования и индивидуальный подход к каждому клиенту. Оформление кредита под залог квартиры позволяет получить средства налюбые нужды, будь то покупка новой недвижимости, образование или реализация бизнес-проекта.
    </div>
    <ul class="about__benefits-checklist">
        <li class="benefits-checklist__check-list-item">
            <strong>Быстрое оформление:</strong> процесс рассмотрения заявки и выдачи  кредита занимает <strong>всего 1 день</strong>
        </li>
        <li class="benefits-checklist__check-list-item">
            <strong>Выгодная процентная ставка:</strong> низкая ставка <strong>от 5% годовых</strong> делает наши условия одними из самых привлекательных на рынке
        </li>
        <li class="benefits-checklist__check-list-item">
            <strong>Возможность получить кредит с любой кредитной историей:</strong> наши специалисты готовы помочь вам даже при наличии <strong>проблем с кредитной историей</strong>
        </li>
        <li class="benefits-checklist__check-list-item">
            <strong>Минимум документов:</strong> для оформления кредита под залог квартиры потребуется только <strong>паспорт</strong> и <strong>документы на залоговую недвижимость</strong>
        </li>
        <li class="benefits-checklist__check-list-item">
            <strong>Гибкий срок кредита:</strong> выберите оптимальный для вас срок кредитования, который может составлять <strong>от 1 до 20 лет</strong>
        </li>
        <li class="benefits-checklist__check-list-item">
            <strong>Прозрачные условия:</strong> без скрытых комиссий и платежей, с четким <strong>графиком выплат</strong>
        </li>
    </ul>
    <div class="about__text-banner">
        Обратившись к нам, вы сможете
        рассчитывать на профессиональную помощь и индивидуальный подход на всех этапах оформления кредита. Не откладывайте свои планы, воспользуйтесь услугами нашей компании уже сейчас
    </div>
</section>
<section class="trust-ig">
    <h2 class="nzlg-title trust-ig__trst-title">
        Почему <strong>нам доверяют</strong>
    </h2>
    <div class="trust-ig__ig-wrapper">
        <div class="flex-row ig-wrapper__ig-item-trust">
            <div class="ig-item-trust__ig-icon">
                1
                <svg width="53" height="53" viewBox="0 0 53 53" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="26.5" cy="26.5" r="26.5" fill="#E5D2A5"/>
                    <g clip-path="url(#clip0_974_365)">
                        <path d="M42.1246 25.3112H40.0246V19.9102C40.0246 19.8854 40.0221 19.8612 40.0208 19.8368V15.6777C40.0208 15.3949 39.7916 15.1656 39.5088 15.1656H34.0794L29.3856 10.4717C29.2895 10.3757 29.1593 10.3218 29.0235 10.3218C28.8877 10.3218 28.7574 10.3757 28.6614 10.4717L25.122 14.0111L23.4582 12.3472C23.2582 12.1472 22.934 12.1472 22.734 12.3472L19.9122 15.1689C19.8936 15.1668 19.8746 15.1656 19.8554 15.1656H14.0399C13.7571 15.1656 13.5278 15.3949 13.5278 15.6777V21.1275C13.5278 21.1442 13.5288 21.1607 13.5303 21.1769V38.1248C13.5303 38.8911 14.1538 39.5147 14.9202 39.5147H38.6347C39.4011 39.5147 40.0246 38.8911 40.0246 38.1248V32.7239H42.1246C42.4074 32.7239 42.6366 32.4946 42.6366 32.2118V25.8232C42.6366 25.5404 42.4074 25.3112 42.1246 25.3112ZM38.9967 16.1898V18.5698C38.8811 18.5385 38.76 18.5203 38.6347 18.5203H37.434L35.1035 16.1898H38.9967ZM29.0235 11.558L35.9857 18.5203H34.4315L28.2464 12.3351L29.0235 11.558ZM27.5222 13.0593L32.9831 18.5203H29.6314L25.8463 14.7352L27.5222 13.0593ZM23.0961 13.4334L24.3979 14.7352L25.122 15.4594L28.183 18.5203H26.7872L22.3982 14.1313L23.0961 13.4334ZM25.3388 18.5203H18.0092L21.674 14.8555L25.3388 18.5203ZM16.5608 18.5203H14.9202C14.7925 18.5203 14.6695 18.539 14.552 18.5714V16.1898H18.8914L16.5608 18.5203ZM39.0004 38.1248C39.0004 38.3265 38.8363 38.4905 38.6347 38.4905H14.9202C14.7185 38.4905 14.5545 38.3265 14.5545 38.1248V19.9102C14.5545 19.7085 14.7185 19.5444 14.9202 19.5444H38.6347C38.8238 19.5444 38.978 19.6892 38.9967 19.8734V21.1275C38.9967 21.1476 38.9982 21.1673 39.0004 21.1868V25.3112H34.3462C32.3025 25.3112 30.6398 26.9738 30.6398 29.0175C30.6398 31.0612 32.3025 32.7239 34.3462 32.7239H39.0004L39.0004 38.1248ZM41.6125 31.6998H40.0246H39.0004H34.3462C32.8673 31.6998 31.664 30.4965 31.664 29.0175C31.664 27.5385 32.8673 26.3353 34.3462 26.3353H39.0004H40.0246H41.6125V31.6998Z" fill="#524933"/>
                        <path d="M34.3704 27.2617C33.4023 27.2617 32.6147 28.0493 32.6147 29.0174C32.6147 29.9854 33.4023 30.773 34.3704 30.773C35.3384 30.773 36.126 29.9854 36.126 29.0174C36.126 28.0493 35.3384 27.2617 34.3704 27.2617ZM34.3704 29.7489C33.967 29.7489 33.6389 29.4207 33.6389 29.0174C33.6389 28.614 33.9671 28.2858 34.3704 28.2858C34.7737 28.2858 35.1019 28.614 35.1019 29.0174C35.1019 29.4207 34.7737 29.7489 34.3704 29.7489Z" fill="#524933"/>
                    </g>
                    <defs>
                        <clipPath id="clip0_974_365">
                            <rect width="29.2687" height="29.2687" fill="white" transform="translate(13.4478 10.2837)"/>
                        </clipPath>
                    </defs>
                </svg>
            </div>
            <div class="ig-item-trust__ig-text">
                <div class="ig-text__header">
                    Кредит за 1 час
                </div>
                <div class="ig-text__contents">
                    Безопасная сделка
                </div>
            </div>
        </div>
        <div class="flex-row ig-wrapper__ig-item-trust">
            <div class="ig-item-trust__ig-icon">
                2
                <svg width="53" height="53" viewBox="0 0 53 53" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="26.5" cy="26.5" r="26.5" fill="#E5D2A5"/>
                    <g clip-path="url(#clip0_974_371)">
                        <path d="M27.0002 42.1668C35.3765 42.1668 42.1668 35.3765 42.1668 27.0002C42.1668 18.6238 35.3765 11.8335 27.0002 11.8335C18.6238 11.8335 11.8335 18.6238 11.8335 27.0002C11.8335 35.3765 18.6238 42.1668 27.0002 42.1668Z" stroke="#524933" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M27 16.1665V26.9998L33.5 33.4998" stroke="#524933" stroke-linecap="round" stroke-linejoin="round"/>
                    </g>
                    <defs>
                        <clipPath id="clip0_974_371">
                            <rect width="52" height="52" fill="white" transform="translate(1 1)"/>
                        </clipPath>
                    </defs>
                </svg>
            </div>
            <div class="ig-item-trust__ig-text">
                <div class="ig-text__header">
                    До 25 лет
                </div>
                <div class="ig-text__contents">
                    Комфортный срок
                    кредитования
                </div>
            </div>
        </div>
        <div class="flex-row ig-wrapper__ig-item-trust">
            <div class="ig-item-trust__ig-icon">
                3
                <svg width="53" height="53" viewBox="0 0 53 53" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="26.5" cy="26.5" r="26.5" fill="#E5D2A5"/>
                    <g clip-path="url(#clip0_974_400)">
                        <path d="M20.875 25.25C20.0097 25.25 19.1638 24.9934 18.4444 24.5127C17.7249 24.0319 17.1642 23.3487 16.833 22.5492C16.5019 21.7498 16.4153 20.8701 16.5841 20.0215C16.7529 19.1728 17.1696 18.3933 17.7814 17.7814C18.3933 17.1696 19.1728 16.7529 20.0215 16.5841C20.8701 16.4153 21.7498 16.5019 22.5492 16.833C23.3487 17.1642 24.0319 17.7249 24.5127 18.4444C24.9934 19.1638 25.25 20.0097 25.25 20.875C25.2487 22.0349 24.7874 23.147 23.9672 23.9672C23.147 24.7874 22.0349 25.2487 20.875 25.25ZM20.875 18.25C20.3558 18.25 19.8483 18.404 19.4166 18.6924C18.985 18.9808 18.6485 19.3908 18.4498 19.8705C18.2511 20.3501 18.1992 20.8779 18.3004 21.3871C18.4017 21.8963 18.6517 22.364 19.0188 22.7312C19.386 23.0983 19.8537 23.3483 20.3629 23.4496C20.8721 23.5508 21.3999 23.4989 21.8795 23.3002C22.3592 23.1015 22.7692 22.7651 23.0576 22.3334C23.346 21.9017 23.5 21.3942 23.5 20.875C23.4992 20.179 23.2224 19.5118 22.7303 19.0197C22.2382 18.5276 21.571 18.2508 20.875 18.25Z" fill="#524933"/>
                        <path d="M36.2627 16.5L16.5 36.2627L17.7373 37.5L37.5 17.7373L36.2627 16.5Z" fill="#524933"/>
                        <path d="M33.125 37.5C32.2597 37.5 31.4138 37.2434 30.6944 36.7627C29.9749 36.282 29.4142 35.5987 29.083 34.7992C28.7519 33.9998 28.6653 33.1201 28.8341 32.2715C29.0029 31.4228 29.4196 30.6433 30.0314 30.0314C30.6433 29.4196 31.4228 29.0029 32.2715 28.8341C33.1201 28.6653 33.9998 28.7519 34.7992 29.083C35.5987 29.4142 36.282 29.9749 36.7627 30.6944C37.2434 31.4138 37.5 32.2597 37.5 33.125C37.4987 34.2849 37.0374 35.397 36.2172 36.2172C35.397 37.0374 34.2849 37.4987 33.125 37.5ZM33.125 30.5C32.6058 30.5 32.0983 30.654 31.6666 30.9424C31.235 31.2308 30.8985 31.6408 30.6998 32.1205C30.5011 32.6001 30.4492 33.1279 30.5504 33.6371C30.6517 34.1463 30.9017 34.614 31.2688 34.9812C31.636 35.3483 32.1037 35.5983 32.6129 35.6996C33.1221 35.8009 33.6499 35.7489 34.1295 35.5502C34.6092 35.3515 35.0192 35.0151 35.3076 34.5834C35.5961 34.1517 35.75 33.6442 35.75 33.125C35.7492 32.429 35.4724 31.7618 34.9803 31.2697C34.4882 30.7776 33.821 30.5008 33.125 30.5Z" fill="#524933"/>
                    </g>
                    <defs>
                        <clipPath id="clip0_974_400">
                            <rect width="28" height="28" fill="white" transform="translate(13 13)"/>
                        </clipPath>
                    </defs>
                </svg>
            </div>
            <div class="ig-item-trust__ig-text">
                <div class="ig-text__header">
                    От 9,49% годовых
                </div>
                <div class="ig-text__contents">
                    Низкая процентная ставка
                </div>
            </div>
        </div>
        <div class="flex-row ig-wrapper__ig-item-trust">
            <div class="ig-item-trust__ig-icon">
                4
                <svg width="53" height="53" viewBox="0 0 53 53" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="26.5" cy="26.5" r="26.5" fill="#E5D2A5"/>
                    <g clip-path="url(#clip0_974_418)">
                        <path d="M28.9949 41.7908C29.0793 41.8254 29.1777 41.8489 29.2762 41.8489C30.4031 41.8489 31.5309 41.8489 32.6577 41.8489C32.744 41.8489 33.0084 41.8545 33.0243 41.7204C33.5456 37.5429 39.0121 36.4076 40.9227 33.0008C41.9906 31.0967 42.2174 28.6545 41.8087 26.5254C41.7665 26.3079 41.1946 26.2798 41.0456 26.3286C39.2015 26.9333 39.4743 28.3545 39.1181 30.042C38.8153 31.4745 38.0549 32.6089 36.9581 33.3636C38.1084 32.1683 39.3346 30.4845 38.2368 29.697C37.5215 29.1833 36.5343 29.5367 35.9587 29.9539C35.0887 30.5858 34.3565 31.5364 33.5137 32.2273C31.9818 33.4826 29.9924 34.4567 28.934 36.1845C27.9487 37.7933 27.8934 39.942 28.7249 41.6342C28.7615 41.7083 28.8684 41.7589 28.9949 41.7908ZM34.6359 32.2611C35.0652 31.9039 36.4874 30.0392 37.0471 29.9333C38.7749 29.6061 35.5349 33.7236 34.8271 34.2936C34.5956 34.4801 35.4815 34.6104 35.5752 34.5889C36.7499 34.3254 37.9396 33.7283 38.7702 32.8517C40.0968 31.4511 39.6974 28.3339 40.9809 27.0992C41.1243 28.2617 41.0699 29.4814 40.8262 30.6073C40.2187 33.4161 38.1899 35.0192 36.0018 36.6561C34.2027 38.0014 33.1293 39.0486 32.1684 41.0183C31.9359 41.4954 32.6793 41.1795 32.009 41.4542C31.7606 41.5554 31.2862 41.4542 31.004 41.4542C30.5174 41.4542 30.0318 41.4542 29.5452 41.4542C27.5849 37.1051 31.7409 34.6695 34.6359 32.2611Z" fill="#524933"/>
                        <path d="M20.9756 41.726C20.9925 41.8591 21.2616 41.8498 21.3441 41.8498C22.4709 41.8498 23.5988 41.8498 24.7256 41.8498C24.8316 41.8498 24.9366 41.8226 25.0256 41.7832C25.1419 41.7494 25.2394 41.6998 25.2741 41.6294C26.0634 40.0207 26.0531 37.9938 25.1963 36.4254C24.2194 34.6366 22.2694 33.6598 20.7263 32.4213C19.7963 31.6751 18.9919 30.6391 18.0384 29.9501C17.4666 29.5376 16.5263 29.1991 15.8053 29.6801C14.6484 30.4516 15.8803 32.1551 17.0372 33.3616C15.9413 32.607 15.1838 31.4745 14.8809 30.0373C14.5266 28.3582 14.7994 26.9323 12.9516 26.3257C12.8016 26.276 12.2325 26.3163 12.1913 26.532C11.7825 28.661 12.0094 31.1023 13.0781 33.0073C14.9869 36.4085 20.4553 37.5551 20.9756 41.726ZM13.0172 27.0945C14.3231 28.3263 13.8928 31.451 15.2306 32.8573C16.0622 33.7329 17.2519 34.3291 18.4266 34.5926C18.5278 34.6151 19.4006 34.4726 19.1709 34.2879C18.4763 33.7282 15.1153 29.8001 16.9809 29.9529C17.3644 29.9848 18.9619 31.9301 19.365 32.2657C21.3253 33.8998 24.1059 35.1504 24.7753 37.8382C25.0669 39.0091 24.9356 40.3357 24.45 41.4523C24.0413 41.4523 23.6325 41.4523 23.2228 41.4523C22.9153 41.4523 22.4447 41.5526 22.1494 41.4523C22.0509 41.4185 21.9881 41.4035 21.9263 41.3895C21.9431 41.3248 21.9291 41.216 21.8306 41.0116C20.8809 39.0495 19.7841 37.9863 17.9963 36.6495C15.8025 35.0098 13.7822 33.417 13.1719 30.5998C12.9281 29.4757 12.8738 28.257 13.0172 27.0945Z" fill="#524933"/>
                        <path d="M21.6733 26.4591H23.313L32.3599 12.3525H30.7202L21.6733 26.4591Z" fill="#524933"/>
                        <path d="M22.0519 21.0074C23.1525 21.0074 23.9869 20.6324 24.5559 19.8833C25.125 19.1342 25.409 18.0261 25.409 16.5589C25.409 15.1499 25.1194 14.0633 24.539 13.2974C23.9587 12.5324 23.13 12.1489 22.0519 12.1489C20.9662 12.1489 20.1459 12.5192 19.5919 13.2589C19.0378 13.9986 18.7612 15.0983 18.7612 16.5589C18.7612 17.9933 19.049 19.093 19.6256 19.8589C20.2022 20.6239 21.0112 21.0074 22.0519 21.0074ZM20.714 14.1083C20.9887 13.5683 21.435 13.2974 22.0528 13.2974C23.2725 13.2974 23.8819 14.3849 23.8819 16.5589C23.8819 18.7461 23.2725 19.8392 22.0528 19.8392C21.4359 19.8392 20.9897 19.5655 20.714 19.0189C20.4384 18.4724 20.3015 17.6521 20.3015 16.5589C20.3006 15.4658 20.4384 14.6483 20.714 14.1083Z" fill="#524933"/>
                        <path d="M31.8805 17.8037C30.7949 17.8037 29.9727 18.174 29.4196 18.9137C28.8655 19.6534 28.5908 20.7531 28.5908 22.2137C28.5908 23.6415 28.873 24.7384 29.4421 25.5043C30.0111 26.2703 30.8249 26.6528 31.8814 26.6528C32.9821 26.6528 33.8146 26.2778 34.3836 25.5287C34.9527 24.7796 35.2386 23.6743 35.2386 22.2146C35.2386 20.7868 34.9414 19.6946 34.3499 18.939C33.7583 18.1834 32.9361 17.8037 31.8805 17.8037ZM33.2633 24.6878C32.9661 25.225 32.5049 25.4931 31.8805 25.4931C31.2561 25.4931 30.8061 25.2212 30.5305 24.6775C30.2549 24.1337 30.118 23.3125 30.118 22.2118C30.118 21.1112 30.2558 20.2965 30.5305 19.7659C30.8052 19.2353 31.2552 18.97 31.8805 18.97C32.5049 18.97 32.9661 19.2353 33.2633 19.7659C33.5605 20.2965 33.7096 21.1121 33.7096 22.2118C33.7096 23.3256 33.5605 24.1506 33.2633 24.6878Z" fill="#524933"/>
                    </g>
                    <defs>
                        <clipPath id="clip0_974_418">
                            <rect width="30" height="30" fill="white" transform="translate(12 12)"/>
                        </clipPath>
                    </defs>
                </svg>
            </div>
            <div class="ig-item-trust__ig-text">
                <div class="ig-text__header">
                    До 98% одобрений
                </div>
                <div class="ig-text__contents">
                    Авансирование
                    в день сделки
                </div>
            </div>
        </div>
    </div>
</section>
<section class="safety-ig">
    <h2 class="nzlg-title safety-ig__sft-title">
        Мы подумали <strong>о вашей безопасности</strong>
    </h2>
    <div class="safety-ig__ig-wrapper">
        <div class="flex-row ig-wrapper__ig-item-safety">
            <div class="ig-item-safety__safety-text">
                Тщательный <strong>анализ</strong>
                залоговой <strong>собственности</strong>
            </div>
            <div class="ig-item-safety__safety-icon">
                <svg class="safety-icon__doc" xmlns="http://www.w3.org/2000/svg" width="85" height="85" viewBox="0 0 85 85" fill="none">
                    <path d="M40.5458 10.776C40.6768 10.7759 40.8064 10.7482 40.926 10.6946L49.7431 6.71027L51.1144 9.74835C51.2154 9.97247 51.4013 10.1473 51.6313 10.2343C51.8612 10.3213 52.1163 10.3134 52.3404 10.2124C52.5645 10.1113 52.7393 9.92538 52.8263 9.69546C52.9133 9.46553 52.9054 9.21046 52.8044 8.98634L51.0513 5.10656C50.9493 4.88316 50.7627 4.70941 50.5327 4.62349C50.3026 4.53757 50.0479 4.54651 49.8244 4.64835L40.164 9.00461C39.9704 9.09154 39.8126 9.24228 39.7169 9.43162C39.6211 9.62096 39.5933 9.83743 39.638 10.0448C39.6827 10.2522 39.7972 10.438 39.9625 10.5711C40.1277 10.7042 40.3336 10.7765 40.5458 10.776Z" fill="#B23633"/>
                    <path d="M71.156 68.3468C71.2289 68.5101 71.3475 68.6488 71.4974 68.7463C71.6473 68.8438 71.8222 68.8959 72.001 68.8963C72.1323 68.8965 72.262 68.8682 72.3812 68.8133L77.7086 66.4061C77.9325 66.305 78.107 66.1192 78.1939 65.8894C78.2808 65.6597 78.2728 65.4048 78.1718 65.1809L72.5937 52.8244C72.4863 52.6101 72.3002 52.4456 72.0743 52.3654C71.8484 52.2853 71.6003 52.2956 71.3818 52.3943C71.1634 52.493 70.9916 52.6724 70.9025 52.895C70.8134 53.1175 70.8138 53.3658 70.9037 53.588L76.1016 65.0979L71.6192 67.1216C71.3956 67.2231 71.2214 67.4089 71.1346 67.6386C71.0477 67.8682 71.0555 68.1229 71.156 68.3468Z" fill="#B23633"/>
                    <path d="M8.8983 25.1528L17.1792 21.4158C17.2924 21.3673 17.3949 21.2968 17.4806 21.2082C17.5662 21.1197 17.6334 21.015 17.6781 20.9002C17.7228 20.7854 17.7441 20.6628 17.7409 20.5397C17.7376 20.4165 17.7099 20.2953 17.6592 20.183C17.6085 20.0707 17.5359 19.9696 17.4457 19.8857C17.3555 19.8018 17.2495 19.7368 17.1338 19.6944C17.0182 19.6519 16.8952 19.633 16.7722 19.6387C16.6491 19.6444 16.5284 19.6745 16.4171 19.7274L7.28629 23.8479C7.06397 23.9492 6.8909 24.1346 6.80501 24.3633C6.71912 24.5921 6.72742 24.8455 6.82808 25.0681L16.6994 46.934C16.8004 47.1582 16.9864 47.3329 17.2163 47.42C17.4462 47.507 17.7013 47.4991 17.9254 47.3981C18.1495 47.297 18.3243 47.1111 18.4113 46.8811C18.4983 46.6512 18.4905 46.3961 18.3894 46.172L8.8983 25.1528Z" fill="#B23633"/>
                    <path d="M69.1355 79.5115V13.6033C69.1357 13.4815 69.1119 13.3609 69.0654 13.2483C69.019 13.1357 68.9508 13.0334 68.8647 12.9472C68.7787 12.861 68.6765 12.7926 68.564 12.746C68.4515 12.6993 68.3309 12.6753 68.2091 12.6753H21.5421C21.4203 12.6753 21.2997 12.6993 21.1872 12.746C21.0747 12.7926 20.9725 12.861 20.8865 12.9472C20.8004 13.0334 20.7322 13.1357 20.6858 13.2483C20.6393 13.3609 20.6155 13.4815 20.6157 13.6033V79.5115C20.6155 79.6333 20.6393 79.754 20.6858 79.8665C20.7322 79.9791 20.8004 80.0814 20.8865 80.1676C20.9725 80.2538 21.0747 80.3222 21.1872 80.3689C21.2997 80.4155 21.4203 80.4396 21.5421 80.4396H68.2091C68.3309 80.4396 68.4515 80.4155 68.564 80.3689C68.6765 80.3222 68.7787 80.2538 68.8647 80.1676C68.9508 80.0814 69.019 79.9791 69.0654 79.8665C69.1119 79.754 69.1357 79.6333 69.1355 79.5115ZM67.2827 78.5852H22.4685V14.528H67.2827V78.5852Z" fill="#B23633"/>
                    <path d="M44.5187 48.5945C47.9394 48.5905 51.2189 47.2302 53.638 44.8117C56.0571 42.3932 57.4183 39.1141 57.4231 35.6934C57.4231 35.4477 57.3255 35.2121 57.1518 35.0384C56.9781 34.8646 56.7425 34.767 56.4968 34.767H45.4451V23.7104C45.4451 23.5887 45.4211 23.4683 45.3746 23.3559C45.328 23.2435 45.2598 23.1414 45.1738 23.0554C45.0878 22.9693 44.9856 22.9011 44.8732 22.8545C44.7609 22.808 44.6404 22.784 44.5187 22.784C42.8117 22.7647 41.1177 23.0842 39.535 23.724C37.9523 24.3639 36.5123 25.3114 35.2983 26.5117C34.0843 27.712 33.1205 29.1412 32.4628 30.7165C31.805 32.2919 31.4663 33.9821 31.4663 35.6893C31.4663 37.3964 31.805 39.0866 32.4628 40.662C33.1205 42.2373 34.0843 43.6665 35.2983 44.8668C36.5123 46.0671 37.9523 47.0146 39.535 47.6545C41.1177 48.2943 42.8117 48.6138 44.5187 48.5945ZM43.5907 24.6766V35.6934C43.5907 35.8153 43.6147 35.936 43.6614 36.0485C43.708 36.1611 43.7763 36.2634 43.8625 36.3496C43.9487 36.4358 44.051 36.5042 44.1636 36.5508C44.2762 36.5974 44.3969 36.6214 44.5187 36.6214H55.5322C55.3554 38.7207 54.5823 40.7258 53.304 42.4003C52.0256 44.0749 50.2952 45.3492 48.3167 46.073C46.3382 46.7968 44.1941 46.9401 42.1369 46.4859C40.0797 46.0317 38.1952 44.999 36.7054 43.5094C35.2156 42.0198 34.1826 40.1354 33.7281 38.0783C33.2736 36.0212 33.4166 33.877 34.1401 31.8984C34.8637 29.9198 36.1377 28.1893 37.8121 26.9107C39.4865 25.632 41.4914 24.8586 43.5907 24.6816V24.6766Z" fill="#B23633"/>
                    <path d="M48.5826 32.5209H60.5606C60.6824 32.5211 60.8031 32.4973 60.9157 32.4509C61.0282 32.4044 61.1306 32.3362 61.2168 32.2502C61.303 32.1641 61.3713 32.0619 61.418 31.9494C61.4647 31.8369 61.4887 31.7163 61.4887 31.5945C61.4847 28.1728 60.1237 24.8924 57.7042 22.4729C55.2847 20.0534 52.0043 18.6924 48.5826 18.6885C48.3369 18.6885 48.1013 18.7861 47.9276 18.9598C47.7538 19.1335 47.6562 19.3692 47.6562 19.6148V31.5945C47.6563 31.8402 47.7538 32.0758 47.9276 32.2496C48.1013 32.4233 48.3369 32.5209 48.5826 32.5209ZM49.509 20.586C52.1093 20.8073 54.5478 21.9402 56.394 23.7846C58.2403 25.629 59.3756 28.0664 59.5994 30.6665H49.509V20.586Z" fill="#B23633"/>
                    <path d="M32.5392 58.4226H56.4969C56.7426 58.4226 56.9782 58.325 57.1519 58.1512C57.3256 57.9775 57.4232 57.7419 57.4232 57.4962C57.4232 57.2505 57.3256 57.0149 57.1519 56.8411C56.9782 56.6674 56.7426 56.5698 56.4969 56.5698H32.5392C32.2935 56.5698 32.0578 56.6674 31.8841 56.8411C31.7104 57.0149 31.6128 57.2505 31.6128 57.4962C31.6128 57.7419 31.7104 57.9775 31.8841 58.1512C32.0578 58.325 32.2935 58.4226 32.5392 58.4226Z" fill="#B23633"/>
                    <path d="M56.4966 62.4951H53.2311C52.992 62.5052 52.766 62.6073 52.6004 62.7801C52.4347 62.9529 52.3423 63.183 52.3423 63.4223C52.3423 63.6616 52.4347 63.8917 52.6004 64.0645C52.766 64.2373 52.992 64.3394 53.2311 64.3495H56.4966C56.7357 64.3394 56.9617 64.2373 57.1273 64.0645C57.2929 63.8917 57.3854 63.6616 57.3854 63.4223C57.3854 63.183 57.2929 62.9529 57.1273 62.7801C56.9617 62.6073 56.7357 62.5052 56.4966 62.4951Z" fill="#B23633"/>
                    <path d="M32.5392 64.3495H46.6306C46.8697 64.3394 47.0957 64.2373 47.2613 64.0645C47.4269 63.8917 47.5194 63.6616 47.5194 63.4223C47.5194 63.183 47.4269 62.9529 47.2613 62.7801C47.0957 62.6073 46.8697 62.5052 46.6306 62.4951H32.5392C32.3001 62.5052 32.0741 62.6073 31.9085 62.7801C31.7429 62.9529 31.6504 63.183 31.6504 63.4223C31.6504 63.6616 31.7429 63.8917 31.9085 64.0645C32.0741 64.2373 32.3001 64.3394 32.5392 64.3495Z" fill="#B23633"/>
                    <path d="M56.4967 68.4219H44.5187C44.273 68.4219 44.0373 68.5195 43.8636 68.6932C43.6899 68.8669 43.5923 69.1026 43.5923 69.3482C43.5923 69.5939 43.6899 69.8296 43.8636 70.0033C44.0373 70.177 44.273 70.2746 44.5187 70.2746H56.4967C56.7424 70.2746 56.978 70.177 57.1517 70.0033C57.3254 69.8296 57.4231 69.5939 57.4231 69.3482C57.4231 69.1026 57.3254 68.8669 57.1517 68.6932C56.978 68.5195 56.7424 68.4219 56.4967 68.4219Z" fill="#B23633"/>
                    <path d="M32.5392 70.2746H37.8301C38.0758 70.2746 38.3114 70.177 38.4851 70.0033C38.6588 69.8296 38.7564 69.5939 38.7564 69.3482C38.7564 69.1026 38.6588 68.8669 38.4851 68.6932C38.3114 68.5195 38.0758 68.4219 37.8301 68.4219H32.5392C32.2935 68.4219 32.0578 68.5195 31.8841 68.6932C31.7104 68.8669 31.6128 69.1026 31.6128 69.3482C31.6128 69.5939 31.7104 69.8296 31.8841 70.0033C32.0578 70.177 32.2935 70.2746 32.5392 70.2746Z" fill="#B23633"/>
                </svg>
            </div>
        </div>
        <div class="flex-row ig-wrapper__ig-item-safety">
            <div class="ig-item-safety__safety-text">
                <strong>Учет</strong>
                кредитных <strong>возможностей</strong>
            </div>
            <div class="ig-item-safety__safety-icon">
                <svg class="safety-icon__book" xmlns="http://www.w3.org/2000/svg" width="63" height="63" viewBox="0 0 63 63" fill="none">
                    <g clip-path="url(#clip0_974_455)">
                        <path d="M62.0426 10.1847H60.034C59.2403 8.95049 58.8184 7.51416 58.8184 6.04688C58.8184 4.57959 59.2403 3.14325 60.034 1.90909H62.0454C62.2986 1.90909 62.5414 1.80852 62.7204 1.62951C62.8994 1.4505 63 1.20771 63 0.954545C63 0.701384 62.8994 0.458592 62.7204 0.27958C62.5414 0.100568 62.2986 3.7724e-09 62.0454 0L6.04573 0C4.44299 0.00225463 2.90655 0.639908 1.77324 1.77316C0.639937 2.90642 0.00225473 4.44279 0 6.04545L0 56.9545C0.00895756 58.5556 0.649182 60.0885 1.78165 61.2204C2.91412 62.3523 4.44741 62.9918 6.04857 63H62.0426C62.1682 63.0004 62.2926 62.976 62.4087 62.9282C62.5249 62.8804 62.6305 62.8101 62.7194 62.7214C62.8083 62.6327 62.8789 62.5274 62.9271 62.4114C62.9752 62.2954 63 62.171 63 62.0455V11.1392C63 11.0136 62.9752 10.8893 62.9271 10.7733C62.8789 10.6573 62.8083 10.5519 62.7194 10.4632C62.6305 10.3746 62.5249 10.3043 62.4087 10.2565C62.2926 10.2087 62.1682 10.1843 62.0426 10.1847ZM7.29862 1.90909H57.8435C57.3682 2.91082 57.0702 3.98737 56.9628 5.09091H12.4125C12.2871 5.09091 12.163 5.1156 12.0472 5.16357C11.9314 5.21154 11.8261 5.28185 11.7375 5.37049C11.6489 5.45913 11.5785 5.56435 11.5306 5.68017C11.4826 5.79598 11.4579 5.9201 11.4579 6.04545C11.4579 6.17081 11.4826 6.29493 11.5306 6.41074C11.5785 6.52655 11.6489 6.63178 11.7375 6.72042C11.8261 6.80906 11.9314 6.87937 12.0472 6.92734C12.163 6.97531 12.2871 7 12.4125 7H56.9429C57.0612 8.10615 57.3698 9.18354 57.8549 10.1847H7.29862C8.33882 7.52419 8.33882 4.56956 7.29862 1.90909ZM5.23035 1.98864C5.84035 3.25253 6.15716 4.63781 6.15716 6.04119C6.15716 7.44458 5.84035 8.82986 5.23035 10.0938C4.30324 9.89473 3.4724 9.38388 2.8764 8.64639C2.28041 7.90891 1.9553 6.98938 1.9553 6.04119C1.9553 5.093 2.28041 4.17348 2.8764 3.436C3.4724 2.69851 4.30324 2.18765 5.23035 1.98864ZM10.1823 61.0795H6.04573C4.95244 61.0736 3.90545 60.6375 3.13131 59.8655C2.35717 59.0935 1.91812 58.0478 1.90918 56.9545V10.4318C3.74165 12.5426 7.66228 12.0597 10.1823 12.0909V61.0795ZM61.0908 61.0795H12.0943V12.0909H61.0823L61.0908 61.0795ZM23.2283 53.4517H49.954C50.882 53.451 51.7719 53.082 52.4281 52.4257C53.0844 51.7695 53.4534 50.8797 53.4541 49.9517V23.2273C53.4534 22.2992 53.0844 21.4094 52.4281 20.7532C51.7719 20.097 50.882 19.728 49.954 19.7273H23.2283C22.3003 19.728 21.4104 20.097 20.7542 20.7532C20.0979 21.4094 19.7289 22.2992 19.7282 23.2273V49.9517C19.7289 50.8797 20.0979 51.7695 20.7542 52.4257C21.4104 53.082 22.3003 53.451 23.2283 53.4517ZM37.5443 21.6335H49.954C50.3757 21.6343 50.7799 21.8021 51.0781 22.1003C51.3763 22.3985 51.5442 22.8027 51.5449 23.2244V35.6335H37.5443V21.6335ZM37.5443 37.5426H51.5449V49.9489C51.5449 50.3708 51.3773 50.7755 51.0789 51.0738C50.7806 51.3722 50.3759 51.5398 49.954 51.5398H37.5443V37.5426ZM21.6345 23.2244C21.6353 22.8027 21.8031 22.3985 22.1013 22.1003C22.3995 21.8021 22.8038 21.6343 23.2255 21.6335H35.6351V35.6335H21.6373L21.6345 23.2244ZM21.6345 37.5426H35.6351V51.5398H23.2283C22.8064 51.5398 22.4017 51.3722 22.1033 51.0738C21.805 50.7755 21.6373 50.3708 21.6373 49.9489L21.6345 37.5426ZM32.3054 29.5881H29.5894C29.4587 31.0085 30.0979 33.2443 28.6348 33.2585C27.1717 33.2727 27.8109 30.9858 27.6802 29.5881C26.2597 29.4574 24.0238 30.0966 24.0096 28.6335C23.9954 27.1705 26.2824 27.8097 27.6802 27.679C27.8081 26.2585 27.1717 24.0256 28.6348 24.0085C30.0979 23.9915 29.4587 26.2812 29.5894 27.679H32.3054C32.559 27.6786 32.8023 27.779 32.9818 27.958C33.1614 28.137 33.2625 28.38 33.2629 28.6335C33.2632 28.8871 33.1629 29.1304 32.9839 29.3099C32.8048 29.4895 32.5618 29.5905 32.3083 29.5909L32.3054 29.5881ZM47.9084 29.5881H41.195C40.9419 29.5881 40.6991 29.4875 40.52 29.3085C40.341 29.1295 40.2405 28.8867 40.2405 28.6335C40.2405 28.3804 40.341 28.1376 40.52 27.9586C40.6991 27.7795 40.9419 27.679 41.195 27.679H47.9255C48.179 27.6809 48.4214 27.7834 48.5994 27.964C48.7773 28.1446 48.8762 28.3885 48.8744 28.642C48.8725 28.8956 48.77 29.138 48.5893 29.3159C48.4087 29.4939 48.1648 29.5928 47.9113 29.5909L47.9084 29.5881ZM48.2777 42.1562L45.8913 44.5426L48.2777 46.9261C48.4487 47.1067 48.5425 47.3468 48.5391 47.5955C48.5358 47.8441 48.4355 48.0816 48.2596 48.2575C48.0838 48.4333 47.8463 48.5336 47.5976 48.5369C47.349 48.5403 47.1088 48.4466 46.9283 48.2756L44.5418 45.892L42.1581 48.2756C42.0704 48.3682 41.9651 48.4423 41.8483 48.4935C41.7315 48.5447 41.6056 48.5719 41.478 48.5737C41.3505 48.5754 41.2239 48.5516 41.1057 48.5036C40.9876 48.4556 40.8802 48.3844 40.7901 48.2942C40.6999 48.204 40.6287 48.0966 40.5807 47.9785C40.5327 47.8603 40.5088 47.7338 40.5105 47.6062C40.5123 47.4787 40.5396 47.3528 40.5908 47.236C40.642 47.1192 40.7161 47.0138 40.8087 46.9261L43.1923 44.5426L40.8087 42.1562C40.7161 42.0686 40.642 41.9632 40.5908 41.8464C40.5396 41.7296 40.5123 41.6037 40.5105 41.4762C40.5088 41.3486 40.5327 41.222 40.5807 41.1039C40.6287 40.9857 40.6999 40.8784 40.7901 40.7882C40.8802 40.698 40.9876 40.6268 41.1057 40.5788C41.2239 40.5308 41.3505 40.507 41.478 40.5087C41.6056 40.5105 41.7315 40.5377 41.8483 40.5889C41.9651 40.6401 42.0704 40.7142 42.1581 40.8068L44.5418 43.1903L46.9283 40.8068C47.016 40.7142 47.1213 40.6401 47.2381 40.5889C47.355 40.5377 47.4808 40.5105 47.6084 40.5087C47.7359 40.507 47.8625 40.5308 47.9807 40.5788C48.0988 40.6268 48.2062 40.698 48.2964 40.7882C48.3865 40.8784 48.4577 40.9857 48.5057 41.1039C48.5537 41.222 48.5776 41.3486 48.5759 41.4762C48.5741 41.6037 48.5469 41.7296 48.4956 41.8464C48.4444 41.9632 48.3704 42.0686 48.2777 42.1562ZM25.2653 43.5767H31.9986C32.2431 43.59 32.4733 43.6966 32.6417 43.8744C32.8101 44.0522 32.9039 44.2878 32.9039 44.5327C32.9039 44.7776 32.8101 45.0131 32.6417 45.191C32.4733 45.3688 32.2431 45.4753 31.9986 45.4886H25.2852C25.0532 45.4602 24.8396 45.3479 24.6847 45.1728C24.5297 44.9978 24.4442 44.7721 24.4442 44.5383C24.4442 44.3046 24.5297 44.0789 24.6847 43.9039C24.8396 43.7288 25.0532 43.6165 25.2852 43.5881L25.2653 43.5767ZM28.632 40.2642C28.8851 40.2642 29.128 40.3648 29.307 40.5438C29.486 40.7228 29.5866 40.9656 29.5866 41.2188C29.5866 41.4719 29.486 41.7147 29.307 41.8937C29.128 42.0727 28.8851 42.1733 28.632 42.1733C28.3983 42.147 28.1825 42.0353 28.0261 41.8598C27.8696 41.6842 27.7835 41.457 27.7842 41.2219C27.7849 40.9867 27.8724 40.7601 28.0299 40.5855C28.1874 40.4108 28.4038 40.3005 28.6377 40.2756L28.632 40.2642ZM28.632 48.7869C28.3788 48.7869 28.136 48.6864 27.957 48.5074C27.778 48.3283 27.6774 48.0855 27.6774 47.8324C27.6774 47.5792 27.778 47.3364 27.957 47.1574C28.136 46.9784 28.3788 46.8778 28.632 46.8778C28.8885 46.8771 29.1349 46.9783 29.3168 47.1592C29.4988 47.34 29.6014 47.5858 29.6022 47.8423C29.6029 48.0989 29.5017 48.3452 29.3209 48.5272C29.14 48.7091 28.8942 48.8117 28.6377 48.8125L28.632 48.7869Z" fill="#B23633"/>
                    </g>
                    <defs>
                        <clipPath id="clip0_974_455">
                            <rect width="63" height="63" rx="3" fill="white"/>
                        </clipPath>
                    </defs>
                </svg>
            </div>
        </div>
        <div class="flex-row ig-wrapper__ig-item-safety">
            <div class="ig-item-safety__safety-text">
                Прозрачные <strong>условия</strong> кредитования
            </div>
            <div class="ig-item-safety__safety-icon">
                <svg class="safety-icon__checks" xmlns="http://www.w3.org/2000/svg" width="69" height="69" viewBox="0 0 69 69" fill="none">
                    <path d="M47.6492 69H16.1587V37.5008H47.6492V69ZM18.6737 66.4894H45.1421V40.0166H18.6737V66.4894ZM45.1421 19.4891V28.979H18.6737V2.5115H40.2448L43.2639 0H16.1587V31.4975H47.6492V16.9871L45.1421 19.4891ZM27.3863 7.75573L21.1531 14.0158L32.9342 25.7926L52.8414 5.88967L48.2869 1.25619L33.0669 13.9005L27.3863 7.75573Z" fill="#B23633"/>
                </svg>
            </div>
        </div>
    </div>
</section>
<section class="docs-checklist">
    <h2 class="nzlg-title docs-checklist__dcs-title">
        Минимальный перечень <strong>документов</strong>
    </h2>
    <ul class="docs-checklist__checklist-wrapper">
        <li class="checklist-wrapper__docs-li">
            <strong>Паспорт</strong>
            гражданина РФ
        </li>
        <li class="checklist-wrapper__docs-li">
            <strong>Документы*</strong>
            на
            залоговую
            недвижимость
        </li>
        <li class="checklist-wrapper__docs-li">
            <strong>Справка</strong>
            о доходах
            (при необходимости)
        </li>
        <li class="checklist-wrapper__docs-li">
            <strong>Выписка*</strong>
            из банка о состоянии счета
        </li>
    </ul>
    <div class="docs-checklist__checklist-disclaimer">
        *Для каждого клиента требуется свой уникальный набор документов, узнайте какой потребуется вам
    </div>
    <a href="#" class="docs-checklist__btn-primary button-animate btn-5">
        Задать вопрос
    </a>
</section>


<?php while ( have_rows( 'page_content', get_option('page_on_front') ) ) : the_row(); ?>
    <?php if ( get_row_layout() == 'our_credit_programs' ) : ?>


    <section class="tariffs">


		<h2 <?php live_edit('page_content, flex-our_credit_programs--header', get_option('page_on_front')) ?> class="nzlg-title tariffs__trf-title">
            <?php echo strip_tags( get_sub_field( 'header', get_option('page_on_front') ), ['strong'] ); ?>
        </h2>

    




        <!-- <div <?php live_edit('page_content, flex-our_credit_programs--programm_car', get_option('page_on_front')	) ?> class="tariffs__tariff-wrap">


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
            <a href="#" class="tariff-item__btn-primary button-animate btn-5">
                <?php if (get_sub_field('button_text')) : ?>
					<?php the_sub_field("button_text") ?>
				<?php endif; ?>
            </a>
        </div>

                <?php endwhile; ?>
        <?php endif; ?>

        

        </div> -->

        <div class="tariffs__tariff-wrap">
        <div class="tariff-wrap__tariff-item">
            <div class="tariff-item__icon-shield"></div>
            <h3 class="tariff-item__tariff-header">
                <strong>6% доступное</strong> решение
            </h3>
            <div class="tariff-item__tariff-desc">
                Выгодная кредитная программа с низкой процентной ставкой для реализации вашей мечты
            </div>
            <div class="tariff-item__list-title">
                Основные условия:
            </div>
            <ul class="tariff-item__desc-list">
                <li class="desc-list__desc-item">
                    Процентная ставка: 6% годовых
                </li>
                <li class="desc-list__desc-item">
                    Срок кредита: до 20 лет
                </li>
                <li class="desc-list__desc-item">
                    Необходимые документы: паспорт, справка о доходах, документы на квартиру
                </li>
                <li class="desc-list__desc-item">
                    Дополнительные требования: кредитная история без просрочек
                </li>
            </ul>
            <a href="#" class="tariff-item__btn-primary button-animate">
                Оформить
            </a>
        </div>
        <div class="tariff-wrap__tariff-item item-accent">
            <div class="tariff-item__icon-shield"></div>
            <h3 class="tariff-item__tariff-header">
                9.8% больше <strong>возможностей</strong>
            </h3>
            <div class="tariff-item__tariff-desc">
                Кредитная программа с увеличенным сроком и суммой кредита для тех, кто хочет реализовать крупные планы и мечты
            </div>
            <div class="tariff-item__list-title">
                Основные условия:
            </div>
            <ul class="tariff-item__desc-list">
                <li class="desc-list__desc-item">
                    Процентная ставка: 9,8% годовых
                </li>
                <li class="desc-list__desc-item">
                    Срок кредита: до 25 лет
                </li>
                <li class="desc-list__desc-item">
                    Необходимые документы: паспорт, справка о доходах, документы на квартиру, подтверждение целевого использования средств
                </li>
                <li class="desc-list__desc-item">
                    Дополнительные требования: кредитная история без просрочек, возраст заемщика до 65 лет намомент погашения кредита
                </li>
            </ul>
            <a href="#" class="tariff-item__btn-primary button-animate">
                Оформить
            </a>
        </div>
        <div class="tariff-wrap__tariff-item">
            <div class="tariff-item__icon-shield"></div>
            <h3 class="tariff-item__tariff-header">
                <strong>6% доступное</strong> решение
            </h3>
            <div class="tariff-item__tariff-desc">
                Выгодная кредитная программа с низкой процентной ставкой для реализации вашей мечты
            </div>
            <div class="tariff-item__list-title">
                Основные условия:
            </div>
            <ul class="tariff-item__desc-list">
                <li class="desc-list__desc-item">
                    Процентная ставка: 6% годовых
                </li>
                <li class="desc-list__desc-item">
                    Срок кредита: до 20 лет
                </li>
                <li class="desc-list__desc-item">
                    Необходимые документы: паспорт, справка о доходах, документы на квартиру
                </li>
                <li class="desc-list__desc-item">
                    Дополнительные требования: кредитная история без просрочек
                </li>
            </ul>
            <a href="#" class="tariff-item__btn-primary button-animate">
                Оформить
            </a>
        </div>
    </div>


        

        
              

        <a href="#" <?php live_edit('page_content, flex-our_credit_programs--all_programm', get_option('page_on_front')) ?>  class="tariffs__btn-secondary1  btn-5">

            <?php echo strip_tags( get_sub_field( 'all_programm', get_option('page_on_front') ), ['strong'] ); ?>

        </a>

    </section>



	<?php endif; ?>
<?php endwhile; ?>


	






<!-- <section class="tariffs">
    <h2 class="nzlg-title tariffs__trf-title">
        Расшифровка <strong>кредитных программ</strong>
    </h2>
    <div class="tariffs__tariff-wrap">
        <div class="tariff-wrap__tariff-item">
            <div class="tariff-item__icon-shield"></div>
            <h3 class="tariff-item__tariff-header">
                <strong>6% доступное</strong> решение
            </h3>
            <div class="tariff-item__tariff-desc">
                Выгодная кредитная программа с низкой процентной ставкой для реализации вашей мечты
            </div>
            <div class="tariff-item__list-title">
                Основные условия:
            </div>
            <ul class="tariff-item__desc-list">
                <li class="desc-list__desc-item">
                    Процентная ставка: 6% годовых
                </li>
                <li class="desc-list__desc-item">
                    Срок кредита: до 20 лет
                </li>
                <li class="desc-list__desc-item">
                    Необходимые документы: паспорт, справка о доходах, документы на квартиру
                </li>
                <li class="desc-list__desc-item">
                    Дополнительные требования: кредитная история без просрочек
                </li>
            </ul>
            <a href="#" class="tariff-item__btn-primary button-animate">
                Оформить
            </a>
        </div>
        <div class="tariff-wrap__tariff-item item-accent">
            <div class="tariff-item__icon-shield"></div>
            <h3 class="tariff-item__tariff-header">
                9.8% больше <strong>возможностей</strong>
            </h3>
            <div class="tariff-item__tariff-desc">
                Кредитная программа с увеличенным сроком и суммой кредита для тех, кто хочет реализовать крупные планы и мечты
            </div>
            <div class="tariff-item__list-title">
                Основные условия:
            </div>
            <ul class="tariff-item__desc-list">
                <li class="desc-list__desc-item">
                    Процентная ставка: 9,8% годовых
                </li>
                <li class="desc-list__desc-item">
                    Срок кредита: до 25 лет
                </li>
                <li class="desc-list__desc-item">
                    Необходимые документы: паспорт, справка о доходах, документы на квартиру, подтверждение целевого использования средств
                </li>
                <li class="desc-list__desc-item">
                    Дополнительные требования: кредитная история без просрочек, возраст заемщика до 65 лет намомент погашения кредита
                </li>
            </ul>
            <a href="#" class="tariff-item__btn-primary button-animate">
                Оформить
            </a>
        </div>
        <div class="tariff-wrap__tariff-item">
            <div class="tariff-item__icon-shield"></div>
            <h3 class="tariff-item__tariff-header">
                <strong>6% доступное</strong> решение
            </h3>
            <div class="tariff-item__tariff-desc">
                Выгодная кредитная программа с низкой процентной ставкой для реализации вашей мечты
            </div>
            <div class="tariff-item__list-title">
                Основные условия:
            </div>
            <ul class="tariff-item__desc-list">
                <li class="desc-list__desc-item">
                    Процентная ставка: 6% годовых
                </li>
                <li class="desc-list__desc-item">
                    Срок кредита: до 20 лет
                </li>
                <li class="desc-list__desc-item">
                    Необходимые документы: паспорт, справка о доходах, документы на квартиру
                </li>
                <li class="desc-list__desc-item">
                    Дополнительные требования: кредитная история без просрочек
                </li>
            </ul>
            <a href="#" class="tariff-item__btn-primary button-animate">
                Оформить
            </a>
        </div>
    </div>
    <a href="#" class="tariffs__btn-secondary">
        Посмотреть все программы
    </a>
</section>
 -->



<section class="roadmap">
    <h2 class="nzlg-title roadmap__rmp-title">
        Деньги <strong>за один день</strong>
    </h2>
    <div class="roadmap__road-items">
        <div class="flex-row road-items__road-item">
            <div class="road-item__step-num">
                01
            </div>
            <div class="road-item__step-img">
                <svg class="mobile-only" width="67" height="127" viewBox="0 0 67 127" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M66.3232 41.1729L66.3232 85.7718" stroke="#59595B" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M56.8484 63.4795L65.8765 63.4795" stroke="#59595B" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M0.676756 85.7718L0.676758 41.1729" stroke="#59595B" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M10.1514 63.4795L1.12329 63.4795" stroke="#59595B" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M18.0427 114.753L18.0427 4.91441C18.0427 1.14663 22.3469 -0.969328 25.2976 1.36505L29.3447 4.57312C30.9283 5.82905 33.1346 5.87 34.7588 4.66868L39.8752 0.887257C42.8394 -1.29696 47.0083 0.832652 47.0083 4.53217L47.0083 114.821C47.0083 116.214 46.3721 117.524 45.2758 118.384L35.598 125.988C34.0144 127.231 31.7946 127.258 30.1839 126.057L19.8835 118.384C18.7465 117.538 18.0697 116.187 18.0697 114.753L18.0427 114.753Z" fill="#E5D2A5"/>
                </svg>
                <svg class="desktop-only" width="303" height="96" viewBox="0 0 303 96" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M273.929 70.1478L11.9902 70.1478C3.00496 70.1478 -2.04112 63.9805 3.52582 59.7527L11.1763 53.9539C14.1714 51.6848 14.2691 48.5236 11.4042 46.1963L2.38647 38.8654C-2.82236 34.6181 2.25619 28.6448 11.0786 28.6448L274.092 28.6448C277.413 28.6448 280.538 29.5563 282.589 31.1272L300.722 44.9939C303.685 47.263 303.75 50.4436 300.885 52.7514L282.589 67.5102C280.57 69.1393 277.348 70.109 273.929 70.109V70.1478Z" fill="#E5D2A5"/>
                    <path d="M98.4558 0.969727L204.814 0.969727" stroke="#59595B" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M151.652 14.5456V1.60986" stroke="#59595B" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M204.814 95.0303L98.4558 95.0303" stroke="#59595B" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M151.652 81.4546V94.3903" stroke="#59595B" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
            <div class="road-item__step-text">
                Обращение <br>
                к нам
            </div>
        </div>
        <div class="flex-row road-items__road-item">
            <div class="road-item__step-num">
                02
            </div>
            <div class="road-item__step-img">
                <svg class="mobile-only" width="67" height="127" viewBox="0 0 67 127" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M66.3232 41.1729L66.3232 85.7718" stroke="#59595B" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M56.8484 63.4795L65.8765 63.4795" stroke="#59595B" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M0.676756 85.7718L0.676758 41.1729" stroke="#59595B" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M10.1514 63.4795L1.12329 63.4795" stroke="#59595B" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M18.0427 114.753L18.0427 4.91441C18.0427 1.14663 22.3469 -0.969328 25.2976 1.36505L29.3447 4.57312C30.9283 5.82905 33.1346 5.87 34.7588 4.66868L39.8752 0.887257C42.8394 -1.29696 47.0083 0.832652 47.0083 4.53217L47.0083 114.821C47.0083 116.214 46.3721 117.524 45.2758 118.384L35.598 125.988C34.0144 127.231 31.7946 127.258 30.1839 126.057L19.8835 118.384C18.7465 117.538 18.0697 116.187 18.0697 114.753L18.0427 114.753Z" fill="#AB090D"/>
                </svg>
                <svg class="desktop-only" width="303" height="96" viewBox="0 0 303 96" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M273.929 70.1478L11.9902 70.1478C3.00496 70.1478 -2.04112 63.9805 3.52582 59.7527L11.1763 53.9539C14.1714 51.6848 14.2691 48.5236 11.4042 46.1963L2.38647 38.8654C-2.82236 34.6181 2.25619 28.6448 11.0786 28.6448L274.092 28.6448C277.413 28.6448 280.538 29.5563 282.589 31.1272L300.722 44.9939C303.685 47.263 303.75 50.4436 300.885 52.7514L282.589 67.5102C280.57 69.1393 277.348 70.109 273.929 70.109V70.1478Z" fill="#AB090D"/>
                    <path d="M98.4558 0.969727L204.814 0.969727" stroke="#59595B" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M151.652 14.5456V1.60986" stroke="#59595B" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M204.814 95.0303L98.4558 95.0303" stroke="#59595B" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M151.652 81.4546V94.3903" stroke="#59595B" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
            <div class="road-item__step-text">
                Оценка <br>
                недвижимости
            </div>
        </div>
        <div class="flex-row road-items__road-item">
            <div class="road-item__step-num">
                03
            </div>
            <div class="road-item__step-img">
                <svg class="mobile-only" width="67" height="127" viewBox="0 0 67 127" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M66.3232 41.1729L66.3232 85.7718" stroke="#59595B" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M56.8484 63.4795L65.8765 63.4795" stroke="#59595B" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M0.676756 85.7718L0.676758 41.1729" stroke="#59595B" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M10.1514 63.4795L1.12329 63.4795" stroke="#59595B" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M18.0427 114.753L18.0427 4.91441C18.0427 1.14663 22.3469 -0.969328 25.2976 1.36505L29.3447 4.57312C30.9283 5.82905 33.1346 5.87 34.7588 4.66868L39.8752 0.887257C42.8394 -1.29696 47.0083 0.832652 47.0083 4.53217L47.0083 114.821C47.0083 116.214 46.3721 117.524 45.2758 118.384L35.598 125.988C34.0144 127.231 31.7946 127.258 30.1839 126.057L19.8835 118.384C18.7465 117.538 18.0697 116.187 18.0697 114.753L18.0427 114.753Z" fill="#E5D2A5"/>
                </svg>
                <svg class="desktop-only" width="303" height="96" viewBox="0 0 303 96" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M273.929 70.1478L11.9902 70.1478C3.00496 70.1478 -2.04112 63.9805 3.52582 59.7527L11.1763 53.9539C14.1714 51.6848 14.2691 48.5236 11.4042 46.1963L2.38647 38.8654C-2.82236 34.6181 2.25619 28.6448 11.0786 28.6448L274.092 28.6448C277.413 28.6448 280.538 29.5563 282.589 31.1272L300.722 44.9939C303.685 47.263 303.75 50.4436 300.885 52.7514L282.589 67.5102C280.57 69.1393 277.348 70.109 273.929 70.109V70.1478Z" fill="#E5D2A5"/>
                    <path d="M98.4558 0.969727L204.814 0.969727" stroke="#59595B" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M151.652 14.5456V1.60986" stroke="#59595B" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M204.814 95.0303L98.4558 95.0303" stroke="#59595B" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M151.652 81.4546V94.3903" stroke="#59595B" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
            <div class="road-item__step-text">
                Заключение <br>
                сделки
            </div>
        </div>
        <div class="flex-row road-items__road-item">
            <div class="road-item__step-num">
                04
            </div>
            <div class="road-item__step-img">
                <svg class="mobile-only" width="67" height="127" viewBox="0 0 67 127" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M66.3232 41.1729L66.3232 85.7718" stroke="#59595B" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M56.8484 63.4795L65.8765 63.4795" stroke="#59595B" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M0.676756 85.7718L0.676758 41.1729" stroke="#59595B" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M10.1514 63.4795L1.12329 63.4795" stroke="#59595B" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M18.0427 114.753L18.0427 4.91441C18.0427 1.14663 22.3469 -0.969328 25.2976 1.36505L29.3447 4.57312C30.9283 5.82905 33.1346 5.87 34.7588 4.66868L39.8752 0.887257C42.8394 -1.29696 47.0083 0.832652 47.0083 4.53217L47.0083 114.821C47.0083 116.214 46.3721 117.524 45.2758 118.384L35.598 125.988C34.0144 127.231 31.7946 127.258 30.1839 126.057L19.8835 118.384C18.7465 117.538 18.0697 116.187 18.0697 114.753L18.0427 114.753Z" fill="#AB090D"/>
                </svg>
                <svg class="desktop-only" width="303" height="96" viewBox="0 0 303 96" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M273.929 70.1478L11.9902 70.1478C3.00496 70.1478 -2.04112 63.9805 3.52582 59.7527L11.1763 53.9539C14.1714 51.6848 14.2691 48.5236 11.4042 46.1963L2.38647 38.8654C-2.82236 34.6181 2.25619 28.6448 11.0786 28.6448L274.092 28.6448C277.413 28.6448 280.538 29.5563 282.589 31.1272L300.722 44.9939C303.685 47.263 303.75 50.4436 300.885 52.7514L282.589 67.5102C280.57 69.1393 277.348 70.109 273.929 70.109V70.1478Z" fill="#AB090D"/>
                    <path d="M98.4558 0.969727L204.814 0.969727" stroke="#59595B" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M151.652 14.5456V1.60986" stroke="#59595B" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M204.814 95.0303L98.4558 95.0303" stroke="#59595B" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M151.652 81.4546V94.3903" stroke="#59595B" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
            <div class="road-item__step-text step-text-check">
                Ваши <br>
                деньги
            </div>
        </div>
    </div>
</section>
<?php while ( have_rows( 'page_content', get_option('page_on_front') ) ) : the_row(); ?>
    <?php if ( get_row_layout() == 'our_work_digits' ) : ?>
        <section class="our-work">
            <h2 <?php live_edit('page_content, flex-our_work_digits--header', get_option('page_on_front')) ?> class="nzlg-title our-work__ow-title">
                <?php echo strip_tags( get_sub_field( 'header', get_option('page_on_front') ), ['strong'] ); ?>
            </h2>
            <div <?php live_edit('page_content, flex-our_work_digits--bg_img', get_option('page_on_front')) ?> style="background-image: url('<?php the_sub_field( 'bg_img' ); ?>')" class="our-work__head-img"></div>
            <div <?php live_edit('page_content, flex-our_work_digits--counters', get_option('page_on_front')) ?> class="our-work__counters">
                <?php while ( have_rows( 'counters', get_option('page_on_front') ) ) : the_row(); ?>
                    <div class="flex-row counters__items-row">
                        <?php while ( have_rows( 'counters_row' ) ) : the_row(); ?>
                            <div class="items-row__item-counter">
                                <div class="item-counter__count">
                                    <?php the_sub_field( 'value' ); ?>
                                </div>
                                <div class="item-counter__legend">
                                    <?php the_sub_field( 'label' ); ?>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php endwhile; ?>
            </div>

    <?php endif; ?>
<?php endwhile; ?>



 <?php while ( have_rows( 'page_content', get_option('page_on_front') ) ) : the_row(); ?>
    <?php if ( get_row_layout() == 'partner_banks' ) : ?>




            <div class=" flex-row our-work__partners">
                <div <?php live_edit('page_content, flex-partner_banks--partner_h', get_option('page_on_front')) ?> class="partners__header">
					<?php echo strip_tags( get_sub_field( 'partner_h', get_option('page_on_front') ), ['strong'] ); ?>

                </div>

                <div class="partners__prt-logos">
                    <div class="flex-row prt-logos__logos-row">
                        <div class="logos-row__logo-item">
                            <img class="img-crop" src="<?php bloginfo('template_url'); ?>/assets/img/logo1.png" alt="">
                        </div>
                        <div class="logos-row__logo-item">
                            <img src="<?php bloginfo('template_url'); ?>/assets/img/logo2.png" alt="">
                        </div>
                    </div>
                    <div class="flex-row prt-logos__logos-row">
                        <div class="logos-row__logo-item">
                            <img src="<?php bloginfo('template_url'); ?>/assets/img/logo3.png" alt="">
                        </div>
                        <div class="logos-row__logo-item">
                            <img src="<?php bloginfo('template_url'); ?>/assets/img/logo4.png" alt="">
                        </div>

                    </div>


                </div>

            </div>

<!-- 			            <div class="flex-row our-work__partners">
							<div <?php live_edit('page_content, flex-partner_banks--partner_h', get_option('page_on_front')) ?> class="partners__header">
								<?php echo strip_tags( get_sub_field( 'partner_h', get_option('page_on_front') ), ['strong'] ); ?>

							</div>

							<div class="partners__prt-logos">
								<div class="flex-row prt-logos__logos-row" style="flex-wrap: wrap;">
									<div class="logos-row__logo-item">
										<img class="img-crop" src="<?php bloginfo('template_url'); ?>/assets/img/logo1.png" alt="">
									</div>
									<div class="logos-row__logo-item">
										<img src="<?php bloginfo('template_url'); ?>/assets/img/logo2.png" alt="">
									</div>

									<div class="logos-row__logo-item">
										<img src="<?php bloginfo('template_url'); ?>/assets/img/logo3.png" alt="">
									</div>
									<div class="logos-row__logo-item">
										<img src="<?php bloginfo('template_url'); ?>/assets/img/logo4.png" alt="">
									</div>

									<div class="logos-row__logo-item">
										<img src="<?php bloginfo('template_url'); ?>/assets/img/logo3.png" alt="">
									</div>
									<div class="logos-row__logo-item">
										<img src="<?php bloginfo('template_url'); ?>/assets/img/logo4.png" alt="">
									</div>

								</div>
							</div>





            </div> -->





        </section>

    <?php endif; ?>
<?php endwhile; ?>




<section class="action">
    <h3 class="action__title">
        Подберем для вас индивидуальные условия
    </h3>
    <a href="#" class="action__btn-primary button-animate btn-5">
        Подобрать условия кредитования
    </a>
</section>

<?php while ( have_rows( 'page_content', get_option('page_on_front') ) ) : the_row(); ?>
    <?php if ( get_row_layout() == 'сontact_us' ) : ?>


<section class="videos">
    <h2 <?php live_edit('page_content, flex-сontact_us--header', get_option('page_on_front')) ?> class="nzlg-title videos__vds-title">
			<?php echo strip_tags( get_sub_field( 'header', get_option('page_on_front') ), ['strong'] ); ?>
<!--         Обратитесь <strong>к нам если</strong> -->
    </h2>

    <div <?php live_edit('page_content, flex-сontact_us--contact_us_videos', get_option('page_on_front')) ?>  class="videos__video-wrapper">
		<?php if (have_rows("contact_us_videos")) : ?>
			<?php while (have_rows("contact_us_videos")) : the_row(); ?>
        <div class="video-wrapper__vds-item">

<!-- 			<iframe class="vds-item__video" src="https://www.youtube.com/embed/wyWT3KRDoaA?modestbranding=1&autohide=1&showinfo=0&controls=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe> -->
            <?php if (get_sub_field('contact_us_video')) : ?>
				<?php the_sub_field("contact_us_video") ?>
			<?php endif; ?>


            <div class="vds-item__title">
				 <?php if (get_sub_field('video_description')) : ?>
					<?php the_sub_field("video_description") ?>
				<?php endif; ?>

            </div>
        </div>
			<?php endwhile; ?>
		<?php endif; ?>







<!--         <div class="video-wrapper__vds-item">
            <iframe class="vds-item__video" src="https://www.youtube.com/embed/wyWT3KRDoaA?modestbranding=1&autohide=1&showinfo=0&controls=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            <div class="vds-item__title">
                Вам одобрили кредит с высокой процентной ставкой
            </div>
        </div> -->
    </div>
    <div class="videos__read-more-btn">
        <a href="#" <?php live_edit('page_content, flex-сontact_us--button_text', get_option('page_on_front')) ?> class="read-more-btn__link">
           <?php echo strip_tags( get_sub_field( 'button_text', get_option('page_on_front') ), ['strong'] ); ?>
        </a>
    </div>
</section>

<?php endif; ?>
<?php endwhile; ?>


<!-- <section class="videos">
    <h2 class="nzlg-title videos__vds-title">
        Обратитесь <strong>к нам если</strong>
    </h2>
    <div class="videos__video-wrapper">
        <div class="video-wrapper__vds-item">
            <iframe class="vds-item__video" src="https://www.youtube.com/embed/wyWT3KRDoaA?modestbranding=1&autohide=1&showinfo=0&controls=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            <div class="vds-item__title">
                Плохая кредитная история?
            </div>
        </div>
        <div class="video-wrapper__vds-item">
            <iframe class="vds-item__video" src="https://www.youtube.com/embed/wyWT3KRDoaA?modestbranding=1&autohide=1&showinfo=0&controls=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            <div class="vds-item__title">
                У вас нет времени ездить по банкам
            </div>
        </div>
        <div class="video-wrapper__vds-item">
            <iframe class="vds-item__video" src="https://www.youtube.com/embed/wyWT3KRDoaA?modestbranding=1&autohide=1&showinfo=0&controls=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            <div class="vds-item__title">
                Вам одобрили кредит с высокой процентной ставкой
            </div>
        </div>
    </div>
    <div class="videos__read-more-btn">
        <a href="#" class="read-more-btn__link">
            Показать ещё
        </a>
    </div>
</section> -->

<!-- <section class="faq">
    <h2 class="nzlg-title faq__fq-title">
        Частые <strong>вопросы</strong>
    </h2>
    <div class="faq__questions-wrapper">
        <div class="questions-wrapper__single-question question-expanded">
            <div class="single-question__qstn-title">
                Какие документы необходимы для оформления кредита под залог недвижимости?
            </div>
            <div class="single-question__qstn-text">
                Помимо стандартного пакета, включающего паспорт и справку о доходах, потребуется предоставить в банк документы на квартиру (свидетельство о регистрации), отчет об оценке, согласие супруга и/или других собственников на оформление залога. Дополнительно может понадобиться водительское удостоверение, загранпаспорт, договор купли-продажи недвижимости и другие документы по регламенту банка.
            </div>
        </div>
        <div class="questions-wrapper__single-question">
            <div class="single-question__qstn-title">
                Каковы минимальные и максимальные суммы кредита под залог недвижимости?
            </div>
            <div class="single-question__qstn-text">
                Помимо стандартного пакета, включающего паспорт и справку о доходах, потребуется предоставить в банк документы на квартиру (свидетельство о регистрации), отчет об оценке, согласие супруга и/или других собственников на оформление залога. Дополнительно может понадобиться водительское удостоверение, загранпаспорт, договор купли-продажи недвижимости и другие документы по регламенту банка.
            </div>
        </div>
        <div class="questions-wrapper__single-question">
            <div class="single-question__qstn-title">
                Какие сроки рассмотрения заявки на кредит под залог недвижимости
            </div>
            <div class="single-question__qstn-text">
                Помимо стандартного пакета, включающего паспорт и справку о доходах, потребуется предоставить в банк документы на квартиру (свидетельство о регистрации), отчет об оценке, согласие супруга и/или других собственников на оформление залога. Дополнительно может понадобиться водительское удостоверение, загранпаспорт, договор купли-продажи недвижимости и другие документы по регламенту банка.
            </div>
        </div>
        <div class="questions-wrapper__single-question">
            <div class="single-question__qstn-title">
                Можно ли досрочно погасить кредит под залог недвижимости? Как это сделать?
            </div>
            <div class="single-question__qstn-text">
                Помимо стандартного пакета, включающего паспорт и справку о доходах, потребуется предоставить в банк документы на квартиру (свидетельство о регистрации), отчет об оценке, согласие супруга и/или других собственников на оформление залога. Дополнительно может понадобиться водительское удостоверение, загранпаспорт, договор купли-продажи недвижимости и другие документы по регламенту банка.
            </div>
        </div>
        <div class="questions-wrapper__single-question">
            <div class="single-question__qstn-title">
                Какие виды недвижимости могут быть предложены в качестве залога?
            </div>
            <div class="single-question__qstn-text">
                Помимо стандартного пакета, включающего паспорт и справку о доходах, потребуется предоставить в банк документы на квартиру (свидетельство о регистрации), отчет об оценке, согласие супруга и/или других собственников на оформление залога. Дополнительно может понадобиться водительское удостоверение, загранпаспорт, договор купли-продажи недвижимости и другие документы по регламенту банка.
            </div>
        </div>
    </div>
    <div class="flex-row faq__fq-cta">
        <div class="fq-cta__cta-title">
            Не нашли ответа
            на свой вопрос?
        </div>
        <a href="#" class="faq__btn-primary button-animate">
            Напишите нам
        </a>
    </div>
</section> -->

<?php while ( have_rows( 'page_content', get_option('page_on_front') ) ) : the_row(); ?>
    <?php if ( get_row_layout() == 'our_faq_questions' ) : ?>


<section class="faq">
    <h2 <?php live_edit('page_content, flex-our_faq_questions--header', get_option('page_on_front')) ?> class="nzlg-title faq__fq-title">
        <?php echo strip_tags( get_sub_field( 'header', get_option('page_on_front') ), ['strong'] ); ?>
    </h2>

    <div class="faq__questions-wrapper">

        <div class="questions-wrapper__single-question question-expanded">
            <div <?php live_edit('page_content, flex-our_faq_questions--faq_question_1', get_option('page_on_front')) ?> class="single-question__qstn-title">
				<?php echo strip_tags( get_sub_field( 'faq_question_1', get_option('page_on_front') ), ['strong'] ); ?>
<!--                 Какие документы необходимы для оформления кредита под залог недвижимости? -->
            </div>
            <div <?php live_edit('page_content, flex-our_faq_questions--faq_answer_1', get_option('page_on_front')) ?>  class="single-question__qstn-text">
				<?php echo strip_tags( get_sub_field( 'faq_answer_1', get_option('page_on_front') ), ['strong'] ); ?>
<!--                 Помимо стандартного пакета, включающего паспорт и справку о доходах, потребуется предоставить в банк документы на квартиру (свидетельство о регистрации), отчет об оценке, согласие супруга и/или других собственников на оформление залога. Дополнительно может понадобиться водительское удостоверение, загранпаспорт, договор купли-продажи недвижимости и другие документы по регламенту банка. -->
            </div>
        </div>


        <div <?php live_edit('page_content, flex-our_faq_questions--faq_question_2', get_option('page_on_front')) ?> class="questions-wrapper__single-question">
            <div class="single-question__qstn-title">
				<?php echo strip_tags( get_sub_field( 'faq_question_2', get_option('page_on_front') ), ['strong'] ); ?>
<!--                 Каковы минимальные и максимальные суммы кредита под залог недвижимости? -->
            </div>
            <div <?php live_edit('page_content, flex-our_faq_questions--faq_answer_2', get_option('page_on_front')) ?> class="single-question__qstn-text">
				<?php echo strip_tags( get_sub_field( 'faq_answer_2', get_option('page_on_front') ), ['strong'] ); ?>
<!--                 Помимо стандартного пакета, включающего паспорт и справку о доходах, потребуется предоставить в банк документы на квартиру (свидетельство о регистрации), отчет об оценке, согласие супруга и/или других собственников на оформление залога. Дополнительно может понадобиться водительское удостоверение, загранпаспорт, договор купли-продажи недвижимости и другие документы по регламенту банка. -->
            </div>
        </div>
		<div <?php live_edit('page_content, flex-our_faq_questions--faq_question_3', get_option('page_on_front')) ?> class="questions-wrapper__single-question">
            <div class="single-question__qstn-title">
				<?php echo strip_tags( get_sub_field( 'faq_question_3', get_option('page_on_front') ), ['strong'] ); ?>
<!--                 Каковы минимальные и максимальные суммы кредита под залог недвижимости? -->
            </div>
            <div <?php live_edit('page_content, flex-our_faq_questions--faq_answer_3', get_option('page_on_front')) ?> class="single-question__qstn-text">
				<?php echo strip_tags( get_sub_field( 'faq_answer_3', get_option('page_on_front') ), ['strong'] ); ?>
<!--                 Помимо стандартного пакета, включающего паспорт и справку о доходах, потребуется предоставить в банк документы на квартиру (свидетельство о регистрации), отчет об оценке, согласие супруга и/или других собственников на оформление залога. Дополнительно может понадобиться водительское удостоверение, загранпаспорт, договор купли-продажи недвижимости и другие документы по регламенту банка. -->
            </div>
        </div>
		<div <?php live_edit('page_content, flex-our_faq_questions--faq_question_4', get_option('page_on_front')) ?> class="questions-wrapper__single-question">
            <div class="single-question__qstn-title">
				<?php echo strip_tags( get_sub_field( 'faq_question_4', get_option('page_on_front') ), ['strong'] ); ?>
<!--                 Каковы минимальные и максимальные суммы кредита под залог недвижимости? -->
            </div>
            <div <?php live_edit('page_content, flex-our_faq_questions--faq_answer_4', get_option('page_on_front')) ?> class="single-question__qstn-text">
				<?php echo strip_tags( get_sub_field( 'faq_answer_4', get_option('page_on_front') ), ['strong'] ); ?>
<!--                 Помимо стандартного пакета, включающего паспорт и справку о доходах, потребуется предоставить в банк документы на квартиру (свидетельство о регистрации), отчет об оценке, согласие супруга и/или других собственников на оформление залога. Дополнительно может понадобиться водительское удостоверение, загранпаспорт, договор купли-продажи недвижимости и другие документы по регламенту банка. -->
            </div>
        </div>
		<div <?php live_edit('page_content, flex-our_faq_questions--faq_question_5', get_option('page_on_front')) ?> class="questions-wrapper__single-question">
            <div class="single-question__qstn-title">
				<?php echo strip_tags( get_sub_field( 'faq_question_5', get_option('page_on_front') ), ['strong'] ); ?>
<!--                 Каковы минимальные и максимальные суммы кредита под залог недвижимости? -->
            </div>
            <div <?php live_edit('page_content, flex-our_faq_questions--faq_answer_5', get_option('page_on_front')) ?> class="single-question__qstn-text">
				<?php echo strip_tags( get_sub_field( 'faq_answer_5', get_option('page_on_front') ), ['strong'] ); ?>
<!--                 Помимо стандартного пакета, включающего паспорт и справку о доходах, потребуется предоставить в банк документы на квартиру (свидетельство о регистрации), отчет об оценке, согласие супруга и/или других собственников на оформление залога. Дополнительно может понадобиться водительское удостоверение, загранпаспорт, договор купли-продажи недвижимости и другие документы по регламенту банка. -->
            </div>
        </div>
<!--         <div class="questions-wrapper__single-question">
            <div class="single-question__qstn-title">
                Какие сроки рассмотрения заявки на кредит под залог недвижимости
            </div>
            <div class="single-question__qstn-text">
                Помимо стандартного пакета, включающего паспорт и справку о доходах, потребуется предоставить в банк документы на квартиру (свидетельство о регистрации), отчет об оценке, согласие супруга и/или других собственников на оформление залога. Дополнительно может понадобиться водительское удостоверение, загранпаспорт, договор купли-продажи недвижимости и другие документы по регламенту банка.
            </div>
        </div>
        <div class="questions-wrapper__single-question">
            <div class="single-question__qstn-title">
                Можно ли досрочно погасить кредит под залог недвижимости? Как это сделать?
            </div>
            <div class="single-question__qstn-text">
                Помимо стандартного пакета, включающего паспорт и справку о доходах, потребуется предоставить в банк документы на квартиру (свидетельство о регистрации), отчет об оценке, согласие супруга и/или других собственников на оформление залога. Дополнительно может понадобиться водительское удостоверение, загранпаспорт, договор купли-продажи недвижимости и другие документы по регламенту банка.
            </div>
        </div>
        <div class="questions-wrapper__single-question">
            <div class="single-question__qstn-title">
                Какие виды недвижимости могут быть предложены в качестве залога?
            </div>
            <div class="single-question__qstn-text">
                Помимо стандартного пакета, включающего паспорт и справку о доходах, потребуется предоставить в банк документы на квартиру (свидетельство о регистрации), отчет об оценке, согласие супруга и/или других собственников на оформление залога. Дополнительно может понадобиться водительское удостоверение, загранпаспорт, договор купли-продажи недвижимости и другие документы по регламенту банка.
            </div>
        </div> -->
    </div>
    <div class="flex-row faq__fq-cta">
        <div <?php live_edit('page_content, flex-our_faq_questions--faq_not_answer', get_option('page_on_front')) ?> class="fq-cta__cta-title">
			<?php echo strip_tags( get_sub_field( 'faq_not_answer', get_option('page_on_front') ), ['strong'] ); ?>
<!--             Не нашли ответа
            на свой вопрос? -->
        </div>
        <a <?php live_edit('page_content, flex-our_faq_questions--button_text', get_option('page_on_front')) ?> href="#" class="faq__btn-primary button-animate btn-5">
			<?php echo strip_tags( get_sub_field( 'button_text', get_option('page_on_front') ), ['strong'] ); ?>
<!--             Напишите нам -->
        </a>
    </div>
</section>

 <?php endif; ?>
<?php endwhile; ?>


<?php while ( have_rows( 'page_content', get_option('page_on_front') ) ) : the_row(); ?>
    <?php if ( get_row_layout() == 'our_certificates' ) : ?>

<section class="certificates">
    <h2 <?php live_edit('page_content, flex-our_certificates--header', get_option('page_on_front')) ?> class="nzlg-title certificates__crt-title">
                        <?php echo strip_tags( get_sub_field( 'header', get_option('page_on_front') ), ['strong'] ); ?>
    </h2>
    <div class="certificates__slider-crt">
        <div <?php live_edit('page_content, flex-our_certificates--certificates', get_option('page_on_front')) ?> class="swiper slider-crt__slide-wrapper js-slider-certificates">
            <div  class="swiper-wrapper">
			<?php if (have_rows("certificates")) : ?>
				<?php while (have_rows("certificates")) : the_row(); ?>
                <div class="slide-wrapper__crt-slide swiper-slide">
						<?php if (get_sub_field('certificates_image')) : ?>
							<img class="cert__slide-img" src="<?php the_sub_field("certificates_image") ?>" alt="">

						<?php endif; ?>

                </div>
				<?php endwhile; ?>
			<?php endif; ?>
<!--                 <div class="slide-wrapper__crt-slide swiper-slide">
                    <img class="cert__slide-img" src="<?php bloginfo('template_url'); ?>/assets/img/certificate2.jpg" alt="">
                </div>
                <div class="slide-wrapper__crt-slide swiper-slide">
                    <img class="cert__slide-img" src="<?php bloginfo('template_url'); ?>/assets/img/certificate3.jpg" alt="">
                </div>
                <div class="slide-wrapper__crt-slide swiper-slide">
                    <img class="cert__slide-img" src="<?php bloginfo('template_url'); ?>/assets/img/certificate4.jpg" alt="">
                </div>
                <div class="slide-wrapper__crt-slide swiper-slide">
                    <img class="cert__slide-img" src="<?php bloginfo('template_url'); ?>/assets/img/certificate5.jpg" alt="">
                </div>
                <div class="slide-wrapper__crt-slide swiper-slide">
                    <img class="cert__slide-img" src="<?php bloginfo('template_url'); ?>/assets/img/certificate6.jpg" alt="">
                </div> -->
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>

<?php endif; ?>
<?php endwhile; ?>


<!-- <section class="certificates">
    <h2 class="nzlg-title certificates__crt-title">
        <strong>Сертификаты</strong>
    </h2>
    <div class="certificates__slider-crt">
        <div class="swiper slider-crt__slide-wrapper js-slider-certificates">
            <div class="swiper-wrapper">
                <div class="slide-wrapper__crt-slide swiper-slide">
                    <img class="cert__slide-img" src="<?php bloginfo('template_url'); ?>/assets/img/certificate1.jpg" alt="">
                </div>
                <div class="slide-wrapper__crt-slide swiper-slide">
                    <img class="cert__slide-img" src="<?php bloginfo('template_url'); ?>/assets/img/certificate2.jpg" alt="">
                </div>
                <div class="slide-wrapper__crt-slide swiper-slide">
                    <img class="cert__slide-img" src="<?php bloginfo('template_url'); ?>/assets/img/certificate3.jpg" alt="">
                </div>
                <div class="slide-wrapper__crt-slide swiper-slide">
                    <img class="cert__slide-img" src="<?php bloginfo('template_url'); ?>/assets/img/certificate4.jpg" alt="">
                </div>
                <div class="slide-wrapper__crt-slide swiper-slide">
                    <img class="cert__slide-img" src="<?php bloginfo('template_url'); ?>/assets/img/certificate5.jpg" alt="">
                </div>
                <div class="slide-wrapper__crt-slide swiper-slide">
                    <img class="cert__slide-img" src="<?php bloginfo('template_url'); ?>/assets/img/certificate6.jpg" alt="">
                </div>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section> -->

<section class="our-services">
    <h2 class="nzlg-title our-services__os-title">
        <strong>Наши услуги</strong>
    </h2>
    <ul class="flex-row our-services__our-svc-links">
        <li class="our-svc-links__our-svc-item">
            <a href="#" class="our-svc-item__our-svc-link">
                Кредит под залог
                квартиры
            </a>
        </li>
        <li class="our-svc-links__our-svc-item">
            <a href="#" class="our-svc-item__our-svc-link">
                Кредит под залог
                комнаты
            </a>
        </li>
        <li class="our-svc-links__our-svc-item">
            <a href="#" class="our-svc-item__our-svc-link">
                Кредит под залог
                гаражного бокса
            </a>
        </li>
        <li class="our-svc-links__our-svc-item">
            <a href="#" class="our-svc-item__our-svc-link">
                Кредит под залог
                земельного участка
            </a>
        </li>
        <li class="our-svc-links__our-svc-item">
            <a href="#" class="our-svc-item__our-svc-link">
                Кредит под залог
                частного дома
            </a>
        </li>
        <li class="our-svc-links__our-svc-item">
            <a href="#" class="our-svc-item__our-svc-link">
                Кредит под залог
                автомобиля
            </a>
        </li>
        <li class="our-svc-links__our-svc-item">
            <a href="#" class="our-svc-item__our-svc-link">
                Кредит под залог
                коммерческой недвижимость
            </a>
        </li>
        <li class="our-svc-links__our-svc-item">
            <a href="#" class="our-svc-item__our-svc-link">
                Кредит под залог
                грузовиков, экскаваторов
            </a>
        </li>
        <li class="our-svc-links__our-svc-item">
            <a href="#" class="our-svc-item__our-svc-link">
                Кредит под залог
                драгоценности
            </a>
        </li>
        <li class="our-svc-links__our-svc-item">
            <a href="#" class="our-svc-item__our-svc-link">
                Кредит под залог
                медицинской техники
            </a>
        </li>
        <li class="our-svc-links__our-svc-item">
            <a href="#" class="our-svc-item__our-svc-link">
                Кредит под залог
                промышленной техники
            </a>
        </li>
    </ul>
</section>


<div class="modal modal-sm">
    <div class="modal__modal-back"></div>
    <div class="modal__modal-front">
        <div class="modal-front__close"></div>
        <div class="modal-front__modal-header">
            Чек-лист готов к скачиванию
        </div>
        <div class="modal-front__modal-subheader">
            Нажмите на ссылку, чтобы перейти
            на страницу скачивания файла
        </div>
        <form action="" class="modal-front__callback-form">
            <a href="#" class="callback-form__text-input text-input-link">
                http:/yandex.disk/urldownloadfilechecklistfinance
            </a>
        </form>
    </div>
</div>

<div class="modal modal-sm">
    <div class="modal__modal-back"></div>
    <div class="modal__modal-front">
        <div class="modal-front__close"></div>
        <div class="modal-front__modal-header">
            Заполните поля и
            получите чек-лист
        </div>
        <div class="modal-front__modal-subheader">
            После отправки формы вы получите
            ссылку на файл с чек-листом
        </div>
        <form action="" class="modal-front__callback-form">
            <input placeholder="Ваше имя" type="text" class="callback-form__text-input">
            <input placeholder="Номер телефона" type="text" class="callback-form__text-input">
            <button type="submit" class="callback-form__btn-primary">
                Отправить
            </button>
            <div class="callback-form__modal-disclaimer">
                Отправляя заявку Вы даете свое согласие
                на обработку персональных данных
            </div>
        </form>
    </div>
</div>

<div class="modal modal-sm my-modal">
    <div class="modal__modal-back"></div>
    <div class="modal__modal-front">
        <div class="modal-front__close"></div>
        <div class="modal-front__modal-header">
            Заполните заявку
            ниже
        </div>
        <div class="modal-front__modal-subheader">
            Наш сотрудник свяжется
            с Вами в ближайшее время
        </div>
        <form action="" class="modal-front__callback-form">
            <input placeholder="Ваше имя" type="text" class="callback-form__text-input">
            <input placeholder="Номер телефона" type="text" class="callback-form__text-input">
            <button type="submit" class="callback-form__btn-primary">
                Отправить
            </button>
            <div class="callback-form__modal-disclaimer">
                Отправляя заявку Вы даете свое согласие
                на обработку персональных данных
            </div>
        </form>
    </div>
</div>


<div class="modal modal-sm">
    <div class="modal__modal-back"></div>
    <div class="modal__modal-front modal-front-success">
        <div class="modal-front__close"></div>
        <div class="modal-front__modal-success-icon"></div>
        <div class="modal-front__modal-header">
            Ваша заявка
            успешно отправлена
        </div>
    </div>
</div>
<?php get_footer(); ?>
