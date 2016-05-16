<?php
// Always provide a TRAILING SLASH (/) AFTER A PATH
define('URL', 'http://watchlist.dev/');
define('LIBS', 'libs/');

define('DB_TYPE', 'mysql');
define('DB_HOST', 'localhost');
define('DB_NAME', 'watchlist');
define('DB_USER', 'root');
define('DB_PASS', 'secret');

// The sitewide hashkey, do not change this because its used for passwords!
// This is for other hash keys...
define('HASH_GENERAL_KEY', 'GENERAL_KEY');

// This is for database passwords only
define('HASH_PASSWORD_KEY', 'HASH_KEY');
