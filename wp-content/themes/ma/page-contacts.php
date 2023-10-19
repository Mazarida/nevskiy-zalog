<?php // Template Name: Контакты
get_header(); ?>
<section class="crumbs">
  <div class="flex-row breadcrumbs">
    <a href="#" class="breadcrumbs__crumb-item">
      Главная
    </a>
    <div class="breadcrumbs__crumb-divider">
      /
    </div>
    <div class="breadcrumbs__crumb-item crumb-item-current">
      Контакты
    </div>
  </div>
</section>
<section class="contacts">
    <div class="contacts-info">
        <h1 class="nzlg-title contacts-info__cont-title">
            Наши <strong>контакты</strong>
        </h1>
        <div class="contacts-info__conts-slogan">
            Свяжитесь с нами и мы подберем Вам подходящую кредитную программу
        </div>
        <a href="tel:+79196088865" class="flex-row contacts-info__conts-item">
            <span class="conts-item__icon-phone"></span>
            <span class="conts-item__link-text">
      +7 (919) 608-88-65
    </span>
        </a>
        <a href="mailto:nevskizalog@gmail.com" class="flex-row contacts-info__conts-item">
            <span class="conts-item__icon-envelope"></span>
            <span class="conts-item__link-text">
      nevskizalog@gmail.com
    </span>
        </a>
        <a href="https://yandex.ru/maps/-/CDaJA-NS" class="flex-row contacts-info__conts-item">
            <span class="conts-item__icon-map-marker"></span>
            <span class="conts-item__link-text">
      г. Санкт-Петербург
    </span>
        </a>
        <a href="https://t.me/ValerieAndriyako" class="flex-row contacts-info__conts-item">
            <span class="conts-item__icon-tg"></span>
            <span class="conts-item__link-text conts-underline">
      Написать в Telegram
    </span>
        </a>
        <a href="https://wa.me/+79196088865" class="flex-row contacts-info__conts-item">
            <span class="conts-item__icon-wa"></span>
            <span class="conts-item__link-text conts-underline">
      Написать в Whatsapp
    </span>
        </a>
    </div>
    <div class="contacts-requisites">
        <h2 class="nzlg-title contacts-requisites__cont-title">
            Наши <strong>реквизиты</strong>
        </h2>
        <div class="contacts-requisites__requisites-item">
            <div class="requisites-item__rq-title">
                Название организации:
            </div>
            <div class="requisites-item__rq-value">
                ИП “Андрияко Валерия Валерьевна”
            </div>
        </div>
        <div class="contacts-requisites__requisites-item">
    <span class="requisites-item__rq-title">
      Юр. адрес организации
    </span>
            <span class="requisites-item__rq-value">
      Российская Федерация, 453252, БАШКОРТОСТАН РЕСП,
      Г САЛАВАТ, УЛ ПУГАЧЕВА, дом 2, кв. 4
    </span>
        </div>
        <div class="contacts-requisites__requisites-item">
    <span class="requisites-item__rq-title">
      ИНН
    </span>
            <span class="requisites-item__rq-value">
      026615337002
    </span>
        </div>
        <div class="contacts-requisites__requisites-item">
    <span class="requisites-item__rq-title">
      Расчетный счет
    </span>
            <span class="requisites-item__rq-value">
      40802810100003100486
    </span>
        </div>
        <div class="contacts-requisites__requisites-item">
    <span class="requisites-item__rq-title">
      ОГРН:
    </span>
            <span class="requisites-item__rq-value">
      322028000041075
    </span>
        </div>
        <div class="contacts-requisites__requisites-item">
    <span class="requisites-item__rq-title">
      Банк:
    </span>
            <span class="requisites-item__rq-value">
      АО «Тинькофф Банк»
    </span>
        </div>
        <div class="contacts-requisites__requisites-item">
    <span class="requisites-item__rq-title">
      БИК банка:
    </span>
            <span class="requisites-item__rq-value">
      044525974
    </span>
        </div>
        <div class="contacts-requisites__requisites-item">
    <span class="requisites-item__rq-title">
      ИНН банка:
    </span>
            <span class="requisites-item__rq-value">
      7710140679
    </span>
        </div>
        <div class="contacts-requisites__requisites-item">
    <span class="requisites-item__rq-title">
      Корр. счет банка:
    </span>
            <span class="requisites-item__rq-value">
      30101810145250000974
    </span>
        </div>
        <div class="contacts-requisites__requisites-item">
    <span class="requisites-item__rq-title">
      Юр. адрес банка:
    </span>
            <span class="requisites-item__rq-value">
      127287, г. Москва, ул. Хуторская 2-я, д. 38А, стр. 26
    </span>
        </div>
    </div>
</section>
<section class="callback-contacts">
    <div class="call-me">
        <h2 class="nzlg-title call-me__cm-title">
            <strong>
                Перезвоните мне
            </strong>
        </h2>
        <div class="call-me__call-form">
            <?php echo do_shortcode('[contact-form-7 id="b959bc2" title="Заполните заявку Контакты"]'); ?>
            <div class="call-form__disclaimer">
                Отправляя заявку Вы даете свое согласие <br>
                на обработку персональных данных
            </div>
</div>
    </div>
    <div class="contacts-map">
        <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A7affce878c32b0f7df2e0146576ae885b983e559c42f765f7b7cba1ec6159428&amp;width=100%25&amp;height=530&amp;lang=ru_RU&amp;scroll=false"></script>
    </div>
</section>
<?php get_footer(); ?>
