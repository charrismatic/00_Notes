

# Custom WordPress configurations on "wp-config.php" file.
  This file has the following configurations: MySQL settings, 
    Table Prefix, 
    Secret Keys, 
    WordPress Language, 
    ABSPATH and more.

  @link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php} Codex page.

  @link http://generatewp.com/wp-config/ wp-config.php File Generator}  GenerateWP.com.


### MySQL settings

```
define( 'DB_NAME',     'database_name_here' );
define( 'DB_USER',     'username_here' );
define( 'DB_PASSWORD', 'password_here' );
define( 'DB_HOST',     'localhost' );
define( 'DB_CHARSET',  'utf8mb4' );
```

### MySQL database table prefix. 

```
$table_prefix = 'wp_';
```

### Authentication Unique Keys and Salts. 

```
define('AUTH_KEY',         '5s$x@t-j,:4k6-XK-K&D@2n9-E`Zw}xg,#-xy]q@>U-xUjBMDh>(spj2Dnk^s@kr');
define('SECURE_AUTH_KEY',  '#7W9%?<+kp}~#2[eqGe:Q17z0(4WS sH`wUnZBRt-C935Tk=SV*>PYE-qgU[0+/');
define('NONCE_KEY',        'LEZ!X(jfR56^}EJpC2SGSKmr3G(pwpy?*J,6+?vk8*=/*ZM2D1S9+=PnHH&P^bg#');
define('AUTH_SALT',        '..!){Hlhsdy!U0RteuZ8JFUgKxP');
define('SECURE_AUTH_SALT', '(,({S04<3iU@WI.>vCCNmWWxGL||Hr-wE');
define('LOGGED_IN_SALT',   's;CZ8b;UFo({pLF^$pHcigdRalqWYkoPF%>bWsL3a>,mphO/Y HbwN2J[dYP@G-+');
define('NONCE_SALT',       '!|a$Dp*-+|$Yd;LR|FE1=L3T11@q;1T/9dE>e]RLV+mtdG2H%hD/,Gw#KTnbFqt=');
```

### SSL 
```
define( 'FORCE_SSL_LOGIN', true );
define( 'FORCE_SSL_ADMIN', true );
```

### Custom WordPress URL. 
```
define( 'WP_SITEURL',     'http://ma.ttharr.is/' );
define( 'WP_HOME',        'http://ma.ttharr.is/vendor/wp' );
define( 'WP_CONTENT_URL', 'http://ma.ttharr.is/content' );
define( 'UPLOADS',        'http://ma.ttharr.is/media' );
define( 'WP_PLUGIN_URL',  'http://ma.ttharr.is/content' );
```

### Specify maximum number of Revisions. 

`define( 'WP_POST_REVISIONS', '100' );`

### Media Trash. 

`define( 'MEDIA_TRASH', true );`

### Trash Days. 

`define( 'EMPTY_TRASH_DAYS', '15' );`


### Multisite. 

`define( 'WP_ALLOW_MULTISITE', false );`


### WordPress debug mode for developers. 
```
define( 'WP_DEBUG',         true );
define( 'WP_DEBUG_LOG',     true );
define( 'WP_DEBUG_DISPLAY', true );
define( 'SCRIPT_DEBUG',     true );
define( 'SAVEQUERIES',      true );
```

### PHP Memory 

```
define( 'WP_MEMORY_LIMIT', '64M' );
define( 'WP_MAX_MEMORY_LIMIT', '512M' );
```

### WordPress Cache 

```
define( 'WP_CACHE', true );
```

### Compression 

```
define( 'COMPRESS_CSS',        true );
define( 'COMPRESS_SCRIPTS',    true );
define( 'CONCATENATE_SCRIPTS', true );
define( 'ENFORCE_GZIP',        true );
```

### FTP 

```
define( 'FTP_USER', 'ftp_user' );
define( 'FTP_PASS', 'ftp_pass' );
define( 'FTP_HOST', 'ftp_hostname' );
define( 'FTP_SSL', true );
```

### CRON 

```
define( 'DISABLE_WP_CRON',      'false' );
define( 'ALTERNATE_WP_CRON',    'true' );
define( 'WP_CRON_LOCK_TIMEOUT', 900s );
```

### Updates 

```
define( 'WP_AUTO_UPDATE_CORE', 'minor' );
define( 'DISALLOW_FILE_MODS', true );
define( 'DISALLOW_FILE_EDIT', true );
```

### Absolute path to the WordPress directory. 

```
if ( !defined('ABSPATH') ) {
	define('ABSPATH', dirname(__FILE__) . '/');
}
```
### Sets up WordPress vars and included files. 

```
require_once(ABSPATH . 'wp-settings.php');
```

 