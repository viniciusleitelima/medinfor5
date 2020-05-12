<?php
/**
 * As configurações básicas do WordPress
 *
 * O script de criação wp-config.php usa esse arquivo durante a instalação.
 * Você não precisa user o site, você pode copiar este arquivo
 * para "wp-config.php" e preencher os valores.
 *
 * Este arquivo contém as seguintes configurações:
 *
 * * Configurações do MySQL
 * * Chaves secretas
 * * Prefixo do banco de dados
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/pt-br:Editando_wp-config.php
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar estas informações
// com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define('DB_NAME', 'gacervos');

/** Usuário do banco de dados MySQL */
define('DB_USER', 'gacervos');

/** Senha do banco de dados MySQL */
define('DB_PASSWORD', 'gacervos123');

/** Nome do host do MySQL */
define('DB_HOST', 'mysql380.umbler.com');

/** Charset do banco de dados a ser usado na criação das tabelas. */
define('DB_CHARSET', 'utf8mb4');

/** O tipo de Collate do banco de dados. Não altere isso se tiver dúvidas. */
define('DB_COLLATE', '');

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las
 * usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org
 * secret-key service}
 * Você pode alterá-las a qualquer momento para desvalidar quaisquer
 * cookies existentes. Isto irá forçar todos os
 * usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'RkA4BB~_5<R +)HRS@gI,kf9>^3w~wF5?#CD>Rw)NDbl3OKxwp(z~J#W)uzR6Q2D');
define('SECURE_AUTH_KEY',  'B[(6|MCy#8!U]?-x(Ju??~%J#e`{ZxDEY$5A|qd}j!8ow&D(,9kL/35 S88Cu!xs');
define('LOGGED_IN_KEY',    'nnb<ZT&3QomGJ)p@*VB}99IU!aX?O?fx*e5aDJJ.<RsK*?e-iTsHT)/yP=&OOr)I');
define('NONCE_KEY',        '=rc2,b-23sX`+#VhgXiwrIYRiR]IHUj#v<HP5;9etE2t5>8~XYV{mEy<A}DBPeVQ');
define('AUTH_SALT',        'LhmUT2s4?]W*5CT?zb^%(-fK@IR@Vfws9nN+E1N]LpJ7K75MwAJv^s);:J E[4gF');
define('SECURE_AUTH_SALT', 'f=QNIHv4 8.A^(1Fx=J>&$apSJxc3A8?5*G&m1J&?g+{LvDf-Waik%ry:x8.)#m!');
define('LOGGED_IN_SALT',   '7xwr=LAP}9KGt(#$Dg`1b%h+C[G).bBNCm.#LbbVJcx4_h(zKX/Es(K{w_ikqM58');
define('NONCE_SALT',       'U4-m;C2,$(7;GB*H~3C+MV5BD1ol3mZS>V-a5=3elu`7SF:b)]L9@488huKhw(nl');

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * para cada um um único prefixo. Somente números, letras e sublinhados!
 */
$table_prefix  = 'wp_';

/**
 * Para desenvolvedores: Modo debugging WordPress.
 *
 * Altere isto para true para ativar a exibição de avisos
 * durante o desenvolvimento. É altamente recomendável que os
 * desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 *
 * Para informações sobre outras constantes que podem ser utilizadas
 * para depuração, visite o Codex.
 *
 * @link https://codex.wordpress.org/pt-br:Depura%C3%A7%C3%A3o_no_WordPress
 */
define('WP_DEBUG', false);

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Configura as variáveis e arquivos do WordPress. */
require_once(ABSPATH . 'wp-settings.php');
