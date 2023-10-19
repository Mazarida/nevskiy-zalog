

<?php get_header(); ?>

<section class="our-services">
	
	<div class="search-result">
						<?php if ( have_posts() ) : ?>
<h1 class="entry-title"><?php printf( __( 'Результаты поиска: %s', 'blankslate' ), get_search_query() ); ?></h1>
<?php while ( have_posts() ) : the_post(); ?>
        <?php the_title(); ?>
        <?php the_content(); ?>
<?php endwhile; ?>
    <?php global $wp_query; if ( $wp_query->max_num_pages > 1 ) { ?>
        <nav id="nav-below" class="navigation" role="navigation">
            <div class="nav-previous"><?php next_posts_link(sprintf( __( '%s назад', 'blankslate' ), '<span class="meta-nav">&larr;</span>' ) ) ?></div>
            <div class="nav-next"><?php previous_posts_link(sprintf( __( 'вперед %s', 'blankslate' ), '<span class="meta-nav">&rarr;</span>' ) ) ?></div>
        </nav>
    <?php } ?>
<?php else : ?>
    Ничего не найдено
<?php endif; ?>
	</div>
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



<?php get_footer(); ?> 

