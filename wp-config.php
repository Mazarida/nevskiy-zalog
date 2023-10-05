<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе установки.
 * Необязательно использовать веб-интерфейс, можно скопировать файл в "wp-config.php"
 * и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки базы данных
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://ru.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Параметры базы данных: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'u2038615_n-zalog' );

/** Имя пользователя базы данных */
define( 'DB_USER', 'u2038615_n-zalog' );

/** Пароль к базе данных */
define( 'DB_PASSWORD', 'a48d1347f' );

/** Имя сервера базы данных */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу. Можно сгенерировать их с помощью
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}.
 *
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными.
 * Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'udkh>TGw/+}2E?{-[YB*n`]X.ZyJ4?aPJde}QlQ]h@1Ub&KMEg1[t^VH/3-c?v0)' );
define( 'SECURE_AUTH_KEY',  '#o?:A6+a~J+&9p%~ H,6a9$0A&2>IFc@^kDdm/2[9R~<8K%Wsn(6l3C9]k|kWQfU' );
define( 'LOGGED_IN_KEY',    '-Wf{eW6A+r#[M+b1GLj7ND4h5qxKr/^;,]]6yI?myD=XJO_:ct[mZ<g~;u?p>f$5' );
define( 'NONCE_KEY',        'x3B=x4>I,P[__6-u2&@xJYhl ^NU)M+j~^sW!v0};wS&|riPoHXdN8tEDr2y9@04' );
define( 'AUTH_SALT',        ';@%xiOuDR#MtQh#E&ZKFH6>gJb=)(0X|Ot+~`9O+vK~Fn9ET#8wkY2U3Nw*O>DZ6' );
define( 'SECURE_AUTH_SALT', '3,5E@^m,e)#;HE_#?NoF;ECO+QTNznO3dr*~Z2I&SF7v.6Q9L05q{U!z]P7 5bLA' );
define( 'LOGGED_IN_SALT',   ',eSOc[~#<?U6sQ|&>u`_?Nr}~!7q_.RKJ2zi_]T^2;Cr61JBCh{ 5}WKRq5PPp$9' );
define( 'NONCE_SALT',       'L%(d>@jYz~_VP^E&*2^*4ViUnJU64Xz&3@G{ABjBZ]9*L6NvO-(=Z6%uM>.maNOJ' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в документации.
 *
 * @link https://ru.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Произвольные значения добавляйте между этой строкой и надписью "дальше не редактируем". */



/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once ABSPATH . 'wp-settings.php';
